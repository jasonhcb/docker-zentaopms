<?php
helper::import('/Applications/MAMP/htdocs/ztp/zentaopms/module/project/model.php');
class extprojectModel extends projectModel 
{
public function addcustommember($projectID)
{
# 向User表中插入一个客户,角色为custom
$custommember = new stdclass();
$custommember->account = $_POST["account"];
$custommember->realname = $_POST["realname"];
$custommember->gender = $_POST["gender"];
$custommember->password = "187cca46ab69a66cdff777315459c07c";
$custommember->role = "custom";
$custommember->email = $_POST["account"];
$custommember->join = $_POST["join"];
$this->dao->insert(TABLE_USER)->data($custommember)->autoCheck()
->batchCheck($config->project->addcustommember->requiredFields, 'notempty')->check('account','notempty')->checkIF($custommember->email != false, 'email', 'email')->exec();
# 向客户信息表中添加客户姓名等信息
$cusinfo = new stdclass();
$cusinfo->account = $_POST["account"];
$cusinfo->cusname = $_POST["customname"];
$cusinfo->webaddress = $_POST["webaddress"];
$this->dao->insert('zt_cusinfo')->data($cusinfo)->autoCheck()->check('customname','notempty')->check('webaddress','notempty')->exec();
if(dao::isError())
{
die(js::error(dao::getError()));
}
# 向客户组中添加一个成员
$id = $this->dao->select('*')->from(TABLE_GROUP)
->where('name')->eq("客户组")->fetch(id);
$usergroup = new stdclass();
$usergroup->account = $_POST["account"];
$usergroup->group = $id;
$this->dao->insert(TABLE_USERGROUP)->data($usergroup)->exec();

# 向Team表中添加一个成员
$custeam = new stdclass();
$custeam->account = $_POST["account"];
$custeam->project = $projectID;
$custeam->role = "客户";
$custeam->join = $_POST["join"];
$custeam->days = 365;
$custeam->hours = 8.0;
$this->dao->insert(TABLE_TEAM)->data($custeam)->exec();
}
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
public function getcustom($projectID)
{
$account = $this->dao->select('*')->from(TABLE_TEAM)
->where('project')->eq($projectID)
->andwhere('role')->eq("客户")
->fetchAll('account');

return $this->dao->select('t1.*,t2.*')->from(TABLE_USER)->alias('t1')
->leftjoin('`zt_cusinfo`')->alias('t2')
->on('t1.account = t2.account')
->where('t1.account')->in(array_keys($account))
->fetchAll();
}
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
public function unlinkcustom($projectID, $account)
{
$this->dao->delete()->from(TABLE_TEAM)
->where('project')->eq((int)$projectID)
->andWhere('account')->eq($account)
->exec();
$this->dao->delete()->from(TABLE_USER)
->where('account')->eq($account)
->exec();
$this->dao->delete()->from(TABLE_USERGROUP)
->where('account')->eq($account)
->exec();
$this->dao->delete()->from('`zt_cusinfo`')
->where('account')->eq($account)
->exec();
}
//**//
}