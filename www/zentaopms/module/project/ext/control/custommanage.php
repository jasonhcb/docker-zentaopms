<?php
include '../../control.php';
class myProject extends project
{

    public function custommanage($projectID = 0)
    {
        $project        = $this->project->getById($projectID);
        $this->project->setMenu($this->projects, $projectID);



        $this->view->title    = $project->name . $this->lang->colon . $this->lang->project->custommanage;
        $this->view->project  = $project;
        $this->view->custom   =$this->project->getcustom($projectID);
        $this->display();
    }
}