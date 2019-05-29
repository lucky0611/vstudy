<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Most Relevant & trusted Online Video Lectures for BANK PO/CLERK(SBI,IBPS,RRB ), RAILWAYS,SSC(CGL & CHSL),INSURANCE by IITians">
	<meta name="keywords" content="ONLINE VIDEO,TOPIC-WISE,LECTURES,TUTORIALS, BANK PO, BANK CLERK , IBPS, SBI,SSC CHSL , SSC CGL,RRB,INSURANCE,RAILWAYS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Online Video lectures best for BANK PO/CLERK(SBI,IBPS,RRB ), RAILWAYS,SSC,Insurance |vStudy </title>

   

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-deep_purple.min.css" />
	 <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="//storage.googleapis.com/code.getmdl.io/1.2.1/material.min.js"></script>
    <link href="dialog/dist/mdl.css?v=1.03" rel="stylesheet">
 <script src = "https://plus.google.com/js/client:platform.js" async defer></script>
<script src="dialog/source/mdl.js"></script>
<script src="signvalidation.js?v=1.06"></script>
    <style>
	.mdl-textfield__errors{
	color:#d50000;
	position:absolute;
	font-size:12px;
	margin-top:3px;
	left:2px
	}
	.mdl-textfield__noerrors{
	color:green;
	position:absolute;
	font-size:12px;
	margin-top:3px;
	left:2px
	}
	
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
	.background
   {
	   background-image: url("loadingback.gif");
	   background-repeat: no-repeat;
	   background-size: 40px 40px ;
   }
    </style>
  </head>
    <?php
include("connect.php");

session_start();

if(isset($_GET['topic_id']) && isset($_GET['subject_id']) && isset($_GET['video_id']))
{
	$topics_id = $_GET['topic_id'];
	$subjects_id = $_GET['subject_id'];
	$video_id = $_GET['video_id'];
	//$getid =  $_GET['id'] ;	
//$act =  $_GET['act'] ;
//$getdata = $_GET['page'] ;

	?>
  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
  <?php
 include_once("analyticstracking.php");
?>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
	 <div id="demo-snackbar-example2" class="mdl-js-snackbar mdl-snackbar" style="z-index:1000">
      <div class="mdl-snackbar__text"></div>
      <button class="mdl-snackbar__action" type="button"></button>
    </div>
       <header class="mdl-layout__header mdl-layout__header--fixed mdl-color--primary "  >
	   
      <div class="mdl-layout__tab-bar mdl-js-ripple-effect  ">
	  <span  class="mdl-layout--large-screen-only">
		<a style="font-size:28px;margin-left:20px;color:white" class="mdl-layout__tab" title="Online Test for BANK/SSC/Railways/Engineering.">vStudy</a>
       <a href="index.php" class="mdl-layout__tab  "  style="margin-left:30px;" title="Online Test for BANK/SSC/Railways/Engineering." >Home</a>
          <a href="#videodiv" class="mdl-layout__tab is-active" title="Online Video Lecture for BANK/SSC/Railways/Engineering." rel="canonical"  >Videos</a>
          <a href="quizlist.php" class="mdl-layout__tab" title="Online English Comprehension Quiz for BANK/SSC/Railways/Engineering." >Daily Quiz</a>
		    <a href="#features" class="mdl-layout__tab" title="Online Test features for BANK/SSC/Railways/Engineering." >Features</a>
          <a href="#contactdiv" class="mdl-layout__tab" title="Contact form for BANK/SSC/Railways/Engineering Enquiries." >Contact</a>
       
		  </span>
		 <div class="mdl-layout-spacer"></div>
		<!-- Accent-colored raised button with ripple -->
		
		<?php
if(isset($_SESSION['username']) && isset($_SESSION['password']))
{
include("sess_var.php");
$logo = $_SESSION['logo'] ;
$model = $_SESSION['model'] ;
$image = $_SESSION['image'] ;
$firstname = $_SESSION['firstname'] ;
$firstname = strtoupper($firstname);
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
 if($model == 0)
 {
	 ?>
	 <script>
	 document.location="logout.php"
	 </script>
	 <?php
 }
?>
<div class="mdl-cell mdl-cell--2-col" >
<p style="color:white;margin-top:10px;font-size:16px;float:right;margin-right:10px"><img src="<?php echo $im ;?>" style="height:30px;width:30px;z-index:100" />&nbsp;&nbsp;
<?php echo $firstname ;?><!-- Right aligned menu below button -->
<button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>

</p>
</div>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right">
  <li class="mdl-menu__item"><a style="color:black;text-decoration:none" href="home.php">Dashboard</a></li>
  <li class="mdl-menu__item"><a style="color:black;text-decoration:none" href="logout.php">Logout</a></li>
</ul>	
<?php
}
else
{
	
?>
		<div class="mdl-cell mdl-cell--1-col">
<button id="signupshow" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"  data-target="#demo-1" style="border:1px solid white;margin-top:7px">
  Sign Up
</button>

</div> 
<div  class="mdl-cell mdl-cell--1-col">
<button id="loginshow" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" data-target="#demo-2" style="margin-left:-10px;border:1px solid white;float:right;margin-top:7px">
Login
</button>

</div>
<div  class="mdl-cell mdl-cell--1-col"></div>
<?php
}
?>


	  </div>
	  
		</header>
      <div class="mdl-layout__drawer mdl-color--primary" style="color:white;background-color:white" >
		<img src="headerlogo.png" alt="logo" style="width:60px;margin-left:90px;height:60px">
          <a href="index.php" class="mdl-layout__tab " style="border-bottom:1px dotted white;border-top:1px dotted white" title="Online Test for BANK/SSC/Railways/Engineering.">Home</a>
          <a href="#videodiv" class="mdl-layout__tab" style="border-bottom:1px dotted white" rel="canonical" title="Online Video Lecture for BANK/SSC/Railways/Engineering.">Videos</a>
          <a href="quizlist.php" class="mdl-layout__tab" style="border-bottom:1px dotted white" title="Online English Comprehension Quiz for BANK/SSC/Railways/Engineering.">Daily Quiz</a>
		  <a href="feature.php" class="mdl-layout__tab" style="border-bottom:1px dotted white" title="Online Test features for BANK/SSC/Railways/Engineering.">Features</a>
          <a href="contactform.php" class="mdl-layout__tab" style="border-bottom:1px dotted white" title="Contact form for BANK/SSC/Railways/Engineering Enquiries.">Contact</a>
          
		  <?php
		if(isset($_SESSION['username']) && isset($_SESSION['password']))
{
	
?>
    <a href="home.php" class="mdl-layout__tab" style="border-bottom:1px dotted white">Dashboard</a>
	<a href="logout.php" class="mdl-layout__tab" style="border-bottom:1px dotted white">Logout</a>	  
   <?php
   }
   else
   {
	   ?>
	   <a href="signuppage.php"   class="mdl-layout__tab"  style="border-bottom:1px dotted white;cursor:pointer">Sign Up</a>
		  <a  href="loginpage.php" class="mdl-layout__tab"  style="border-bottom:1px dotted white;cursor:pointer">Login</a>
	   
	   <?php
   }
   ?>     
		</div> 
  <div class="mdl" id="demo-1">
 <div id="demo-snackbar-example1" class="mdl-js-snackbar mdl-snackbar" style="z-index:1000">
      <div class="mdl-snackbar__text"></div>
      <button class="mdl-snackbar__action" type="button"></button>
    </div>
  <div class="mdl-container">
    <div id="signup"  >
<form id ="signup1" role="form"  method="POST"> 
<div  style="height:50px;background-color:#5e6ec7;width:100%" align="center" >
  <p style="color:white;font-size:24px;padding-top:13px">REGISTER</p>
 </div>
<div class="mdl-cell mdl-cell--12-col " id="loginerror1" style="display:none">
</div>
<div class="mdl-cell mdl-cell--12-col " id="loginerror2" style="display:none">
</div>
<div  class="md1-grid " >


<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col" >
<input type="text" class="mdl-textfield__input" id="name" name="firstname"   onblur="showname()"   /><label class="mdl-textfield__label" for="name"><span style="color:grey" >FIRST NAME *</span></label>
<span class="mdl-textfield__errors" id="name1"></span>
</div>


<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col" >

<input type="text" class="mdl-textfield__input"  id="lastname" class="mdl-textfield__input" name="lastname"  /><label class="mdl-textfield__label" for="lastname"><span style="color:grey" >LAST NAME </span></label>
<span class="mdl-textfield__errors" id="lastname1"></span>
</div>


</div>
<div  class="md1-grid " >

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col">
<input type="text" id="email"name="email" class="mdl-textfield__input" onblur="showemail()"  /><label class="mdl-textfield__label" for="email"><span style="color:grey" >E-MAIL *</span></label>
<span class="mdl-textfield__errors" id="email1"></span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col">
<input type="text"  name="phone" class="mdl-textfield__input" id="phone"  onblur="showphone()"  /><label class="mdl-textfield__label" for="phone"><span style="color:grey" >PHONE *</span></label>
<span class="mdl-textfield__errors" id="phone1"></span>
</div>
</div>
<div  class="md1-grid " >
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col">

  <input type ="password" class="mdl-textfield__input" name ="password" id="password"   onblur="showpassword()"   /><label class="mdl-textfield__label" for="password"><span style="color:grey" >PASSWORD *</span></label>
  <span class="mdl-textfield__errors" id="password1"></span>
  </div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col">
<input type ="password" name ="confirm" class="mdl-textfield__input" id="confirm"  onblur="showconfirm()"  /><label class="mdl-textfield__label" for="confirm"><span style="color:grey" >CONFIRM PASSWORD *</span></label>
<span class="mdl-textfield__errors" id="confirm1"></span>
</div>
  

  
  </div>

<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="male">
  <input type="radio" id="male" class="mdl-radio__button gender" name="gender" value="m" required="required">
  <span class="mdl-radio__label">Male</span>
</label>
&nbsp;&nbsp;
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="female">
  <input type="radio" id="female" class="mdl-radio__button gender" name="gender" value="f"  required="required">
  <span class="mdl-radio__label">Female</span>
</label>
<div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
<br />
</div>
<div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
<button id="signupbutt" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" name="signup" onclick="finalsubmit()" style="width:200px">SIGN UP</button>
</div>

</div>

<div class="mdl-grid" align="center" >
 <div class="mdl-cell mdl-cell--12-col">
 <br />
 </div>
 </div>
<div class="mdl-grid" align="center" style="border-top:1px dotted grey" >
 <div class="mdl-cell mdl-cell--1-col">
 </div>
 <div class="mdl-cell mdl-cell--4-col">
 
<!-- Facebook login or logout button -->
<a href="javascript:void(0);" onclick="fbLogin()" id="fbLink1"><img src="fbsignu.jpg" alt="Fb Signup" style="width:100%;height:40px"/></a>
</div>
<div class="mdl-cell mdl-cell--2-col" align="center">
<p style="font-size:22px;margin-top:7px">OR</p>
 </div>
 <div class="mdl-cell mdl-cell--5-col">
 <!-- Container with the Sign-In button. -->
    <div id="gConnect1" class="button">
      <button style="background-color:white;outline:none;border:none;cursor:pointer" class="g-signin"
          data-scope="email"
          data-clientid="923681841659-rih846l33m2gsi7h8ttc09lclgub8389.apps.googleusercontent.com"
          data-callback="onSignInCallback"
          data-theme="dark"
          data-cookiepolicy="single_host_origin"><img src="gsignu.png?v=1.01" alt ="Google Signup" style="width:85%;height:45px" alt="google sign-in"  />
      </button>
 </div>
 </div>

</div>
<div id="loadimg1" class="mdl-progress mdl-js-progress mdl-progress__indeterminate "style="position:absolute;bottom:0px;width:100%;display:none"></div>
</form>
</div>
  </div>

 <div class="mdl" id="demo-2">
 <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar" style="z-index:1000">
      <div class="mdl-snackbar__text"></div>
      <button class="mdl-snackbar__action" type="button"></button>
    </div>
  <div class="mdl-container" >
  <div  style="height:50px;background-color:#5e6ec7;width:100%" align="center" >
  <p style="color:white;font-size:24px;padding-top:13px">SIGN IN</p>
 </div>
 
 
<div class="mdl-cell mdl-cell--12-col" align="center" id="loginerror" style="display:none;color:#d50000"></div>
  <div class="mdl-grid" align="center">
  <div class="mdl-cell mdl-cell--3-col">
  </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col">
    <input class="mdl-textfield__input" type="text" name="username" id="users" style="border-bottom:1px dotted grey" >
    <label class="mdl-textfield__label" for="users"><span style="color:grey" >E-MAIL</span></label>
  </div>
  </div>
  <div class="mdl-grid" align="center">
  <div class="mdl-cell mdl-cell--3-col">
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col">
    <input class="mdl-textfield__input" type="text" name="password" id="passs" style="border-bottom:1px dotted grey" >
    <label class="mdl-textfield__label" for="passs"><span style="color:grey" >PASSWORD</span></label>
  </div>
  </div>
  <div class="mdl-grid" >
  <div class="mdl-cell mdl-cell--12-col" align="center">
  
  
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" onclick = "logins()" style="width:200px">
Login
</button>
</div>
</div>
<div class="mdl-grid" align="center" >
 <div class="mdl-cell mdl-cell--12-col">
 <p ><a onclick="showresmodal()" data-target="#demo-3"   id="forgotpass" style="color:grey;text-decoration:none;cursor:pointer">Forgot Your Password ?</a></p>

 </div>
 </div>
<div class="mdl-grid" align="center" style="border-top:1px dotted grey" >
 <div class="mdl-cell mdl-cell--1-col">
 </div>
 <div class="mdl-cell mdl-cell--4-col">
 
<!-- Facebook login or logout button -->
<a href="javascript:void(0);" onclick="fbLogin()" id="fbLink"><img src="fblogin.png" alt ="FB Login" style="width:100%;height:40px"/></a>
</div>
<div class="mdl-cell mdl-cell--2-col" align="center">
<p style="font-size:22px;margin-top:7px">OR</p>
 </div>
 <div class="mdl-cell mdl-cell--5-col">
 <!-- Container with the Sign-In button. -->
    <div id="gConnect" class="button">
      <button style="background-color:white;outline:none;border:none;cursor:pointer" class="g-signin"
          data-scope="email"
          data-clientid="923681841659-rih846l33m2gsi7h8ttc09lclgub8389.apps.googleusercontent.com"
          data-callback="onSignInCallback"
          data-theme="dark"
          data-cookiepolicy="single_host_origin"><img src="glogin.png?v=1.01" alt = "Google Login" style="width:85%;height:45px" alt="google sign-in"  />
      </button>
 </div>
 </div>

</div>

<div id="loadimg" class="mdl-progress mdl-js-progress mdl-progress__indeterminate "style="position:absolute;bottom:0px;width:100%;display:none"></div>
  </div>
</div> 
  <div class="mdl" id="demo-3">
   <div class="mdl-container" id="cont-1" >
    <div   style="height:50px;background-color:#5e6ec7;width:100%" align="center" >
  <p style="color:white;font-size:24px;padding-top:13px">RESET YOUR PASSWORD</p>
 </div>
 <div class="mdl-cell mdl-cell--12-col">
 <br />
  </div>
  <div class="mdl-cell mdl-cell--12-col" align="center" id="regemail" style="color:#d50000"></div>
    <div class="mdl-grid" align="center">
	
  <div id="divs1" class="mdl-cell mdl-cell--2-col">
  </div>
    <div id="divs2" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--8-col">
    <input class="mdl-textfield__input" type="text" name="submitmail"  id="submitmail" style="border-bottom:1px dotted grey" >
    <label class="mdl-textfield__label" id="labsubmitmail" for="submitmail"><span style="color:grey" >Enter Your Registered E-mail</span></label>
	
  </div>
   <div id="divs3" class="mdl-cell mdl-cell--12-col" align="center">
 <br /> 
  
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" name="sendmail" onclick="sendemail()"  style="width:200px">
Get Password
</button>
</div>
  </div>
  <div id="loadimg2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate "style="position:absolute;bottom:0px;width:100%;display:none"></div>
  </div>
  <div class="mdl-close" data-target="#demo-3" onclick="mdl_close('#demo-3');"></div>
</div> 
<script>
var snackbarContainer = document.querySelector('#demo-snackbar-example');
var snackbarContainer1 = document.querySelector('#demo-snackbar-example1');
var snackbarContainer2 = document.querySelector('#demo-snackbar-example2');
function sendemail()
{
	document.getElementById("loadimg2").style.display = "block";
	$.post('resetyourpass.php', {sendmail:document.getElementById("submitmail").value}, function(data,status){ 
	//alert(data)
if(data =="Invalid E-mail.Please Enter Your Registered E-mail")
	{
		document.getElementById("regemail").innerHTML = data
	}
	if(data == "Please check your email for the new password")
	{
		document.getElementById("regemail").innerHTML = data;
		$("#divs1").remove();
		$("#divs2").remove();
		$("#divs3").remove();
	}
	else
	{
		document.getElementById("regemail").innerHTML = data;
	}

	document.getElementById("loadimg2").style.display = "none";
	});
}
$('#signupshow').mdl({
  type: 'modal',
  fullscreen:false,
  overlayClick:true
});
$('#loginshow').mdl({
  type: 'modal',
  fullscreen:false,
  overlayClick:true
});
$('#signupshow1').mdl({
  type: 'modal',
  fullscreen:false,
  overlayClick:true
});
$('#loginshow1').mdl({
  type: 'modal',
  fullscreen:false,
  overlayClick:true
});
function showresmodal()
{
mdl_close('#demo-1');
 mdl_close('#demo-2');
 mdl_open('#demo-3');

}


$(document).ready(function(){
  // Add smooth scrolling to all links
  $("#abc").click(function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;
      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('.mdl-layout__content').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
  
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

</script> 
 
<?php
 include("fb.php");
  include("googlesign.php");
 ?> 
 
<style>
.demo-list-item {
  width: 300px;
}
</style>
 <main class="mdl-layout__content" >
  <div class="mdl-layout__tab-panel is-active" id="videodiv" style="margin-top:-47px;margin-left:-0.6%;width:102%">
<div class="mdl-grid" >
<div class="mdl-cell mdl-cell--12-col">
<br /><br />
</div>
<?php
	$q1 = "SELECT * from qp_sections_topic WHERE topic_id = '$topics_id' AND video_show = '1'  " ;
 $r1= mysqli_query($con,$q1);
 $ro1 = mysqli_fetch_array($r1);
 $q2 = "SELECT * from qp_sections WHERE section_id = '$subjects_id' AND video_show = '1'  " ;
 $r2= mysqli_query($con,$q2);
 $ro2 = mysqli_fetch_array($r2);
 ?>
<div class="mdl-cell mdl-cell--3-col" style="height:500px;overflow-y:auto;overflow-x:none" >
<div class="mdl-cell mdl-cell--12-col" align="left"  >
 <p>
 <?php
 
 echo "<span style='font-size:16px'><b style='color:grey'>".$ro2['section_name']."</b>"."&nbsp;"."-"."&nbsp;"."<span style='color:grey;'>".$ro1['topic']."</span>"."</span>"."<hr>";
 
 ?>
 </p>
 </div>


 <ul class="demo-list-item mdl-list">
 
	<?php
	$i = 1 ;
	$q = "SELECT * FROM video_store WHERE topic_id='$topics_id' ORDER BY topic_id DESC";
	$r =mysqli_query($con,$q);
 if(mysqli_num_rows($r) > 0)
 {
	 ?>
	
	 <?php
 while($ro = mysqli_fetch_array($r))
 {
	 
	 $videos_id= $ro['video_id'];
 ?>
  <li class="mdl-list__item" ><span class="mdl-list__item-primary-content"><span style="color:grey"><?php echo $i."." ; ?></span>&nbsp;<a href="viewvideo.php?subject_id=<?php echo $subjects_id ?>&topic_id=<?php echo $topics_id ?>&video_id=<?php echo $videos_id ?>" style="color:grey;text-decoration:none"><?php echo $ro['video_name'] ?></a></span></li><br />
  
  <?php
  $i++ ;
 }
 ?>
 
  <?php
 }
  
  
  ?>
</ul>
<!-- Right aligned menu below button -->

</div>
<div class="mdl-cell mdl-cell--9-col" style="background-color:#f1f1f1" >
	<div class="mdl-grid"  >
 
 
 
 <?php
 $store = array();
	$sql = "SELECT * FROM video_store WHERE video_id='$video_id'";
	$result =mysqli_query($con,$sql);
	while ($row=mysqli_fetch_array($result)){
		  
		  array_push($store,$row);
			 }
	?>
	
	
	<?php
	for($i = 0;$i<count($store);$i++)
			{
	?>
	<div class="mdl-cell mdl-cell--12-col" >
	<!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 95%;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;

}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>

<div class="demo-card-wide mdl-card mdl-shadow--2dp">
 
  <div class="mdl-card__supporting-text">
  <?php
  $link =  $store[$i]['video_link'];
  ?>
 <iframe allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" width="100%" height="350px" src="https://www.youtube.com/embed/<?php echo $link ;?>?controls=1">
</iframe>
  </div>
  <div class="mdl-card__actions mdl-card--border" align="center">
    <span class="mdl-button mdl-button--colored mdl-js-button " style="color:grey;text-align:center">
      <?php echo $store[$i]['video_name'] ?>
    </span>
  </div>
  <div class="mdl-card__menu">
    <span class="" data-href="https://quiz.php?id=<?php echo $store[$i]['pass_id'];?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore " target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fquiz.php%3Fid%3D<?php echo $store[$i]['pass_id'];?>&amp;src=sdkpreparse"><svg style="width:24px;height:24px;" viewBox="0 0 24 24">
    <path fill="#5261b1" d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
</svg><span style="color:white;font-size:12px"><b></b></span></a></span>
  </div>
</div>
	</div>
	<?php
	}
	?>
	</div>
 </div>	
	 
  </div>
  <br />
  </div>
<div class="mdl-layout__tab-panel " id="features" style="margin-top:-47px;margin-left:-0.6%;width:102%">
<br />
 <div class="mdl-cell mdl-cell--12-col" style="background-image:url('paper.png');background-size:100%">
			<br />
              <h4 align="center" style=""><strong>KEY FEATURES</strong></h4>

<div class="mdl-grid">
<div class="mdl-cell mdl-cell--12-col pa" style="margin-top:-20px" >
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--4-col" >
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--4-col"><img class="image-circle pull-left" height="100px" alt="self assessment" src="icons/self assessment.png" width="100px" alt="self assessment" /></div>

<div class="mdl-cell mdl-cell--8-col bor"><br />
<span class="bo">SELF ASSESSMENT</span>

<p>&quot;Self-evaluation is the reflection of your performance&quot;</p>
</div>
</div>
</div>
<div class="mdl-cell mdl-cell--4-col">
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--4-col"><img class="image-circle pull-left" height="100px" alt="quality content" src="icons/quality assurance.png" width="100px" alt="best content for BANK/SSC/Railways" /></div>

<div class="mdl-cell mdl-cell--8-col bor"><br />
<span class="bo">QUALITY ASSURANCE</span>

<p>&quot;Better quality and improved functionality&quot;</p>
</div>
</div>
</div>
<div class="mdl-cell mdl-cell--4-col">
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--4-col"><img class="image-circle pull-left" alt="competitive environment" height="100px" src="icons/competitive environment.png" width="100px"  alt="Take Mocks based on Bank/SSC/Railways/Insurance" /></div>

<div class="mdl-cell mdl-cell--8-col bor"><br />
<span class="bo">COMPETITIVE ENVIRONMENT</span>

<p>&quot;Exposure to the competitive world.&quot;</p>
</div>
</div>
</div>
</div>
</div>
<div class="mdl-cell mdl-cell--12-col pa" style="margin-top:-30px">
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--4-col mdl-cell mdl-cell--4-col">
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--4-col"><img class="image-circle pull-left" alt="Secure Test Window" height="100px" src="icons/secure test window.png" width="100px" alt="Secure Online Test Window" /></div>

<div class="mdl-cell mdl-cell--8-col bor"><br />
<span class="bo">SECURE TEST WINDOW</span>

<p>&quot;Practicing by fair means delivers fair results&quot;</p>
</div>
</div>
</div>
<div class="mdl-cell mdl-cell--4-col mdl-cell mdl-cell--4-col">
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--4-col"><img class="image-circle pull-left" alt="Graphical Analysis" height="100px" src="icons/graphical analysis.png" width="100px" alt="Graphical Analysis of online test performance" /></div>

<div class="mdl-cell mdl-cell--8-col bor"><br />
<span class="bo">GRAPHICAL ANALYSIS</span>

<p>&quot;Graphical comparison is the best way to assess performance.&quot;</p>
</div>
</div>
</div>
<div class="mdl-cell mdl-cell--4-col mdl-cell mdl-cell--4-col">
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--4-col"><img class="image-circle pull-left" alt="Best Question Content" height="100px" src="icons/best content.png" width="100px" alt="Best & Relevant Questions for BANK/SSC/Railways/Insurance" /></div>

<div class="mdl-cell mdl-cell--8-col bor"><br />
<span class="bo">BEST QUESTION CONTENT</span>

<p>&quot;Avail benefits of the updated content&quot;</p>
</div>
</div>
</div>
            </div>
			</div>
			</div>
           </div>
		   <br /><br />
</div>
<div class=" mdl-layout__tab-panel md1-grid" align="center" style="background-color:white" id="contactdiv" >

<h4 style="font-weight:bolder">IT&#39;S EASY TO CONTACT US</h4>
<br />

<div class="mdl-cell mdl-cell--6-col">
<div id="map"></div>
</div>

<div class="mdl-cell mdl-cell--8-col" align="center"  >
<form>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
    <input class="mdl-textfield__input" type="text" name="cont-name" id="cont-name" style="border-bottom:1px dotted grey" >
    <label class="mdl-textfield__label" for="cont-name"><span style="color:grey" >Your Name</span></label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
    <input class="mdl-textfield__input" type="text" name="cont-email" id="cont-email" style="border-bottom:1px dotted grey" >
    <label class="mdl-textfield__label" for="cont-email"><span style="color:grey" >Your Email</span></label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
    <input class="mdl-textfield__input" type="text" name="cont-sub" id="cont-sub" style="border-bottom:1px dotted grey" >
    <label class="mdl-textfield__label" for="cont-sub"><span style="color:grey" >Subject</span></label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col" >
  <textarea class="mdl-textfield__input" type="text" rows="5" name="cont-msg" id="cont-msg" style="border:1px dotted grey"></textarea>
  <label class="mdl-textfield__label" for="cont-msg" style="color:grey">&nbsp;Let us know your concern, and we'll get back to you</label>
</div>

<br /><br />
<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" style="width:40%"  onclick="return contact();" >Submit Query</button></form>
</div>
<br /><br />
</div>
       
         <footer class="mdl-mega-footer">
          <div class="mdl-mega-footer--middle-section">
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">ADDRESS</h1>
              <ul class="mdl-mega-footer--link-list">
                <li style="color:white">CD-176, Sector-2, HEC colony</li>
                <li style="color:white">Dhurwa, Ranchi, Jharkhand</li>
                <li style="color:white">Pin - 834004</li>
				<li style="color:white"><a href="mailto:webmaster@example.com" >contact@vstudy.in</a></li>
				<li style="color:white"><a href="tel:+91953401778" >+91 - 95340-14778</a>, <a href="tel:+91725431463" >72504-31463</a></li>
              </ul>
            </div>
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">JOIN US</h1>
              <ul class="mdl-mega-footer--link-list">
                <li><a title="vStudy Facebook Page" href="https://facebook.com/vstudy.in" style="color:white" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Facebook</a></li><br />
                <li><a title="vStudy Twitter Page" href="https://twitter.com/vstudyst" style="color:white" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Twitter</a></li><br />
                <li><a title="vStudy Linkedin Page" href="https://www.linkedin.com/company/vstudy-smart-technologies" style="color:white" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Linkedin</a></li>
                
              </ul>
            </div>
			 <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading" >Conditions</h1>
			  
              <ul class="mdl-mega-footer--link-list" >
                 <li><a href="terms.php" style="color:white" title="vStudy Terms & Conditions"  target="_blank">Terms & Conditions</a></li><br />
                <li><a href="privacy.php" style="color:white" title=" vStudy Privacy Policy" rel="canonical" target="_blank">Privacy Policy</a></li><br />
                </ul>
            </div>
			<div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">About Us</h1>
              <!--<ul class="mdl-mega-footer--link-list">
                <li><a href="#">About</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Partners</a></li>
                <li><a href="#">Updates</a></li>
              </ul>-->
			  <p style="text-align:justify;color:white">vStudy.in encourages online learning through online test platform and self analysis of the performance through analytical assessment tool at affordable rates to the students who prepare for general competitive exams like Bank PO,Clerk, SSC, Railways, Insurance etc.</p>
            </div>
          </div>
         
        </footer>
  </main>
</div>  
  </body>
 <?php
 mysqli_close($con);
}
else
{
	?>
	<script>
	document.location = "index.php" ;
	</script>
	<?php
}
	
 ?>
<script src="email.js?v=1.06"></script>   
</html>
