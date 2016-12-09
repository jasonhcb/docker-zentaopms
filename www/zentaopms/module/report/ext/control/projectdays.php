<?php

class report extends control
{

    public function projectdays($projectID = 0)
    {
        $this->view->title      = $this->lang->report->projectDays;
        $this->view->position[] = $this->lang->report->projectDays;

        $this->view->projectDays = $this->report->getProjectDays($projectID);
        $this->view->projects = $this->loadModel('project')->getPairs('empty');
        $this->view->projectID    = $projectID;
        $this->view->submenu  = 'project';
        $this->display();
    }

}
