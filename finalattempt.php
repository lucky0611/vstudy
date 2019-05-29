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
<title>Final Attempt</title>

 <script type="text/javascript" src="browserdetect.js"></script>  
<style>
@font-face 
 {
 src: url('../font/Lato-Regular.ttf');
 
}
body 
{
	font-family: 'Lato', sans-serif;
}
table
{
 -webkit-box-shadow: 2px 0 5px 4px #969696;
  -moz-box-shadow: 2px 0 5px 4px #969696;
  box-shadow: 2px 0 5px 4px #969696;	
}
</style>
</head>
  
<body>
<?php
session_start();
if(isset($_SESSION['password']) && isset($_SESSION['username']) && isset($_SESSION['mock_id']) && isset($_GET['value']) && isset($_GET['id']) && isset($_GET['mock_id']))
{
	
	?>
    <div class="container-fluid">
	<?php
	
date_default_timezone_set("Asia/Kolkata");
include("connect.php");
$class = $_SESSION['class_name'];
	    $school = $_SESSION['school_name'];
	    $section = $_SESSION['section'];
		$mock = $_SESSION['mock_name'] ;
		$user_id = $_SESSION['user_id'];
		$num_sec = $_SESSION['num_of_sections']  ;
$insert = $_GET['value'] ;
$combine_id = $_GET['id'] ;
$test_mode = $_SESSION['test_mode'];
$mock_id = $_GET['mock_id'];
$table4 = "test_question_".$school;
$table5 = "time_remaining_".$school;
$table6 = "start_test_".$school;
$sql1 = "SELECT * FROM $table4 WHERE combine_id = '$combine_id' ";
$result1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($result1) ==1)
{
	$row1 = mysqli_fetch_array($result1);
	if($row1['temp'] == $insert)
	{	
		$tablespace = "user_response $school" ;
		$table = str_replace(" ", "_", $tablespace);
		$table2 = "mock_section_details_".$school ;
		$sqlque = "UPDATE user_details SET time_login = null WHERE  user_id = '$user_id' ";
$res = mysqli_query($con, $sqlque);
$sqlque1 = "UPDATE $table5 SET mock_state = '2',end_time = NOW() WHERE  user_id = '$user_id' AND mock_id = '$mock_id' ";
$res1 = mysqli_query($con, $sqlque1);
		?>
<div class="row">
    <div id="logo" class="col-sm-12" style="width:100%;height:77px;background-color:#075caf;background-image: url(logo.jpg);background-size:55px 55px ;background-repeat:no-repeat;background-position: 10px 10px">
<h1 id="header" style="color:white ;text-align:center">
ATTEMPT SUMMARY </h1>
   </div>
   </div>
   <br />
   <div class="row">
   <div class="col-xs-5">
   </div>
   <div class="col-xs-2" style="text-align:center">
   <p style="font-size:22px"><b>Exam Summary</b></p>
   </div>
   <div class="col-xs-5">
   </div>
   </div>
   <br /><br /><br />
   
 <table class="table-bordered"  style="width:100%;">
 <tr style="text-align:center" >
 <th style="background-color:#C7DCF0;height:50px;text-align:center">Section Name</th>
  <th style="background-color:#C7DCF0;height:50px;text-align:center">No. of Questions</th>
  <th style="background-color:#C7DCF0;height:50px;text-align:center">Answered</th>
  <th style="background-color:#C7DCF0;height:50px;text-align:center">Not Answered</th>
  <th style="background-color:#C7DCF0;height:50px;text-align:center">Marked for Review</th>
  <th style="background-color:#C7DCF0;height:50px;text-align:center">Not visited</th>
 </tr>
 <?php
 $count = array();
 $count1 = array();
 $count2 = array();
 for($i = 1;$i <= $num_sec;$i++)
 {
	 $count[$i] = 0;
	 $count1[$i] = 0;
	 $count2[$i] = 0;
	 $sql3 = "SELECT * FROM $table2 WHERE section_id = '$i' AND mock_id ='$mock_id'";
	 $result3 = mysqli_query($con,$sql3);
	 $row3 = mysqli_fetch_array($result3);
	 $sql2 =  "SELECT * FROM $table WHERE  user_id = '$user_id' AND mock_id = '$mock_id' AND subjectsection_id = '$i' AND status = '3' ";
	 $result2 = mysqli_query($con,$sql2);
	 if(mysqli_num_rows($result2) > 0)
	 {
		while ($row2 = mysqli_fetch_array($result2))
		{
			$count[$i] = $count[$i] +1 ;
		}
		
	 }
	 $sql5 =  "SELECT * FROM $table WHERE  user_id = '$user_id' AND mock_id = '$mock_id' AND subjectsection_id = '$i' AND status = '4' ";
	 $result5 = mysqli_query($con,$sql5);
	 if(mysqli_num_rows($result5) > 0)
	 {
		while ($row5 = mysqli_fetch_array($result5))
		{
			$count1[$i] = $count1[$i] +1 ;
		}
		
	 }
	 $sql4 =  "SELECT * FROM $table WHERE  user_id = '$user_id' AND mock_id = '$mock_id' AND subjectsection_id = '$i' AND status = '2' ";
	 $result4 = mysqli_query($con,$sql4);
	 if(mysqli_num_rows($result4) > 0)
	 {
		while ($row4 = mysqli_fetch_array($result4))
		{
			$count2[$i] = $count2[$i] +1 ;
		}
		
	 }
	 $unattempted = $row3['no_of_question'] - $count[$i] - $count1[$i]- $count2[$i] ;
	 
 ?>
 <tr >
 <td style="text-align:center;height:50px;"> <?php echo $row3['section_name'] ; ?></td>
 <td style="text-align:center;height:50px"><?php echo $row3['no_of_question'] ;?></td>
 <td style="text-align:center;height:50px;"><?php echo $count[$i] ; ?></td>
 <td style="text-align:center;height:50px;"><?php echo $count2[$i] ; ?></td>
 <td style="text-align:center;height:50px;"><?php echo $count1[$i] ; ?></td>
 <td style="text-align:center;height:50px;"><?php echo $unattempted ; ?></td>
 </tr>
 <?php
 }
 ?>
 </table>
 <br /><br />
 <div class="col-xs-12" align="center">
<?php
if($test_mode == 1)
{
?>
<p>To view the Result <input type="submit" class="btn btn-primary" value="View"  onclick="document.location ='testanalytics.php?mock_id=<?php echo $mock_id ?>'" ></p>
<?php
}
if($test_mode == 2)
{
?>
<p>You can view your Result after The Period of test is over </p>
<?php
}
?>
 </div>
 <script>
 </script>
<?php
	$query1 = "DELETE FROM $table4 WHERE combine_id='$combine_id'";
	mysqli_query($con,$query1);
	mysqli_close($con);
	}
	else
	{
		?>
	<script type="text/javascript">
window.close();
</script>
<?php
	}
}
if(mysqli_num_rows($result1) == 0)
{
	?>
	<script type="text/javascript">
window.close();
</script>
<?php
}
?>
</div>
<?php
}
else
{
	?>
<script type="text/javascript">
window.close();
</script>
<?php
}
?>
</body>
</html>