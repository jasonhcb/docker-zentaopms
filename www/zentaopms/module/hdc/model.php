<?php

class hdcModel extends model {

    public function setMenu($projects, $projectID, $branch = 0,$currentMethod = 'browse') {
        $this->loadModel('project')->setMenu($projects, $projectID, $branch);
        $selectHtml = $this->select($projects, $projectID, 'hdc', $currentMethod, '', $branch);
        // print_r($selectHtml);
        foreach ($this->lang->hdc->menu as $key => $menu) {
            $replace = ($key == 'projectselect') ? $selectHtml : $projectID;
            common::setMenuVars($this->lang->hdc->menu, $key, $replace);
        }
    }

    public function getHdcs($projectID, $browseType, $queryID, $sort, $pager) {
        if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;
        }
        $nowtime= date("Y-m-d", time());
        $hdcs = $this->dao->select('*')->from(TABLE_HDC)
                        ->where('deleted')->eq(0)
                        ->beginIF($projectID != 0)->andWhere('project')->eq($projectID)->fi()
                        ->beginIF($browseType == 'unactivated')->andWhere('status')->eq(0)->fi()
                        ->beginIF($browseType == 'activated')->andWhere('status')->eq(1)->fi()
                        ->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
                        ->beginIF($browseType == 'deleayed')
                        ->andWhere("estReqSubmitDate != 0000-00-00 & estCodeEndDate != 0000-00-00 & estCodeStartDate != 0000-00-00 & estTestEndDate != 0000-00-00 ")
                        ->andWhere("((step = 'WaitingForRequirement' && estReqSubmitDate < $nowtime) || (step = 'WaitingForCoding' && estCodeStartDate < $nowtime) || ((step = 'Coding' || step = 'WaitingForCoding') && estCodeEndDate < $nowtime) || ((step = 'WaitingForOnsiteTest' || step = 'OnsiteTesting') && estTestEndDate < $nowtime) )")
                        ->fi()
                        ->orderBy(trim($sort, ','))->page($pager)->fetchAll();

        // var_dump($hdcs);
        foreach ($hdcs as $key => $hdc) {
            $status = 'WaitingForRequirement';
            if ($hdc->status) {
                $tasks = $this->dao->select('*')->from(TABLE_TASK)->where('story')->eq($hdc->story)->orderby('id ASC')->fetchAll();
                foreach ($tasks as $k => $value) {
                   if ($value->realStarted == "0000-00-00") {
                       $tasks[$k]->realStarted = null;
                   }
                   if ($value->finishedDate == "0000-00-00 00:00:00") {
                       $tasks[$k]->finishedDate = null;
                   }
                }
                if ($tasks[0]->status == 'wait' || $tasks[0]->status == 'doing')
                    $status = 'WaitingForRequirement';
                if ($tasks[0]->status == 'done' && $tasks[1]->status == 'wait')
                    $status = 'WaitingForReqValidation';
                if ($tasks[1]->status == 'doing')
                    $status = 'RequirementValidating';
                if ($tasks[1]->status == 'done' && $tasks[2]->status == 'wait')
                    $status = 'WaitingForCoding';
                if ($tasks[2]->status == 'doing' || $tasks[3]->status == 'doing' || ($tasks[2]->status == 'done' && $tasks[3]->status == 'wait'))
                    $status = 'Coding';
                if ($tasks[3]->status == 'done' && $tasks[4]->status == 'wait')
                    $status = 'WaitingForRemoteTest';
                if ($tasks[4]->status == 'doing')
                    $status = 'RemoteTesting';
                if ($tasks[4]->status == 'done' && $tasks[5]->status == 'wait')
                    $status = 'WaitingForOnsiteTest';
                if ($tasks[5]->status == 'doing')
                    $status = 'OnsiteTesting';
                if ($tasks[5]->status == 'done')
                    $status = 'Released';
                //取前面6个
                $newtasks = array_slice($tasks,0,6);
                foreach ($newtasks as $task) {
                    if ($task->status == 'pause')
                        $status = 'Pause';
                    if ($task->status == 'cancel') {
                        $status = 'Cancel';
                        break;
                    }
                }
                $team = $this->loadModel('project')->getTeamMemberPairs($hdc->project);
                $udhdc = new stdclass();
                $hdc->operateTime = '0000-00-00';
                if ($tasks[0]->lastEditedDate > $hdc->operateTime) {
                    $udhdc->funcDesign = $team[$tasks[0]->assignedTo] ? $this->hdcUserFormat($team[$tasks[0]->assignedTo]) : '';
                    $udhdc->estReqSubmitDate = $tasks[0]->estStarted;
                    $udhdc->actReqSubmitDate = $tasks[0]->realStarted;
                }
                if ($tasks[1]->lastEditedDate > $hdc->operateTime) {
                    $udhdc->remoteTest = $team[$tasks[1]->assignedTo] ? $this->hdcUserFormat($team[$tasks[1]->assignedTo]) : '';
                    $udhdc->actReqComfimBeganDate = empty($tasks[1]->realStarted) ? $tasks[1]->finishedDate : $tasks[1]->realStarted;
                    $udhdc->actReqComfimEndDate =$tasks[1]->finishedDate;
                }
                if ($tasks[2]->lastEditedDate > $hdc->operateTime) {
                    $udhdc->techDesign = $team[$tasks[2]->assignedTo] ? $this->hdcUserFormat($team[$tasks[2]->assignedTo]) : '';
                    $udhdc->estCodeStartDate = $tasks[2]->estStarted;
                    $udhdc->actCodeStartDate  = empty($tasks[2]->realStarted)? $tasks[2]->finishedDate : $tasks[2]->realStarted;
                    $udhdc->onCodingStartDate = empty($tasks[2]->realStarted)? $tasks[2]->finishedDate : $tasks[2]->realStarted;
                }
                if ($tasks[3]->lastEditedDate > $hdc->operateTime) {
                    $udhdc->codeDevelop = $team[$tasks[3]->assignedTo] ? $this->hdcUserFormat($team[$tasks[3]->assignedTo]) : '';
                    $udhdc->estCodeEndDate = $tasks[3]->deadline;
                    $udhdc->actCodeEndDate = $tasks[3]->finishedDate;
                }
                if ($tasks[4]->lastEditedDate > $hdc->operateTime) {
                    $udhdc->remoteTest = $team[$tasks[4]->assignedTo] ? $this->hdcUserFormat($team[$tasks[4]->assignedTo]) : '';
                    $udhdc->deadline = $tasks[4]->deadline;
                    $udhdc->actTestBeganDate = empty($tasks[4]->realStarted)? $tasks[4]->finishedDate : $tasks[4]->realStarted;
                    $udhdc->actTestEndDate = $tasks[4]->finishedDate;
                }
                if ($tasks[5]->lastEditedDate > $hdc->operateTime) {
                    $udhdc->siteAccept = $team[$tasks[5]->assignedTo] ? $this->hdcUserFormat($team[$tasks[5]->assignedTo]) : '';
                    $udhdc->estTestEndDate = $tasks[5]->estStarted;
                    $udhdc->actOnsiteTestBeganDate = empty($tasks[5]->realStarted)? $tasks[5]->finishedDate : $tasks[5]->realStarted;
                    $udhdc->actOnsiteTestEndDate = $tasks[5]->finishedDate;
                }
                $udhdc->recopercent = "";
                $udhdc->confimDate = "";
                //成本确认比例
                if (!empty($tasks[2]->realStarted) || !empty($tasks[2]->finishedDate) || !empty($tasks[3]->realStarted) || !empty($tasks[3]->finishedDate)) {//当任务“技术设计”或“代码开发”的开始或完成时间有值，则成本确认比例为10%。注意时间如果0000-00-00则认为是空值
                   $udhdc->recopercent = "10%";
                }
                if (!empty($tasks[4]->finishedDate) && (ceil(strtotime(date('Y-m-d H:i:s')) - strtotime($tasks[4]->finishedDate)) / 86400 < 7 )) {//当任务“远程测试”的完成时间有值，且完成日期+7天>当前日期，则成本确认比例为50%
                    $udhdc->recopercent = "50%";
                }
                if (!empty($tasks[4]->finishedDate) && (ceil(strtotime(date('Y-m-d H:i:s')) - strtotime($tasks[4]->finishedDate)) / 86400 >= 7 )) {//当任务“远程测试”的完成时间有值，且完成日期+7天<=当前时间，同时在完成时间至完成时间+7天内没有非“其他”类型的状态非“已完成”任务创建（看任务的创建日期是否落在这个时间范围内,如果有这样的任务存在，则比例为50%），则成本确认比例为100%；或任务“现场测试”的完成时间有值，则成本确认比例直接为100%

                    $alltask = count($tasks);
                    $stddd = '0';
                    for ($i=6; $i < $alltask; $i++) { 
                        if ($tasks[$i]->type == "misc" && ((ceil(strtotime($tasks[$i]->openedDate) - strtotime($tasks[4]->finishedDate)) / 86400 <= 7) && (ceil(strtotime($tasks[$i]->openedDate) - strtotime($tasks[4]->finishedDate)) / 86400 >= 0 )) && ($tasks[$i]->status == 'done' || $tasks[$i]->status == 'pause' || $tasks[$i]->status == 'cancel') ) {
                            $udhdc->recopercent = "50%";
                            $stddd = '1';
                        }
                    }
                    if ($stddd != '1') {
                        $udhdc->recopercent = "100%";
                        $udhdc->confimDate = date('Y-m-d', strtotime($tasks[4]->finishedDate) + 3600 * 24 * 7);
                    }
                }
                if (!empty($tasks[5]->finishedDate)) {
                   $udhdc->recopercent = "100%";
                   $udhdc->confimDate = $tasks[5]->finishedDate;
                }
                if ($hdc->step != $status) {
                    $udhdc->step = $status;
                }
                if ($udhdc) {
                    $udhdc->operateTime = helper::now();
                    $this->dao->update(TABLE_HDC)->data($udhdc)->where('id')->eq($hdc->id)->exec();
                    $hdc = $this->dao->select('*')->from(TABLE_HDC)->where('id')->eq($hdc->id)->fetch();
                    $hdcs[$key] = $hdc;
                }
            }
        }
        return $hdcs;
    }

    // public function getReportData($projectID, $browseType, $queryID, $sort) {
    //     if ($browseType == 'bysearch') {
    //         $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
    //         if ($query) {
    //             $this->session->set('hdcQuery', $query->sql);
    //             $this->session->set('hdcForm', $query->form);
    //         }
    //         if ($this->session->hdcQuery == false)
    //             $this->session->set('hdcQuery', ' 1 = 1');

    //         $hdcQuery = $this->session->hdcQuery;
    //     }
    //     $allProjects = $this->loadModel('project')->getPairs('nocode');
    //     if ($this->post->allProjects || !$this->post->projects){
    //         $projects = array_keys($allProjects);
    //     }else
    //         $projects = $this->post->projects;
    //     $hdcs = $this->dao->select('t1.*,IF(t2.status = "changed","Y","N") storyChanged')->from(TABLE_HDC)
    //                     ->alias('t1')
    //                     ->leftJoin(TABLE_STORY)->alias('t2')
    //                     ->on('t1.story = t2.id')
    //                     ->where('t1.deleted')->eq(0)
    //                     ->beginIF($projectID != 0)->andWhere('t1.project')->in($projects)->fi()
    //                     ->beginIF($browseType == 'unactivated')->andWhere('t1.status')->eq(0)->fi()
    //                     ->beginIF($browseType == 'activated')->andWhere('t1.status')->eq(1)->fi()
    //                     ->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
    //                     ->orderBy(trim($sort, ','))->fetchAll();
    //     // var_dump($hdcs);
    //     // foreach ($hdcs as $key => $value) {
    //     //     $result[] = $value->story;
    //     // }
    //     // $tasks = $this->dao->select('t1.id,t1.story,t1.type,t1.status,t1.finishedDate')->from(TABLE_TASK)
    //     //                     ->where('story')->in($result)->andwhere('story')->ne(null)
    //     //                     ->orderby('id ASC')->fetchAll();
    //     // var_dump($tasks);
    //     // exit;
    //     $reportData = array();
    //     foreach ($hdcs as $key => $hdc) {
    //         if ($hdc->status) {
    //             // $story = $this->dao->select('*')->from(TABLE_STORY)->where('id')->eq($hdc->story)->fetch();
    //             // $hdc->storyChanged = $story->status == 'changed' ? 'Y' : 'N';
    //             $tasks = $this->dao->select('*')->from(TABLE_TASK)->where('story')->eq($hdc->story)->orderby('id ASC')->fetchAll();
    //             $costRatio = '';
    //             $chargingEndDate = '';
    //             $FTIsStarted = $this->dao->select('*')->from(TABLE_ACTION)->where('objectID')->in($tasks[2]->id . ',' . $tasks[3]->id)->andWhere('action')->eq('started')->fetchAll();
    //             $FTIsFinished = $this->dao->select('*')->from(TABLE_ACTION)->where('objectID')->in($tasks[2]->id . ',' . $tasks[3]->id)->andWhere('action')->eq('finished')->fetchAll();
    //             if ($FTIsStarted || $FTIsFinished)
    //                 $costRatio = '10%';
    //             $RIsFinished = $this->dao->select('*')->from(TABLE_ACTION)->where('objectID')->eq($tasks[4]->id)->andWhere('action')->eq('finished')->fetch();
    //             if ($RIsFinished)
    //                 $costRatio = '50%';
    //             if ($RIsFinished && ceil(strtotime(date('Y-m-d H:i:s')) - strtotime($RIsFinished->date)) / 86400 > 7) {
    //                 $st = 0;
    //                 for ($i = 0; $i < count($tasks); $i++) {
    //                     if ($tasks[$i]->type != 'misc' && $tasks[$i]->status != 'done')
    //                         $st = 1;
    //                 }
    //                 if(!$st) {
    //                     $costRatio = '100%';
    //                     $chargingEndDate = date('Y-m-d', strtotime($RIsFinished->date) + 3600 * 24 * 7);
    //                 }
    //             }
    //             $SIsFinished = $this->dao->select('*')->from(TABLE_ACTION)->where('objectID')->eq($tasks[5]->id)->andWhere('action')->eq('finished')->fetchAll();
    //             if ($SIsFinished) {
    //                 $costRatio = '100%';
    //                 $chargingEndDate = date('Y-m-d', strtotime($tasks[5]->finishedDate));
    //             }
    //             $hdc->costRatio = $costRatio;
    //             $hdc->chargingEndDate = $chargingEndDate;
    //             $hdc->tasks = $tasks;
    //         } else {
    //             $hdc->storyChanged = 'N';
    //             $hdc->costRatio = '';
    //             $hdc->chargingEndDate = '';
    //             $hdc->tasks = [];
    //         }
    //         $hdc->project = $this->dao->findById($hdc->project)->from(TABLE_PROJECT)->fetch();;
    //         foreach ($hdc as $kk => $vv) {
    //             if ($vv == "0000-00-00" || $vv == "0000-00-00 00:00:00") {
    //                 $hdc->$kk = '';
    //             }
    //         }
    //         foreach ($hdc->project as $k => $v) {
    //            if ($v == "0000-00-00" || $v == "0000-00-00 00:00:00") {
    //                 $hdc->project->$k = '';
    //             }
    //         }
    //         foreach ($hdc->tasks as $ki => $vi) {
    //             foreach ($vi as $ko => $vo) {
    //                 if ($vo == "0000-00-00" || $vo == "0000-00-00 00:00:00") {
    //                 $hdc->tasks[$ki]->$ko = '';
    //             }
    //             }
    //         }
    //         $reportData[$key] = $hdc;
    //     }
    //     return $reportData;

    // }

    public function getdateReportData($projectID, $browseType, $queryID, $sort)
    {
       // if ($browseType == 'bysearch') {
       //      $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
       //      if ($query) {
       //          $this->session->set('hdcQuery', $query->sql);
       //          $this->session->set('hdcForm', $query->form);
       //      }
       //      if ($this->session->hdcQuery == false)
       //          $this->session->set('hdcQuery', ' 1 = 1');

       //      $hdcQuery = $this->session->hdcQuery;
       //  }
        //获得所有的选取项目
        $role = array(1,17,19);
        $roleok = $this->getroleok($role);
        if ($roleok == "yes") {
            $tempallcation = $this->getAllcation();
            foreach ($tempallcation as $key => $value) {
                $allProjects[$value->project_id] = $value->name;
            }
        }else{
             $allProjects = $this->loadModel('project')->getPairs('nocode');
        }
        
        if ($this->post->allProjects || !$this->post->projects){
            $projects = array_keys($allProjects);
        }else
            $projects = $this->post->projects;
        //获得刷选条件
        if ($this->post->icd && ($this->post->finishtime != '' || $this->post->finishtime !='' || $this->post->endtime!= '')) {
            $finishitime = $this->post->finishtime;
            $begintime = $this->post->begintime;
            $endtime = $this->post->endtime;
            switch ($this->post->icd) {
                case '1':
                    $ttype = "gt";
                    break;
                
                case '2':
                    $ttype = "lt";
                    break;
                case '3':
                    $ttype = "between";
                    break;
            }
        }   
        $result = $this->dao->select('id,name')->from(TABLE_PROJECT)->where('id')->in($projects)->fetchAll();

        //远程开发中心的所有ID
        $tempdevdept = $this->dao->select('id')->from(TABLE_DEPT)->where('path')->like('%446%')->fetchAll();
        foreach ($tempdevdept as $key => $value) {
            $devdept[] = $value->id;
        }
        $temporacledept = $this->dao->select('id')->from(TABLE_DEPT)->where('path')->like('%195%')->fetchAll();
        foreach ($temporacledept as $key => $value) {
            $oracledept[] = $value->id;
        }
        $dept = array_merge($devdept,$oracledept);
        //查询主要的数据
        $onsitedata = $this->dao->select('t1.project,round(sum(t1.onsiteManday),2) onsiteManday')->from(TABLE_HDC)->alias('t1')
                        ->where('t1.deleted')->eq(0)
                        ->beginIF($projectID != 0)->andWhere('t1.project')->in($projects)->fi()
                        ->andwhere('t1.funcOwnership')->ne('Onsite')
                        ->andWhere('t1.step')->notin('Cancel,Pause,WaitingForRequirement')
                        ->beginIF($ttype == 'gt')->andwhere("t1.deadline >= '".$finishitime."'")->fi()
                        ->beginIF($ttype == 'lt')->andwhere("t1.deadline <= '".$finishitime."'")->fi()
                        ->beginIF($ttype == 'between')->andwhere("t1.deadline")->between($begintime,$endtime)->fi()
                        ->groupBy('t1.project')
                        ->fetchall();

        $codecmtdata = $this->dao->select('t1.project,round(sum(t1.codecmtManday),2) codecmtManday')->from(TABLE_HDC)->alias('t1')
                        ->where('t1.deleted')->eq(0)
                        ->beginIF($projectID != 0)->andWhere('t1.project')->in($projects)->fi()
                        ->andwhere('t1.devOwnership')->ne('Onsite')
                        ->andWhere('t1.step')->notin('Cancel,Pause,WaitingForRequirement,WaitingForReqValidation,RequirementValidating,WaitingForCoding,Coding')
                        ->beginIF($ttype == 'gt')->andwhere("t1.deadline >= '".$finishitime."'")->fi()
                        ->beginIF($ttype == 'lt')->andwhere("t1.deadline <= '".$finishitime."'")->fi()
                        ->beginIF($ttype == 'between')->andwhere("t1.deadline")->between($begintime,$endtime)->fi()
                        ->groupBy('t1.project')
                        ->fetchall();

        $remotedata = $this->dao->select('t1.project,round(sum(t1.remoteManday),2) remoteManday')->from(TABLE_HDC)->alias('t1')
                        ->leftJoin(TABLE_USER)->alias('t3')->on("(substring_index(t1.remoteTest, '/', -1) = t3.account)")
                        ->where('t1.deleted')->eq(0)
                        ->beginIF($projectID != 0)->andWhere('t1.project')->in($projects)->fi()
                        ->andWhere('t1.step')->in('WaitingForOnsiteTest,OnsiteTesting,Released')
                        ->beginIF($ttype == 'gt')->andwhere("t1.deadline >= '".$finishitime."'")->fi()
                        ->beginIF($ttype == 'lt')->andwhere("t1.deadline <= '".$finishitime."'")->fi()
                        ->beginIF($ttype == 'between')->andwhere("t1.deadline")->between($begintime,$endtime)->fi()
                        ->andWhere('t3.dept')->in($dept)
                        ->groupBy('t1.project')
                        ->fetchall();

        foreach ($result as $key => $value) {
            //功能设计人天
            foreach ($onsitedata as $k => $v) {
                if ($value->id == $v->project) {
                    $result[$key]->onsite = $v->onsiteManday;
                }
            }

            //开发人天
            foreach ($codecmtdata as $k => $v) {
                if ($value->id == $v->project) {
                    $result[$key]->codecmt = $v->codecmtManday;
                }
            }

            //测试人天
            foreach ($remotedata as $k => $v) {
                if ($value->id == $v->project) {
                    $result[$key]->remote = $v->remoteManday;
                }
            }

            if (empty($value->onsite)) {
               $result[$key]->onsite = 0;
            }
            if (empty($value->codecmt)) {
               $result[$key]->codecmt = 0;
            }
            if (empty($value->remote)) {
               $result[$key]->remote = 0;
            }
        }
        return $result;
    }

    public function getById($hdcID) {
        return $this->dao->findById($hdcID)->from(TABLE_HDC)->fetch();
    }

    public function getImportFields() {
        $hdcLang = $this->lang->hdc;
        $hdcConfig = $this->config->hdc;
        $fields = explode(',', $hdcConfig->importFields);
        foreach ($fields as $key => $fieldName) {
            $fieldName = trim($fieldName);
            $fields[$fieldName] = isset($hdcLang->$fieldName) ? $hdcLang->$fieldName : $fieldName;
            unset($fields[$key]);
        }

        return $fields;
    }

    public function buildSearchForm($projectID, $projects, $queryID, $actionURL) {
        $this->config->hdc->search['actionURL'] = $actionURL;
        $this->config->hdc->search['queryID'] = $queryID;
        $this->config->hdc->search['params']['project']['values'] = array($projectID => $projects[$projectID], 'all' => $this->lang->project->allProject);
        // Projects
        $this->loadModel('project');
        $projectss[''] = '';
        $role = array(1,17,19);
        $roleok = $this->getroleok($role);
        if ($roleok == "yes") {
            $tempallcation = $this->getAllcation();
            foreach ($tempallcation as $key => $value) {
                $projectss[$value->project_id] = $value->name;
            }
        }else{
            $projectss = $this->project->getPairs('nocode');
        }
        $this->config->hdc->search['params']['projects']['values'] = $projectss;
        //Center
        $checkdata = $this->getcenterbyid('','','all');
        $devcenter[''] = '';
        foreach ($checkdata as $key => $value) {
            $devcenter[$value->hr_id] = $value->center_name;
        }
        $this->config->hdc->search['params']['assigntocenter']['values'] = $devcenter;
        $this->loadModel('search')->setSearchParams($this->config->hdc->search);
    }

    public function createFromImport($projectID, $productID = 0, $branch = 0) {
        $data = fixer::input('post')->get();
        foreach ($data->project as $key => $project) {
            if (!$data->code[$key] || !$data->name[$key])
                continue;
            if(empty($data->funcOwnership[$key]) || empty($data->devOwnership[$key])){
                die(js::error("功能设计归属和开发归属不能为空!"));
                return false;
            }
            $existhdc = $this->dao->select('*')->from(TABLE_HDC)->where('code')->eq($data->code[$key])->andWhere('product')->eq($productID)->andWhere('project')->eq($project)->andWhere('deleted')->eq(0)->fetch();
            $hdc = new stdclass();
            if (!$existhdc) {
                $hdc->product = $productID;
                $hdc->project = $project;
                $hdc->code = $data->code[$key];
            }
            $hdc->name = $data->name[$key];
            $hdc->desc = $data->desc[$key];
            $hdc->step = 'WaitingForRequirement';
            $hdc->deadline = !empty($data->deadline[$key]) ? $data->deadline[$key] : '0000-00-00';
            $hdc->type = $data->type[$key];
            $hdc->rating = $data->rating[$key];
            if (stripos($data->devOwnership[$key],'SAP') === false) {
                $mandays = $this->getMandays($data->type[$key], $data->rating[$key]);
            }else{
                $mandays = $this->getSapMandays($data->type[$key], $data->rating[$key]);
            }
            $hdc->totalManday = $mandays['total_manday'];
            $hdc->onsiteManday = $mandays['onsite_manday'];
            $hdc->remoteManday = $mandays['remote_manday'];
            $hdc->codecmtManday = $mandays['code_commit_manday'];
            $hdc->funcDesign = $data->funcDesign[$key];
            $hdc->techDesign = $data->techDesign[$key];
            $hdc->codeDevelop = $data->codeDevelop[$key];
            $hdc->remoteTest = $data->remoteTest[$key];
            $hdc->siteAccept = $data->siteAccept[$key];
            $hdc->remoteHead = $data->remoteHead[$key];
            $hdc->siteHead = $data->siteHead[$key];
            $hdc->funcOwnership = $data->funcOwnership[$key];
            $hdc->devOwnership = $data->devOwnership[$key];
            $hdc->estReqSubmitDate = !empty($data->estReqSubmitDate[$key]) ? $data->estReqSubmitDate[$key] : '0000-00-00';
            $hdc->estCodeStartDate = !empty($data->estCodeStartDate[$key]) ? $data->estCodeStartDate[$key] : '0000-00-00';
            $hdc->estCodeEndDate = !empty($data->estCodeEndDate[$key]) ? $data->estCodeEndDate[$key] : '0000-00-00';
            $hdc->estTestEndDate = !empty($data->estTestEndDate[$key]) ? $data->estTestEndDate[$key] : '0000-00-00';
            $hdc->actReqSubmitDate = !empty($data->actReqSubmitDate[$key]) ? $data->actReqSubmitDate[$key] : '0000-00-00';
            $hdc->actCodeStartDate = !empty($data->actCodeStartDate[$key]) ? $data->actCodeStartDate[$key] : '0000-00-00';
            $hdc->actCodeEndDate = !empty($data->actCodeEndDate[$key]) ? $data->actCodeEndDate[$key] : '0000-00-00';
            $hdc->actTestEndDate = !empty($data->actTestEndDate[$key]) ? $data->actTestEndDate[$key] : '0000-00-00';
            $hdc->operateTime = date('Y-m-d H:i:s', time());

            if ($existhdc) {
                $this->dao->update(TABLE_HDC)->data($hdc)->where('id')->eq($existhdc->id)->limit(1)->exec();
                if ($existhdc->status) {
                    $hdc->code = $existhdc->code;
                    $hdc->story = $existhdc->story;
                    $this->handleActivated($hdc);
                }
            } else {
                $this->dao->insert(TABLE_HDC)->data($hdc)->autoCheck()->exec();
            }
            if (!dao::isError())
                unset($_SESSION['importData'][$key]);
        }
    }

    public function checkOwner($nameStr) {
        $nameArr = explode('/', $nameStr);
        $account = $nameArr[1];
        $user = $this->loadModel('user')->getById($account);
        if ($user)
            return $account;
        else
            return false;
    }

    public function activate($hdcID) {
        $hdc = $this->getById($hdcID);
        $err = 0;
        foreach ($this->lang->hdc->taskTitle as $key => $title) {
            if ($hdc->$key && !$this->checkOwner($hdc->$key)) {
                $err = 1;
                $msg = vsprintf($this->lang->hdc->ownerErr, array($title));
                break;
            }
        }
        if ($err) {
            return array('message' => $msg);
        } else {
            $this->doActivate($hdc);
            if (dao::isError())
                return array('message' => dao::getError());
            return array('result' => 'success');
        }
    }

    public function batchActivate($hdcIDList) {
        foreach ($hdcIDList as $hdcID) {
            $hdc = $this->getById($hdcID);
            $err = 0;
            foreach ($this->lang->hdc->taskTitle as $key => $title) {
                if ($hdc->$key && !$this->checkOwner($hdc->$key)) {
                    $err = 1;
                    break;
                }
            }
            if (!$err)
                $this->doActivate($hdc);
        }
    }

    public function doActivate($hdc) {
        if (empty($hdc))
            return false;
        $mandays = $this->getMandays($hdc->type, $hdc->rating);
        if ($hdc->status) {
            return false;
        } else {
            $now = helper::now();
            $story = new stdclass();
            if (!$hdc->product) {
                $products = $this->loadModel('product')->getProductsByProject($hdc->project);
                if ($products)
                    $hdc->product = key($products);
            }
            $story->product = $hdc->product;
            $story->title = $hdc->code . '-' . $hdc->name;
            $story->openedDate = $now;
            $story->assignedDate = 0;
            $story->version = 1;
            $story->status = 'active';
            $story->estimate = $mandays['code_commit_manday'];

            $this->dao->insert(TABLE_STORY)->data($story)->autoCheck()->exec();
            if (!dao::isError()) {
                $udhdc = new stdclass();
                $storyID = $this->dao->lastInsertID();
                $udhdc->story = $storyID;
                $udhdc->status = 1;
                $udhdc->operateTime = date('Y-m-d H:i:s', time());
                $this->dao->update(TABLE_HDC)->data($udhdc)->where('id')->eq($hdc->id)->exec();
                $data = new stdclass();
                $data->story = $storyID;
                $data->version = 1;
                $data->title = $hdc->code . '-' . $hdc->name;
                $data->spec = $hdc->desc;
                $data->verify = '';
                $this->dao->insert(TABLE_STORYSPEC)->data($data)->exec();

                if ($hdc->project != 0) {
                    $this->dao->insert(TABLE_PROJECTSTORY)
                            ->set('project')->eq($hdc->project)
                            ->set('product')->eq($hdc->product)
                            ->set('story')->eq($storyID)
                            ->set('version')->eq(1)
                            ->exec();
                }

                foreach ($this->lang->hdc->taskTitle as $key => $title) {
                    $task = new stdclass();
                    $task->project = $hdc->project;
                    $task->story = $storyID;
                    $task->storyVersion = 1;
                    if (stripos($hdc->devOwnership,'SAP') !== false  && $key == "remoteTest") {//如是SAP类型且是远程测试类型
                        $title = "程序测试";
                    }
                    $task->name = $title;
                    $task->type = 'misc';
                    $task->deadline = '0000-00-00';
                    $task->desc = $hdc->desc;
                    $task->assignedTo = trim(strstr($hdc->$key, '/'), '/');
                    if ($key == "funcDesign") {
                        $task->deadline = $hdc->estReqSubmitDate;
                        $task->realStarted = $hdc->actReqSubmitDate;
                    } elseif ($key == "funcVerify") {
                        $task->assignedTo = trim(strstr($hdc->remoteTest, '/'), '/');
                    } elseif ($key == 'techDesign') {
                        $task->estStarted = $hdc->estCodeStartDate;
                        $task->realStarted = $hdc->actCodeStartDate;
                    } elseif ($key == "codeDevelop") {
                        $task->deadline = $hdc->estCodeEndDate;
                        $task->finishedDate = $hdc->actCodeEndDate;
                        $task->estimate = $mandays['code_commit_manday'];
                    } elseif ($key == 'remoteTest') {
                        $task->deadline = $hdc->deadline;
                    } elseif ($key == 'siteAccept') {
                        $task->estStarted = $hdc->estTestEndDate;
                        $task->realStarted = $hdc->actTestEndDate;
                    }
                    $team = $this->loadModel('project')->getTeamMemberPairs($hdc->project);
                    if ($task->assignedTo && !isset($team[$task->assignedTo])) {
                        $member = new stdClass();
                        $member->project = $hdc->project;
                        $member->account = $task->assignedTo;
                        $member->join = helper::today();
                        $member->role = '';
                        $member->days = 0;
                        $member->hours = 7;
                        $this->dao->insert(TABLE_TEAM)->data($member)->exec();
                    }
                    $task->openedBy = $task->assignedTo;
                    $task->openedDate = $now;
                    $task->assignedDate = $now;
                    $task->lastEditedBy = $this->app->user->account;
                    $task->lastEditedDate = $now;
                    $this->dao->insert(TABLE_TASK)->data($task)->autoCheck()->exec();
                }
            }
        }
    }

    public function getMandays($type, $rating) {
        $t_std_design_manday = $this->config->hdc->designManday[$type][$rating];
        $t_std_build_manday = $this->config->hdc->buildManday[$type][$rating];
        $func_manday = 0.5 * $t_std_design_manday;
        $tech_manday = 1.0 * $t_std_design_manday;
        $code_manday = 1.1 * $t_std_build_manday;
        $test_manday = 0.7 * $t_std_design_manday;
        $total_manday = $func_manday + $tech_manday + $code_manday + $test_manday;
        $onsite_manday = $func_manday;
        $code_commit_manday = (1.25 * $t_std_design_manday) + (1.1 * $t_std_build_manday);
        $remote_manday = $total_manday - $onsite_manday - $code_commit_manday;
        return array('total_manday' => $total_manday, 'onsite_manday' => $onsite_manday, 'code_commit_manday' => $code_commit_manday, 'remote_manday' => $remote_manday);
    }

    public function getSapMandays($type, $rating) {
        $t_std_design_manday = $this->config->hdc->SAPdesignManday[$type][$rating];
        $t_std_build_manday = $this->config->hdc->SAPbuildManday[$type][$rating];
        $func_manday = 0.5 * $t_std_design_manday;
        $tech_manday = 1.0 * $t_std_design_manday;
        $code_manday = 1.1 * $t_std_build_manday;
        $test_manday = 0.7 * $t_std_design_manday;
        $total_manday = $func_manday + $tech_manday + $code_manday + $test_manday;
        $onsite_manday = $func_manday;
        $code_commit_manday = $tech_manday + $code_manday;
        $remote_manday = $test_manday;
        return array('total_manday' => $total_manday, 'onsite_manday' => $onsite_manday, 'code_commit_manday' => $code_commit_manday, 'remote_manday' => $remote_manday);
    }

    public function getMailto($projectID) {
        $usergroup = $this->dao->select('*')->from(TABLE_GROUP)->where('role')->eq('hdcuser')->fetch();
        $admingroup = $this->dao->select('*')->from(TABLE_GROUP)->where('role')->eq('hdcadmin')->fetch();
        $userGroupUsers = $this->loadModel('group')->getUserPairs($usergroup->id);
        $adminGroupUsers = $this->loadModel('group')->getUserPairs($admingroup->id);
        $teamMembers = $this->loadModel('project')->getTeamMembers($projectID);
        $teamMailto = ',';
        foreach ($userGroupUsers as $key => $value) {
            if (isset($teamMembers[$key]) && !isset($adminGroupUsers[$key]))
                $teamMailto .= $key . ',';
        }
        $adminMailto = '';
        foreach ($adminGroupUsers as $key => $value) {
            $adminMailto .= $key . ',';
        }
        return trim($teamMailto . $adminMailto, ',') == '' ? '' : $teamMailto . $adminMailto;
    }

    public function update($hdcID) {
        $oldHdc = $this->getById($hdcID);
        //$team = $this->loadModel('project')->getTeamMemberPairs($oldHdc->project);
        $users = $this->loadModel('user')->getPairs('nodeleted');
        $hdc = fixer::input('post')
                ->setIF($this->post->deadline == '0000-00-00', 'deadline', '')
                ->setIF($this->post->funcDesign != '', 'funcDesign', isset($users[$this->post->funcDesign]) ? $this->hdcUserFormat($users[$this->post->funcDesign]) : '')
                ->setIF($this->post->techDesign != '', 'techDesign', isset($users[$this->post->techDesign]) ? $this->hdcUserFormat($users[$this->post->techDesign]) : '')
                ->setIF($this->post->codeDevelop != '', 'codeDevelop', isset($users[$this->post->codeDevelop]) ? $this->hdcUserFormat($users[$this->post->codeDevelop]) : '')
                ->setIF($this->post->remoteTest != '', 'remoteTest', isset($users[$this->post->remoteTest]) ? $this->hdcUserFormat($users[$this->post->remoteTest]) : '')
                ->setIF($this->post->siteAccept != '', 'siteAccept', isset($users[$this->post->siteAccept]) ? $this->hdcUserFormat($users[$this->post->siteAccept]) : '')
                ->setIF($this->post->remoteHead != '', 'remoteHead', isset($users[$this->post->remoteHead]) ? $this->hdcUserFormat($users[$this->post->remoteHead]) : '')
                ->setIF($this->post->siteHead != '', 'siteHead', isset($users[$this->post->siteHead]) ? $this->hdcUserFormat($users[$this->post->siteHead]) : '')
                ->get();
        if (stripos($hdc->devOwnership,'SAP') === false) {
                $mandays = $this->getMandays($hdc->type, $hdc->rating);
            }else{
                $mandays = $this->getSapMandays($hdc->type, $hdc->rating);
            }
        // $mandays = $this->getMandays($hdc->type, $hdc->rating);
        $hdc->totalManday = $mandays['total_manday'];
        $hdc->onsiteManday = $mandays['onsite_manday'];
        $hdc->remoteManday = $mandays['remote_manday'];
        $hdc->codecmtManday = $mandays['code_commit_manday'];

        $hdc->funcDesign = $hdc->funcDesign != '' ? $hdc->funcDesign : $oldHdc->funcDesign;
        $hdc->techDesign = $hdc->techDesign != '' ? $hdc->techDesign : $oldHdc->techDesign;
        $hdc->codeDevelop = $hdc->codeDevelop != '' ? $hdc->codeDevelop : $oldHdc->codeDevelop;
        $hdc->remoteTest = $hdc->remoteTest != '' ? $hdc->remoteTest : $oldHdc->remoteTest;
        $hdc->siteAccept = $hdc->siteAccept != '' ? $hdc->siteAccept : $oldHdc->siteAccept;
        $hdc->remoteHead = $hdc->remoteHead != '' ? $hdc->remoteHead : $oldHdc->remoteHead;
        $hdc->siteHead = $hdc->siteHead != '' ? $hdc->siteHead : $oldHdc->siteHead;
        $hdc->operateTime = helper::now();
        //update the team leaders
        foreach ($this->lang->hdc->taskTitle as $key => $title) {
                    // $task = new stdclass();
                    // $task->project = $hdc->project;
                    // $task->story = $storyID;
                    // $task->storyVersion = 1;
                    // if (stripos($hdc->devOwnership,'SAP') !== false  && $key == "remoteTest") {//如是SAP类型且是远程测试类型
                    //     $title = "程序测试";
                    // }
                    // $task->name = $title;
                    // $task->type = 'misc';
                    // $task->deadline = '0000-00-00';
                    // $task->desc = $hdc->desc;
                    $task->assignedTo = trim(strstr($hdc->$key, '/'), '/');
                    // if ($key == "funcDesign") {
                    //     $task->estStarted = $hdc->estReqSubmitDate;
                    //     $task->realStarted = $hdc->actReqSubmitDate;
                    // } elseif ($key == "funcVerify") {
                    //     $task->assignedTo = trim(strstr($hdc->remoteTest, '/'), '/');
                    // } elseif ($key == 'techDesign') {
                    //     $task->estStarted = $hdc->estCodeStartDate;
                    //     $task->realStarted = $hdc->actCodeStartDate;
                    // } elseif ($key == "codeDevelop") {
                    //     $task->deadline = $hdc->estCodeEndDate;
                    //     $task->finishedDate = $hdc->actCodeEndDate;
                    //     $task->estimate = $mandays['code_commit_manday'];
                    // } elseif ($key == 'remoteTest') {
                    //     $task->deadline = $hdc->deadline;
                    // } elseif ($key == 'siteAccept') {
                    //     $task->estStarted = $hdc->estTestEndDate;
                    //     $task->realStarted = $hdc->actTestEndDate;
                    // }
                    $team = $this->loadModel('project')->getTeamMemberPairs($oldHdc->project);
                    if ($task->assignedTo && !isset($team[$task->assignedTo])) {
                        $member = new stdClass();
                        $member->project = $oldHdc->project;
                        $member->account = $task->assignedTo;
                        $member->join = helper::today();
                        $member->role = '';
                        $member->days = 0;
                        $member->hours = 7;
                        $this->dao->insert(TABLE_TEAM)->data($member)->exec();
                    }
                    // $task->openedBy = $task->assignedTo;
                    // $task->openedDate = $now;
                    // $task->assignedDate = $now;
                    // $task->lastEditedBy = $this->app->user->account;
                    // $task->lastEditedDate = $now;

                    // $this->dao->insert(TABLE_TASK)->data($task)->autoCheck()->exec();
                }
        $this->dao->update(TABLE_HDC)->data($hdc)
                ->batchcheck('name', 'notempty')
                ->where('id')->eq($hdcID)
                ->limit(1)
                ->exec();
        if ($oldHdc->status) {
            $hdc->code = $oldHdc->code;
            $hdc->story = $oldHdc->story;
            $this->handleActivated($hdc);
        }
    }

    public function doDelete($hdcID) {
        $hdc = $this->getById($hdcID);
        if ($hdc->story) {
            $tasks = $this->dao->select('*')->from(TABLE_TASK)->where('story')->eq($hdc->story)->andWhere('deleted')->eq(0)->fetchAll();
            foreach ($tasks as $task) {
                $this->delete(TABLE_TASK, $task->id);
            }
            $this->loadModel('story')->setStage($hdc->story);
            $this->delete(TABLE_STORY, $hdc->story);
        }
        $this->delete(TABLE_HDC, $hdcID);
    }

    public function handleActivated($hdc) {
        $story = new stdclass();
        $story->title = $hdc->code . '-' . $hdc->name;
        $story->estimate = $hdc->codecmtManday;
        $this->dao->update(TABLE_STORY)->data($story)->where('id')->eq($hdc->story)->limit(1)->exec();

        $storyspec = new stdclass();
        $storyspec->title = $hdc->code . '-' . $hdc->name;
        $storyspec->spec = $hdc->desc;
        $this->dao->update(TABLE_STORYSPEC)->data($storyspec)->where('story')->eq($hdc->story)->limit(1)->exec();

        $tasks = $this->dao->select('*')->from(TABLE_TASK)->where('story')->eq($hdc->story)->orderby('id ASC')->fetchAll();
        $i = 0;
        foreach ($this->lang->hdc->taskTitle as $key => $title) {
            $task = new stdclass();
            $task->desc = $hdc->desc;
            $task->assignedTo = trim(strstr($hdc->$key, '/'), '/');
            if ($key == "funcDesign") {
                $task->deadline = $hdc->estReqSubmitDate;
                $task->realStarted = $hdc->actReqSubmitDate;
            } elseif ($key == "funcVerify") {
                $task->assignedTo = trim(strstr($hdc->remoteTest, '/'), '/');
            } elseif ($key == 'techDesign') {
                $task->estStarted = $hdc->estCodeStartDate;
                $task->realStarted = $hdc->actCodeStartDate;
            } elseif ($key == "codeDevelop") {
                $task->deadline = $hdc->estCodeEndDate;
                $task->finishedDate = $hdc->actCodeEndDate;
                $task->estimate = $hdc->codecmtManday;
            } elseif ($key == 'remoteTest') {
                $task->deadline = $hdc->deadline;
            } elseif ($key == 'siteAccept') {
                $task->estStarted = $hdc->estTestEndDate;
                $task->realStarted = $hdc->actTestEndDate;
            }
            $task->openedBy = $task->assignedTo;
            $task->openedDate = helper::now();
            $this->dao->update(TABLE_TASK)->data($task)->where('id')->eq($tasks[$i]->id)->limit(1)->exec();
            $i++;
        }
    }

    public function hdcUserFormat($memberPair) {
        $nameArr = explode(':', $memberPair);
        if (empty($nameArr)) {
            return false;
        } else {
            return $nameArr[1] . '/' . $nameArr[0];
        }
    }

    public static function isClickable($hdc, $action) {
        $action = strtolower($action);

        if ($action == 'activate')
            return $hdc->status != 1;

        return true;
    }

    public function isHdcTask($taskID, $taskStory) {
        $ishdc = $this->dao->select('*')->from(TABLE_HDC)->where('story')->eq($taskStory)->fetchAll();
        if (!$ishdc)
            return false;
        $tasks = $this->dao->select('*')->from(TABLE_TASK)->where('story')->eq($taskStory)->orderby('id ASC')->fetchAll();
        $nextTask = '';
        foreach ($tasks as $key => $task) {
            if ($task->id == $taskID)
                $nextTask = isset($tasks[$key + 1]) ? $tasks[$key + 1] : '';
        }
        return $nextTask ? $nextTask : true;
    }

    /**
     * Create the select code of projects. 
     * 
     * @param  array     $projects 
     * @param  int       $projectID 
     * @param  string    $currentModule 
     * @param  string    $currentMethod 
     * @param  string    $extra
     * @access public
     * @return string
     */
    public function select($projects, $projectID, $currentModule, $currentMethod, $extra = '')
    {
        if(!$projectID) return;

        setCookie("lastProject", $projectID, $this->config->cookieLife, $this->config->webRoot);

        $currentProject = $this->getByacid($projectID);
        $output = "<a id='currentItem' href=\"javascript:showDropMenu('hdc', '$projectID', '$currentModule', '$currentMethod', '$extra')\">{$currentProject->name} <span class='icon-caret-down'></span></a><div id='dropMenu'><i class='icon icon-spin icon-spinner'></i></div>";
        return $output;
    }

/**
     * Get project by id.
     * 
     * @param  int    $projectID 
     * @param  bool   $setImgSize
     * @access public
     * @return void
     */
    public function getByacid($projectID, $setImgSize = false)
    {
        if(defined('TUTORIAL')) return $this->loadModel('tutorial')->getProject();

        $project = $this->dao->findById((int)$projectID)->from(TABLE_PROJECT)->fetch();
        if(!$project) return false;

        /* Judge whether the project is delayed. */
        if($project->status != 'done')
        {
            $delay = helper::diffDate(helper::today(), $project->end);
            if($delay > 0) $project->delay = $delay;
        }

        $total = $this->dao->select('
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft')
            ->from(TABLE_TASK)
            ->where('project')->eq((int)$projectID)
            ->andWhere('status')->ne('cancel')
            ->andWhere('deleted')->eq(0)
            ->fetch();
        $project->days          = $project->days ? $project->days : '';
        $project->totalHours    = $this->dao->select('sum(days * hours) AS totalHours')->from(TABLE_TEAM)->where('project')->eq($project->id)->fetch('totalHours');
        $project->totalEstimate = round($total->totalEstimate, 1);
        $project->totalConsumed = round($total->totalConsumed, 1);
        $project->totalLeft     = round($total->totalLeft, 1);

        if($setImgSize) $project->desc = $this->loadModel('file')->setImgSize($project->desc);

        return $project;
    }

    public function updatedate($allcationid)
    {
        $result = $this->dao->update(TABLE_ALLOCATION)
                ->set('uat_datecopy')->eq($_POST['uat_datecopy'])
                ->set('online_datecopy')->eq($_POST['online_datecopy'])
                ->where('project_id')->eq($allcationid)
                ->exec();
        return $result;
    }

    /**
     * Merge the default chart settings and the settings of current chart.
     * 
     * @param  string    $chartType 
     * @access public
     * @return void
     */
    public function mergeChartOption($chartType)
    {
        $chartOption  = $this->lang->hdc->report->$chartType;
        $commonOption = $this->lang->hdc->report->options;

        $chartOption->graph->caption = $this->lang->hdc->report->charts[$chartType];
        if(!isset($chartOption->type))    $chartOption->type  = $commonOption->type;
        if(!isset($chartOption->width))  $chartOption->width  = $commonOption->width;
        if(!isset($chartOption->height)) $chartOption->height = $commonOption->height;

        /* merge configuration */
        foreach($commonOption->graph as $key => $value) if(!isset($chartOption->graph->$key)) $chartOption->graph->$key = $value;
    }

    /**
     * get the development count canvans
     * @param  int $projectID 
     * @return array            arrray
     */
    public function getDataOfhdcOwnership($projectID)
    {
        $datas = $this->dao->select('devOwnership AS name,count(*) AS devalue,round(sum(totalManday),2) AS manday')
                            ->from(TABLE_HDC)
                            ->where('project')->eq($projectID)
                            ->andWhere('devOwnership')->ne('')
                            ->groupBy('devOwnership')
                            ->orderBy('devalue asc')
                            ->fetchAll();
        return $datas;
    }

    /**
     * get the status of count canvans
     * @param  int $projectID 
     * @return array            
     */
    public function getDataOfhdcDevmenber($projectID)
    {
        $datas = $this->dao->select('substring_index(codeDevelop,"/", 1) AS name,count(*) AS devalue,round(sum(totalManday),2) AS manday')
                    ->from(TABLE_HDC)
                    ->where('project')->eq($projectID)
                    ->andWhere('codeDevelop')->ne('')
                    ->groupBy('codeDevelop')
                    ->orderBy('devalue asc')
                    ->fetchAll();
        return $datas;
    }

    /**
     * Get The Status count canvans
     * @param  int $projectID 
     * @return             
     */
    public function getDataOfhdcStatus($projectID)
    {
        $datas = $this->dao->select('step AS name,count(*) AS devalue,round(sum(totalManday),2) AS manday')
                    ->from(TABLE_HDC)
                    ->where('project')->eq($projectID)
                    ->andWhere('step')->ne('')
                    ->groupBy('step')
                    ->orderBy('devalue asc')
                    ->fetchAll();
        foreach ($datas as $key => $value) {
            $datas[$key]->name = $this->lang->hdc->lustepList[$value->name];
        }
        return $datas;
    }

    public function getDataOfhdcDiffculty($projectID)
    {
        $datas = $this->dao->select('rating AS name,count(*) AS devalue,round(sum(totalManday),2) AS manday')
                    ->from(TABLE_HDC)
                    ->where('project')->eq($projectID)
                    ->andWhere('rating')->ne('')
                    ->groupBy('rating')
                    ->orderBy('devalue asc')
                    ->fetchAll();
        return $datas;
    }

    public function getDataOfhdcassignto($projectID)
    {
        $datas = $this->dao->select('openedBy AS name,count(*) AS quesvalue ,sum(consumed) AS quesday')
                    ->from(TABLE_TASK)
                    ->where('project')->eq($projectID)
                    ->andWhere('name')->notin($this->lang->hdc->taskTitle)
                    ->andWhere('name')->ne('程序测试')
                    ->andWhere('openedBy')->ne('')
                    ->groupBy('openedBy')
                    ->fetchAll();
        if(!isset($this->users)) $this->users = $this->loadModel('user')->getPairs('noletter');
        foreach($datas as $account => $data) if(isset($this->users[$data->name])) $datas[$account]->name = $this->users[$data->name];
        return $datas;
    }

    public function getDataOfhdcfinishedby($projectID)
    {
        $datas = $this->dao->select('assignedTo AS name,count(*) AS quesvalue ,sum(consumed) AS quesday')
                    ->from(TABLE_TASK)
                    ->where('project')->eq($projectID)
                    ->andWhere('name')->notin($this->lang->hdc->taskTitle)
                    ->andWhere('name')->ne('程序测试')
                    ->andWhere('assignedTo')->ne('')
                    ->andWhere('assignedTo')->ne('Closed')
                    ->groupBy('assignedTo')
                    ->fetchAll();
        if(!isset($this->users)) $this->users = $this->loadModel('user')->getPairs('noletter');
        foreach($datas as $account => $data) if(isset($this->users[$data->name])) $datas[$account]->name = $this->users[$data->name];
        return $datas;
    }

    public function getDataOfhdcquesttype($projectID)
    {
        $datas = $this->dao->select('type AS name,count(*) AS quesvalue ,sum(consumed) AS quesday')
                    ->from(TABLE_TASK)
                    ->where('project')->eq($projectID)
                    ->andWhere('name')->notin($this->lang->hdc->taskTitle)
                    ->andWhere('name')->ne('程序测试')
                    ->groupBy('type')
                    ->fetchAll();
        foreach ($datas as $key => $value) {
            $datas[$key]->name = $this->lang->task->typeList[$value->name];
        }
        return $datas;
    }

    public function getDataOfhdcqueststatus($projectID)
    {
        $datas = $this->dao->select('status AS name,count(*) AS quesvalue ,sum(consumed) AS quesday')
                    ->from(TABLE_TASK)
                    ->where('project')->eq($projectID)
                    ->andWhere('name')->notin($this->lang->hdc->taskTitle)
                    ->andWhere('name')->ne('程序测试')
                    ->groupBy('status')
                    ->fetchAll();
        foreach ($datas as $key => $value) {
            $datas[$key]->name = $this->lang->task->statusList[$value->name];
        }
        return $datas;
    }

    public function checkPlanRole($account,$role)
    {
        $datas = $this->dao->select('t1.id,t1.hr_id,t1.center_name')->from(TABLE_DEVCENTER)->alias('t1')
                            ->leftJoin(TABLE_CENTERUSER)->alias('t2')
                            ->on('t1.hr_id = t2.hr_id')
                            ->where('t2.account')->eq($account)
                            ->andWhere('t2.route')->in(array($role,'A'))
                            ->andWhere('t2.is_manager')->eq(1)
                            ->andWhere('t2.is_valid')->eq(1)
                            ->fetchAll();
        return $datas;
    }

    public function getplandatebyhrid($hr_id,$pager,$browseType,$sort)
    {
        //查询
        if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;

            $hdcQuery = str_replace('`account`','t1.account',$hdcQuery);
            $hdcQuery = str_replace('`department`','t2.name',$hdcQuery);
            if (strpos($hdcQuery,'freetime')) {
                $hdcQuery = '1';
            }
        }

        $result = $this->dao->select('t1.id,t1.username,t1.account,t2.name,t3.realname')
                            ->from(TABLE_CENTERUSER)->alias('t1')
                            ->leftJoin(TABLE_DEPT)->alias('t2')
                            ->on('t1.dep_id = t2.id')
                            ->leftJoin(TABLE_USER)->alias('t3')
                            ->on('t1.manager_id = t3.account')
                            ->where('hr_id')->eq($hr_id)
                            ->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
                            ->orderBy(trim($sort, ','))
                            ->page($pager)
                            ->fetchAll();
        return $result;
    }

    /**
     * 批量创建任务
     * @param  int $userid 用户id
     * @return error         
     */
    public function createallplan($userid)
    {
        $datas = fixer::input('post')->get();
        $editorid = $this->app->user->account;
        $countnums = count(reset($datas)); 
        $user_id = $this->dao->select('account')->from(TABLE_CENTERUSER)->where('id')->eq($userid)->fetch('account');
        /*init the datas*/
        $hdcproject = '';
        $type = '';
        for ($i=0; $i < $countnums; $i++) { 
           $type = $datas->type[$i] == 'ditto' ? $type : $datas->type[$i];
           $hdcproject = $datas->hdcproject[$i] == 'ditto' ? $hdcproject : $datas->hdcproject[$i];
           $datas->type[$i] = $type;
           $datas->hdcproject[$i] = $hdcproject;
        }
        /*data insert */
        for ($i=0; $i < $countnums; $i++) { 
            if (empty($datas->datefrom[$i]) || empty($datas->dateto[$i])) {
               continue;
            }
            //如果日期自 > 日期至，那么提示错误
            if (strtotime($datas->datefrom[$i]) > strtotime($datas->dateto[$i])) {
                die(js::alert($this->lang->hdc->plan->error->outofdate));
            }
            /*INIT THE INSERT DATA*/
            $insdata[$i] = new stdClass();
            $insdata[$i]->user_id = $user_id;
            $insdata[$i]->project_id = $datas->hdcproject[$i];
            $insdata[$i]->worktype = $datas->type[$i];
            $insdata[$i]->percent = $datas->planpercent[$i];
            $insdata[$i]->target = $datas->plantarget[$i];
            $insdata[$i]->lasteditor = $editorid;
            $insdata[$i]->lasteditdate = date("Y-m-d", time());

            /*count the date form and to */
            $days=round((strtotime($datas->dateto[$i])-strtotime($datas->datefrom[$i]))/3600/24)+1 ; 
            for ($j=0; $j < $days; $j++) { 
                $insdata[$i]->plandate = date("Y-m-d",strtotime("+".$j." day",strtotime($datas->datefrom[$i])));
                /*check the pecent out of percent*/
                $outpercent = $this->dao->select('user_id,sum(percent) sums')->from(TABLE_HDCPLAN)->where('user_id')->eq($user_id)->andwhere('plandate')->eq($insdata[$i]->plandate)->groupBy('user_id')->fetch();

                if ($insdata[$i]->percent + $outpercent->sums > 100 ) {
                    $reminds = 100-$outpercent->sums;
                    die(js::alert($insdata[$i]->plandate.$this->lang->hdc->plan->error->outofpercent.$reminds));
                }
                /*insert the datas */
                $this->dao->insert(TABLE_HDCPLAN)->data($insdata[$i])->autoCheck()->exec();
            }
        }
    }

    public function getplandatas($userid,$pager,$browseType,$orderBy)
    {
        //查询
        if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;

            $hdcQuery = str_replace('`projectname`','t2.name',$hdcQuery);
            $hdcQuery = str_replace('`plandate`','t1.plandate',$hdcQuery);
        }
        //查询结果
        $result = $this->dao->select('t1.id,t2.name,t1.plandate,t1.worktype,t1.percent,t1.target')
                ->from(TABLE_HDCPLAN)->alias('t1')
                ->leftJoin(TABLE_PROJECT)->alias('t2')
                ->on('t1.project_id = t2.id')
                ->leftJoin(TABLE_CENTERUSER)->alias('t3')
                ->on('t1.user_id = t3.account')
                ->where('t3.id')->eq($userid)
                ->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
                ->orderBy('t1.plandate asc')
                ->page($pager)
                ->fetchAll();

        return $result;
    }

    public function getdetailplanbyid($editid)
    {
        $result = $this->dao->select('id,user_id,project_id,plandate,worktype,percent,target')->from(TABLE_HDCPLAN)->where('id')->eq($editid)->fetch();
        return $result;
    }

    public function edithdcplan($editid)
    {
        $datas = fixer::input('post')
                ->add('lasteditdate',date('Y-m-d H:i:s',time()))
                ->add('lasteditor',$this->app->user->account)
                ->get();
        /*update the data*/
        $olddt = $this->dao->select('user_id,percent')->from(TABLE_HDCPLAN)->where('id')->eq($editid)->fetch();
        $user_id = $olddt->user_id;
        $outpercent = $this->dao->select('user_id,sum(percent) sums')->from(TABLE_HDCPLAN)->where('user_id')->eq($user_id)->andwhere('plandate')->eq($datas->plandate)->groupBy('user_id')->fetch('sums');
        if ($outpercent + $datas->percent - $olddt->percent  > 100) {
            $reminds = 100 - $outpercent;
            die(js::alert($datas->plandate.$this->lang->hdc->plan->error->outofpercent.$reminds));
        }
        $this->dao->update(TABLE_HDCPLAN)->data($datas)->batchCheck('plandate', 'notempty')->where('id')->eq($editid)->exec();
    }

    public function hdcdeleteplan($editid,$type)
    {
        switch ($type) {
            case 'one':
                    $this->dao->delete()->from(TABLE_HDCPLAN)->where('id')->eq($editid)->exec();
                break;
            case 'all':
                    $user_id = $this->dao->select('account')->from(TABLE_CENTERUSER)->where('id')->eq($editid)->fetch('account');
                    $this->dao->delete()->from(TABLE_HDCPLAN)->where('user_id')->eq($user_id)->exec();
                break;
        }
    }

    public function getplandatabydate($now,$later,$type)
    {
        switch ($type) {
            case 'notempty':
                $result = $this->dao->select('user_id,plandate,sum(percent) percent')->from(TABLE_HDCPLAN)
                        ->where('plandate')->between($now,$later)
                        ->groupBy('user_id,plandate')->fetchAll();
                break;
            case 'empty':
                $result = $this->dao->select('user_id,count(plandate) cc')->from(TABLE_HDCPLAN)
                        ->where('plandate')->between($now,$later)
                        ->andWhere('dayofweek(plandate) not in (1,7)')
                        ->groupBy('user_id')->fetchAll();
                break;
        }

        return $result;
    }


    public function hdcsummary($projects,$pageID,$recPerPage,$browseType,$queryID,$orderBy,$type='')
    {
        //查询
        if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;

            $hdcQuery = str_replace('`projects`','t1.project_id',$hdcQuery);
            $hdcQuery = str_replace('`assigntocenter`','t3.hr_id',$hdcQuery);
            $hdcQuery = str_replace('`uatdate`','t1.uat_date',$hdcQuery);
            $hdcQuery = str_replace('`onlinedate`','t1.online_date',$hdcQuery);
            $hdcQuery = str_replace('`hdcimporttime`','t1.create_time',$hdcQuery);
        }
        // echo $browseType;
        $begin = ($pageID-1)* $recPerPage;
        $end = $recPerPage;
        //Get The Base datas from allcation 
        $basedata = $this->dao->select("t1.project_id,t2.name,t3.center_name,substring_index(t1.tech_manager, ':', -1) techname,substring_index(t1.test_manager, ':', -1) testname")
                ->from(TABLE_ALLOCATION)->alias('t1')
                ->leftJoin(TABLE_PROJECT)->alias('t2')
                ->on('t1.project_id = t2.id ')
                ->leftJoin(TABLE_DEVCENTER)->alias('t3')
                ->on('t1.ascenter_id = t3.id')
                ->where('t1.status')->eq(1)
                ->andWhere('t1.project_id')->in($projects)
                ->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
                ->groupBy('t1.project_id')
                ->beginIF(($browseType == 'bysearch' || $browseType == 'hdcsummary') && $type != 'export')
                ->limit("$begin,$end")
                ->fi()
                ->fetchAll();
        // echo $this->dao->get();
        /*******************Get the HDC datas**********************/
        //the hdcprosums and hdcpeosums
        $propeosums = $this->dao->select("project,count(*) hdcprosums,round(sum(codecmtManday),2) hdcpeosums")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->ne('Cancel')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        //the uncheckpro and uncheckpeo
        $propeounchek = $this->dao->select("project,count(*) uncheckpro,round(sum(codecmtManday),2) uncheckpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->in('WaitingForRequirement,WaitingForReqValidation,RequirementValidating')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        //the waitpro and waitpeo
        $propeowait = $this->dao->select("project,count(*) waitpro,round(sum(codecmtManday),2) waitpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->eq('WaitingForCoding')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        //the doingpro and doingpeo
        $propeodoing = $this->dao->select("project,count(*) doingpro,round(sum(codecmtManday),2) doingpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->eq('Coding')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        //the doingtestpro and doingtestpeo
        $propeotestdoing = $this->dao->select("project,count(*) doingtestpro,round(sum(codecmtManday),2) doingtestpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->in('WaitingForRemoteTest,RemoteTesting,WaitingForOnsiteTest,OnsiteTesting')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        //the donepro and donepeo 
        $propeodone = $this->dao->select("project,count(*) donepro,round(sum(codecmtManday),2) donepeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->eq('Released')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        //the delaydevpercent
        $nowtime= date("Y-m-d", time());
        $delaydevpercent = $this->dao->select("project,count(*) delaydevpercent")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('project')->in($projects)
                    ->andwhere("(actCodeEndDate != '' and actCodeEndDate != '0000-00-00') and (estCodeEndDate != '' and estCodeEndDate != '0000-00-00') and (actCodeEndDate > estCodeEndDate)")
                    ->orwhere("(actCodeEndDate = '' or actCodeEndDate = '0000-00-00') and (estCodeEndDate != '' and estCodeEndDate != '0000-00-00') and (estCodeEndDate <  $nowtime)")
                    ->groupby('project')
                    ->fetchAll();
        //the allpropeo
        $allpropeo = $this->dao->select("project,count(distinct(codeDevelop)) allpropeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->ne('Cancel')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        //the task unsolved
        $unsolvproblem = $this->dao->select("project,count(*) unsolved")->from(TABLE_TASK)
                    ->where('deleted')->eq(0)
                    ->andwhere('name')->notin('功能设计,功能确认,技术设计,代码开发,远程测试,现场验收,程序测试')
                    ->andwhere('status')->notin('done,cancel')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        //the task solproblem
        $solproblem = $this->dao->select("project,count(*) solproblem")->from(TABLE_TASK)
                    ->where('deleted')->eq(0)
                    ->andwhere('name')->notin('功能设计,功能确认,技术设计,代码开发,远程测试,现场验收,程序测试')
                    ->andwhere('status')->eq('done')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        /*******************END the HDC datas**********************/
        foreach ($basedata as $key => $value) {

            foreach ($propeosums as $k => $v) {
                if ($value->project_id == $v->project) {
                    $basedata[$key]->hdcprosums = $v->hdcprosums;
                    $basedata[$key]->hdcpeosums = $v->hdcpeosums;
                } 
            }
            foreach ($propeounchek as $k => $v) {
                if ($value->project_id == $v->project) {
                    $basedata[$key]->uncheckpro = $v->uncheckpro;
                    $basedata[$key]->uncheckpeo = $v->uncheckpeo;
                } 
            }
            foreach ($propeowait as $k => $v) {
                if ($value->project_id == $v->project) {
                    $basedata[$key]->waitpro = $v->waitpro;
                    $basedata[$key]->waitpeo = $v->waitpeo;
                } 
            }
            foreach ($propeodoing as $k => $v) {
                if ($value->project_id == $v->project) {
                    $basedata[$key]->doingpro = $v->doingpro;
                    $basedata[$key]->doingpeo = $v->doingpeo;
                } 
                
            }
            foreach ($propeotestdoing as $k => $v) {
                if ($value->project_id == $v->project) {
                    $basedata[$key]->doingtestpro = $v->doingtestpro;
                    $basedata[$key]->doingtestpeo = $v->doingtestpeo;
                } 
            }
            foreach ($propeodone as $k => $v) {
                if ($value->project_id == $v->project) {
                    $basedata[$key]->donepro = $v->donepro;
                    $basedata[$key]->donepeo = $v->donepeo;
                } 
            }
            foreach ($delaydevpercent as $k => $v) {
                if ($value->project_id == $v->project) {
                    $basedata[$key]->delaydevpercent = $v->delaydevpercent;
                } 
            }
            foreach ($allpropeo as $k => $v) {
                if ($value->project_id == $v->project) {
                    $basedata[$key]->allpropeo = $v->allpropeo;
                } 
            }
            foreach ($unsolvproblem as $k => $v) {
                if ($value->project_id == $v->project) {
                    $basedata[$key]->unsolved = $v->unsolved;
                } 
            }
            foreach ($solproblem as $k => $v) {
                if ($value->project_id == $v->project) {
                    $basedata[$key]->solproblem = $v->solproblem;
                } 
            }
        }
        foreach ($basedata as $key => $value) {
            if ($browseType == 'coding' && empty($value->doingpro)) {
                    unset($basedata[$key]);
                }
            if ($browseType == 'undone' && ($value->doingpro == $value->hdcprosums)) {
                    unset($basedata[$key]);
                }
            if ($browseType == 'done' && ($value->doingpro != $value->hdcprosums)) {
                    unset($basedata[$key]);
                }
        }
        return $basedata;
    }

    public function getReportData($projectID, $browseType, $queryID, $sort) {
        if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;
            $hdcQuery = str_replace('`code`','t1.code',$hdcQuery);
            $hdcQuery = str_replace('`name`','t1.name',$hdcQuery);
            $hdcQuery = str_replace('`type`','t1.type',$hdcQuery);
        }

        $role = array(1,17,19);
        $roleok = $this->getroleok($role);
        if ($roleok == "yes") {
            $tempallcation = $this->getAllcation();
            foreach ($tempallcation as $key => $value) {
                $allProjects[$value->project_id] = $value->name;
            }
        }else{
             $allProjects = $this->loadModel('project')->getPairs('nocode');
        }

        if ($this->post->allProjects || !$this->post->projects){
            $projects = array_keys($allProjects);
        }else
            $projects = $this->post->projects;
        //hdc and story
        $hdcs = $this->dao->select('t1.*,t3.name projectname,t3.code projectcode,IF(t2.status = "changed","Y","N") storyChanged')->from(TABLE_HDC)
                        ->alias('t1')
                        ->leftJoin(TABLE_STORY)->alias('t2')
                        ->on('t1.story = t2.id')
                        ->leftJoin(TABLE_PROJECT)->alias('t3')
                        ->on('t1.project = t3.id')
                        ->where('t1.deleted')->eq(0)
                        ->beginIF($projectID != 0)->andWhere('t1.project')->in($projects)->fi()
                        ->beginIF($browseType == 'unactivated')->andWhere('t1.status')->eq(0)->fi()
                        ->beginIF($browseType == 'activated')->andWhere('t1.status')->eq(1)->fi()
                        ->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
                        ->orderBy(trim($sort, ','))->fetchAll();
        foreach ($hdcs as $key => $value) {
            $result[] = $value->story;
        }
        //task
        $tasks = $this->dao->select('t1.id,t1.story,t1.type,t1.status,t1.finishedDate,t1.realStarted,assignedTo')->from(TABLE_TASK)->alias('t1')
                            ->where('story')->in($result)->andwhere('story')->ne(null)
                            ->orderby('id ASC')->fetchAll();
        foreach ($tasks as $key => $value) {
            $newtask[$value->story][] = $value;
        }
        // $action = $this->dao->select('objectID,date,action')->from(TABLE_ACTION)->where('project')->in($projects)->fetchAll();

        // foreach ($action as $key => $value) {
        //     $newaction[$value->objectID][] = $value->action;
        //     if ($value->action == 'finished') {
        //        $newactiondate[$value->objectID][] = $value->date;
        //     }
        // }
        foreach ($hdcs as $key => $value) {
            if ($value->status) {
            $hdcs[$key]->task = $newtask[$value->story];
            // $costRatio = '';
            // $chargingEndDate = '';
            // if ((array_key_exists($newtask[$value->story][2]->id,$newaction) && array_intersect(array('started','finished'), $newaction[$newtask[$value->story][2]->id])) || (array_key_exists($newtask[$value->story][3]->id,$newaction) && array_intersect(array('started','finished'), $newaction[$newtask[$value->story][3]->id]))) {
            //    $costRatio = '10%';
            // }
            // if ((array_key_exists($newtask[$value->story][4]->id,$newaction) && array_intersect(array('finished'), $newaction[$newtask[$value->story][4]->id]))) {
            //    $costRatio = '50%';
            //    if (ceil(strtotime(date('Y-m-d H:i:s')) - strtotime(end($newactiondate[$newtask[$value->story][4]->id]))) / 86400 > 7) {
            //       $st = 0;
            //       for ($i = 0; $i < count($newtask[$value->story]); $i++) {
            //             if ($newtask[$value->story][$i]->type != 'misc' && $newtask[$value->story][$i]->status != 'done'){
            //                 $st = 1;
            //             }
            //         }
            //       if(!$st) {
            //             $costRatio = '100%';
            //             $chargingEndDate = date('Y-m-d', strtotime(end($newactiondate[$newtask[$value->story][4]->id])) + 3600 * 24 * 7);
            //         }
            //    }
            // }
            // if ((array_key_exists($newtask[$value->story][5]->id,$newaction)) && array_intersect(array('finished'), $newaction[$newtask[$value->story][5]->id])) {
            //     $costRatio = '100%';
            //     $chargingEndDate = date('Y-m-d', strtotime(end($newactiondate[$newtask[$value->story][5]->id])));
            // }
                // $hdcs[$key]->costRatio = $costRatio;
                // $hdcs[$key]->chargingEndDate = $chargingEndDate;
                $hdcs[$key]->tasks = $newtask[$value->story];
            }else{
                $hdcs[$key]->storyChanged = 'N';
                // $hdcs[$key]->costRatio = '';
                // $hdcs[$key]->chargingEndDate = '';
                $hdcs[$key]->tasks = [];
            }
            foreach ($hdcs[$key] as $kk => $vv) {
                if ($vv == "0000-00-00" || $vv == "0000-00-00 00:00:00") {
                    $hdcs[$key]->$kk = '';
                }
            }
            foreach ($hdcs[$key]->tasks as $ki => $vi) {
                foreach ($vi as $ko => $vo) {
                    if ($vo == "0000-00-00" || $vo == "0000-00-00 00:00:00") {
                    $hdcs[$key]->tasks[$ki]->$ko = '';
                    }
                }
            }
        }
        // file_put_contents('log.txt',var_export($hdcs,TRUE),FILE_APPEND);
        return $hdcs;
    }

    public function hdcgetpeosumary($hr_id,$pager,$browseType,$sort)
    {
         //查询
        if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;

            $hdcQuery = str_replace('`department`','t2.name',$hdcQuery);
            if (strpos($hdcQuery,'actCodeStartDate')) {
                $browseType = "actCodeStartDate";
            }
            if (strpos($hdcQuery,'actReqSubmitDate')) {
                $browseType = "actReqSubmitDate";
            }
            if (strpos($hdcQuery,'actReqSubmitDate')) {
                $browseType = "actReqSubmitDate";
            }
            if (strpos($hdcQuery,'hdcimporttime')) {
                $browseType = "hdcimporttime";
                $hdcQuery = str_replace('`hdcimporttime`','create_time',$hdcQuery);
            }
        }

        $basedata = $this->dao->select("t1.username,t1.account,t2.name,t3.center_name as centername")->from(TABLE_CENTERUSER)->alias('t1')
                                        ->leftJoin(TABLE_DEPT)->alias('t2')->on('t1.dep_id = t2.id')
                                        ->leftJoin(TABLE_DEVCENTER)->alias('t3')->on('t1.hr_id = t3.hr_id')
                                        ->where('t1.hr_id')->eq($hr_id)
                                        ->andWhere('t1.is_valid')->eq(1)
                                        ->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
                                        ->page($pager)
                                        ->fetchAll();
        foreach ($basedata as $key => $value) {
            $account[] = $value->account;
        }
        /*******************Get the HDC datas**********************/
        //the hdcprosums and hdcpeosums
        $propeosumstmp = $this->dao->select("substring_index(codeDevelop, '/', -1)codeDevelop,count(*) hdcprosums,round(sum(codecmtManday),2) hdcpeosums")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->ne('Cancel')
                    ->andWhere('codeDevelop')->ne('')
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->in($account)
                    ->beginIF($browseType == 'actCodeStartDate')->andWhere($hdcQuery)->fi()
                    ->beginIF($browseType == 'actReqSubmitDate')->andWhere($hdcQuery)->fi()
                    ->groupby('codeDevelop')
                    ->fetchAll();
        foreach ($propeosumstmp as $key => $value) {
            $propeosums[$value->codeDevelop] = $value;
        }
        //the uncheckpro and uncheckpeo
        $propeounchektmp = $this->dao->select("substring_index(codeDevelop, '/', -1)codeDevelop,count(*) uncheckpro,round(sum(codecmtManday),2) uncheckpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->in('WaitingForRequirement,WaitingForReqValidation,RequirementValidating')
                    ->andWhere('codeDevelop')->ne('')
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->in($account)
                    ->beginIF($browseType == 'actCodeStartDate')->andWhere($hdcQuery)->fi()
                    ->beginIF($browseType == 'actReqSubmitDate')->andWhere($hdcQuery)->fi()
                    ->groupby('codeDevelop')
                    ->fetchAll();
        foreach ($propeounchektmp as $key => $value) {
            $propeounchek[$value->codeDevelop] = $value;
        }
        //the waitpro and waitpeo
        $propeowaittmp = $this->dao->select("substring_index(codeDevelop, '/', -1)codeDevelop,count(*) waitpro,round(sum(codecmtManday),2) waitpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->eq('WaitingForCoding')
                    ->andWhere('codeDevelop')->ne('')
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->in($account)
                    ->beginIF($browseType == 'actCodeStartDate')->andWhere($hdcQuery)->fi()
                    ->beginIF($browseType == 'actReqSubmitDate')->andWhere($hdcQuery)->fi()
                    ->groupby('codeDevelop')
                    ->fetchAll();
        foreach ($propeowaittmp as $key => $value) {
            $propeowait[$value->codeDevelop] = $value;
        }
        //the doingpro and doingpeo
        $propeodoingtmp = $this->dao->select("substring_index(codeDevelop, '/', -1)codeDevelop,count(*) doingpro,round(sum(codecmtManday),2) doingpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->eq('Coding')
                    ->andWhere('codeDevelop')->ne('')
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->in($account)
                    ->beginIF($browseType == 'actCodeStartDate')->andWhere($hdcQuery)->fi()
                    ->beginIF($browseType == 'actReqSubmitDate')->andWhere($hdcQuery)->fi()
                    ->groupby('codeDevelop')
                    ->fetchAll();
        foreach ($propeodoingtmp as $key => $value) {
            $propeodoing[$value->codeDevelop] = $value;
        }
        //the doingtestpro and doingtestpeo
        $propeotestdoingtmp = $this->dao->select("substring_index(codeDevelop, '/', -1)codeDevelop,count(*) doingtestpro,round(sum(codecmtManday),2) doingtestpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->in('WaitingForRemoteTest,RemoteTesting,WaitingForOnsiteTest,OnsiteTesting')
                    ->andWhere('codeDevelop')->ne('')
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->in($account)
                    ->beginIF($browseType == 'actCodeStartDate')->andWhere($hdcQuery)->fi()
                    ->beginIF($browseType == 'actReqSubmitDate')->andWhere($hdcQuery)->fi()
                    ->groupby('codeDevelop')
                    ->fetchAll();
        foreach ($propeotestdoingtmp as $key => $value) {
            $propeotestdoing[$value->codeDevelop] = $value;
        }
        //the donepro and donepeo 
        $propeodonetmp = $this->dao->select("substring_index(codeDevelop, '/', -1)codeDevelop,count(*) donepro,round(sum(codecmtManday),2) donepeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->eq('Released')
                    ->andWhere('codeDevelop')->ne('')
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->in($account)
                    ->beginIF($browseType == 'actCodeStartDate')->andWhere($hdcQuery)->fi()
                    ->beginIF($browseType == 'actReqSubmitDate')->andWhere($hdcQuery)->fi()
                    ->groupby('codeDevelop')
                    ->fetchAll();
        foreach ($propeodonetmp as $key => $value) {
            $propeodone[$value->codeDevelop] = $value;
        }
        //the delaydevpercent
        $nowtime= date("Y-m-d", time());
        $delaydevpercenttmp = $this->dao->select("substring_index(codeDevelop, '/', -1)codeDevelop,count(*) delaydevpercent")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere("(actCodeEndDate != '' and actCodeEndDate != '0000-00-00') and (estCodeEndDate != '' and estCodeEndDate != '0000-00-00') and (actCodeEndDate > estCodeEndDate)")
                    ->orwhere("(actCodeEndDate = '' or actCodeEndDate = '0000-00-00') and (estCodeEndDate != '' and estCodeEndDate != '0000-00-00') and (estCodeEndDate <  $nowtime)")
                    ->andWhere('codeDevelop')->ne('')
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->in($account)
                    ->beginIF($browseType == 'actCodeStartDate')->andWhere($hdcQuery)->fi()
                    ->beginIF($browseType == 'actReqSubmitDate')->andWhere($hdcQuery)->fi()
                    ->groupby('codeDevelop')
                    ->fetchAll();
        foreach ($delaydevpercenttmp as $key => $value) {
            $delaydevpercent[$value->codeDevelop] = $value;
        }

        $projectss = $this->dao->select("substring_index(codeDevelop, '/', -1) account,story")->from(TABLE_HDC)
                                ->where("substring_index(codeDevelop, '/', -1)")->in($account)
                                ->andWhere('story')->ne('')
                                ->beginIF($browseType == 'actCodeStartDate')->andWhere($hdcQuery)->fi()
                                ->beginIF($browseType == 'actReqSubmitDate')->andWhere($hdcQuery)->fi()
                                ->fetchAll();
        foreach ($projectss as $key => $value) {
           $story[] = $value->story;
        }
        //the task unsolved
        $unsolvproblemtp = $this->dao->select("story,count(*) unsolved")->from(TABLE_TASK)
                    ->where('deleted')->eq(0)
                    ->andwhere('name')->notin('功能设计,功能确认,技术设计,代码开发,远程测试,现场验收,程序测试')
                    ->andwhere('status')->notin('done,cancel')
                    ->andWhere('story')->ne('')
                    ->andWhere('story')->in($story)
                    ->groupby('story')
                    ->fetchAll();
        foreach ($unsolvproblemtp as $key => $value) {
            $unsolvedtp[$value->story] = $value->unsolved;
        }
        //the task solproblem
        $solproblemtmp = $this->dao->select("story,count(*) solproblem")->from(TABLE_TASK)
                    ->where('deleted')->eq(0)
                    ->andwhere('name')->notin('功能设计,功能确认,技术设计,代码开发,远程测试,现场验收,程序测试')
                    ->andwhere('status')->eq('done')
                    ->andWhere('story')->ne('')
                    ->andWhere('story')->in($story)
                    ->groupby('story')
                    ->fetchAll();
        foreach ($solproblemtmp as $key => $value) {
            $solproblemtp[$value->story] = $value->solproblem;
        }
        foreach ($projectss as $key => $value) {
            $projectss[$key]->unsolved = $unsolvedtp[$value->story];
            $projectss[$key]->solproblem = $solproblemtp[$value->story];
        }
        foreach ($projectss as $key => $value) {
            $unsolved[$value->account] = $unsolved[$value->account] + $value->unsolved;
            $solproblem[$value->account] = $solproblem[$value->account] + $value->solproblem;
        }
        // var_dump($solproblem);
        //
        foreach ($basedata as $key => $value) {
            $basedata[$key]->hdcprosums = $propeosums[$value->account]->hdcprosums;
            $basedata[$key]->hdcpeosums = $propeosums[$value->account]->hdcpeosums;
            $basedata[$key]->uncheckpro = $propeounchek[$value->account]->uncheckpro;
            $basedata[$key]->uncheckpeo = $propeounchek[$value->account]->uncheckpeo;
            $basedata[$key]->waitpro = $propeowait[$value->account]->waitpro;
            $basedata[$key]->waitpeo = $propeowait[$value->account]->waitpeo;
            $basedata[$key]->doingpro = $propeodoing[$value->account]->doingpro;
            $basedata[$key]->doingpeo = $propeodoing[$value->account]->doingpeo;
            $basedata[$key]->doingtestpro = $propeotestdoing[$value->account]->doingtestpro;
            $basedata[$key]->doingtestpeo = $propeotestdoing[$value->account]->doingtestpeo;
            $basedata[$key]->donepro = $propeodone[$value->account]->donepro;
            $basedata[$key]->donepeo = $propeodone[$value->account]->donepeo;
            $basedata[$key]->delaydevpercent = $delaydevpercent[$value->account]->delaydevpercent;
            $basedata[$key]->unsolvproblem = $unsolved[$value->account];
            $basedata[$key]->solproblem = $solproblem[$value->account];
        }
        return $basedata;
    }

    public function peosummarydetail($account,$pageID,$recPerPage,$browseType,$queryID,$orderBy,$type='')
    {
        //查询
        if ($browseType == 'bysearch') {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if ($query) {
                $this->session->set('hdcQuery', $query->sql);
                $this->session->set('hdcForm', $query->form);
            }
            if ($this->session->hdcQuery == false)
                $this->session->set('hdcQuery', ' 1 = 1');

            $hdcQuery = $this->session->hdcQuery;
            $hdcQuery = str_replace('`hdcimporttime`','t1.create_time',$hdcQuery);
            $hdcQuery = str_replace('`projects`','t1.project_id',$hdcQuery);
        }
        //get all the project 
        $projectss = $this->dao->select("project")->from(TABLE_HDC)
                                ->where("substring_index(codeDevelop, '/', -1)")->eq($account)
                                ->andWhere('project')->ne('')
                                ->beginIF($browseType == 'actCodeStartDate')->andWhere($hdcQuery)->fi()
                                ->beginIF($browseType == 'actReqSubmitDate')->andWhere($hdcQuery)->fi()
                                ->groupby('project')
                                ->fetchAll();
        foreach ($projectss as $key => $value) {
           $projects[] = $value->project;
        }
        // echo $browseType;
        $begin = ($pageID-1)* $recPerPage;
        $end = $recPerPage;
        //Get The Base datas from allcation 
        $basedata = $this->dao->select("t1.project_id,t2.name,t3.center_name,substring_index(t1.tech_manager, ':', -1) techname,substring_index(t1.test_manager, ':', -1) testname")
                ->from(TABLE_ALLOCATION)->alias('t1')
                ->leftJoin(TABLE_PROJECT)->alias('t2')
                ->on('t1.project_id = t2.id ')
                ->leftJoin(TABLE_DEVCENTER)->alias('t3')
                ->on('t1.ascenter_id = t3.id')
                ->where('t1.status')->eq(1)
                ->andWhere('t1.project_id')->in($projects)
                ->beginIF($browseType == 'bysearch')->andWhere($hdcQuery)->fi()
                ->groupBy('t1.project_id')
                ->beginIF(($browseType == 'bysearch' || $browseType == 'peosummarydetail') && $type != 'export')
                ->limit("$begin,$end")
                ->fi()
                ->fetchAll();
        /*******************Get the HDC datas**********************/
        //the hdcprosums and hdcpeosums
        $propeosumstmp = $this->dao->select("project,count(*) hdcprosums,round(sum(codecmtManday),2) hdcpeosums")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->ne('Cancel')
                    ->andwhere('project')->in($projects)
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->eq($account)
                    ->groupby('project')
                    ->fetchAll();
        // var_dump($propeosumstmp);
        foreach ($propeosumstmp as $key => $value) {
            $propeosums[$value->project] = $value;
        }
        //the uncheckpro and uncheckpeo
        $propeounchektmp = $this->dao->select("project,count(*) uncheckpro,round(sum(codecmtManday),2) uncheckpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->in('WaitingForRequirement,WaitingForReqValidation,RequirementValidating')
                    ->andwhere('project')->in($projects)
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->eq($account)
                    ->groupby('project')
                    ->fetchAll();
        foreach ($propeounchektmp as $key => $value) {
            $propeounchek[$value->project] = $value;
        }
        //the waitpro and waitpeo
        $propeowaittmp = $this->dao->select("project,count(*) waitpro,round(sum(codecmtManday),2) waitpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->eq('WaitingForCoding')
                    ->andwhere('project')->in($projects)
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->eq($account)
                    ->groupby('project')
                    ->fetchAll();
        foreach ($propeowaittmp as $key => $value) {
            $propeowait[$value->project] = $value;
        }
        //the doingpro and doingpeo
        $propeodoingtmp = $this->dao->select("project,count(*) doingpro,round(sum(codecmtManday),2) doingpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->eq('Coding')
                    ->andwhere('project')->in($projects)
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->eq($account)
                    ->groupby('project')
                    ->fetchAll();
        foreach ($propeodoingtmp as $key => $value) {
            $propeodoing[$value->project] = $value;
        }
        //the doingtestpro and doingtestpeo
        $propeotestdoingtmp = $this->dao->select("project,count(*) doingtestpro,round(sum(codecmtManday),2) doingtestpeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->in('WaitingForRemoteTest,RemoteTesting,WaitingForOnsiteTest,OnsiteTesting')
                    ->andwhere('project')->in($projects)
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->eq($account)
                    ->groupby('project')
                    ->fetchAll();
        foreach ($propeotestdoingtmp as $key => $value) {
            $propeotestdoing[$value->project] = $value;
        }
        //the donepro and donepeo 
        $propeodonetmp = $this->dao->select("project,count(*) donepro,round(sum(codecmtManday),2) donepeo")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('step')->eq('Released')
                    ->andwhere('project')->in($projects)
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->eq($account)
                    ->groupby('project')
                    ->fetchAll();
        foreach ($propeodonetmp as $key => $value) {
            $propeodone[$value->project] = $value;
        }
        //the delaydevpercent
        $nowtime= date("Y-m-d", time());
        $delaydevpercenttmp = $this->dao->select("project,count(*) delaydevpercent")->from(TABLE_HDC)
                    ->where('deleted')->eq(0)
                    ->andwhere('project')->in($projects)
                    ->andwhere("substring_index(codeDevelop, '/', -1)")->eq($account)
                    ->andwhere("(actCodeEndDate != '' and actCodeEndDate != '0000-00-00') and (estCodeEndDate != '' and estCodeEndDate != '0000-00-00') and (actCodeEndDate > estCodeEndDate)")
                    ->orwhere("(actCodeEndDate = '' or actCodeEndDate = '0000-00-00') and (estCodeEndDate != '' and estCodeEndDate != '0000-00-00') and (estCodeEndDate <  $nowtime)")
                    ->groupby('project')
                    ->fetchAll();
        foreach ($delaydevpercenttmp as $key => $value) {
            $delaydevpercent[$value->project] = $value;
        }
        //the task unsolved
        $unsolvproblemtmp = $this->dao->select("project,count(*) unsolved")->from(TABLE_TASK)
                    ->where('deleted')->eq(0)
                    ->andwhere('name')->notin('功能设计,功能确认,技术设计,代码开发,远程测试,现场验收,程序测试')
                    ->andwhere('status')->notin('done,cancel')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        foreach ($unsolvproblemtmp as $key => $value) {
            $unsolvproblem[$value->project] = $value->unsolved;
        }
        //the task solproblem
        $solproblemtmp = $this->dao->select("project,count(*) solproblem")->from(TABLE_TASK)
                    ->where('deleted')->eq(0)
                    ->andwhere('name')->notin('功能设计,功能确认,技术设计,代码开发,远程测试,现场验收,程序测试')
                    ->andwhere('status')->eq('done')
                    ->andwhere('project')->in($projects)
                    ->groupby('project')
                    ->fetchAll();
        foreach ($solproblemtmp as $key => $value) {
            $solproblem[$value->project] = $value->solproblem;
        }        /*******************END the HDC datas**********************/
        foreach ($basedata as $key => $value) {
            $basedata[$key]->hdcprosums = $propeosums[$value->project_id]->hdcprosums;
            $basedata[$key]->hdcpeosums = $propeosums[$value->project_id]->hdcpeosums;
            $basedata[$key]->uncheckpro = $propeounchek[$value->project_id]->uncheckpro;
            $basedata[$key]->uncheckpeo = $propeounchek[$value->project_id]->uncheckpeo;
            $basedata[$key]->waitpro = $propeowait[$value->project_id]->waitpro;
            $basedata[$key]->waitpeo = $propeowait[$value->project_id]->waitpeo;
            $basedata[$key]->doingpro = $propeodoing[$value->project_id]->doingpro;
            $basedata[$key]->doingpeo = $propeodoing[$value->project_id]->doingpeo;
            $basedata[$key]->doingtestpro = $propeotestdoing[$value->project_id]->doingtestpro;
            $basedata[$key]->doingtestpeo = $propeotestdoing[$value->project_id]->doingtestpeo;
            $basedata[$key]->donepro = $propeodone[$value->project_id]->donepro;
            $basedata[$key]->donepeo = $propeodone[$value->project_id]->donepeo;
            $basedata[$key]->delaydevpercent = $delaydevpercent[$value->project_id]->delaydevpercent;
            $basedata[$key]->unsolvproblem = $unsolvproblem[$value->project_id];
            $basedata[$key]->solproblem = $solproblem[$value->project_id];
        }
        return $basedata;
    }

    public function getResultexport($expdate)
    {
        //ORACLE DB config
        $ociuser = "RDC";
        $ocipwd = "RDC";
        $conrul = "192.168.11.241/hrms";
        //范围是所有项目
        $tempallcation = $this->getAllcation();
            foreach ($tempallcation as $key => $value) {
                $allProjects[$value->project_id] = $value->name;
        }
        $projects = array_keys($allProjects);
        $hdcs = $this->dao->select('t1.*,t3.name projectname,t3.code projectcode')->from(TABLE_HDC)
                        ->alias('t1')
                        ->leftJoin(TABLE_PROJECT)->alias('t3')
                        ->on('t1.project = t3.id')
                        ->where('t1.deleted')->eq(0)
                        ->andWhere('t1.project')->in($projects)
                        ->andWhere('t1.status')->eq(1)
                        ->andWhere("(DATE_FORMAT(t1.actCodeStartDate,'%Y-%m') = '$expdate' or DATE_FORMAT(t1.actTestEndDate,'%Y-%m') = '$expdate' or DATE_FORMAT(t1.confimDate,'%Y-%m') = '$expdate')")
                        ->andWhere("(t1.devOwnership != '' and t1.devOwnership != 'Onsite')")
                        ->fetchAll();
        //数据检验
        foreach ($hdcs as $key => $value) {
            $tmpcodelp = explode('/',$value->codeDevelop);
            $codeDevelop = $tmpcodelp[1];
            if (empty($codeDevelop)) {
                echo $value->projectname."下的开发项：".$value->code."代码开发人为空，请先确定后再导入！<hr>";
                $flag = '1';
            }
        }
        if ($flag) {
            exit;
        }
        //创建oracle connection 
        $conn = OCILogon($ociuser, $ocipwd, $conrul,"UTF8");
        if (!$conn) {
            die("接口连接失败");
        }
        $f=date('ymdhis'); 
        $batch_id=str_replace('-','',$expdate).$f; 
        echo "正在处理:<hr>";
        flush();
        //批次号
        $fields_pro = "IFACE_ID,BATCH_ID,PROJECT_CODE,PROJECT_NAME,DEV_CODE,DEV_NAME,DEV_START_DATE,TEST_END_DATE,COMPLETE_DATE,DAYS,UNIT_PRICE,UNIT_NAME,SOURCE_CODE,EMPLOYEE_CODE";
        //插入oracle 接口表
        foreach ($hdcs as $key => $value) {
            $tmpcodelp = explode('/',$value->codeDevelop);
            $codeDevelop = $tmpcodelp[1];
            if ($value->actCodeStartDate == '0000-00-00') {
                $value->actCodeStartDate = '';
            }
            if ($value->actTestEndDate == '0000-00-00') {
                $value->actTestEndDate = '';
            }
            if ($value->confimDate == '0000-00-00') {
                $value->confimDate = '';
            }
            $query = "INSERT INTO PRJ_RDC_COST_IFACE($fields_pro)values('$value->id','$batch_id','$value->projectcode','$value->projectname','$value->code','$value->name',to_date('$value->actCodeStartDate', 'yyyy-mm-dd hh24:mi:ss'),to_date('$value->actTestEndDate', 'yyyy-mm-dd hh24:mi:ss'),to_date('$value->confimDate', 'yyyy-mm-dd hh24:mi:ss'),'$value->codecmtManday','500','$value->devOwnership','RDC','$codeDevelop')"; 
            $rs = oci_parse($conn,$query);
            if (!$rs) { 
                $e = oci_error($conn); 
                echo htmlentities("项目编号：".$value->id."——问题：".$e['message']); 
                exit; 
            } 
            $result = oci_execute($rs);     //默认方式直接上传  
            if(!$result){  
                $e = oci_error($rs); 
                echo htmlentities("项目编号：".$value->id."——问题：".$e['message']); 
                echo "<hr>";
                flush();
            } 
        }
        echo "处理完成，正在进行校验<hr>";
        flush();
            $sql_sp = 'begin prj_rdc_iface_pkg.main(:p_batch_id ,:p_period_code ,:p_source_code,:x_return_status ,:x_return_message); end;';
            $stmt = oci_parse($conn, $sql_sp);
            if (!$stmt) { 
                $e = oci_error($conn); 
                echo htmlentities("校验".$value->id."——问题：".$e['message']); 
                // exit; 
            } 
            //输入参数
            // exit;
            $rdc = "RDC";
            oci_bind_by_name($stmt, ":p_batch_id", $batch_id ,64);
            oci_bind_by_name($stmt, ":p_period_code",str_replace('-','',$expdate) ,32);
            oci_bind_by_name($stmt, ":p_source_code",$rdc,6);
            //输出参数
            oci_bind_by_name($stmt, ":x_return_status", $return_status, 32);
            $return_message = oci_new_descriptor($conn, OCI_D_LOB);
            oci_bind_by_name($stmt, ":x_return_message",$return_message,-1, OCI_B_CLOB);

            echo $batch_id."<hr>";
            echo str_replace('-','',$expdate)."<hr>";
            echo $return_status;
            $oraclepkg = ociexecute($stmt); 

            if(!$oraclepkg){  
                $e = oci_error($stmt); 
                echo htmlentities("校验".$value->id."——问题：".$e['message']); 
                echo "<hr>";
                flush();
            } 
            echo "校验完成，正在进行错误值返回";
            flush();
            // exit;
            $query = "SELECT BATCH_ID,PROJECT_NAME,DEV_CODE,DEV_NAME,PROCESS_MESSAGE FROM PRJ_RDC_COST_IFACE WHERE BATCH_ID = $batch_id and PROCESS_STATUS = 'E'";
            $stid = oci_parse ($conn, $query);
            $resutl = oci_execute($stid);
            if (!$resutl) {
                $e = oci_error($stid); 
                echo htmlentities($e['message']); 
                exit;
            }
            echo '<table class="table datatable">
                    <thead><tr><th>流水号</th><th>项目名称</th><th class="flex-col">开发项名称</th> <th class="flex-col">开发项编号</th><th class="flex-col">错误原因</th></tr></thead><tbody>';
            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_LOBS)) {
                print "<tr><td>".$row['BATCH_ID']."</td>";
                print "<td>".$row['PROJECT_NAME']."</td>";
                print "<td>".$row['DEV_CODE']."</td>";
                print "<td>".$row['DEV_NAME']."</td>";
                print "<td>".$row['PROCESS_MESSAGE']."</td></tr>";
                unset($row);  
            }
            echo '</tbody></table>';
            flush();
        oci_free_statement($stid);
        oci_commit($conn);
        oci_close($conn);  
    }

}
