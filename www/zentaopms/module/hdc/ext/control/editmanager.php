<?php
	/**
	* 	增加中心管理人员	
	* 	author :hechubo
	*/
	class hdc extends control	
	{
		public function editmanager($hdcid)
		{	
			$curent = $this->hdc->getusermanagerbyid($hdcid);
			if (!empty($_POST)){
				$this->hdc->editmanager($hdcid);
				if(dao::isError()) die(js::error(dao::getError()));
				die(js::locate($this->createLink('hdc', 'managerall',"&browseType=unactivated&hdcID=$curent->hr_id"), 'parent'));
				exit;
			}
			//获得当前数据
			$this->view->data = $curent;
			$this->loadModel('user');
			$users = $this->user->getPairs();
			$this->view->members = $users;
			$this->view->position[] = $this->lang->hdc->editmanager;
			$this->view->routetype = $this->lang->hdc->routetype;
			$this->display();
		}


	}