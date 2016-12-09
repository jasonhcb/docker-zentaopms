    public function getProjectDays($projectID = 0) {
        $projects = $this->dao->select("id, name, code, acl")
                ->from(TABLE_PROJECT)
                ->where('deleted')->eq(0)
                ->beginIF($projectID)->andWhere('id')->eq($projectID)->fi()
                ->fetchAll('id');
        $projectDays = array();
        foreach ($projects as $projectID => $project) {
            if(!$this->loadModel('project')->checkPriv($project)) continue;
            $users = $this->dao->select('t1.account, t2.realname, t3.plandays, t3.actualdays')->from(TABLE_TEAM)->alias('t1')
                    ->leftJoin(TABLE_USER)->alias('t2')->on('t1.account = t2.account')
                    ->leftJoin('`zt_mandays`')->alias('t3')->on('t1.account = t3.account and t1.project = t3.project')
                    ->where('t1.project')->eq($projectID)
                    ->andWhere('t2.deleted')->eq(0)
                    ->fetchAll();
            $project->mandays = $users;
            $projectDays[$projectID] = $project;
        }
        return $projectDays;
    }