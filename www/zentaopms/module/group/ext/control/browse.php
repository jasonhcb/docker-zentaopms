<?php
class group extends control
{
    /**
     * Construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('company')->setMenu();
        $this->loadModel('user');
    }

    /**
     * Browse groups.
     * 
     * @param  int    $companyID 
     * @access public
     * @return void
     */
    public function browse($companyID = 0)
    {
        if($companyID == 0) $companyID = $this->app->company->id;

        $title      = $this->lang->company->orgView . $this->lang->colon . $this->lang->group->browse;
        $position[] = $this->lang->group->browse;

        $groups = $this->group->getList($companyID);
        $groupUsers = array();
        foreach($groups as $group) $groupUsers[$group->id] = $this->group->getUserPairs($group->id);
        
        $users = $this->dao->select('*')->from(TABLE_USER)->where('account')->in(trim($this->app->company->admins,','))->andWhere('deleted')->eq(0)->orderBy('account')->fetchAll();
        $superUsers = array();
        foreach($users as $user) {
            $superUsers[] = $user->account . ':' . $user->realname;
        }

        $this->view->title      = $title;
        $this->view->position   = $position;
        $this->view->groups     = $groups;
        $this->view->groupUsers = $groupUsers;
        $this->view->superUsers = $superUsers;

        $this->display();
    }
}
