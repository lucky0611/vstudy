<!DOCTYPE html>
<head>
<link rel= "stylesheet" href="buttonstyle.css" type="text/css" media="screen" />
<head>
<!--jquery links -->
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.css">
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.theme.css">
<script src="../jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="../jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<title> Instructions </title>
<script type="text/javascript" src="browserdetect.js"></script>  
<script type="text/javascript" src="starttest.js?v=1.01">
 
 </script> 
     <body oncontextmenu="return false" >
 <script type="text/javascript">
	flagres = false ;
	flagstar = false ;
 </script>
 <style>
#topheader
{
background-color:#3c8dbc;

height:50px	;

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
#down:hover
{
	cursor:pointer;
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
<?php
session_start();
include("connect.php");
if(isset($_SESSION['password']) && isset($_SESSION['username']) && !empty($_GET['id']))
{
	$school_name = $_SESSION['school_name'];
	
$user_id = $_SESSION['user_id'];
$_SESSION['mock_id'] = $_GET['id'];
$mocktest_id = $_GET['id'];
date_default_timezone_set("Asia/Kolkata");
$model = $_SESSION['model'] ;


$sql = "SELECT * FROM user_details WHERE user_id ='$user_id'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) == 1)
{
$row = mysqli_fetch_array($result);
 $time_login1 = $row['time_login'];
 $time_diff =0 ;
 
 if($time_login1 != NULL)
 {
	 $time_login = strtotime($time_login1);
	 $time_diff =  time() - $time_login ;
	 $time_open =  $time_login - time()
	  ;
	  $time_min = intval($time_open/60);
	  $time_sec = $time_open % 60 ;
	// echo $time_diff ;
	 
 }
}
include("sess_var.php");
?>

<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<style>

@font-face 
{
 src: url('../font/Lato-Regular.ttf');
 font-family: 'Lato';
}
body 
{
font-family: 'Lato', sans-serif;
}
</style>
<div class="container-fluid"  >
<nav class="navbar navbar-fixed-top">
<div class="col-xs-12" id="topheader">
<div class="col-xs-2">
<?php
$logo = "logo2.png";
?>
<img src="<?php echo $logo ;?>" style="width:45px;height:45px">
</div>

<div class="col-xs-3" style="margin-top:8px;color:white;font-size:24px">
<?php
if($_SESSION['demo'] == 0)
{
	echo "DEMO VERSION";
}
?>
</div>
<div class="col-xs-1">
</div>
 
<div class="col-xs-1">
</div>
<div class="col-xs-1" >
</div>

<div class="col-xs-1">

</div>

<div class="col-xs-3" id="logoutdiv" >
<?php
if(empty($image))
 {
	 
	 if($gender == "m")
	 {
		 $im = "../profilepic/male.jpg" ;
	 }
	 if($gender == "f")
	 {
		 $im = "../profilepic/female.jpg" ;
	 }
		
 }
 else if(!empty($image))
 {
	 if($model == 2 || $model == 3)
		{
		$im = $image ;	
		}
		else
		{
	 $im = "../profilepic/".$image ;
		}
 }
?>
<p style="color:white;margin-top:10px;font-size:16px;float:right"><img src="<?php echo $im ;?>" style="height:30px;width:30px;z-index:100" />&nbsp;
<?php echo $firstname ;?>&nbsp;&nbsp;</p>
</div>
</div>
<div class="row">
<div class="col-xs-10" >
</div>
<div class="col-xs-2" style="position:relative;z-index:100;">
<div id="show" style="width:90%;z-index:100;margin-top:0px;position:absolute;left:0px;top:0px;-webkit-box-shadow: 2px 0 2px 2px #969696; -moz-box-shadow: 2px 0 2px 2px #969696;
  box-shadow: 2px 0 2px 2px #969696;display:none;background-color:white">

</div>
</div>
</div>
</nav>
</div>
<br />
<?php
$curr1 = time() ;
$curr = date('Y-m-d H:i:s', $curr1) ;
$query = "UPDATE user_details SET time_login ='$curr' WHERE  user_id = '$user_id' ";
$res = mysqli_query($con, $query);
$mocks_id = $_GET['id'];
$_SESSION['mock_id'] = $_GET['id'];
//$_SESSION['mock_id'] = $mock_id ;
$row = mysqli_fetch_array($result);
 $time_login1 = $row['time_login'];
 $time_diff =0 ;	
 $s = "SELECT school_name FROM school_details WHERE school_id = (SELECT school_id FROM user_login WHERE user_id = '$user_id') ";
	 $re = mysqli_query($con,$s);
	 $rew = mysqli_fetch_array($re);
	 $school_name = $rew['school_name'];
 $table1 = "time_remaining_".$school_name ;
 
$query3 =  "SELECT * FROM $table1 WHERE mock_id ='$mocks_id' AND user_id = '$user_id' AND mock_state ='2'";
$result3 = mysqli_query($con,$query3);
if(mysqli_num_rows($result3) == 0)
{
	$class = $_SESSION['class_name'];
	  $school = $_SESSION['school_name'];
	 $section = $_SESSION['section'];
	 $table1 = "mocktest_details_".$school;
	 $tab = "time_remaining_".$school ;	
	  $sql1 = "SELECT * FROM $table1 WHERE mock_id = '$mocks_id' ";
	  $result1 = mysqli_query($con,$sql1);
      $row1 = mysqli_fetch_array($result1);
	  $mock = $row1['mock_name'];
	  $_SESSION['mock_name'] = $row1['mock_name']; 
	  $num_sec = $row1['num_of_sections'];
	  $insert = $user_id.$mocks_id.microtime() ;
	  $_SESSION['start'] = "start" ;
	  ?>
<script type="text/javascript">
user_id = "<?php echo $user_id ;?>";
mock_id = "<?php echo $mocks_id; ?>"
insert = "<?php echo $insert ;?>";
</script>
<div class="container-fluid">
<div class="row" style="background-color:#666666">
<br /><br />
<div class="col-xs-12">
<div class="col-xs-5">
	<p style="font-size:18px;color:white;line-height:1.2">System Name :<br />
	<span style="color:yellow;font-size:40px">MY PC</span></br>
<span style="font-size:17px;color:white">Verify that the Name shown on the screen is yours</span></p>

</div>
<div class="col-xs-2" >
</div>
<div class="col-xs-3" >
	<p style="font-size:18px;color:white;line-height:1.2;text-align:right">Candidate Name :<br /><span style="color:yellow;font-size:38px"><?php echo $firstname ;?></span></br>
<span style="font-size:18px;color:white">Subject : <span style="font-size:16px;color:yellow">Mock Exam</span></span></p>
</div>
<div class="col-xs-2" style="" align="right">
	<img src="dp.png" style="width:120px;height:124px"/>

</div>
<br />
</div>	
</div>
</div>
<div class="col-xs-12">
<br /><br /><br /><br /><br /><br /><br /><br />
<div class="col-xs-5">
</div>
<?php
$tables1 = "time_remaining_".$school_name;
$sqllis = "SELECT * FROM mock_added_list WHERE user_id = '$user_id' AND mock_id = '$mocktest_id' ";
 $resllis = mysqli_query($con,$sqllis);
		 if(mysqli_num_rows($resllis) > 0)
		 {
			 
			  $qas = "SELECT * FROM $tables1 WHERE mock_id = '$mocktest_id' AND user_id = '$user_id' AND mock_state = '2'";
	 $rts = mysqli_query($con,$qas);
	 if(mysqli_num_rows($rts) == 0)
	 {
		 ?>
<div class="col-xs-5">
<input type = "submit" name="submittest" class ="btn btn-success" style="font-size:26px;outline:none" onclick ="movefor()" value = "  Go to Test Window "/>
</div>
<?php
	 }
	 else
	 {
		 ?>
		<div class="col-xs-5">
<h4 style="font-weight:bolder">This mock has been already taken.</h4>
</div>		
		 <?php
	 }
		 }
		 else
	 {
		 ?>
		<div class="col-xs-5">
<h4 style="font-weight:bolder">You are not allowed to take this mock.</h4>
</div>		
		 <?php
	 }
?>
</div>
<div class="container-fluid" style="position:absolute;bottom:0px;width:100%">
<div class="row" style="background-color:#617b8c;color:white;font-size:18px" align="middle">
Version 1.0.0
  </div>
  </div>
<?php 
	}

else
{
 ?>
      <script type="text/javascript">
time_up = false ;
</script>
         <div style="float:left;margin:10%;margin-left:30%;-webkit-box-shadow: 2px 0 5px 4px #969696;-moz-box-shadow: 2px 0 5px 4px #969696;box-shadow: 2px 0 5px 4px #969696;width:40%;border-top:40px solid #1472cc">
		 <p style="text-align:center;font-size:22px;font-weight:bold">This Mock Test has been submitted.</p>
        
         <br /><br />
         </div>     
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
						
