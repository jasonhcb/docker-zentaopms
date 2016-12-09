<?php
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
    }
	
	public function create($productID, $projectID = 0, $build = 0)
    {
        if(!empty($_POST))
        {
            $taskID = $this->testtask->create();
            if(dao::isError()) die(js::error(dao::getError()));
            $actionID = $this->loadModel('action')->create('testtask', $taskID, 'opened');
            if($this->post->owner)
            {
                $this->sendmail($taskID, $actionID, 'opened');
            }
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
        $this->view->projects  = $projects;
        $this->view->productID = $productID;
        $this->view->builds    = $builds; 
        //$this->view->users     = $this->loadModel('user')->getPairs('noclosed|nodeleted|qdfirst');
        $project = $this->dao->select('project')->from(TABLE_PROJECTPRODUCT)->where('product')->eq($productID)->fetch();
        $this->view->users   = $this->loadModel('project')->getTeamMemberPairs($project->project, 'nodeleted');

        $this->display();
    }
}