<?php
	/*
		check the data 
	 */
	public function editCenter($hdcid)
	{
		if (empty($_POST['is_valid'])) {
			$_POST['is_valid'] = "0";
		}
		$create_by = $this->app->user->account;
		//数据验证组合
		$data_auto = fixer::input('post')
				->add('update_time',date("Y-m-d H:i:s", time()))
				->add('create_by',$create_by)
				->cleanint('manager_id,hr_id')
				->remove('centerframe,framedescription,fid')
				->get();
		//框架信息表
		$temp  = $this->getFrameByid();
		foreach ($temp as $key => $value) {
			$cef[$value->id] = $value->name;
			$des[$value->id] = $value->description;
		}
		$frame = new stdClass();
		$frame->id  = $this->post->fid;
		$frame->name = $this->post->centerframe;
		// $frame->description = $this->post->framedescription;
		$nowtime = date("Y-m-d H:i:s", time());
		foreach ($frame->name as $key => $value) {
			if (empty($value)) {
			dao::$errors['error'] = "技术框架为空";
			return false;
		}
		}
		//开启事务
		$this->dao->begin();
		//修改中心数据
		$centerdone = $this->dao->update(TABLE_DEVCENTER)->data($data_auto)->batchCheck('center_code,center_name,manager_id,hr_id','notempty')->where('id')->eq($hdcid)->limit(1)->exec();
		// 修改已有数据
		$cont = $this->dao->select('id')->from(TABLE_PROFRAMEWORK)->where('center_id')->eq($hdcid)->fetchAll();
		$all = count($cont);
		// for ($i=0; $i < $all; $i++) { 
		// 	$updatedone = $this->dao->update(TABLE_PROFRAMEWORK)
		// 				->set('name')->eq($frame->name[$i])
		// 				->set('description')->eq($frame->description[$i])
		// 				->set('update_time')->eq($nowtime)
		// 				->set('create_by')->eq($create_by)
		// 				->where('id')->eq($frame->id[$i])
		// 				->exec();
		// }
		//添加新有的数据
		$allc = count($frame->name);
		for ($j=$all; $j < $allc; $j++) { 
			$insertdone = $this->dao->insert(TABLE_PROFRAMEWORK)
						->set('name')->eq($cef[$frame->name[$j]])
						->set('description')->eq($des[$frame->name[$j]])
						->set('create_time')->eq($nowtime)
						->set('create_by')->eq($create_by)
						->set('center_id')->eq($hdcid)
						->exec();
		}
		$this->dao->commit();
	}