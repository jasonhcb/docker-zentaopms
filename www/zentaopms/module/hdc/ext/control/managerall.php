<?php
	class hdc extends control{

		public function managerall($browseType='unactivated',$hdcid='',$orderBy = '', $recTotal = 0, $recPerPage = 20, $pageID = 1)
		{
			$browseType = strtolower($browseType);
			$queryID = ($browseType == 'bysearch') ? (int) $param : 0;
			$actionURL = $this->createLink('hdc','managerall', "browseType=bySearch&queryID=$hdcid");
			$this->hdc->buildSearchForm('','', $queryID, $actionURL);
			$this->app->loadClass('pager', $static = true);
			$pager = new pager($recTotal, $recPerPage, $pageID);
			$sort = $this->loadModel('common')->appendOrder($orderBy);

			$user = $this->hdc->getManagerByid($hdcid,$pager,$browseType,$sort);
			$this->view->hdcid = $hdcid;
			$this->view->user = $user;
			//权限判断
			$role = array(1,21);
			$roleok = $this->hdc->getroleok($role);
			$this->view->roleok = $roleok;
			
        	$this->view->position[] = $this->lang->hdc->centerpeople;
			$this->view->browseType = $browseType;
			$this->view->pager = $pager;
			$this->view->orderBy = $orderBy;
			$this->display();

		}
	}