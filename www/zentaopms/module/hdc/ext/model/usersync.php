<?php
	/*
		get the only one center data 
	 */
	public function usersync($editid)
	{
		//删除基础数据
		$this->dao->delete()->from(TABLE_CENTERUSER)
					->where('hr_id')->eq($editid)
					->andwhere('fromway')->eq(1)
					->exec();	
		//重新导入基础数据
		$create_by = $this->app->user->account;
		$heheda =  $this->dao->select('@create_by:='.$create_by.' AS create_by,now() as create_time,@hr_id:='.$editid.' as hr_id,t1.dept,t1.realname,t1.account')
				->from(TABLE_USER)->alias('t1')
				->leftJoin(TABLE_DEPT)->alias('t2')
				->on('t1.dept = t2.id')
				->where('t1.dept')->eq($editid)
				->orwhere('t1.dept')
				->query();

		$sql = $this->dao->get().' in (select id from zt_dept where parent = '.$editid.')';
		$data_temp = $this->dao->query($sql)->fetchALL();
		$inssql = 'insert into zt_centeruser(create_by,create_time,hr_id,dep_id,username,account)('.$this->dao->get().')';
		$finaldata = $this->dao->query($inssql);
		//去重复数据
		$this->dao->select('a.account')->from(TABLE_CENTERUSER)->alias('a')->groupBy('a.account')->having("count(1) > 1")->query();
		$sqll = "delete from zt_centeruser where account in (select account from (".$this->dao->get().")as temtable)";
		$this->dao->query($sqll);

	}