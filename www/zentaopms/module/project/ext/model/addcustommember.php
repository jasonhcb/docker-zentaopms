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