<?php
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