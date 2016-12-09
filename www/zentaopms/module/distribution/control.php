<?php

class distribution extends control
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('dept');
        $this->loadModel('release');
    }
    public $products = array();

    public function index($browseType="index",$param = 0,$orderBy='', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        // $this->distribution->setMenu($this->products, $productID);
        $browseType = strtolower($browseType);
        $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        $actionURL = $this->createLink('distribution', 'index', "browseType=bySearch&queryID=myQueryID");
        $this->distribution->buildSearchForm('','', $queryID, $actionURL);
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);
        $sort = $this->loadModel('common')->appendOrder($orderBy);

        $this->view->param = $param;
        $this->view->pager = $pager;
        $this->view->orderBy = $orderBy;
        $this->view->title      ='禅道PMS::浏览发布';
        $this->view->releases   = $this->distribution->getList($pager,$browseType,$queryID,$sort);
        $this->view->browseType = $browseType;
        $this->display();
    }

    public function apply($productID,$release = 0,$branch=0)
    {
        $this->distribution->setMenu($this->products, $productID);
        if ($_POST)
        {
            $createID = $this->distribution->apply();
            echo js::alert($createID."申请成功,请等待领导审批");
            die(js::locate($this->createLink('distribution','browse')));
        }
        $this->view->title      ='禅道PMS::申请分发';
        $this->view->poUsers    = $this->loadModel('user')->getPairs('nodeleted|pofirst|noclosed');
        $this->view->release    = $release;
        $this->view->productID  = $productID;
        $this->view->releases   = $this->distribution->getreleaselist($productID, $branch);
        $this->view->depts      = $this->dept->getOptionMenu();
        $this->view->product    = $this->dao->select('name')->from('zentao.zt_product')->where('id')->eq($productID)->fetch('name');
        $this->display();
    }
    public function browse($productID = 1, $branch = 0)
    {
        $this->distribution->setMenu($this->products, $productID);
        $this->view->title     = '禅道PMS::我的分发';
        $this->view->applyinfo = $this->distribution->getapplyinfo($productID);
        $this->display();
    }
    public function savedownload($productID,$release)
    {
        $fileName = "";
        $fileID = $this->dao->select('id')->from('zentao.zt_file')->where('objectID')->eq($release)->fetch('id');
        if ($fileID)
        {
            $user = $this->app->user->account;
            $time = date("Y-m-d H:i:s");
            $this->distribution->savedownload($productID,$release, $user, $time);
            $this->locate($this->createLink('file', 'download', 'fileID=' . $fileID));
        }
        else
        {
            echo $r=js::confirm("这个发布没有可用于下载的文件");
            die(js::locate('back'));
        }
    }
    public function download($optid)
    {
        if (!empty($_POST)) {
            $this->distribution->checkcsicode($optid);
            
            if(dao::isError()) die(js::error(dao::getError()));
            // die(js::locate($this->createLink('correspondent', 'index'), 'parent'));
        }
        $this->display();
    }
    public function view($productID=1,$viewid='')
    {
        if(empty($viewid))
        {
            die(js::locate($this->createLink('distribution', 'browse')));
        }
        $this->distribution->setMenu($this->products, $productID);
        $this->view->applyinfo = $this->distribution->getviewinfo($viewid);
        $this->display();
    }

    public function detail($optid)
    {
        $details = $this->distribution->getbutionbyid($optid);
        $this->view->detail = $details->desc;
        $this->display();
    }

    public function downloads($productID = 1, $branch= 0)
    {
        $this->distribution->setMenu($this->products, $productID);
        $this->view->title     = '禅道PMS::下载历史';
        $this->view->downloads = $this->distribution->getdownloadList($productID);
        $this->display();
    }
}
