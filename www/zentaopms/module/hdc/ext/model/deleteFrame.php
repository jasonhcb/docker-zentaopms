<?php
	/*
		get the only one center data 
	 */
	public function deleteFrame($editid)
	{
		//查询基础数据
		$this->dao->delete()->from(TABLE_PROFRAMEWORK)
					->where('id')->eq($editid)
					->exec();	  
	}