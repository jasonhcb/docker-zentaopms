<?php
helper::import('/Applications/MAMP/htdocs/ztp/zentaopms/module/hdc/model.php');
class tmpExthdcModel extends hdcModel 
{
/**
	 * edit the allcation
	 * @param  id $allcationid allcation_id
	 * @return return              array
	 */		
	public function cancelallcation($allcationid)
	{
		//修改数据
		$allcationdone = $this->dao->update(TABLE_ALLOCATION)
							->set('applystatus')->eq('C')
							->set('assignstatus')->eq('NA')
							->where('id')->eq($allcationid)
							->exec();
	}
/*
		check the data 
	 */
	public function createCenter()
	{
		if (empty($_POST['is_valid'])) {
			$_POST['is_valid'] = "0";
		}
		//数据验证组合
		$data_auto = fixer::input('post')
				->add('create_time',date("Y-m-d H:i:s", time()))
				->add('create_by',$this->app->user->account)
				->cleanint('manager_id,hr_id')
				->remove('centerframe')
				->get();
		//插入框架信息到框架表：
		$temp  = $this->getFrameByid();
			foreach ($temp as $key => $value) {
				$cef[$value->id] = $value->name;
				$des[$value->id] = $value->description;
			}
		$frame = new stdClass();
		$frame->name = $this->post->centerframe;
		// $frame->description = $this->post->centerframe;
		$nowtime= date("Y-m-d H:i:s", time());
		$create_by = $this->app->user->account;
		foreach ($frame->name as $key => $value) {
			if (empty($value)) {
			dao::$errors['error'] = "技术框架为空";
			return false;
			}
		}
		//检查框架唯一性
		$codeexits = $this->dao->select('center_name')->from(TABLE_DEVCENTER)
					->where('center_code')->eq($this->post->center_code)->fetch();
		if ($codeexits) {
			dao::$errors['error'] = "开发中心已经存在";
			return false;
		}
		//检查数据表单
		$this->dao->begin();//开启事务
		$insdev = $this->dao->insert(TABLE_DEVCENTER)->data($data_auto)
			->autocheck()
			->batchCheck('center_code,center_name,manager_id,hr_id','notempty')
			->exec();
		$center_id =  $this->dao->lastInsertID();
		//只能用for批量了，开启事务之后操作
		for ($i=0; $i < count($frame->name); $i++) { 
			 $insframe = $this->dao->insert(TABLE_PROFRAMEWORK)
						->set('name')->eq($cef[$frame->name[$i]])
						->set('description')->eq($des[$frame->name[$i]])
						->set('create_time')->eq($nowtime)
						->set('create_by')->eq($create_by)
						->set('center_id')->eq($center_id)
						->exec();
		}
		$dept_id = $this->post->hr_id;
		//同步人员信息到人员表中
		$heheda =  $this->dao->select('@create_by:='.$create_by.' AS create_by,now() as create_time,@hr_id:='.$dept_id.' as hr_id,t1.dept,t1.realname,t1.account')
				->from(TABLE_USER)->alias('t1')
				->leftJoin(TABLE_DEPT)->alias('t2')
				->on('t1.dept = t2.id')
				->where('t1.dept')->eq($dept_id)
				->orwhere('t1.dept')
				->query();

		$sql = $this->dao->get().' in (select id from zt_dept where parent = '.$dept_id.')';
		$data_temp = $this->dao->query($sql)->fetchALL();
		$inssql = 'insert into zt_centeruser(create_by,create_time,hr_id,dep_id,username,account)('.$this->dao->get().')';
		$finaldata = $this->dao->query($inssql);
		if ($insdev && $insframe && $finaldata) {
			$this->dao->commit();//提交
		}else{
			$this->dao->rollback();//回滚
		}
		
	}
/*
		check the data 
	 */
	public function createFrame($center_id)
	{
		//数据验证组合
		//框架名称不能为空
		$temp  = $this->getFrameByid();
		foreach ($temp as $key => $value) {
			$cef[$value->id] = $value->name;
			$des[$value->id] = $value->description;
		}
		$frame = new stdClass();
		$frame->name = $this->post->centerframe;
		// $frame->description = $this->post->framedescription;
		$nowtime= date("Y-m-d H:i:s", time());
		$create_by = $this->app->user->account;

		foreach ($frame->name as $key => $value) {
			if (empty($value)) {
				dao::$errors['error'] = "技术框架为空";
				return false;
			}
			//框架是否重复
			$frameexits = $this->dao->select('center_id')->from(TABLE_PROFRAMEWORK)->where('center_id')->eq($center_id)->andwhere('name')->eq($cef[$value])->fetch();
			if ($frameexits) {
				dao::$errors['error'] = "技术框架已经存在，无需重复加入";
				return false;
			}
		}
		//开启事务操作
		$this->dao->begin();
		for ($i=0; $i < count($frame->name); $i++) { 
			 $insframe = $this->dao->insert(TABLE_PROFRAMEWORK)
						->set('name')->eq($cef[$frame->name[$i]])
						->set('description')->eq($des[$frame->name[$i]])
						->set('create_time')->eq($nowtime)
						->set('create_by')->eq($create_by)
						->set('center_id')->eq($center_id)
						->exec();
		}
		$this->dao->commit();
		
	}
/*
		check the data 
	 */
	public function createUser($hrdid)
	{
		//数据验证组合
		$nowtime = date('Y-m-d H:i:s',time());
		$createruser = $this->app->user->account;
		//查重复
		$distinc = $this->dao->select('*')->from(TABLE_CENTERUSER)->where('account')->eq($this->post->account)->andwhere('hr_id')->eq($hrdid)->fetch();
		if ($distinc) {
			dao::$errors['error'] = "该用户已经存在本中心";
			return false;
		}
		//查询名称
		$name = $this->dao->select('realname')->from(TABLE_USER)->where('account')->eq($this->post->account)->fetch('realname');
		$data  = fixer::input('post')
				->add('create_time',$nowtime)
				->add('create_by',$createruser)
				->add('fromway',0)
				->add('hr_id',$hrdid)
				->add('username',$name)
				->cleanint('manager_id,account,dep_id,fromway')
				->get();

		$this->dao->insert(TABLE_CENTERUSER)->data($data)
				->autocheck()
				->batchCheck('manager_id,account,dep_id','notempty')
				->exec();
	}
/*
		check the data 
	 */
	public function createcation()
	{
		$this->loadModel('user');
		$users = $this->user->getPairs('noclosed, nodeleted, devfirst');
		//数据验证
		$nowtime = date("Y-m-d H:i:s", time());
		$account = $this->app->user->account;
		$data_auto = fixer::input('post')
					->add('create_time',$nowtime)
					->add('create_user',$users[$account])
					->setIF($this->post->cto_id != '', 'cto_id', $users[$this->post->cto_id]) 
					->setIF($this->post->spotcto_id != '', 'spotcto_id', $users[$this->post->spotcto_id]) 
					->add('applystatus','N')
					->add('assignstatus','N')
					->add('uat_datecopy',$this->post->uat_date)
					->add('online_datecopy',$this->post->online_date)
					->cleanint('project_id')
					->get();
		//插入数据
		$result = $this->dao->insert(TABLE_ALLOCATION)->data($data_auto)
					->batchCheck('project_id','notempty')
					->exec();
	}
/*
		check the data 
	 */
	public function createmanager($hdcid)
	{
		if (empty($_POST['is_valid'])) {
			$_POST['is_valid'] = "0";
		}
		//数据验证组合
		$nowtime = date('Y-m-d H:i:s',time());
		$createruser = $this->app->user->account;
		$checkifexit	= $this->dao->select('account')->from(TABLE_CENTERUSER)
						->where('account')->eq($this->post->account)
						->andwhere('hr_id')->eq($hdcid)
						->andwhere('is_manager')->eq(1)
						->fetch();
		if ($checkifexit) {//有重复数据不能插入
			dao::$errors['error'] = "数据重复,无需重复录入";
			return false;
		}
		$data   = fixer::input('post')
				->add('update_time',$nowtime)
				->add('create_by',$createruser)
				->add('is_manager',1)
				->get();
		$result = $this->dao->update(TABLE_CENTERUSER)->data($data)
				->autocheck()
				->batchCheck('account,route','notempty')
				->where('account')->eq($this->post->account)
				->andwhere('hr_id')->eq($hdcid)
				->limit(1)
				->exec();
		//加入权限组
		if ($this->post->is_valid != "0") {
		if ($result) {
			$this->dao->insert(TABLE_USERGROUP)
				 ->set('account')->eq($this->post->account)
				 ->set('group')->eq('22')
				 ->exec();
		}		
		}
	}
/*
		get the only one center data 
	 */
	public function deleteCenter($editid)
	{
		$is_valid = $this->dao->select('*')->from(TABLE_DEVCENTER)->where('id')->eq($editid)->fetch('is_valid');
		if ($is_valid == '1') {
			$this->dao->update(TABLE_DEVCENTER)
					->set('is_valid')->eq('0')
					->where('id')->eq($editid)
					->exec();	 
		}else{
			$this->dao->update(TABLE_DEVCENTER)
					->set('is_valid')->eq('1')
					->where('id')->eq($editid)
					->exec();	 
		}
	}
/*
		get the only one center data 
	 */
	public function deleteFrame($editid)
	{
		//查询基础数据
		$this->dao->delete()->from(TABLE_PROFRAMEWORK)
					->where('id')->eq($editid)
					->exec();	  
	}
/*
		get the only one center data 
	 */
	public function deleteManager($editid)
	{
		$is_valid = $this->dao->select('*')->from(TABLE_CENTERUSER)->where('id')->eq($editid)->fetch('is_valid');
		//查询基础数据
		if ($is_valid == '1') {
			$this->dao->update(TABLE_CENTERUSER)
					->set('is_valid')->eq('0')
					->where('id')->eq($editid)
					->exec();	 
		}else{
			$this->dao->update(TABLE_CENTERUSER)
					->set('is_valid')->eq('1')
					->where('id')->eq($editid)
					->exec();	 
		}
	}
/*
		get the only one center data 
	 */
	public function deleteuser($editid)
	{
		//查询基础数据
		$this->dao->delete()->from(TABLE_CENTERUSER)
					->where('id')->eq($editid)
					->exec();	  
	}
/*
		check the data 
	 */
	public function editCenter($hdcid)
	{
		if (empty($_POST['is_valid'])) {
			$_POST['is_valid'] = "0";
		}
		$create_by = $this->app->user->account;
		//数据验证组合
		$data_auto = fixer::input('post')
				->add('update_time',date("Y-m-d H:i:s", time()))
				->add('create_by',$create_by)
				->cleanint('manager_id,hr_id')
				->remove('centerframe,framedescription,fid')
				->get();
		//框架信息表
		$temp  = $this->getFrameByid();
		foreach ($temp as $key => $value) {
			$cef[$value->id] = $value->name;
			$des[$value->id] = $value->description;
		}
		$frame = new stdClass();
		$frame->id  = $this->post->fid;
		$frame->name = $this->post->centerframe;
		// $frame->description = $this->post->framedescription;
		$nowtime = date("Y-m-d H:i:s", time());
		foreach ($frame->name as $key => $value) {
			if (empty($value)) {
			dao::$errors['error'] = "技术框架为空";
			return false;
		}
		}
		//开启事务
		$this->dao->begin();
		//修改中心数据
		$centerdone = $this->dao->update(TABLE_DEVCENTER)->data($data_auto)->batchCheck('center_code,center_name,manager_id,hr_id','notempty')->where('id')->eq($hdcid)->limit(1)->exec();
		// 修改已有数据
		$cont = $this->dao->select('id')->from(TABLE_PROFRAMEWORK)->where('center_id')->eq($hdcid)->fetchAll();
		$all = count($cont);
		// for ($i=0; $i < $all; $i++) { 
		// 	$updatedone = $this->dao->update(TABLE_PROFRAMEWORK)
		// 				->set('name')->eq($frame->name[$i])
		// 				->set('description')->eq($frame->description[$i])
		// 				->set('update_time')->eq($nowtime)
		// 				->set('create_by')->eq($create_by)
		// 				->where('id')->eq($frame->id[$i])
		// 				->exec();
		// }
		//添加新有的数据
		$allc = count($frame->name);
		for ($j=$all; $j < $allc; $j++) { 
			$insertdone = $this->dao->insert(TABLE_PROFRAMEWORK)
						->set('name')->eq($cef[$frame->name[$j]])
						->set('description')->eq($des[$frame->name[$j]])
						->set('create_time')->eq($nowtime)
						->set('create_by')->eq($create_by)
						->set('center_id')->eq($hdcid)
						->exec();
		}
		$this->dao->commit();
	}
/**
	 * edit the allcation
	 * @param  id $allcationid allcation_id
	 * @return return              array
	 */		
	public function editallcation($allcationid)
	{
		$this->loadModel('user');
		$users = $this->user->getPairs('noclosed, nodeleted, devfirst');
		//数据验证
		if ($_POST['ascenter_id'] == '0') {
			$_POST['ascenter_id'] = '';
		}
		if ($_POST['assigntodevelop'] == '0') {
			$_POST['assigntodevelop'] = '';
		}
		if ($_POST['assigndate'] == '0') {
			$_POST['assigndate'] = '';
		}
		$nowtime = date("Y-m-d H:i:s", time());
		$oldresult = $this->dao->select('uat_datecopy,online_datecopy')->from(TABLE_ALLOCATION)->where('id')->eq($allcationid)->fetch();
		$account = $this->app->user->account;
		$data_auto = fixer::input('post')
					->add('update_time',$nowtime)
					->add('applystatus','S')
					->setIF($this->post->assigntodevelop != '' || $this->post->assigndate != '', 'applystatus', 'Y')
					->setIF($this->post->assigntodevelop != '' || $this->post->assigndate != '', 'listcomfim', $users[$account])
					->setIF($this->post->cto_id != '', 'cto_id', $users[$this->post->cto_id]) 
					->setIF($this->post->spotcto_id != '', 'spotcto_id', $users[$this->post->spotcto_id]) 
					->setIF($this->post->tech_manager != '', 'tech_manager', $users[$this->post->tech_manager]) 
					->setIF($this->post->test_manager != '', 'test_manager', $users[$this->post->test_manager]) 
					->setIF($this->post->ascenter_id != '', 'assignstatus', 'Y')
					->setIF($this->post->ascenter_id == '', 'assignstatus', 'N')
					->setIF($oldresult->uat_datecopy == '0000-00-00','uat_datecopy',$this->post->uat_date)
					->setIF($oldresult->online_datecopy == '0000-00-00','online_datecopy',$this->post->online_date)
					->remove('project_id,manager_id,applydate')
					->get();
		//修改数据
		$allcationdone = $this->dao->update(TABLE_ALLOCATION)->data($data_auto)
							->where('id')->eq($allcationid)
							->exec();
		//如果是Y确认就把当前的用户添加到项目用户里面
		if ($this->post->ascenter_id != '') {
			$arr['技术总监'] = $this->post->cto_id;//技术总监
			$arr['现场技术经理'] = $this->post->spotcto_id;//现场技术经理
			$arr['开发中心技术经理'] = $this->post->tech_manager;//开发中心技术经理
			$arr['开发中心测试经理'] = $this->post->test_manager;//开发中心测试经理
			$project_id = $this->post->project_id;
			$this->dao->begin();//开启事务
			foreach ($arr as $key => $value) {
				$temp_result = $this->dao->select('account')->from(TABLE_TEAM)->where('project')->eq($project_id)->andWhere('account')->eq($value)->fetch();//查询是否有数据
				if (!empty($temp_result)) {//如果有则update
					$this->dao->update(TABLE_TEAM)
								->set('role')->eq($key)
								->where('project')->eq($project_id)
								->andwhere('account')->eq($value)
								->exec();
				}else{ //没有就插入
					$this->dao->insert(TABLE_TEAM)
								->set('project')->eq($project_id)
								->set('account')->eq($value)
								->set('role')->eq($key)
								->set('join')->eq($nowtime)
								->exec();
				}
			}
			$this->dao->commit();
			
		}
	}
/*
		check the data 
	 */
	public function editmanager($hdcid)
	{
		if (empty($_POST['is_valid'])) {
			$_POST['is_valid'] = "0";
		}
		//数据验证组合
		$nowtime = date('Y-m-d H:i:s',time());
		$createruser = $this->app->user->account;
		$data  = fixer::input('post')
				->add('update_time',$nowtime)
				->add('create_by',$createruser)
				->remove('account')
				->get();

		$result = $this->dao->update(TABLE_CENTERUSER)->data($data)
				->autocheck()
				->batchCheck('account,route','notempty')
				->where('id')->eq($hdcid)
				->limit(1)
				->exec();
		$account = $this->dao->select('account')->from(TABLE_CENTERUSER)->where('id')->eq($hdcid)->fetch('account');
		if ($this->post->is_valid != "0") {
			if ($result) {
				$this->dao->insert(TABLE_USERGROUP)
				 	->set('account')->eq($account)
				 	->set('group')->eq('22')
				 	->exec();
			}		
		}
	}
/*
		get the only one user data 
	 */
	public function getAjaxmanager($project='')
	{
		//查询基础数据
        $result = $this->dao->select('t1.account,t2.realname')->from(TABLE_TEAM)->alias('t1')
        					->leftJoin(TABLE_USER)->alias('t2')
        					->on('t1.account = t2.account')
        					->where('t1.role')->eq('项目经理')
                            ->andwhere('t1.project')->eq($project)
        					->fetch();
        if (empty($result)) {
        	$result['account'] =  '';
        	$result['realname'] =  '';
        }
		return $result;			  
	}
/**
     * 获得allcation的字段
     * @param  [type] $type       [all,one]
     * @param  [type] $browseType [search condition]
     * @param  [type] $account    [account]
     * @return [type]             [return array]
     */
	public function getAllcation($type,$browseType,$account)
	{
		//查询
		if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;
            $hdcQuery = str_replace('`name`','t2.name',$hdcQuery);
            $hdcQuery = str_replace('`center_name`','t3.center_name',$hdcQuery);
            $hdcQuery = str_replace('`projectframe`','t4.name',$hdcQuery);
        }
        //查询数据
        $result = $this->dao->select("t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name")->from(TABLE_ALLOCATION)->alias('t1')
        		->leftJoin(TABLE_PROJECT)->alias('t2')
        		->on('t1.project_id = t2.id ')
                ->leftJoin(TABLE_DEVCENTER)->alias('t3')
                ->on('t1.ascenter_id = t3.id')
                ->leftJoin(TABLE_DEVCENTER)->alias('t6')
                ->on('t1.astestcenter_id = t6.id')
                ->leftJoin(TABLE_PROFRAMEWORK)->alias('t4')
                ->on('t1.frame_id = t4.id')
        		->where('t1.status')->eq(1)
                ->beginIF($type == 'one')->andWhere('t1.id')->eq($account)->fi()
                ->beginIF($type == 'project')->andWhere('t1.project_id')->eq($account)->limit(1)->fi()
                ->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
        		->fetchAll();
        
		return $result;
				  
	}
/*
		get the manage center data 
	 */
	public function getAllcationByid($account)
	{
        //查询数据
        $result = $this->dao->select("t1.id,t1.project_id,t1.frame_id,
        	substring_index(t1.manager_id, ':', -1) manager_id, 
        	t1.uat_date,t1.online_date,
        	substring_index(t1.cto_id, ':', -1) cto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_id,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
        	substring_index(t1.create_user, ':', -1) create_user,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,
        	substring_index(t1.tech_manager, ':', -1) tech_manager,
        	substring_index(t1.test_manager, ':', -1) test_manager,
        	t1.assignstatus,t1.assignnote,
        	t2.name")->from(TABLE_ALLOCATION)->alias('t1')
        		->leftJoin(TABLE_PROJECT)->alias('t2')
        		->on('t1.project_id = t2.id ')
        		->where('t1.status')->eq(1)
        		->fetchAll();
        
		return $result;
				  
	}
/*
		get the only one center data 
	 */
	public function getCenterbyid($editid,$account,$all)
	{
		//根据id查询基础数据
		if (!empty($editid)) {
			$result = $this->dao->select('id,center_name,center_code,manager_id,hr_id,is_valid')
							->from(TABLE_DEVCENTER)
							->where('id')->eq($editid)
							->fetch();
			//查询框架数据
			$frame = $this->dao->select('id,name,description')
							->from(TABLE_PROFRAMEWORK)
							->where('center_id')->eq($editid)
							->fetchAll();
			$result->frame = $frame;
		}
		//根据userid查询数据
		if (!empty($account)) {
			$result = $this->dao->select('t1.id')->from(TABLE_DEVCENTER)->alias('t1')
								->leftJoin(TABLE_CENTERUSER)->alias('t2')
								->on('t1.hr_id = t2.hr_id')
								->where('t2.account')->eq($account)
								->fetch('id');
		}
		//查所有的
		if (!empty($all)) {
			$result = $this->dao->select('id,center_name,center_code,hr_id')
							->from(TABLE_DEVCENTER)
							->fetchAll();
		}
		return $result;			  
	}
/*
		get the only one center data 
	 */
	public function getDeptuser($center_id,$hrid)
	{
		//查询基础数据
		$result = $this->dao->select('t1.username,t1.account,t1.route,t1.is_valid')
							->from(TABLE_DEVCENTER)->alias('t2')
							->leftJoin(TABLE_CENTERUSER)->alias('t1')
							->on('t2.hr_id = t1.hr_id')
							->beginIF(!empty($center_id))->where('t2.id')->eq($center_id)->FI()
							->beginIF(!empty($hrid))->where('t2.hr_id')->eq($hrid)->FI()
							->andwhere('t1.is_valid')->eq(1)
							->fetchAll();
		return $result;			  
	}
/*
		get the only one center data 
	 */
	public function getFrameByid($editid,$pager,$browseType)
	{
		//查询模块
		//查询
		if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;
        }
		//查询基础数据
		$result = $this->dao->select('id,name,description')->from(TABLE_PROFRAMEWORK)
							->where('status')->eq('1')
							->beginIF($browseType == 'admin')->andWhere('center_id')->eq(0)->fi()
							->beginIF($editid != '')->andwhere('center_id')->eq($editid)->fi()
							->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
							->page($pager)
							->fetchAll();
		return $result;			  
	}
/*
		get the only one user data 
	 */
	public function getHdcproject($project='')
	{
		//查询基础数据
        $result = $this->dao->select('count(*) totalcount,ROUND(SUM(`totalManday`),1) sumary')->from(TABLE_HDC)
        					->where('project')->eq($project)
        					->fetch();
        // echo $this->dao->get();
		return $result;			  
	}
/*
		get the manage center data 
	 */
	public function getManage($account,$browseType)
	{
		//查询
		if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;
        }
		//查询用户是否是管理员
		$is_manager = $this->dao->select('*')->from(TABLE_USERGROUP)
							->where('account')->eq($account)
							->andwhere('`group`')->in('1,21')
							->fetch();
		if ($is_manager) {//证明是管理员
			$result = $this->dao->select('t1.id,t1.hr_id,t1.center_name,t1.center_code,t1.is_valid,t2.realname,t3.name')->from(TABLE_DEVCENTER)->alias('t1')
					->leftJoin(TABLE_USER)->alias('t2')
					->on('t1.manager_id = t2.account')
					->leftJoin(TABLE_DEPT)->alias('t3')
					->on('t1.hr_id = t3.id')
					->where('t1.status')->eq('1')
					->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
					->fetchAll();
		}else{
			//如果非管理员那查自己创建的
			$result = $this->dao->select('t1.id,t1.hr_id,t1.center_name,t1.center_code,t1.is_valid,t2.realname,t3.name')->from(TABLE_DEVCENTER)->alias('t1')
					->leftJoin(TABLE_USER)->alias('t2')
					->on('t1.manager_id = t2.account')
					->leftJoin(TABLE_DEPT)->alias('t3')
					->on('t1.hr_id = t3.id')
					->where('t1.status')->eq('1')
					->andwhere('t1.create_by')->eq($account)
					->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
					->fetchAll();
		}
		return $result;
				  
	}
/*
		get the only one center data 
	 */
	public function getManagerByid($editid,$pager,$browseType,$sort)
	{
		//查询
		if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;
        }
		//查询基础数据
		$result = $this->dao->select('t1.id,t1.username,t1.account,t1.route,t1.is_valid')
							->from(TABLE_CENTERUSER)->alias('t1')
							->where('hr_id')->eq($editid)
							->andwhere('is_manager')->eq(1)
							->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
							->orderBy(trim($sort, ','))
							->page($pager)
							->fetchAll();
		return $result;			  
	}
/*
		get the only one user data 
	 */
	public function getPairs($mode='')
	{
		//查询基础数据
		//
		$projects = $this->dao->select('*, IF(INSTR(" done", status) < 2, 0, 1) AS isDone')->from(TABLE_PROJECT)
            ->where('iscat')->eq(0)
            ->andWhere('deleted')->eq(0)
            ->fetchAll();
        $pairs = array();
        $pairs[0] = '';
        foreach($projects as $project)
        {
            if(strpos($mode, 'noclosed') !== false and $project->status == 'done') continue;
            $pairs[$project->id] = $project->name;
        }
        if(strpos($mode, 'empty') !== false) $pairs[0] = '';

        /* If the pairs is empty, to make sure there's an project in the pairs. */
        if(empty($pairs) and isset($projects[0]))
        {
            $firstProject = $projects[0];
            $pairs[$firstProject->id] = $firstProject->name;
        }
		return $pairs;			  
	}
/*
		get the manage center data 
	 */
	public function getUndoneBycenter($account,$browseType)
	{
		//查询
		if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;

        }
		//查询用户是否是管理员
		$is_manager = $this->dao->select('*')->from(TABLE_USERGROUP)
							->where('account')->eq($account)
							->andwhere('`group`')->in('1,21')
							->fetch();
		//查询该员工的部门
		$center_id = $this->dao->select('t1.id')->from(TABLE_DEVCENTER)->alias('t1')
				->leftJoin(TABLE_CENTERUSER)->alias('t2')
				->on('t1.hr_id = t2.hr_id')
				->where('t2.account')->eq($account)
				->fetch('id');

		if ($is_manager) {//证明是管理员
			$result = $this->dao->select("t1.center_name,count(t2.hr_id) userall
				,(SELECT round(SUM(t4.codecmtManday),2) from zt_hdc as t4 WHERE t4.step in ('RequirementValidating','WaitingForRequirement','WaitingForReqValidation','WaitingForCoding','Coding') and t4.devOwnership = t1.center_code) undone
				,(SELECT round(SUM(t3.codecmtManday),2) from zt_hdc as t3 WHERE t3.step = 'Coding' and t3.devOwnership = t1.center_code) done")
					->from(TABLE_DEVCENTER)->alias('t1')
					->leftJoin(TABLE_CENTERUSER)->alias('t2')
					->on('t1.hr_id = t2.hr_id')
					->where('t1.status')->eq(1)
					->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
					->groupBy('t1.center_code')
					->fetchAll();
		}else{
			//如果非管理员那查自己创建的
			$result = $this->dao->select("t1.center_name,count(t2.hr_id) userall
				,(SELECT round(SUM(t4.codecmtManday),2) from zt_hdc as t4 WHERE t4.step in ('RequirementValidating','WaitingForRequirement','WaitingForReqValidation','WaitingForCoding','Coding') and t4.devOwnership = t1.center_code) undone
				,(SELECT round(SUM(t3.codecmtManday),2) from zt_hdc as t3 WHERE t3.step = 'Coding' and t3.devOwnership = t1.center_code) done")
					->from(TABLE_DEVCENTER)->alias('t1')
					->leftJoin(TABLE_CENTERUSER)->alias('t2')
					->on('t1.hr_id = t2.hr_id')
					->where('t1.status')->eq(1)
					->andwhere('t1.id')->eq($center_id)
					->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
					->groupBy('t1.center_code')
					->fetch();
		}
		return $result;
				  
	}
/*
		get the only one center data 
	 */
	public function getUserByid($editid,$pager,$browseType,$sort)
	{
		//查询
		if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;
            $hdcQuery = str_replace('`account`','t1.account',$hdcQuery);
        }
		//查询基础数据
		$result = $this->dao->select('t1.id,t1.username,t1.account,t1.fromway,t1.status,t2.name,t3.realname')
							->from(TABLE_CENTERUSER)->alias('t1')
							->leftJoin(TABLE_DEPT)->alias('t2')
							->on('t1.dep_id = t2.id')
							->leftJoin(TABLE_USER)->alias('t3')
							->on('t1.manager_id = t3.account')
							->where('hr_id')->eq($editid)
							->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
							->orderBy(trim($sort, ','))
							->page($pager)
							->fetchAll();
							
		foreach ($result as $key => $value) {
			if ($value->fromway == '1') {
				$result[$key]->fromway = '系统';
			}else{
				$result[$key]->fromway = '手工';
			}
			if ($value->status == '1') {
				$result[$key]->status = '正常';
			}
		}
		return $result;			  
	}
/*
		get the only one user data 
	 */
	public function getUsermanagerbyid($editid)
	{
		//查询基础数据
		$result = $this->dao->select('id,hr_id,account,route,is_valid,username')
							->from(TABLE_CENTERUSER)
							->where('id')->eq($editid)
							->fetch();
		return $result;			  
	}
/*
		get the only one center data 
	 */
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
/*
		get the only one center data 
	 */
	public function usersync($editid)
	{
		//删除基础数据
		$this->dao->delete()->from(TABLE_CENTERUSER)
					->where('hr_id')->eq($editid)
					->andwhere('fromway')->eq(1)
					->exec();	
		//重新导入基础数据
		$create_by = $this->app->user->account;
		$heheda =  $this->dao->select('@create_by:='.$create_by.' AS create_by,now() as create_time,@hr_id:='.$editid.' as hr_id,t1.dept,t1.realname,t1.account')
				->from(TABLE_USER)->alias('t1')
				->leftJoin(TABLE_DEPT)->alias('t2')
				->on('t1.dept = t2.id')
				->where('t1.dept')->eq($editid)
				->orwhere('t1.dept')
				->query();

		$sql = $this->dao->get().' in (select id from zt_dept where parent = '.$editid.')';
		$data_temp = $this->dao->query($sql)->fetchALL();
		$inssql = 'insert into zt_centeruser(create_by,create_time,hr_id,dep_id,username,account)('.$this->dao->get().')';
		$finaldata = $this->dao->query($inssql);
		//去重复数据
		$this->dao->select('a.account')->from(TABLE_CENTERUSER)->alias('a')->groupBy('a.account')->having("count(1) > 1")->query();
		$sqll = "delete from zt_centeruser where account in (select account from (".$this->dao->get().")as temtable)";
		$this->dao->query($sqll);

	}
//**//
}