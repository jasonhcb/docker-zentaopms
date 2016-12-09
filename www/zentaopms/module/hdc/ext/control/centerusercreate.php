<?php
	/**
	* 	增加中心管理人员	
	* 	author :hechubo
	*/
	class hdc extends control	
	{
		public function centerusercreate($hdcid)
		{
			if (!empty($_POST)) {
				$this->hdc->createUser($hdcid);
				if(dao::isError()) die(js::error(dao::getError()));
				die(js::locate($this->createLink('hdc', 'centerall',"&browseType=unactivated&hdcID=$hdcid"), 'parent'));
			}
			$this->loadModel('user');
			$this->loadModel('dept');
			$users = $this->user->getPairs();
			$this->view->depts   = array('' => '') + $this->loadModel('dept')->getOptionMenu();
			$this->view->members = $users;
			$this->view->position[] = $this->lang->hdc->createuser;
			$this->display();
		}


	}