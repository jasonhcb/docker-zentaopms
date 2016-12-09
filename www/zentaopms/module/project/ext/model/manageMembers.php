public function manageMembers($projectID)
{
    extract($_POST);
    $project_code = $this->dao->select('code')
                         ->from(TABLE_PROJECT)
                         ->where('id')
                         ->eq((int)$projectID)->fetch();
    $accounts = array_unique($accounts);
    //SEARCH PROJET ID
    $ch = curl_init('https://rdc.hand-china.com/gitlab/api/v3/projects/all?search='.$project_code->code);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('PRIVATE-TOKEN: u-ivXA3AYJBxa5vv45xW'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $gitlab_projectid = $obj[0]['id'];

    foreach($accounts as $key => $account)
    {
        if(empty($account)) continue;

        $member = new stdclass();
        $member->role  = $roles[$key];
        $member->days  = $days[$key];
        $member->hours = $hours[$key];

        $mode = $modes[$key];
        if($mode == 'update')
        {
            $this->dao->update(TABLE_TEAM)
                 ->data($member)
                 ->where('project')->eq((int)$projectID)
                 ->andWhere('account')->eq($account)
                 ->exec();
        }
        else
        {
            $member->project = (int)$projectID;
            $member->account = $account;
            $member->join    = helper::today();
            $this->dao->insert(TABLE_TEAM)->data($member)->exec();
        }
        // SEARCH USER ID
        $ch = curl_init('https://rdc.hand-china.com/gitlab/api/v3/users?username='.$account);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('PRIVATE-TOKEN: u-ivXA3AYJBxa5vv45xW'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($result, true);
        $gitlab_userid = $obj[0]['id'];
        if (strpos($member->role, 'gitlabowner') === false){
            $data = array('id' => $gitlab_projectid, 'user_id' => $gitlab_userid, 'access_level'=> 30);
        }
        else{
            $data = array('id' => $gitlab_projectid, 'user_id' => $gitlab_userid, 'access_level'=> 40);
        }
        //ADD PROJECT MEMBERS
        $ch = curl_init('https://rdc.hand-china.com/gitlab/api/v3/projects/'.$gitlab_projectid.'/members');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('PRIVATE-TOKEN: u-ivXA3AYJBxa5vv45xW'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
    }

}