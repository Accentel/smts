<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');
include'dbfiles/org.php';
include('dbconnection/connection.php');
	$state=$_GET['state'];

	if($state=='AP'){
		$qottable ='add_qot';
		$qotbill ='qot_bill';
		$request_amnt ='request_amnt';
       
	}
	elseif($state=='TG'){
		$qottable ='add_tgqot';
		$qotbill ='tgqot_bill';
		$request_amnt ='tgrequest_amnt';

	 
	}
	 elseif($state=='TN'){
	  $qottable ='add_tnqot';
	  $qotbill ='tnqot_bill';
	  $request_amnt ='tnrequest_amnt';
	
	}
	elseif($state=='KL'){
		$qottable ='add_klqot';
		$qotbill ='klqot_bill';
		$request_amnt ='klrequest_amnt';	
	  
	}
	else if($state=='KN'){
	  $qottable ='add_knqot';
	  $qotbill ='knqot_bill';
	  $request_amnt ='knrequest_amnt';
      	
	}
	elseif($state=='OD'){
	  $qottable ='add_odqot';
	  $qotbill ='odqot_bill';
	  $request_amnt ='odrequest_amnt';	
	}
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
	<style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
</style>
 <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 

    <style>
        strong{
            color:red;
        }
    </style>
    <script>
	function s2(i){
	    var curval= document.getElementById("ac_det"+i).value;
	$.ajax({          
        	type: "GET",
        	url: "getacdetails.php",
        	data:{keyword: curval, id: i},
        	success: function(data){
        		$("#suggesstion-box"+i).show();
			$("#suggesstion-box"+i).html(data);
			$("#ac_det"+i).css("background","#FFF");
        	}
	});
}
	function selectCountry(val,i) {
document.getElementById("ac_det"+i).value=val;
$("#suggesstion-box"+i).hide();
}
	</script>
	
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
function myFunction() {
	var id=$(this).attr('data-row');
	//alert(id);
	var adv=document.getElementById('adv_amnt').value;
	//alert(adv);
	var adv1=document.getElementById('adv_amnt1').value;
	var adv2=document.getElementById('adv_amnt2').value;
	var p=parseFloat(adv)+parseFloat(adv1)+parseFloat(adv2);
	
	var tot=document.getElementById('tot').value;
	//alert(p);	
	
	var k=tot-p;
	//alert(k);
	document.getElementById('bal').value=k;
	if(tot < p){
alert('your advance amount is greater than total amount');

//document.getElementById('adv_amnt'+id).value='0.00';
	
//document.getElementById('adv_amnt1').value='0.00';
//document.getElementById('adv_amnt2').value='0.00';
//document.getElementById('bal').value='0.00';
$("#submit").prop('disabled',true);
	}else{
		$("#submit").prop('disabled',false);
		
	}
}
</script>
	<script>
   
   function test(){
	 var adv=document.getElementById('gst_type').value;
	// alert(adv);
	 if(adv=='With GST'){
		//alert('hr');
$("input[name='gst_amount']").prop('readonly', false);
 		//gst.attributes.required = "required";
	 }else{
		// alert('hr1');
		$("input[name='gst_amount']").prop('readonly', true);
 }
 }
 function test1(){
	  var adv=document.getElementById('gst_type1').value;
	// alert(adv);
	 if(adv=='With GST'){
		//alert('hr');
$("input[name='gst_amount1']").prop('readonly', false);
 		//gst.attributes.required = "required";
	 }else{
		// alert('hr1');
		$("input[name='gst_amount1']").prop('readonly', true);

		 
	 }
	 
 }
 function test2(){
	 var adv=document.getElementById('gst_type2').value;
	// alert(adv);
	 if(adv=='With GST'){
		//alert('hr');
$("input[name='gst_amount2']").prop('readonly', false);
 		//gst.attributes.required = "required";
	 }else{
		// alert('hr1');
		$("input[name='gst_amount2']").prop('readonly', true);

		 
	 }
	
	 
 }
   
     function test3(){
	 var adv=document.getElementById('gst_type3').value;
	// alert(adv);
	 if(adv=='With GST'){
		//alert('hr');
$("input[name='gst_amount3']").prop('readonly', false);
 		//gst.attributes.required = "required";
	 }else{
		// alert('hr1');
		$("input[name='gst_amount3']").prop('readonly', true);

		 
	 }
	
	 
 }
 
  function test4(){
	 var adv=document.getElementById('gst_type4').value;
	// alert(adv);
	 if(adv=='With GST'){
		//alert('hr');
$("input[name='gst_amount4']").prop('readonly', false);
 		//gst.attributes.required = "required";
	 }else{
		// alert('hr1');
		$("input[name='gst_amount4']").prop('readonly', true);

		 
	 }
	
	 
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
 
 
 $(document).on('keyup', '.kal', function(){
 var id=$(this).attr('data-row');
 //alert(id);
 	var adv=document.getElementById('adv_amnt').value;
	//alert(adv);
	var adv1=document.getElementById('adv_amnt1').value;
	var adv2=document.getElementById('adv_amnt2').value;
	var p=parseFloat(adv)+parseFloat(adv1)+parseFloat(adv2);
	
	var tot=document.getElementById('tot').value;
	//alert(p);	
	
	var k=tot-p;
	//alert(k);
	document.getElementById('bal').value=k;
	if(p == tot){

	}
	
	else if(p < tot){
	   // $("#submit").prop('disabled',true);
	    
	}else{
alert('your advance amount is greater than total amount');
document.getElementById('adv_amnt'+id).value='0.00';
//document.getElementById('bal').value='0.00';
calculateTotal22();
//$("#submit").prop('disabled',true);
		
	}
 
 //calculateTotal22();
 
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
 function calculateTotal22(){
	subTotal = 0 ; total = 0; 
	$('.kal').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	
	var p=subTotal.toFixed(2);
	
	var t=$('#tot').val();
	
	var b=t-p;
	$('#bal').val( b.toFixed(2) );
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
                                <a href="#"><?php echo $state; ?> Tracker</a>
                            </li>
                            <li>
                                <a href="bill_list.php?state=<?php echo $state; ?>"> Document List</a>
                            </li>
                            <li>
                                <a href="">Edit Status</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Status

                            </h1>
                        </div>
                  <?php  $qtno=$_GET['id'];
                  $k=mysqli_query($link,"select id from ".$request_amnt." where quet_num='$qtno'") or die(mysqli_error($link));
while($k1=mysqli_fetch_array($k)){
$klarray[]=$k1['id'];
}

						$sq=mysqli_query($link,"select * from ".$qottable." where quet_num='$qtno'");
						$r=mysqli_fetch_array($sq);
						$rono=$r['ro_no'];
						$bal=$r['bal'];
						$id=$r['id'];
						$qtno=$r['quet_num'];
						$falt_desc=$r['falt_desc'];
						
						$y=mysqli_query($link,"select * from ".$request_amnt." where quet_num='$qtno' order by id desc limit 1");
						$y1=mysqli_fetch_array($y);
						$ystatus=$y1['confirm'];
						?>             <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" action="" enctype="multipart/form-data">
 <input type="hidden" name="ids" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
											
											  <tbody><tr><td align="right">QuoteNumber</td><td align="left">
											  <input type="text" readonly="" class="form-control" value="<?php echo $r['quet_num'];?>" name="qt_no" id="qt_no"></td>
                                        <td align="right">Reason</td><td> <input type="text" class="form-control" value="" name="reason" id="reason"></td>
                                        </tr>
										<tr><td align="right">Fault Decription</td><td align="left">
										<textarea  readonly name="falt_desc" id="falt_desc"  class="form-control"> <?php echo $r['falt_desc'];?> </textarea></td>	
                                       <td align="right">Upload File</td><td align="left">
									<input type="file" name="ufile" id="ufile" class="form-control"/>
										
										</td>
                                        </tr>
                                      
                                      
                                      
										
									<input type="hidden" name="id1" id="adv_amnt" class="form-control" value="<?php echo $r1['id'];?>">
                                        </tbody></table>
                                        <table>
                                       <tr>
									   <td colspan="4">
									   <table class="table">
									   <tr>
									   <th>S NO</th>
									   <th>GST</th>
									   <th>Advance Amount</th>
									   <th>GST Amount</th>
									   <th>Advance Date</th>
									   <th>Ac Details</th>
									   </tr>
									   <tr>
									   <th>1</th>
									   <th>
										<select name="gst_type" id="gst_type" class="form-control" disabled onChange="test()">
									    <option value="">Select GST</option>
									    <option value="With GST" <?php if($r['gst_type']=="With GST"){echo 'selected';} ?>>With GST</option>
									     <option value="Without GST" <?php if($r['gst_type']=="Without GST"){echo 'selected';} ?>>Without GST</option>
										</select>
										
										</th>
									  <th> <input type="text" name="adv_amnt" 
										id="adv_amnt"   data-row="" <?php if(($r['adv_amnt']!='0.00')    or ($ystatus=='Pending')){ echo 'readonly';}else{ echo ''; } ?>  class="form-control kal"  value="<?php echo $r['adv_amnt'];?>" >
										
										<input type="hidden" name="kl1" id="kl1" value="<?php  echo $klarray[0];  ?>"/></th>
										<th> <input type="text" name="gst_amount" 
										id="gst_amount"    class="form-control" readonly value="<?php echo $r['gst_amount'];?>" ></th>
										<td><input  name="adv_date" 
										id="sub_type"  class="form-control" <?php if($r['adv_amnt']!='0.00'){  echo 'type="text"'.'readonly';}else{ echo 'type="date"'; } ?>       value="<?php if($r['adv_amnt']!='0.00'){ echo  $r['adv_date'];}else{ echo date('Y-m-d');}?>"></td>
										
									   <th><input id="ac_det1"  <?php if($r['adv_amnt']!='0.00'){ echo 'readonly';}else{ echo ''; } ?> class="form-control" name="ac_det1" value="<?php echo $str=$r['ac_det1'];?>"  onkeyup='s2(1)'><div id='suggesstion-box1'></div>
</th>

									   </tr>
									   
									   
									   <tr>
									   <th>2</th>
									   <td><select name="gst_type1" id="gst_type1" disabled class="form-control" onChange="test1()">
									    <option value="">Select GST</option>
									    <option value="With GST" <?php if($r['gst_type1']=="With GST"){echo 'selected';} ?>>With GST</option>
									     <option value="Without GST" <?php if($r['gst_type1']=="Without GST"){echo 'selected';} ?>>Without GST</option>
										</select></td>
									   
									   <td >
										<input type="text" name="adv_amnt1" data-row="1"
										id="adv_amnt1"   class="form-control kal"   readonly value="<?php echo $r['adv_amnt1'];?>">
										<input type="hidden" name="kl2" id="kl2" value="<?php  echo $klarray[1];  ?>"/>
										</td>	
									   <td >
										<input type="text" name="gst_amount1" 
										id="gst_amount1"   class="form-control kal" readonly  value="<?php echo $r['gst_amount1'];?>"></td>
									   <td><input type="date" name="adv_date1" 
										id="sub_type"  class="form-control" readonly     value="<?php if($r['adv_amnt1']!='0.00'){ echo  $r['adv_date1'];}else{ echo date('Y-m-d');}?>"></td>
									   
									   <td align="left">
										
										<input id="ac_det2"  class="form-control" name="ac_det2" readonly value="<?php echo $str=$r['ac_det2'];?>"  onkeyup='s2(2)'><div id='suggesstion-box2'></div>

</td>

									   </tr>
									   
									   <tr>
									   <th>3</th>
									   	<td><select name="gst_type2" disabled id="gst_type2" class="form-control" onChange="test2()">
									    <option value="">Select GST</option>
									    <option value="With GST" <?php if($r['gst_type2']=="With GST"){echo 'selected';} ?>>With GST</option>
									     <option value="Without GST" <?php if($r['gst_type2']=="Without GST"){echo 'selected';} ?>>Without GST</option>
										</select></td>	   
									   <td >
										<input type="text" name="adv_amnt2" data-row="2"
										id="adv_amnt2"   class="form-control kal" readonly     value="<?php echo $r['adv_amnt2'];?>">
										<input type="hidden" name="kl3" id="kl3" value="<?php  echo $klarray[2];  ?>"/>
										</td>	
										<td >
										<input type="text" name="gst_amount2" 
										id="gst_amount2"     class="form-control" readonly value="<?php echo $r['gst_amount2'];?>"></td>	
										
									   <td><input type="date" name="adv_date2" 
										id="sub_type"  class="form-control" readonly   value="<?php if($r['adv_amnt2']!='0.00'){ echo  $r['adv_date2'];}else{ echo date('Y-m-d');}?>"></td>
									   
									   
									   <td><input id="ac_det3"  readonly class="form-control" name="ac_det3" value="<?php echo $str=$r['ac_det3'];?>"  onkeyup='s2(3)'><div id='suggesstion-box3'></div>
</td>
									   </tr>
									   
									   
									   
									   <tr>
									   <th>4</th>
									   	<td><select name="gst_type3" id="gst_type3" disabled class="form-control" onChange="test3()">
									    <option value="">Select GST</option>
									    <option value="With GST" <?php if($r['gst_type3']=="With GST"){echo 'selected';} ?>>With GST</option>
									     <option value="Without GST" <?php if($r['gst_type3']=="Without GST"){echo 'selected';} ?>>Without GST</option>
										</select></td>	   
									   <td >
										<input type="text" name="adv_amnt3" data-row="2"
										id="adv_amnt3"   class="form-control kal" readonly   value="<?php echo $r['adv_amnt3'];?>">
										<input type="hidden" name="kl4" id="kl4" value="<?php  echo $klarray[3];  ?>"/>
										</td>	
										<td >
										<input type="text" name="gst_amount3" 
										id="gst_amount3"     class="form-control" readonly  value="<?php echo $r['gst_amount3'];?>"></td>	
										
									   <td><input type="date" name="adv_date3" 
										id="sub_type"  class="form-control" readonly      value="<?php if($r['adv_amnt3']!='0.00'){ echo  $r['adv_date3'];}else{ echo date('Y-m-d');}?>"></td>
									   
									   
									   <td><input id="ac_det4"  readonly class="form-control" name="ac_det4" value="<?php echo $str=$r['ac_det4'];?>"  onkeyup='s2(4)'><div id='suggesstion-box4'></div>
</td>
									   </tr>
									   
									   
									   <tr>
									   <th>5</th>
									   	<td><select name="gst_type4" id="gst_type4" disabled class="form-control" disabled onChange="test4()">
									    <option value="">Select GST</option>
									    <option value="With GST" <?php if($r['gst_type4']=="With GST"){echo 'selected';} ?>>With GST</option>
									     <option value="Without GST" <?php if($r['gst_type4']=="Without GST"){echo 'selected';} ?>>Without GST</option>
										</select></td>	   
									   <td >
										<input type="text" name="adv_amnt4" data-row="2"
										id="adv_amnt4"   class="form-control kal" readonly  value="<?php echo $r['adv_amnt4'];?>">
										<input type="hidden" name="kl5" id="kl5" value="<?php  echo $klarray[4];  ?>"/>
										</td>	
										<td >
										<input type="text" name="gst_amount4" 
										id="gst_amount4"     class="form-control" readonly  value="<?php echo $r['gst_amount4'];?>"></td>	
										
									   <td><input type="date" name="adv_date4" 
										id="sub_type"  class="form-control"  readonly     value="<?php if($r['adv_amnt4']!='0.00'){ echo  $r['adv_date4'];}else{ echo date('Y-m-d');}?>"></td>
									   
									   
									   <td><input id="ac_det5"  readonly class="form-control" name="ac_det5" value="<?php echo $str=$r['ac_det5'];?>"  onkeyup='s2(5)'><div id='suggesstion-box5'></div>
</td>
									   </tr>
									   
									   
									   
									   
									   
									   </table>
									   
									   
									   </td>
									   </tr>

										 <tr><td >Balance Amount</td><td align="left">
										<input type="text" readonly name="bal" 
										id="bal"  class="form-control" value="<?php echo $r['bal'];?>"></td>	
                                        <td></td>
										<td></td>
                                        </tr>
										
                                        </table>
                                        <?php  $tt=$r['total_amnt'];
										$tt1=$r['total_sgst'];
										$inv_no=$r['invoice_no'];
										
										?>
                                        
                                        
                                        <?php 
										//$aa="select * from add_bill where id1='$id'";
										/*$aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst,
										sum(b.tax_amnt) as tax,sum(b.gst_amnt) as gs
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and a.category=b.temp_type";*/
//$/t=mysqli_query($link,$aa) or die(mysqli_error($link));?>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                       
                                      
                                          <?php ?>
       
                         <?php ?>
						 <br/><br/>
                         <div class="table-responsive">
                                            
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        <?php ?>
									
										<button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>
										
										<?php if(isset($_POST['update'])){
										   
										/*	$id=$_POST['ids'];
										
											
											//if($inv_sub_date!=''){ $st="Paid"; }
									    	//else {
											//$st="Un Paid";
										    //}
													$iname = $_FILES['ufile']['name'];
                                        			 if($iname!= ""){
                                        	$code = md5(rand());
                                        	 $iname =$code. $_FILES['ufile']['name'];
                                        	$tmp = $_FILES['ufile']['tmp_name'];
                                        	 $dir = "upload";
                                        		       $destination =  $dir . '/' . $iname;
                                        		         move_uploaded_file($tmp, $destination);
                                        	 $iname1 =$code. $_FILES['ufile']['name'];
                                        	$iname1 = ($iname1);
                                        	}else{
                                        	 $iname1 = ($img1);
                                        	}		
												$id=$_GET['id'];
											
											$transfer='0.00';
											
											
												$confirm="Cancel";
											
											 // $dd="update ".$request_amnt." set confirm='$confirm',approve_amnt='$transfer',gstamt='0.00',req_amnt='0.00',req_date='0000-00-00',transfer='0.00',ac_det='',gsttype='',
											 // status='Cancel' where quet_num='$id'";
											 	$dd="delete from ".$request_amnt." where quet_num='$id'";
											$ssq=mysqli_query($link,$dd) or die(mysqli_error($link));
											
											//exit;
											 $dd1="update ".$qottable." set adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_date='0000-00-00',adv_date1='0000-00-00',adv_date2='0000-00-00',
											 ac_det1='',ac_det2='',ac_det3='', gst_type='',bal='',status='work to be started', gst_type1='', gst_type2='',gst_amount='0.00',gst_amount1='0.00',gst_amount2='0.00' where quet_num='$id'";
											$ssq1=mysqli_query($link,$dd1);
											
											print "<script>";
			print "alert('Amount Approved Cancel');";
			print "self.location='bill_list.php';";
			print "</script>";*/
			
			
			
			
			if(isset($_POST['update'])){
	  $id=$_POST['ids'];
	    $qt_no=$_POST['qt_no']; 
   
	
	$ses=$_POST['ses'];
	

$reason=$_POST['reason'];


											$iname = $_FILES['ufile']['name'];
                                        			 if($iname!= ""){
                                        	$code = md5(rand());
                                        	 $iname =$code. $_FILES['ufile']['name'];
                                        	$tmp = $_FILES['ufile']['tmp_name'];
                                        	 $dir = "upload";
                                        		       $destination =  $dir . '/' . $iname;
                                        		         move_uploaded_file($tmp, $destination);
                                        	 $iname1 =$code. $_FILES['ufile']['name'];
                                        	$iname1 = ($iname1);
                                        	}else{
                                        	 $iname1 = ($img1);
                                        	}		

	
	
		    $v="update ".$qottable." set status='work to be started',
		 adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_amnt4='0.00',adv_date='0000-00-00',
		 adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',adv_date4='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',ac_det5='',bal='',
		 gst_type='',gst_type1='',gst_type2='',gst_type3='',gst_type4='',gst_amount='0.00',gst_amount1='0.00',
gst_amount2='0.00',gst_amount3='0.00',gst_amount4='0.00',reason='$reason',doctoworkrevertfile='$iname1'		
	
	  where id='$id' ";
	  
	  
	  	
											
										
	//ro_no='$ro_no',ro_date='$ro_date', po_no='$po_no',po_date='$po_date',po_type='$po_type',status='$status',
	$sq=mysqli_query($link,$v) or die(mysqli_error($link));


											 echo	$dd="delete from ".$request_amnt." where quet_num='$qt_no'";
										
											$ssq=mysqli_query($link,$dd) or die(mysqli_error($link));
											
											
	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='bill_list.php?state=$state';";
	print "</script>";

}

}
			
										}?>
								
									

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="bill_list.php?state=<?php echo $state; ?>"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
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
  data +="<td><input type='text' name='brand[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='brand"+i+"' /> </td>";          
data +="<td><input type='text' name='model[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='model"+i+"' /> </td>";                   
 
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