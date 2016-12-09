<?php

class report extends control {

    public function productStatisticsExport($orderBy = 'order_desc',$type = '',$productname='',$projectname='') {
        $rows = $this->report->getProductStatisticst($orderBy, $type,$productname,$projectname);
        $this->app->loadClass('pexcel', true);
        $pexcel = new PExcel();
        $excel = $pexcel->php_excel_obj;
        $widths = array(30, 10, 10, 10, 30, 10, 10, 10, 10, 10, 10);
        foreach ($widths as $col => $width) {
            $excel->getActiveSheet()->getColumnDimension(chr(ord('A') + $col))->setWidth($width);
        }
        $letter = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K');
        $tableheader = array($this->lang->report->productName, $this->lang->report->storyTotal, $this->lang->report->storyActive, $this->lang->report->storyClosed, $this->lang->report->projectName, $this->lang->report->taskTotal, $this->lang->report->taskOngoing, $this->lang->report->taskClosed, $this->lang->report->bugTotal, $this->lang->report->bugActive, $this->lang->report->bugResolved);
        $headerStyle = array(
            'font' => array(
                'bold' => true,
                'size' => 12,
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
        $excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray($headerStyle);

        for ($i = 0; $i < count($tableheader); $i++) {
            $excel->getActiveSheet()->setCellValue("$letter[$i]1", "$tableheader[$i]");
        }
        $i = 2;
        foreach ($rows as $key => $row) {
            $count = isset($row->projects) ? count($row->projects) : 1;
            if ($count > 1) {
                $excel->getActiveSheet()->mergeCells('A' . $i . ':' . 'A' . ($i + $count - 1));
                $excel->getActiveSheet()->mergeCells('B' . $i . ':' . 'B' . ($i + $count - 1));
                $excel->getActiveSheet()->mergeCells('C' . $i . ':' . 'C' . ($i + $count - 1));
                $excel->getActiveSheet()->mergeCells('D' . $i . ':' . 'D' . ($i + $count - 1));
                $excel->getActiveSheet()->getStyle('A' . $i . ':' . 'D' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                //$excel->getActiveSheet()->getStyle('A'.$i.':'.'D'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            }
            $excel->getActiveSheet()->setCellValue("A$i", $row->name);
            $excel->getActiveSheet()->setCellValue("B$i", $row->totalStory);
            $excel->getActiveSheet()->setCellValue("C$i", $row->totalStory - $row->closedStory);
            $excel->getActiveSheet()->setCellValue("D$i", $row->closedStory);
            foreach ($row->projects as $project) {
                $excel->getActiveSheet()->setCellValue("E$i", $project->name);
                $excel->getActiveSheet()->setCellValue("F$i", $project->totalTask);
                $excel->getActiveSheet()->setCellValue("G$i", $project->totalTask - $project->closedTask);
                $excel->getActiveSheet()->setCellValue("H$i", $project->closedTask);
                $excel->getActiveSheet()->setCellValue("I$i", $project->totalBug);
                $excel->getActiveSheet()->setCellValue("J$i", $project->activeBug);
                $excel->getActiveSheet()->setCellValue("K$i", $project->totalBug - $project->activeBug);
                $i++;
            }
        }
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
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
        header('Content-Disposition:attachment;filename="product-statistics-list-' . date("Ymd") . '.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');
    }

}
