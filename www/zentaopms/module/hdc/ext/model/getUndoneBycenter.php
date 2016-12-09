<?php
	/*
		get the manage center data 
	 */
	public function getUndoneBycenter($account,$browseType)
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
		//查询该员工的部门
		$center_id = $this->dao->select('t1.id')->from(TABLE_DEVCENTER)->alias('t1')
				->leftJoin(TABLE_CENTERUSER)->alias('t2')
				->on('t1.hr_id = t2.hr_id')
				->where('t2.account')->eq($account)
				->fetch('id');

		if ($is_manager) {//证明是管理员
			$result = $this->dao->select("t1.center_name,count(t2.hr_id) userall
				,(SELECT round(SUM(t4.codecmtManday),2) from zt_hdc as t4 WHERE t4.step in ('RequirementValidating','WaitingForRequirement','WaitingForReqValidation','WaitingForCoding','Coding') and t4.devOwnership = t1.center_code) undone
				,(SELECT round(SUM(t3.codecmtManday),2) from zt_hdc as t3 WHERE t3.step = 'Coding' and t3.devOwnership = t1.center_code) done")
					->from(TABLE_DEVCENTER)->alias('t1')
					->leftJoin(TABLE_CENTERUSER)->alias('t2')
					->on('t1.hr_id = t2.hr_id')
					->where('t1.status')->eq(1)
					->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
					->groupBy('t1.center_code')
					->fetchAll();
		}else{
			//如果非管理员那查自己创建的
			$result = $this->dao->select("t1.center_name,count(t2.hr_id) userall
				,(SELECT round(SUM(t4.codecmtManday),2) from zt_hdc as t4 WHERE t4.step in ('RequirementValidating','WaitingForRequirement','WaitingForReqValidation','WaitingForCoding','Coding') and t4.devOwnership = t1.center_code) undone
				,(SELECT round(SUM(t3.codecmtManday),2) from zt_hdc as t3 WHERE t3.step = 'Coding' and t3.devOwnership = t1.center_code) done")
					->from(TABLE_DEVCENTER)->alias('t1')
					->leftJoin(TABLE_CENTERUSER)->alias('t2')
					->on('t1.hr_id = t2.hr_id')
					->where('t1.status')->eq(1)
					->andwhere('t1.id')->eq($center_id)
					->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
					->groupBy('t1.center_code')
					->fetch();
		}
		return $result;
				  
	}