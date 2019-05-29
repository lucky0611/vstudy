<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recharge Wallet|vS Wallet</title>
<!--jquery links -->

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
<style>
#topheader
{
background-color:#03376a;
border-radius:5px;
height:50px	;
background: linear-gradient(#054888 ,#1472cc);
background: -webkit-linear-gradient(#054888 ,#1472cc);
background: -o-linear-gradient(#054888 ,#1472cc);
background: -moz-linear-gradient(#054888 ,#1472cc);
}
a:link {
	text-decoration:none ;
}
/* mouse over link */
a:visited {
    text-decoration:none ;
}
a:hover {
    text-decoration:none ;
}
#homediv:hover,#profilediv:hover
{
	background-color:#054888 ;
	text-decoration:none;
}
#down:hover
{
	cursor:pointer;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
</style>
<script>
$(document).ready(function() {
 $('#down').click(function(evt) {
    $('#show').css("display","block");
	evt.stopPropagation();
}); 
$(document).click(function() {
    $('#show').css("display","none");
});  
});

function changecol(y)
{
	y.style.backgroundColor = "#1472cc";
	document.getElementById("editprof1").style.color = "white"
}
function changecol1(y)
{
	y.style.backgroundColor = "white"
	document.getElementById("editprof1").style.color = "black"
}
function changecol2(y)
{
	y.style.backgroundColor = "#1472cc";
	document.getElementById("logout1").style.color = "white"
}
function changecol21(y)
{
	y.style.backgroundColor = "white";
	document.getElementById("logout1").style.color = "black"
}

</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
 session_start();
 include("connect.php");
 if(isset($_SESSION['username']) && isset($_SESSION['password']))
{
	date_default_timezone_set("Asia/Kolkata");
	include("sess_var.php") ;
   include("profiletop.php") ;
	 $school = $_SESSION['school_name'] ;
	 $class = $_SESSION['class_name'] ; 
	 $section = $_SESSION['section'] ;
	 $table1 = "mocktest_details_".$school;
	 $table2 = "time_remaining_".$school;
	  
	 $x = 1 ;
$y = 1 ;
	 ?>
	 <div class="wrapper">
	  <?php
	  include("headertop.php");
	  ?>
	  <script>
document.getElementById("testinfo").className = "active treeview";
</script>
   <div class="content-wrapper" >
   <section class="content" id="contents">
<div class="row">
<br /><br />
</div>
<div class="col-xs-12" align="center">
<h4>No need to purchase any package.  Recharge your <b>vS wallet</b> <img src="wallet.png" style="width:40px;height:40px" alt="wallet"> just with <b> Rs 200</b> and create your test package according to your need !!!!</h4>
</div>
<div class="col-xs-12" align="center">

<h4>Recharge Validity -  <b>6 Months</b> </h4>
</div>
<div class="col-xs-12" align="center">
<br /><br />
<table class="table table-striped">
<tr>
<th style="text-align:left">S. No</th>
<th style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th style="text-align:left">Steps</th>
</tr>
<tr>
<td style="text-align:left" colspan="2">Step 1</td>

<td style="text-align:left">Recharge your wallet just with Rs 200 by clicking "<b>Proceed to Recharge</b>" button below</td>
</tr>
<tr>
<td style="text-align:left" colspan="2">Step 2</td>

<td style="text-align:left">Once you recharge , balance will be added to your wallet</td>
</tr>
<tr>
<td style="text-align:left" colspan="2">Step 3</td>

<td style="text-align:left">Go to home page and add mocks to your container you want to take.Balance will be deducted accordingly</td>
</tr>
<tr>
<td style="text-align:left" colspan="2">Step 4</td>

<td style="text-align:left">Take mock and Enjoy Learning !!</td>
</tr>
</table>
</div>

<div class="row" align="center">
<div class="col-xs-12">
<br />
</div>
<div class="col-xs-12" align="center">

<button onclick="document.location='paytmKit/pgRedirect.php'" type="button" class="btn btn-primary" style="outline:none" >Proceed To Recharge</button>
</div>

</div>
 <script>
		 updatewallet();
 function updatewallet()
 {
	 $.ajax({
     type: "POST",
     url: 'updatewallet.php',
     data: {"user_id":"<?php echo $user_id ; ?>"},
     success: function(response){
        // alert(response);
		document.getElementById("wallet").innerHTML = response ;
     }
     });
	 
 }
 setInterval(function(){ 
updatewallet();
}, 7000);
  </script>
		 </section>
		 </div>
		
		 <!-- /wrapper -->
 
 
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
		 <div class="control-sidebar-bg"></div>
 </div>

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<?php
}
 ?>
</body>
</html>