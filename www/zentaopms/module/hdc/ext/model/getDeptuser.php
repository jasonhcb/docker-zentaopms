<?php
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