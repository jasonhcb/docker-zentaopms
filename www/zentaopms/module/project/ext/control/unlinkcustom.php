<?php
include '../../control.php';
class myProject extends project
{
    
    public function unlinkcustom($projectID, $account,$confirm = 'no')
    {
        if($confirm == 'no')
        {
            die(js::confirm($this->lang->project->confirmUnlinkMember, $this->inlink('unlinkcustom', "projectID=$projectID&account=$account&confirm=yes")));
        }
        else
        {
            $this->project->unlinkcustom($projectID, $account);

            /* if ajax request, send result. */
            if($this->server->ajax)
            {
                if(dao::isError())
                {
                    $response['result']  = 'fail';
                    $response['message'] = dao::getError();
                }
                else
                {
                    $response['result']  = 'success';
                    $response['message'] = '';
                }
                $this->send($response);
            }
            die(js::locate($this->inlink('custommanage', "projectID=$projectID"), 'parent'));
        }
    }
}