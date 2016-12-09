<?php

class report extends control
{

    public function productStatistics($orderBy = 'order_desc',$type = '',$productname = '',$projectname = '',$recTotal = 0, $recPerPage = 20, $pageID = 1)
    {

        //分页：
        /* Load pager and get tasks. */
        // $this->app->loadClass('pager', $static = true);
        // if($this->app->getViewType() == 'mhtml') $recPerPage = 10;
        // $pager = new pager($recTotal, $recPerPage, $pageID);

        $productname = addslashes(trim(urldecode($productname)));
        $projectname = addslashes(trim(urldecode($projectname)));
        // echo $productname;
        $this->view->title      = $this->lang->report->productStatistics;
        $this->view->position[] = $this->lang->report->productStatistics;
        $this->view->productname = $productname;
        $this->view->objectname = $projectname;

        $this->view->statistics = $this->report->getProductStatisticst($orderBy, $type,$productname,$projectname);
        //计数
        // $count = $this->report->getProductStatisticst($orderBy, $type,$productname,$projectname);

        $this->view->submenu  = 'product';
        $this->view->orderBy      = $orderBy;
        $this->view->type = $type;
        // $pager->recTotal = count($count);
        // $this->view->pager      = $pager;
        // $this->view->productname = $productname;
        $this->display();
    }

}
