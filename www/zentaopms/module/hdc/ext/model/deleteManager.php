<?php
	/*
		get the only one center data 
	 */
	public function deleteManager($editid)
	{
		$is_valid = $this->dao->select('*')->from(TABLE_CENTERUSER)->where('id')->eq($editid)->fetch('is_valid');
		//查询基础数据
		if ($is_valid == '1') {
			$this->dao->update(TABLE_CENTERUSER)
					->set('is_valid')->eq('0')
					->where('id')->eq($editid)
					->exec();	 
		}else{
			$this->dao->update(TABLE_CENTERUSER)
					->set('is_valid')->eq('1')
					->where('id')->eq($editid)
					->exec();	 
		}
	}