<?php
include '../../control.php';
class myProject extends project
{

    public function addcustommember($projectID = 0)
    {
        if ($_POST)
        {
            foreach ($this->lang->project->addcustomcheck as $key => $value) {
                if(!isset($_POST[$key]) || !$_POST[$key]) die(js::error(vsprintf($this->lang->project->mustinput,array($value))));
            }
            $id = $this->dao->select('*')->from(TABLE_USER)->where('account')->eq($_POST['account'])->fetchAll();
            if (!empty($id)){
                die(js::error($this->lang->project->customexist));
            }
            $this->project->addcustommember($projectID);
            if(dao::isError()) die(js::error(dao::getError()));
            if(isonlybody()) die(js::closeModal('parent.parent', 'this'));
            die(js::locate($this->createLink('project', 'custommanage', "projectID=$projectID")));
        }
        $this->project->setMenu($this->projects, $projectID);

        $project = $this->project->getById($projectID);
        $this->view->title = $project->name . $this->lang->colon . $this->lang->project->addcustommember;
        $this->view->projectid = $project->name;

        $this->display();
    }
}