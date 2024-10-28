<?php //include('config.php');
session_start();
//include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];

//include('org1.php');
//$y=mysqli_query($link,"select * from employee where emp_name='$name'");
//$y1=mysqli_fetch_array($y);
//$email=$y1['emp_email'];
//include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head
>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 </head>
 </head>
    
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
    </style>
	<script>
   
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
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">Reliance Billing</a>
                            </li>
                            <li>
                                <a href="#">Station Billing List</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
									<!--<a href="addbill.php"><button type="button" class="btn-success btn-sm ">Add New</button></a>-->
                                       

                                        
                                        <div class="table-header">
                                        Stations List
                                        </div>

                                        <!-- div.table-responsive -->
<!-- <div style="height:15px; margin-bottom:20px;">
<button class="btn btn-info" type="submit" name="bsearch" onclick="javascript:location.href='add_stock.php'" id="bsearch">
                                               
                                                Add New
        <br />                                    </button>
 </div> -->
										 <form method="post" action="" class="form-horizontal">
                                         <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">From Date </label>

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
                                    
                                         <div class="form-group">
										
				
				<div class="col-sm-2">
						    <input id=\"name\" list=\"city25\" name="name" class="form-control" placeholder="Station Name" >
<datalist id=\"city25\" >

<?php  
$sql2="SELECT distinct empid FROM request";
  // Query to collect records
$r2=mysqli_query($link,$sql2) or die(mysqli_error());
while ($row2=mysqli_fetch_array($r2)) {
echo  "<option value=\"$row2[empid]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
						    
						    
						</div>
						<div class="col-sm-2">
						    <input id=\"stationid\" list=\"city26\" name="stationid" class="form-control" placeholder="company" >
<datalist id=\"city26\" >

<?php  
$sql3="SELECT distinct indid FROM request";
  // Query to collect records
$r3=mysqli_query($link,$sql3) or die(mysqli_error());
while ($row3=mysqli_fetch_array($r3)) {
echo  "<option value=\"$row3[indid]\"/>"; // Format for adding options 
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
                                        
                                       
                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                        
                                        <script>
$(document).ready(function(){
 $('#emp_name').multiselect({
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
											if(isset($_POST['bsearch'])){
											  $empid=$_POST['empid'];
											    $indid=$_POST['indid'];
											 $state=$_POST['state'];
                                             $from_date=$_POST['from_date'];
                                             $to_date=$_POST['to_date'];
											   $area=$_POST['area'];
											    $state=$_POST['state'];
											    $city=$_POST['city'];
											    
									// 		   $y="select  * from request where
												
												
									// 		(('$empid' <> ' ' and locate('$empid', empid) <> 0) or ('$empid' = ' '  and 1 = 1) ) and
											
									// (('$indid' <> ' ' and locate('$indid', indid) <> 0) or ('$indid' = ' '  and 1 = 1) ) ";  
											    // adding date query 
    //                                             format for date and search query 
    //                                             "SELECT * FROM table WHERE (date BETWEEN '2020-01-01' AND '2020-12-31') 
    //   AND (ID LIKE '%dhaval%' OR firstname LIKE '%dhaval%' OR lastname LIKE '%dhaval%') ";

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
											
											
											
											
											
                                        </div>
                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div>
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
<script>
$(document).ready(function(){
 $('#emp_name').multiselect({
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
        </script><!-- inline scripts related to this page -->
</body>
</html>
<script>
$(document).ready(function(){
 $('#emp_name').multiselect({
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
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>