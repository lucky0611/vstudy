<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--jquery links -->
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.css">
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.theme.css">
<script src="../jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="../jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link rel= "stylesheet" href="formstyle.css" type="text/css" media="screen" />
<script src="../bootstrap/js/bootstrap.min.js"></script>
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
<title>Enter Token</title>
</head>
<body>
<?php
session_start() ;
date_default_timezone_set("Asia/Kolkata");
if( isset($_SESSION['username'] ) && isset($_SESSION['password']) && isset($_SESSION['class_name']) && isset($_SESSION['school_name']) && isset($_SESSION['section']) )
{
	include("connect.php");
	// $class = $_SESSION['class_name'];
	  $school = $_SESSION['school_name'];
	 $section = $_SESSION['section'];
	 $user_id = $_SESSION['user_id'];
$table1 = "mocktest_details_".$school;
$table2 = "mock_questions_".$school ;
$table3 = "time_remaining_".$school ;
  $user_id = $_SESSION['user_id']; 
 include("sess_var.php") ;
 include("profiletop.php") ;
 $subschool_id = $_SESSION['subschool_id'] ;

?>
<div class="container-fluid">

<?php
if(isset($_POST['entertoken']) && isset($_POST['token']))
{
	
	$token = $_POST['token'];
$sqls ="SELECT * FROM token_value WHERE token_number='$token' AND subschool_id='$subschool_id'";
$ress = mysqli_query($con,$sqls);
include("delcon.php");
			$sql4 = "SHOW TABLES FROM $delcon";
		$result4 = mysqli_query($con,$sql4);
		while($row4 = mysqli_fetch_array($result4))
		{
		$tablename = $row4[0];
  		if($tablename != 'user_login' && $tablename != 'user_details')
		{
		$query1 = "DELETE FROM $tablename WHERE user_id = '$user_id'";
		$resul1 = mysqli_query($con,$query1);
		}
		}
if(mysqli_num_rows($ress) == 1)
{
	$rowss = mysqli_fetch_array($ress);
	$token_id = $rowss['token_id'];
	$choice = $rowss['period_month'];
	$package_id = $rowss['package_id'];
	$cur=date('Y-m-d',time());
	if($choice==3)
		{
			$da=date('Y-m-d',strtotime("+3 months"));
		}
		else if($choice==6)
		{
			$da=date('Y-m-d',strtotime("+6 months"));
		}
		else if($choice==9)
		{
			$da=date('Y-m-d',strtotime("+9 months"));
		}
		else if($choice==12)
		{
			$da=date('Y-m-d',strtotime("+1 year"));
		}
		$sqls2 = "UPDATE user_details set act_state='1', time_action='$cur', active_till='$da',package_id='$package_id' where user_id='$user_id'";
		mysqli_query($con,$sqls2);
	$sqls1 = "DELETE FROM token_value WHERE token_id='$token_id'";
	mysqli_query($con,$sqls1);
	?>
    <div class="col-xs-12">
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>
    <div class="col-xs-3">
    </div>
    <div class="col-xs-6 alert alert-success" align="center">
    <strong>Success!</strong> Token Number matched.You are now Registered.
    </div>
    <div class="col-xs-3">
    </div>
     <?php
	
}
if(mysqli_num_rows($ress) == 0)
{
	?>
    <div class="col-xs-12">
<br /><br />
</div>
    <div class="col-xs-3">
    </div>
    <div class="col-xs-6 alert alert-danger" align="center">
    <strong>Failure!</strong> Token Number mismatched.Please Enter token number correctly.
    </div>
    <div class="col-xs-3">
    </div>
    <div class="col-xs-12">
<br /><br /><br /><br /><br />
</div>
    
    <?php
	include("tokenform.php");
}
}
else
{
	?>
    <div class="col-xs-12">
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>
    <?php
	include("tokenform.php");
}
}
else
{
header("location : login.php");
}
?>


</div>
</form>
<div style="position:fixed;bottom:0px;width:100%">
<img src="footer1.jpg" style="width:100%" alt="footer">
</div>

</body>
</html>