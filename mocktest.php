<!DOCTYPE html>
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
<title>MOCK TESTS</title>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if( isset($_SESSION['username'] ) && isset($_SESSION['password']) && isset($_SESSION['class_name']) && isset($_SESSION['school_name']) && isset($_SESSION['section']))
{
	$flag = array() ;
	include("connect.php");
	include("sess_var.php") ;
   include("profiletop.php") ;
   $package_id = $_SESSION['package_id'];
   $x = 1 ;
$y = 1 ;
   ?><script type="text/javascript">
user_id = "<?php echo $user_id ;?>";
</script>
   <div class="wrapper">
   <?php
	  include("headertop.php");
	  ?>
	  <script>
document.getElementById("mtest").className = "active treeview";
</script>
  <div class="content-wrapper" >
   <section class="content" id="contents">
   <div class="container-fluid">
   <?php
	echo "<br />   ";
	  $flag_full = false ;
	  $flag_sec = false ;
	  $class = $_SESSION['class_name'];
	  $school = $_SESSION['school_name'];
	 $section = $_SESSION['section'];
	 $user_id = $_SESSION['user_id'];
	 $table1 = "mocktest_details_".$school;
	 $table2 ="time_remaining_".$school;
	 $tables = "mock_questions_".$school;
	 $subcourse_id = $_GET['subcourse_id'];
	 $course_id = $_GET['course_id'];
	  function sortByOrder($a, $b)
 {
    return $b['mock_id'] - $a['mock_id'];
}


	 $sql1 = "SHOW TABLES LIKE '$table1'";
	 $result1 = mysqli_query($con,$sql1);
	 if(mysqli_num_rows($result1) == 0)
	 {
		 ?>
         
         <div style="width:100%;margin:10%;margin-left:30%;-webkit-box-shadow: 2px 0 5px 4px #969696;-moz-box-shadow: 2px 0 5px 4px #969696;box-shadow: 2px 0 5px 4px #969696;width:40%;border-top:40px solid #1472cc">
		 <p style="text-align:center;font-size:22px;font-weight:bold">No mock test available.</p>
         <form action="home.php" method="POST">
         <span style="padding-left:32%;font-weight:bold">To go back &nbsp;&nbsp;  <input type="submit" value=" Click Here" name ="backprofile" class="login" style="color:white;padding: 5px 15px;height:2em;font-size:12px"/></span>
         </form>
         <br /><br />
         </div>
         
         <?php
	 }
	 else if(mysqli_num_rows($result1) == 1)
	 {
	  $sql2 = "SELECT * FROM $table1 WHERE class_id=(SELECT class_id FROM class_details WHERE class_name = '$class') AND section_id =(SELECT section_id FROM section_details WHERE section_name = '$section')";
	  $result2 = mysqli_query($con,$sql2);
	  if(mysqli_num_rows($result2) == 0)
	 {
		 ?>
		 <div style="float:left;margin:10%;margin-left:30%;-webkit-box-shadow: 2px 0 5px 4px #969696;-moz-box-shadow: 2px 0 5px 4px #969696;box-shadow: 2px 0 5px 4px #969696;width:40%;border-top:40px solid #1472cc">
		 <p style="text-align:center;font-size:22px;font-weight:bold">No mock test available.</p>
         <form action="home.php" method="POST">
         <span style="padding-left:32%;font-weight:bold">To go back &nbsp;&nbsp;  <input type="submit" value=" Click Here" name ="backprofile" class="login" style="color:white;padding: 5px 15px;height:2em;font-size:12px"/></span>
         </form>
         <br /><br />
         </div>
         <?php 
	 }
	 else 
	 {
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
      <li ><a href="mocktest.php?subcourse_id=<?php echo $rowe['subcourse_id'] ?>&course_id=<?php echo $course_id1 ?> "><?php echo $rowe['subcourse_name'] ?></a></li>
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
        <?php
			
		
		// $ree = mysqli_fetch_array($result2);
		 if($_SESSION['demo'] == 0)
		 {
		
		  $sql12 = "SELECT * FROM $table1 WHERE class_id=(SELECT class_id FROM class_details WHERE class_name = '$class') AND section_id =(SELECT section_id FROM section_details WHERE section_name = '$section') AND test_type = '2' AND demo='1' AND mock_submission='1' AND state='1' AND subcourse_id='$subcourse_id' AND course_id='$course_id'";
		 
		 
		 
		  $sql13 = "SELECT * FROM $table1 WHERE class_id=(SELECT class_id FROM class_details WHERE class_name = '$class') AND section_id =(SELECT section_id FROM section_details WHERE section_name = '$section') AND test_type = '1' AND demo='1' AND mock_submission='1' AND state='1' AND subcourse_id='$subcourse_id' AND course_id='$course_id'";
		 
		 }
		  if($_SESSION['demo'] == 1)
		 {
			 
		  $sql12 = "SELECT * FROM $table1 WHERE class_id=(SELECT class_id FROM class_details WHERE class_name = '$class') AND section_id =(SELECT section_id FROM section_details WHERE section_name = '$section') AND test_type = '2' AND demo = '0' AND mock_submission='1' AND state='1' AND subcourse_id='$subcourse_id' AND course_id='$course_id'";
		 
		
		  $sql13 = "SELECT * FROM $table1 WHERE class_id=(SELECT class_id FROM class_details WHERE class_name = '$class') AND section_id =(SELECT section_id FROM section_details WHERE section_name = '$section') AND test_type = '1' AND demo = '0' AND mock_submission='1' AND state='1' AND subcourse_id='$subcourse_id' AND course_id='$course_id'" ;
		 
 
		 }
	  ?>
     <div class="row">
<div class ="col-sm-6 " style="border-right:1px dotted grey;" >

            <p  align="center" style="font-size:20px">Full Length Test</p>
                        <br />
             <?php
	  
		  $result12 = mysqli_query($con,$sql12);
	  include("mocktest_full.php");
	  
		 ?>
            </div>
            
            <div class ="col-sm-6"  >
            
            <p  align="center" style="font-size:20px">Sectional Test</p>
            
            <br />
             <?php
			
	
	  $result13 = mysqli_query($con,$sql13);

	  include("mocktest_sec.php");
	  
	  
		 ?>
            </div>
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
<script type="text/javascript" src="browserdetect.js"></script>
<script type="text/javascript" src="mocktest.js?v=1.02"></script>
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
?>
            
</body>
</html>	