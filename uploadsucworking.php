<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST["submit"])) {
    $allowedFileTypes = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.oasis.opendocument.spreadsheet'];

    if (in_array($_FILES["file"]["type"], $allowedFileTypes)) {
        ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
        $month = isset($_POST['month']) ? $_POST['month'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
		
        if (empty($month) || empty($year)) {
            die("Month and Year values are required.");
        }
        
        $uploadFilePath = 'uploads/' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

        $spreadsheet = IOFactory::load($uploadFilePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();

        // Database connection settings
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'a16673ai_smtsgroup';

        // Create a database connection
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }

        // Prepare and execute insert statements for each row in the Excel sheet
        $insertedCount = 0;
        foreach ($data as $row) {
            // Ensure that $row has the same number of columns as your database table
            $columnCount = 36; // Number of columns in your data

            for ($i = 0; $i < $columnCount; $i++) {
                $columnValue = isset($row[$i]) ? $conn->real_escape_string($row[$i]) : '';
                
                // Assign the escaped value to the appropriate variable
                switch ($i) {
                    case 0: $ename = $columnValue; break;
        case 1: $empid = $columnValue; break;
        case 2: $basic = $columnValue; break;
        case 3: $others = $columnValue; break;
        case 4: $pf = $columnValue; break;
        case 5: $pt = $columnValue; break;
        case 6: $esi = $columnValue; break;
        case 7: $pfec = $columnValue; break;
        case 8: $pfes = $columnValue; break;
        case 9: $loc = $columnValue; break;
        case 10: $bank = $columnValue; break;
        case 11: $pf1 = $columnValue; break;
        case 12: $uan = $columnValue; break;
        case 13: $esi1 = $columnValue; break;
        case 14: $ac = $columnValue; break;
        case 15: $desg = $columnValue; break;
        case 16: $bonus = $columnValue; break;
        case 17: $oben = $columnValue; break;
        case 18: $doj = $columnValue; break;
        case 19: $month_ = $columnValue; break;
        case 20: $vertical = $columnValue; break;
        case 21: $days_in_month = $columnValue; break;
        case 22: $loss_of_pay = $columnValue; break;
        case 23: $gross_salary = $columnValue; break;
        case 24: $hra_and_allow = $columnValue; break;
        case 25: $earned_salary = $columnValue; break;
        case 26: $deductions = $columnValue; break;
        case 27: $epf_ee = $columnValue; break;
        case 28: $esi_ee = $columnValue; break;
        case 29: $pt_ = $columnValue; break;
        case 30: $net_pay = $columnValue; break;
        case 31: $employer_esi = $columnValue; break;
        case 32: $employer_pf = $columnValue; break;
        case 33: $ctc = $columnValue; break;
        case 34: $net_salary = $columnValue; break;
        case 35: $in_words = $columnValue; break;
        default: break;
                    // ... (same as before)
                }
            }
                
            $q = "SELECT * FROM salarymonthwise WHERE month_='$month' AND year='$year' AND email='$empid'";
            $p = mysqli_query($conn, $q) or die(mysqli_error($conn));
            $c = mysqli_num_rows($p);
            $r = mysqli_fetch_array($p);
            
            if ($c > 0) {
                // Perform the update operation
                $m = "UPDATE salarymonthwise SET name ='" . addslashes($ename) . "', basic='$basic', others='$others', pf='$pf', pt='$pt', esi='$esi', pfec='$pfec',
                        pfes='$pfes', location='$loc', bank_name='$bank', pf_no='$pf1', pf_uan='$uan', esi_no1='$esi1', ac_num='$ac', designation='$desg', bonus='$bonus', oben='$oben', month_='$month' ,vertical='$vertical' ,days_in_month='$days_in_month' ,loss_of_pay='$loss_of_pay' ,gross_salary='$gross_salary' ,hra_and_allow='$hra_and_allow' ,
                        earned_salary='$earned_salary' ,deductions='$deductions' ,epf_ee='$epf_ee' ,esi_ee='$esi_ee' ,pt_='$pt_' ,net_pay='$net_pay' ,employer_esi='$employer_esi' ,employer_pf='$employer_pf' ,ctc='$ctc' ,net_salary='$net_salary' ,in_words='$in_words' WHERE email='$empid' AND month_='$month' AND year='$year'";
                $conn->query($m);
            } else {
                if (!empty($ename) && ($ename != 'Name')) {
                    // Perform the insert operation
                    $query = "INSERT INTO salarymonthwise(name,email,basic,others,month,year,pf,pt,esi,pfec,pfes,location,bank_name,pf_no,pf_uan,esi_no1,ac_num,designation,bonus,oben,doj,month_,vertical,days_in_month,loss_of_pay,gross_salary,hra_and_allow,earned_salary,deductions,epf_ee,esi_ee,pt_,net_pay,employer_esi,employer_pf,ctc,net_salary,in_words)
                            VALUES('" . $ename . "','" . $empid . "','" . addslashes($basic) . "','" . $others . "','" . $month . "','" . $year . "','" . $pf . "','" . $pt . "','" . $esi . "',
                            '" . $pfec . "','" . $pfes . "','" . $loc . "','" . $bank . "','" . $pf1 . "','" . $uan . "','" . $esi1 . "','" . $ac . "','" . $desg . "','" . $bonus . "','" . $oben . "','" . $doj . "','" . $month_ . "','" . $vertical . "','" . $days_in_month . "','" . $loss_of_pay . "','" . $gross_salary . "','" . $hra_and_allow . "','" . $earned_salary . "','" . $deductions . "','" . $epf_ee . "','" . $esi_ee . "','" . $pt_ . "','" . $net_pay . "','" . $employer_esi . "','" . $employer_pf . "','" . $ctc . "','" . $net_salary . "','" . $in_words . "')";
                    $conn->query($query);
                }
            }
            
            $insertedCount++;
        }

        $conn->close();

        echo "Imported $insertedCount records successfully.";
    } else {
        echo "Invalid File Type. Upload Excel File.";
    }
}
?>
