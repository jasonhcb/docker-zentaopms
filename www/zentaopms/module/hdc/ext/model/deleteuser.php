<?php
	/*
		get the only one center data 
	 */
	public function deleteuser($editid)
	{
		//查询基础数据
		$this->dao->delete()->from(TABLE_CENTERUSER)
					->where('id')->eq($editid)
					->exec();	  
	}