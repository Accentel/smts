<?php
//include('config.php');
define("HOST_NAME","localhost:3307");
define("USER","a16673ai_payamath");
define("PASSWORD","Payamath@2016");
define("DB","a16673ai_smtsgroup");
$link=mysqli_connect(HOST_NAME,USER,PASSWORD,DB);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);
?>