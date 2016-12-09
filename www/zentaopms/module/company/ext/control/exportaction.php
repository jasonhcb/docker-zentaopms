<?php
class company extends control
{
    public function exportaction(){
        $this->app->loadLang('user');
        $this->app->loadLang('project');
        $this->loadModel('action');
        $actions = $this->dao->select('t1.*,t2.name AS productName,t3.name AS projectName')
                ->from(TABLE_ACTION)->alias('t1')
                ->leftJoin(TABLE_PRODUCT)->alias('t2')
                ->on('t1.product = t2.id')
                ->leftJoin(TABLE_PROJECT)->alias('t3')
                ->on('t1.project = t3.id')
                ->fetchAll();
        $actions = $this->action->transformActions($actions);
        //$products = $this->loadModel('product')->getPairs('nocode');
        //$projects = $this->loadModel('project')->getPairs('nocode');
        $users = $this->loadModel('user')->getPairs('nodeleted|noclosed');
        $rows = array();
        foreach($actions as $action) {
            $row = array();
            $row['date'] = $action->date;
            $actor = isset($users[$action->actor]) ? $users[$action->actor] : $action->actor;
            $row['actor'] = strpos($actor, ':') === false ? $actor : substr($actor, strpos($actor, ':') + 1);
            $row['actionLabel'] = $action->actionLabel;
            $row['objectType'] = $this->lang->action->objectTypes[$action->objectType];
            $row['objectID'] = $action->objectID;
            //$row['product'] = $products[$action->product];
            $row['product'] = $action->productName;
            //$row['project'] = $projects[$action->project];
            $row['project'] = $action->projectName;
            $row['objectName'] = $action->objectName;
            $rows[] = $row;
        }
        set_include_path(realpath(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . DS . 'lib' .DS . 'pexcel' . DS);
        require_once   'PHPExcel.php';
        $excel = new PHPExcel();
        $letter = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
        $tableheader = array($this->lang->action->date, $this->lang->action->actor,$this->lang->action->action, $this->lang->action->objectType, $this->lang->idAB, $this->lang->company->product, $this->lang->company->project, $this->lang->action->objectName);
        for ($i = 0; $i < count($tableheader); $i++) {
            $excel->getActiveSheet()->setCellValue("$letter[$i]1", "$tableheader[$i]");
        }
        for ($i = 2; $i <= count($rows) + 1; $i++) {
            $j = 0;
            foreach ($rows[$i - 2] as $key => $value) {
                $excel->getActiveSheet()->setCellValue("$letter[$j]$i", "$value");
                $j++;
            }
        }
        $write = new PHPExcel_Writer_Excel5($excel);
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
        header('Content-Disposition:attachment;filename="action-list-'.date("Ymd").'.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');
    }
}
