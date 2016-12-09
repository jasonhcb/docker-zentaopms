<?php
	class hdc extends control{

		public function hdcallcation($browseType='allcation')
		{
			//转小写执行query，赋值URL，执行查询条件
			$browseType = strtolower($browseType);
			$queryID = ($browseType == 'bysearch') ? (int) $param : 0;
			$actionURL = $this->createLink('hdc', 'hdcallcation', "browseType=bySearch&queryID=myQueryID");
			$this->hdc->buildSearchForm('','', $queryID, $actionURL);
			// $account = $this->app->user->account;
			$allcation = $this->hdc->getAllcation('all',$browseType);
			$this->view->allcation = $allcation;
			//权限判断
			$role = array(1,21);
			$roleok = $this->hdc->getroleok($role);
			$this->view->roleok = $roleok;
			
        	$this->view->position[] = $this->lang->hdc->project_allocation;
			$this->view->browseType = $browseType;
			$this->display();
		}

	}