<?php
class manual extends control
{
    /**
     * Construct function, load user, tree, action auto.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Go to browse page.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $this->locate(inlink('browse'));
    }

  
    public function browse()
    {  
		$this->manual->setMenu();
        $manuals = $this->manual->getManuals();
        $this->session->set('manualList',   $this->app->getURI(true));
        $this->view->manuals = $manuals;
        $this->display();
    }

    
    /**
     * Create a doc.
     * 
     * @param  int|string   $libID 
     * @param  int          $moduleID 
     * @param  int          $productID 
     * @param  int          $projectID 
     * @param  string       $from 
     * @access public
     * @return void
     */
    public function create()
    {
        if($_POST)
        {   
            $manualResult = $this->manual->create();
            if(!$manualResult) die(js::error($this->lang->manual->error));

            $link= $this->createLink('manual', 'index');
            die(js::locate($link));
        }
		$this->manual->setMenu();
        $this->display();
    }

    /**
     * Edit a doc.
     * 
     * @param  int    $docID 
     * @access public
     * @return void
     */
    public function edit($name)
    {
        if(!empty($_POST))
        {
            $changes  = $this->manual->update($name);
            if(!$changes) die(js::error($this->lang->manual->error));
            die(js::locate($this->createLink('manual', 'view', "name=$name") ));
        }
		
		$this->manual->setMenu();

        $manual = $this->manual->getManuals($name);

        $this->view->title      = $this->lang->manual->edit;

        $this->view->manual              = $manual;
      
        $this->display();
    }

    /**
     * View a doc.
     * 
     * @param  int    $docID 
     * @access public
     * @return void
     */
    public function view($name)
    {
        $manual = $this->manual->getManuals($name);
        if(!$manual) die(js::error($this->lang->notFound) . js::locate('back'));


        $this->view->title      = "$manual->title";
        $this->view->manual     = $manual;
        $this->view->name       = $name;

        $this->display();
    }

    /**
     * Delete a doc.
     * 
     * @param  int    $docID 
     * @param  string $confirm  yes|no
     * @access public
     * @return void
     */
    public function delete($name, $confirm = 'no')
    {
        if($confirm == 'no')
        {
            die(js::confirm($this->lang->manual->confirmDelete, inlink('delete', "name=$name&confirm=yes")));
        }
        else
        {
            $delete=$this->manual->delete($name);

            /* if ajax request, send result. */
            if($this->server->ajax)
            {
                if(!$delete)
                {
                    $response['result']  = 'fail';
                    $response['message'] = $this->lang->manual->error;
                }
                else
                {
                    $response['result']  = 'success';
                    $response['message'] = '';
                }
                $this->send($response);
            }
            die(js::locate($this->session->manualList));
        }
    }
}
