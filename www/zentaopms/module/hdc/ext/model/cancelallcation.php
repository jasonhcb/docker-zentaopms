<?php
	/**
	 * edit the allcation
	 * @param  id $allcationid allcation_id
	 * @return return              array
	 */		
	public function cancelallcation($allcationid)
	{
		//修改数据
		$allcationdone = $this->dao->update(TABLE_ALLOCATION)
							->set('applystatus')->eq('C')
							->set('assignstatus')->eq('NA')
							->where('id')->eq($allcationid)
							->exec();
	}