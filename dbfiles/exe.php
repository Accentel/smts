<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet autoload file

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new PhpSpreadsheet instance
$spreadsheet = new Spreadsheet();

// Create a new worksheet
$sheet = $spreadsheet->getActiveSheet();

// Set cell values
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('A2', '1');
$sheet->setCellValue('B2', 'John');
$sheet->setCellValue('A3', '2');
$sheet->setCellValue('B3', 'Jane');
$sheet->setCellValue('A4', '3');
$sheet->setCellValue('B4', 'Doe');

// Create a writer for Excel (Xlsx)
$writer = new Xlsx($spreadsheet);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="sample.xlsx"');
header('Cache-Control: max-age=0');

// Write the spreadsheet data to the output stream
$writer->save('php://output');
?>


<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet autoload file

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include_once('config.php');
include('db/connection.php');
session_start();


$name = $_SESSION['user'];

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['filter'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
}

$y = "SELECT * FROM request WHERE datecheck BETWEEN '$fromdate' AND '$todate' ORDER BY id DESC";

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:V1');
$sheet->getStyle('A1:V1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('1576F7');
$sheet->getStyle('A1:V1')->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'SMTS GROUPS');
$sheet->getStyle('A1:V1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->mergeCells('A4:V4');
$sheet->getStyle('A4:V4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('1576F7');
$sheet->getStyle('A4:W4')->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', 'EMPLOYEE ACTIVITY REPORT');
$sheet->getStyle('A4:V4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('C5', 'FROM DATE:');
$sheet->setCellValue('E5', 'TO DATE:');
$sheet->setCellValue('D5', $fromdate);
$sheet->setCellValue('F5', $todate);
$sheet->setCellValue('A6', 'S No.');
$sheet->setCellValue('B6', 'Emp ID');
$sheet->setCellValue('C6', 'Emp Name');
$sheet->setCellValue('D6', 'Station ID');
$sheet->setCellValue('E6', 'Station Name');
$sheet->setCellValue('F6', 'Check-IN Location');
$sheet->setCellValue('G6', 'Check-IN Time');
$sheet->setCellValue('H6', 'Check-IN Date');
$sheet->setCellValue('I6', 'Check-OUT Location');
$sheet->setCellValue('J6', 'Check-OUT Time');
$sheet->setCellValue('K6', 'Check-OUT Date');
$sheet->setCellValue('L6', 'Last Updated Location1');
$sheet->setCellValue('M6', 'Last Updated Time1');
$sheet->setCellValue('N6', 'Last Updated Location2');
$sheet->setCellValue('O6', 'Last Updated Time2');
$sheet->setCellValue('P6', 'Last Updated Location3');
$sheet->setCellValue('Q6', 'Last Updated Time3');
$sheet->setCellValue('R6', 'Last Updated Location4');
$sheet->setCellValue('S6', 'Last Updated Time4');
$sheet->setCellValue('T6', 'Last Updated Location');
$sheet->setCellValue('U6', 'Last Updated Time');
$sheet->setCellValue('V6', 'Work Done');

$sheet->getStyle('A6:V6')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('1576F7');
$sheet->getRowDimension(6)->setRowHeight(9);
$sheet->getColumnDimension('B')->setWidth(16);
$sheet->getColumnDimension('C')->setWidth(12);
$sheet->getColumnDimension('D')->setWidth(21);
$sheet->getColumnDimension('E')->setWidth(20);
$sheet->getColumnDimension('F')->setWidth(20);
$sheet->getColumnDimension('G')->setWidth(14);
$sheet->getColumnDimension('H')->setWidth(15);
$sheet->getColumnDimension('I')->setWidth(20);
$sheet->getColumnDimension('J')->setWidth(14);
$sheet->getColumnDimension('K')->setWidth(15);
$sheet->getColumnDimension('L')->setWidth(20);
$sheet->getColumnDimension('M')->setWidth(14);
$sheet->getColumnDimension('N')->setWidth(20);
$sheet->getColumnDimension('O')->setWidth(14);
$sheet->getColumnDimension('P')->setWidth(20);
$sheet->getColumnDimension('Q')->setWidth(14);
$sheet->getColumnDimension('R')->setWidth(20);
$sheet->getColumnDimension('S')->setWidth(14);
$sheet->getColumnDimension('T')->setWidth(20);
$sheet->getColumnDimension('U')->setWidth(14);
$sheet->getColumnDimension('V')->setWidth(20);
$sheet->getColumnDimension('W')->setWidth(14);

$sheet->getStyle('A6:V6')->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$result = $db->query($y) or die(mysqli_error($link));
$i = 1;
$rowCount = 7;

while ($row = $result->fetch_assoc()) {
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
    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="emp_report.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>