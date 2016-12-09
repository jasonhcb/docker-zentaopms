<?php
class hdc extends control
{
    /**
     * Browse groups.
     * 
     * @param  int    $companyID 
     * @access public
     * @return void
     */
    public function hdcmaintenance($browseType='hdcmaintenance')
    {
        $browseType = strtolower($browseType);
        $this->view->browseType = $browseType;
        // if($companyID == 0) $companyID = $this->app->company->id;

        // $title      = $this->lang->company->orgView . $this->lang->colon . $this->lang->group->browse;
        $position[] = $this->lang->hdc->hdcmaintenance;
        $groupid = $this->lang->hdc->groupid;
        $this->loadModel('group');
        $groups = $this->group->getByIdlist($groupid);
        // var_dump($groups);
        $users = $this->group->getUserPairs($groupid);
        $groupUsers = array();
        foreach($groups as $group) $groupUsers[$group->id] = $this->group->getUserPairs($group->id);
        // $this->view->title      = $title;
        $this->view->position   = $position;
        $this->view->groups     = $groups;
        $this->view->groupUsers = $groupUsers;
        // $this->view->superUsers = $superUsers;
        $this->display();
    }
}
