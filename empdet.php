<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
//if($_SESSION['user'])
//{
$name=$_SESSION['user'];
//include('org1.php');


//include'dbfiles/org.php';
//include'dbfiles/org_update.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
    </style>
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
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                            Employee Activity Report

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Activity Report</h3>
								</div>
                               
                                <form method="post" action="" class="form-horizontal">
                                   
									<div class="box-body">

								   <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> From Date </label>

                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="from_date" name="from_date" required placeholder="From date"  value="<?php echo date('Y-m-d');?>" /> 
                                            <strong><?php echo $errorName; ?></strong>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> To Date </label>

                                        <div class="col-sm-9">
                                                <input type="date" class="form-control" id="to_date" name="to_date" required placeholder="To date"  value="<?php echo date('Y-m-d');?>" /> <strong> </strong>
                                        </div>

                                    </div>
                                  
								  <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee </label>

                                        <div class="col-sm-9">
                                                <select name="emp" class="form-control">
<option value="">Select Employee</option>
<option value="All">All</option>
<?php $sq=mysqli_query($link,"select distinct empid,uploadby from 	request ");
while($r=mysqli_fetch_array($sq)){?>
<option value="<?php echo $r['empid']?>"><?php echo $r['uploadby'];?></option>
<?php }?>
</select>
												<strong> </strong>
                                        </div>

                                    </div>
								  
                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-12">
                                            <button class="btn btn-info" type="submit" name="submitk" id="submitk">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Report
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                          
											&nbsp; &nbsp; &nbsp;
											<!-- <button class="btn btn-info" type="submit" name="upd" id="upd">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Working Hour Report
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                          
											&nbsp; &nbsp; &nbsp;
								
                                           <a href="dashboard.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a> -->
                                        </div>
                                    </div>
									
					</div>				
					
                                </form>
								</div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                     <!--    <div class="row">
                            <div class="col-xs-6">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Daily Attendance Report</h3>
								</div>
                               
                                <form class="form-horizontal" id="validation-form" role="form" method="post" action="login_check.php"  autocomplete="off" >
                                   
									<div class="box-body">

								   <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Login Id </label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="from_date" name="uname" required placeholder="User Name"  /> 
                                           
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password </label>

                                        <div class="col-sm-9">
                                                <input type="password" class="form-control" id="to_date" name="pwd" required placeholder="Password"  >
                                        </div>

                                    </div>
                                  
								  <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date </label>

                                        <div class="col-sm-9">
                                                <input type="date" required class="form-control" name="date" value="<?php echo date('Y-m-d');?>">
												<strong> </strong>
                                        </div>

                                    </div>
								  
                                    <div class="form-group">
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
                                    </div>
									
					</div>				
					
                                </form>
								</div>
                            </div>
                        </div>-->
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
                        <table id="sample-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
                                                        <th>S No</th>
                                                        
                                                        <th>Station Name</th>
                                                        <th>Station ID</th>
                                                        <th>State</th>
                                                        
                                                          <th>Area</th>
														  <!-- <th>State</th>
                                                     
                                                        <th>City</th> -->
														  <th>Edit</th>
														   <th>Delete</th>
												</tr>
                                                </thead>

                                                <tbody>
												<?php 
                                                // $from_date=$_GET['from_date'];
                                                // $to_date=$_GET['to_date'];
											include('dbconnection/connection1.php');
											if(isset($_POST['submitk'])){
											  $empid=$_POST['empid'];
											    $indid=$_POST['indid'];
                                                $y="SELECT * FROM request WHERE  
                                                (('$empid' <> ' ' and locate('$empid', empid) <> 0) or ('$empid' = ' '  and 1 = 1) ) and
                                           
                                            (('$indid' <> ' ' and locate('$indid', indid) <> 0) or ('$indid' = ' '  and 1 = 1) ) AND (datecheck BETWEEN '$from_date' AND '$to_date') ORDER BY id";
                                   
                                               
                                           // }else{
                                                    // $y="select * from request order by id desc ";
                                           }
                                   $t=mysqli_query($link,$y) or die(mysqli_error($link));
                                           $i=1;
                                           while($rs1=mysqli_fetch_array($t)){
                                           
                                                                                       
                                                   ?>

                                               <tr>
                                                       
<!--<td class="center">
                                                           <label class="pos-rel">
                                                               <input type="checkbox" class="ace" />
                                                               <span class="lbl"></span>
                                                           </label>
                                                       </td>-->
                                                       <td><?php echo $i; ?></td>
                                                      
                                                     
                                                      
                                                       <td class="hidden-480"><?php echo $rs1['empid']; ?></td>
                                                       <td class="hidden-480"><?php echo $rs1['indid']; ?></td>
                                                       <td class="hidden-480"><?php echo $rs1['uploadby']; ?></td>
                                                       
                                                       <td class="hidden-480"><?php echo $rs1['datecheck'] ?></td>
                                                        <!-- <td class="hidden-480"><?php echo $bill_status=$rs1['state']; ?></td>
                                                        <td class="hidden-480"><?php echo $bill_status=$rs1['city']; ?></td> -->
                                                       <td class="hidden-480"><a href="edit_store.php?id=<?php echo $rs1['id']; ?>">
                                                       <img src="images/edit.gif"></a></td>
                                                        <td class="hidden-480">
                                                        
                                                  
                                                       <a onClick="return confirm('Are you sure you want to delete this item?');" href="store_delete.php?id=<?php echo $rs1['id']; ?>"><img src="images/Icon_Delete.png"></a>
                                                      
                                                     
                                                      </td>
                                                       
                                                        
                                                        
                                                   </tr>
                                                   <?php $i++; } 
                                                   
                                                   
                                                   ?>
                                                     <!-- displaying  from date and to date  -->
                                    <p style= text-align:center><b>From Date: <?php echo $from_date;?></b>
<b>                                                              To Date: <?php echo $to_date;?></b></p>
                                                   
                                                   
                                               </tbody>
                                           </table>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
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

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {
                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                        });
                        
                    });

</script>	<!-- inline scripts related to this page -->
</body>
</html>
<?php 

//}else
//{
//session_destroy();

//session_unset();

//header('Location:index.php?authentication failed');

//}

?>