 /**
     * Create a project.
     *
     * @access public
     * @return void
     */
    public function create($copyProjectID = '')
    {
        $this->lang->project->team = $this->lang->project->teamname;
        $project = fixer::input('post')
            ->setDefault('status', 'wait')
            ->setIF($this->post->acl != 'custom', 'whitelist', '')
            ->setDefault('openedVersion', $this->config->version)
            ->setDefault('team', substr($this->post->name,0, 30))
            ->join('whitelist', ',')
            ->stripTags($this->config->project->editor->create['id'], $this->config->allowedTags)
            ->remove('products, workDays, delta, branch')
            ->get();
        $project = $this->loadModel('file')->processEditor($project, $this->config->project->editor->create['id']);

        // Add by hand
        // Create Gitlab Project
        // Get Current UserID
        $ch = curl_init('https://rdc.hand-china.com/gitlab/api/v3/users?username='.$this->app->user->account);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('PRIVATE-TOKEN: u-ivXA3AYJBxa5vv45xW'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if ($result == '[]'){
             $ch = curl_init('https://rdc.hand-china.com/gitlab/api/v3/users?username=1924');
             curl_setopt($ch, CURLOPT_POST, false);
             curl_setopt($ch, CURLOPT_HTTPHEADER, array('PRIVATE-TOKEN: u-ivXA3AYJBxa5vv45xW'));
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
             $result = curl_exec($ch);
        }
        curl_close($ch);
        $obj = json_decode($result, true);
        $gitlab_userid = $obj[0]['id'];
        $data = array('name' => $project->code, 'description' => $project->description);

        // Create Gitlab Project
        $ch = curl_init('https://rdc.hand-china.com/gitlab/api/v3/projects/user/'.$gitlab_userid);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('PRIVATE-TOKEN: u-ivXA3AYJBxa5vv45xW'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $obj2 = json_decode($result, true);
        $gitlab_address = $obj2['http_url_to_repo'];
        $project -> gitaddress = $gitlab_address;
        curl_close($ch);
        $this->dao->insert(TABLE_PROJECT)->data($project)
            ->autoCheck($skipFields = 'begin,end,project_id')
            ->batchcheck($this->config->project->create->requiredFields, 'notempty')
            ->checkIF($project->begin != '', 'begin', 'date')
            ->checkIF($project->end != '', 'end', 'date')
            ->checkIF($project->end != '', 'end', 'gt', $project->begin)
            ->check('name', 'unique', "deleted='0'")
            ->check('code', 'unique', "deleted='0'")
            ->check('code','reg','|[a-z0-9]*|')
            ->exec();

        /* Add the creater to the team. */
        if(!dao::isError())
        {
            $projectID     = $this->dao->lastInsertId();
            $today         = helper::today();
            $creatorExists = false;

            /* Save order. */
            $this->dao->update(TABLE_PROJECT)->set('`order`')->eq($projectID * 5)->where('id')->eq($projectID)->exec();

            /* Copy team of project. */
            if($copyProjectID != '')
            {
                $members = $this->dao->select('*')->from(TABLE_TEAM)->where('project')->eq($copyProjectID)->fetchAll();
                foreach($members as $member)
                {
                    $member->project = $projectID;
                    $member->join    = $today;
                    $member->days    = $project->days;
                    $this->dao->insert(TABLE_TEAM)->data($member)->exec();
                    if($member->account == $this->app->user->account) $creatorExists = true;
                }
            }

            /* Add the creator to team. */
            if($copyProjectID == '' or !$creatorExists)
            {
                $member = new stdclass();
                $member->project  = $projectID;
                $member->account  = $this->app->user->account;
                $member->role     = $this->lang->user->roleList[$this->app->user->role];
                $member->join     = $today;
                $member->days     = $project->days;
                $member->hours    = $this->config->project->defaultWorkhours;
                $this->dao->insert(TABLE_TEAM)->data($member)->exec();
            }
        return $projectID;
        }
    }