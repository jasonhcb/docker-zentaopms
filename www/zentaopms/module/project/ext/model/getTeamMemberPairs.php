
    public function getTeamMemberPairs($projectID, $params = '')
    {
        $users = $this->dao->select('t1.account, t2.realname')->from(TABLE_TEAM)->alias('t1')
            ->leftJoin(TABLE_USER)->alias('t2')->on('t1.account = t2.account')
            ->where('t1.project')->eq((int)$projectID)
            ->beginIF($params == 'nodeleted')
            ->andWhere('t2.deleted')->eq(0)
            ->fi()
            ->fetchPairs();
        if(!$users) return array();
        foreach($users as $account => $realName)
        {
            //$firstLetter = ucfirst(substr($account, 0, 1)) . ':';
            $firstLetter = $account . ':';
            $users[$account] =  $firstLetter . ($realName ? $realName : $account);
        }
        return array('' => '') + $users;
    }

