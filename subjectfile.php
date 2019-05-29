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
<title>READING LIBRARY</title>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php
 session_start();
  $x = 1;
 $y = 1;
 if(isset($_SESSION['username']) && isset($_SESSION['password'])  && isset($_GET['id']) &&  isset($_GET['name']))
{
	 
	if($_SESSION['demo'] == 1)
{
	$name = $_GET['name'] ;  
	$qp_id = $_GET['id'] ; 
	include("connect.php");
	include("sess_var.php") ;
   include("profiletop.php") ;
   $school_id = $_SESSION['school_id'] ;
   $class_id = $_SESSION['class_id'] ;
   $section_id = $_SESSION['section_id'] ;
   ?>
<div class="wrapper">
   <?php
	  include("headertop.php");
	  ?>
	  <script>
document.getElementById("libread").className = "active treeview";
</script>
  <div class="content-wrapper" >
   <section class="content" id="contents">
   <div class="container-fluid">
   
   <div class="col-xs-1">
  
   </div>
  
   <div class="col-xs-10" >
   <div class="row" align="center">
    <p style="font-size:20px">Section Name : <span style="color:grey"><?php echo $name ; ?></span></p>
	<br /><br />
   </div>
   <?php
	$sql2 = "SELECT * FROM qp_sections_topic WHERE school_id='$school_id' AND class_id='$class_id' AND section_id='$section_id' AND qp_section_id = '$qp_id'";
	   $result2 = mysqli_query($con,$sql2);
	  
	   while($row2 = mysqli_fetch_array($result2))
	   {
		 ?>
           <div class="row" style="text-align:center;border-bottom:1px dotted black;border-top:1px dotted black">
   <h4 style="color:grey"><?php echo strtoupper($row2['topic'] )?></h4>
   </div>
           <?php   
		   $topic_id =  $row2['topic_id'];
		  
   $sql = "SELECT * FROM file_store_general WHERE school_id='$school_id' AND class_id='$class_id' AND section_id='$section_id' AND topic_id = '$topic_id' ORDER BY file_id desc ";
   $result = mysqli_query($con,$sql) ;
   if(mysqli_num_rows($result) > 0)
   {
	   ?>
	   <div class="row">
	   <?php
	    
   while($row = mysqli_fetch_array($result))
   {
	$filename = $row['file_name']; 
	$filelink = $row['file_link'];
	 
   ?>
   
  
   <div class="col-xs-4" style="margin-top:30px">
   <p ><i class="fa fa-file" style="font-size:60px;color:blue"></i><a href="http://www.vstudy.in/test/holdfile/<?php echo $filelink ?>" target="_blank"style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $filename; ?></a></p>
   </div>
   <?php
   }
   ?>
   </div>
   <?php
	   }
	   }
   ?>
   </div>
    <div class="col-xs-1">
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
}
else
{
	header("location: home.php");
}

?>
</body>
</html>