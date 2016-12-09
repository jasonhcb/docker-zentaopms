<?php
	/*
		check the data 
	 */
	public function createFrame($center_id)
	{
		//数据验证组合
		//框架名称不能为空
		$temp  = $this->getFrameByid();
		foreach ($temp as $key => $value) {
			$cef[$value->id] = $value->name;
			$des[$value->id] = $value->description;
		}
		$frame = new stdClass();
		$frame->name = $this->post->centerframe;
		// $frame->description = $this->post->framedescription;
		$nowtime= date("Y-m-d H:i:s", time());
		$create_by = $this->app->user->account;

		foreach ($frame->name as $key => $value) {
			if (empty($value)) {
				dao::$errors['error'] = "技术框架为空";
				return false;
			}
			//框架是否重复
			$frameexits = $this->dao->select('center_id')->from(TABLE_PROFRAMEWORK)->where('center_id')->eq($center_id)->andwhere('name')->eq($cef[$value])->fetch();
			if ($frameexits) {
				dao::$errors['error'] = "技术框架已经存在，无需重复加入";
				return false;
			}
		}
		//开启事务操作
		$this->dao->begin();
		for ($i=0; $i < count($frame->name); $i++) { 
			 $insframe = $this->dao->insert(TABLE_PROFRAMEWORK)
						->set('name')->eq($cef[$frame->name[$i]])
						->set('description')->eq($des[$frame->name[$i]])
						->set('create_time')->eq($nowtime)
						->set('create_by')->eq($create_by)
						->set('center_id')->eq($center_id)
						->exec();
		}
		$this->dao->commit();
		
	}