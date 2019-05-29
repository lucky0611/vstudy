<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>KEY & SOLUTIONS</title>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php
session_start() ;
date_default_timezone_set("Asia/Kolkata");
if( isset($_SESSION['username'] ) && isset($_SESSION['password']) && isset($_SESSION['class_name']) && isset($_SESSION['school_name']) && isset($_SESSION['section']) &&isset($_GET['mock_id']) )
{
	include("connect.php");
	mysqli_set_charset($con,"utf8");
mysqli_query($con,"SET NAMES 'utf8'");
	
	 $class = $_SESSION['class_name'];
	  $school = $_SESSION['school_name'];
	 $section = $_SESSION['section'];
	 $user_id = $_SESSION['user_id'];
	 $mock_id = $_GET['mock_id'] ;
$table1 = "mocktest_details_".$school;
$table2 = "mock_questions_".$school ;
$table9 = "mock_questions_hindi_".$school ;
$table3 = "mock_section_details_".$school ;
$table4 = "time_remaining_".$school ;
$sec_id = "1";
$sq = "SELECT * FROM $table1 WHERE mock_id = '$mock_id'";
$re = mysqli_query($con,$sq);
$ro = mysqli_fetch_array($re);
$x = 1 ;
$y = 1 ;
if($_SESSION['demo'] == 1)
{
	if($ro['demo'] == 0)
	{
		
		$flags = true;
	}
	if($ro['demo'] == 1)
	{
		$flags = false;
	}
}
if($_SESSION['demo'] == 0)
{
	if($ro['demo'] == 1)
	{
		$flags = true;
	}
	if($ro['demo'] == 0)
	{
		$flags = false;
	}
}
if($flags == true)
{
if($ro['test_type'] == 2)
{
	if($ro['test_mode'] == 1)
		  {
$sql4 = "SELECT * FROM $table4 WHERE user_id = '$user_id' AND mock_id = '$mock_id'";
$result4 = mysqli_query($con,$sql4);
if(mysqli_num_rows($result4) == 1)
{
	$row4 = mysqli_fetch_array($result4);
	if($row4['mock_state'] == 2)
	{
   
include("keysol.php");
		  }
		  else
{
?>
<script type="text/javascript">
document.location = "login.php";
</script>
<?php
}
	}
	else
{
?>
<script type="text/javascript">
document.location = "login.php";
</script>
<?php
}
}
if($ro['test_mode'] == 2)
{
$test_endtime = strtotime($ro['end_time']) ;
$time_new = $test_endtime + 86400 ;
if(time() > $time_new)
{
include("keysol.php");  
}
else
{
?>
<script type="text/javascript">
document.location = "login.php";
</script>
<?php
}
}
}
if($ro['test_type'] == 1)
{
$sql4 = "SELECT * FROM $table4 WHERE user_id = '$user_id' AND mock_id = '$mock_id'";
$result4 = mysqli_query($con,$sql4);
if(mysqli_num_rows($result4) == 1)
{
	$row4 = mysqli_fetch_array($result4);
	if($row4['mock_state'] == 2)
	{
   
include("keysol.php");
		  }
		  else
{
?>
<script type="text/javascript">
document.location = "login.php";
</script>
<?php
}
	}
	}
?>
</div>
<?php
}
else
{
?>
<script type="text/javascript">
document.location = "login.php";
</script>
<?php
}
}
else
{
?>
<script type="text/javascript">
document.location = "login.php";
</script>
<?php
}
?>
</body>
</html>