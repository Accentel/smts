<?php
define("HOST_NAME1", "localhost:3307");
define("USER1", "a16673ai_payamath");
define("PASSWORD1", "Payamath@2016");
define("DB1", "a16673ai_smtsgroup");
$link3=mysqli_connect(HOST_NAME1,USER1,PASSWORD1,DB1);
$link1=mysqli_connect(HOST_NAME1,USER1,PASSWORD1,DB1);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);
?>

                  