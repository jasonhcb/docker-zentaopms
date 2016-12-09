<?php
	/*
		get the only one center data 
	 */
	public function getFrameByid($editid,$pager,$browseType)
	{
		//查询模块
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
		$result = $this->dao->select('id,name,description')->from(TABLE_PROFRAMEWORK)
							->where('status')->eq('1')
							->beginIF($browseType == 'admin')->andWhere('center_id')->eq(0)->fi()
							->beginIF($editid != '')->andwhere('center_id')->eq($editid)->fi()
							->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
							->page($pager)
							->fetchAll();
		return $result;			  
	}