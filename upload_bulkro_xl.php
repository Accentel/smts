<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
$state=$_GET['state'];
if($state=='AP'){
    $qottable ='add_qot';
}
elseif($state=='TG'){
    $qottable ='add_tgqot';
}
elseif($state=='TN'){
    $qottable ='add_tngqot';
}
elseif($state=='KL'){
    $qottable ='add_klqot';
}
elseif($state=='KN'){
    $qottable ='add_knqot';
}
elseif($state=='OD'){
    $qottable ='add_odqot';
}

$sql="select * from ".$qottable."  where status='Ro Required'";

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
 $objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JTECHNO ASSOCIATES');
 $objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:H4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:H4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
        $objPHPExcel->getActiveSheet()->getStyle("A4:H4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', $state.' QUOTATION LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:H4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'PO Type');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'PO Number');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Quotation Date');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'RO Number');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'RO Date');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'PO Date');

$objPHPExcel->getActiveSheet()->getStyle("A6:H6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
       
 
$objPHPExcel->getActiveSheet()->getStyle("A6:H6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($sql) or die(mysql_error());
$i=1;
$rowCount	=	7;
while($row1	=	$result->fetch_assoc()){
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
  $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row1['quet_num'],'UTF-8'));
  $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row1['po_type'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row1['po_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1[''],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row1['ro_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row1['ro_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row1['po_date'],'UTF-8'));
 $rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$state.'-BulkRO.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>