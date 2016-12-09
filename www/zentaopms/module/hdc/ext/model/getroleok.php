<?php
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