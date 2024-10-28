<?php
require 'vendor/autoload.php';

$y = "SELECT * FROM request ORDER BY id DESC";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Create a new Spreadsheet object
$objPHPExcel = new Spreadsheet();

// Styling and formatting for the spreadsheet
$objPHPExcel->getActiveSheet()->mergeCells('A1:O1');
$objPHPExcel->getActiveSheet()->getStyle("A1:O1")
    ->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('1576F7');
$objPHPExcel->getActiveSheet()->getStyle("A1:O1")
    ->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'SMTS GROUP');
$objPHPExcel->getActiveSheet()->getStyle("A1:O1")
    ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->mergeCells('A4:O4');
$objPHPExcel->getActiveSheet()->getStyle("A4:O4")
    ->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('1576F7');
$objPHPExcel->getActiveSheet()->getStyle("A4:O4")
    ->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$objPHPExcel->getActiveSheet()->setCellValue('A4', 'EMPLOYEE ACTIVITY REPORT');
$objPHPExcel->getActiveSheet()->getStyle("A4:O4")
    ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle("A6:O6")
    ->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('1576F7');
$objPHPExcel->getActiveSheet()->getStyle("A6:O6")
    ->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$objPHPExcel->getActiveSheet()->getStyle("A6:O6")
    ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
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
    $objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Last Updated Location1'); 
    $objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Last Updated Location2');
    $objPHPExcel->getActiveSheet()->SetCellValue('O6', 'Last Updated Time2');
    $objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Last Updated Location3');
    $objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'Last Updated Time3');
    $objPHPExcel->getActiveSheet()->SetCellValue('R6', 'Last Updated Location4');
    $objPHPExcel->getActiveSheet()->SetCellValue('S6', 'Last Updated Time4');
    $objPHPExcel->getActiveSheet()->SetCellValue('T6', 'Last Updated Location');
    $objPHPExcel->getActiveSheet()->SetCellValue('U6', 'Last Updated Time');
    $objPHPExcel->getActiveSheet()->SetCellValue('V6', 'Work Done');
// ... Continue setting headers for other columns (D6 to V6)
$sheet = $objPHPExcel->getActiveSheet();
// Set column widths
$sheet->getColumnDimension('A')->setWidth(9); // Set width of column A to 15
$sheet->getColumnDimension('B')->setWidth(12);
$sheet->getColumnDimension('C')->setWidth(16);
$sheet->getColumnDimension('D')->setWidth(20);
$sheet->getColumnDimension('E')->setWidth(20);
$sheet->getColumnDimension('F')->setWidth(20);
$sheet->getColumnDimension('G')->setWidth(14);
$sheet->getColumnDimension('H')->setWidth(15);
$sheet->getColumnDimension('I')->setWidth(20);
$sheet->getColumnDimension('J')->setWidth(14);
$sheet->getColumnDimension('K')->setWidth(15);
$sheet->getColumnDimension('L')->setWidth(20);
$sheet->getColumnDimension('M')->setWidth(19);
$sheet->getColumnDimension('N')->setWidth(20);
$sheet->getColumnDimension('O')->setWidth(20);
$sheet->getColumnDimension('P')->setWidth(20);
$sheet->getColumnDimension('Q')->setWidth(20);
$sheet->getColumnDimension('R')->setWidth(20);
$sheet->getColumnDimension('S')->setWidth(20);
$sheet->getColumnDimension('T')->setWidth(20);
$sheet->getColumnDimension('U')->setWidth(20);
$sheet->getColumnDimension('V')->setWidth(20);
// Create a new worksheet
$sheet = $objPHPExcel->getActiveSheet();

// Connect to the database and fetch data
$link = mysqli_connect("localhost", "a16673ai_payamath", "Payamath@2016", "a16673ai_smtsgroup");
$result = $link->query($y) or die(mysqli_error($link));

$rowCount = 7;
$i = 1;
while ($row = $result->fetch_assoc()) {
    // Populate spreadsheet with data
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($row['empid'], 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($row['uploadby'], 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row['indid'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row['sname'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row['loc'], 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row['time'], 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper($row['date'], 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper($row['checkoutloc'], 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper($row['checkoutime'], 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($row['checkoutdate'], 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($row['lastupdatedloc1'], 'UTF-8'));
    $sheet->setCellValue('M' . $rowCount, mb_strtoupper($row['lastupdatedtime1'], 'UTF-8'));
    $sheet->setCellValue('N' . $rowCount, mb_strtoupper($row['lastupdatedloc2'], 'UTF-8'));
    $sheet->setCellValue('O' . $rowCount, mb_strtoupper($row['lastupdatedtime2'], 'UTF-8'));
    $sheet->setCellValue('P' . $rowCount, mb_strtoupper($row['lastupdatedloc3'], 'UTF-8'));
    $sheet->setCellValue('Q' . $rowCount, mb_strtoupper($row['lastupdatedtime3'], 'UTF-8'));
    $sheet->setCellValue('R' . $rowCount, mb_strtoupper($row['lastupdatedloc4'], 'UTF-8'));
    $sheet->setCellValue('S' . $rowCount, mb_strtoupper($row['lastupdatedtime4'], 'UTF-8'));
    $sheet->setCellValue('T' . $rowCount, mb_strtoupper($row['lastupdateloc'], 'UTF-8'));
    $sheet->setCellValue('U' . $rowCount, mb_strtoupper($row['lastupdatedtime'], 'UTF-8'));
    $sheet->setCellValue('V' . $rowCount, mb_strtoupper($row['com'], 'UTF-8'));
    // Increment counters
    $rowCount++;
    $i++;
}

// Create a new Xlsx Writer
$writer = new Xlsx($objPHPExcel);

// Set the appropriate headers for file download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="emp_rep.xlsx"');
header('Cache-Control: max-age=0');

// Save the spreadsheet to the output
$writer->save('php://output');
exit;
?>