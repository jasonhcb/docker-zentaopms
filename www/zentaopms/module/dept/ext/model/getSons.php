    public function getSons($deptID)
    {
        return $this->dao->select('t1.*,t2.realname as managerName')->from(TABLE_DEPT)->alias('t1')->leftJoin(TABLE_USER)->alias('t2')->on('t1.manager=t2.account')->where('t1.parent')->eq($deptID)->orderBy('t1.order')->fetchAll();
    }