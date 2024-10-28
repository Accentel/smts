<?php
require 'vendor/autoload.php'; // Include the PhpSpreadsheet classes

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add some data to the cells
$sheet->setCellValue('A1', 'Hello');
$sheet->setCellValue('B1', 'World');

// Create a new Xlsx Writer
$writer = new Xlsx($spreadsheet);

// Set headers for file download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="example.xlsx"');
header('Cache-Control: max-age=0');

// Save the spreadsheet to the output
$writer->save('php://output');
?>
