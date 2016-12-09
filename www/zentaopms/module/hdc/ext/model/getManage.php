<?php
	/*
		get the manage center data 
	 */
	public function getManage($account,$browseType)
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
        }
		//查询用户是否是管理员
		$is_manager = $this->dao->select('*')->from(TABLE_USERGROUP)
							->where('account')->eq($account)
							->andwhere('`group`')->in('1,21')
							->fetch();
		if ($is_manager) {//证明是管理员
			$result = $this->dao->select('t1.id,t1.hr_id,t1.center_name,t1.center_code,t1.is_valid,t2.realname,t3.name')->from(TABLE_DEVCENTER)->alias('t1')
					->leftJoin(TABLE_USER)->alias('t2')
					->on('t1.manager_id = t2.account')
					->leftJoin(TABLE_DEPT)->alias('t3')
					->on('t1.hr_id = t3.id')
					->where('t1.status')->eq('1')
					->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
					->fetchAll();
		}else{
			//如果非管理员那查自己创建的
			$result = $this->dao->select('t1.id,t1.hr_id,t1.center_name,t1.center_code,t1.is_valid,t2.realname,t3.name')->from(TABLE_DEVCENTER)->alias('t1')
					->leftJoin(TABLE_USER)->alias('t2')
					->on('t1.manager_id = t2.account')
					->leftJoin(TABLE_DEPT)->alias('t3')
					->on('t1.hr_id = t3.id')
					->where('t1.status')->eq('1')
					->andwhere('t1.create_by')->eq($account)
					->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
					->fetchAll();
		}
		return $result;
				  
	}