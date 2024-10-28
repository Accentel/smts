<?php //include('config.php');
include('dbconnection/connectionconcept.php');
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
//require('db_config.php');
	
if(isset($_POST['submit'])){
	$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	if(in_array($_FILES["file"]["type"],$mimes)){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		  $month=$_POST['month'];
		  $year=$_POST['year'];
		$uploadFilePath = 'upload/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());

		 "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
		$html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $ename = isset($Row[0]) ? $Row[0] : '';
				 $empid = isset($Row[1]) ? $Row[1] : '';
				$basic = isset($Row[2]) ? $Row[2] : '';
				$others = isset($Row[3]) ? $Row[3] : '';
				$pf = isset($Row[4]) ? $Row[4] : '';
				$pt = isset($Row[5]) ? $Row[5] : '';
				$esi = isset($Row[6]) ? $Row[6] : '';
				$pfec = isset($Row[7]) ? $Row[7] : '';
				$pfes = isset($Row[8]) ? $Row[8] : '';
				$loc = isset($Row[9]) ? $Row[9] : '';
				$bank = isset($Row[10]) ? $Row[10] : '';
				$pf1 = isset($Row[11]) ? $Row[11] : '';
				$uan = isset($Row[12]) ? $Row[12] : '';
				$esi1 = isset($Row[13]) ? $Row[13] : '';
				$ac = isset($Row[14]) ? $Row[14] : '';
				$desg = isset($Row[15]) ? $Row[15] : '';
				$bonus = isset($Row[16]) ? $Row[16] : '';
				$oben = isset($Row[17]) ? $Row[17] : '';
				$doj = isset($Row[18]) ? $Row[18] : '';
				$month_ = isset($Row[19]) ? $Row[19] : '';
				$vertical = isset($Row[20]) ? $Row[20] : '';
				$days_in_month = isset($Row[21]) ? $Row[21] : '';
				$loss_of_pay = isset($Row[22]) ? $Row[22] : '';
				$gross_salary = isset($Row[23]) ? $Row[23] : '';
				$hra_and_allow = isset($Row[24]) ? $Row[24] : '';
				$earned_salary = isset($Row[25]) ? $Row[25] : '';
				$deductions = isset($Row[26]) ? $Row[26] : '';
				$epf_ee = isset($Row[27]) ? $Row[27] : '';
				$esi_ee = isset($Row[28]) ? $Row[28] : '';
				$pt_ = isset($Row[29]) ? $Row[29] : '';
				$net_pay = isset($Row[30]) ? $Row[30] : '';
				$employer_esi = isset($Row[31]) ? $Row[31] : '';
				$employer_pf = isset($Row[32]) ? $Row[32] : '';
				$ctc = isset($Row[33]) ? $Row[33] : '';
				$net_salary = isset($Row[34]) ? $Row[34] : '';
				$in_words = isset($Row[35]) ? $Row[35] : '';
				
			$html.="<td>".$i."</td>";
				 $html.="<td>".$ename."</td>";
				$html.="<td>".$empid."</td>";
				$html.="<td>".$basic."</td>";
				$html.="<td>".$others."</td>";
				$html.="<td>".$pf."</td>";
				$html.="<td>".$pt."</td>";
				$html.="<td>".$esi."</td>";
				$html.="<td>".$pfec."</td>";
				$html.="<td>".$loc."</td>";
				$html.="<td>".$bank."</td>";
				$html.="<td>".$pf1."</td>";
				$html.="<td>".$uan."</td>";
				$html.="<td>".$esi."</td>";
				$html.="<td>".$ac."</td>";
				$html.="<td>".$desg."</td>";
				$html.="<td>".$bonus."</td>";
				$html.="<td>".$oben."</td>";
				$html.="<td>".$doj."</td>";
				$html.="<td>".$month_."</td>";
				$html.="<td>".$vertical."</td>";
				$html.="<td>".$days_in_month."</td>";
				$html.="<td>".$loss_of_pay."</td>";
				$html.="<td>".$gross_salary."</td>";
				$html.="<td>".$hra_and_allow."</td>";
				$html.="<td>".$earned_salary."</td>";
				$html.="<td>".$deductions."</td>";
				$html.="<td>".$epf_ee."</td>";
				$html.="<td>".$esi_ee."</td>";
				$html.="<td>".$pt_."</td>";
				$html.="<td>".$net_pay."</td>";
				$html.="<td>".$employer_esi."</td>";
				$html.="<td>".$employer_pf."</td>";
				$html.="<td>".$ctc."</td>";
				$html.="<td>".$net_salary."</td>";
				$html.="<td>".$in_words."</td>";
				$html.="</tr>";

				 $q="select * from salarymonthwise where month='$month'  and year='$year' and email='$empid' ";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				$c=mysqli_num_rows($p);
				$r=mysqli_fetch_array($p);
				 $month1=addslashes($r['month'])."<br/>";
				$year1=$r['year']."<br/>";
				$email1=$r['email']."<br/>";
				$month1=$month;
				$year1=$year;
				$email1=$empid;
				
				
				if( $c > 0 ){
				
				
						
								 $m="update salarymonthwise set  name ='".addslashes($ename)."' ,basic='$basic', others='$others',pf='$pf', pt='$pt',esi='$esi',pfec='$pfec',
								pfes='$pfes',location='$loc',bank_name='$bank',pf_no='$pf1',pf_uan='$uan',esi_no1='$esi1',ac_num='$ac',designation='$desg',bonus='$bonus',oben='$oben',month_='$month_' ,vertical='$vertical' ,days_in_month='$days_in_month' ,loss_of_pay='$loss_of_pay' ,gross_salary='$gross_salary' ,hra_and_allow='$hra_and_allow' ,
								earned_salary='$earned_salary' ,deductions='$deductions' ,epf_ee='$epf_ee' ,esi_ee='$esi_ee' ,pt_='$pt_' ,net_pay='$net_pay' ,employer_esi='$employer_esi' ,employer_pf='$employer_pf' ,ctc='$ctc' ,net_salary='$net_salary' ,in_words='$in_words'   where email='$email1' and month='$month1' and year='$year1' ";
					
						$link->query($m);
							
						
				}else{
				
				if( ($ename!='Name') and ($ename!='') ){
								
	   $query = "insert into salarymonthwise(name,email,basic,others,month,year,pf,pt,esi,pfec,pfes,location,bank_name,pf_no,pf_uan,esi_no1,ac_num,designation,bonus,oben,doj,month_,vertical,days_in_month,loss_of_pay,gross_salary,hra_and_allow,earned_salary,deductions,epf_ee,esi_ee,pt_,net_pay,employer_esi,employer_pf,ctc,net_salary,in_words)
							values('".$ename."','".$empid."','".addslashes($basic)."','".$others."','".$month."','".$year."','".$pf."','".$pt."','".$esi."',
							'".$pfec."','".$pfes."','".$loc."','".$bank."','".$pf1."','".$uan."','".$esi1."','".$ac."','".$desg."','".$bonus."','".$oben."','".$doj."','".$month_."','".$vertical."','".$days_in_month."','".$loss_of_pay."','".$gross_salary."','".$hra_and_allow."','".$earned_salary."','".$deductions."','".$epf_ee."','".$esi_ee."','".$pt_."','".$net_pay."','".$employer_esi."','".$employer_pf."','".$ctc."','".$net_salary."','".$in_words."')";     
    

				$link->query($query);
				
							}	else{}
							
				
				}
				
				
				
	        }

		}

		$html.="</table>";
		
		


		echo "<br />Data Inserted in dababase";
			print "<script>";
            print "alert('Successfully Registred ');";
			print "self.location='uploadempsalary.php';";
			print "</script>";

	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>