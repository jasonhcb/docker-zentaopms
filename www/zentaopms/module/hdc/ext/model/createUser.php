<?php
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