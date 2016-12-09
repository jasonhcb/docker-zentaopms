<?php
include '../../control.php';
class myTask extends task
{

    public function sendmail($taskID, $actionID)
    {
        /* Reset $this->output. */
        $this->clear();

        /* Set toList and ccList. */
        $task        = $this->task->getById($taskID);
        $projectName = $this->project->getById($task->project)->name;
        $users       = $this->loadModel('user')->getPairs('noletter');
        $toList      = $task->assignedTo;
        $ccList      = trim($task->mailto, ',');
	
        $hdcTask = $this->loadModel('hdc')->isHdcTask($task->id, $task->story);
        if ($hdcTask) {
            $toList = is_object($hdcTask) ? $hdcTask->assignedTo : '';
            $hdcMailto = $this->loadModel('hdc')->getMailto($task->project);
            $ccList = trim($ccList . $hdcMailto, ',');
        }

        if($toList == '')
        {
            if($ccList == '') return;
            if(strpos($ccList, ',') === false)
            {
                $toList = $ccList;
                $ccList = '';
            }
            else
            {
                $commaPos = strpos($ccList, ',');
                $toList = substr($ccList, 0, $commaPos);
                $ccList = substr($ccList, $commaPos + 1);
            }
        }
        elseif(strtolower($toList) == 'closed')
        {
            $toList = $task->finishedBy;
        }

        /* Get action info. */
        $action          = $this->loadModel('action')->getById($actionID);
        $history         = $this->action->getHistory($actionID);
        $action->history = isset($history[$actionID]) ? $history[$actionID] : array();

        /* Create the email content. */
        $this->view->task   = $task;
        $this->view->action = $action;
        $this->view->users  = $users;

        $mailContent = $this->parse($this->moduleName, 'sendmail');

        /* Send emails. */
        $this->loadModel('mail')->send($toList, 'TASK#' . $task->id . ' ' . $task->name . ' - ' . $projectName, $mailContent, $ccList);
        if($this->mail->isError()) trigger_error(join("\n", $this->mail->getError()));
    }

}
