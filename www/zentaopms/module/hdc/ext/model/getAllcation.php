<?php
	/**
     * 获得allcation的字段
     * @param  [type] $type       [all,one]
     * @param  [type] $browseType [search condition]
     * @param  [type] $account    [account]
     * @return [type]             [return array]
     */
	public function getAllcation($type,$browseType,$account)
	{
		//查询
		if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;
            $hdcQuery = str_replace('`name`','t2.name',$hdcQuery);
            $hdcQuery = str_replace('`center_name`','t3.center_name',$hdcQuery);
            $hdcQuery = str_replace('`projectframe`','t4.name',$hdcQuery);
        }
        //查询数据
        $result = $this->dao->select("t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name")->from(TABLE_ALLOCATION)->alias('t1')
        		->leftJoin(TABLE_PROJECT)->alias('t2')
        		->on('t1.project_id = t2.id ')
                ->leftJoin(TABLE_DEVCENTER)->alias('t3')
                ->on('t1.ascenter_id = t3.id')
                ->leftJoin(TABLE_DEVCENTER)->alias('t6')
                ->on('t1.astestcenter_id = t6.id')
                ->leftJoin(TABLE_PROFRAMEWORK)->alias('t4')
                ->on('t1.frame_id = t4.id')
        		->where('t1.status')->eq(1)
                ->beginIF($type == 'one')->andWhere('t1.id')->eq($account)->fi()
                ->beginIF($type == 'project')->andWhere('t1.project_id')->eq($account)->limit(1)->fi()
                ->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
        		->fetchAll();
        
		return $result;
				  
	}