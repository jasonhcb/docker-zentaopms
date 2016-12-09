<?php
	/**
	 * edit the allcation
	 * @param  id $allcationid allcation_id
	 * @return return              array
	 */		
	public function editallcation($allcationid)
	{
		$this->loadModel('user');
		$users = $this->user->getPairs('noclosed, nodeleted, devfirst');
		//数据验证
		if ($_POST['ascenter_id'] == '0') {
			$_POST['ascenter_id'] = '';
		}
		if ($_POST['assigntodevelop'] == '0') {
			$_POST['assigntodevelop'] = '';
		}
		if ($_POST['assigndate'] == '0') {
			$_POST['assigndate'] = '';
		}
		$nowtime = date("Y-m-d H:i:s", time());
		$oldresult = $this->dao->select('uat_datecopy,online_datecopy')->from(TABLE_ALLOCATION)->where('id')->eq($allcationid)->fetch();
		$account = $this->app->user->account;
		$data_auto = fixer::input('post')
					->add('update_time',$nowtime)
					->add('applystatus','S')
					->setIF($this->post->assigntodevelop != '' || $this->post->assigndate != '', 'applystatus', 'Y')
					->setIF($this->post->assigntodevelop != '' || $this->post->assigndate != '', 'listcomfim', $users[$account])
					->setIF($this->post->cto_id != '', 'cto_id', $users[$this->post->cto_id]) 
					->setIF($this->post->spotcto_id != '', 'spotcto_id', $users[$this->post->spotcto_id]) 
					->setIF($this->post->tech_manager != '', 'tech_manager', $users[$this->post->tech_manager]) 
					->setIF($this->post->test_manager != '', 'test_manager', $users[$this->post->test_manager]) 
					->setIF($this->post->ascenter_id != '', 'assignstatus', 'Y')
					->setIF($this->post->ascenter_id == '', 'assignstatus', 'N')
					->setIF($oldresult->uat_datecopy == '0000-00-00','uat_datecopy',$this->post->uat_date)
					->setIF($oldresult->online_datecopy == '0000-00-00','online_datecopy',$this->post->online_date)
					->remove('project_id,manager_id,applydate')
					->get();
		//修改数据
		$allcationdone = $this->dao->update(TABLE_ALLOCATION)->data($data_auto)
							->where('id')->eq($allcationid)
							->exec();
		//如果是Y确认就把当前的用户添加到项目用户里面
		if ($this->post->ascenter_id != '') {
			$arr['技术总监'] = $this->post->cto_id;//技术总监
			$arr['现场技术经理'] = $this->post->spotcto_id;//现场技术经理
			$arr['开发中心技术经理'] = $this->post->tech_manager;//开发中心技术经理
			$arr['开发中心测试经理'] = $this->post->test_manager;//开发中心测试经理
			$project_id = $this->post->project_id;
			$this->dao->begin();//开启事务
			foreach ($arr as $key => $value) {
				$temp_result = $this->dao->select('account')->from(TABLE_TEAM)->where('project')->eq($project_id)->andWhere('account')->eq($value)->fetch();//查询是否有数据
				if (!empty($temp_result)) {//如果有则update
					$this->dao->update(TABLE_TEAM)
								->set('role')->eq($key)
								->where('project')->eq($project_id)
								->andwhere('account')->eq($value)
								->exec();
				}else{ //没有就插入
					$this->dao->insert(TABLE_TEAM)
								->set('project')->eq($project_id)
								->set('account')->eq($value)
								->set('role')->eq($key)
								->set('join')->eq($nowtime)
								->exec();
				}
			}
			$this->dao->commit();
			
		}
	}