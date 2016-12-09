<?php
/**
 * The control file of testtask module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     testtask
 * @version     $Id: control.php 5114 2013-07-12 06:02:59Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
class testtask extends control
{
    public $products = array();

    /**
     * Construct function, load product module, assign products to view auto.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('product');
        $this->view->products = $this->products = $this->product->getPairs('nocode');
        if(empty($this->products)) die($this->locate($this->createLink('product', 'showErrorNone', "fromModule=testtask")));
    }

    /**
     * Index page, header to browse.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $this->locate($this->createLink('testtask', 'browse'));
    }

    /**
     * Browse test tasks. 
     * 
     * @param  int    $productID 
     * @param  string $type 
     * @param  string $orderBy 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function browse($productID = 0, $branch = '', $type = 'wait', $orderBy = 'id_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        /* Save session. */
        $this->session->set('testtaskList', $this->app->getURI(true));

        /* Set menu. */
        $productID = $this->product->saveState($productID, $this->products);
        if($branch === '') $branch = (int)$this->cookie->preBranch;
        $this->testtask->setMenu($this->products, $productID, $branch);

        /* Load pager. */
        $this->app->loadClass('pager', $static = true);
        $pager = pager::init($recTotal, $recPerPage, $pageID);

        /* Append id for secend sort. */
        $sort = $this->loadModel('common')->appendOrder($orderBy);

        $this->view->title       = $this->products[$productID] . $this->lang->colon . $this->lang->testtask->common;
        $this->view->position[]  = html::a($this->createLink('testtask', 'browse', "productID=$productID"), $this->products[$productID]);
        $this->view->position[]  = $this->lang->testtask->common;
        $this->view->productID   = $productID;
        $this->view->productName = $this->products[$productID];
        $this->view->orderBy     = $orderBy;
        $this->view->tasks       = $this->testtask->getProductTasks($productID, $branch, $sort, $pager, $type);
        $this->view->users       = $this->loadModel('user')->getPairs('noclosed|noletter');
        $this->view->pager       = $pager;
        $this->view->type        = $type;
        $this->view->branch      = $branch;

        $this->display();
    }

    /**
     * Create a test task.
     * 
     * @param  int    $productID 
     * @access public
     * @return void
     */
    public function create($productID, $projectID = 0, $build = 0)
    {
        if(!empty($_POST))
        {
            $taskID = $this->testtask->create();
            if(dao::isError()) die(js::error(dao::getError()));
            $actionID = $this->loadModel('action')->create('testtask', $taskID, 'opened');
            $this->sendmail($taskID, $actionID, 'opened');
            die(js::locate($this->createLink('testtask', 'browse', "productID=$productID"), 'parent'));
        }

        /* Create testtask from build of project.*/
        if($projectID != 0 and $build != 0)
        {
            $products = $this->dao->select('t2.id, t2.name')->from(TABLE_PROJECTPRODUCT)->alias('t1')
                ->leftJoin(TABLE_PRODUCT)->alias('t2')->on('t1.product = t2.id')
                ->where('t1.project')->eq($projectID)
                ->andWhere('t2.deleted')->eq(0)
                ->fetchPairs('id');

            $productID = $productID ? $productID : key($products);
            $projects  = $this->dao->select('id, name')->from(TABLE_PROJECT)->where('id')->eq($projectID)->andWhere('deleted')->eq(0)->fetchPairs('id');
            $builds    = $this->dao->select('id, name')->from(TABLE_BUILD)->where('id')->eq($build)->andWhere('deleted')->eq(0)->fetchPairs('id');
        }

        /* Create testtask from testtask of project.*/
        if($projectID != 0 and $build == 0)
        {
            $products = $this->dao->select('t2.id, t2.name')->from(TABLE_PROJECTPRODUCT)->alias('t1')
                ->leftJoin(TABLE_PRODUCT)->alias('t2')->on('t1.product = t2.id')
                ->where('t1.project')->eq($projectID)
                ->andWhere('t2.deleted')->eq(0)
                ->fetchPairs('id');

            $productID = $productID ? $productID : key($products);
            $projects  = $this->dao->select('id, name')->from(TABLE_PROJECT)->where('id')->eq($projectID)->andWhere('deleted')->eq(0)->fetchPairs('id');
            $builds    = $this->dao->select('id, name')->from(TABLE_BUILD)->where('project')->eq($projectID)->andWhere('deleted')->eq(0)->fetchPairs('id');
            $builds    = array('trunk' => 'Trunk') + $builds;
        }

        /* Create testtask from testtask of test.*/
        if($projectID == 0)
        {
            $projects = $this->product->getProjectPairs($productID, $branch = 0, $params = 'nodeleted');
            $builds   = $this->loadModel('build')->getProductBuildPairs($productID);
        }

        /* Set menu. */
        $productID  = $this->product->saveState($productID, $this->products);
        $this->testtask->setMenu($this->products, $productID);

        $this->view->title      = $this->products[$productID] . $this->lang->colon . $this->lang->testtask->create;
        $this->view->position[] = html::a($this->createLink('testtask', 'browse', "productID=$productID"), $this->products[$productID]);
        $this->view->position[] = $this->lang->testtask->common;
        $this->view->position[] = $this->lang->testtask->create;

        if($projectID != 0) 
        {
            $this->view->products  = $products;
            $this->view->projectID = $projectID;
        }
        $this->view->projects     = $projects;
        $this->view->productID    = $productID;
        $this->view->builds       = $builds;
        $this->view->users        = $this->loadModel('user')->getPairs('noclosed|nodeleted|qdfirst');

        $this->display();
    }

    /**
     * View a test task.
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function view($taskID)
    {
        /* Get test task, and set menu. */
        $task = $this->testtask->getById($taskID, true);
        if(!$task) die(js::error($this->lang->notFound) . js::locate('back'));
        $productID = $task->product;
        $buildID   = $task->build;

        $build   = $this->loadModel('build')->getByID($buildID);
        $stories = array();
        $bugs    = array();

        if($build)
        {
            $stories = $this->dao->select('*')->from(TABLE_STORY)->where('id')->in($build->stories)->fetchAll();
            $this->loadModel('common')->saveQueryCondition($this->dao->get(), 'story');

            $bugs    = $this->dao->select('*')->from(TABLE_BUG)->where('id')->in($build->bugs)->fetchAll();
            $this->loadModel('common')->saveQueryCondition($this->dao->get(), 'bug');
        }

        $this->testtask->setMenu($this->products, $productID, $task->branch);

        $this->view->title      = "TASK #$task->id $task->name/" . $this->products[$productID];
        $this->view->position[] = html::a($this->createLink('testtask', 'browse', "productID=$productID"), $this->products[$productID]);
        $this->view->position[] = $this->lang->testtask->common;
        $this->view->position[] = $this->lang->testtask->view;

        $this->view->productID = $productID;
        $this->view->task      = $task;
        $this->view->users     = $this->loadModel('user')->getPairs('noclosed|noletter');
        $this->view->actions   = $this->loadModel('action')->getList('testtask', $taskID);
        $this->view->build     = $build;
        $this->view->stories   = $stories;
        $this->view->bugs      = $bugs;

        $this->display();
    }

    /**
     * Browse cases of a test task.
     * 
     * @param  string $taskID 
     * @param  string $browseType  bymodule|all|assignedtome
     * @param  int    $param 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function cases($taskID, $browseType = 'all', $param = 0, $orderBy = 'id_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->loadModel('datatable');
        $this->loadModel('testcase');

        /* Save the session. */
        $this->session->set('caseList', $this->app->getURI(true));

        /* Load pager. */
        $this->app->loadClass('pager', $static = true);
        $pager = pager::init($recTotal, $recPerPage, $pageID);
        /* Set the browseType and moduleID. */
        $browseType = strtolower($browseType);

        /* Get task and product info, set menu. */
        $task = $this->testtask->getById($taskID);
        if(!$task) die(js::error($this->lang->notFound) . js::locate('back'));
        $productID = $task->product;
        $this->testtask->setMenu($this->products, $productID, $task->branch);
        setcookie('preProductID', $productID, $this->config->cookieLife, $this->config->webRoot);

        if($this->cookie->preProductID != $productID)
        {
            $_COOKIE['taskCaseModule'] = 0;
            setcookie('taskCaseModule', 0, $this->config->cookieLife, $this->config->webRoot);
        }
        if($browseType == 'bymodule') setcookie('taskCaseModule', (int)$param, $this->config->cookieLife, $this->config->webRoot);
        if($browseType != 'bymodule') $this->session->set('taskCaseBrowseType', $browseType);

        $moduleID  = ($browseType == 'bymodule') ? (int)$param : ($browseType == 'bysearch' ? 0 : ($this->cookie->taskCaseModule ? $this->cookie->taskCaseModule : 0));
        $queryID   = ($browseType == 'bysearch') ? (int)$param : 0;

        /* Append id for secend sort. */
        $sort = $this->loadModel('common')->appendOrder($orderBy, 't2.id');

        /* Get test cases. */
        $this->view->runs = $this->testtask->getTaskCases($productID, $browseType, $queryID, $moduleID, $sort, $pager, $task);
        $this->loadModel('common')->saveQueryCondition($this->dao->get(), 'testcase', false);

        /* Save testcaseIDs session for get the pre and next testcase. */
        $testcaseIDs = '';
        foreach($this->view->runs as $run) $testcaseIDs .= ',' . $run->case;
        $this->session->set('testcaseIDs', $testcaseIDs . ',');

        /* Build the search form. */
        $this->loadModel('testcase');
        $this->config->testcase->search['module']                      = 'testtask';
        $this->config->testcase->search['params']['product']['values'] = array($productID => $this->products[$productID], 'all' => $this->lang->testcase->allProduct);
        $this->config->testcase->search['params']['module']['values']  = $this->loadModel('tree')->getOptionMenu($productID, $viewType = 'case');
        $this->config->testcase->search['actionURL'] = inlink('cases', "taskID=$taskID&browseType=bySearch&queryID=myQueryID");
        unset($this->config->testcase->search['fields']['branch']);
        unset($this->config->testcase->search['params']['branch']);
        $this->loadModel('search')->setSearchParams($this->config->testcase->search);

        $this->view->title      = $this->products[$productID] . $this->lang->colon . $this->lang->testtask->cases;
        $this->view->position[] = html::a($this->createLink('testtask', 'browse', "productID=$productID"), $this->products[$productID]);
        $this->view->position[] = $this->lang->testtask->common;
        $this->view->position[] = $this->lang->testtask->cases;

        $this->view->productID     = $productID;
        $this->view->productName   = $this->products[$productID];
        $this->view->task          = $task;
        $this->view->users         = $this->loadModel('user')->getPairs('noclosed,qafirst');
        $this->view->assignedTos   = $this->loadModel('user')->getPairs('noclosed,nodeleted,qafirst');
        $this->view->moduleTree    = $this->loadModel('tree')->getTreeMenu($productID, $viewType = 'case', $startModuleID = 0, array('treeModel', 'createTestTaskLink'), $extra = $taskID);
        $this->view->browseType    = $browseType;
        $this->view->param         = $param;
        $this->view->orderBy       = $orderBy;
        $this->view->taskID        = $taskID;
        $this->view->moduleID      = $moduleID;
        $this->view->moduleName    = $moduleID ? $this->tree->getById($moduleID)->name : $this->lang->tree->all;
        $this->view->treeClass     = $browseType == 'bymodule' ? '' : 'hidden';
        $this->view->pager         = $pager;
        $this->view->branches      = $this->loadModel('branch')->getPairs($productID);
        $this->view->setShowModule = false;

        $this->display();
    }

    /**
     * Group case.
     * 
     * @param  int    $taskID 
     * @param  string $groupBy 
     * @access public
     * @return void
     */
    public function groupCase($taskID, $groupBy = 'story')
    {
        /* Save the session. */
        $this->app->loadLang('testcase');
        $this->session->set('caseList', $this->app->getURI(true));

        /* Get task and product info, set menu. */
        $groupBy = empty($groupBy) ? 'story' : $groupBy;
        $task    = $this->testtask->getById($taskID);
        if(!$task) die(js::error($this->lang->notFound) . js::locate('back'));
        $productID = $task->product;
        $this->testtask->setMenu($this->products, $productID, $task->branch);

        $runs = $this->testtask->getRuns($taskID, 0, $groupBy);
        $this->loadModel('common')->saveQueryCondition($this->dao->get(), 'testcase', false);

        $groupCases  = array();
        $groupByList = array();
        foreach($runs as $run)
        {
            if($groupBy == 'story')
            {
                $groupCases[$run->story][] = $run;
                $groupByList[$run->story]  = $run->storyTitle;
            }
        }

        $this->view->title      = $this->products[$productID] . $this->lang->colon . $this->lang->testtask->cases;
        $this->view->position[] = html::a($this->createLink('testtask', 'browse', "productID=$productID"), $this->products[$productID]);
        $this->view->position[] = $this->lang->testtask->common;
        $this->view->position[] = $this->lang->testtask->cases;

        $this->view->users       = $this->loadModel('user')->getPairs('noletter');
        $this->view->productID   = $productID;
        $this->view->task        = $task;
        $this->view->taskID      = $taskID;
        $this->view->browseType  = 'group';
        $this->view->groupBy     = $groupBy;
        $this->view->groupByList = $groupByList;
        $this->view->cases       = $groupCases;
        $this->display();
    }

    /**
     * Edit a test task.
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function edit($taskID)
    {
        if(!empty($_POST))
        {
            $changes = $this->testtask->update($taskID);
            if(dao::isError()) die(js::error(dao::getError()));
            if($changes)
            {
                $actionID = $this->loadModel('action')->create('testtask', $taskID, 'edited');
                $this->action->logHistory($actionID, $changes);

                /* send mail.*/
                $this->sendmail($taskID, $actionID, 'edited');
            }
            die(js::locate(inlink('view', "taskID=$taskID"), 'parent'));
        }

        /* Get task info. */
        $task      = $this->testtask->getById($taskID);
        $productID = $this->product->saveState($task->product, $this->products);

        /* Set menu. */
        $this->testtask->setMenu($this->products, $productID, $task->branch);

        $this->view->title      = $this->products[$productID] . $this->lang->colon . $this->lang->testtask->edit;
        $this->view->position[] = html::a($this->createLink('testtask', 'browse', "productID=$productID"), $this->products[$productID]);
        $this->view->position[] = $this->lang->testtask->common;
        $this->view->position[] = $this->lang->testtask->edit;

        $this->view->task         = $task;
        $this->view->projects     = $this->product->getProjectPairs($productID);
        $this->view->builds       = $this->loadModel('build')->getProductBuildPairs($productID, $branch = 0, $params = '');
        $this->view->users        = $this->loadModel('user')->getPairs('nodeleted', $task->owner);
        $this->view->contactLists = $this->user->getContactLists($this->app->user->account, 'withnote');

        $this->display();
    }

    /**
     * Start testtask.
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function start($taskID)
    {
        $actions  = $this->loadModel('action')->getList('testtask', $taskID);

        if(!empty($_POST))
        {
            $changes = $this->testtask->start($taskID);
            if(dao::isError()) die(js::error(dao::getError()));

            if($this->post->comment != '' or !empty($changes))
            {
                $actionID = $this->action->create('testtask', $taskID, 'Started', $this->post->comment);
                $this->action->logHistory($actionID, $changes);
            }

            if(isonlybody()) die(js::reload('parent.parent'));
            die(js::locate($this->createLink('testtask', 'view', "taskID=$taskID"), 'parent'));
        }

        /* Get task info. */
        $testtask  = $this->testtask->getById($taskID);
        $productID = $this->product->saveState($testtask->product, $this->products);

        /* Set menu. */
        $this->testtask->setMenu($this->products, $productID, $testtask->branch);

        $this->view->testtask   = $testtask;
        $this->view->title      = $testtask->name . $this->lang->colon . $this->lang->testtask->start;
        $this->view->position[] = $this->lang->testtask->common;
        $this->view->position[] = $this->lang->testtask->start;
        $this->view->actions    = $actions;
        $this->display();
    }

    /**
     * Close testtask.
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function close($taskID)
    {
        $actions  = $this->loadModel('action')->getList('testtask', $taskID);

        if(!empty($_POST))
        {
            $changes = $this->testtask->close($taskID);
            if(dao::isError()) die(js::error(dao::getError()));

            if($this->post->comment != '' or !empty($changes))
            {
                $actionID = $this->action->create('testtask', $taskID, 'Closed', $this->post->comment);
                $this->action->logHistory($actionID, $changes);
                $this->sendmail($taskID, $actionID, 'closed');
            }

            if(isonlybody()) die(js::reload('parent.parent'));
            die(js::locate($this->createLink('testtask', 'view', "taskID=$taskID"), 'parent'));
        }

        /* Get task info. */
        $testtask  = $this->testtask->getById($taskID);
        $productID = $this->product->saveState($testtask->product, $this->products);

        /* Set menu. */
        $this->testtask->setMenu($this->products, $productID, $testtask->branch);

        $this->view->testtask     = $this->testtask->getById($taskID);
        $this->view->title        = $testtask->name . $this->lang->colon . $this->lang->close;
        $this->view->position[]   = $this->lang->testtask->common;
        $this->view->position[]   = $this->lang->close;
        $this->view->actions      = $actions;
        $this->view->users        = $this->loadModel('user')->getPairs('noclosed|nodeleted|qdfirst');
        $this->view->contactLists = $this->user->getContactLists($this->app->user->account, 'withnote');
        $this->display();
    }

    /**
     * Delete a test task.
     * 
     * @param  int    $taskID 
     * @param  string $confirm yes|no
     * @access public
     * @return void
     */
    public function delete($taskID, $confirm = 'no')
    {
        if($confirm == 'no')
        {
            die(js::confirm($this->lang->testtask->confirmDelete, inlink('delete', "taskID=$taskID&confirm=yes")));
        }
        else
        {
            $task = $this->testtask->getByID($taskID);
            $this->testtask->delete(TABLE_TESTTASK, $taskID);

            /* if ajax request, send result. */
            if($this->server->ajax)
            {
                if(dao::isError())
                {
                    $response['result']  = 'fail';
                    $response['message'] = dao::getError();
                }
                else
                {
                    $response['result']  = 'success';
                    $response['message'] = '';
                }
                $this->send($response);
            }
            die(js::locate(inlink('browse', "product=$task->product"), 'parent'));
        }
    }

    /**
     * Link cases to a test task.
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function linkCase($taskID, $param = 'all', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        if(!empty($_POST))
        {
            $this->testtask->linkCase($taskID);
            $this->locate(inlink('cases', "taskID=$taskID"));
        }

        /* Save session. */
        $this->session->set('caseList', $this->app->getURI(true));

        /* Get task and product id. */
        $task      = $this->testtask->getById($taskID);
        $productID = $this->product->saveState($task->product, $this->products);

        /* Save session. */
        $this->testtask->setMenu($this->products, $productID, $task->branch);

        /* Load pager. */
        $this->app->loadClass('pager', $static = true);
        $pager = pager::init($recTotal, $recPerPage, $pageID);

        /* Build the search form. */
        $this->loadModel('testcase');
        $this->config->testcase->search['params']['product']['values']= array($productID => $this->products[$productID], 'all' => $this->lang->testcase->allProduct);
        $this->config->testcase->search['params']['module']['values'] = $this->loadModel('tree')->getOptionMenu($productID, $viewType = 'case');
        $this->config->testcase->search['actionURL'] = inlink('linkcase', "taskID=$taskID");
        if($this->session->currentProductType == 'normal')
        {
            unset($this->config->testcase->search['fields']['branch']);
            unset($this->config->testcase->search['params']['branch']);
        }
        else
        {
            $this->config->testcase->search['fields']['branch'] = $this->lang->product->branch;
            $branches = array('' => '') + $this->loadModel('branch')->getPairs($task->product, 'noempty');
            if($task->branch) $branches = array('' => '', $task->branch => $branches[$task->branch]);
            $this->config->testcase->search['params']['branch']['values'] = $branches;
        }
        $this->loadModel('search')->setSearchParams($this->config->testcase->search);

        $this->view->title      = $task->name . $this->lang->colon . $this->lang->testtask->linkCase;
        $this->view->position[] = html::a($this->createLink('testtask', 'browse', "productID=$productID"), $this->products[$productID]);
        $this->view->position[] = $this->lang->testtask->common;
        $this->view->position[] = $this->lang->testtask->linkCase;

        /* Get cases. */
        if($this->session->testcaseQuery == false) $this->session->set('testcaseQuery', ' 1 = 1');
        $query = str_replace("`product` = 'all'", '1', $this->session->testcaseQuery); // If search all product, replace product = all to 1=1
        $linkedCases = $this->dao->select('`case`')->from(TABLE_TESTRUN)->where('task')->eq($taskID)->fetchPairs('case');
        if($param == 'all')
        {
            $cases = $this->dao->select('*')->from(TABLE_CASE)->where($query)
                ->andWhere('product')->eq($productID)
                ->andWhere('id')->notIN($linkedCases)
                ->beginIF($task->branch)->andWhere('branch')->in("0,$task->branch")->fi()
                ->andWhere('deleted')->eq(0)
                ->orderBy('id desc')
                ->page($pager)
                ->fetchAll();
        }
        if($param == 'bystory')
        {
            $stories = $this->dao->select('stories')->from(TABLE_BUILD)->where('id')->eq($task->build)->fetch('stories');
            $cases   = array();
            if($stories)
            {
                $cases = $this->dao->select('*')->from(TABLE_CASE)->where($query)
                    ->andWhere('product')->eq($productID)
                    ->beginIF($linkedCases)->andWhere('id')->notIN($linkedCases)->fi()
                    ->beginIF($task->branch)->andWhere('branch')->in("0,$task->branch")->fi()
                    ->andWhere('story')->in(trim($stories, ','))
                    ->andWhere('deleted')->eq(0)
                    ->orderBy('id desc')
                    ->page($pager)
                    ->fetchAll();
            }
        }
        if($param == 'bybug')
        {
            $bugs  = $this->dao->select('bugs')->from(TABLE_BUILD)->where('id')->eq($task->build)->fetch('bugs');
            $cases = array();
            if($bugs)
            {
                $cases = empty($bugs) ? array() : $this->dao->select('*')->from(TABLE_CASE)->where($query)
                    ->andWhere('product')->eq($productID)
                    ->beginIF($linkedCases)->andWhere('id')->notIN($linkedCases)->fi()
                    ->beginIF($task->branch)->andWhere('branch')->in("0,$task->branch")->fi()
                    ->andWhere('fromBug')->in(trim($bugs, ','))
                    ->andWhere('deleted')->eq(0)
                    ->orderBy('id desc')
                    ->page($pager)
                    ->fetchAll();
            }
        }
        $this->view->users   = $this->loadModel('user')->getPairs('noletter');
        $this->view->cases   = $cases;
        $this->view->taskID  = $taskID;
        $this->view->pager   = $pager;
        $this->view->task    = $task;

        $this->display();
    }

    /**
     * Remove a case from test task.
     * 
     * @param  int    $rowID 
     * @access public
     * @return void
     */
    public function unlinkCase($rowID, $confirm = 'no')
    {
        if($confirm == 'no')
        {
            die(js::confirm($this->lang->testtask->confirmUnlinkCase, $this->createLink('testtask', 'unlinkCase', "rowID=$rowID&confirm=yes")));
        }
        else
        {
            $response['result']  = 'success';
            $response['message'] = '';

            $this->dao->delete()->from(TABLE_TESTRUN)->where('id')->eq((int)$rowID)->exec();
            if(dao::isError())
            {
                $response['result']  = 'fail';
                $response['message'] = dao::getError();
            }
            $this->send($response);
        }
    }

    /**
     * Run case.
     * 
     * @param  int    $runID 
     * @param  String $extras   others params, forexample, caseID=10, version=3
     * @access public
     * @return void
     */
    public function runCase($runID, $caseID = 0, $version = 0)
    {
        if($caseID)
        {
            $run = new stdclass();
            $run->case = $this->loadModel('testcase')->getById($caseID, $version);
        }
        else
        {
            $run = $this->testtask->getRunById($runID);
        }

        $caseID     = $caseID ? $caseID : $run->case->id;
        $preAndNext = $this->loadModel('common')->getPreAndNextObject('testcase', $caseID);
        if(!empty($_POST))
        {
            $this->testtask->createResult($runID);
            if(dao::isError()) die(js::error(dao::getError()));

            /* set cookie for ajax load caselist when close colorbox. */
            setcookie('selfClose', 1);

            if($preAndNext->next)
            {
                $nextRunID   = $runID ? $preAndNext->next->id : 0;
                $nextCaseID  = $runID ? $preAndNext->next->case : $preAndNext->next->id;
                $nextVersion = $preAndNext->next->version;
                die(js::locate(inlink('runCase', "runID=$nextRunID&caseID=$nextCaseID&version=$nextVersion")));
            }
            else
            {
                die(js::closeModal('parent'));
            }
        }

        $preCase  = '';
        $nextCase = '';
        if($preAndNext->pre)
        {
            $preCase['runID']   = $runID ? $preAndNext->pre->id : 0;
            $preCase['caseID']  = $runID ? $preAndNext->pre->case : $preAndNext->pre->id;
            $preCase['version'] = $preAndNext->pre->version;
        }
        if($preAndNext->next)
        {
            $nextCase['runID']   = $runID ? $preAndNext->next->id : 0;
            $nextCase['caseID']  = $runID ? $preAndNext->next->case : $preAndNext->next->id;
            $nextCase['version'] = $preAndNext->next->version;
        }
        
        $this->view->run      = $run;
        $this->view->preCase  = $preCase;
        $this->view->nextCase = $nextCase;
        $this->view->results  = $this->testtask->getResults($runID, $caseID);
        $this->view->users    = $this->loadModel('user')->getPairs('noclosed, noletter');
        $this->view->caseID   = $caseID;
        $this->view->version  = $version;

        die($this->display());
    }

    /**
     * Batch run case.
     * 
     * @param  int    $productID 
     * @param  string $orderBy 
     * @param  string $from 
     * @access public
     * @return void
     */
    public function batchRun($productID, $orderBy = 'id_desc', $from = 'testcase', $taskID = 0)
    {
        $url = $this->session->caseList ? $this->session->caseList : $this->createLink('testcase', 'browse', "productID=$productID");
        if($this->post->results)
        {
            $this->testtask->batchRun($from, $taskID);
            die(js::locate($url, 'parent'));
        }

        $caseIDList = $this->post->caseIDList ? $this->post->caseIDList : die(js::locate($url, 'parent'));

        /* The case of tasks of qa. */
        if($productID)
        {
            $this->testtask->setMenu($this->products, $productID);
            $this->view->moduleOptionMenu = $this->loadModel('tree')->getOptionMenu($productID, $viewType = 'case', $startModuleID = 0);
        }
        /* The case of my. */
        else
        {
            $this->lang->testtask->menu = $this->lang->my->menu;
            $this->lang->set('menugroup.testtask', 'my');
            $this->lang->testtask->menuOrder = $this->lang->my->menuOrder;
            $this->loadModel('my')->setMenu();
            $this->view->title = $this->lang->testtask->batchRun;
        }

        $this->view->cases = $this->dao->select('*')->from(TABLE_CASE)->where('id')->in($caseIDList)->fetchAll('id');
        $this->view->steps = $this->dao->select('t1.*')->from(TABLE_CASESTEP)->alias('t1')
            ->leftJoin(TABLE_CASE)->alias('t2')->on('t1.case=t2.id')
            ->where('t2.id')->in($caseIDList)
            ->andWhere('t1.version=t2.version')
            ->fetchGroup('case', 'id');
       
        $this->view->caseIDList = $caseIDList;
        $this->view->productID  = $productID;
        $this->view->title      = $this->lang->testtask->batchRun;
        $this->view->position[] = $this->lang->testtask->common;
        $this->view->position[] = $this->lang->testtask->batchRun;
        $this->display();
    }

    /**
     * View test results of a test run.
     * 
     * @param  int    $runID 
     * @param  int    $caseID 
     * @access public
     * @return void
     */
    public function results($runID, $caseID = 0, $version = 0)
    {
        if($caseID)
        {
            $case    = $this->loadModel('testcase')->getByID($caseID, $version);
            $results = $this->testtask->getResults(0, $caseID);
        }
        else
        {
            $case    = $this->testtask->getRunById($runID)->case;
            $results = $this->testtask->getResults($runID);

            $testtaskID = $this->dao->select('task')->from(TABLE_TESTRUN)->where('id')->eq($runID)->fetch('task');
            $testtask   = $this->dao->select('build, product')->from(TABLE_TESTTASK)->where('id')->eq($testtaskID)->fetch();
            $this->view->build = isset($builds[$testtask->build]) ? $builds[$testtask->build] : '';
        }

        $this->view->case    = $case;
        $this->view->results = $results;
        $this->view->builds  = $this->loadModel('build')->getProductBuildPairs($case->product, $branch = 0, $params = '');
        $this->view->users   = $this->loadModel('user')->getPairs('noclosed, noletter');

        die($this->display());
    }

    /**
     * Batch assign cases.
     * 
     * @param  int    $taskID 
     * @access public
     * @return void
     */
    public function batchAssign($taskID)
    {
        $this->dao->update(TABLE_TESTRUN)
            ->set('assignedTo')->eq($this->post->assignedTo)
            ->where('task')->eq((int)$taskID)
            ->andWhere('`case`')->in($this->post->caseIDList)
            ->exec();
        die(js::locate($this->session->caseList));
    }

    /**
     * Send mail. 
     * 
     * @param  int    $testtaskID 
     * @param  int    $actionID 
     * @param  string $action 
     * @access public
     * @return void
     */
    public function sendmail($testtaskID, $actionID, $actionType)
    {
        /* Reset $this->output. */
        $this->clear();

        /* Set toList and ccList. */
        $testtask = $this->testtask->getByID($testtaskID);
        $users    = $this->loadModel('user')->getPairs('noletter');
        $toList   = $testtask->owner;
        $ccList   = str_replace(' ', '', trim($testtask->mailto, ','));
        if($toList == '')
        {
            if($ccList == '') return;
            if(strpos($ccList, ',') === false)
            {
                $toList = $ccList;
                $ccList = '';
            }
            else
            {
                $commaPos = strpos($ccList, ',');
                $toList   = substr($ccList, 0, $commaPos);
                $ccList   = substr($ccList, $commaPos + 1);
            }
        }

        /* Get action info. */
        $action          = $this->loadModel('action')->getById($actionID);
        $history         = $this->action->getHistory($actionID);
        $action->history = isset($history[$actionID]) ? $history[$actionID] : array();

        /* Create the email content. */
        $this->view->testtask = $testtask;
        $this->view->action   = $action;
        $this->view->users    = $users;

        $mailContent = $this->parse($this->moduleName, 'sendmail');

        /* Set email title. */
        if($actionType == 'opened')
        {
            $mailTitle = sprintf($this->lang->testtask->mail->create->title, $this->app->user->realname, $testtaskID, $this->post->name);
        }
        elseif($actionType == 'closed')
        {
            $mailTitle = sprintf($this->lang->testtask->mail->close->title, $this->app->user->realname, $testtaskID, $testtask->name);
        }
        else
        {
            $mailTitle = sprintf($this->lang->testtask->mail->edit->title, $this->app->user->realname, $testtaskID, $this->post->name);
        }

        /* Send mail. */
        $this->loadModel('mail')->send($toList, $mailTitle, $mailContent, $ccList); 
        if($this->mail->isError()) trigger_error(join("\n", $this->mail->getError()));
    }
}
