<?php
include '../../control.php';
class myBug extends bug
{
	
    public function assignTo($bugID)
    {
        $bug = $this->bug->getById($bugID);

        /* Set menu. */
        $this->bug->setMenu($this->products, $bug->product, $bug->branch);

        if(!empty($_POST))
        {
            $this->loadModel('action');
            $changes = $this->bug->assign($bugID);
            if(dao::isError()) die(js::error(dao::getError()));
            $actionID = $this->action->create('bug', $bugID, 'Assigned', $this->post->comment, $this->post->assignedTo);
            $this->action->logHistory($actionID, $changes);
            $this->sendmail($bugID, $actionID);

            if(isonlybody()) die(js::closeModal('parent.parent'));
            die(js::locate($this->createLink('bug', 'view', "bugID=$bugID"), 'parent'));
        }

        $this->view->title      = $this->products[$bug->product] . $this->lang->colon . $this->lang->bug->assignedTo;
        $this->view->position[] = $this->lang->bug->assignedTo;

        //$this->view->users   = $this->user->getPairs('nodeleted', $bug->assignedTo);
        $this->view->users   = $this->loadModel('project')->getTeamMemberPairs($bug->project, 'nodeleted');
        $this->view->bug     = $bug;
        $this->view->bugID   = $bugID;
        $this->view->actions = $this->action->getList('bug', $bugID);
        $this->display();
    }

}
