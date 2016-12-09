<?php
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