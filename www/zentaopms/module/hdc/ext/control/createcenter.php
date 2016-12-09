<?php
	class hdc extends control{

		public function createcenter()
		{
			//处理POST来的数据
			if (!empty($_POST)) {
				//数据验证：
				$this->hdc->createcenter();
				if(dao::isError()) die(js::error(dao::getError()));
				die(js::locate($this->createLink('hdc', 'hdcmanage'), 'parent'));
			}
			$temp  = $this->hdc->getFrameByid('','','admin');
			// var_dump($temp);
			$centerframe[0] = '';
			$description[0] = '';
			foreach ($temp as $key => $value) {
				$centerframe[$value->id] = $value->name;
				$description[$value->id] = $value->description;
			}
			if ($_GET['addfield']) {
				$field = "<tr><th>".$this->lang->hdc->centerframe ."</th><td>". html::select('centerframe[]',$centerframe,'', "class='form-control chosen'")."</td><td class='require_td' style='width: 20px'>*</td><td>". html::select('framedescription[]',$description,'', "class='form-control' placeholder='项目技术框架说明' disabled='true'")."</td></tr>";

				echo json_encode($field);
				exit;
			}
			$this->loadModel('user');
			$this->loadModel('dept');
			$users = $this->user->getPairs('noclosed, nodeleted, devfirst');
			$this->view->centerframes = $centerframe;
			$this->view->description = $description;
			$this->view->depts   = array('' => '') + $this->loadModel('dept')->getOptionMenu();
			$this->view->members = $users;
			$this->display();
		}
	}