<?php

class hdc extends control {

    public function __construct($moduleName = '', $methodName = '') {
        parent::__construct($moduleName, $methodName);
        $this->loadModel('project');
        $this->loadModel('user');
        //判断权限
        $role = array(1,17,19);
        $roleok = $this->hdc->getroleok($role);
        if ($roleok == "yes") {
            $tempallcation = $this->hdc->getAllcation();
            foreach ($tempallcation as $key => $value) {
                $this->projects[$value->project_id] = $value->name;
            }
        }else{
            $this->projects = $this->project->getPairs('nocode');
        }
        if (empty($this->projects)) {
            echo js::alert($this->lang->project->errorNoProduct);
            die(js::locate($this->createLink('project', 'create')));
        }
        $this->view->projects = $this->projects;
    }

    public function browse($projectID = 0, $branch = '', $browseType = 'unactivated', $param = 0, $orderBy = '', $recTotal = 0, $recPerPage = 100, $pageID = 1) {
        $browseType = strtolower($browseType);
        $projectID = $this->project->saveState($projectID, array_keys($this->projects));
        $project = $this->project->getById($projectID);
        $projectID = $project->id;

        $this->hdc->setMenu($this->projects, $projectID, $branch);
        $products = $this->loadModel('product')->getProductsByProject($projectID);

        $uri = $this->app->getURI(true);
        $this->app->session->set('hdcList', $uri);
        $this->app->session->set('projectList', $uri);

        $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        $moduleID = $browseType == 'bysearch' ? 0 : ($this->cookie->hdcModule ? $this->cookie->hdcModule : 0);

        $sort = $this->loadModel('common')->appendOrder($orderBy);

        $title = $project->name . $this->lang->colon . $this->lang->hdc->common;
        $this->view->title = $title;
        $this->view->position[] = html::a($this->createLink('hdc', 'browse', "projectID=$projectID"), $this->projects[$projectID]);
        $this->view->position[] = $this->lang->hdc->browse;

        $this->app->loadClass('pager', $static = true);
        if ($this->app->getViewType() == 'mhtml')
            $recPerPage = 10;
        $pager = new pager($recTotal, $recPerPage, $pageID);
        $hdcs = $this->hdc->getHdcs($projectID, $browseType, $queryID, $sort, $pager);

        $actionURL = $this->createLink('hdc', 'browse', "projectID=$projectID&branch=$branch&browseType=bySearch&queryID=myQueryID");
        $this->hdc->buildSearchForm($projectID, $this->projects, $queryID, $actionURL);
        $this->loadModel('search')->mergeFeatureBar('hdc', 'browse');
        $teamMembers = $this->project->getTeamMembers($project->id);
        $memberPairs = array();
        foreach ($teamMembers as $key => $member)
            $memberPairs[$key] = $member->realname;
        //allation
        $allcation = $this->hdc->getAllcation('project','',$projectID);
        $this->view->allcation = $allcation;
        if (!empty($_POST)) {
           $this->hdc->updatedate($projectID);
           if(dao::isError()) die(js::error(dao::getError()));
                die(js::locate($this->session->hdcList, 'parent'));
                exit;
        }
        $this->view->hdcs = $hdcs;
        $this->view->pager = $pager;
        $this->view->users = $this->user->getPairs('nodeleted|noempty|noclosed');
        $this->view->orderBy = $orderBy;
        $this->view->browseType = $browseType;
        $this->view->moduleID = $moduleID;
        $this->view->param = $param;
        $this->view->projectID = $projectID;
        $this->view->memberPairs = $memberPairs;
        $this->view->branch = $branch;

        $this->display();
    }

    public function import($projectID, $branch = 0) {
        if ($_FILES) {
            if(!$this->post->product) die(js::alert($this->lang->hdc->noProduct));
            if(!$this->post->project) die(js::alert($this->lang->hdc->noProject));
            if(empty($_FILES['file']['tmp_name'])) die(js::alert($this->lang->hdc->noFile));
            $files = $this->loadModel('file')->getUpload('file');
            $file = $files[0];

            $fileName = $this->file->savePath . $file['pathname'];
            move_uploaded_file($file['tmpname'], $fileName);
            $this->app->loadClass('pexcel', true);
            $pexcel = new PExcel();
            $rows = $pexcel->excelRead($fileName);
            if (!is_array($rows))
                die(js::alert('Can Not Read The File'));
            $header = $rows[0];
            unset($rows[0]);
            $fields = $this->hdc->getImportFields();
            foreach ($header as $key => $title) {
                $field = array_search($title, $fields);
                if (!$field)
                    continue;
                $columnKey[$key] = $field;
            }
            if (empty($columnKey)) {
                $fc = file_get_contents($fileName);
                $encode = $this->post->encode != "utf-8" ? $this->post->encode : 'gbk';
                if (function_exists('mb_convert_encoding')) {
                    $fc = @mb_convert_encoding($fc, 'utf-8', $encode);
                } elseif (function_exists('iconv')) {
                    $fc = @iconv($encode, 'utf-8', $fc);
                } else {
                    die(js::alert($this->lang->hdc->noFunction));
                }
                file_put_contents($fileName, $fc);

                $rows = $pexcel->excelRead($fileName);
                $header = $rows[0];
                unset($rows[0]);
                foreach ($header as $key => $title) {
                    $field = array_search($title, $fields);
                    if (!$field)
                        continue;
                    $columnKey[$key] = $field;
                }
                if (empty($columnKey))
                    die(js::alert($this->lang->hdc->errorEncode));
            }

            $fileData = array();
            foreach ($rows as $row => $data) {
                $hdcs = new stdclass();
                foreach ($columnKey as $key => $field) {
                    $cellValue = $data[$key];
                    $hdcs->$field = $cellValue;
                }

                $fileData[$row] = $hdcs;
                unset($hdcs);
            }

            $this->session->set('importData', $fileData);
            unlink($fileName);

            $project = $this->post->project ? $this->post->project : $projectID;
            $product = $this->post->product ? $this->post->product : 0;
            //检查项目是否已分配
            $allcation = $this->hdc->getAllcation('project','',$project);
            if (empty($allcation) || $allcation[0]->assignstatus != 'Y') {
               die(js::alert('项目未分配，不允许导入开发清单。'));
            }
            die(js::locate(inlink('showImport', "projectID=$project&productID=$product&branch=$branch"), 'parent.parent'));
        }

        $productIDs = array_keys($this->loadModel('product')->getProductsByProject($projectID));

        $this->view->projects         = $this->product->getProjectPairs($productIDs[0], $branch ? "0,$branch" : 0, 'nodeleted');
        $this->view->projectID = $projectID;
        $this->view->projectName = $this->projects[$projectID];
        $this->view->products = $this->loadModel('product')->getPairs('nocode');
        $this->view->productID = $productIDs[0];

        $this->display();
    }

    public function showImport($projectID, $productID, $branch = 0) {
        if ($_POST) {
            $this->hdc->createFromImport($projectID, $productID, $branch);
            //if (dao::isError())
            //die(js::error(dao::getError()));
            //unset($_SESSION['importData']);
            if ($_SESSION['importData'])
                die(js::locate(inlink('showImport', "projectID=$projectID&productID=$productID&branch=$branch"), 'parent'));
            die(js::locate(inlink('browse', "projectID=$projectID"), 'parent'));
        }

        $this->hdc->setMenu($this->projects, $projectID, $branch);
        $fileData = $_SESSION['importData'];
        if (empty($fileData)) {
            echo js::alert($this->lang->error->noData);
            die(js::locate($this->createLink('hdc', 'browse', "projectID=$projectID&branch=$branch")));
        }
        $this->view->title = $this->lang->hdc->common . $this->lang->colon . $this->lang->hdc->showImport;
        $this->view->position[] = $this->lang->hdc->showImport;
        /*
        get all the center code all
         */
        $centertemp = $this->hdc->getCenterByid('','','all');
        $ludevOSList[''] = '';
        foreach ($centertemp as $key => $value) {
            $ludevOSList[$value->center_code] = $value->center_code;
        }
        $ludevOSList['Onsite'] = 'Onsite';
        $this->view->ludevOSList = $ludevOSList;
        $this->view->fileData = $fileData;
        $this->view->projectID = $projectID;
        $this->view->branch = $branch;
        $this->view->project = $this->projects[$projectID];
        $this->display();
    }
    
    public function exportReport($projectID = 0, $branch = '', $browseType = 'unactivated', $param = 0, $orderBy = '') {
        ini_set('memory_limit', '512M');
        $browseType = strtolower($browseType);
        $projectID = $this->project->saveState($projectID, array_keys($this->projects));
        $project = $this->project->getById($projectID);
        $projectID = $project->id;
        if ($_POST) {
            $queryID = ($browseType == 'bysearch') ? (int) $param : 0;

            $sort = $this->loadModel('common')->appendOrder($orderBy);
            $hdcs = $this->hdc->getHdcs($projectID, $browseType, $queryID, $sort,$pager);
            $rows = $this->hdc->getReportData($projectID, $browseType, $queryID, $sort);
            $this->app->loadClass('pexcel', true);
            $pexcel = new PExcel();
            $excel = $pexcel->php_excel_obj;
            $excel->setActiveSheetIndex(0);
            $excel->getActiveSheet()->setTitle('Report');
            $letter = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
                'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO');
            $tableheader = $this->lang->hdc->reportHeader;
            for ($i = 0; $i < count($tableheader); $i++) {
                $excel->getActiveSheet()->setCellValue("$letter[$i]1", "$tableheader[$i]");
            }
            $headerStyle = array(
                'font' => array(
                    'bold' => true,
                    'size' => 10,
                    'color' => array(
                        'argb' => '00000000',
                    ),
                ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array(
                            'argb' => '0000000'
                        )
                    )),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY,
                    'startcolor' => array(
                        'argb' => 'FFA0A0A0'
                    ),
                    'endcolor' => array(
                        'argb' => 'FFA0A0A0'
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                ),
            );
            $excel->getActiveSheet()->getStyle("A1:AO1")->applyFromArray($headerStyle);
            $this->loadModel('user');
            $wichuser = $this->user->getPairs('noclosed, nodeleted, devfirst');
            foreach ($rows as $key => $row) {
                $k = $key + 2;
                $excel->getActiveSheet()->setCellValue("A$k", $key + 1);
                $excel->getActiveSheet()->setCellValue("B$k", $row->projectname);
                $excel->getActiveSheet()->setCellValue("C$k", $row->name);
                $excel->getActiveSheet()->setCellValue("D$k", $row->code);
                $excel->getActiveSheet()->setCellValue("E$k", $this->lang->hdc->lustepList[$row->step]);
                $excel->getActiveSheet()->setCellValue("F$k", $row->type);
                $excel->getActiveSheet()->setCellValue("G$k", $row->rating);
                $excel->getActiveSheet()->setCellValue("H$k", $row->totalManday);
                $excel->getActiveSheet()->setCellValue("I$k", $row->onsiteManday);
                $excel->getActiveSheet()->setCellValue("J$k", $row->remoteManday);
                $excel->getActiveSheet()->setCellValue("K$k", $row->codecmtManday);
                $excel->getActiveSheet()->setCellValue("L$k", empty(substr($row->funcDesign,0,strpos($row->funcDesign, '/'))) ? '' : substr($row->funcDesign,0,strpos($row->funcDesign, '/')));
                $excel->getActiveSheet()->setCellValue("M$k", empty(substr($row->funcDesign,0,strpos($row->funcDesign, '/'))) ? '' : substr($row->funcDesign,0,strpos($row->funcDesign, '/')));
                $excel->getActiveSheet()->setCellValue("N$k", $row->estReqSubmitDate);
                $excel->getActiveSheet()->setCellValue("O$k", $row->actReqSubmitDate);
                $excel->getActiveSheet()->setCellValue("P$k", $row->deadline);
                $excel->getActiveSheet()->setCellValue("Q$k", empty(substr($row->siteHead,0,strpos($row->siteHead, '/'))) ? '' : substr($row->siteHead,0,strpos($row->siteHead, '/')));
                $excel->getActiveSheet()->setCellValue("R$k", empty(substr($row->remoteHead,0,strpos($row->remoteHead, '/'))) ? '' : substr($row->remoteHead,0,strpos($row->remoteHead, '/')));
                $excel->getActiveSheet()->setCellValue("S$k", empty(substr($row->techDesign,0,strpos($row->techDesign, '/'))) ? '' : substr($row->techDesign,0,strpos($row->techDesign, '/')));
                $excel->getActiveSheet()->setCellValue("T$k", empty(substr($row->codeDevelop,0,strpos($row->codeDevelop, '/')))? '' : substr($row->codeDevelop,0,strpos($row->codeDevelop, '/')));
                // $excel->getActiveSheet()->setCellValue("U$k", $row->tasks[1]->realStarted);
                $excel->getActiveSheet()->setCellValue("U$k", $row->actReqComfimBeganDate);
                // $excel->getActiveSheet()->setCellValue("V$k", date('Y-m-d',strtotime($row->tasks[1]->finishedDate)));
                $excel->getActiveSheet()->setCellValue("V$k", $row->actReqComfimEndDate);
                $excel->getActiveSheet()->setCellValue("W$k", $row->estCodeStartDate);
                $excel->getActiveSheet()->setCellValue("X$k", $row->estCodeEndDate);
                //先开始时间，如果为空，再取完成时间
                // $realdata = empty($row->tasks[2]->realStarted) ? $row->tasks[2]->finishedDate : $row->tasks[2]->realStarted;
                $excel->getActiveSheet()->setCellValue("Y$k", $row->onCodingStartDate);
                $excel->getActiveSheet()->setCellValue("Z$k", $row->actCodeEndDate);
                $excel->getActiveSheet()->setCellValue("AA$k", empty(substr($wichuser[$row->tasks[4]->assignedTo],strpos($wichuser[$row->tasks[4]->assignedTo],':')+1))? '' : substr($wichuser[$row->tasks[4]->assignedTo],strpos($wichuser[$row->tasks[4]->assignedTo],':')+1));
                // $excel->getActiveSheet()->setCellValue("AB$k", date('Y-m-d',$row->tasks[4]->realStarted));
                $excel->getActiveSheet()->setCellValue("AB$k", $row->actTestBeganDate);
                $excel->getActiveSheet()->setCellValue("AC$k", $row->estTestEndDate);
                // $excel->getActiveSheet()->setCellValue("AD$k", (!empty($row->tasks[4]->finishedDate) ? date('Y-m-d',strtotime($row->tasks[4]->finishedDate)) : ''));
                $excel->getActiveSheet()->setCellValue("AD$k", $row->actTestEndDate);
                $excel->getActiveSheet()->setCellValue("AE$k", $row->actOnsiteTestBeganDate);
                $excel->getActiveSheet()->setCellValue("AF$k", $row->actOnsiteTestEndDate);
                // $excel->getActiveSheet()->setCellValue("AE$k", date('Y-m-d',$row->tasks[5]->realStarted));
                // $excel->getActiveSheet()->setCellValue("AF$k", date('Y-m-d',$row->tasks[5]->finishedDate));
                $excel->getActiveSheet()->setCellValue("AG$k", '');
                $excel->getActiveSheet()->setCellValue("AH$k", $row->desc);
                $excel->getActiveSheet()->setCellValue("AI$k", $row->devOwnership);
                $excel->getActiveSheet()->setCellValue("AJ$k", $row->funcOwnership);
                $excel->getActiveSheet()->setCellValue("AK$k", '');
                $excel->getActiveSheet()->setCellValue("AL$k", $row->storyChanged);
                $excel->getActiveSheet()->setCellValue("AM$k", $row->confimDate);
                $excel->getActiveSheet()->setCellValue("AN$k", $row->recopercent);
                $excel->getActiveSheet()->setCellValue("AO$k", $row->projectcode);
            }
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            setcookie('downloading', 1);
            ob_end_clean();
            header("Content-type:application/vnd.ms-excel;charset=utf-8");
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");
            ;
            header('Content-Disposition:attachment;filename="hdc-report-' . date("Ymd") . '.xls"');
            $write->save('php://output');
        }
        $this->view->projectID = $projectID;
        $this->view->projects = $this->projects;
        $this->display();
    }

    public function exportdateReport($projectID = 0, $branch = '', $browseType = 'unactivated', $param = 0, $orderBy = '') {
        $browseType = strtolower($browseType);
        //当前id
        $projectID = $this->project->saveState($projectID, array_keys($this->projects));
        $project = $this->project->getById($projectID);
        $projectID = $project->id;
        //处理传输的数据，生成报表
        if ($_POST) {
            $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
            $sort = $this->loadModel('common')->appendOrder($orderBy);
            //刷选数据
            $hdcs = $this->hdc->getHdcs($projectID, $browseType, $queryID, $sort,$pager);

            $rows = $this->hdc->getdateReportData($projectID, $browseType, $queryID, $sort);

            $this->app->loadClass('pexcel', true);
            $pexcel = new PExcel();
            $excel = $pexcel->php_excel_obj;
            $excel->setActiveSheetIndex(0);
            $excel->getActiveSheet()->setTitle('Report');
            $letter = array('A', 'B', 'C', 'D', 'E');
            $tableheader = $this->lang->hdc->reportdateHeader;
            for ($i = 0; $i < count($tableheader); $i++) {
                $excel->getActiveSheet()->setCellValue("$letter[$i]1", "$tableheader[$i]");
            }
            $headerStyle = array(
                'font' => array(
                    'bold' => true,
                    'size' => 10,
                    'color' => array(
                        'argb' => '00000000',
                    ),
                ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array(
                            'argb' => '0000000'
                        )
                    )),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY,
                    'startcolor' => array(
                        'argb' => 'FFA0A0A0'
                    ),
                    'endcolor' => array(
                        'argb' => 'FFA0A0A0'
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                ),
            );
            $excel->getActiveSheet()->getStyle("A1:E1")->applyFromArray($headerStyle);
            foreach ($rows as $key => $row) {
                $k = $key + 2;
                $excel->getActiveSheet()->setCellValue("A$k", $key + 1);
                $excel->getActiveSheet()->setCellValue("B$k", $row->name);
                $excel->getActiveSheet()->setCellValue("C$k", $row->onsite);
                $excel->getActiveSheet()->setCellValue("D$k", $row->codecmt);
                $excel->getActiveSheet()->setCellValue("E$k", $row->remote);
            }
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            setcookie('downloading', 1);
            ob_end_clean();
            header("Content-type:application/vnd.ms-excel;charset=utf-8");
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");
            ;
            header('Content-Disposition:attachment;filename="hdc-datereport-' . date("Ymd") . '.xls"');
            header("Content-Transfer-Encoding:binary");
            $write->save('php://output');
        }
        $this->view->projectID = $projectID;
        $this->view->projects = $this->projects;
        $this->display();
    }

    public function edit($hdcID) {
        if (!empty($_POST)) {
            $this->hdc->update($hdcID);
            if (dao::isError())
                die(js::error(dao::getError()));
            die(js::locate($this->createLink('hdc', 'browse'), 'parent'));
        }
        $hdc = $this->hdc->getById($hdcID);
        $this->hdc->setMenu($this->projects, $hdc->project);
        $title = $this->lang->hdc->edit . $this->lang->colon . $hdc->name;
         /*
        get all the center code all
         */
        $centertemp = $this->hdc->getCenterByid('','','all');
        $ludevOSList[''] = '';
        foreach ($centertemp as $key => $value) {
            $ludevOSList[$value->center_code] = $value->center_code;
        }
        $ludevOSList['Onsite'] = 'Onsite';
        $this->view->ludevOSList = $ludevOSList;
        $this->view->title = $title;
        $this->view->position[] = $this->lang->hdc->edit;
        $this->view->hdc = $hdc;
        $this->view->users = $this->user->getPairs('nodeleted');//$this->loadModel('project')->getTeamMemberPairs($hdc->project, 'nodeleted');
        $this->display();
    }

    public function activate($hdcID) {
        $res = $this->hdc->activate($hdcID);
        exit(json_encode($res));
    }

    public function batchActivate() {
        $hdcIDList = $this->post->hdcIDList ? $this->post->hdcIDList : die(js::locate($this->session->hdcList, 'parent'));
        $this->hdc->batchActivate($hdcIDList);

        if (dao::isError())
            die(js::error(dao::getError()));
        die(js::locate($this->session->hdcList, 'parent'));
    }

    public function delete($hdcID, $confirm = 'no') {
        if ($confirm == 'no') {
            die(js::confirm($this->lang->hdc->confirmDelete, inlink('delete', "hdcID=$hdcID&confirm=yes")));
        } else {
            $this->hdc->doDelete($hdcID);

            /* if ajax request, send result. */
            if ($this->server->ajax) {
                if (dao::isError()) {
                    $response['result'] = 'fail';
                    $response['message'] = dao::getError();
                } else {
                    $response['result'] = 'success';
                    $response['message'] = '';
                }
                $this->send($response);
            }
            die(js::locate($this->session->hdcList, 'parent'));
        }
    }

    public function ajaxGetProjects($productID, $branch = 0) {
        $projects = $this->loadModel('product')->getProjectPairs($productID, $branch ? "0,$branch" : $branch, 'nodeleted');
        die(html::select('project', $projects, '', "class='form-control'"));
    }

    /**
     * 开发统计
     * @param  INT $projectID  项目ID
     * @param   $browseType [description]
     * @return [type]             [description]
     */
    public function hdcdevcount($projectID, $browseType = 'devcount')
    {
        $sort = $this->loadModel('common')->appendOrder();
        // $hdcs = $this->hdc->getHdcs($projectID, $browseType, $queryID, $sort,$pager);
        $projectID = $this->project->saveState($projectID, array_keys($this->projects));
        $project = $this->project->getById($projectID);
        $projectID = $project->id;
        $this->hdc->setMenu($this->projects, $projectID,'','hdcdevcount');

        $this->loadModel('report');
        $this->view->charts   = array();
        if(!empty($_POST))
        {
            foreach($this->post->charts as $chart)
            {
                $chartFunc   = 'getDataOf' . $chart;
                $chartData   = $this->hdc->$chartFunc($projectID);
                $chartOption = $this->lang->hdc->report->$chart;
                $this->hdc->mergeChartOption($chart);

                $this->view->charts[$chart] = $chartOption;
                $this->view->datas[$chart]  = $this->report->computePercent($chartData);
            }
        }

        $this->projects            = $this->project->getPairs();
        $this->view->title         = $this->projects[$projectID] . $this->lang->colon . $this->lang->hdc->hdcdevcount;
        $this->view->position[]    = $this->projects[$projectID];
        $this->view->position[]    = $this->lang->hdc->hdcdevcount;
        $this->view->projectID     = $projectID;
        $this->view->browseType    = $browseType;
        $this->view->checkedCharts = $this->post->charts ? join(',', $this->post->charts) : '';

        $this->display();
    }

   
    /**
     * 问题统计
     * @param  int $projectID  项目名称
     * @param  string $browseType [description]
     * @return [type]             [description]
     */
    public function hdcquestion($projectID, $browseType = 'hdcquestion')
    {
        $sort = $this->loadModel('common')->appendOrder();
        // $hdcs = $this->hdc->getHdcs($projectID, $browseType, $queryID, $sort,$pager);
        $projectID = $this->project->saveState($projectID, array_keys($this->projects));
        $project = $this->project->getById($projectID);
        $projectID = $project->id;
        $this->hdc->setMenu($this->projects, $projectID,'','hdcquestion');
        
        $this->loadModel('report');
        $this->view->charts   = array();
        if(!empty($_POST))
        {
            foreach($this->post->charts as $chart)
            {
                $chartFunc   = 'getDataOf' . $chart;
                $chartData   = $this->hdc->$chartFunc($projectID);
                $chartOption = $this->lang->hdc->report->$chart;
                $this->hdc->mergeChartOption($chart);

                $this->view->charts[$chart] = $chartOption;
                $this->view->datas[$chart]  = $this->report->computePercent($chartData);
            }
        }

        $this->projects            = $this->project->getPairs();
        $this->view->title         = $this->projects[$projectID] . $this->lang->colon . $this->lang->hdc->hdcquestion;
        $this->view->position[]    = $this->projects[$projectID];
        $this->view->position[]    = $this->lang->hdc->hdcquestion;
        $this->view->projectID     = $projectID;
        $this->view->browseType    = $browseType;
        $this->view->checkedCharts = $this->post->charts ? join(',', $this->post->charts) : '';

        $this->display();
    }
        /**
     * Drop menu page.
     *
     * @param  int    $projectID
     * @param  int    $module
     * @param  int    $method
     * @param  int    $extra
     * @access public
     * @return void
     */
    public function ajaxGetDropMenu($projectID, $module, $method, $extra)
    {
        $this->view->link      = $this->project->getProjectLink($module, $method, $extra);
        $this->view->projectID = $projectID;
        $this->view->module    = $module;
        $this->view->method    = $method;
        $this->view->extra     = $extra;
        $this->view->projects  = $this->dao->select('*')->from(TABLE_PROJECT)->where('id')->in(array_keys($this->projects))->orderBy('order desc')->fetchAll();           
        $this->display();
    }

    /**
     * 计划
     * @param  string  $hr_id      [description]
     * @param  string  $browseType [description]
     * @param  string  $orderBy    [description]
     * @param  integer $recTotal   [description]
     * @param  integer $recPerPage [description]
     * @param  integer $pageID     [description]
     * @return [type]              [description]
     */
    public function hdcplan($hr_id='',$browseType = 'hdcplan',$orderBy = '', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        //role check 判断是否是管理组成员，不是则查询单开发中心
        $checkdata = $this->checkPlanRole();
        foreach ($checkdata as $key => $value) {
            $devcenter[$value->hr_id] = $value->center_name;
        }
        //开发中心显示
        if (empty($hr_id)) {
            $this->view->firstcenter = $checkdata[0]->center_name;
            $hr_id = $checkdata[0]->hr_id;
        }else{
            $this->view->firstcenter = $devcenter[$hr_id];
        }

        //page and search 
        $browseType = strtolower($browseType);
        $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        $actionURL = $this->createLink('hdc', 'hdcplan', "hr_id=$hr_id&browseType=bySearch&queryID=$hdcid");
        $this->hdc->buildSearchForm('','', $queryID, $actionURL);
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);
        $sort = $this->loadModel('common')->appendOrder($orderBy);

        //获得基础信息
        $planresult = $this->hdc->getplandatebyhrid($hr_id,$pager,$browseType,$sort);
        //计算日期，并且获得信息
        $nowdate = date('Y-m-d'); // 当前日期
        $firstdate = 1;//星期一
        $week = date('w',strtotime($nowdate));
        $now_start=date('Y-m-d',strtotime("$nowdate -".($week ? $week - $firstdate : 6).' days')); //获取本周开始日期，如果是0，则表示周日，减去 6 天
        /*  第一周到第二周数据 */
        $first_second=date('Y-m-d',strtotime("$now_start +6 days"));  //1周结束日期
        $dateresult = $this->hdc->getplandatabydate($now_start,$first_second,'notempty');
        $datefirestept =$this->hdc->getplandatabydate($now_start,$first_second,'empty');
        // var_dump($datefirestept);

        $second_begin = date('Y-m-d',strtotime("$now_start +7 days"));  //2周开始日期
        $second_end = date('Y-m-d',strtotime("$now_start +13 days"));  //2周开始日期
        $datesecond = $this->hdc->getplandatabydate($second_begin,$second_end,'notempty');
        $datesecondept = $this->hdc->getplandatabydate($second_begin,$second_end,'empty');
        /*  第三周的空闲天数 */
        $third_begin = date('Y-m-d',strtotime("$now_start +14 days"));
        $third_end = date('Y-m-d',strtotime("$now_start +20 days")); // 3第三周结束时间
        $datethird = $this->hdc->getplandatabydate($third_begin,$third_end,'empty');

        $four_began = date('Y-m-d',strtotime("$now_start +21 days")); //第四周开始时间
        $four_end = date('Y-m-d',strtotime("$now_start +27 days")); //第四周结束时间
        $datefour = $this->hdc->getplandatabydate($four_began,$four_end,'empty');

        $five_eight_began = date('Y-m-d',strtotime("$now_start +28 days")); // 第八周开始时间
        $five_eight_end = date('Y-m-d',strtotime("$now_start +55 days")); // 第八周结束时间
        $datefive= $this->hdc->getplandatabydate($five_eight_began,$five_eight_end,'empty');

        foreach ($planresult as $key => $value) {
            foreach ($dateresult as $k => $v) {
                if ($value->account == $v->user_id) {
                   $planresult[$key]->fisrstdate[] = $v;
                }
            } 
            foreach ($datesecond as $k => $v) {
                if ($value->account == $v->user_id) {
                   $planresult[$key]->seconddate[] = $v;
                }
            }
            foreach ($datethird as $k => $v) {
               if ($value->account == $v->user_id) {
                   $planresult[$key]->thirdemptydate = $v->cc;
                }
            }
            foreach ($datefour as $k => $v) {
               if ($value->account == $v->user_id) {
                   $planresult[$key]->fouremptydate = $v->cc;
                }
            }
            foreach ($datefive as $k => $v) {
               if ($value->account == $v->user_id) {
                   $planresult[$key]->fiveemptydate = $v->cc;
                }
            }
            foreach ($datefirestept as $k => $v) {
                if ($value->account == $v->user_id) {
                   $planresult[$key]->firstemptydate = $v->cc;
                }
            }
            foreach ($datesecondept as $k => $v) {
                if ($value->account == $v->user_id) {
                   $planresult[$key]->secondemptydate = $v->cc;
                }
            }
        }
        //筛选 有空的时间      
        foreach ($planresult as $key => $value) {
            if (strpos($this->session->hdcQuery,'A1')) {//第一周
                if (count($value->fisrstdate) > 0 ) {
                   unset($planresult[$key]);
                   $pager->recTotal--;
                }
            }
            if (strpos($this->session->hdcQuery,'A2')) {//第二周
                if (count($value->seconddate) > 0 ) {
                   unset($planresult[$key]);
                   $pager->recTotal--;
                }
            }
            if (strpos($this->session->hdcQuery,'A3')) {//第三周
                if (!empty($value->thirdemptydate) &&  $value->thirdemptydate != 0) {
                   unset($planresult[$key]);
                   $pager->recTotal--;
                }
            }
            if (strpos($this->session->hdcQuery,'A4')) {//第四周
                if (!empty($value->fouremptydate) &&  $value->fouremptydate != 0) {
                   unset($planresult[$key]);
                   $pager->recTotal--;
                }
            }
            if (strpos($this->session->hdcQuery,'A4')) {//第五到八周
                if (!empty($value->fiveemptydate) &&  $value->fiveemptydate != 0) {
                   unset($planresult[$key]);
                   $pager->recTotal--;
                }
            }
        }
        $this->session->set('hdcQuery', '');

        $this->view->now_start = $now_start;
        $this->view->first = date('Y-m-d',strtotime("$now_start +7 days"));
        $this->view->second_end = $third_begin;
        $this->view->second_begin = $second_begin;
        $this->view->planresult = $planresult;
        $this->view->hr_id = $hr_id;
        $this->view->devcenter = $devcenter;
        $this->view->browseType = $browseType;
        $this->view->position[]    = $this->lang->hdc->hdcplan;
        $this->view->position[]    = $this->lang->hdc->hdcresouces;
        $this->view->pager = $pager;
        $this->view->orderBy = $orderBy;
        $this->display();
    }

    /**
     * 详细计划
     * @param  [type]  $userid     [description]
     * @param  string  $hr_id      [description]
     * @param  string  $browseType [description]
     * @param  string  $orderBy    [description]
     * @param  integer $recTotal   [description]
     * @param  integer $recPerPage [description]
     * @param  integer $pageID     [description]
     * @return [type]              [description]
     */
    public function hdcdetailplan($userid,$hr_id='',$browseType='detailplan',$orderBy='', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        //role check 判断是否是管理组成员，不是则查询单开发中心
        $checkdata = $this->checkPlanRole();
        foreach ($checkdata as $key => $value) {
            $devcenter[$value->hr_id] = $value->center_name;
        }
        //end role check 
        
        //开发中心显示
        if (empty($hr_id)) {
            $this->view->firstcenter = $checkdata[0]->center_name;
            $hr_id = $checkdata[0]->hr_id;
        }else{
            $this->view->firstcenter = $devcenter[$hr_id];
        }
        /* THE  DATAS SHOW */

        $browseType = strtolower($browseType);
        $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        $actionURL = $this->createLink('hdc', 'hdcdetailplan', "$userid=$userid&hr_id=$hr_id&browseType=bySearch&queryID=$hdcid");
        $this->hdc->buildSearchForm('','', $queryID, $actionURL);
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);
        // $sort = $this->loadModel('common')->appendOrder($orderBy);

        $planresult = $this->hdc->getplandatas($userid,$pager,$browseType,$orderBy);

        //get the data by hr_id
        $this->view->nowdate = date('Y-m-d',time());
        $this->view->planresult = $planresult;

        $userresutl = $this->hdc->getUsermanagerbyid($userid);
        $this->view->username = $userresutl->username;

        $this->view->user_id = $userid;
        $this->view->hr_id = $hr_id;
        $this->view->devcenter = $devcenter;
        $this->view->browseType = $browseType;
        $this->view->position[]    = $this->lang->hdc->hdcplan;
        $this->view->position[]    = $this->lang->hdc->hdcresouces;
        $this->view->pager = $pager;
        $this->view->orderBy = $orderBy;
        $this->display();
    }

    /**
     * 批量创建
     * @param  [type] $userid [description]
     * @param  [type] $hr_id  [description]
     * @return [type]         [description]
     */
    public function creatallplan($userid,$hr_id)
    {
        /*project list*/
        $this->checkPlanRole();
        $projectlist = $this->hdc->getpairs();
        if (!empty($_POST)) {
            $this->hdc->createallplan($userid);
            if(dao::isError()) die(js::error(dao::getError()));
            die(js::locate($this->createLink('hdc', 'hdcdetailplan',"userid=$userid&hr_id=$hr_id&browseType=detailplan"), 'parent'));
        }
        $projectlist['ditto'] = $this->lang->hdc->ditto;
        $this->view->typelist = $this->lang->hdc->plan->type;
        $this->view->hr_id = $hr_id;
        $this->view->projectlist = $projectlist;
        $this->display();
    }

     /**
     * The results page of search.
     *
     * @param  string  $keywords
     * @param  string  $module
     * @param  string  $method
     * @param  mix     $extra
     * @access public
     * @return void
     */
    public function ajaxGetMatchedItems($keywords, $module, $method, $extra)
    {
        //判断权限
        $role = array(1,17,19);
        $roleok = $this->hdc->getroleok($role);
        if ($roleok == "yes") {
            $projects = $this->dao->select('t1.project_id id,t2.name')->from(TABLE_ALLOCATION)->alias('t1')->leftJoin(TABLE_PROJECT)->alias('t2')->on('t1.project_id = t2.id ')->where('t2.name')->like("%$keywords%")->orderBy('order desc')->fetchAll();
        }else{
            $projects = $this->dao->select('*')->from(TABLE_PROJECT)->where('deleted')->eq(0)->andWhere('name')->like("%$keywords%")->orderBy('order desc')->fetchAll();
            foreach($projects as $key => $project)
            {
                if(!$this->project->checkPriv($project)) unset($projects[$key]);
            }
        }
        $this->view->link     = $this->project->getProjectLink($module, $method, $extra);
        $this->view->projects = $projects;
        $this->view->keywords = $keywords;
        $this->display();
    }

    public function importfoot()
    {
        $this->app->loadClass('pexcel', true);
        $pexcel = new PExcel();
        $fileName = './HDC项目清单.xlsx';
        $rows = $pexcel->excelRead($fileName);
        unset($rows[0]);
        foreach ($rows as $key => $value) {
            $result = $this->dao->select('t1.id,t2.account,t3.realname')->from(TABLE_PROJECT)->alias('t1')
                            ->leftJoin(TABLE_TEAM)->alias('t2')
                            ->on('t1.id = t2.project')
                            ->leftJoin(TABLE_USER)->alias('t3')
                            ->on('t2.account = t3.account')
                            ->where('t1.name')->eq($value['A'])
                            ->andwhere('t2.role')->eq('项目经理')
                            ->fetch();
            $insdata->project_id = $result->id;
            $insdata->manager_id = $result->account.':'.$result->realname;
            $insdata->applystatus = 'N';
            $insdata->assignstatus = 'N';
            $insdata->create_user = '3543:段俊宇';
            $insdata->create_time = date('y-m-d',time());
            $ischeck = $this->dao->select('project_id')->from(TABLE_ALLOCATION)->where('project_id')->eq($result->id)->fetch('project_id');
            if (is_null($ischeck)) {//没有就插入
                    $this->dao->insert(TABLE_ALLOCATION)->data($insdata)->autoCheck()->exec();
                }else{
                    $this->dao->update(TABLE_ALLOCATION)->data($insdata)->where('project_id')->eq($ischeck)->exec();
                }
         }
    }

    /**
     * 编辑单条计划
     * @param  [type] $editid     [description]
     * @param  [type] $user_id    [description]
     * @param  [type] $hr_id      [description]
     * @param  string $browseType [description]
     * @return [type]             [description]
     */
    public function hdceditplan($editid,$user_id,$hr_id,$browseType="hdceditone")
    {
        /* 检查计划权限 */
        $checkdata = $this->checkPlanRole();
        /* 获得所有项目 */
        $projectlist = $this->hdc->getpairs();
        /* 获得详细计划 */
        $olddata = $this->hdc->getdetailplanbyid($editid);
        /* 项目类型列表 */
        $typelist = $this->lang->hdc->plan->type;
        array_pop($typelist);
        if(!empty($_POST)){
            $this->hdc->edithdcplan($editid);
            if(dao::isError()) die(js::error(dao::getError()));
            die(js::locate($this->createLink('hdc', 'hdcdetailplan',"user_id=$user_id&hr_id=$hr_id&browseType=detailplan"), 'parent'));
        }
        $this->view->hr_id = $hr_id;
        $this->view->editid = $editid;
        $this->view->user_id = $user_id;
        $this->view->typelist = $typelist;
        $this->view->olddata = $olddata;
        $this->view->projects = $projectlist;
        $this->view->browseType = $browseType;
        $this->display();


    }

    /**
     * 检查计划权限
     * @return return return
     */
    public function checkPlanRole()
    {
        $role = array(1);
        $roleok = $this->hdc->getroleok($role);
        $account = $this->app->user->account;
        if ($roleok == 'yes') {
            $checkdata = $this->hdc->getcenterbyid('','','all');
        }else{
            $checkdata = $this->hdc->checkPlanRole($account,'P');       
        }
        if (empty($checkdata)) {
            die(js::confirm("您没有计划的权限，请联系管理员为您分配",$this->createLink('hdc', 'browse',"&browseType=unactivated"),$this->createLink('hdc', 'browse',"&browseType=unactivated")));
        }
        return $checkdata;
    }

    public function hdcdeleteplan($editid,$type)
    {
        $this->checkPlanRole();
        if (!empty($editid)) {
            $this->hdc->hdcdeleteplan($editid,$type);
            if ($this->server->ajax) {
                if (dao::isError()) {
                    $response['result'] = 'fail';
                    $response['message'] = dao::getError();
                }else{
                    $response['result'] = 'success';
                    $response['message'] = '';
                }
                $this->send($response);
            }
            die(js::locate($this->createLink('hdc', 'hdcdetailplan',"user_id=$editid&hr_id=&browseType=detailplan"), 'parent'));
        } 
    }

    /**
     * 自动更新HDC项目
     * @return [type] [description]
     */
    public function asyhdcproject($value=0)
    {
        ignore_user_abort(true); // 后台运行
        set_time_limit(0);
        //get the all project 
        $projects = $this->hdc->getAllcation('all','');
        foreach ($projects as $key => $values) {
            $projectid[] = $values->project_id; 
        }
        $countall = count($projectid);
        //
        $this->app->loadClass('pager', $static = true);
        $sort = $this->loadModel('common')->appendOrder('');
        $pager = new pager(0, 100, 1);
        for ($i=0; $i <= $countall; $i++) { 
            $asyid = $projectid[$i];
            $hdc = $this->hdc->getHdcs($asyid,'', $queryID, $sort,$pager);
            file_put_contents('log.txt',"时间：".date('Y-m-d H:i:s',time())."正在采集项目:".$asyid.",一切正常：更新正常\n",FILE_APPEND);
            sleep(2);
        }
        echo "ok\n";
    }


    public function hdcstatic()
    {
        $this->display();
    }


    /**
     * 项目汇总统计
     * @param  string  $browseType 类型
     * @param  integer $param      参数
     * @param  string  $orderBy    排序
     * @param  integer $recTotal   总数
     * @param  integer $recPerPage 页数显示条数
     * @param  integer $pageID     页数
     * @return array              array
     */
    public function hdcsummary($browseType = 'hdcsummary', $param = 0, $orderBy = '', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        //Role Check is the role of HDC项目超级管理组(所有HDC项目) or HDC项目管理组（自己的项目）
        $role = array(1,17);
        $roleok = $this->hdc->getroleok($role);
        if ($roleok == "yes") {
            $tempallcation = $this->hdc->getAllcation();
            foreach ($tempallcation as $key => $value) {
                $projects[$value->project_id] = $value->name;
            }
        }else{
            $projects = $this->project->getPairs('nocode');
        }
        $newproject = array_keys($projects);
        //page and search 
        $this->app->loadClass('pager', $static = true);
        $pagers = new pager($recTotal, $recPerPage, $pageID);
        if(isset($_COOKIE[$pagers->pageCookie])) $recPerPage = $_COOKIE[$pagers->pageCookie];
        $browseType = strtolower($browseType);
        $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        $actionURL = $this->createLink('hdc', 'hdcsummary', "browseType=bySearch&queryID=$hdcid");
        $this->hdc->buildSearchForm('','', $queryID, $actionURL);
        $sort = $this->loadModel('common')->appendOrder($orderBy);
        //Get The Allcation Datas
        $result = $this->hdc->hdcsummary($newproject,$pageID,$recPerPage,$browseType,$queryID,$orderBy);
        // var_dump($result);
        $this->view->summarydata = $result;
        $this->view->position[]    = $this->lang->hdc->hdcsummary;
        // $this->view->position[]    = $this->lang->hdc->hdcresouces;
        $allcount = ($browseType != 'hdcsummary') ? count($result) : count($newproject);
        $pager = new pager($allcount, $recPerPage, $pageID);
        // var_dump($pager);
        $this->view->pager = $pager;
        $this->view->orderBy = $orderBy;
        $this->view->browseType = $browseType;
        $this->display();
    }

    public function exportsumary($browseType = 'hdcsummary', $param = 0, $orderBy = '', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $role = array(1,17);
        $roleok = $this->hdc->getroleok($role);
        if ($roleok == "yes") {
            $tempallcation = $this->hdc->getAllcation();
            foreach ($tempallcation as $key => $value) {
                $projects[$value->project_id] = $value->name;
            }
        }else{
            $projects = $this->project->getPairs('nocode');
        }
        $newproject = array_keys($projects);
        $browseType = strtolower($browseType);
        //处理传输的数据，生成报表
        $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        $sort = $this->loadModel('common')->appendOrder($orderBy);
        //刷选数据
        $rows = $this->hdc->hdcsummary($newproject,$pageID,$recPerPage,$browseType,$queryID,$orderBy,'export');
        $rows = array_values($rows);

        $this->app->loadClass('pexcel', true);
        $pexcel = new PExcel();
        $excel = $pexcel->php_excel_obj;
        $excel->setActiveSheetIndex(0);
        $excel->getActiveSheet()->setTitle('Report');
        $letter = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U');
        $tableheader = $this->lang->hdc->reportprojectHeader;
            for ($i = 0; $i < count($tableheader); $i++) {
                $excel->getActiveSheet()->setCellValue("$letter[$i]1", "$tableheader[$i]");
            }
            $headerStyle = array(
                'font' => array(
                    'bold' => true,
                    'size' => 10,
                    'color' => array(
                        'argb' => '00000000',
                    ),
                ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array(
                            'argb' => '0000000'
                        )
                    )),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY,
                    'startcolor' => array(
                        'argb' => 'FFA0A0A0'
                    ),
                    'endcolor' => array(
                        'argb' => 'FFA0A0A0'
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                ),
            );
            $excel->getActiveSheet()->getStyle("A1:U1")->applyFromArray($headerStyle);
            foreach ($rows as $key => $row) {
                $k = $key + 2;
                $excel->getActiveSheet()->setCellValue("A$k", $key + 1);
                $excel->getActiveSheet()->setCellValue("B$k", $row->name);
                $excel->getActiveSheet()->setCellValue("C$k", $row->techname);
                $excel->getActiveSheet()->setCellValue("D$k", $row->testname);
                $excel->getActiveSheet()->setCellValue("E$k", $row->center_name);
                $excel->getActiveSheet()->setCellValue("F$k", $row->hdcprosums);
                $excel->getActiveSheet()->setCellValue("G$k", $row->hdcpeosums);
                $excel->getActiveSheet()->setCellValue("H$k", $row->uncheckpro);
                $excel->getActiveSheet()->setCellValue("I$k", $row->uncheckpeo);
                $excel->getActiveSheet()->setCellValue("J$k", $row->waitpro);
                $excel->getActiveSheet()->setCellValue("K$k", $row->waitpeo);
                $excel->getActiveSheet()->setCellValue("L$k", $row->doingpro);
                $excel->getActiveSheet()->setCellValue("M$k", $row->doingpeo);
                $excel->getActiveSheet()->setCellValue("N$k", $row->doingtestpro);
                $excel->getActiveSheet()->setCellValue("O$k", $row->doingtestpeo);
                $excel->getActiveSheet()->setCellValue("P$k", $row->donepro);
                $excel->getActiveSheet()->setCellValue("Q$k", $row->donepeo);
                $excel->getActiveSheet()->setCellValue("R$k", $row->unsolved);
                $excel->getActiveSheet()->setCellValue("S$k", $row->solproblem);
                $excel->getActiveSheet()->setCellValue("T$k", !empty($row->hdcprosums) ? (round($row->delaydevpercent/$row->hdcprosums,2) * 100) : 0);
                $excel->getActiveSheet()->setCellValue("U$k", $row->allpropeo);
                
            }
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            setcookie('downloading', 1);
            ob_end_clean();
            header("Content-type:application/vnd.ms-excel;charset=utf-8");
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");
            ;
            header('Content-Disposition:attachment;filename="hdc-sumsreport-' . date("Ymd") . '.xls"');
            header("Content-Transfer-Encoding:binary");
            $write->save('php://output');
    }

    public function peosummary($hr_id='',$browseType = 'peosummary',$param = 0,$orderBy = '', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        //role check 
        $checkdata = $this->checkSumsrole();
        foreach ($checkdata as $key => $value) {
            $devcenter[$value->hr_id] = $value->center_name;
        }
        //end role check 
        //开发中心显示
        if (empty($hr_id)) {
            $this->view->firstcenter = $checkdata[0]->center_name;
            $hr_id = $checkdata[0]->hr_id;
        }else{
            $this->view->firstcenter = $devcenter[$hr_id];
        }
        //page and search 
        $this->app->loadClass('pager', $static = true);
        $pagers = new pager($recTotal, $recPerPage, $pageID);
        // if(isset($_COOKIE[$pagers->pageCookie])) $recPerPage = $_COOKIE[$pagers->pageCookie];
        $browseType = strtolower($browseType);
        $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        $actionURL = $this->createLink('hdc', 'peosummary', "hr_id=$hr_id&browseType=bySearch&queryID=$hdcid");
        $this->hdc->buildSearchForm('','', $queryID, $actionURL);
        $sort = $this->loadModel('common')->appendOrder($orderBy);
        //Get The people Datas
        $result = $this->hdc->hdcgetpeosumary($hr_id,$pagers,$browseType,$sort);
        // $result = $this->hdc->hdcgetpeosumary($hr_id,$pageID,$recPerPage,$browseType,$queryID,$orderBy);
        // var_dump($result);
        $this->view->summarydata = $result;
        $this->view->position[]    = $this->lang->hdc->peosummary;
        // $this->view->position[]    = $this->lang->hdc->hdcresouces;
        // $allcount = ($browseType != 'hdcsummary') ? count($result) : count($newproject);
        // $pager = new pager($allcount, $recPerPage, $pageID);
        // var_dump($pager);
        $this->view->devcenter = $devcenter;
        $this->view->pager = $pagers;
        $this->view->orderBy = $orderBy;
        $this->view->browseType = $browseType;
        $this->display();
    }


    public function checkSumsrole()
    {
        $role = array(1,19,21);
        $roleok = $this->hdc->getroleok($role);
        $account = $this->app->user->account;
        if ($roleok == 'yes') {
            $checkdata = $this->hdc->getcenterbyid('','','all');
        }else{
            $checkdata = $this->hdc->checkPlanRole($account,'S');       
        }
        if (empty($checkdata)) {
            die(js::confirm("您没有统计的权限，请联系管理员为您分配",$this->createLink('hdc', 'browse',"&browseType=unactivated"),$this->createLink('hdc', 'browse',"&browseType=unactivated")));
        }
        return $checkdata;
    }

    public function peosummarydetail($account='',$browseType = 'peosummarydetail',$param = 0,$orderBy = '', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        //role check 
        $checkdata = $this->checkSumsrole();
        //page and search 
        $this->app->loadClass('pager', $static = true);
        $pagers = new pager($recTotal, $recPerPage, $pageID);
        if(isset($_COOKIE[$pagers->pageCookie])) $recPerPage = $_COOKIE[$pagers->pageCookie];
        $browseType = strtolower($browseType);
        $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        $actionURL = $this->createLink('hdc', 'peosummarydetail', "userid=$account&browseType=bySearch&queryID=$hdcid");
        $this->hdc->buildSearchForm('','', $queryID, $actionURL);
        $sort = $this->loadModel('common')->appendOrder($orderBy);
        //Get The people Datas
        $result = $this->hdc->peosummarydetail($account,$pageID,$recPerPage,$browseType,$sort);
        $this->view->summarydata = $result;
        $this->view->position[]    = $this->lang->hdc->peosummary;
        // $this->view->position[]    = $this->lang->hdc->hdcresouces;
        $allcount = ($browseType != 'peosummarydetail') ? count($result) : count($newproject);
        $pager = new pager($allcount, $recPerPage, $pageID);
        // var_dump($pager);
        $this->view->userid = $account;
        $this->view->devcenter = $devcenter;
        $this->view->pager = $pager;
        $this->view->orderBy = $orderBy;
        $this->view->browseType = $browseType;
        $this->display();
    }

    public function exportpeosumary($hr_id='',$browseType = 'peosummary',$param = 0,$orderBy = '', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $checkdata = $this->checkSumsrole();
        foreach ($checkdata as $key => $value) {
            $devcenter[$value->hr_id] = $value->center_name;
        }
        //开发中心显示
        if (empty($hr_id)) {
            $hr_id = $checkdata[0]->hr_id;
        }
        $browseType = strtolower($browseType);
        //处理传输的数据，生成报表
        $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        $sort = $this->loadModel('common')->appendOrder($orderBy);
        //刷选数据
        $rows = $this->hdc->hdcgetpeosumary($hr_id,$pagers,$browseType,$sort);
        $rows = array_values($rows);
        $this->app->loadClass('pexcel', true);
        $pexcel = new PExcel();
        $excel = $pexcel->php_excel_obj;
        $excel->setActiveSheetIndex(0);
        $excel->getActiveSheet()->setTitle('Report');
        $letter = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T');
        $tableheader = $this->lang->hdc->reportpeosumHeader;
            for ($i = 0; $i < count($tableheader); $i++) {
                $excel->getActiveSheet()->setCellValue("$letter[$i]1", "$tableheader[$i]");
            }
            $headerStyle = array(
                'font' => array(
                    'bold' => true,
                    'size' => 10,
                    'color' => array(
                        'argb' => '00000000',
                    ),
                ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array(
                            'argb' => '0000000'
                        )
                    )),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY,
                    'startcolor' => array(
                        'argb' => 'FFA0A0A0'
                    ),
                    'endcolor' => array(
                        'argb' => 'FFA0A0A0'
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                ),
            );
            $excel->getActiveSheet()->getStyle("A1:T1")->applyFromArray($headerStyle);
            foreach ($rows as $key => $row) {
                $k = $key + 2;
                $excel->getActiveSheet()->setCellValue("A$k", $key + 1);
                $excel->getActiveSheet()->setCellValue("B$k", $row->centername);
                $excel->getActiveSheet()->setCellValue("C$k", $row->name);
                $excel->getActiveSheet()->setCellValue("D$k", $row->account);
                $excel->getActiveSheet()->setCellValue("E$k", $row->username);
                $excel->getActiveSheet()->setCellValue("F$k", $row->hdcprosums);
                $excel->getActiveSheet()->setCellValue("G$k", $row->hdcpeosums);
                $excel->getActiveSheet()->setCellValue("H$k", $row->uncheckpro);
                $excel->getActiveSheet()->setCellValue("I$k", $row->uncheckpeo);
                $excel->getActiveSheet()->setCellValue("J$k", $row->waitpro);
                $excel->getActiveSheet()->setCellValue("K$k", $row->waitpeo);
                $excel->getActiveSheet()->setCellValue("L$k", $row->doingpro);
                $excel->getActiveSheet()->setCellValue("M$k", $row->doingpeo);
                $excel->getActiveSheet()->setCellValue("N$k", $row->doingtestpro);
                $excel->getActiveSheet()->setCellValue("O$k", $row->doingtestpeo);
                $excel->getActiveSheet()->setCellValue("P$k", $row->donepro);
                $excel->getActiveSheet()->setCellValue("Q$k", $row->donepeo);
                $excel->getActiveSheet()->setCellValue("R$k", $row->unsolved);
                $excel->getActiveSheet()->setCellValue("S$k", $row->solproblem);
                $excel->getActiveSheet()->setCellValue("T$k", !empty($row->hdcprosums) ? (round($row->delaydevpercent/$row->hdcprosums,2) * 100) : 0);
                // $excel->getActiveSheet()->setCellValue("U$k", $row->allpropeo);
                
            }
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            setcookie('downloading', 1);
            ob_end_clean();
            header("Content-type:application/vnd.ms-excel;charset=utf-8");
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");
            ;
            header('Content-Disposition:attachment;filename="hdc-sumsreport-' . date("Ymd") . '.xls"');
            header("Content-Transfer-Encoding:binary");
            $write->save('php://output');
    }

    public function exportpeosumarydetail($account='',$browseType = 'peosummarydetail',$param = 0,$orderBy = '', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $checkdata = $this->checkSumsrole();
        foreach ($checkdata as $key => $value) {
            $devcenter[$value->hr_id] = $value->center_name;
        }
        //开发中心显示
        if (empty($hr_id)) {
            $hr_id = $checkdata[0]->hr_id;
        }
        $browseType = strtolower($browseType);
        //处理传输的数据，生成报表
        $queryID = ($browseType == 'bysearch') ? (int) $param : 0;
        $sort = $this->loadModel('common')->appendOrder($orderBy);
        //刷选数据
        $rows = $this->hdc->peosummarydetail($account,$pageID,$recPerPage,$browseType,$sort);
        $rows = array_values($rows);
        $this->app->loadClass('pexcel', true);
        $pexcel = new PExcel();
        $excel = $pexcel->php_excel_obj;
        $excel->setActiveSheetIndex(0);
        $excel->getActiveSheet()->setTitle('Report');
        $letter = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T');
        $tableheader = $this->lang->hdc->reportpeosumHeader;
            for ($i = 0; $i < count($tableheader); $i++) {
                $excel->getActiveSheet()->setCellValue("$letter[$i]1", "$tableheader[$i]");
            }
            $headerStyle = array(
                'font' => array(
                    'bold' => true,
                    'size' => 10,
                    'color' => array(
                        'argb' => '00000000',
                    ),
                ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array(
                            'argb' => '0000000'
                        )
                    )),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY,
                    'startcolor' => array(
                        'argb' => 'FFA0A0A0'
                    ),
                    'endcolor' => array(
                        'argb' => 'FFA0A0A0'
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                ),
            );
            $excel->getActiveSheet()->getStyle("A1:T1")->applyFromArray($headerStyle);
            foreach ($rows as $key => $row) {
                $k = $key + 2;
                $excel->getActiveSheet()->setCellValue("A$k", $key + 1);
                $excel->getActiveSheet()->setCellValue("B$k", $row->centername);
                $excel->getActiveSheet()->setCellValue("C$k", $row->name);
                $excel->getActiveSheet()->setCellValue("D$k", $row->account);
                $excel->getActiveSheet()->setCellValue("E$k", $row->username);
                $excel->getActiveSheet()->setCellValue("F$k", $row->hdcprosums);
                $excel->getActiveSheet()->setCellValue("G$k", $row->hdcpeosums);
                $excel->getActiveSheet()->setCellValue("H$k", $row->uncheckpro);
                $excel->getActiveSheet()->setCellValue("I$k", $row->uncheckpeo);
                $excel->getActiveSheet()->setCellValue("J$k", $row->waitpro);
                $excel->getActiveSheet()->setCellValue("K$k", $row->waitpeo);
                $excel->getActiveSheet()->setCellValue("L$k", $row->doingpro);
                $excel->getActiveSheet()->setCellValue("M$k", $row->doingpeo);
                $excel->getActiveSheet()->setCellValue("N$k", $row->doingtestpro);
                $excel->getActiveSheet()->setCellValue("O$k", $row->doingtestpeo);
                $excel->getActiveSheet()->setCellValue("P$k", $row->donepro);
                $excel->getActiveSheet()->setCellValue("Q$k", $row->donepeo);
                $excel->getActiveSheet()->setCellValue("R$k", $row->unsolved);
                $excel->getActiveSheet()->setCellValue("S$k", $row->solproblem);
                $excel->getActiveSheet()->setCellValue("T$k", !empty($row->hdcprosums) ? (round($row->delaydevpercent/$row->hdcprosums,2) * 100) : 0);
                // $excel->getActiveSheet()->setCellValue("U$k", $row->allpropeo);
                
            }
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            setcookie('downloading', 1);
            ob_end_clean();
            header("Content-type:application/vnd.ms-excel;charset=utf-8");
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");
            ;
            header('Content-Disposition:attachment;filename="hdc-sumsreport-' . date("Ymd") . '.xls"');
            header("Content-Transfer-Encoding:binary");
            $write->save('php://output');
    }

    public function ResultsExport()
    {
        if ($_POST) {
            $exportdate = $_POST['exportdate'];
            die(js::locate($this->createLink('hdc', 'exportcheck',"expdate=$exportdate"),'parent'));
        }
        $this->display();
    }

    public function exportcheck($expdate='')
    {
        set_time_limit(0);
        ob_end_clean();     //在循环输出前，要关闭输出缓冲区   
        $this->hdc->getResultexport($expdate);
        exit;
    }
}