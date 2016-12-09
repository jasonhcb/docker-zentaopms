<?php
	/**
	* class create by jason 2016-11-08
	* solove the rdc custorms and distributuin 
	*/
	class correspondent extends control
	{
		
		public function __construct()
		{
			 parent::__construct();
		}

		/**
		 * 客户列表
		 * @param  string  $browseType 类型
		 * @param  string $param       参数
		 * @param  string  $orderBy    排序
		 * @param  integer $recTotal   分页总数
		 * @param  integer $recPerPage 每页显示
		 * @param  integer $pageID     页码
		 * @return                     页面渲染
		 */	
		public function index($browseType='customerlist',$param = 0,$orderBy='', $recTotal = 0, $recPerPage = 20, $pageID = 1)
		{

			$browseType = strtolower($browseType);//大小写忽略
			$queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        	$actionURL = $this->createLink('correspondent', 'index', "browseType=bySearch&queryID=myQueryID");
        	$this->correspondent->buildSearchForm('','', $queryID, $actionURL);
        	$this->app->loadClass('pager', $static = true);
        	$pager = new pager($recTotal, $recPerPage, $pageID);
        	$sort = $this->loadModel('common')->appendOrder($orderBy);
        	//获得数据
        	$result = $this->correspondent->getcustomelist($pager,$browseType,$queryID,$sort);
        	$this->view->pager = $pager;
        	$this->view->orderBy = $orderBy;
        	$this->view->param = $param;
        	$this->view->basedata = $result;
			$this->view->browseType = $browseType;//页面类型
			$this->display();
		}

		/**
		 * 创建客户
		 * @return [type] [description]
		 */
		public function create()
		{
			//获取项目列表
			$this->loadModel('project');
			$projects = $this->project->getPairs('nocode');
			$projects[''] = '';
			//获得用户列表
			$this->loadModel('user');
			$users = $this->user->getPairs('nodeleted|noempty|noclosed');
			$users[''] = '';
			//获取产品列表
			$this->loadModel('distribution');
			$productlist = $this->distribution->getdistributionlist();
			//Ajax加载产品列表
			if ($_GET['addfield']) {
				$field = "<tr><th>".$this->lang->correspondent->buyproject ."</th><td>". html::select('buyproject[]',$productlist,'', "class='form-control chosen'")."</td></tr>";
				echo json_encode($field);
				exit;
			}
			//处理POST数据
			if (!empty($_POST)) {
				$this->correspondent->create();//插入数据
				if(dao::isError()) die(js::error(dao::getError()));
				die(js::locate($this->createLink('correspondent', 'index'), 'parent'));
			}
			$this->view->productlist = $productlist;
			$this->view->projects = $projects;
			$this->view->users = $users;
			$this->view->title      ='汉得研发管理平台::创建客户';
			$this->view->position[]    = html::a($this->inlink("index",""),$this->lang->correspondent->index);
			$this->view->position[]    = $this->lang->correspondent->create;
			$this->display();
		}

		/**
		 * 编辑客户信息
		 * @param  id $optid 主键id
		 * @return [type]        [description]
		 */
		public function edit($optid)
		{
			//获得用户列表
			$this->loadModel('user');
			$users = $this->user->getPairs('nodeleted|noempty|noclosed');
			$users[''] = '';
			//获取产品列表
			$this->loadModel('distribution');
			$productlist = $this->distribution->getdistributionlist();

			//根据optid获得基础数据
			$this->view->basedata = $this->correspondent->getcustomebyid($optid);
			if (!empty($_POST)) {
				$this->correspondent->edit($optid);
				if(dao::isError()) die(js::error(dao::getError()));
				die(js::locate($this->createLink('correspondent', 'index'), 'parent'));
			}
			$this->view->productlist = $productlist;
			$this->view->users = $users;
			$this->view->optid = $optid;
			$this->display();
		}

		public function delete($optid)
    	{
    		$this->correspondent->delete($optid);
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
			die(js::locate($this->createLink('correspondent', 'index',''), 'parent'));
    	}

    	public function MyFlow($browseType='myflow',$param = 0,$orderBy='', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    	{
    		$this->app->loadClass('pager', $static = true);
        	$pager = new pager($recTotal, $recPerPage, $pageID);
        	$sort = $this->loadModel('common')->appendOrder($orderBy);

        	$myflow = $this->correspondent->getflow($pager,$browseType,$queryID,$sort);
    		$browseType = strtolower($browseType);//大小写忽略
    		$this->view->browseType = $browseType;//页面类型
    		$this->view->myflow = $myflow;
    		$this->view->title      ='汉得研发管理平台::我的审批流';
			$this->view->position[]    = html::a($this->inlink("index",""),$this->lang->correspondent->index);
			$this->view->position[]    = $this->lang->correspondent->myflow;
			$this->view->pager = $pager;
        	$this->view->orderBy = $orderBy;
        	$this->view->param = $param;
    		$this->display();
    	}

    	public function cancle($optid)
    	{
    		$this->correspondent->cancle($optid);
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
			die(js::locate($this->createLink('correspondent', 'myflow',''), 'parent'));
    	}

    	public function check($browseType='check',$type='uncheck',$param = 0,$orderBy='', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    	{
    		$browseType = strtolower($browseType);//大小写忽略
    		$queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        	$actionURL = $this->createLink('correspondent', 'check', "browseType=bySearch&type=$type&queryID=myQueryID");
        	$this->correspondent->buildSearchForm('','', $queryID, $actionURL);
        	$this->app->loadClass('pager', $static = true);
        	$pager = new pager($recTotal, $recPerPage, $pageID);
        	$sort = $this->loadModel('common')->appendOrder($orderBy);
        	$basedata = $this->correspondent->getflow($pager,$browseType,$queryID,$sort,$type);
        	$this->view->basedata = $basedata;
    		$this->view->browseType = $browseType;//页面类型
    		$this->view->pager = $pager;
        	$this->view->orderBy = $orderBy;
        	$this->view->param = $param;
        	$this->view->type = $type;
    		$this->display();
    	}

    	public function passorrefuse($optid,$type)
    	{
    		$this->correspondent->passorrefuse($optid,$type);
    		if(dao::isError()) die(js::error(dao::getError()));
			die(js::locate($this->createLink('correspondent', 'check'), 'parent'));
    	}

    	public function detail($optid)
    	{
    		//获取产品列表
			$this->loadModel('distribution');
			$productlist = $this->distribution->getdistributionlist();
			$this->view->productlist = $productlist;
    		$this->view->csidata = $this->correspondent->getcsicode($optid);
    		$this->view->id = $optid;
    		$this->display();
    	}


	}