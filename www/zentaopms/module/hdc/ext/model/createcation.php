<?php
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