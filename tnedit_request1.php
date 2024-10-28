<?php //include('config.php');
session_start();
$stn="TN";
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
    <style>
        strong{
            color:red;
        }
    </style>
	
<script>
function showHint22(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
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
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	//document.getElementById("state").value=strar[1];
	
	//document.getElementById("city").value=strar[2];	
	document.getElementById("store_name").value=strar[1];	
	document.getElementById("state").value=strar[2];
    document.getElementById("state_code").value=strar[3];
	//document.getElementById("addr").value=strar[4];	
	document.getElementById("gst_in").value=strar[4];
	document.getElementById("store_type").value=strar[5];
	
	document.getElementById("supervisor").value=strar[6];
	document.getElementById("cordinator").value=strar[7];
	document.getElementById("afm").value=strar[8];
	document.getElementById("company").value=strar[9];
    }
  }
xmlhttp.open("GET","get-apdata3.php?q="+str,true);
xmlhttp.send();
}
</script>
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
	<script>
 $(document).on('keyup', '.txt1', function(){
 var id=$(this).attr('data-row');
 
 var qty=document.getElementById('qty'+id).value;
 var price=document.getElementById('price'+id).value;
 
 //alert(price);
 bal=parseFloat(qty)*parseFloat(price);
 document.getElementById('amnt'+id).value=bal;
 calculateTotal1();
 calculateTotal1k();
 calculateTotal1kk();
 calculateTotal1kv();
 
 });
 
 
 $(document).on('keyup', '.txt20', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var sgst=document.getElementById('sgst'+id).value;
  var serv_amt=document.getElementById('serv_amt'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(sgst))/100;
 //alert(sgst);
  ser=(parseFloat(amt)*parseFloat(serv_amt))/100;
 document.getElementById('sgstamt'+id).value=bal;
  document.getElementById('serv_amnt'+id).value=ser;
 calculateTotal2();
 
 });
 
 $(document).on('keyup', '.txt21', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var cgst=document.getElementById('sgst'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(cgst))/100;
 document.getElementById('cgstamt'+id).value=bal;
 calculateTotal3();
 
 });
 
 
 function calculateTotal1(){
	subTotal = 0 ; total = 0; 
	$('.txt').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 
 function calculateTotal1kv(){
	subTotal = 0 ; total = 0; 
	$('.txt7').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_serv').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
  function calculateTotal1k(){
	subTotal = 0 ; total = 0; 
	$('.txt4').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_gst').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 function calculateTotal1kk(){
	subTotal = 0 ; total = 0; 
	$('.txt5').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#net').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 function calculateTotal2(){
	subTotal = 0 ; total = 0; 
	$('.txt50').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#sgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.txt51').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#cgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
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
                                <a href="#"> TN Request Amount </a>
                            </li>
                            <li>
                                <a href="tnqot_list.php">TN Request Amount List</a>
                            </li>
                            <li>
                                <a href="">Edit Request Amount</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Request Amount

                            </h1>
                        </div>
                        
                      
                        
                 <?php  $id=$_GET['id'];
				  $str_arr = explode (",", $id);  
				  $array=explode(",",$id);


foreach($array as $value)
{

    $data=explode(":",$value);

       $id=$data[0];




				
				 if($id!=''){
						$sq=mysqli_query($link,"select * from tnrequest_amnt where id='$id'");
						$r=mysqli_fetch_array($sq);
						 $ac=$r['ac_det'];
						
						?>             <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" action="">
 <input type="hidden" name="ids" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
											
											  <tr><td align="right">QuoteNumber</td><td align="left">
											  <input  type="text" readonly  class="form-control" value="<?php echo $qot=$r['quet_num'];?>"  name="qt_no" id="qt_no"></td>
                                        <td align="right">Request User</td><td><input type="text" value="<?php echo $r['user'];?>"   name="inv_date" id="inv_date" class="form-control"></td>
                                        </tr>
											
                                           
										
										 <?php 
										   
										    $a="select sum(approve_amnt) as amt from tnrequest_amnt where quet_num='$qot'";
										   $qwe=mysqli_query($link,$a);
										   $re=mysqli_fetch_array($qwe);
										    $amt=$re['amt'];
											
											 $a="select sum(transfer) as amt1 from tnrequest_amnt where quet_num='$qot'";
										   $qwe=mysqli_query($link,$a);
										   $re1=mysqli_fetch_array($qwe);
										     $amt1=$re1['amt1'];
											?>
										
										<?php 
										$state=$r['state'];
										
												$a="select * from add_tnqot where quet_num='$qot'";
										
										$ssq=mysqli_query($link,$a);
										$r1=mysqli_fetch_array($ssq);?>
										
										<?php $ssq2=mysqli_query($link,"select * from ac_det where name='$ac'");
										$r3=mysqli_fetch_array($ssq2);?>
										  <tr><td align="right">Ac Num</td><td align="left">
										<input type="text" name="adv_amnt" 
										id="adv_amnt" readonly  class="form-control" value="<?php echo $r3['ac_no'];?>"></td>	
                                        <td align="right">Account Holder Name</td><td><input type="text" name="adv_date" 
										id="sub_type"  readonly class="form-control" value="<?php echo $r3['name'];?>"></td>
                                        </tr>
										  <tr><td align="right">IFSC Code</td><td align="left">
										<input type="text" readonly name="ifsc" 
										id="ifsc"  class="form-control" value="<?php echo $r3['ifsc'];?>"></td>	
                                        <td align="right">Request Date</td><td><input type="text" name="adv_date" 
										id="sub_type" readonly  class="form-control" value="<?php echo $r['req_date'];?>"></td>
                                        </tr>
										
										<?php $idd=$r1['id'];?>
									
										 <tr><td align="right">Request Amount</td><td align="left">
										<input type="text" name="adv_amnt" 
										id="adv_amnt" readonly  class="form-control" value="<?php echo $r['req_amnt'];?>"></td>	
                                       <td align="right">Total Request Amount</td><td align="left">
										<input type="text" name="tot_req" 
										id="ifsc"  class="form-control" readonly value="<?php echo $ad=$r1['adv_amnt']+$r1['adv_amnt1']+$r1['adv_amnt2'];?>"></td>
                                        </tr>
										
										 <tr><td align="right">Total Approve Amount</td><td align="left">
										<input type="text" name="tot_approve" 
										id="ifsc"  class="form-control" readonly value="<?php echo $amt;?>"></td>	
                                         <td align="right">Total Approve Balance Amount</td><td><input type="text" name="adv_date" 
										id="sub_type"  class="form-control" value="<?php echo $amt-$amt1;?>"></td>
                                        </tr>
										
										
										 <tr><td align="right">Approved Amount</td><td align="left">
										<input type="text" name="approve_amnt" 
										id="sub_type"  class="form-control" readonly value="<?php echo $r['approve_amnt'];?>">
										
										</td>	
                                        <td align="right">Remarks</td><td align="left">
										<input type="text" name="remarks1" 
										id="remarks1" readonly class="form-control"  value="<?php echo $r['remarks'];?>">
										
										</td>	
                                        </tr>
										
												 <tr><td align="right">Amount Transfer</td><td align="left">
										<input type="number" name="transfer"  min="1"
										id="ifsc"  class="form-control" value="<?php echo $r['approve_amnt'];?>"></td>	
                                        <td align="right">Transfer Date</td><td><input type="date" name="transfer_date" 
										id="sub_type"  class="form-control" value="<?php echo date('Y-m-d');?>"></td>
                                        </tr>
										
									<?php $idd=$r1['id'];?>
										<tr><td align="right" colspan="2">Qutation Print(Click Print Button to view Qutation Print)   <?php if($state=='TN'){ ?>
										<a onclick="window.open('tnqut_print.php?id=<?php echo $idd;?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" class="btn btn-primary btn-xs">
										<img src="images/printer.png"></a>
										<?php } ?></td><td align="left">
										
										
										</td>	
                                        <td align="right"></td><td>
										
										</td>
                                        </tr>
										
                                        </table>
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        
									
										<button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>
										
										<?php 
										if(isset($_POST['update'])){
											 $id=$_POST['ids'];
											
											 $transfer=$_POST['transfer'];
											$transfer_date=$_POST['transfer_date'];
											$qot_type=$_POST['qot_type'];
											$qt_no=$_POST['qt_no'];
											$req_amnt_settled=$_POST['req_amnt_settled'];
											$amnt=$req_amnt_settled+$transfer;
												$remarks1=$_POST['remarks1'];
											$sq=mysqli_query($link,"update add_tnqot set req_amnt_settled='$amnt',status='Document Required' where quet_num='$qt_no'");
											
											
											$ssq=mysqli_query($link,"update tnrequest_amnt set transfer='$transfer',transfer_date='$transfer_date',status='Amount Transferred',remarks1='$remarks1' where id='$id'");
											
											print "<script>";
			print "alert('Amount Transferred Successfully');";
			print "self.location='tnreq_list1.php';";
			print "</script>";
										}?>
									

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="tnreq_list1.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div>
										
				 <?php } }?>
										
										</div></div></div>
                                    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>  
                                      <script type="text/javascript">
var i=100;

$(".addmore").on('click',function(){
    i++; 
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	
    data +="<td><input type='hidden' name='id1[]' id='id1"+i+"' style='width:30px;' data-row='"+i+"' value='<?php echo $id ?>'><input type='hidden' name='id5[]' id='id5"+i+"' style='width:30px;' data-row='"+i+"' value=''><input data-row='"+i+"' type='text' name='sno[]' id='sno"+i+"' style='width:30px;' value=''></td>";          
   data +="<td><input type='text' name='pname[]' id='pname"+i+"' style='width:100px;' data-row='"+i+"' value=''  onclick=window.open('Drug_itemcode_pop1.php?rowid="+i+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')></td>";
data +="<td><input type='text' name='serv_num[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='serv_num"+i+"' /> </td>";          
  
	  data +="<td><input type='text' name='hsn[]' readonly value='' style='width:50px;'  id='hsn"+i+"' />	   </td>";
	   data +="<td> <input type='text' name='gst[]' readonly data-row='"+i+"'  value='' style='width:60px;' class='txt20'   id='gst"+i+"' /></td>";          
     
    data +="<td><input type='text' name='uom[]' readonly id='uom"+i+"' value='' style='width:70px;' data-row='"+i+"'></td>";
	 data +="<td><input type='text' name='qty[]'  data-row='"+i+"' value='' style='width:60px;' class=' ' id='qty"+i+"' onkeyup='val(this.value)' /> </td>"; 
	 
	data +="<td><input type='text' name='price[]' readonly data-row='"+i+"' id='price"+i+"' style='width:70px;' value='' class='txt1 ' onkeyup='val(this.value,"+i+")' /></td>";
data +="<td><input type='text' name='amnt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='txt tx6' id='amnt"+i+"' /> </td>";          
      data +="<td><input type='text' name='serv_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt7 ' readonly  id='serv_amnt"+i+"' /> </td>";          
   
   data +="<td><input type='text' name='gst_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt4 ' readonly  id='gst_amnt"+i+"' /> </td>";          
   
   	data +="<td><input type='hidden' name='id[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='id"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='cap[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='cap"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='serv_amt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='serv_amt"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='serv_code[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='serv_code"+i+"' /> </td>";          
   	
	data +="</tr>";
	$('#dynamic-table1 ').append(data).find('#dynamic-table1>tbody>tr:nth-child(2)');
	

	});
function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}




</script> 

<script type="text/javascript">

function val(str,id)
{
cal=0;
cal1=0;
cal12=0;
var price=document.getElementById("price"+id).value;

var qty=document.getElementById("qty"+id).value;
var gst=document.getElementById("gst"+id).value;
//alert(gst);
var serv_amt=document.getElementById("serv_code"+id).value;
//alert(serv_amt);

//var cgst=document.getElementById("cgst"+id).value;
//var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
//alert(cal);
document.getElementById("amnt"+id).value=Math.abs(cal);	
cal12=eval(price)*eval(qty)*eval(serv_amt)/100;
cal1=eval(price)*eval(qty)*eval(gst)/100;
calk=(cal)+(cal12);
//alert(calk);
cal1=eval(calk)*eval(gst)/100;


document.getElementById("gst_amnt"+id).value=Math.abs(cal1);	


//document.getElementById("gst_amnt"+id).value=cal1;
//alert(cal12);
document.getElementById("serv_amnt"+id).value=Math.abs(cal12);	
//document.getElementById("serv_amnt"+id).value=cal12;



}


$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal1();
	calculateTotal2();
	calculateTotal3();
});

</script>
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
		
</body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>