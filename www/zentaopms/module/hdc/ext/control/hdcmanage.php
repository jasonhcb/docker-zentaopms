<?php
	class hdc extends control{

		public function hdcmanage($browseType='unactivated')
		{
			//转小写执行query，赋值URL，执行查询条件
			$browseType = strtolower($browseType);
			$queryID = ($browseType == 'bysearch') ? (int) $param : 0;
			$actionURL = $this->createLink('hdc', 'hdcmanage', "browseType=bySearch&queryID=myQueryID");
			$this->hdc->buildSearchForm('','', $queryID, $actionURL);
			$account = $this->app->user->account;
			$center = $this->hdc->getManage($account,$browseType);
			$this->view->center = $center;
			//权限判断
			$role = array(1,21);
			$roleok = $this->hdc->getroleok($role);
			$this->view->roleok = $roleok;
			
			$this->view->position[] = $this->lang->hdc->manage;
			$this->view->browseType = $browseType;
			$this->display();
		}

	}