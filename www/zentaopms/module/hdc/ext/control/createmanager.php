<?php
	/**
	* 	增加中心管理人员	
	* 	author :hechubo
	*/
	class hdc extends control	
	{
		public function createmanager($hdcid)
		{	
			if (!empty($_POST)){
				$this->hdc->createmanager($hdcid);
				if(dao::isError()) die(js::error(dao::getError()));
				die(js::locate($this->createLink('hdc', 'managerall',"&browseType=unactivated&hdcID=$hdcid"), 'parent'));
				exit;
			}
			$tuser = $this->hdc->getDeptuser('',$hdcid);
			$users[''] = '';
			foreach ($tuser as $k => $val) {
					$users[$val->account] = $val->account.':'.$val->username;
				}
			$this->view->members = $users;
			$this->view->routetype = $this->lang->hdc->routetype;
			$this->view->position[] = $this->lang->hdc->createmanager;
			$this->display();
		}


	}