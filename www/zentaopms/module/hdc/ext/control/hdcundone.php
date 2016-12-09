<?php
	class hdc extends control{

		public function hdcundone($browseType='unactivated',$orderBy = '')
		{
			$browseType = strtolower($browseType);
			//搜索条件
			$queryID = ($browseType == 'bysearch') ? (int) $param : 0;
			$actionURL = $this->createLink('hdc', 'hdcundone', "browseType=bySearch&queryID=myQueryID");
			$this->hdc->buildSearchForm('','', $queryID, $actionURL);
			//获得数据
			$account = $this->app->user->account;
			$data = $this->hdc->getUndoneBycenter($account,$browseType);
			$this->view->data = $data;
			//权限判断
			$role = array(1,21);
			$roleok = $this->hdc->getroleok($role);
			$this->view->roleok = $roleok;
        	$this->view->position[] = $this->lang->hdc->project_undone;
			$this->view->browseType = $browseType;
			$this->display();
		}
	}