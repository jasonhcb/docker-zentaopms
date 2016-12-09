<?php
	/*
		get the only one center data 
	 */
	public function deleteCenter($editid)
	{
		$is_valid = $this->dao->select('*')->from(TABLE_DEVCENTER)->where('id')->eq($editid)->fetch('is_valid');
		if ($is_valid == '1') {
			$this->dao->update(TABLE_DEVCENTER)
					->set('is_valid')->eq('0')
					->where('id')->eq($editid)
					->exec();	 
		}else{
			$this->dao->update(TABLE_DEVCENTER)
					->set('is_valid')->eq('1')
					->where('id')->eq($editid)
					->exec();	 
		}
	}