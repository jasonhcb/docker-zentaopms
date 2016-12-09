<?php
class distributionModel extends model
{

    # 查找当前产品的所有发布
    public function getList($pager,$browseType,$queryID,$sort)
    {
        if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('distributionQuery', $query->sql);
                $this->session->set('distributionForm', $query->form);
            }
            if ($this->session->distributionQuery == false)
                $this->session->set('distributionQuery', ' 1 = 1');

            $distributionQuery = $this->session->distributionQuery;
            $distributionQuery = str_replace('`productName`','t2.name',$distributionQuery);
            $distributionQuery = str_replace('`name`','t1.name',$distributionQuery);
            $distributionQuery = str_replace('`manager`','t4.realname',$distributionQuery);
            $distributionQuery = str_replace('`build`','t3.name',$distributionQuery);
            $distributionQuery = str_replace('`date`','t1.date',$distributionQuery);
        }
        //basedata 
        $basetmp = $this->dao->select('t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName')
            ->from(TABLE_RELEASE)->alias('t1')
            ->leftJoin(TABLE_PRODUCT)->alias('t2')->on('t1.product = t2.id')
            ->leftJoin(TABLE_BUILD)->alias('t3')->on('t1.build = t3.id')
            ->leftJoin(TABLE_USER)->alias('t4')->on('t2.po = t4.account')
            ->Where('t1.deleted')->eq(0)
            ->beginIF($browseType == 'bysearch')->andWhere($distributionQuery)->fi()
            // ->orderBy(trim($sort, ','))
            ->page($pager)
            ->fetchAll();

        foreach ($basetmp as $key => $value) {
            $basedata[$value->product]->productName = $value->productName;
            $basedata[$value->product]->manager = $value->manager;
            $basedata[$value->product]->build[] = $value;
        }
        return $basedata;
    }
    public function getmyList($productID=1, $branch = 0)
    {
        $relese_res=$this->dao->select('id,`release`')
            ->from('zentao.zt_distribute')
            ->where('applicant')->eq($this->app->user->account)
            ->andwhere('productID')->eq((int)$productID)
            ->fetchAll();

        foreach ($relese_res as $result)
        {
            $reslist[$result->id]=$result->release;
        }
        return $this->dao->select('t1.*, t2.name as productName, t3.name as buildName')
            ->from(TABLE_RELEASE)->alias('t1')
            ->leftJoin(TABLE_PRODUCT)->alias('t2')->on('t1.product = t2.id')
            ->leftJoin(TABLE_BUILD)->alias('t3')->on('t1.build = t3.id')
            ->where('t1.product')->eq((int)$productID)
            ->andwhere('t1.id')->in($reslist)
            ->beginIF($branch)->andWhere('t1.branch')->eq($branch)->fi()
            ->andWhere('t1.deleted')->eq(0)
            ->orderBy('t1.date DESC')
            ->fetchAll();
    }
    # 查找当前产品所有发布的名称
    public function getreleaselist($productID,$branch=0)
    {
        $releaselist = $this->dao->select('t1.*')
            ->from(TABLE_RELEASE)->alias('t1')
            ->leftJoin(TABLE_PRODUCT)->alias('t2')->on('t1.product = t2.id')
            ->leftJoin(TABLE_BUILD)->alias('t3')->on('t1.build = t3.id')
            ->where('t1.product')->eq((int)$productID)
            ->beginIF($branch)->andWhere('t1.branch')->eq($branch)->fi()
            ->andWhere('t1.deleted')->eq(0)
            ->orderBy('t1.date DESC')
            ->fetchAll();
        foreach($releaselist as $releaselist)
        {
            $lastMenu[$releaselist->id] = $releaselist->name;
        }
        return $lastMenu;
    }
    # 提交分发申请,申请资料写入
    public function apply()
    {
        $apply=$_POST;
        $this->dao->insert('zentao.zt_distribute')->data($apply)->exec();
    }
    # 记录每次下载信息
    public function savedownload($productID,$release,$user,$time)
    {
        $release_name = $this->dao->select('*')
            ->from('zentao.zt_release')
            ->where('id')->eq($release)
            ->fetch('name');
        $this->dao->insert('zentao.zt_download')
            ->set('staff')->eq($user)
            ->set('time')->eq($time)
            ->set('productID')->eq($productID)
            ->set('`release`')->eq($release_name)
            ->exec();
    }
    # 获取至今所有下载的信息
    public function getdownloadList($productID)
    {
        return $this->dao->select('*')
            ->from('zentao.zt_download')
            ->where('productID')->eq($productID)
            ->fetchAll();
    }
    # Set menu.
    public function setMenu($products, $productID, $branch = 0, $extra = '')
    {
        if($products and !isset($products[$productID]))
        {
            echo(js::alert($this->lang->distribution->accessDenied));
            die(js::locate('back'));
        }

        $currentModule = $this->app->getModuleName();
        $currentMethod = $this->app->getMethodName();

        $selectHtml = $this->select($products, $productID, $currentModule, $currentMethod, $extra, $branch);
        foreach($this->lang->distribution->menu as $key => $menu)
        {
            $replace = $key == 'list' ? $selectHtml : $productID;
            common::setMenuVars($this->lang->distribution->menu, $key, $replace);
        }
    }
    # Create the select code of products.
    public function select($products, $productID, $currentModule, $currentMethod, $extra = '', $branch = 0)
    {
        if(!$productID) return;

        setCookie("lastProduct", $productID, $this->config->cookieLife, $this->config->webRoot);
        $currentProduct = $this->getById($productID);
        $output = "<a id='currentItem' href=\"javascript:showDropMenu('product', '$productID', '$currentModule', '$currentMethod', '$extra')\">{$currentProduct->name} <span class='icon-caret-down'></span></a><div id='dropMenu'><i class='icon icon-spin icon-spinner'></i></div>";
        return $output;
    }

    # Get product by id.
    public function getById($productID)
    {
        return $this->dao->findById($productID)->from(TABLE_PRODUCT)->fetch();
    }

    public function getapplyinfo($productID)
    {
        return $this->dao->select('t1.*,t2.name as releasename,t3.name as deptname')
            ->from('zentao.zt_distribute')->alias('t1')
            ->leftJoin('zentao.zt_release')->alias('t2')->on('t1.release = t2.id')
            ->leftJoin('zentao.zt_dept')->alias('t3')->on('t1.department = t3.id')
            ->where('productID')->eq($productID)
            ->andwhere('applicant')->eq($this->app->user->account)
            ->fetchAll();
    }
    public function getviewinfo($viewid)
    {
        return $this->dao->select('t1.*,t2.name as releasename,t3.name as deptname')
            ->from('zentao.zt_distribute')->alias('t1')
            ->leftJoin('zentao.zt_release')->alias('t2')->on('t1.release = t2.id')
            ->leftJoin('zentao.zt_dept')->alias('t3')->on('t1.department = t3.id')
            ->where('t1.id')->eq($viewid)
            ->fetch();
    }

    public function buildSearchForm($projectID, $projects, $queryID, $actionURL) {
        $this->config->distribution->search['actionURL'] = $actionURL;
        $this->config->distribution->search['queryID'] = $queryID;
        $this->config->distribution->search['params']['project']['values'] = array($projectID => $projects[$projectID], 'all' => $this->lang->project->allProject);
        $this->config->distribution->search['params']['module']['values']  = $this->loadModel('tree')->getTaskOptionMenu($projectID, $startModuleID = 0);
        $this->loadModel('search')->setSearchParams($this->config->distribution->search);
    }

    /**
     * 获得分发列表，返回成选择
     * @return key value
     */
    public function getdistributionlist()
    {
        $releaselist = $this->dao->select('t1.*,t2.name as productname')
            ->from(TABLE_RELEASE)->alias('t1')
            ->leftJoin(TABLE_PRODUCT)->alias('t2')->on('t1.product = t2.id')
            ->leftJoin(TABLE_BUILD)->alias('t3')->on('t1.build = t3.id')
            ->beginIF($branch)->andWhere('t1.branch')->eq($branch)->fi()
            ->andWhere('t1.deleted')->eq(0)
            ->orderBy('t1.date DESC')
            ->fetchAll();
        $lastMenu[''] = '';
        foreach($releaselist as $releaselist)
        {
            $lastMenu[$releaselist->id] = $releaselist->productname."：".$releaselist->name;
        }
        return $lastMenu;
    }

    public function getbutionbyid($optid)
    {
        $basetmp = $this->dao->select('t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName')
            ->from(TABLE_RELEASE)->alias('t1')
            ->leftJoin(TABLE_PRODUCT)->alias('t2')->on('t1.product = t2.id')
            ->leftJoin(TABLE_BUILD)->alias('t3')->on('t1.build = t3.id')
            ->leftJoin(TABLE_USER)->alias('t4')->on('t2.po = t4.account')
            ->Where('t1.deleted')->eq(0)
            ->andWhere('t1.id')->eq($optid)
            ->fetch();
        return $basetmp;
    }

    public function checkcsicode($optid)
    {
        $result = $this->dao->select('expire_date as expdate')->from(TABLE_CSICODE)->where('release_id')->eq($optid)->andWhere('csi_code')->eq($this->post->CSIcode)->orderBy('expdate DESC')->fetch();
        if (empty($result)) {
            dao::$errors['error'] = "您的CSI编码错误";
            return false;
        }
        if(strtotime(date('Y-m-d',time())) > $result->expire_date) {
            dao::$errors['error'] = "您的CSI编码已经过期，请重新申请";
            return false;
        }
        return true;
    }
}
