<?php
include('dbconnection/connection.php');
$id=$_REQUEST['id'];
$k=mysqli_query($link,"delete from klpayment where id='$id'") or die(mysqli_error($link));
if($k){
	print "<script>";
	print "alert('Record Deleted Sucessfully');";
	print "self.location='klbill_list4.php';";
	print "</script>";
	
}
mysqli_close($link);
?>