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
<script src="../bootstrap/js/bootstrap.min.js"></script>
<title>BEFORE TEST</title>
<link rel= "stylesheet" href="buttonstyle.css" type="text/css" media="screen" />
<script type="text/javascript" src="beforetest.js">
 </script>   
  
<script type="text/javascript" src="test.js">
 </script> 
 </head> 
<body>

<?php

session_start();

if(isset($_SESSION['password']) && isset($_SESSION['username']) && isset($_SESSION['start']) && isset($_SESSION['mock_id']) && isset($_GET['value']) && isset($_GET['id']))
{
	$model = $_SESSION['model'] ;
$image = $_SESSION['image'];
$gender = $_SESSION['gender'];
$firstname1 = $_SESSION['firstname'];
 $lastname1 = $_SESSION['lastname'];
 $_SESSION['test'] = 'test'
;
include("connect.php");
date_default_timezone_set("Asia/Kolkata");
$insert = $_GET['value'] ;
$user_id = $_GET['id'] ;
$mockid = $_SESSION['mock_id'];
$quer = "SELECT * FROM mock_added_list WHERE user_id='$user_id' AND mock_id='$mockid'";
$rews = mysqli_query($con,$quer);
if(mysqli_num_rows($rews) == 1)
{
 $s = "SELECT school_name FROM school_details WHERE school_id = (SELECT school_id FROM user_login WHERE user_id = '$user_id') ";
	 $re = mysqli_query($con,$s);
	 $rew = mysqli_fetch_array($re);
	 $school_name = $rew['school_name'];
	 $table1 = "time_remaining_".$school_name ;
	  $table = "start_test_".$school_name ;
	  $ta =  "mocktest_details_".$school_name ;
	   	  
	$sql = "SELECT * FROM $ta WHERE mock_id = '$mockid' ";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	 $mock_acttime1 = $row['start_time'];
		$mock_endtime1 = $row['end_time'];
		$time_limit = $row['time_limit'];
		$_SESSION['time_limit'] = $row['time_limit']  ;
		$mock_acttime = strtotime($mock_acttime1);
		$mock_endtime = strtotime($mock_endtime1);
		//$test_time =  $_SESSION['test_time'] ;
        $test_time = $mock_acttime - $mock_endtime ;
         $time_diff =  $mock_acttime - time() ;
	$_SESSION['acttime'] = $mock_acttime;
   $_SESSION['endtime'] = $mock_endtime ;
	

 //$time_diff1 = $time_diff + 3600 ;
 
if($time_diff <= 0 && time() <= $mock_endtime + 3600 )
 {
	
$sql1 = "SELECT * FROM $table WHERE user_id = '$user_id' ";
$result1 = mysqli_query($con,$sql1);
	$row1 = mysqli_fetch_array($result1);
	if($row1['temp'] == $insert)
	{
$table = "start_test_".$school_name ;
	$query1 = "DELETE FROM $table WHERE user_id='$user_id'";
	mysqli_query($con,$query1);		
$query3 =  "SELECT * FROM $table1 WHERE mock_id ='$mockid' AND user_id = '$user_id' AND mock_state ='2'";
$result3 = mysqli_query($con,$query3);
if(mysqli_num_rows($result3) == 0)
{	
$logo = $_SESSION['logo'];
?>
<div class="container-fluid">
<div id="logo" class="row" style="height:60px;background-color:#2D70B6;background-image: url(<?php echo $logo ;?>);background-size:auto 55px ;background-repeat:no-repeat;background-position: 10px 10px;">
</div>

<?php

	  $class = $_SESSION['class_name'];
	  $school = $_SESSION['school_name'];
	 $section = $_SESSION['section'];
	 $table1 = "mocktest_details_".$school;
	 $table2 = "mock_section_details_".$school;
	 $tab = "time_remaining_".$school ;	
	  $sql1 = "SELECT * FROM $table1 WHERE mock_id = '$mockid' ";
	  $result1 = mysqli_query($con,$sql1);
      $row1 = mysqli_fetch_array($result1);
	  $mock = $row1['mock_name'];
	  $_SESSION['mock_name'] = $row1['mock_name']; 
	  $num_sec = $row1['num_of_sections'];
	  $insert = $user_id.$mockid.microtime() ;
	  $q =  "SELECT * FROM $tab WHERE user_id = '$user_id' AND mock_id = $mockid ";
	 $r = mysqli_query($con,$q);
	 if(mysqli_num_rows($r)==1)
	 {
		 $ro = mysqli_fetch_array($r);
		 $duration_sec = $ro['timeremain'];
		 $duration = intval($duration_sec/60) ; 
		 ?>
      <script>
	  flag = false ;
	  </script>
      <?php   
	 }
	 else if(mysqli_num_rows($r)==0)
	 {
		 
		 $duration_sec = $row1['test_duration'];
	  $duration = intval($duration_sec/60) ;
	  ?>
      <script>
	  flag = true ;
	  </script>
      <?php
	  
}
	  
	$row1 = mysqli_fetch_array($result1);
	
		   $sql4 = "SELECT * FROM $table2 WHERE mock_id = '$mockid'";
		    $result4 = mysqli_query($con,$sql4);
		   $ques1 = 0;
		   //$_SESSION['start'] = "start" ;
		   $newrow = array();
			while($row4 = mysqli_fetch_array($result4))
	{
		$ques1 = $ques1 + $row4['no_of_question']; 
		array_push($newrow ,$row4);
	}
		    ?>
            
            <div class="row" >
            <div   class="col-xs-10" id="instbox" style="margin-left:-15px;;border-right:1px solid black">
<div id="startdiv" style="height:40px;width:100%;background-color:#BCE8F5;margin-top:-17px">
<h3 style="opactity:0.8;padding-top:7px">&nbsp;Instructions</h3>
<span style="float:right;">View as :
<select id="instlang" onchange ="changeinst(this.value,0)">
<option value="0">English</option>
<option value="1">Hindi</option>
</select>
</span>
</div>
<div id="startdiv1" style="margin-top:0%;margin-left:0%;padding:1%;height:80%;width:100%;border-bottom:1px solid #ccc;font-size:14px;overflow-y:scroll;overflow-x:hidden">
<?php
include_once("instruct.php");

?>
</div>
<div id="startdivhindi1" style="margin-top:0%;margin-left:0%;padding:1%;height:80%;width:100%;border-bottom:1px solid #ccc;font-size:14px;overflow-y:scroll;overflow-x:hidden;display:none">
<?php
include_once("instructhindi.php");

?>
</div>
<div id="startdiv2" style="float:left;width:100%;position:relative;margin-top:12px">
<div style="width:100%">
  <input type = "submit" class ="disable"  style="margin-top:3px;width:110px;background-color:white;font-size:20px;float:right;border:1px solid grey;height:2em;padding:10px 10px;text-align:center" value="Next >&nbsp;&nbsp;&nbsp;&nbsp;" onclick="changepage()" onmouseover = "changenextcolor(this)" onmouseout = "changenextcolor1(this)" />
  <script>
  function changenextcolor(x)
  {
	  x.style.backgroundColor = "#0C7CD5";
	  x.style.color ="white";
	  x.style.border = "1px solid black";
  }
  function changenextcolor1(x)
  {
	  x.style.backgroundColor = "white";
	  x.style.color ="black";
	  x.style.border = "1px solid grey";
  }
  </script>

  </div>

</div>
<div id="enddiv" style="height:40px;width:100%;background-color:#BCE8F5;margin-top:-17px;display:none">
<h3 style="opactity:0.8;padding-top:7px">&nbsp;Other Important Instructions</h3>
<span style="float:right;">View as :
<select id="instlang1" onchange ="changeinst(this.value,1)">
<option value="0">English</option>
<option value="1">Hindi</option>
</select>
</span>
</div>

<div id="enddiv1" style="margin-top:0%;margin-left:0%;padding:1%;height:57%;width:100%;border-bottom:1px solid #ccc;font-size:14px;overflow-y:auto;overflow-x:hidden;display:none">
<?php
include_once("instruct1.php");
?>
</div>
<div id="enddivhindi1" style="margin-top:0%;margin-left:0%;padding:1%;height:60%;width:100%;border-bottom:1px solid #ccc;font-size:14px;overflow-y:auto;overflow-x:hidden;display:none">
<?php
include_once("instructhindi1.php");
?>
</div>
<div id="enddiv2" style="float:left;width:100%;position:relative;margin-top:5px;display:none;margin-left:10px">
<form action="test.php" method="post" align="center" onsubmit="return checkvalidate()">
<div align="left">
<span id="defLang">Choose your default language :</span>
<select name="sellang" id="sellang">
<option value="0">--Select--</option>
<option value="1">English</option>
<option value="2">Hindi</option>
</select>

<br />
<span style="color:red">Please note all questions will appear in your default language.This language can be changed for a particular question later on</span>
<br /><br />
<input type="checkbox" id="submit1" name="agree" value="agree" /> <span style="font-size:14px">I have read and understood the instructions. All computer hardware allotted to me are in proper working condition. I declare  that I am not in possession of / not wearing / not  carrying any prohibited gadget like mobile phone, bluetooth  devices  etc. /any prohibited material with me into the Examination Hall.<br>I agree that in case of not adhering to the instructions, I shall be liable to be debarred from this Test and/or to disciplinary action, which may include ban from future Tests / Examinations.</span>
</div>
 <button type = "button" class ="disable"  style="margin-top:0px;width:130px;background-color:white;font-size:20px;float:left;border:1px solid grey;height:2em;margin-left:1%" onclick="changepage1()" onmouseover = "changenextcolor(this)" onmouseout = "changenextcolor1(this)" >&nbsp; < Previous</button>
  <script>
  function changepage1()
{
document.getElementById("startdiv").style.display = "block";
document.getElementById("startdiv2").style.display = "block";
document.getElementById("enddiv").style.display = "none";
document.getElementById("enddiv2").style.display = "none";
changeinst(document.getElementById("instlang").selectedIndex,0);
}
  function changenextcolor(x)
  {
	  x.style.backgroundColor = "#0C7CD5";
	  x.style.color ="white";
  }
  function changenextcolor1(x)
  {
	  x.style.backgroundColor = "white";
	  x.style.color ="black";
  }
  </script>
  <input type = "submit" name="submit2" id="submit2" class ="disable"  style="width:200px;background-color:#38AAE9;color:white;font-size:20px;padding:10px 10px;margin-top:5px" onmouseover="this.style.backgroundColor ='#0C7CD5'" onmouseout="this.style.backgroundColor ='#38AAE9'"   />
  
 
  </form>
  <script>
  if(flag == true)
  {
	  document.getElementById("submit2").value = "I am ready to begin";
	  
  }
  if(flag == false)
  {
	  document.getElementById("submit2").value = "Resume";
  }
  </script>
</div>
</div>
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
<div class="col-xs-2" align ="center">
<img src="<?php echo $im ; ?>" alt = "Image" style="width:90px;height:92px;margin-top:40px"/>
<br />
<?php
$firstname = str_split($firstname1,1);
$firstname3 = strtoupper($firstname[0]);
$firstname4 = "" ;
for($i=1;$i<count($firstname);$i++)
{
	$firstname4 = $firstname4.$firstname[$i];
}
$firstname2 = $firstname3.$firstname4;

$lastname = str_split($lastname1,1);
$lastname3 = strtoupper($lastname[0]);
$lastname4 = "";
for($i=1;$i<count($lastname);$i++)
{
	$lastname4 = $lastname4.$lastname[$i];
}
$lastname2 = $lastname3.$lastname4;
?>

<p style="color:#4F68A5;font-weight:bold;font-size:20px;margin-top:20px"><?php echo $firstname2."&nbsp;".$lastname2 ?></p>
</div>
</div>
</div>
<br /> 
<!-- Modal -->
<div id="myModallang" class="modal" role="dialog" style="margin-top:100px">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#2D70B6;height:40px">
  
        <p class="modal-title" style="color:white;">Info      <span type="button"  data-dismiss="modal" style="color:white;float:right" onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">close &times;</span></p>
      </div>
      <div class="modal-body" >
        <p><img src="info.png" alt="info" />&nbsp;&nbsp;Please choose your default language</p>
        <div style="height:50px;background-color:#F8F3F0" align="center">
        <button type="button" class="btn btn-success" onclick="hidemodal('myModallang')" style="margin-top:10px;height:22px;font-size:14px"><span style="position:relative;top:-7px">Ok</span></button>
        </div>
      </div>

    </div>

  </div>
</div>
<!-- Modal -->
<div id="myModalcheck" class="modal" role="dialog" style="margin-top:100px">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#2D70B6;height:40px">
        <p class="modal-title" style="color:white;">Info      <span type="button"  data-dismiss="modal" style="color:white;float:right" onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">close &times;</span></p>
      </div>
      <div class="modal-body" >
        <p><img src="info.png" alt="info" />&nbsp;&nbsp;Please Accept Terms and conditions before proceeding</p>
        <div style="height:50px;background-color:#F8F3F0" align="center">
        <button type="button" class="btn btn-success" onclick="hidemodal('myModalcheck')" style="margin-top:2px;height:22px;font-size:14px"><span style="position:relative;top:-7px">Ok</span></button>
        </div>
      </div>

    </div>

  </div>
</div>
<script>
function changeinst(x,a)
{
	
if(x == 0)
{
	
	if(a == 0)
	{
		
document.getElementById("startdiv1").style.display = "block";
document.getElementById("enddiv1").style.display = "none";
document.getElementById("startdivhindi1").style.display = "none";
document.getElementById("enddivhindi1").style.display = "none";
}
if(a == 1)
	{
		
document.getElementById("startdiv1").style.display = "none";
document.getElementById("enddiv1").style.display = "block";
document.getElementById("startdivhindi1").style.display = "none";
document.getElementById("enddivhindi1").style.display = "none";
}
}
if(x == 1)
{
	
if(a == 0)
	{
		
document.getElementById("startdiv1").style.display = "none";
document.getElementById("enddiv1").style.display = "none";
document.getElementById("startdivhindi1").style.display = "block";
document.getElementById("enddivhindi1").style.display = "none";
}
if(a == 1)
	{
		
document.getElementById("startdiv1").style.display = "none";
document.getElementById("enddiv1").style.display = "none";
document.getElementById("startdivhindi1").style.display = "none";
document.getElementById("enddivhindi1").style.display = "block";
}
}
document.getElementById("instlang1").selectedIndex = x ;
document.getElementById("instlang").selectedIndex = x ;

}
function hidemodal(x)
{
$("#" + x).modal("hide");
}
function changepage()
{
document.getElementById("startdiv").style.display = "none";
document.getElementById("startdiv2").style.display = "none";
document.getElementById("enddiv").style.display = "block";
document.getElementById("enddiv2").style.display = "block";
changeinst(document.getElementById("instlang1").selectedIndex,1);
}
 document.getElementById("instbox").style.height = window.innerHeight - 90 + "px"

</script>
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
 else
{
	?>
<script type="text/javascript">
window.close();
</script>
<?php	 

 }
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