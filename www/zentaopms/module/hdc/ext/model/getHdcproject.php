<?php
	/*
		get the only one user data 
	 */
	public function getHdcproject($project='')
	{
		//查询基础数据
        $result = $this->dao->select('count(*) totalcount,ROUND(SUM(`totalManday`),1) sumary')->from(TABLE_HDC)
        					->where('project')->eq($project)
        					->fetch();
        // echo $this->dao->get();
		return $result;			  
	}