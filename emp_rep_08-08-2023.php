<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 //$tsname=$_GET['user'];
$datatable="request";
include('db/connection.php');
session_start();
$name=$_SESSION['user'];
// $employeetable="employee";
//	if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='vishnu')){
     $y="SELECT * FROM ".$datatable."    ORDER BY id desc";    
    //  $x="SELECT * FROM ".$employeetable."    ORDER BY id desc"; 
    //}else{
    // $y="SELECT * FROM ".$datatable."  where status='work to be started' and ses='$tsname'  ORDER BY id desc";
	// }
    $fdate=$_POST['fdate'];
$tdate=$_POST['tdate']; 

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:O1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('1576F7');
 $objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'SMTS GROUPS');
 $objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:O4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:O4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('1576F7');
        $objPHPExcel->getActiveSheet()->getStyle("A4:O4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'EMPLOYEE ACTIVITY REPORT');
 $objPHPExcel->getActiveSheet()->getStyle("A4:O4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'S No.');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Emp ID');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Emp Name');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Station ID');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Station Name');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Check-IN Location');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Check-IN Time');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Check-IN Date');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Check-OUT Location');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Check-OUT Time');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Check-OUT Date');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Last Updated Location');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Last Updated Time');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Work Done');
// $objPHPExcel->getActiveSheet()->SetCellValue('O6', 'Station ID');
// $objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Station Address');
// $objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Date');
// $objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Date');
// $objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Status');
// $objPHPExcel->getActiveSheet()->SetCellValue('O6', 'User');
$objPHPExcel->getActiveSheet()->getStyle("A6:O6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('1576F7');
       $objPHPExcel->getActiveSheet()->getRowDimension('A')->setRowHeight(9);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(19);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('p')->setWidth(20);
        
 
$objPHPExcel->getActiveSheet()->getStyle("A6:O6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysql_error());
// $sql="select * from request where empid='$empid' and date between '$fdate' and '$tdate' " ;
// $result=mysqli_query($link,$sql);
//init for fetching the DB 
// $objPHPExcel->getActiveSheet()->getStyle("A6:O6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
// $result			=	$db->query($x) or die(mysql_error());
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($ecode=$row['empid'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($scode=$row['uploadby'],'UTF-8'));
	
	$ds="select * from request where uploadby='$scode'";
	$result1=$db->query($ds) or die(mysql_error());
    // $ep="select * from employee where empid='$ecode'";
	// $result2=$ep->query($ep) or die(mysql_error());
	$row1=$result1->fetch_assoc();
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row['indid'],'UTF-8'));
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row['sname'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['loc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['time'],'UTF-8'));
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row['date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['checkoutloc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row['checkoutime'],'UTF-8'));
    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row['checkoutdate'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row['lastupdateloc'],'UTF-8'));
	// $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['inv_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($row['lastupdatedtime'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row['com'],'UTF-8'));
	// $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row['strcd'],'UTF-8'));
	// $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($row['net'],'UTF-8'));
	// $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row['status'],'UTF-8'));
	// $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row['ses'],'UTF-8'));
	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="emp report.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>