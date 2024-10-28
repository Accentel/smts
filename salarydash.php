<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$state = $_GET['state'];
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
    //include('org1.php');


    include 'dbfiles/org.php';
    include 'dbfiles/iqry_emp.php';
    //include'dbfiles/uqry_emp.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include 'template/headerfile.php'; ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <style>
        strong {
            color: red;
        }
    </style>
    <script>
        function ConfirmDialog() {
            var x = confirm("Are you sure to delete record?")
            if (x) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <body class="no-skin">
        <?php include 'template/logo.php';?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {}
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')
                    } catch (e) {}
                </script>

                <!-- /.sidebar-shortcuts -->
                <?php include 'template/sidemenu.php' ?>
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
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">Settings</a>
                            </li>
                            <li>
                                <a href="#">Employee Salary Statement</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Employee Salary Statement
                            </h1>
                        </div>
                       

                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div>
                    <!-- /.col -->






                    <div class="row">

                        <?php
                        $datatable = "salarymonthwise";
                        $results_per_page = 30;
                        if (isset($_GET["page"])) {
                            $page  = $_GET["page"];
                        } else {
                            $page = 1;
                        };
                        $start_from = ($page - 1) * $results_per_page;
                        $sql = "SELECT * FROM " . $datatable . " ORDER BY name desc LIMIT $start_from, " . $results_per_page;
                        $rs_result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        ?>
                        <div class="col-xs-12">
                            <div class="table-header">
                                Employees Salary Statement  
                            </div>
                            <div style="height:15px;"></div>


			 <form method="post" action="" class="form-horizontal">
										
             <div class="form-group">					
				
				<div class="col-sm-3">
						    <input id=\"name\" list=\"city25\" name="name" class="form-control" placeholder="Name" >
<datalist id=\"city25\" >

<?php  
$sql2="SELECT distinct name FROM salarymonthwise";
  // Query to collect records
$r2=mysqli_query($link,$sql2) or die(mysqli_error($link));
while ($row2=mysqli_fetch_array($r2)) {
echo  "<option value=\"$row2[name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
						    
						    
						</div>
                        
						<div class="col-sm-3">
						    <input id=\"year\" list=\"city26\" name="year" class="form-control" placeholder="Year" >
<datalist id=\"city26\" >

<?php  
$sql3="SELECT distinct year FROM salarymonthwise";
  // Query to collect records
$r3=mysqli_query($link,$sql3) or die(mysqli_error($link));
while ($row3=mysqli_fetch_array($r3)) {
echo  "<option value=\"$row3[year]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
						    
						    
						</div>
						<div class="col-sm-3">
						    <input id=\"month\" list=\"city27\" name="month" class="form-control" placeholder="Month" >
<datalist id=\"city27\" >

<?php  
$sql4="SELECT distinct month FROM salarymonthwise";
  // Query to collect records
$r4=mysqli_query($link,$sql4) or die(mysqli_error($link));
while ($row4=mysqli_fetch_array($r4)) {
echo  "<option value=\"$row4[month]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
						    
						    
						</div>
						
						
                   
				   <div class="col-sm-2">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
			
                  </div>
										</form>


        

                            <div class="table-responsive">
                                <table id="simple-table" class="table table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>

                                            <th class="detail-col">S No</th>
                                            <th>Emp Name</th>
                                            <th>Emp Email</th>
                                            <th>Year </th>
                                            <th class="hidden-480">Month</th>
                                            <th class="hidden-480">Designation</th>
                                           
                                            <th class="hidden-480">Download</th>
                                            <!-- <th class="hidden-480">XL sheet</th> -->


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (isset($_POST['bsearch'])) {
                                            $bsearch = $_POST['search'];
                                            $name=$_POST['name'];
                                            $year=$_POST['year'];
                                         $month=$_POST['month'];
                                            $y = "select  * from salarymonthwise where
												
												
											(('$name' <> ' ' and locate('$name', name) <> 0) or ('$name' = ' '  and 1 = 1) ) and
											
									(('$year' <> ' ' and locate('$year', year) <> 0) or ('$year' = ' '  and 1 = 1) ) and
											
											
											(('$month' <> ' ' and locate('$month', month) <> 0) or ('$month' = ' '  and 1 = 1) )";
                                            $t = mysqli_query($link, $y) or die(mysqli_error($link));
                                            $i = 1;
                                            while ($t1 = mysqli_fetch_array($t)) {


                                        ?>

                                                <tr>

                                                    <td><?php echo $i; ?></td>


                                                    <td>
                                                        <?php echo $t1['name']; ?>
                                                    </td>


                                                    <td><?php echo $t1['email']; ?></td>

                                                    <td>
                                                        <?php echo $t1['year']; ?>
                                                    </td>

                                                    <td><?php echo $t1['month']; ?></td>

                                                    <td>
                                                        <?php echo $t1['designation']; ?>
                                                    </td>


                                                   
                                                    <td class="hidden-480"><a href="salaryslip1.php?name=<?php echo $t1['name']; ?>&year=<?php echo $t1['year']; ?>&month=<?php echo $t1['month']; ?>"><img src="images/pdf_icon.gif"></a>&nbsp;&nbsp;</td>

                                                   



                                                </tr>




                                            <?php $i++;
                                            }
                                        } else { ?>

                                            <?php

                                            $i = 1;
                                            while ($rs1 = mysqli_fetch_array($rs_result)) {

                                            ?>
                                                <tr>

                                                    <td><?php echo $i; ?></td>


                                                    <td>
                                                        <?php echo $rs1['name']; ?>
                                                    </td>

                                                    <td><?php echo $rs1['email']; ?></td>

                                                    <td>
                                                        <?php echo $rs1['year']; ?>
                                                    </td>

                                                    <td><?php echo $rs1['month']; ?></td>

                                                    <td>
                                                        <?php echo $rs1['designation']; ?>
                                                    </td>



                                                    <td class="hidden-480"><a href="salaryslip1.php?name=<?php echo $rs1['name']; ?>&year=<?php echo $rs1['year']; ?>&month=<?php echo $rs1['month']; ?>"><img src="images/pdf_icon.gif"></a>&nbsp;&nbsp;</td>


                                                    <!-- <td class=""><a href="emp_xl.php?id=<?php echo $rs1['empid']; ?>"> <img src="images/xl.jpg" width="20" height="20"></a>&nbsp;&nbsp;</td> -->


                                                </tr>

                                        <?php $i++;
                                            }
                                        } ?>





                                    </tbody>
                                </table>
                            </div>

                            <div align="center">
                                <?php
                                $sql = "SELECT COUNT(name) AS total FROM " . $datatable ;
                                $result = mysqli_query($link, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results

                                echo "<ul class='pagination'>";
                                echo "<li><a href='salarydash.php?page=" . ($page - 1) . "' class='button'>Previous</a></li>";

                                $i = 1;
                                while ($i <= $total_pages) {
                                    echo "<li><a href='salarydash.php?page=" . $i . "'>" . $i . "</a></li>";
                                    $i++;
                                }

                                echo "<li><a href='salarydash.php?page=" . ($page + 1) . "' class='button'>NEXT</a></li>";
                                echo "</ul>";
                                ?>

                            </div>
                        </div><!-- /.span -->
                    </div>




























                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
        </div><!-- /.main-content -->

        <?php include('template/footer.php'); ?>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse" style="margin-right:10px;">
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
        <script src="assets/js/jquery-ui.custom.min.js"></script>

        <script src="assets/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/js/bootstrap-timepicker.min.js"></script>



        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
        <script>
            $(document).ready(function() {

                $("#success-alert").hide();
                $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                    $("#success-alert").alert('close');
                    window.location.href = window.location.href;
                });
                //$( '#validation-form' ).reset();


                $('.date-picker').datepicker({
                        autoclose: true,
                        todayHighlight: true
                    })
                    //show datepicker when clicking on the icon
                    .next().on(ace.click_event, function() {
                        $(this).prev().focus();
                    });



                //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization










            });
        </script> <!-- inline scripts related to this page -->
    </body>
    <?php mysqli_close($link); ?>

    </html>
<?php

} else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');
}

?>