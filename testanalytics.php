
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
<script type='text/javascript' src="../tipsy-master/files/javascripts/jquery.tipsy.js"></script>
<link rel="stylesheet" href="../tipsy-master/files/stylesheets/tipsy.css" type="text/css" />
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
<title>TEST ANALYTICS</title>
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
	 $school_id =  $_SESSION['school_id'];
	$class_id =  $_SESSION['class_id'];
	$section_id =  $_SESSION['section_id'];
$table1 = "mocktest_details_".$school;
$table2 = "mock_questions_".$school ;
$table3 = "mock_section_details_".$school ;
$table4 = "time_remaining_".$school ;
$table5 = "user_response_".$school;
$sec_id = "1";
$testflag1 = false ;
$testflag2 = false ;
$testflag3 = false ;
$sq = "SELECT * FROM $table1 WHERE mock_id = '$mock_id'";
$re = mysqli_query($con,$sq);
$ro = mysqli_fetch_array($re);
$x = 1;
$y = 1;
include("sess_var.php");
include("profiletop.php");
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
	include("sess_var.php") ;
	?>
	 <div class="wrapper">
	 <?php
	  include("headertop.php");
	  ?>
	  <script>
document.getElementById("analtest").className = "active treeview";
</script>
  <div class="content-wrapper" >
   <section class="content" id="contents">
	<?php
// include("profiletop.php") ;
if($ro['test_type'] == 2)
{
	if($ro['test_mode'] == 1)
		  {
			  $testflag1 = true ;
$sql4 = "SELECT * FROM $table4 WHERE user_id = '$user_id' AND mock_id = '$mock_id'";
$result4 = mysqli_query($con,$sql4);
if(mysqli_num_rows($result4) == 1)
{
	$row4 = mysqli_fetch_array($result4);
	if($row4['mock_state'] == 2)
	{
		
include("analyticsgraphs.php");
		  }
		  else
{
	?>
<script type="text/javascript">

document.location = "home.php";
</script>
<?php

}
	}
	else
{
	?>
<script type="text/javascript">
alert(12)
document.location = "home.php";
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
	$testflag2 = true ;	
include("analyticsgraphs.php");  
}
else
{
	?>
<script type="text/javascript">
document.location = "home.php";
</script>
<?php

}
}
}
if($ro['test_type'] == 1)
{
	$testflag3 = true;
$sql4 = "SELECT * FROM $table4 WHERE user_id = '$user_id' AND mock_id = '$mock_id'";
$result4 = mysqli_query($con,$sql4);
if(mysqli_num_rows($result4) == 1)
{
	$row4 = mysqli_fetch_array($result4);
	if($row4['mock_state'] == 2)
	{
   
include("analyticsgraphs.php");
		  }
		  else
{
?>
<script type="text/javascript">
document.location = "home.php";
</script>
<?php

}
	}
else
{
?>
<script type="text/javascript">
document.location = "home.php";
</script>
<?php

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
document.location = "home.php";
</script>
<?php

}

 ?>
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
<div class="control-sidebar-bg"></div>
 </div>

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
		  <?php
}
else
{
	header("location: home.php");
}
?>
</body>
</html>