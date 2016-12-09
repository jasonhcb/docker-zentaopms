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
    public function manageMember($groupID, $deptID = 0)
    {
        if(!empty($_POST))
        {
            if($groupID==0){
                $admins = ',';
                foreach($this->post->members as $account) $admins .= $account . ',';
                $admins .= ',';
                $this->dao->update(TABLE_COMPANY)->set('admins')->eq($admins)->where('id')->eq(1)->exec();
                $this->app->company->admins = $admins;
            }else{
                $this->group->updateUser($groupID);
            }
            if(isonlybody()) die(js::closeModal('parent.parent', 'this'));
            die(js::locate($this->createLink('group', 'browse'), 'parent'));
        }
        if($groupID==0){
            $group = new stdClass();
            $group->id = 0;
            $group->name = $this->lang->group->superUserName;
            $group->desc = $this->lang->group->superUserDesc;
            $groupUsers = $this->dao->select('account, realname')->from(TABLE_USER)->where('account')->in(trim($this->app->company->admins,','))->orderBy('account')->fetchPairs();
        }else{
            $group      = $this->group->getById($groupID);
            $groupUsers = $this->group->getUserPairs($groupID);
        }
        $allUsers   = $this->loadModel('dept')->getDeptUserPairs($deptID);
        $otherUsers = array_diff_assoc($allUsers, $groupUsers);

        $title      = $this->lang->company->common . $this->lang->colon . $group->name . $this->lang->colon . $this->lang->group->manageMember;
        $position[] = $group->name;
        $position[] = $this->lang->group->manageMember;

        $this->view->title      = $title;
        $this->view->position   = $position;
        $this->view->group      = $group;
        $this->view->deptTree   = $this->loadModel('dept')->getTreeMenu($rooteDeptID = 0, array('deptModel', 'createGroupManageMemberLink'), $groupID);
        $this->view->groupUsers = $groupUsers;
        $this->view->otherUsers = $otherUsers;

        $this->display();
    }
}