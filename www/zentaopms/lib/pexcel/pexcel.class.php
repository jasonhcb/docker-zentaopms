<?php 

class PExcel {
	
	public $php_excel_obj;
	
	public function __construct() {
		$this -> php_excel_obj = $this -> getPHPExcelObj();
	}
	
	private function getPHPExcelObj() {
		require_once(dirname(__FILE__).'/PHPExcel.php');
		return new PHPExcel();
	}
	
	private function getPHPExcelReader($file_name) {
		$reader = new PHPExcel_Reader_Excel2007();
		if(!$reader->canRead($file_name)) {
			$reader= new PHPExcel_Reader_Excel5();
			if(!$reader->canRead($file_name)) {
				die('Can Not Read The File [' . $file_name . ']');
			}
		}
		return $reader;
	}
	
	public function excelRead($file_name, $start_row=1, $start_col='A') {
		$reader = $this->getPHPExcelReader($file_name);
		$excel_obj = $reader->load($file_name);
		$current_sheet =$excel_obj->getSheet(0);
		
		$all_col =$current_sheet->getHighestColumn();
		$all_row =$current_sheet->getHighestRow();
		
		$excel_arr = array();
		for($r_i = $start_row; $r_i<=$all_row; $r_i++) {
			$c_arr= array();
			for($c_i= $start_col; $c_i<= $all_col; $c_i++) {
				$adr= $c_i . $r_i;
				$cell = $current_sheet->getCell($adr);
				$value= $cell->getValue();
				if($cell->getDataType()==PHPExcel_Cell_DataType::TYPE_NUMERIC){
					$value=gmdate("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($value));
				}
				if(is_object($value)) $value= $value->__toString();
				$c_arr[$c_i]= $value;
			}
			$excel_arr[] = $c_arr;
		}
		return $excel_arr;
	}
}