<?php
	class hdc extends control{

		public function deleteframe($hdcid='')
		{
			//删除，失效中心数据
			$this->hdc->deleteframe($hdcid);
			if ($this->server->ajax) {
				if (dao::isError()) {
					$response['result'] = 'fail';
					$response['message'] = dao::getError();
				}else{
					$response['result'] = 'success';
					$response['message'] = '';
				}
				$this->send($response);
			}
			die(js::locate($this->createLink('hdc', 'frameall',"browseType=unactivated&hdcID=$center_id"), 'parent'));
		}
	}