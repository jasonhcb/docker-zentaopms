<?php
include '../../control.php';
class myProject extends project
{
    
    public function grouptask($projectID = 0, $groupBy = 'story', $filter = '')
    {
        $project   = $this->commonAction($projectID);
        $projectID = $project->id;

        /* Save session. */
        $this->app->session->set('taskList',  $this->app->getURI(true));
        $this->app->session->set('storyList', $this->app->getURI(true));

        /* Header and session. */
        $this->view->title      = $project->name . $this->lang->colon . $this->lang->project->task;
        $this->view->position[] = html::a($this->createLink('project', 'browse', "projectID=$projectID"), $project->name);
        $this->view->position[] = $this->lang->project->task;

        /* Get tasks and group them. */
        if(empty($groupBy))$groupBy = 'story';
        $tasks       = $this->loadModel('task')->getProjectTasks($projectID, $status = 'all', $modules = 0, $groupBy);
        $groupBy     = str_replace('`', '', $groupBy);
        $taskLang    = $this->lang->task;
        $groupByList = array();
        $groupTasks  = array();

        /* Get users. */
        $users = $this->loadModel('user')->getPairs('noletter');
        foreach($tasks as $task)
        {
            if($groupBy == 'story')
            {
                $groupTasks[$task->story][] = $task;
                $groupByList[$task->story]  = $task->storyTitle;
            }
            elseif($groupBy == 'status')
            {
                $groupTasks[$taskLang->statusList[$task->status]][] = $task;
            }
            elseif($groupBy == 'assignedTo')
            {
                $groupTasks[$task->assignedToRealName][] = $task;
            }
            elseif($groupBy == 'finishedBy')
            {
                $groupTasks[$users[$task->finishedBy]][] = $task;
            }
            elseif($groupBy == 'closedBy')
            {
                $groupTasks[$users[$task->closedBy]][] = $task;
            }
            elseif($groupBy == 'type')
            {
                $groupTasks[$taskLang->typeList[$task->type]][] = $task;
            }
            else
            {
                $groupTasks[$task->$groupBy][] = $task;
            }
        }
        krsort($groupTasks);
        /* Assign. */
        $this->app->loadLang('tree');
        $this->view->members     = $this->project->getTeamMembers($projectID);
        $this->view->tasks       = $groupTasks;
        $this->view->tabID       = 'task';
        $this->view->groupByList = $groupByList;
        $this->view->browseType  = 'group';
        $this->view->groupBy     = $groupBy;
        $this->view->orderBy     = $groupBy;
        $this->view->projectID   = $projectID;
        $this->view->users       = $users;
        $this->view->moduleID    = 0;
        $this->view->moduleName  = $this->lang->tree->all;
        $this->view->filter      = $filter;
        $this->display();
    }
}
