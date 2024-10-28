<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Notice Period</title>
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
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
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
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:120px;
	font:"Times New Roman", Times, serif;
	font-size:12px;
  
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
	
}
 .text-line {
        background-color: transparent;
        color: #000;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid red 1px;
        padding: 8px 10px;
		width:200px;
    }
    
    .pageborder {
      position:relative;
      left: 0;
      right: 2px;
      top: 0;
      bottom: 0;
      border: 2px solid black;
    }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> 
          <input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/>
								</div>
<div class="book">
 <div class="page">
      <div class="pageborder">
        
       
         
        <?php 
			include('dbconnection/connection.php');
            $id=$_GET['id'];
            $state=$_GET['state'];
		$q=mysqli_query($link,"select * from emp where empid='$id'") or die(mysqli_error($link));
		$row=mysqli_fetch_array($q);
		$start_date=$row['start_date'];
		$name=$row['emp_name'];
        $gender=$row['gender'];
        $fathername=$row['fname'];
		$address=$row['address'];
		$state=$row['state'];
		$last_date=$row['last_date'];		
		$category=$row['appointmentcategory'];
	    $desig=$row['designation'];
	    $reason1=$row['reason1']; 
        $reason2=$row['reason2'];
         $reason3=$row['reason3'];
          $reason4=$row['reason4'];
	  
	
		 ?>
		 <?php
		 	//include('dbconnection/connection.php');
		 
	
		 ?>
	
		 				
    <img src="images/apjyothi.jpg" style="width:100% ">
          <h2 align="center"><u>Notice Period</u></h2>
        <div>

        <p>Date:<mark><?php echo date('d-m-Y'); ?></mark></p>
        <p>To:<br/>

       <?php 
        if($gender=="Male" or $gender=="MALE" or $gender=="male"){
           
            echo "Mr.";
        }
        elseif($gender=="female" or $gender=="FEMALE" or $gender=="Female"){
            
            echo "Mrs.";
        }
        ?><?php echo $name; ?><br/>
        <?php 
        if($gender=="Male" or $gender=="MALE" or $gender=="male"){
           
            echo "S/o.".$fathername;
        }
        elseif($gender=="female" or $gender=="FEMALE" or $gender=="Female"){
            
            echo "D/o.".$fathername;
        }

?><br/>
        <?php echo $address; ?></p>
        <p>From:<br/>
<?php  $state=$_GET['state'];
            $sq=mysqli_query($link,"select * from organization") or die(mysqli_error($link));
		$row1=mysqli_fetch_array($sq); 
       
       
        if($state=="AP"){
            $address=$row1['ap_address'];
            }
            elseif($state=="TS"){
            $address=$row1['tg_address'];
            }
            elseif($state=="KL"){
            $address=$row1['kl_address'];
            }   
            elseif($state=="TN"){
            $address=$row1['tn_address'];
            }   
            elseif($state=="KN"){
            $address=$row1['kn_address'];
            } 
            elseif($state=="OD"){
                $address=$row1['od_address'];
                } 
            $vendor_name=$row1['vendor_name'];    
        echo $vendor_name; 
        echo "<br/>";
        echo $address;
        ?></p>
           <p>Dear <?php echo $name; ?> - <?php if ($row['appointmentcategory'] === 'sup') {
                                                     echo 'Supervisor,';
                                                    } else if ($row['appointmentcategory'] === 'tm') {
                                                        echo 'Technical Manager,';
                                                    } else if ($row['appointmentcategory'] === 'mis') {
                                                        echo 'MIS Executive,';
                                                    } else if ($row['appointmentcategory'] === 'tech') {
                                                        echo 'Technician,';
                                                    }
                                                    ?> </p>
           <p>Sub: Issue of notice period-Reg.</p>
           <p>This is to inform you that company have taken decision to serve the notice period of <?php
           $days = (strtotime($last_date) - strtotime($start_date))/(60*60*24); 
            if(floor($days)==30 or floor($days)==31){
                echo "1 month";
            }
            else{
                echo floor($days)." days";
            } ?> based on the below points. </p>
          <p>&nbsp;&nbsp;&nbsp;<mark><i class="fa fa-arrow-right"></i>&nbsp;<?php echo $reason1; ?></mark></p>
                 <?php 
                 if($reason2!=''){ ?>
                 <p> &nbsp;&nbsp;&nbsp;<mark><i class="fa fa-arrow-right"></i>&nbsp;<?php echo $reason2; ?> </mark> </p><?php } ?>
                 <?php 
                 if($reason3!=''){ ?>
                <p>&nbsp;&nbsp;&nbsp;<mark><i class="fa fa-arrow-right"></i>&nbsp;<?php echo $reason3; ?></mark></p><?php } ?>
                  
                <?php 
                 if($reason4!=''){ ?>
                 <p>&nbsp;&nbsp;&nbsp;<mark><i class="fa fa-arrow-right"></i>&nbsp;<?php echo $reason4; ?></mark></p><?php } ?>

                   <p>You will closure of office hours w.e.f. 
                    <mark><?php echo $startdate=date("d-m-Y", strtotime($start_date)); ?></mark> and the last working day will be the <br/>
                   <mark>
                    <?php 
                   echo $lastdate= date("d-m-Y", strtotime($last_date)); ?></mark></p>
        <p>Thus a notice as a prior intimation is given to you.</p>
           <p>Thanking you,</p>
           <p>Yours Truly</p><br/> 
           <p style="text-align:center"><b>****</b>END<b>*****</b></p> 
           
           
          <br/><br/><br/><br/>
	   </div>
        </div>
        </div>
        </div>
</body>
</html>