<?php
	/*
		get the only one user data 
	 */
	public function getAjaxmanager($project='')
	{
		//查询基础数据
        $result = $this->dao->select('t1.account,t2.realname')->from(TABLE_TEAM)->alias('t1')
        					->leftJoin(TABLE_USER)->alias('t2')
        					->on('t1.account = t2.account')
        					->where('t1.role')->eq('项目经理')
                            ->andwhere('t1.project')->eq($project)
        					->fetch();
        if (empty($result)) {
        	$result['account'] =  '';
        	$result['realname'] =  '';
        }
		return $result;			  
	}