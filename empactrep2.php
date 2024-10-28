<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$conn = mysqli_connect("localhost", "a16673ai_payamath", "Payamath@2016", "a16673ai_smtsgroup") or die("unable to connect to database");
// $link = mysqli_connect("localhost", "a16673ai_payamath", "Payamath@2016", "a16673ai_smtsgroup") or die("unable to connect to database");
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
//if($_SESSION['user'])
//{
$name=$_SESSION['user'];
include('org1.php');

include('config.php');
include'dbfiles/org.php';
include'dbfiles/org_update.php';
?>
<!DOCTYPE html>
<html lang="en">
     <head>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 </head>
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
    </style>
     <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
        
        .reload {
  font-family: Lucida Sans Unicode
  cursor: pointer;
  float:left;
}
.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 30px;
  height: 30px;
  animation: spin 2s linear infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    </style>
	<script>
    function populatefilters(str)
{

 
if (str=="")
  {
  return;
  } 
  document.getElementById("loaders").style.display="block";
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   // document.getElementById("country5").innerHTML=xmlhttp.responseText;
	//document.getElementById("country5").innerHTML=show;
	
	var show=xmlhttp.responseText;
	//alert(show);
	document.getElementById(str).innerHTML=show;
	document.getElementById("loaders").style.display="none";
	alert('filter loaded');
	
	
	//document.location.reload();
    }
  }
// xmlhttp.open("GET","getfilterinforpages.php?q="+str+"&statetable=add_knqot",true);
// xmlhttp.send();
}
        function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
    }
    </script>

  
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>

                            <li>
                                <a href="#">Reports</a>
                            </li>
                           <li class="active">Employee Activity Report</li>
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <!-- <div class="page-header">
                            <h1 align="center">
                    Time Tracker 

                            </h1>
                        </div> -->
                        <div class="row">
                            <div class="col-xs-18">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Activity Report</h3>
								</div>
                               
                               <!-- <form class="form-horizontal" id="validation-form" role="form" method="post" action=""  > -->
                              <!-- autocomplete="off" target="_blank"-->
                                
                                   
									<!-- <div class="box-body">

								   <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date </label>

                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" id="from_date" name="from_date" required placeholder="From date"  value="<?php echo date('Y-m-d');?>" /> 
                                            <strong><?php echo $errorName; ?></strong>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date </label>

                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" id="from_date" name="from_date" required placeholder="From date"  value="<?php echo date('Y-m-d');?>" /> 
                                            <strong><?php echo $errorName; ?></strong>
                                        </div>

                                    </div>  -->
                                   <!-- <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> To Date </label>

                                        <div class="col-sm-9">
                                                <input type="date" class="form-control" id="to_date" name="to_date" required placeholder="To date"  value="<?php echo date('Y-m-d');?>" /> <strong> </strong>
                                        </div>

                                    </div>-->
                                    
                                       <!-- <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Empolyee Name </label>

                                        <div class="col-sm-9">
                                               
                                                <select  id="emp_name" name="emp_name[]" multiple class="form-control" >
											   
											   <?php $m=mysqli_query($conn,"select distinct empid from request ") or die(mysqli_error($link));
											   
														            while($m1=mysqli_fetch_array($m)){?>
														            <option value='<?php echo $m1['empid'] ?>'><?php echo $m1['empid'] ?></option>
														            <?php }; ?>
											    </select>
                                                                                       </div>

                                    </div> -->
                                  
                                  
								  
								  
                                    <!-- <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="Update">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Report
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                          
											&nbsp; &nbsp; &nbsp;
                                           <a href="dashboard.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div> -->
									
					</div>			
                    <form method="post" action="" class="form-horizontal">
										
							<div class="form-group">
				
				
						
                     <div class="col-sm-4">
                  
                <input type="text" class="form-control " id="search" name="search" placeholder="Search By Station Name  or Station ID No or EMP ID"/>
                  </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div> 
				  <div class="col-sm-1"><b><a href="emp_rep.php" class="btn btn-primary btn-xs">XL Download</a></b></div>
				    <!-- <div class="col-sm-1"><b>
					 <a onclick="window.open('qut_kn_print.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"
												   class="btn btn-primary btn-xs">
					
					
					Print</a></b></div> -->
				</div>
										
										</form>	
		
		
	<!--	
<form method="post" action="" class="form-horizontal">
										
		
				
				
						
                     
                  
                <input type="text"  id="myInput" name="search" placeholder="Search  " >
                  
				
				  <b><a href="qut_ap_excel.php" class="btn btn-primary btn-xs">XL Download</a></b>
				    <b>
					 <a onclick="window.open('qut_ap_print.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"
												   class="btn btn-primary btn-xs">
					
					
					Print</a></b>
				
										
										</form>	-->
										
										 <!--<form method="post" action="" class="form-horizontal">
										
										<div class="form-group">
				
				
						<div class="col-sm-1"></div>
                    <div class="col-sm-8">
                  
                <input type="text" class="form-control pull-right" id="search" name="search" placeholder="Search By Service No or date(yyyy-mm-dd) ">
                  </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
				</div>
										
										</form>-->
                                        <!-- div.dataTables_borderWrap -->
                                        <div style="overflow-x:auto;">
                                            <table id="myTable" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
                                                        <th>S No</th>
                                                        
                                                        <th>EMP ID</th>
                                                         <th>EMP Name</th>
                                                        <th>Station Code</th>
														
														<th>Station Address</th>
                                                        <th>Check-in Location</th>
                                                         <th>Check-in Time</th>
														  <th>Check-out Location</th>
														   <th>Check-out Time</th>
														  <th>Last Updated Location</th>
														  <th>Last Updated Time</th>
														  <th>Work Done</th>
														  <!-- <th>Status</th>
														   <th>User</th>
                                                     		 <th>Edit</th> -->
        													  <!-- <?php if(($tsname!="admin")  ){}else{ ?> -->
        													  <!-- <th>RONo Edit</th> -->
        													  <!-- <?php }?> -->
													         
														     <!-- <th>Print</th> <th>Quotation</th>
															 <th>Bill of Supply</th><th>Miscllenious</th>
														     <th>Pdf Download</th>
                                                         -->
                                                      
                                                      
                                                    </tr>
													  <form name="frm" method="post" >
                                                        
													  <tr >
                                                        <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
                                                        <th><div class="loader" id="loaders" style="display:none" ></div></th>
                                                        
                                                        <th></th>
                                                        
                                                        <th>
                                                            <div  style="width:100%">
  <!-- <span style="width:20%" onclick="populatefilters('indid26')" class=reload>&#x21bb;</span> -->
                                                            <!-- <input style="width:80%"  id=\"indid\" list="indid26" name="indid26" class="form-control" placeholder="Station Code" ></div> -->
<!-- <datalist id="indid26" > -->
<!-- </datalist> -->
<!-- </datalist> -->
<!-- </th> -->
 <th >
                                                            <div  style="width:100%">
  <span style="width:20%" onclick="populatefilters('sname26')" class=reload>&#x21bb;</span><input style="width:80%"  id=\"sname\" list=sname26 name="sname" class="form-control" placeholder="Station Name">
</div>
                                                            
<datalist id="sname26" >
<?php  
$sql3="SELECT distinct sname FROM request";
  // Query to collect records
$r3=mysqli_query($link,$sql3) or die(mysqli_error());
while ($row3=mysqli_fetch_array($r3)) {
echo  "<option value=\"$row3[sname]\"/>";
}
 echo "</datalist>";?>
</th>
														
														
     <!-- <th > -->
                                                            <!-- <div  style="width:100%"> -->
  <!-- <span style="width:20%" onclick="populatefilters('empid26')" class=reload>&#x21bb;</span><input style="width:80%"  id=\"empid\" list="empid26" name="empid26" class="form-control" placeholder="Emp ID" > -->
<!-- </div> -->
                                                            
<!-- <datalist id="empid26" > -->

<!-- </datalist> -->
<!-- </th> -->
           <th>                                                 <div  style="width:100%">
  <!-- <span style="width:20%" onclick="populatefilters('superwisor26')" class=reload>&#x21bb;</span><input style="width:80%" id=\"superwisor\" list="superwisor26" name="superwisor" class="form-control" placeholder="superwisor Name" >
</div>
                                                            
<datalist id="superwisor26" >
</datalist> -->
</th>
                                                        <th >
                                                            <div  style="width:100%">
  <!-- <span style="width:20%" onclick="populatefilters('city27')" class=reload>&#x21bb;</span><input style="width:80%"  id=\"city\" list="city27" name="city" class="form-control" placeholder="City Name" >
</div>
                                                            
<datalist id="city27" > -->
</datalist>
</th>
														  <th></th>
														
   <th><input  type="submit" value="Submit" name="submitkk" class="btn btn-primary" ></th>
   <th>   <input type="reset" value="Reset" name="submit1" class="btn btn-danger"  onclick="javascript:location.href='empactrep.php'"> </th>
   <th>    </th>
<!--
style="width:16px; font-size:8px; height:16px; background-image:url(images/Filter.png); background-repeat:no-repeat; margin-top:5px;"
<input type="reset" value="" name="submit1" class="" 
style="width:16px; font-size:8px; height:16px; background-image:url(images/FilterNone.gif); background-repeat:no-repeat;
 margin-top:5px;" onclick="javascript:location.href='qot_list1.php'">--> </th> <th></th><th></th>
														 <th></th>
                                                         <th></th>
                                                       <th></th>
                                                      
                                                    </tr></form>
                                                </thead>

                                                <tbody>
												
												<?php 
											include('dbconnection/connection.php');
											
													
										$datatable="request";
										$results_per_page = 30;
										if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                                        $start_from = ($page-1) * $results_per_page;
										
											
												if(isset($_POST['bsearch'])){
												$bsearch=$_POST['search'];
											// $y="select a.store_name,a.city,b.quet_num,b.store_code,b.inv_date,b.id
											 //from add_qot b,dpr a where a.store_code=b.store_code order by b.id desc ";
											 $y="select * from request where empid like '%$bsearch%' or sname like '%$bsearch%'  or indid like '%$bsearch%'order by id desc";
												} else
												if(isset($_POST['submitkk'])){
												$indid=$_POST['indid'];
												$sname=$_POST['sname'];
												$empid=$_POST['empid'];
                                                $loc=$_POST['loc'];
                                                $time=$_POST['time'];
                                                $checkoutloc=$_POST['checkoutloc'];
                                                $checkoutime=$_POST['checkoutime'];
                                                $lastupdatedloc=$_POST['lastupdatedloc'];
                                                $lastupdatedtime=$_POST['lastupdatedtime'];
                                                $com=$_POST['com'];
												$superwisor=$_POST['uploadby'];
												$phoneno=$_POST['phoneno'];	
												$date=$_POST['date'];
												/*echo $y="select  a.quet_num,a.store_code,a.inv_date,a.status,a.id from add_qot a,dpr b where a.quet_num='$qot_nun'
												 or b.store_code='$store_code' or b.store_name='$store_name' or b.coordinator='$coordinator'
												 or b.superwisor='$superwisor' or b.city='$city' or a.status='$status'

												 order by id desc";*/
												
												 $y="select  a.indid,a.sname,a.empid,a.uploadby,a.id,a.phoneno,a.loc,a.time,a.checkoutloc,a.checkoutime,a.lastupdateloc,a.lastupdatedtime,a.com from request a,request b where
												
												
											(('$indid' <> ' ' and locate('$indid', a.indid) <> 0) or ('$indid' = ' '  and 1 = 1) ) and
											(('$sname' <> ' ' and locate('$sname', b.sname) <> 0) or ('$sname' = ' '  and 1 = 1) ) and
											(('$empid' <> ' ' and locate('$empid', b.empid) <> 0) or ('$empid' = ' '  and 1 = 1) ) and   
                                            (('$loc' <> ' ' and locate('$loc', b.loc) <> 0) or ('$loc' = ' '  and 1 = 1) ) and
                                            (('$checkoutloc' <> ' ' and locate('$checkoutloc', b.checkoutloc) <> 0) or ('$checkoutloc' = ' '  and 1 = 1) ) and
                                            (('$checkoutime' <> ' ' and locate('$checkoutime', b.checkoutime) <> 0) or ('$checkoutime' = ' '  and 1 = 1) ) and
                                            (('$lastupdateloc' <> ' ' and locate('$lastupdateloc', b.lastupdateloc) <> 0) or ('$lastupdateloc' = ' '  and 1 = 1) ) and
                                            (('$lastupdatedtime' <> ' ' and locate('$lastupdatedtime', b.loc) <> 0) or ('$lastupdatedtime' = ' '  and 1 = 1) ) and
                                            (('$com' <> ' ' and locate('$com', b.com) <> 0) or ('$com' = ' '  and 1 = 1) ) and
                                            (('$time' <> ' ' and locate('$time', b.empid) <> 0) or ('$time' = ' '  and 1 = 1) ) and   
											(('$phoneno' <> ' ' and locate('$phoneno', b.phoneno) <> 0) or ('$phoneno' = ' '  and 1 = 1) ) and
											(('$date' <> ' ' and locate('$date', a.date) <> 0) or ('$date' = ' '  and 1 = 1) )
                                             and a.indid=b.indid";
												}
												
												
												else {
													
													 $y="SELECT * FROM ".$datatable."   ORDER BY id desc LIMIT $start_from, ".$results_per_page;
													 
												}
											 
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
									    	$i=$start_from;
													$start=1;
													$ro=0;
											// $ts=0;
											// $tg=0;
											$n=0;
										
											while($rs1=mysqli_fetch_array($t)){
            					        	 $user=$rs1['ses'];	
            						        
																						
                                                    ?>
												
												<tr>
                                                        
<!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
                                                        <td><?php echo $i+$start; ?></td>
                                                       
                                                      
                                                          <td class="hidden-480"><?php echo $rs1['empid']; ?></td>
                                                        <td class="hidden-480"><?php echo $store_code=$rs1['uploadby'];
														include('dbconnection/connection1.php');
// $ssq1=mysqli_query($link,"select * from request where uploadby='$uploadby'");
// $r1=mysqli_fetch_array($ssq1);

														?></td>
                                                         <!-- <td class="hidden-480"><?php echo $rs1['uploadby']; ?></td> -->
                                                        <!-- <td class="hidden-480"><?php echo $rs1['sarea']; ?></td> -->
														<td class="hidden-480"><?php echo $rs1['indid']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['sname']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['loc']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['time']; ?></td>
                                                        <td class="hidden-480"><?php  echo $rs1['checkoutloc']; ?></td>
                                                        <td class="hidden-480"><?php  echo $rs1['checkoutime']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['lastupdateloc']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['lastupdatedtime']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['com']; ?>
                                                       
                                                        <!-- <td class="hidden-480"><?php echo $r1['sname']; ?></td>
                                                        
														
														<td class="hidden-480"><?php echo $r1['indid']; ?></td>
                                                        <td class="hidden-480"><?php echo $r1['sname']; ?></td>
                                                        <td class="hidden-480"><?php echo $r1['loc']; ?></td>
                                                        <td class="hidden-480"><?php  $d= $rs1['inv_date']; echo date('d-m-Y', strtotime($d)); ?></td>
                                                        <td class="hidden-480"><?php echo $tb=$rs1['tot_base'];
                                                         $ro=$ro+$tb;
                                                        ?></td> -->
                                                        <!-- <td class="hidden-480"><?php echo $ts1=$rs1['tot_ser']; 
                                                         $ts=$ts+$ts1;
                                                        ?></td>
                                                        <td class="hidden-480"><?php echo $tg1=$rs1['tot_gst'];
                                                        $tg=$tg+$tg1;
                                                        ?></td>
                                                        <td class="hidden-480"><?php echo $n1=$rs1['net'];
                                                        $n=$n+$n1;?></td>
                                                        
                                                         <td class="hidden-480">
                                                            <?php
                                                        // $icheck=0;
                                                        // $quetnumc=$rs1['quet_num'];
                                                        // $qc=mysqli_query($link,"select status from request where quet_num='$quetnumc'");
                                                        // $r1c=mysqli_fetch_array($qc);
                                                        // if(mysqli_num_rows($qc)>0){
                                                        // switch($r1c['status']){
                                                        //     case "Un Paid":
                                                        //         $icheck=1;
                                                        //         echo "Payment Pending Invoice";
                                                        //         break;
                                                        //         case "payment pending":
                                                        //             $icheck=1;
                                                        //             echo "To be raised Invoice";
                                                        //             break;
                                                        //         default :echo $rs1['status'];
                                                        //                  break;
                                                                
                                                        // }    
                                                        
                                                        
                                                            
                                                        // }
                                                        // else
                                                        // echo $rs1['status'];
                                                        ?> 
                                                        
                                                        </td> -->
                                                       <!-- <td class="hidden-480"><?php echo $rs1['ses']; ?></td>-->
                                                        <!-- <td class="hidden-480">
                                                            <?php 
                                                         $cempname=$rs1['ses'];
                                                         $sq=mysqli_query($link,"select emp_name from request where employeeid='$cempname' limit 1");
                                                         	$rss1=mysqli_fetch_array($sq);
                                                         	if($rss1['emp_name']=="")
                                                         	echo $cempname;
                                                         	else
                                                            echo $rss1['emp_name']; ?></td>   -->
                                                      
                                                    <!-- <td class="hidden-480">
                                                        
                                                        
                                                        
                                                        <?php 
                                                
                                                if($tsname=='admin'or 'vinoth') { ?>
                                                        <a href="edit_knqot.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/edit.gif"></a>
                                           <?php     }else{
                                               echo $user;
                                               echo $tsname;
                                               if($tsname==$user){ ?>
                                                   <a href="edit_knqot.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/edit.gif"></a>
                                              <?php  }else{ ?>
                                               
                                                        <img src="images/edit.gif">
                                          <?php }
                                           }
                                                ?>        
                                                
                                                        
                                                        
                                                        </td> -->
                                                        <?php if(($tsname!="admin")){}else{ ?>
                                                        <!-- <td> 
                                                        
                                                                
                                                        <a href="kneditrono_qot.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/edit.gif"></a>
                                            
                                               
                                                        
                                                        
                                                        
                                                        </td> -->
                                                        <?php }?>
														
														
														 <!-- <td class="hidden-480">
														 
                                                   <a onclick="window.open('qut_print.php?id=<?php echo $rs1['id'];?>&state=KN','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"
												   class="btn btn-primary btn-xs"><img src="images/printer.png"></a>
                                                        </td> 
                                                        
                                                         <td class="hidden-480"><a href="qut_excel.php?id=<?php echo $rs1['id']; ?>&state=KN">
                                                        <img src="images/xl.jpg" width="20" height="20"></a></td>
                                                        
                                                        <td class="hidden-480"><a href="qut_excel_bill.php?id=<?php echo $rs1['id']; ?>&state=KN">
                                                        <img src="images/xl.jpg" width="20" height="20"></a></td>
                                                     <td class="hidden-480"><a href="qut_excel_mis.php?id=<?php echo $rs1['id']; ?>&state=KN">
                                                        <img src="images/xl.jpg" width="20" height="20"></a></td>
                                                       
                                                        
                                                        <td class="hidden-480">
                                                       <a href="qot_pdf.php?id=<?php echo $rs1['id'];?>&state=KN"
												   class=""><img src="images/pdf_icon.gif" width="30" height="30"></a>
                                                       
                                                         </td> -->
														 
                                                    </tr>
                                                    <?php $i++; } 
													
													
													?>
                                                    
                                                    <!-- <tr>
                                                        <td colspan="8">Total</td>
                                                        <td><?php echo $ro; ?></td>
                                                        <td><?php echo $ts; ?></td>
                                                        <td><?php echo $tg; ?></td>
                                                        <td><?php echo $n; ?></td>
                                                        <td colspan="8"></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
											
											

											
											
											
											<div align="center">		
<?php 
$sql = "SELECT COUNT(id) AS total FROM ".$datatable;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  



echo "<ul class='pagination'>";
echo "<li><a href='empactrep.php?page=".($page-1)."' class='button'>Previous</a></li>"; 

echo "<li><a>".$page."</></li>";

echo "<li><a href='empactrep.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
?>
												
</div>
											
											
                                        
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        
                </div><!-- /.row -->
            
        </div>
    </div><!-- /.main-content -->

    <?php include('template/footer.php'); ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                            if ('ontouchstart' in document.documentElement)
                                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.flash.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>
        <script src="assets/js/buttons.colVis.min.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>

        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
        <script type="text/javascript">
                                            jQuery(function ($) {
                                                //initiate dataTables plugin
                                                var myTable =
                                                        $('#dynamic-table')
                                                        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                                                        .DataTable({
                                                            bAutoWidth: false,
                                                            "aoColumns": [
                                                                {"bSortable": false},
                                                                 null,null,null,null,null,null,null,
                                                                {"bSortable": false}
                                                            ],
                                                            "aaSorting": [],

                                                            


                                                            select: {
                                                                style: 'multi'
                                                            }
                                                        });



                                                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                                                new $.fn.dataTable.Buttons(myTable, {
                                                    buttons: [
                                                        {
                                                            "extend": "colvis",
                                                            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                                                            "className": "btn btn-white btn-primary btn-bold",
                                                            columns: ':not(:first):not(:last)'
                                                        },
                                                        {
                                                            "extend": "copy",
                                                            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "csv",
                                                            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "excel",
                                                            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "pdf",
                                                            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "print",
                                                            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                                                            "className": "btn btn-white btn-primary btn-bold",
                                                            autoPrint: false,
                                                            message: 'This print was produced using the Print button for DataTables'
                                                        }
                                                    ]
                                                });
                                                myTable.buttons().container().appendTo($('.tableTools-container'));

                                                //style the message box
                                                var defaultCopyAction = myTable.button(1).action();
                                                myTable.button(1).action(function (e, dt, button, config) {
                                                    defaultCopyAction(e, dt, button, config);
                                                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                                                });


                                                var defaultColvisAction = myTable.button(0).action();
                                                myTable.button(0).action(function (e, dt, button, config) {

                                                    defaultColvisAction(e, dt, button, config);


                                                    if ($('.dt-button-collection > .dropdown-menu').length == 0) {
                                                        $('.dt-button-collection')
                                                                .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                                                                .find('a').attr('href', '#').wrap("<li />")
                                                    }
                                                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                                                });

                                                ////

                                                setTimeout(function () {
                                                    $($('.tableTools-container')).find('a.dt-button').each(function () {
                                                        var div = $(this).find(' > div').first();
                                                        if (div.length == 1)
                                                            div.tooltip({container: 'body', title: div.parent().text()});
                                                        else
                                                            $(this).tooltip({container: 'body', title: $(this).text()});
                                                    });
                                                }, 500);





                                                myTable.on('select', function (e, dt, type, index) {
                                                    if (type === 'row') {
                                                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
                                                    }
                                                });
                                                myTable.on('deselect', function (e, dt, type, index) {
                                                    if (type === 'row') {
                                                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
                                                    }
                                                });




                                                /////////////////////////////////
                                                //table checkboxes
                                                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                                                //select/deselect all rows according to table header checkbox
                                                $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function () {
                                                    var th_checked = this.checked;//checkbox inside "TH" table header

                                                    $('#dynamic-table').find('tbody > tr').each(function () {
                                                        var row = this;
                                                        if (th_checked)
                                                            myTable.row(row).select();
                                                        else
                                                            myTable.row(row).deselect();
                                                    });
                                                });

                                                //select/deselect a row when the checkbox is checked/unchecked
                                                $('#dynamic-table').on('click', 'td input[type=checkbox]', function () {
                                                    var row = $(this).closest('tr').get(0);
                                                    if (this.checked)
                                                        myTable.row(row).deselect();
                                                    else
                                                        myTable.row(row).select();
                                                });



                                                $(document).on('click', '#dynamic-table .dropdown-toggle', function (e) {
                                                    e.stopImmediatePropagation();
                                                    e.stopPropagation();
                                                    e.preventDefault();
                                                });



                                                //And for the first simple table, which doesn't have TableTools or dataTables
                                                //select/deselect all rows according to table header checkbox
                                                

                                                //select/deselect a row when the checkbox is checked/unchecked
                                                



                                                /********************************/
                                                //add tooltip for small view action buttons in dropdown menu
                                              

                                                //tooltip placement on right or left
                                                


                                                /***************/
                                               





                                                /**
                                                 //add horizontal scrollbars to a simple table
                                                 $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
                                                 {
                                                 horizontal: true,
                                                 styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
                                                 size: 2000,
                                                 mouseWheelLock: true
                                                 }
                                                 ).css('padding-top', '12px');
                                                 */


                                            })
                                                                             function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, occurrence;

      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
     for (i = 2; i < tr.length; i++) {
         occurrence = false; // Only reset to false once per row.
         td = tr[i].getElementsByTagName("td");
         for(var j=0; j< td.length; j++){                
             currentTd = td[j];
             if (currentTd ) {
                 if (currentTd.innerHTML.toUpperCase().indexOf(filter) > -1) {
                     tr[i].style.display = "";
                     occurrence = true;
                 }
             }
         }
         if(!occurrence){
             tr[i].style.display = "none";
         }
     }
   }
        </script>	
					
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    <!-- /.main-content -->

    <?php include('template/footer.php'); ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
<!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<!-- inline scripts related to this page -->
</body>
</html>
<script>
$(document).ready(function(){
 $('#empid').multiselect({
  nonSelectedText: 'Select Employee',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  includeSelectAllOption: true,
  allSelectedText: 'All Employees',
  buttonWidth:'400px'
 });
  $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                        });

 });

</script>

<script type="text/javascript">
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>



