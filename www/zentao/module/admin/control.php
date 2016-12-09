<?php
/**
 * The control file of admin module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     admin
 * @version     $Id: control.php 4460 2013-02-26 02:28:02Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
class admin extends control
{
    /**
     * Index page.
     * @access public
     * @return void
     */
    public function index()
    {
        $community = zget($this->config->global, 'community', '');
        if(!$community or $community == 'na')
        {
            $this->view->bind    = false;
            $this->view->account = false;
            $this->view->ignore  = $community == 'na';
        }
        else
        {
            $this->view->bind    = true;
            $this->view->account = $community;
            $this->view->ignore  = false;
        }

		$this->app->loadLang('misc');

        $this->view->title      = $this->lang->admin->common;
        $this->view->position[] = $this->lang->admin->index;
		$this->display();
    }

	/**
	 * Ignore notice of register and bind.
	 * 
	 * @access public
	 * @return void
	 */
	public function ignore()
	{
		$this->loadModel('setting')->setItem('system.common.global.community', 'na');
		die(js::locate(inlink('index'), 'parent'));
	}

	/**
	 * Register zentao.
	 * 
	 * @access public
	 * @return void
	 */
	public function register()
	{
		if($_POST)
		{
			$response = $this->admin->registerByAPI();
			if($response == 'success') 
			{
				$this->loadModel('setting')->setItem('system.common.global.community', $this->post->account);
				echo js::alert($this->lang->admin->register->success);
				die(js::locate(inlink('index'), 'parent'));
			}
			die($response);
		}

        $this->view->title      = $this->lang->admin->register->caption;
        $this->view->position[] = $this->lang->admin->register->caption;
		$this->view->register   = $this->admin->getRegisterInfo();
		$this->view->sn         = $this->config->global->sn;
		$this->display();
	}

	/**
	 * Bind zentao.
	 * 
	 * @access public
	 * @return void
	 */
	public function bind()
	{
        if($_POST)
        {
            $response = $this->admin->bindByAPI();
            if($response == 'success')
            {
                $this->loadModel('setting')->setItem('system.common.global.community', $this->post->account);
                echo js::alert($this->lang->admin->bind->success);
                die(js::locate(inlink('index'), 'parent'));
            }
            else
            {
                $response = json_decode($response);
                if($response->result == 'fail') die(js::alert($response->message));
            }
        }

        $this->view->title      = $this->lang->admin->bind->caption;
        $this->view->position[] = $this->lang->admin->bind->caption;
        $this->view->sn         = $this->config->global->sn;
        $this->display();
    }

    /**
     * Check all tables.
     * 
     * @access public
     * @return void
     */
    public function checkDB()
    {
        $tables = $this->dbh->query("show full tables where Table_Type != 'VIEW'")->fetchAll(PDO::FETCH_ASSOC);
        foreach($tables as $table)
        {
            $tableName = current($table);
            $result = $this->dbh->query("REPAIR TABLE $tableName")->fetch();
            echo "Repairing TABLE: " . $result->Table . "\t" . $result->Msg_type . ":" . $result->Msg_text . "\n";
        }
    }

    /**
     * Account safe.
     * 
     * @access public
     * @return void
     */
    public function safe()
    {
        if($_POST)
        {
            $data = fixer::input('post')->get();
            $this->loadModel('setting')->setItems('system.common.safe', $data);
            die(js::reload('parent'));
        }
        $this->view->title      = $this->lang->admin->safe->common . $this->lang->colon . $this->lang->admin->safe->set;
        $this->view->position[] = $this->lang->admin->safe->common;
        $this->display();
    }

    /**
     * Check weak user.
     * 
     * @access public
     * @return void
     */
    public function checkWeak()
    {
        $this->view->title      = $this->lang->admin->safe->common . $this->lang->colon . $this->lang->admin->safe->checkWeak;
        $this->view->position[] = html::a(inlink('safe'), $this->lang->admin->safe->common);
        $this->view->position[] = $this->lang->admin->safe->checkWeak;
        $this->view->weakUsers  = $this->loadModel('user')->getWeakUsers();
        $this->display();
    }

    /**
     * Config sso for ranzhi.
     * 
     * @access public
     * @return void
     */
    public function sso()
    {
        if(!empty($_POST))
        {
            $ssoConfig = new stdclass();
            $ssoConfig->turnon = $this->post->turnon;
            $ssoConfig->addr   = $this->post->addr;
            $ssoConfig->code   = trim($this->post->code);
            $ssoConfig->key    = trim($this->post->key);

            $this->loadModel('setting')->setItems('system.sso', $ssoConfig);
            if(dao::isError()) die(js::error(dao::getError()));
            die($this->locate(inlink('sso')));
        }

        $this->loadModel('sso');
        if(!isset($this->config->sso)) $this->config->sso = new stdclass();

        $this->view->title      = $this->lang->admin->sso;
        $this->view->position[] = $this->lang->admin->sso;

        $this->view->turnon = isset($this->config->sso->turnon) ? $this->config->sso->turnon : 1;
        $this->view->addr   = isset($this->config->sso->addr) ? $this->config->sso->addr : '';
        $this->view->key    = isset($this->config->sso->key) ? $this->config->sso->key : '';
        $this->view->code   = isset($this->config->sso->code) ? $this->config->sso->code : '';
        $this->display();
    }
}
