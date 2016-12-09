<?php
	/**
	* 	增加中心管理人员	
	* 	author :hechubo
	*/
	class hdc extends control	
	{
		public function createframe($center_id='')
		{
			//处理POST来的数据
			if (empty($center_id)) {
				die(js::error("参数错误"));
			}
			if (!empty($_POST)) {
				//数据验证
				$this->hdc->createframe($center_id);
				if(dao::isError()) die(js::error(dao::getError()));
				die(js::locate($this->createLink('hdc', 'frameall',"browseType=unactivated&hdcID=$center_id"), 'parent'));
			}
			$temp  = $this->hdc->getFrameByid('','','admin');
			$centerframe[0] = '';
			$description[0] = '';
			foreach ($temp as $key => $value) {
				$centerframe[$value->id] = $value->name;
				$description[$value->id] = $value->description;
			}
			if ($_GET['addfield']) {
				$field = "<tr><th class='w-120px'>".$this->lang->hdc->centerframe ."</th><td>". html::select('centerframe[]',$centerframe,'', "class='form-control chosen'")."</td><td class='require_td' style='width: 20px'>*</td><td>". html::select('framedescription[]',$description,'', "class='form-control' placeholder='项目技术框架说明' disabled='true'")."</td></tr>";

				echo json_encode($field);
				exit;
			}
			$this->view->centerframes = $centerframe;
			$this->view->description = $description;
			$this->display();
		}


	}