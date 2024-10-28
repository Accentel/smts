<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST["submit"])) {
    $allowedFileTypes = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.oasis.opendocument.spreadsheet'];

    if (in_array($_FILES["file"]["type"], $allowedFileTypes)) {
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
            if (count($row) == 36) {
                // $ename = $conn->real_escape_string($row[0]);
                // $empid = $conn->real_escape_string($row[1]);
                // $basic = $conn->real_escape_string($row[2]);
                // $others = $conn->real_escape_string($row[3]);
                $ename = $conn->real_escape_string($row[0]);
                $empid = $conn->real_escape_string($row[1]);
                $basic = $conn->real_escape_string($row[2]);
                $others = $conn->real_escape_string($row[3]);
                $pf = $conn->real_escape_string($row[4]);
                $pt = $conn->real_escape_string($row[5]);
                $esi = $conn->real_escape_string($row[6]);
                $pfec = $conn->real_escape_string($row[7]);
                $pfes = $conn->real_escape_string($row[8]);
                $loc = $conn->real_escape_string($row[9]);
                $bank = $conn->real_escape_string($row[10]);
                $pf1 = $conn->real_escape_string($row[11]);
                $uan = $conn->real_escape_string($row[12]);
                $esi1 = $conn->real_escape_string($row[13]);
                $ac = $conn->real_escape_string($row[14]);
                $desg = $conn->real_escape_string($row[15]);
                $bonus = $conn->real_escape_string($row[16]);
                $oben = $conn->real_escape_string($row[17]);
                $doj = $conn->real_escape_string($row[18]);
                $month_ = $conn->real_escape_string($row[19]);
                $vertical = $conn->real_escape_string($row[20]);
                $days_in_month = $conn->real_escape_string($row[21]);
                $loss_of_pay = $conn->real_escape_string($row[22]);
                $gross_salary = $conn->real_escape_string($row[23]);
                $hra_and_allow = $conn->real_escape_string($row[24]);
                $earned_salary = $conn->real_escape_string($row[25]);
                $deductions = $conn->real_escape_string($row[26]);
                $epf_ee = $conn->real_escape_string($row[27]);
                $esi_ee = $conn->real_escape_string($row[28]);
                $pt_ = $conn->real_escape_string($row[29]);
                $net_pay = $conn->real_escape_string($row[30]);
                $employer_esi = $conn->real_escape_string($row[31]);
                $employer_pf = $conn->real_escape_string($row[32]);
                $ctc = $conn->real_escape_string($row[33]);
                $net_salary = $conn->real_escape_string($row[34]);
                $in_words = $conn->real_escape_string($row[35]);
                
                $q = "SELECT * FROM salarymonthwise WHERE month='$month' AND year='$year' AND email='$empid'";
$p = mysqli_query($link, $q) or die(mysqli_error($link));
$c = mysqli_num_rows($p);
$r = mysqli_fetch_array($p);
$month1 = addslashes($r['month']) . "<br/>";
$year1 = $r['year'] . "<br/>";
$email1 = $r['email'] . "<br/>";
$month1 = $month;
$year1 = $year;
$email1 = $empid;

if ($c > 0) {
    $m = "UPDATE salarymonthwise SET name ='" . addslashes($ename) . "', basic='$basic', others='$others', pf='$pf', pt='$pt', esi='$esi', pfec='$pfec',
        pfes='$pfes', location='$loc', bank_name='$bank', pf_no='$pf1', pf_uan='$uan', esi_no1='$esi1', ac_num='$ac', designation='$desg', bonus='$bonus', oben='$oben', month_='$month_' ,vertical='$vertical' ,days_in_month='$days_in_month' ,loss_of_pay='$loss_of_pay' ,gross_salary='$gross_salary' ,hra_and_allow='$hra_and_allow' ,
        earned_salary='$earned_salary' ,deductions='$deductions' ,epf_ee='$epf_ee' ,esi_ee='$esi_ee' ,pt_='$pt_' ,net_pay='$net_pay' ,employer_esi='$employer_esi' ,employer_pf='$employer_pf' ,ctc='$ctc' ,net_salary='$net_salary' ,in_words='$in_words' WHERE email='$email1' AND month='$month1' AND year='$year1'";
    $link->query($m);
}
else {
    if (($ename != 'Name') && ($ename != '')) {
        $query = "INSERT INTO salarymonthwise(name,email,basic,others,month,year,pf,pt,esi,pfec,pfes,location,bank_name,pf_no,pf_uan,esi_no1,ac_num,designation,bonus,oben,doj,month_,vertical,days_in_month,loss_of_pay,gross_salary,hra_and_allow,earned_salary,deductions,epf_ee,esi_ee,pt_,net_pay,employer_esi,employer_pf,ctc,net_salary,in_words)
            VALUES('" . $ename . "','" . $empid . "','" . addslashes($basic) . "','" . $others . "','" . $month . "','" . $year . "','" . $pf . "','" . $pt . "','" . $esi . "',
            '" . $pfec . "','" . $pfes . "','" . $loc . "','" . $bank . "','" . $pf1 . "','" . $uan . "','" . $esi1 . "','" . $ac . "','" . $desg . "','" . $bonus . "','" . $oben . "','" . $doj . "','" . $month_ . "','" . $vertical . "','" . $days_in_month . "','" . $loss_of_pay . "','" . $gross_salary . "','" . $hra_and_allow . "','" . $earned_salary . "','" . $deductions . "','" . $epf_ee . "','" . $esi_ee . "','" . $pt_ . "','" . $net_pay . "','" . $employer_esi . "','" . $employer_pf . "','" . $ctc . "','" . $net_salary . "','" . $in_words . "')";
        $link->query($query);
    }
}

            }
        }

        $conn->close();

        echo "Imported $insertedCount records successfully.";
    } else {
        echo "Invalid File Type. Upload Excel File.";
    }
}
?>
