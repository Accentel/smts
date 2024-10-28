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
  <title> Salary Slip</title>
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
  padding: 10px;
}
#myImage {
        width: 280px;
        height: 100px;
        object-fit: none;
        object-position: right top;
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
    text-align: left;
    margin-top: 25px;
    margin-left: 65%;

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


      <div class="row ">
  
          
                <img 
                id="myImage"
              src="smts.jpg" alt="smts logo" width="300" height="100" >
            <p id="smts"; height="100px" style="background-color:#ffffff;color:#000000; font-size:12px; font-weight:430; margin-top:-100px">
            <b>Sri Manjunath Technical Services</b><br>
            MCH Number 8-3-1113/2D, 3rd Floor, Sai Sadan Apartments,<br> Kesava Nagar, Srinagar Colony, Hyderabad-500073
            </p> 
             <h4 style="text-align: center;"><b> PAY SLIP</b> </h4>
   
    

    <table border="1" style="width:100%; text-align:left">
    <tr>
    <th>Emp Code :</th>
    <td>ACTS3231</td>
    <th>Emp Name :</th>
    <!-- <td><?php echo $emp_name; ?></td> -->
    <td>Syed Omer Ali</td>
    </tr>
    <tr>
    <th>Work Location :</th>
    <td>Hyderabad</td>
    <th>Designation :</th>
    <td>Software</td>
    </tr>
    <tr>
    <th>Month :</th>
    <td>June</td>
    <th>Date of Joining :</th>
    <td>01-06-2023</td>
    </tr>
    <tr>
    <th>BANK :</th>
    <td>HDFC Bank</td>
    <th>Vertical :</th>
    <td>60000</td>
    </tr>
    <tr>
    <th>Days In Month :</th>
    <td>30</td>
    <th>Bank A/C No :</th>
    <td>312585134</td>
    </tr>
    <tr>
    <th>Loss of Pay :</th>
    <td>0</td>
    <th>ESI No :</th>
    <td>665656565</td>
    </tr>
    <tr>
    <th>UAN :</th>
    <td>JKHJK5235435</td>
    <th>EPF NO :</th>
    <td>31235124</td>
    </tr>
    </table>
    <tr></tr>
    <br/>
    <table border="1" style="width:100%; text-align:left">
    <tr>
    <th>Gross salary :</th><td>354546</td></tr>
    <tr>
    <th>Basics :</th><td>3553153</td></tr>
    <tr>
    <tr>
    <th>HRA & Other Allowances :</th><td>8468522</td></tr>
    <tr>
    <tr>
    <th>Earned salary :</th><td>65421564645</td></tr>
    <tr>
    <th>Deductions :</th><td>86482</td></tr>
    <tr>
    <th>EPF EE Share :</th><td>546464</td></tr>
    <tr>
    <th>ESI EE Share :</th><td>864351431</td></tr>
    <tr>
    <th>PT :</th><td>44134</td></tr>
    <tr>
    <th>Net Pay :</th><td>684864164</td></tr>
    <tr>
    <th>Employer ESI :</th><td>366455</td></tr>
    <tr>
    <th>Employer PF :</th><td>555335</td></tr>
    <tr>
    <th>CTC (Cost to Company) :</th><td>64864521</td></tr>
    </table>
    <br/>
    <table border="1" style="width:100%; text-align:left">
    <tr>
    <th style="text-align:left">Net Salary :</th><td>354546</td></tr>
    <tr>
    <th style="text-align:left">In Words (Rupees) :</th><td>3553153</td></tr>
    </table><br/><br/>
    <text height="100px" style="background-color:#ffffff;color:#000000; font-size:15px; font-weight:600;">
    •	Computer Generated Payslip And Signature Is not Required </br></br>
    
    
</div>

    	
   

       
           
          
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
    $qtno="salarystatement.pdf";
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