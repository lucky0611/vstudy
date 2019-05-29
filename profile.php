<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PROFILE</title>
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
  
<script>
$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
});
</script>

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
#profilediv
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
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
input[readonly] {
  background-color: white !important;
  cursor: text !important;
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
<title>PROFILE</title>
</head>
<body  class="hold-transition skin-blue sidebar-mini">
 <?php
 session_start();
 date_default_timezone_set("Asia/Kolkata");
 define('uploadpath', '../profilepic/');
 if(isset($_SESSION['username']) && isset($_SESSION['password']))
{
	
include("connect.php");
function sanitize($string)
{
include("connect.php");
$string = strip_tags($string);
$string = htmlspecialchars($string);
$string = trim(rtrim(ltrim($string)));
$string = mysqli_real_escape_string($con,$string);
return $string;
}
	include("sess_var.php") ;
	include("profiletop.php") ;
	if($model == 2 || $model == 3)
		{
			$target = $image;
		}
		else
		{
	$target = uploadpath.$image;
		}
		$male =uploadpath.'male.jpg';
		$female =uploadpath.'female.jpg';
   
   $subschool_id = $_SESSION['subschool_id'] ;
   $sql1 = "SELECT * FROM subschool_details WHERE subschool_id = '$subschool_id'";
   $result1= mysqli_query($con,$sql1);
   $row1 = mysqli_fetch_array($result1);
   $subschool = $row1['subschool'];
   ?>
 <div class="wrapper">
	  <?php
	  include("headertop.php");
	  ?>
	  <div class="content-wrapper" >
   <section class="content" id="contents">
 <div class="container-fluid"> 
 <div class="row">
 <p style="color:red;text-align:center" id="errors"></p>
 </div>
  <div class="row">
  <div class="col-sm-4">
  <h4 style="font-weight:bold;">DISPLAY PICTURE</h4>
  </div>
  <div class="col-sm-6" style="align:center">
  <h4 style="font-weight:bold;text-align:center">PERSONAL DETAILS</h4>
  </div>
  </div>
  <br /><br /> 
 <div class="row">
  
   <div  class="col-sm-4 " >
   <div class="col-xs-12">
 <?php
 if(empty($image))
 {
	 if($gender == "m")
	 {
	 ?>
     <div id="imagehold" style="width:150px;height:150px;margin-top:20px">
 <img src="<?php echo $male ; ?>" id="frameid" alt ="Profile Pic" style="width:100%;height:100%;">
 </div>
 <script type="text/javascript">
 flag1 = true ;
 flag2 = false;
 </script>
 <?php
 }
 if($gender == "f")
	{
	 ?>
     <div id="imagehold" style="width:150px;height:150px;margin-top:20px">
 <img src="<?php echo $female ; ?>" id="frameid" alt ="Profile Pic" style="width:100%;height:100%;">
 </div>
 <script type="text/javascript">
 flag1 = true ;
 flag2 = true;
 </script>
 <?php
	 } 
 }
 else if(!empty($image))
 {
	  
 ?>
 <div id="imagehold" style="width:150px;height:150px;margin-top:20px">
 <img src="<?php echo $target ; ?>" id="frameid"  alt ="Profile Pic" style="width:100%;height:100%;">
 </div>
<script type="text/javascript">
 flag1 = false ;
 </script>
 <?php
 if($gender == "m")
 {
?>
 <script type="text/javascript">
 flag2 = false ;
 </script>    
 <?php
 }
 if($gender == "f")
 {
?>
 <script type="text/javascript">
 flag2 = true ;
 </script>    
 <?php
 }
 }
 ?>
 <br />
 <?php
if($model == 0 || $model == 1)
		{ 
 ?>
 <div class="input-group" style="margin-top:20px">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        Browse&hellip; <input type="file"  id="chose" onchange="choseimage(this)" >
                    </span>
                </span>
                <input type="text" class="form-control" readonly id="readon">
            </div>
			
 <button style="margin-top:20px" onClick="removeimage(this)" id="button" class="btn btn-primary">Remove Image</button>
 <?php
		}
			?>
  </div>
  </div>
   <div id='outline' class="col-sm-6 well" style="font-size:18px">
   <div class="row">
    <div class="col-xs-4">
    <p style="text-align:left">NAME</p>
    </div>
    <div class="col-xs-8">
    <p style='color:#3778BD;font-weight:bold'> <?php echo $firstname.'  '.$lastname ;?></p>
    </div>
    </div>
     <br /><br />
    <div class="row">
    <div class="col-xs-4">
 <p style="text-align:left">USERNAME</p>
 </div> 
 <div class="col-xs-8">
    <p style='color:#3778BD;font-weight:bold'> <?php echo $username; ?></p>
    </div>
    </div>
 <br /><br />
 <div class="row">
   <div class="col-xs-4"> 
 <p style="text-align:left">E-MAIL</p>
 </div>
 <div class="col-xs-8">
    <p style='color:#3778BD;font-weight:bold'> <?php echo $email ; ?></p>
    </div>
    </div>
  <br /><br />
  <div class="row">
  <div class="col-xs-4">
   <p style="text-align:left"> PHONE NO.</p> 
    </div>
     <div class="col-xs-8">
    <p style='color:#3778BD;font-weight:bold'> <?php echo $phone; ?></p>
    </div>
    </div>
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
<div class="control-sidebar-bg"></div>
</div>	
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>	 
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