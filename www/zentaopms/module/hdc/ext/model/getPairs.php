<?php
	/*
		get the only one user data 
	 */
	public function getPairs($mode='')
	{
		//查询基础数据
		//
		$projects = $this->dao->select('*, IF(INSTR(" done", status) < 2, 0, 1) AS isDone')->from(TABLE_PROJECT)
            ->where('iscat')->eq(0)
            ->andWhere('deleted')->eq(0)
            ->fetchAll();
        $pairs = array();
        $pairs[0] = '';
        foreach($projects as $project)
        {
            if(strpos($mode, 'noclosed') !== false and $project->status == 'done') continue;
            $pairs[$project->id] = $project->name;
        }
        if(strpos($mode, 'empty') !== false) $pairs[0] = '';

        /* If the pairs is empty, to make sure there's an project in the pairs. */
        if(empty($pairs) and isset($projects[0]))
        {
            $firstProject = $projects[0];
            $pairs[$firstProject->id] = $firstProject->name;
        }
		return $pairs;			  
	}