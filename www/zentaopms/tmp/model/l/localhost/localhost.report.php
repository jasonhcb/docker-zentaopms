<?php
helper::import('/Applications/MAMP/htdocs/ztp/zentaopms/module/report/model.php');
class extreportModel extends reportModel 
{
public function getProductStatistics($orderBy, $type){
        $products = $this->dao->select("t1.id, t1.code, t1.name, (SELECT COUNT('t2.*') FROM zt_story AS t2 WHERE t2.product=t1.id) AS totalStory, (SELECT COUNT('t3.*') FROM zt_story AS t3 WHERE t3.product=t1.id AND t3.status='closed') AS closedStory")
        ->from(TABLE_PRODUCT)->alias('t1')
        ->where('t1.deleted')->eq(0)
        ->groupBy('t1.id')
        ->orderBy($orderBy)
        ->fetchAll('id');
        foreach ($products as $productID=>$product) {
            //$totalStory = $this->dao->select('count(*) as value')->from(TABLE_STORY)->where('product')->eq($productID)->fetch();
            //$closedStory = $this->dao->select('count(*) as value')->from(TABLE_STORY)->where('status')->eq('closed')->andWhere('product')->eq($productID)->fetch();
            //$product->totalStory = $totalStory->value;
            //$product->closedStory = $closedStory->value;
            $projects = $this->dao->select('t2.id, t2.name')
                    ->from(TABLE_PROJECTPRODUCT)->alias('t1')
                    ->leftJoin(TABLE_PROJECT)->alias('t2')
                    ->on('t1.project = t2.id')
                    ->where('t2.deleted')->eq(0)
                    ->beginIF($type == 'doing')->andWhere('status')->eq($type)->fi()
                    ->beginIF($type == 'other')->andWhere('status')->ne('doing')->fi()
                    ->andWhere('t1.product')->eq($productID)
                    ->fetchAll();
            foreach ( $projects as $key=>$project) {
                $totalTask = $this->dao->select('count(*) as value')->from(TABLE_TASK)->where('project')->eq($project->id)->fetch();
                $closedTask = $this->dao->select('count(*) as value')->from(TABLE_TASK)->where('assignedTo')->eq('closed')->andWhere('project')->eq($project->id)->fetch();
                $totalBug = $this->dao->select('count(*) as value')->from(TABLE_BUG)->where('product')->eq($productID)->andWhere('project')->eq($project->id)->fetch();
                $activeBug = $this->dao->select('count(*) as value')->from(TABLE_BUG)->where('status')->eq('active')->andWhere('product')->eq($productID)->andWhere('project')->eq($project->id)->fetch();
                $project->totalTask = $totalTask->value;
                $project->closedTask = $closedTask->value;
                $project->totalBug = $totalBug->value;
                $project->activeBug = $activeBug->value;
                $projects[$key] = $project;
            }
            $product->projects = $projects;
            $products[$productID] = $product;
        }
        return $products;
    }
public function getProductStatisticst($orderBy, $type,$productname,$projectname,$pager){
        //判断类型确定查询条件
        $products = $this->dao->select('t2.id project_id, t2.name project_name,t3.name product_name,t3.id product_id,t2.status project_status,t3.code')
                    ->from(TABLE_PROJECTPRODUCT)->alias('t1')
                    ->leftJoin(TABLE_PROJECT)->alias('t2')
                    ->on('t1.project = t2.id')
                    ->leftJoin(TABLE_PRODUCT)->alias('t3')
                    ->on('t1.product = t3.id')
                    ->where('t3.deleted')->eq(0)
                    ->beginIF($projectname != '')->andWhere('t2.name')->like("%".$projectname."%")->fi()
                    ->beginIF($productname != '')->andwhere('t3.name')->like("%".$productname."%")->fi()
                    ->beginIF($type == 'other')->andWhere('t2.status')->ne('doing')->fi()
                    ->beginIF(count(explode('doing',$type))>1)->andWhere('t2.status')->eq('doing')->fi()
                    ->page($pager)
                    ->fetchAll();

        foreach ($products as $key=>$product) {
            $totalStory  = $this->dao->select('count(*) as totalStory')
                            ->from(TABLE_STORY)
                            ->where('product')->eq($product->product_id)
                            ->fetch(totalStory);

            $closedStory = $this->dao->select('count(*) as closedStory')
                            ->from(TABLE_STORY)
                            ->where('product')->eq($product->product_id)
                            ->andwhere('status')->eq('closed')
                            ->fetch(closedStory);
            $totalTask  = $this->dao->select('count(*) as value')
                            ->from(TABLE_TASK)
                            ->where('project')->eq($product->project_id)
                            ->fetch(value);
            $closedTask = $this->dao->select('count(*) as value')
                            ->from(TABLE_TASK)
                            ->where('assignedTo')->eq('closed')
                            ->andWhere('project')->eq($product->project_id)
                            ->fetch(value);
            $totalBug   = $this->dao->select('count(*) as value')
                            ->from(TABLE_BUG)
                            ->where('product')->eq($product->product_id)
                            ->andWhere('project')->eq($product->project_id)
                            ->fetch(value);

            $activeBug  = $this->dao->select('count(*) as value')
                            ->from(TABLE_BUG)->where('status')->eq('active')
                            ->andWhere('product')->eq($product->product_id)
                            ->andWhere('project')->eq($product->project_id)
                            ->fetch(value);
            //拼装
            $temparr->id = $product->project_id;
            $temparr->name = $product->project_name;
            $temparr->totalTask = $totalTask;
            $temparr->closedTask = $closedTask;
            $temparr->totalBug = $totalBug;
            $temparr->activeBug = $activeBug;

            $result[$product->product_id]->id = $product->product_id;
            $result[$product->product_id]->name = $product->product_name;
            $result[$product->product_id]->totalStory = $totalStory;
            $result[$product->product_id]->closedStory = $closedStory;
            $result[$product->product_id]->code = $product->code;
            $result[$product->product_id]->projects[] = $temparr; 

            unset($temparr);//释放资源

        }
        //刷选type
        foreach ($result as $key => $value) {
           foreach ($value->projects as $k => $val) {
               if ($type == 'doingnow' ){ //删除所有都为0的
                    if ($val->totalTask-$val->closedTask == 0 && $value->totalStory == 0) {
                     unset($result[$key]);
                }
               }
               if ($type == 'doingwait'){
                //待进行：删掉所有都不为0的
                if ($val->totalTask-$val->closedTask > 0 || $value->totalStory > 0) {
                     unset($result[$key]);
                }
               }
           }
        }
        //排序
        //拆分排序字段
        $order = explode('_',$orderBy);
        $orderfield = $order[0];
        if ($orderfield == 'totalTask') {
           foreach ($result as $key => $value) {
                $sum = 0;
                // var_dump($value);
                foreach ($value->projects as $k => $val) {
                    $sum = $sum + $val->$orderfield;
                }
                $num1[] = $sum;
        }
        }else{
            foreach ($result as $key => $value) {
                $num1[] = $value->$orderfield;
            }
        }
        if ($order[1] == 'desc') {
            array_multisort($num1,SORT_DESC,$result);
        }else{
            array_multisort($num1,SORT_ASC,$result);
        }
        return $result;
    }
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
public function getSysURL()
{
return common::getSysURL();
}
//**//
}