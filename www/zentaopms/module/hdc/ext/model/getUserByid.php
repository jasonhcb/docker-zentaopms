<?php
	/*
		get the only one center data 
	 */
	public function getUserByid($editid,$pager,$browseType,$sort)
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
            $hdcQuery = str_replace('`account`','t1.account',$hdcQuery);
        }
		//查询基础数据
		$result = $this->dao->select('t1.id,t1.username,t1.account,t1.fromway,t1.status,t2.name,t3.realname')
							->from(TABLE_CENTERUSER)->alias('t1')
							->leftJoin(TABLE_DEPT)->alias('t2')
							->on('t1.dep_id = t2.id')
							->leftJoin(TABLE_USER)->alias('t3')
							->on('t1.manager_id = t3.account')
							->where('hr_id')->eq($editid)
							->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
							->orderBy(trim($sort, ','))
							->page($pager)
							->fetchAll();
							
		foreach ($result as $key => $value) {
			if ($value->fromway == '1') {
				$result[$key]->fromway = '系统';
			}else{
				$result[$key]->fromway = '手工';
			}
			if ($value->status == '1') {
				$result[$key]->status = '正常';
			}
		}
		return $result;			  
	}