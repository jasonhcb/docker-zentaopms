<?php
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