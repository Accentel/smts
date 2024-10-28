<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
include'dbfiles/uqry_emp.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include'template/headerfile.php'; ?>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
   
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <title> Salary Slip </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php 
         
         ob_start();?>

  <!-- <link rel="stylesheet" href="salaryslip1.css"> -->
  <style>
table{
width: 100%;
margin:auto;
border-collapse:collapse;
border: 1px solid black;
}
table td{line-height:25px;padding-left:15px;}
table th{background-color:#ffffff; color:#363636;}
th, td {
  padding: 5px;
}
th {
  text-align: left;
}
p.double {border-style: double;}
div {
  border: 2px solid black;
  margin: 50px 50px 50px 50px;
  background-color: white;
  border-style: double;
}
.myImage {
        width: 280px;
        height: 100px;
        object-fit: none;
        object-position: right top;
        margin-left: 10px;
        margin-top: 20px;
}
.styled-button-2 {
	 background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
#smts
{
    vertical-align: top;
    float: right;
    text-align: left;
    margin-top: 36px;
    margin-right:10px;

}
.box-1{
  background-color: white;
  border-width: 5px;
  border-color: black;
  border-style: double;
}

</style>


<script language="JavaScript" type="text/javascript">


function prnt(){
	

document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>
</head>
<body class="no-skin">
<!-- <link rel="stylesheet" href="salaryslip1.css"> -->

<div class="box-1">
    <span>
    <img 
    id="myImage"
  src="smts.jpg" alt="smts logo" width="400" height="100" ></span>
<span style="text-align:right;">
    
<text id="smts"; height="100px" style="background-color:#ffffff;color:#000000; text-align:left;font-size:15px; font-weight:600;">
Sri Manjunath Technical Services </br></br>
MCH Number 8-3-1113/2D, 3rd Floor, Sai Sadan Apartments,</br> Kesava Nagar, Srinagar Colony, Hyderabad-500073
</text> </span>
<center> <p><b> PAY SLIP</b> </p></center>
<table border="1">
<tr>
<th>Emp Code :</th>
<td></td>
<th>Emp Name :</th>
<td></td>
</tr>
<tr>
<th>Work Location :</th>
<td></td>
<th>Designation :</th>
<td></td>
</tr>
<tr>
<th>Month :</th>
<td></td>
<th>Date of Joining :</th>
<td></td>
</tr>
<tr>
<th>BANK :</th>
<td></td>
<th>Vertical :</th>
<td></td>
</tr>
<tr>
<th>Days In Month :</th>
<td></td>
<th>Bank A/C No :</th>
<td></td>
</tr>
<tr>
<th>Loss of Pay :</th>
<td></td>
<th>ESI No :</th>
<td></td>
</tr>
<tr>
<th>UAN :</th>
<td></td>
<th>EPF NO :</th>
<td></td>
</tr>
</table>
<tr></tr>
<br/>
<table border="1">
<tr>
<th>Gross salary :</th><td></td></tr>
<tr>
<tr>
<tr>
<th>Basics :</th><td></td></tr>
<tr>
<tr>
<th>HRA & Other Allowances :</th><td></td></tr>
<tr>
<tr>
<th>Earned salary :</th><td></td></tr>
<th>Deductions :</th><td></td></tr>
<th>EPF EE Share :</th><td></td></tr>
<th>ESI EE Share :</th><td></td></tr>
<th>PT :</th><td></td></tr>
<th>Net Pay :</th><td></td></tr>
<th>Employer ESI :</th><td></td></tr>
<th>Employer PF :</th><td></td></tr>
<th>CTC (Cost to Company) :</th><td></td></tr>
</table>
<br/><br/>
<table border="1">
<th>Net Salary :</th><td></td></tr>
<th>In Words (Rupees) :</th><td></td></tr>
</table><br/><br/>
<text height="100px" style="background-color:#ffffff;color:#000000; font-size:15px; font-weight:600;">
•	Computer Generated Payslip And Signature Is not Required </br></br>


</div>
       <!-- <div align="center" style="border:#CC6666">
								
                                <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> 
                                <input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/>
                                                      </div>





</div> -->

</body>
<?php mysqli_close($link); ?>
</html>
<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);
    $qtno="employeeinfo.pdf";
    $body=ob_get_clean();
$body=iconv("UTF-8","UTF-8//IGNORE",$body);

include('mpdf/mpdf.php');
$mpdf=new \mPDF('c','A4','','',10,10,10,10,0,0);
$mpdf->writeHTML($body);
$mpdf->Output($qtno,'F');
$stylesheet = file_get_contents('style.css');

$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);

echo  "<script type=\"text/javascript\"> 
 

   location.href = 'download.php?qt=$qtno';
   setTimeout(\"DoTheRedirect('salary.php')\",parseInt(2*1000));
function DoTheRedirect(url) { window.location=url; }

</script>";
	

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>