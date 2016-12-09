<?php
	class hdc extends control{

		public function usersync($hdcid='')
		{
			//同步数据处理
			echo "同步中，请稍后";
			$this->hdc->usersync($hdcid);
			die(js::locate($this->createLink('hdc', 'centerall',"browseType=unactivated&hdcID=$hdcid"), 'parent'));

		}
	}