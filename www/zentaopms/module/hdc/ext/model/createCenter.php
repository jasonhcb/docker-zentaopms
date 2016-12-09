<?php
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