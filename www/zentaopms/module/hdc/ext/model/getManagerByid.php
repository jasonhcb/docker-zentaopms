<?php
	/*
		get the only one center data 
	 */
	public function getManagerByid($editid,$pager,$browseType,$sort)
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
		//查询基础数据
		$result = $this->dao->select('t1.id,t1.username,t1.account,t1.route,t1.is_valid')
							->from(TABLE_CENTERUSER)->alias('t1')
							->where('hr_id')->eq($editid)
							->andwhere('is_manager')->eq(1)
							->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
							->orderBy(trim($sort, ','))
							->page($pager)
							->fetchAll();
		return $result;			  
	}