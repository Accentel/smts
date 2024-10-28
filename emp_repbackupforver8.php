<?php
// include_once('config.php');
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
$objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('1576F7');
$objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'SMTS GROUP');
$objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->mergeCells('A4:O4');
$objPHPExcel->getActiveSheet()->getStyle("A4:O4")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('1576F7');
$objPHPExcel->getActiveSheet()->getStyle("A4:O4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$objPHPExcel->getActiveSheet()->setCellValue('A4', 'EMPLOYEE ACTIVITY REPORT');
$objPHPExcel->getActiveSheet()->getStyle("A4:O4")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle("A6:O6")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('1576F7');
$objPHPExcel->getActiveSheet()->getStyle("A6:O6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$objPHPExcel->getActiveSheet()->getStyle("A6:O6")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
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
// ... Continue setting headers for other columns (D6 to V6)
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
    // ... Continue setting values for other columns (D to V)
    
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
