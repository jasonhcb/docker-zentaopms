<?php
	/**
	* 	增加中心管理人员	
	* 	author :hechubo
	*/
	class hdc extends control	
	{
		public function allcationedit($allcationid)
		{	
			if (!empty($_POST)){
				$this->hdc->editallcation($allcationid);
				if(dao::isError()) die(js::error(dao::getError()));
				die(js::locate($this->createLink('hdc', 'hdcallcation',"&browseType=allcation"), 'parent'));
				exit;
			}
			/*   获得当前数据  */
			$curent = $this->hdc->getAllcation('one','',$allcationid);
			//项目列表
			$projects = $this->hdc->getpairs();
			//中心选择
			$centertemp = $this->hdc->getCenterByid('','','all');
			$center[0] = '';
			foreach ($centertemp as $key => $value) {
				$center[$value->id] = $value->center_name;
			}

			// $frame[0] = ' ';
			if ($_GET['frames']) {
				$center_id = $_GET['frames'];
				// $temp->frame = $this->hdc->getFrameByid($center_id);
				$temp->deptuser = $this->hdc->getDeptuser($center_id);
				echo json_encode($temp);
				exit;
			}
			//框架列表
			if (!empty($curent[0]->ascenter_id)) {
				$center_id = $curent[0]->ascenter_id;
				// $arr = $this->hdc->getFrameByid($center_id);
				$tpp = $this->hdc->getDeptuser($center_id);
				// foreach ($arr as $key => $value) {
				// 	$frame[$value->id] = $value->name;
				// }
				foreach ($tpp as $k => $val) {
					$deptuser[$val->account] = $val->username;
				}

			}else{
				$deptuser[''] = '';
			}

			if (!empty($curent[0]->astestcenter_id)) {
				$center_id = $curent[0]->astestcenter_id;
				// $arr = $this->hdc->getFrameByid($center_id);
				$tpp = $this->hdc->getDeptuser($center_id);
				// foreach ($arr as $key => $value) {
				// 	$frame[$value->id] = $value->name;
				// }
				foreach ($tpp as $k => $val) {
					$depttestuser[$val->account] = $val->username;
				}

			}else{
				$depttestuser[''] = '';
			}
			//用户
			$nowuser = $this->app->user->account;
			//框架列表
			$tempframe = $this->hdc->getframebyid('','','admin');
			foreach ($tempframe as $key => $value) {
				$framework[$value->id] = $value->name;
			}
			
			$this->loadModel('user');
			$users = $this->user->getPairs('noclosed, nodeleted, devfirst');
			$this->view->user = $users;
			$this->view->listcomfim = $nowuser;
			$this->view->data = $curent[0];
			$this->view->projects      = $projects;
			$this->view->center = $center;
			$this->view->frame = $framework;
			$this->view->deptuser = $deptuser;
			$this->view->depttestuser = $depttestuser;
			$this->view->position[] = $this->lang->hdc->editcation;
			$this->display();
		}


	}