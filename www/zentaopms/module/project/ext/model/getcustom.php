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