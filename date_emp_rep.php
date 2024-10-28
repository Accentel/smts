<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
 include('PHPExcel-1.8/Classes/PHPExcel.php');
 include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

include('db/connection.php');
session_start();
 $empid=$_SESSION['empid'];


$fileName = "Reports.xls"; 
header("Content-Type: application/xls");
header("Content-disposition: attachment; filename=\"$fileName\"");
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate']; 

 
$output ='<div class="container-fluid">';
$output.='<table border="1" >
                 <tr>
                 <th rowspan="2" style="background-color:skyblue">S.NO</th>
                 <th rowspan="2" style="background-color:skyblue">Date</th>
                 <th rowspan="2" style="background-color:skyblue">Order id</th>
                 <th rowspan="2" style="background-color:skyblue">Items</th>
                 <th rowspan="2" style="background-color:skyblue">Payment Mode</th>
                 <th rowspan="2" style="background-color:skyblue">Price</th>
                 <th rowspan="2" style="background-color:skyblue">Quantity</th>
                 <th rowspan="2" style="background-color:skyblue">Total price</th>
                 </tr>
                 <tr></tr>';
               $sql="select * from request where empid='$empid' and date between '$fdate' and '$tdate' " ;
                 $result=mysqli_query($link,$sql);
                
                 if($result){
                  $sn=1;
                   
                    while($row = mysqli_fetch_array($result)){
                    
                       $date=$row['timeoforder'];
                        $orderid =$row['orderid'];
                        $itemname =$row['menuname'];
                        $qty =$row['itemcount'];
                        $price =$row['price'];
                        $totalprice=$qty*$price;
                        $paymentmode=$row['payment_mode'];
                        $shopid=$row['shopid'];
                                  
            
                $output .= '                   
                            <tr>
                            <td>'.$sn.'</td>
                            <td>' .$date.'</td>
                            <td>'.$orderid.'</td>
                            <td>'.$itemname.'</td>
                            <td>'.$paymentmode.'</td>
                            <td>'.$price.'</td>                          
                            <td>'.$qty.'</td>
                            <td>'.$totalprice.'</td>
                             
                          ';
                            $sn++;
                          }}

                           

    $output .=' </tr></table>
    </br>
    <table border="1">
    <tr></tr>
    <tr><td colspan="6">Amount collected by Cash</td>';
    $sq="select count(payment_mode) as cprice  from orders where shopid='$shopid' and payment_mode='Cash' and timeoforder between '$fdate' and '$tdate' ";
    $re=mysqli_query($link,$sq);
    $row = mysqli_fetch_array($re);
    if($re){
      $cprice=$row['cprice'];
      $output .=' <td>'.$cprice.'</td>';
  }

   
    $sq="select SUM(price*itemcount) as cashprice  from orders where shopid='$shopid' and payment_mode='Cash' and timeoforder between '$fdate' and '$tdate' ";
    $re=mysqli_query($link,$sq);
    $row = mysqli_fetch_array($re);
    if($re){
      $cashprice=$row['cashprice'];
      $output .=' <td>'.$cashprice.'</td>';
  }
                          
  
  
  $output .=' </tr>
  <tr><td colspan="6">Amount collected by UPI</td>';
  $sq="select count(payment_mode) as uprice  from orders where shopid='$shopid' and payment_mode='UPI' and timeoforder between '$fdate' and '$tdate' ";
  $re=mysqli_query($link,$sq);
  $row = mysqli_fetch_array($re);
  if($re){
    $uprice=$row['uprice'];
    $output .=' <td>'.$uprice.'</td>';
}
  $sq="select SUM(price*itemcount) as upiprice  from orders where shopid='$shopid' and payment_mode='UPI' and timeoforder between '$fdate' and '$tdate' ";
  $re=mysqli_query($link,$sq);
  $row = mysqli_fetch_array($re);
  if($re){
    $upiprice=$row['upiprice'];
    $output .=' <td>'.$upiprice.'</td>';
}
  
  
  
$output .=' 
  </tr>
  <tr><td colspan="6">Amount collected by Card</td>';
  $sq="select count(payment_mode) as cdprice  from orders where shopid='$shopid' and payment_mode='Card' and timeoforder between '$fdate' and '$tdate' ";
  $re=mysqli_query($link,$sq);
  $row = mysqli_fetch_array($re);
  if($re){
    $cdprice=$row['cdprice'];
    $output .=' <td>'.$cdprice.'</td>';
}
  $s="select SUM(price*itemcount) as cardprice  from orders where shopid='$shopid' and  payment_mode='Card' and timeoforder between '$fdate' and '$tdate' ";
  $r=mysqli_query($link,$s);
  $row = mysqli_fetch_array($r);
  if($r){
    $cardprice=$row['cardprice'];
    $output .=' <td>'.$cardprice.'</td>';
}
  $tprice=$cashprice+$upiprice+$cardprice;
  $output .='</tr>
  <tr>
  <td colspan="7" align="center"><b>Totalprice</b></td>
  <td><b>'.$tprice.'</b></td>
</table>
</div>';
                  
            echo $output;
?>

