<?php
helper::import('/Applications/MAMP/htdocs/ztp/zentaopms/module/dept/model.php');
class extdeptModel extends deptModel 
{
public function getDataStructure($rootDeptID = 0) 
    {
        $tree = array_values($this->getSons($rootDeptID));
        if(count($tree))
        {
            foreach ($tree as $node)
            {
                $children = $this->getDataStructure($node->id);
                if(count($children))
                {
                    $node->children = $children;
                    $node->actions = array('delete' => false);
                }
            }
        }
        return $tree; 
    }
public function getSons($deptID)
    {
        return $this->dao->select('t1.*,t2.realname as managerName')->from(TABLE_DEPT)->alias('t1')->leftJoin(TABLE_USER)->alias('t2')->on('t1.manager=t2.account')->where('t1.parent')->eq($deptID)->orderBy('t1.order')->fetchAll();
    }
//**//
}