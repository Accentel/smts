<?php
include('dbconnection/connection.php');
$rid=$_REQUEST['id1'];
$q=$_REQUEST['q'];
$k=mysqli_query($link,"update odqot_bill set status='Un Paid' where id='$rid'") or die(mysqli_error($link));
	$s=mysqli_query($link,"update add_odqot set status='Payment Pending' where quet_num='$q'");
if($k){
        	print "<script>";
			print "alert('Invoice Sucessfully Updated');";
			print "self.location='odbill_list31.php';";
			print "</script>";
}

?>