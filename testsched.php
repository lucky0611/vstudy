<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TEST SCHEDULE</title>
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
	  $subcourse_id = $_GET['subcourse_id'];
	 $course_id = $_GET['course_id'];
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
	    <div class="container-fluid">
     
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
         <ul class="nav nav-tabs" style="font-size:20px;color:black">
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
      <li><a href="testsched.php?subcourse_id=<?php echo $rowe['subcourse_id'] ?>&course_id=<?php echo $course_id1 ?> "><?php echo $rowe['subcourse_name'] ?></a></li>
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
      
        </div>
        <?php
	 if($_SESSION['demo'] == 1)
	 {
	 $sql = "SELECT * FROM $table1 WHERE class_id = (SELECT class_id FROM class_details WHERE class_name = '$class') AND section_id = (SELECT section_id FROM section_details WHERE section_name = '$section') AND demo = '0' AND mock_submission = '1' AND test_type = '2' AND state='1' AND subcourse_id='$subcourse_id' AND course_id='$course_id' ORDER BY level_difficulty ASC";
	 }
	  if($_SESSION['demo'] == 0)
	 {
	 $sql = "SELECT * FROM $table1 WHERE class_id = (SELECT class_id FROM class_details WHERE class_name = '$class') AND section_id = (SELECT section_id FROM section_details WHERE section_name = '$section') AND demo = '1' AND mock_submission = '1' AND state='1' AND test_type = '2' AND subcourse_id='$subcourse_id' AND course_id='$course_id' ORDER BY level_difficulty ASC";
	 }
	 $result = mysqli_query($con,$sql);
	 
?>

   <br />

   
   <div class="row">
 <div class="col-xs-12">
   <table class="table table-striped">
   <caption style="font-size:16px;text-align:center">FULL LENGTH TEST</caption>
<tr>
<th style="text-align:center" >SERIAL NO.</th>
<th  style="text-align:center">MOCK NAME</th>
<th  style="text-align:center">START DATE</th>
<th style="text-align:center" >END DATE</th>
<th style="text-align:center" >LEVEL</th>
<th  style="text-align:center">STATUS</th>
</tr>
<?php
if(mysqli_num_rows($result) > 0)
{
	$i = 1;
	while($row = mysqli_fetch_array($result))
	{
		$mock_idd = $row['mock_id'] ;
			 $flagisfull = false ;
			for($o=0;$o<count($newarrmock);$o++)
			{
				if($newarrmock[$o] == $mock_idd)
				{
					$flagisfull = true ;
				}
			}
			if($flagisfull == true)
			{
		
		?>
        <tr>
        <td style="text-align:center;height:40px;"><?php echo $i.'.' ;?></td>
        <td style="text-align:center;height:40px;"><?php echo $row['mock_name'] ;?></td>
        <?php
		$start_time = $row['start_time'];
		$end_time = $row['end_time'];
		$start1 = strtotime($start_time);
		$end1 = strtotime($end_time);
		$start2 = new DateTime($start_time);
		$end2 = new DateTime($end_time);
		$start = DATE_FORMAT($start2, 'd M Y h:i:s A');
		$end = DATE_FORMAT($end2, 'd M Y h:i:s A');
		$mock_id = $row['mock_id'];
		$sql1 = "SELECT * FROM $table2 WHERE mock_id='$mock_id' AND user_id=' $user_id'";
		$result1 = mysqli_query($con,$sql1);
		
		{
			$state = "<p style='color:red'>Inactive</p>";
		}
		if(time() <= $end1 && time() >= $start1 )
		{
			$state = "<p style='color:green'>Active</p>";
			if(mysqli_num_rows($result1) == 1 )
			{
				$row1 = mysqli_fetch_array($result1);
				if($row1['mock_state'] == 1)
				{
				$state =  "<p style='color:#1472cc'>Started</p>";
				}
				else if($row1['mock_state'] == 2)
				{
				$state = "<p style='color:red'>Taken Mock</p>";
				}
			}

		}
		else if(time() < $start1  )
		{
			$state = "Scheduled";
		}
		?>
        
        
        <td style="text-align:center;height:40px;"><?php echo $start ;?></td>
        <td style="text-align:center;height:40px;"><?php echo $end ;?></td>
		<?php
		if($row['level_difficulty'] == 1)
		{
			$level = "Easy";
		}
		if($row['level_difficulty'] == 2)
		{
			$level = "Moderate";
		}
		if($row['level_difficulty'] == 3)
		{
			$level = "Difficult";
		}
		?>
		 <td style="text-align:center;height:40px;"><?php echo $level ;?></td>
        <td id ="state<?php echo $i; ?>" style="text-align:center;height:40px;"><b><?php echo $state ;?></b></td>
        </tr>
        <?php
		
		$i++;
	
			}
}
}
?>

</table>
</div>
<div class="col-xs-6">
</div>
         </div>
         <div class="row">
         <?php
		 if($_SESSION['demo'] == 1)
	 {
	 $sql = "SELECT * FROM $table1 WHERE class_id = (SELECT class_id FROM class_details WHERE class_name = '$class') AND section_id = (SELECT section_id FROM section_details WHERE section_name = '$section') AND demo = '0' AND mock_submission = '1' AND test_type = '1' AND state='1' AND subcourse_id='$subcourse_id' AND course_id='$course_id' ORDER BY level_difficulty ASC";
	 }
	  if($_SESSION['demo'] == 0)
	 {
	 $sql = "SELECT * FROM $table1 WHERE class_id = (SELECT class_id FROM class_details WHERE class_name = '$class') AND section_id = (SELECT section_id FROM section_details WHERE section_name = '$section') AND demo = '1' AND mock_submission = '1' AND test_type = '1' AND state='1' AND subcourse_id='$subcourse_id' AND course_id='$course_id' ORDER BY level_difficulty ASC";
	 }
	  $result = mysqli_query($con,$sql);
		 ?>
 <div class="col-xs-12">
 <br />
   <table class="table table-striped">
   <caption style="font-size:16px;text-align:center">SECTIONAL TEST</caption>
<tr>
<th style="text-align:center" >SERIAL NO.</th>
<th  style="text-align:center">MOCK NAME</th>
<th  style="text-align:center">START DATE</th>
<th style="text-align:center" >END DATE</th>
<th style="text-align:center" >LEVEL</th>
<th  style="text-align:center">STATUS</th>
</tr>
<?php
if(mysqli_num_rows($result) > 0)
{
	$i = 1;
	while($row = mysqli_fetch_array($result))
	{
		$mock_idd = $row['mock_id'] ;
			 $flagissec = false ;
			for($o=0;$o<count($newarrmock);$o++)
			{
				if($newarrmock[$o] == $mock_idd)
				{
					$flagissec = true ;
				}
			}
			if($flagissec == true)
			{
		
		?>
        <tr>
        <td style="text-align:center;height:40px;"><?php echo $i.'.' ;?></td>
        <td style="text-align:center;height:40px;"><?php echo $row['mock_name'] ;?></td>
        <?php
		$start_time = $row['start_time'];
		$end_time = $row['end_time'];
		$start1 = strtotime($start_time);
		$end1 = strtotime($end_time);
		$start2 = new DateTime($start_time);
		$end2 = new DateTime($end_time);
		$start = DATE_FORMAT($start2, 'd M Y h:i:s A');
		$end = DATE_FORMAT($end2, 'd M Y h:i:s A');
		$mock_id = $row['mock_id'];
		$sql1 = "SELECT * FROM $table2 WHERE mock_id='$mock_id' AND user_id=' $user_id'";
		$result1 = mysqli_query($con,$sql1);
		
		if(time() > $end1 )
		{
			$state = "<p style='color:red'>Inactive</p>";
		}
		if(time() <= $end1 && time() >= $start1 )
		{
			$state = "<p style='color:green'>Active</p>";
			if(mysqli_num_rows($result1) == 1 )
			{
				$row1 = mysqli_fetch_array($result1);
				if($row1['mock_state'] == 1)
				{
				$state =  "<p style='color:#1472cc'>Started</p>";
				}
				else if($row1['mock_state'] == 2)
				{
				$state = "<p style='color:red'>Taken Mock</p>";
				}
			}

		}
		else if(time() < $start1  )
		{
			$state = "Scheduled";
		}
		?>
        
        
        <td style="text-align:center;height:40px;"><?php echo $start ;?></td>
        <td style="text-align:center;height:40px;"><?php echo $end ;?></td>
		<?php
		if($row['level_difficulty'] == 1)
		{
			$level = "Easy";
		}
		if($row['level_difficulty'] == 2)
		{
			$level = "Moderate";
		}
		if($row['level_difficulty'] == 3)
		{
			$level = "Difficult";
		}
		?>
		 <td style="text-align:center;height:40px;"><?php echo $level ;?></td>
        <td id ="states<?php echo $i; ?>" style="text-align:center;height:40px;"><b><?php echo $state ;?></b></td>
        </tr>
        <?php
		if(time() <= $end1 && time() >= $start1 )
		
		$i++;
	
			}
	}
}
?>

</table>
</div>

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