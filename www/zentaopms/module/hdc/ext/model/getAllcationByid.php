<?php
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