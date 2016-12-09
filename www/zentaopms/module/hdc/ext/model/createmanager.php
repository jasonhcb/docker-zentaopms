<?php
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