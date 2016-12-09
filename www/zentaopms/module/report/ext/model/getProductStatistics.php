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
