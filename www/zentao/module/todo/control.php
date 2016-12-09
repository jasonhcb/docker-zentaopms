<?php
/**
 * The control file of todo module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     todo
 * @version     $Id: control.php 4976 2013-07-02 08:15:31Z wyd621@gmail.com $
 * @link        http://www.zentao.net
 */
class todo extends control
{
    /**
     * Construct function, load model of task, bug, my.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->app->loadClass('date');
        $this->loadModel('task');
        $this->loadModel('bug');
        $this->loadModel('my')->setMenu();
    }

    /**
     * Create a todo.
     * 
     * @param  string|date $date 
     * @param  string      $account 
     * @access public
     * @return void
     */
    public function create($date = 'today', $account = '')
    {
        if($date == 'today') $date = date::today();
        if($account == '')   $account = $this->app->user->account;
        if(!empty($_POST))
        {
            $todoID = $this->todo->create($date, $account);
            if(dao::isError()) die(js::error(dao::getError()));
            $this->loadModel('action')->create('todo', $todoID, 'opened');
            $date = str_replace('-', '', $this->post->date);
            if($date == '')
            {
                $date = 'future'; 
            }
            else if($date == date('Ymd'))
            {
                $date = 'today'; 
            }
            die(js::locate($this->createLink('my', 'todo', "type=$date"), 'parent'));
        }

        $this->view->title      = $this->lang->todo->common . $this->lang->colon . $this->lang->todo->create;
        $this->view->position[] = $this->lang->todo->common;
        $this->view->position[] = $this->lang->todo->create;
        $this->view->date       = strftime("%Y-%m-%d", strtotime($date));
        $this->view->times      = date::buildTimeList($this->config->todo->times->begin, $this->config->todo->times->end, $this->config->todo->times->delta);
        $this->view->time       = date::now();
        $this->display();      
    }

    /**
     * Batch create todo
     * 
     * @param  string $date 
     * @param  string $account 
     * @access public
     * @return void
     */
    public function batchCreate($date = 'today', $account = '')
    {
        if($date == 'today') $date = date(DT_DATE1, time());
        if(!empty($_POST))
        {
            $this->todo->batchCreate();
            if(dao::isError()) die(js::error(dao::getError()));

            /* Locate the browser. */
            $date = str_replace('-', '', $this->post->date);
            if($date == '')
            {
                $date = 'future'; 
            }
            else if($date == date('Ymd'))
            {
                $date= 'today'; 
            }
            die(js::locate($this->createLink('my', 'todo', "type=$date"), 'parent'));
        }

        /* Set Custom*/
        foreach(explode(',', $this->config->todo->list->customBatchCreateFields) as $field) $customFields[$field] = $this->lang->todo->$field;
        $this->view->customFields = $customFields;
        $this->view->showFields   = $this->config->todo->custom->batchCreateFields;

        $this->view->title      = $this->lang->todo->common . $this->lang->colon . $this->lang->todo->batchCreate;
        $this->view->position[] = $this->lang->todo->common;
        $this->view->position[] = $this->lang->todo->batchCreate;
        $this->view->date       = (int)$date == 0 ? $date : date('Y-m-d', strtotime($date));
        $this->view->times      = date::buildTimeList($this->config->todo->times->begin, $this->config->todo->times->end, $this->config->todo->times->delta);
        $this->view->time       = date::now();

        $this->display();
    }

    /**
     * Edit a todo.
     * 
     * @param  int    $todoID 
     * @access public
     * @return void
     */
    public function edit($todoID)
    {
        if(!empty($_POST))
        {
            $changes = $this->todo->update($todoID);
            if(dao::isError()) die(js::error(dao::getError()));
            if($changes)
            {
                $actionID = $this->loadModel('action')->create('todo', $todoID, 'edited');
                $this->action->logHistory($actionID, $changes);
            }
            if(isonlybody())die(js::closeModal('parent.parent'));
            die(js::locate(inlink('view', "todoID=$todoID"), 'parent'));
        }

        /* Judge a private todo or not, If private, die. */
        $todo = $this->todo->getById($todoID);
        if($todo->private and $this->app->user->account != $todo->account) die('private');
       
        $todo->date = strftime("%Y-%m-%d", strtotime($todo->date));
        $this->view->title      = $this->lang->todo->common . $this->lang->colon . $this->lang->todo->edit;
        $this->view->position[] = $this->lang->todo->common;
        $this->view->position[] = $this->lang->todo->edit;
        $this->view->times      = date::buildTimeList($this->config->todo->times->begin, $this->config->todo->times->end, $this->config->todo->times->delta);
        $this->view->todo       = $todo;
        $this->display();
    }

    /**
     * Batch edit todo.
     * 
     * @param  string $from example:myTodo, todoBatchEdit.
     * @param  string $type 
     * @param  string $account 
     * @param  string $status 
     * @access public
     * @return void
     */
    public function batchEdit($from = '', $type = 'today', $account = '', $status = 'all')
    {
        /* Get form data for my-todo. */
        if($from == 'myTodo')
        {
            /* Initialize vars. */
            $editedTodos = array();
            $todoIDList  = array();
            $columns     = 7;
            $showSuhosinInfo = false;

            if($account == '') $account = $this->app->user->account;
            $bugs       = $this->bug->getUserBugPairs($account);
            $tasks      = $this->task->getUserTaskPairs($account, $status);
            $allTodos   = $this->todo->getList($type, $account, $status);
            if($this->post->todoIDList)  $todoIDList = $this->post->todoIDList;

            /* Initialize todos whose need to edited. */
            foreach($allTodos as $todo) 
            {
                if(in_array($todo->id, $todoIDList))
                {
                    $editedTodos[$todo->id] = $todo;
                }
            }
            foreach($editedTodos as $todo) 
            {
                if($todo->type == 'task') $todo->name = $this->dao->findById($todo->idvalue)->from(TABLE_TASK)->fetch('name');
                if($todo->type == 'bug')  $todo->name = $this->dao->findById($todo->idvalue)->from(TABLE_BUG)->fetch('title');
                $todo->begin = str_replace(':', '', $todo->begin);
                $todo->end   = str_replace(':', '', $todo->end);
            }

            /* Judge whether the edited todos is too large. */
            $showSuhosinInfo = $this->loadModel('common')->judgeSuhosinSetting(count($editedTodos), $columns);

            /* Set the sessions. */
            $this->app->session->set('showSuhosinInfo', $showSuhosinInfo);

            /* Set Custom*/
            foreach(explode(',', $this->config->todo->list->customBatchEditFields) as $field) $customFields[$field] = $this->lang->todo->$field;
            $this->view->customFields = $customFields;
            $this->view->showFields   = $this->config->todo->custom->batchEditFields;

            /* Assign. */
            $title      = $this->lang->todo->common . $this->lang->colon . $this->lang->todo->batchEdit;
            $position[] = html::a($this->createLink('my', 'todo'), $this->lang->my->todo);
            $position[] = $this->lang->todo->common;
            $position[] = $this->lang->todo->batchEdit;

            if($showSuhosinInfo) $this->view->suhosinInfo = $this->lang->suhosinInfo;
            $this->view->bugs        = $bugs;
            $this->view->tasks       = $tasks;
            $this->view->editedTodos = $editedTodos;
            $this->view->times       = date::buildTimeList($this->config->todo->times->begin, $this->config->todo->times->end, $this->config->todo->times->delta);
            $this->view->time        = date::now();
            $this->view->title       = $title;
            $this->view->position    = $position;

            $this->display();
        }
        /* Get form data from todo-batchEdit. */
        elseif($from == 'todoBatchEdit')
        {
            $allChanges = $this->todo->batchUpdate();
            foreach($allChanges as $todoID => $changes)
            {
                if(empty($changes)) continue;

                $actionID = $this->loadModel('action')->create('todo', $todoID, 'edited');
                $this->action->logHistory($actionID, $changes);
            }

            die(js::locate($this->session->todoList, 'parent'));
        }
    }

    /**
     * View a todo. 
     * 
     * @param  int    $todoID 
     * @param  string $from     my|company
     * @access public
     * @return void
     */
    public function view($todoID, $from = 'company')
    {
        $todo = $this->todo->getById($todoID, true);
        if(!$todo) die(js::error($this->lang->notFound) . js::locate('back'));

        /* Save the session. */
        $this->session->set('taskList', $this->app->getURI(true));
        $this->session->set('bugList',  $this->app->getURI(true));

        /* Set menus. */
        $this->lang->todo->menu      = $this->lang->user->menu;
        $this->lang->todo->menuOrder = $this->lang->user->menuOrder;
        $this->loadModel('user')->setMenu($this->user->getPairs(), $todo->account);
        $this->lang->company->menu->browseUser['subModule'] = 'todo';
        $this->lang->set('menugroup.todo', $from);

        $this->view->title      = "{$this->lang->todo->common} #$todo->id $todo->name";
        $this->view->position[] = $this->lang->todo->view;
        $this->view->todo       = $todo;
        $this->view->times      = date::buildTimeList($this->config->todo->times->begin, $this->config->todo->times->end, $this->config->todo->times->delta);
        $this->view->users      = $this->user->getPairs('noletter');
        $this->view->actions    = $this->loadModel('action')->getList('todo', $todoID);
        $this->view->from       = $from;

        $this->display();
    }

    /**
     * Delete a todo.
     * 
     * @param  int    $todoID 
     * @param  string $confirm yes|no
     * @access public
     * @return void
     */
    public function delete($todoID, $confirm = 'no')
    {
        if($confirm == 'no')
        {
            echo js::confirm($this->lang->todo->confirmDelete, $this->createLink('todo', 'delete', "todoID=$todoID&confirm=yes"));
            exit;
        }
        else
        {
            $this->dao->delete()->from(TABLE_TODO)->where('id')->eq($todoID)->exec();
            $this->loadModel('action')->create('todo', $todoID, 'erased');

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
            die(js::locate($this->session->todoList, 'parent'));
        }
    }

    /**
     * Finish a todo.
     * 
     * @param  int    $todoID 
     * @access public
     * @return void
     */
    public function finish($todoID)
    {
        $todo = $this->todo->getById($todoID);
        if($todo->status != 'done') $this->todo->finish($todoID);
        if($todo->type == 'bug' or $todo->type == 'task')
        {
            $confirmNote = 'confirm' . ucfirst($todo->type);
            $confirmURL  = $this->createLink($todo->type, 'view', "id=$todo->idvalue");
            $cancelURL   = $this->server->HTTP_REFERER;
            die(js::confirm(sprintf($this->lang->todo->$confirmNote, $todo->idvalue), $confirmURL, $cancelURL, 'parent', 'parent'));
        }
        if(isonlybody())die(js::reload('parent.parent'));
        die(js::reload('parent'));
    }

    /**
     * Batch finish todos.
     * 
     * @access public
     * @return void
     */
    public function batchFinish()
    {
        if(!empty($_POST['todoIDList']))
        {
            foreach($_POST['todoIDList'] as $todoID) 
            {
                $todo = $this->todo->getById($todoID);
                if($todo->status != 'done') $this->todo->finish($todoID);
            }
            die(js::reload('parent'));
        }
    }

    /**
     * Import selected todoes to today.
     * 
     * @access public
     * @return void
     */
    public function import2Today($todoID = 0)
    {
        $todoIDList = $_POST ? $this->post->todoIDList : array($todoID);
        $date       = !empty($_POST['date']) ? $_POST['date'] : date::today();
        $this->dao->update(TABLE_TODO)->set('date')->eq($date)->where('id')->in($todoIDList)->exec();
        $this->locate($this->session->todoList);
    }

    /**
     * Get data to export 
     * 
     * @param  string $productID 
     * @param  string $orderBy 
     * @access public
     * @return void
     */
    public function export($account, $orderBy)
    {
        if($_POST)
        {
            $todoLang   = $this->lang->todo;
            $todoConfig = $this->config->todo;

            /* Create field lists. */
            $fields = explode(',', $todoConfig->list->exportFields);
            foreach($fields as $key => $fieldName)
            {
                $fieldName = trim($fieldName);
                $fields[$fieldName] = isset($todoLang->$fieldName) ? $todoLang->$fieldName : $fieldName;
                unset($fields[$key]);
            }
            unset($fields['idvalue']);
            unset($fields['private']);

            /* Get bugs. */
            $todos = $this->dao->select('*')->from(TABLE_TODO)->where($this->session->todoReportCondition)
                ->beginIF($this->post->exportType == 'selected')->andWhere('id')->in($this->cookie->checkedItem)->fi()
                ->orderBy($orderBy)->fetchAll('id');

            /* Get users, bugs, tasks and times. */
            $users    = $this->loadModel('user')->getPairs('noletter');
            $bugs     = $this->loadModel('bug')->getUserBugPairs($account);
            $tasks    = $this->loadModel('task')->getUserTaskPairs($account);
            $times    = date::buildTimeList($this->config->todo->times->begin, $this->config->todo->times->end, $this->config->todo->times->delta);

            foreach($todos as $todo)
            {
                /* fill some field with useful value. */
                if(isset($users[$todo->account]))               $todo->account = $users[$todo->account];
                if(isset($times[$todo->begin]))                 $todo->begin   = $times[$todo->begin];
                if(isset($times[$todo->end]))                   $todo->end     = $times[$todo->end];
                if($todo->type == 'bug')                        $todo->name    = isset($bugs[$todo->idvalue])  ? $bugs[$todo->idvalue] . "(#$todo->idvalue)" : '';
                if($todo->type == 'task')                       $todo->name    = isset($tasks[$todo->idvalue]) ? $tasks[$todo->idvalue] . "(#$todo->idvalue)" : '';
                if(isset($todoLang->typeList[$todo->type]))     $todo->type    = $todoLang->typeList[$todo->type];
                if(isset($todoLang->priList[$todo->pri]))       $todo->pri     = $todoLang->priList[$todo->pri];
                if(isset($todoLang->statusList[$todo->status])) $todo->status  = $todoLang->statusList[$todo->status];
                if($todo->private == 1)                         $todo->desc    = $this->lang->todo->thisIsPrivate;

                /* drop some field that is not needed. */
                unset($todo->idvalue);
                unset($todo->private);
            }

            $this->post->set('fields', $fields);
            $this->post->set('rows', $todos);
            $this->post->set('kind', 'todo');
            $this->fetch('file', 'export2' . $this->post->fileType, $_POST);
        }

        $this->display();
    }

    /**
     * AJAX: get actions of a todo. for web app.
     * 
     * @param  int    $todoID 
     * @access public
     * @return void
     */
    public function ajaxGetDetail($todoID)
    {
        $this->view->actions = $this->loadModel('action')->getList('todo', $todoID);
        $this->display();
    }
}
