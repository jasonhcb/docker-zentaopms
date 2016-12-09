<?php
	/**
	* 	取消申请	
	* 	author :hechubo
	*/
	class hdc extends control	
	{
		public function allcationcancel($allcationid)
		{	
			$this->hdc->cancelallcation($allcationid);
			if(dao::isError()) die(js::error(dao::getError()));
				die(js::locate($this->createLink('hdc', 'hdcallcation',"&browseType=allcation"), 'parent'));
				exit;
		}


	}