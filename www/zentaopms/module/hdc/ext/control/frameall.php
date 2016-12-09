<?php
	class hdc extends control{

		public function frameall($browseType='unactivated',$hdcid='',$orderBy = '', $recTotal = 0, $recPerPage = 20, $pageID = 1)
		{
			$browseType = strtolower($browseType);
			//搜索条件
			$queryID = ($browseType == 'bysearch') ? (int) $param : 0;
			$actionURL = $this->createLink('hdc', 'frameall', "browseType=bySearch&queryID=$hdcid");
			$this->hdc->buildSearchForm('','', $queryID, $actionURL);
			//分页
			$this->app->loadClass('pager', $static = true);
			$pager = new pager($recTotal, $recPerPage, $pageID);
			//获得数据
			$frame = $this->hdc->getFrameByid($hdcid,$pager,$browseType);
			//权限判断
			$role = array(1,21);
			$roleok = $this->hdc->getroleok($role);
			$this->view->roleok = $roleok;
			//视图
			$this->view->hdcid = $hdcid;
			$this->view->frame = $frame;
        	$this->view->position[] = $this->lang->hdc->framework;
			$this->view->browseType = $browseType;
			$this->view->pager = $pager;
			$this->display();

		}
	}