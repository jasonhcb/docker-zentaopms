<?php
	/**
	* the model of correspondent create by jaosn 
	*/
	class correspondentModel extends model
	{
		public function create()
		{
			if (empty($_POST['cpyname']) || empty($_POST['project'] || empty($_POST['contractid']))) {
				dao::$errors['error'] = "公司名称,项目名称,合同编号不能为空";
				return false;
			}
			$postproject = $this->post->buyproject;
			foreach ($postproject as $key => $value) {
				if ($value == '') {
					unset($postproject[$key]);//去除空产品
				}
			}
			$postproject = array_unique($postproject);//去重
			//POST数据处理
			$data->buyproject = implode(",",$postproject);//将购买产品转化为字符串
			$this->loadModel('user');
			$users = $this->user->getPairs('nodeleted|noempty|noclosed');
			$data->promanager = $users[$this->post->promanager]; //连接姓名和工号

			$data->companyname  = $this->post->cpyname;
			$data->project_id   = $this->post->project;
			$data->protimebegan = $this->post->begantime;
			$data->protimeend	= $this->post->endtime;
			$data->contractid	= $this->post->contractid;
			$data->tel			= $this->post->tel;
			$data->email 		= $this->post->email;
			$data->create_time  = date('Y-m-d H:i:s',time());
			$data->create_by	= $this->app->user->account;
			//基础数据插入
			$base_data  = $this->dao->insert(TABLE_CUSTOME)->data($data)->exec();
			$lastid = $this->dao->lastInsertID();
			//提交审批流
			if (count($postproject) > 0) {
				$checks->buyproject = $data->buyproject;
				$checks->custome_id = $lastid;
				$checks->create_time = date('Y-m-d H:i:s',time());
				$check_data = $this->dao->insert(TABLE_APPROVAL)->data($checks)->exec();
			}
			return true;
		}

		public function buildSearchForm($projectID, $projects, $queryID, $actionURL) 
		{
        	$this->config->correspondent->search['actionURL'] = $actionURL;
        	$this->config->correspondent->search['queryID'] = $queryID;
        	//获得项目列表
        	$this->loadModel('project');
        	$projects = $this->project->getPairs('nocode');
        	$projects[''] = '';
        	$this->config->correspondent->search['params']['projects']['values'] = $projects;
        	$this->config->correspondent->search['params']['project']['values'] = array($projectID => $projects[''], 'all' => $this->lang->project->allProject);
        	//获得用户列表
        	$this->loadModel('user');
			$users = $this->user->getPairs('nodeleted|noempty|noclosed');
			$users[''] = '';
			$this->config->correspondent->search['params']['promanager']['values'] = $users;
			$this->config->correspondent->search['params']['applytor']['values'] = $users;
        	$this->loadModel('search')->setSearchParams($this->config->correspondent->search);
    	}

    	/**
    	 * 获得客户列表
    	 * @param  [type] $pager      分页
    	 * @param  [type] $browseType 类型
    	 * @param  [type] $queryID    查询条件
    	 * @param  [type] $sort       排序
    	 * @return [type]             对象
    	 */
    	public function getcustomelist($pager,$browseType,$queryID,$sort)
    	{
    		if ($browseType == 'bysearch') {
            	$query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            	if ($query) {
                	$this->session->set('correspondentQuery', $query->sql);
                	$this->session->set('correspondentForm', $query->form);
            	}
            	if ($this->session->correspondentQuery == false)
                	$this->session->set('correspondentQuery', ' 1 = 1');

					$correspondentQuery = $this->session->correspondentQuery;
            		$correspondentQuery = str_replace('`companyname`','t1.companyname',$correspondentQuery);
					$correspondentQuery = str_replace('`promanager`',"substring_index(t1.promanager, ':', 1)",$correspondentQuery);
            		$correspondentQuery = str_replace('`projects`','t1.project_id',$correspondentQuery);
        	}
        	$role = array(1);
        	$rk = $this->getroleok($role);
        	if ($rk == 'yes') {
        		$rolecheck = 'ok';
        	}
        	$basedata = $this->dao->select('t1.*,t2.name as projectname')->from(TABLE_CUSTOME)->alias('t1')
        					 ->leftJoin(TABLE_PROJECT)->alias('t2')->on('t1.project_id = t2.id')
        					 ->Where('t1.status')->eq(1)
        					 ->beginIF($rolecheck != 'ok')->andwhere('t1.create_by')->eq($this->app->user->account)->fi()
        					 ->beginIF($browseType == 'bysearch')->andWhere($correspondentQuery)->fi()
           					 // ->orderBy(trim($sort, ','))
            				 ->page($pager)
        					 ->fetchAll();
        	return $basedata;
    	}

    	public function getcustomebyid($id)
    	{
    		$result = $this->dao->select('t1.*,t2.name as projectname')->from(TABLE_CUSTOME)->alias('t1')
        					 ->leftJoin(TABLE_PROJECT)->alias('t2')->on('t1.project_id = t2.id')
        					 ->where('t1.id')->eq($id)
        					 ->andWhere('t1.status')->eq(1)
        					 ->fetch();
        	return $result;
    	}

    	public function edit($optid)
    	{
    		//获得old数据
    		$olddata = $this->getcustomebyid($optid);
    		$oldbuylist = explode(',',$olddata->buyproject);
    		if (empty($oldbuylist[0])) {
    			unset($oldbuylist[0]);
    		}
    		$postproject = $this->post->buyproject;
    		foreach ($postproject as $key => $value) {
				if ($value == '') {
					unset($postproject[$key]);//去除空产品
				}
			}
			if (empty($postproject)) {
				$postproject = array();
			}
    		//检查购买产品数据是否重复
    		$interlist = array_intersect($oldbuylist,$postproject);
    		$count = count($interlist);
    		if ($count>0) {
    			dao::$errors['error'] = "你无须重新购买重复产品";
				return false;
    		}
    		$this->loadModel('user');
			$users = $this->user->getPairs('nodeleted|noempty|noclosed');
    		//更新数据
    		$newdata = new stdClass();
    		$newdata->promanager = $users[$this->post->promanager]; //连接姓名和工号
    		$newdata->protimebegan  = $this->post->begantime;
    		$newdata->protimeend	= $this->post->endtime;
    		$newdata->tel = $this->post->tel;
    		$newdata->email = $this->post->email;

    		$newbuys = array_merge($postproject,$oldbuylist);
    		$newbuys = array_unique($newbuys);
    		$newdata->buyproject = implode(',',$newbuys);
    		$newdata->last_editor = $this->app->user->account;
    		$newdata->edit_time = date('Y-m-d H:i:s',time());
    		//基础数据修改
    		$this->dao->update(TABLE_CUSTOME)->data($newdata)->where('id')->eq($optid)->exec(); 
    		//提交审批流
    		if (count($postproject) > 0) {
    			$checks->buyproject = implode(',',$postproject);
				$checks->custome_id = $optid;
				$checks->create_time = date('Y-m-d H:i:s',time());
				$check_data = $this->dao->insert(TABLE_APPROVAL)->data($checks)->exec();
    		}
			return true;
    	}

    	public function delete($optid)
    	{
    		return $this->dao->update(TABLE_CUSTOME)->set('status')->eq(0)->where('id')->eq($optid)->exec();
    	}

    	public function getroleok($role)
		{
			// 权限确认
			$account = $this->app->user->account;
			$this->loadModel('group');
			$users = $this->group->getByAccount($account);
			foreach ($users as $key => $value) {
				if (in_array($value->id,$role)) {
					$roleok = "yes";				
				}
			}
			return $roleok;	  
		}

		public function getflow($pager,$browseType,$queryID,$sort,$type)
		{
			if ($browseType == 'bysearch') {
            	$query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            	if ($query) {
                	$this->session->set('correspondentQuery', $query->sql);
                	$this->session->set('correspondentForm', $query->form);
            	}
            	if ($this->session->correspondentQuery == false)
                	$this->session->set('correspondentQuery', ' 1 = 1');

					$correspondentQuery = $this->session->correspondentQuery;
            		$correspondentQuery = str_replace('`companyname`','t2.companyname',$correspondentQuery);
					$correspondentQuery = str_replace('`promanager`',"substring_index(t2.promanager, ':', 1)",$correspondentQuery);
            		$correspondentQuery = str_replace('`projects`','t2.project_id',$correspondentQuery);
            		$correspondentQuery = str_replace('`applytor`','t2.create_by',$correspondentQuery);
        	}
			$result = $this->dao->select('t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname')
						->from(TABLE_APPROVAL)->alias('t1')
						->leftJoin(TABLE_CUSTOME)->alias('t2')->on('t1.custome_id = t2.id')
						->leftJoin(TABLE_PROJECT)->alias('t3')->on('t2.project_id = t3.id')
						->leftJoin(TABLE_USER)->alias('t4')->on('t2.create_by = t4.account')
						->leftJoin(TABLE_DEPT)->alias('t5')->on('t4.dept = t5.id')
						->Where('t2.status')->eq(1)
						->beginIF($browseType == 'bysearch')->andWhere($correspondentQuery)->fi()
						->beginIF($browseType=='myflow')->andwhere('t2.create_by')->eq($this->app->user->account)->fi()
						->beginIF($type=='uncheck')->andwhere('t1.opinion')->eq(0)->fi()
						->beginIF($type=='hscheck')->andwhere('t1.opinion')->in(array(1,2))->fi()
						->orderBy('t1.id DESC')
						->page($pager)
						->fetchAll();
			$this->loadModel('user');
			$users = $this->user->getPairs('nodeleted|noempty|noclosed');
			$this->loadModel('distribution');
			$productlist = $this->distribution->getdistributionlist();
			foreach ($result as $key => $value) {
				//status
				$result[$key]->opinion = $this->lang->correspondent->statuslist[$value->opinion];
				//users
				$result[$key]->create_by = $users[$value->create_by];
				$result[$key]->editor = $users[$value->editor];
				//data
				if ($value->create_time == '0000-00-00 00:00:00') {
					$value->create_time = '';
				}
				if ($value->edit_time == '0000-00-00 00:00:00') {
					$value->edit_time = '';
				}
				if ($value->protimebegan == '0000-00-00') {
					$value->protimebegan = '';
				}
				if ($value->protimeend== '0000-00-00') {
					$value->protimeend = '';
				}
				//product
				$buylist = explode(',',$value->buyproject);
				foreach ($buylist as $k => $val) {
					$buylist[$k] = $productlist[$val];
				}
				$result[$key]->buyproject = implode(',',$buylist);
				unset($buylist);
			}
			return $result;
		}

		public function cancle($optid)
		{
			return $this->dao->update(TABLE_APPROVAL)->set('opinion')->eq(3)->where('id')->eq($optid)->exec();
		}

		public function passorrefuse($optid,$type)
		{
			switch ($type) {
				case 'pass':
					$opinion = 2;
					break;
				case 'refuse':
					$opinion = 1;
					break;
				default:
					$opinion = 0;
					break;
			}
			$base = $this->dao->update(TABLE_APPROVAL)
					->set('opinion')->eq($opinion)
					->set('editor')->eq($this->app->user->account)
					->set('edit_time')->eq(date('Y-m-d H:i:s',time()))
					->where('id')->eq($optid)->exec();//修改基础
			if ($base && $type=='pass') {
				//获得老数据
				$oldapproal = $this->dao->select('t1.id,t1.custome_id,t1.buyproject,t2.protimeend')->from(TABLE_APPROVAL)->alias('t1')
									->leftJoin(TABLE_CUSTOME)->alias('t2')->on('t1.custome_id = t2.id')
									->where('t1.id')->eq($optid)->fetch();
				$buyproject = explode(',',$oldapproal->buyproject);
				foreach ($buyproject as $key => $value) {
					$csidata = new stdClass();
					$csidata->user_id = $this->app->user->account;
					$csidata->release_id = $value;
					$csidata->custome_id = $oldapproal->custome_id;
					//生成CSI code
					$salt = "jason";// 只取前两个
					$csicode = $salt.time().$value;
					$csidata->csi_code = md5($csicode);
					$csidata->expire_date = $oldapproal->protimeend;
					$insd = $this->dao->insert(TABLE_CSICODE)->data($csidata)->exec();
					unset($csidata);
				}
			}
			return $base;
		}

		public function getcsicode($optid)
		{
			return $this->dao->select('*')->from(TABLE_CSICODE)->where('custome_id')->eq($optid)->andWhere('user_id')->eq($this->app->user->account)->fetchAll();
		}
	}