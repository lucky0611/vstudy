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
<script>
var popupWindow = null ;
var w = window.outerWidth;
var h = window.outerHeight;
</script>
<title>ANSWER KEY</title>
</head>

<body class="hold-transition skin-blue sidebar-mini">

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
   $subcourse_id = $_GET['subcourse_id'];
	 $course_id = $_GET['course_id'];
 include("sess_var.php") ;
 include("profiletop.php") ;
$x = 1 ;
$y = 1 ;
?>
<div class="wrapper">
 <?php
	  include("headertop.php");
	  ?>
	  <script>
document.getElementById("solkeys").className = "active treeview";
</script>
   <div class="content-wrapper" >
   <section class="content" id="contents">
<div class="container-fluid">
<div class="row" align="center">
  
    </div>
     <div class="row">
     <br />
     </div>
<?php
	  $newarr = array();
		 $newarr1 = array();
		 $newarrmock = array();
		$subc = array() ; 
		$s1 = "SELECT * FROM package_list WHERE package_id='$package_id'";
		$q1 = mysqli_query($con,$s1);
		$t = 0;
		if(mysqli_num_rows($q1) > 0)
		{
			while($store = mysqli_fetch_array($q1)) 
			{
			$mc_id = $store['mock_id'];
		 $sqlis = "SELECT * FROM $table1 WHERE mock_id = '$mc_id'";
		 $queris =  mysqli_query($con,$sqlis);
		 $resis = mysqli_fetch_array($queris);
		 $newarr[$t] = $resis['course_id'];
		 $newarr1[$t] = $resis['subcourse_id'];
		 $newarrmock[$t] = $mc_id;
		 $t++;
			}
		}
		$newarr = array_unique($newarr);
		$newarr1 = array_unique($newarr1);
		$newarr = array_values($newarr);
		$newarr1 = array_values($newarr1); 
		 $sqli = "SELECT * FROM course_info";
		 $resulti = mysqli_query($con,$sqli);
		 ?>
         <ul class="nav nav-tabs" style="font-size:20px">
         <?php
		while($rowi = mysqli_fetch_array($resulti))
		{
			$course_id1 = $rowi['course_id'];
			$flagis = false ;
			for($o=0;$o<count($newarr);$o++)
			{
				if($newarr[$o] == $course_id1)
				{
					$flagis = true ;
				}
			}
			if($flagis == true)
			{
		 ?>
      <li class="dropdown" id="changeclass<?php echo $rowi['course_id']; ?>">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:black"><?php echo $rowi['course_name'] ?>
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
    <?php
	$sqle = "SELECT * FROM subcourse_info WHERE course_id = '$course_id1' ";
		 $resulte = mysqli_query($con,$sqle);
		 while($rowe = mysqli_fetch_array($resulte))
		 {
			 $subcourse_id1 = $rowe['subcourse_id'];
			 $flagis1 = false ;
			for($o=0;$o<count($newarr1);$o++)
			{
				if($newarr1[$o] == $subcourse_id1)
				{
					$flagis1 = true ;
				}
			}
			if($flagis1 == true)
			{
	?>
      <li><a href="answerkey.php?subcourse_id=<?php echo $rowe['subcourse_id'] ?>&course_id=<?php echo $course_id1 ?> "><?php echo $rowe['subcourse_name'] ?></a></li>
       <?php
	   array_push($subc,$rowe);
		 }
		 }
	  ?>
    </ul>
  </li>    
  
 
         <?php
		 
		}
		}
		?>
         </ul>
        <?php
		?>
         <div class="row" align="center" style="font-size:18px">
        <br />
        <p >Category : <span style="color:grey">
        <?php
		
		foreach($subc as $subc1)
		{
			if($subc1['subcourse_id'] == $subcourse_id)
			{
				echo $subc1['subcourse_name'];
				?>
                <script>
		document.getElementById("changeclass" + <?php echo $subc1['course_id']; ?> ).className = "dropdown active"
		
				</script>
                <?php
			}
		}
		?>
        </span>
        </p>
        <br />
        </div>

   <div class="row">
   <div class="col-xs-6">
   <p  style="text-align:center;font-weight:bold;font-size:16px">FULL LENGTH TESTS</p>
   </div>
    <div class="col-xs-6">
   <p style="text-align:center;font-weight:bold;font-size:16px">SECTIONAL TESTS</p>
   </div>
   </div>
   <br />
   <?php
   if($_SESSION['demo'] == 1)
   {
   $sql1 = "SELECT * FROM $table1 WHERE test_type = '2' AND class_id=(SELECT class_id FROM class_details WHERE class_name = '$class_name') AND section_id =(SELECT section_id FROM section_details WHERE section_name = '$section') AND demo='0' AND subcourse_id='$subcourse_id' AND course_id='$course_id'";
   }
   else
   {
   $sql1 = "SELECT * FROM $table1 WHERE test_type = '2' AND class_id=(SELECT class_id FROM class_details WHERE class_name = '$class_name') AND section_id =(SELECT section_id FROM section_details WHERE section_name = '$section') AND demo='1' AND subcourse_id='$subcourse_id' AND course_id='$course_id'";
   }
	  $result1 = mysqli_query($con,$sql1);
    if($_SESSION['demo'] == 1)
   {
	  $sql2 = "SELECT * FROM $table1 WHERE test_type = '1' AND class_id=(SELECT class_id FROM class_details WHERE class_name = '$class_name') AND section_id =(SELECT section_id FROM section_details WHERE section_name = '$section') AND demo='0' AND subcourse_id='$subcourse_id' AND course_id='$course_id'";
   }
    else
   {
	  $sql2 = "SELECT * FROM $table1 WHERE test_type = '1' AND class_id=(SELECT class_id FROM class_details WHERE class_name = '$class_name') AND section_id =(SELECT section_id FROM section_details WHERE section_name = '$section') AND demo='1' AND subcourse_id='$subcourse_id' AND course_id='$course_id'";
   }
	  $result2 = mysqli_query($con,$sql2);
	  
		  
   ?>
   <div class="col-xs-6" style="border-right:1px dotted grey">
   <?php
   $m = 1;
   while($row1 = mysqli_fetch_array($result1))
	  {
		  $id = $row1['mock_id'] ;
if($row1['test_mode'] == 1)
{
$sql = "SELECT * FROM $table3 WHERE user_id = '$user_id' AND mock_id = '$id'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) == 1)
{
	$row = mysqli_fetch_array($result);
	if($row['mock_state'] == 2)
	{
   if($row1['test_type'] == 2)
		  {
	
   ?>
   <div class="row">
   <div class="col-xs-2" style="text-align:center;margin-bottom:20px;font-size:20px">
   <span style="text-align:left"><?php echo $m ; ?></span>
   </div>
   <div class="col-xs-10" style="margin-bottom:20px;font-size:20px;text-align:center">
   <p style="border:1px solid grey"><a style="color:black" href="showanswerkey.php?mock_id=<?php echo $row1['mock_id'] ; ?>" style="text-align:center;"><?php echo  $row1['mock_name'] ?></a></p>
   </div>

   </div>
  <?php
  $m++ ;
		  }
}
}
		  }

if($row1['test_mode'] == 2)
{
$test_endtime = strtotime($row1['end_time']) ;
$time_new = $test_endtime + 86400 ;
if(time() > $time_new)
{
   if($row1['test_type'] == 2)
		  {
	
   ?>
   <div class="row">
   <div class="col-xs-2" style="text-align:center;margin-bottom:20px;font-size:20px">
   <span style="text-align:left"><?php echo $m ; ?></span>
   </div>
   <div class="col-xs-10" style="margin-bottom:20px;font-size:20px;text-align:center">
   <p style="border:1px solid grey"><a style="color:black" href="showanswerkey.php?mock_id=<?php echo $row1['mock_id'] ; ?>" style="text-align:center;"><?php echo  $row1['mock_name'] ?></a></p>
   </div>
   </div>
  <?php
  $m++ ;
		  }		 
		   }
}
}
  ?>
  </div>
   <div class="col-xs-6" >
   <?php
   $n = 1;
   while($row2 = mysqli_fetch_array($result2))
	  {
		  $id1 = $row2['mock_id'] ;
		 
$sql5 = "SELECT * FROM $table3 WHERE user_id = '$user_id' AND mock_id = '$id1'";
$result5 = mysqli_query($con,$sql5);
if(mysqli_num_rows($result5) == 1)
{
	$row5 = mysqli_fetch_array($result5);
	if($row5['mock_state'] == 2)
	{
   if($row2['test_type'] == 1)
		  {
	
   ?>
   <div class="row">
   <div class="col-xs-2" style="text-align:center;margin-bottom:20px;font-size:20px">
   <span style="text-align:left"><?php echo $n ; ?></span>
   </div>
   <div class="col-xs-10" style="margin-bottom:20px;font-size:20px;text-align:center">
   <p style="border:1px solid grey"><a style="color:black" href="showanswerkey.php?mock_id=<?php echo $row2['mock_id'] ; ?>" style="text-align:center;"><?php echo  $row2['mock_name'] ?></a></p>
   </div>
   </div>
  <?php
  $n++ ;
		  }
	}
}
		  }
  ?>
   </div>
   

         <script>
function starttest(x)
{
	var e = document.getElementById("lang" + x);
var val = e.options[e.selectedIndex].value;
	popupWindow = window.open ("practicetest.php?mock_id="+ x+"&value="+ val,'_blank','width='+w+',height='+h+',toolbar=no,menubar=no,resizable=no,directories=no,location=no');
}
		 </script>
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
</div>
<div class="control-sidebar-bg"></div>
 </div>

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
</body>
</html>