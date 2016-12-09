<?php
	/**
	* 	项目分配	
	* 	author :hechubo 8-13
	*/
	class hdc extends control	
	{
		public function createcation()
		{
			//动态获取经理信息
			if ($_GET['project']) {
				$project = $_GET['project'];
				$ajaxreturn['manager'] = $this->hdc->getAjaxmanager($project);
				$ajaxreturn['assinpro'] = $this->hdc->getHdcproject($project);
				echo json_encode($ajaxreturn);
				exit;
			}
			//处理创建数据
			if (!empty($_POST)) {
				$this->hdc->createcation();
				if(dao::isError()) die(js::error(dao::getError()));
				die(js::locate($this->createLink('hdc', 'hdcallcation'), 'parent'));
			}
			//项目列表
			$projects = $this->hdc->getpairs();
			$user = $this->app->user->account;
			//框架列表
			$tempframe = $this->hdc->getframebyid('','','admin');
			foreach ($tempframe as $key => $value) {
				$framework[$value->id] = $value->name;
			}
			//用户选择
			$this->loadModel('user');
			$users = $this->user->getPairs('noclosed, nodeleted, devfirst');
			//申请状态
			$this->view->statustype = $this->lang->hdc->statustype;
			//项目分配状态
			$this->view->assigntype = $this->lang->hdc->assigntype;
			//现在时间 and 当前用户
			$this->view->nowtime = date('Y-m-d',time());
			$this->view->nowuser = $user;
			$this->view->user = $users;
			$this->view->framework = $framework;
			$this->view->projects      = $projects;
			$this->view->position[] = $this->lang->hdc->createcation;
			$this->display();
		}


	}