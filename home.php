<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

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
 
 <link rel="stylesheet" href="dist/css/AdminLTE.min.css?v=1.05">
<!-- Theme style -->
 
  
<script>
  $( function() {
     $( "input:checkbox" ).checkboxradio();
  } );
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
#homediv
{
	background-color:#054888 ;
	text-decoration:none;
}
#down:hover
{
	cursor:pointer;
}
</style>

<title>Home</title>
</head>
<body  class="hold-transition skin-blue sidebar-mini">
<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
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
?>
<?php

?>

<?php
	$username1 =$_SESSION['username'];
	$username = sanitize($username1);
	$sql1 = "SELECT * FROM user_login WHERE username = '$username'";
	$result1 = mysqli_query($con,$sql1);
	$row1 = mysqli_fetch_array($result1);
	 $school_id = $row1['school_id'] ;
	 $_SESSION['school_id'] = $school_id;
	 $_SESSION['subschool_id'] = $row1['subschool_id'] ;
	 $class_id = $row1['class_id'] ;
	 $_SESSION['class_id'] = $class_id;
	 $section_id = $row1['section_id'] ;
	 $_SESSION['section_id'] = $section_id;
	 
	 $email =  $row1['email'] ;
	 $user_id =  $row1['user_id'] ;
	 $_SESSION['email'] = $email;
	 $_SESSION['user_id'] = $user_id;
	 $query2 = "SELECT * FROM school_details WHERE school_id = '$school_id'";
		$result2 = mysqli_query($con, $query2);
		$row2 = mysqli_fetch_array($result2);
		$school = $row2['school'];
		$school_name = $row2['school_name'];
		$query3 = "SELECT * FROM section_details WHERE section_id = '$section_id'";
		$result3 = mysqli_query($con, $query3);
		$row3 = mysqli_fetch_array($result3);
		$section1 = $row3['section_name'];
		$section =strtoupper($section1);
		$query4 = "SELECT * FROM class_details WHERE class_id = '$class_id'";
		$result4 = mysqli_query($con, $query4);
		$row4 = mysqli_fetch_array($result4);
		$class = $row4['class'];
		$class_name = $row4['class_name'];
		 $table1 = "user_details" ;
	   $query5 = "SELECT * FROM $table1 WHERE user_id = '$user_id'"; 
	   $result5 = mysqli_query($con, $query5);
		$row5 = mysqli_fetch_array($result5);
		$phone = $row5['phone'];
		$demo = $row5['act_state'];
		$_SESSION['demo'] = $demo ;
		$firstname1 = strtolower($row5['firstname']);
		$package_id = 1 ;
		$firstname =strtoupper($firstname1);
		$lastname1 = strtolower($row5['lastname']);
		$lastname =strtoupper($lastname1);
		$gender = $row5['gender'];
		$_SESSION['gender'] = $gender ;
		$model = $row5['model'];
		$rate_factor = $row5['rate_factor'];
		$_SESSION['model'] = $model ;
		$image = $row5['image'];
		$_SESSION['image'] = $image ;
		$time_action1 = $row5['time_action'];
		$que = "SELECT * FROM user_recharge WHERE user_id = '$user_id'"; 
		$resw = mysqli_query($con,$que);
		$rew = mysqli_fetch_array($resw);
		$wallet_amount = $rew['amount'];
		$_SESSION['wallet_amount'] = $wallet_amount ;
		 $tables = "mocktest_details_".$school_name;
		 $tables1 = "time_remaining_".$school_name;
		if($_SESSION['demo'] == 1)
		{
		$time_action =date_create($time_action1 ); 
$time_action = date_format($time_action,"d F Y");
		}
		else{
			$time_action = "" ;
		}
		$_SESSION['time_action'] = $time_action ;
		
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
		$_SESSION['phone'] = $phone;
		$_SESSION['firstname'] = $firstname1;
		$_SESSION['lastname'] = $lastname1;
		 $_SESSION['school'] = $school;
	 $_SESSION['class'] = $class;
	 $_SESSION['section'] = $section;
	 $_SESSION['school_name'] = $school_name;
	 $_SESSION['class_name'] = $class_name;
	 $table12 = "mocktest_details_".$school_name;
	$_SESSION['package_id'] = $package_id;	

$x = 1 ;
$y = 1 ;

$s1 = "SELECT * FROM package_list WHERE package_id='$package_id'";
$q1 = mysqli_query($con,$s1);
if(mysqli_num_rows($q1) > 0)
		{
			while($store = mysqli_fetch_array($q1)) 
			{
			$mc_id = $store['mock_id'];	
		 $sqlis = "SELECT * FROM $table12 WHERE mock_id = '$mc_id'";
		 $queris =  mysqli_query($con,$sqlis);
		 $resis = mysqli_fetch_array($queris);
		 
		 break ;
			}
		}
		include("profiletop.php");
?>
<div class="wrapper">

 <?php
 include("headertop.php");
 ?>
<script>
document.getElementById("homs").className = "active treeview";
</script>
  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
	<div id="loads" style="display:none;z-index:100;background-color:white;position:fixed;top:0px;opacity:0.8;border-radius:0px 40px 40px 0px;" >
<img  src="loadings.gif" alt="Load" style="margin-left:35%;margin-top:220px">  
  </div>
	<section class="content" id="contents">
  <div class="row" align="center">
  <h3>Please Add Mocks to your Container</h3>
  
  </div>  
 
  <div class="row" style="margin-left:10px;" >
   <div class="row" style="margin-bottom:20px">
  <br />
  <div class="col-md-9" >
  <div class="row">

  <div class="col-xs-4">
  <?php
  $newrow = array(array());
  $newrow1 = array(array());
  $newrow2 = array(array(array()));
  ?>
  <select onchange="selectsubcourse(this.value)" class="form-control" id="coursedet">
  <?php
  $querrys = "SELECT * FROM course_info";
  $ress = mysqli_query($con,$querrys);
  $i = 0 ;
  while($rows60 = mysqli_fetch_array($ress))
  {
	  $j = 0 ;
	  $course_id = $rows60['course_id'] ;
	  $querrys1 = "SELECT * FROM subcourse_info WHERE course_id = '$course_id'";
  $ress1 = mysqli_query($con,$querrys1);
  $newrow[$i]['course_id'] = $rows60['course_id'];
  
  while($rows61 = mysqli_fetch_array($ress1))
  {
	  
	  $newrow1[$i][$j] = $rows61['subcourse_id'];
	  $newrow2[$i][$j]['name'] = $rows61['subcourse_name'];
	  $j++ ;

  }
	  ?>
	  <option value="<?php echo $rows60['course_id'] ?>"><?php echo $rows60['course_name'] ;?></option>
	  <?php
	  	   $i++ ;
}
  ?>
  </select>
  </div>
  <div class="col-xs-4">
  <select style="margin-left:10px" id="subcoursedet" class="form-control" onchange="showdiv()">
  <?php
  
  for($p = 0 ; $p < count($newrow1[0]); $p++)
  {
	  ?>
	  
	  <option value="<?php echo $newrow1[0][$p] ?>"> <?php echo $newrow2[0][$p]['name'] ?></option>
	  <?php
}
  ?>
  </select>
  </div>
 
  
 </div> 
 

  <?php
  
  $zz = 0 ;
  for($p = 0 ; $p < count($newrow1); $p++)
  {
	  for($m = 0 ; $m < count($newrow1[$p]); $m++)
  {
	 $flag = false ;
	  $flags = false ;
	  ?>
	  
 

  <div class="col-md-12  hidedivs" style="background-color:white;border-radius:10px;display:none;margin-left:-15px;margin-top:30px"  id="<?php echo $newrow1[$p][$m]."row".$newrow[$p]['course_id'] ; ?>" >
  <div class="row" align="center">
 <?php 
$course_id = $newrow[$p]['course_id'];
$subcourse_id = $newrow1[$p][$m] ;
?>
			 <div class="col-xs-12" style="font-weight:bolder;font-size:16px;text-align:center;padding-top:10px;margin-bottom:10px" id="<?php echo $newrow1[$p][$m]."fulls".$newrow[$p]['course_id'] ; ?>">Full Length Mocks</div> 
			 <?php
if($_SESSION['demo'] == 1)
				  {
 $qs = "SELECT * FROM $tables WHERE course_id='$course_id' AND subcourse_id='$subcourse_id' AND test_type='2' AND demo = '0' AND state='1' AND mock_submission = '1' ";
				  }
				  if($_SESSION['demo'] == 0)
				  {
 $qs = "SELECT * FROM $tables WHERE course_id='$course_id' AND subcourse_id='$subcourse_id' AND test_type='2' AND demo = '1' AND state='1' AND mock_submission = '1'";
				  }
 $re = mysqli_query($con,$qs);
 if(mysqli_num_rows($re) > 0)
 {
$flag = true ;

 while($r = mysqli_fetch_array($re))
 {
	
	 $mock_id = $r['mock_id'] ;
	 $qa = "SELECT * FROM $tables1 WHERE mock_id = '$mock_id' AND user_id = '$user_id'";
	 $rt = mysqli_query($con,$qa);
	 if(mysqli_num_rows($rt) == 0)
	 {
		 $sqll = "SELECT * FROM mock_added_list WHERE mock_id = '$mock_id' AND user_id = '$user_id'";
		 $resll = mysqli_query($con,$sqll);
		 if(mysqli_num_rows($resll) == 0)
		 {
			 $qm = "SELECT * FROM package_list WHERE mock_id = '$mock_id' AND package_id = '$package_id'";
			 $rea = mysqli_query($con,$qm);
			 if(mysqli_num_rows($rea) == 1)
			 {
			 
	 ?>
	 <div class="col-md-4 widget"  style="margin-top:20px;margin-bottom:5px">
	 
	<small><label style="width:100%;" for="check<?php echo $r['mock_id'] ; ?>"><span><?php echo $r['mock_name'] ; ?>&nbsp;</span><sup>(Rs <span style="font-weight:bolder"><?php echo round(($r['test_rate']/$rate_factor),1) ; ?></span>)</sup></label><input class="<?php echo $newrow1[$p][$m]."checkbox".$newrow[$p]['course_id'] ; ?>" type="checkbox" value="<?php echo $r['mock_id'] ; ?>" id= "check<?php echo $r['mock_id'] ; ?>" name="check<?php echo $r['mock_id'] ; ?>"  /></small>
	 </div>
	 <?php
			 }
	 }
	 }
 }
 }
 ?>
 </div>
 <div class="row" align="center">
			<div class="col-xs-12" style="font-weight:bolder;font-size:16px;margin-top:5px;margin-bottom:10px" id="<?php echo $newrow1[$p][$m]."secs".$newrow[$p]['course_id'] ; ?>">Sectional Mocks</div> 
			 <?php
if($_SESSION['demo'] == 1)
				  {
 $qs1 = "SELECT * FROM $tables WHERE course_id='$course_id' AND subcourse_id='$subcourse_id' AND test_type='1' AND demo = '0'  AND state='1' AND mock_submission = '1'";
				  }
				  if($_SESSION['demo'] == 0)
				  {
 $qs1 = "SELECT * FROM $tables WHERE course_id='$course_id' AND subcourse_id='$subcourse_id' AND test_type='1' AND demo = '1'  AND state='1' AND mock_submission = '1'";
				  }
 $re1 = mysqli_query($con,$qs1);
 if(mysqli_num_rows($re1) > 0)
 {
	 $flags = true ;
	 ?>

	 <?php
 while($r1 = mysqli_fetch_array($re1))
 {
	 
	 $mock_id = $r1['mock_id'] ;
	 $qa = "SELECT * FROM $tables1 WHERE mock_id = '$mock_id' AND user_id = '$user_id'";
	 $rt = mysqli_query($con,$qa);
	 if(mysqli_num_rows($rt) == 0)
	 {
		 $sqlli = "SELECT * FROM mock_added_list WHERE mock_id = '$mock_id' AND user_id = '$user_id'";
		 $reslli = mysqli_query($con,$sqlli);
		 if(mysqli_num_rows($reslli) == 0)
		 {
			  $qm1 = "SELECT * FROM package_list WHERE mock_id = '$mock_id' AND package_id = '$package_id'";
			 $rea1 = mysqli_query($con,$qm1);
			 if(mysqli_num_rows($rea1) == 1)
			 {
	 ?>
	 <div class="col-md-4 widget"  style="margin-top:20px;margin-bottom:5px">
	 
	<small><label style="width:100%;" for="check<?php echo $r1['mock_id'] ; ?>"><span><?php echo $r1['mock_name'] ; ?>&nbsp;</span><sup>(Rs <span style="font-weight:bolder"><?php echo round(($r1['test_rate']/$rate_factor),1) ; ?></span>)</sup></label><input class="<?php echo $newrow1[$p][$m]."checkbox".$newrow[$p]['course_id'] ; ?>" type="checkbox" value="<?php echo $r1['mock_id'] ; ?>" id= "check<?php echo $r1['mock_id'] ; ?>" name="check<?php echo $r1['mock_id'] ; ?>"  /></small> 
	 </div>
	 <?php
			 }
	 }
	 }
 }
}
 ?>
 </div>
 <div class="row">
 <br />
 </div>
 <?php
 if($flags == true || $flag == true)
 {
	  $classs =  $newrow1[$p][$m]."checkbox".$newrow[$p]['course_id'] ;  
	  $warning =  $newrow1[$p][$m]."warning".$newrow[$p]['course_id'] ;  
	  
 ?>
 <div class="row" align="center">
<div id = "<?php echo $newrow1[$p][$m]."warning".$newrow[$p]['course_id'] ; ?>" style="color:#3170A9;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;display:none;border-radius:5px" ><span>Please Select Any Mock !</span></div>
 <button class="btn btn-primary" style="margin-top:10px;margin-bottom:20px" onclick="insertmock('<?php echo $classs ; ?>','<?php echo $warning ; ?>','<?php echo $zz ; ?>')">Add To Container</button>
 </div>
 <?php
  }
 ?>
  </div>
  
  <?php
  $zz++ ;
  }
  }
  ?>
  </div>
  <div class="col-md-3">
  <div class="col-md-12">
  <div class="row" align="center">
  <h4><b>Your Mock Container</b></h4>
  </div>
  </div>
 <div class="col-md-12" id = "errmsg" style="color:#3170A9;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;display:none;border-radius:5px;margin-left:5px" align="center" ><span >You have already attempted it.</span></div>
 <div class="col-xs-12" id="containers" style="border-radius:10px;margin-top:10px" align="left" >
  <?php

  $sqllis = "SELECT * FROM mock_added_list WHERE user_id = '$user_id' ORDER BY mockadd_id DESC";
		 $resllis = mysqli_query($con,$sqllis);
		 if(mysqli_num_rows($resllis) > 0)
		 {
			 while($rowis = mysqli_fetch_array($resllis))
			 {
			 $mock_id = $rowis['mock_id'];
			 $sr = "SELECT * FROM $tables WHERE mock_id = '$mock_id'";
			 $resllis1 = mysqli_query($con,$sr);
			 $rty = mysqli_fetch_array($resllis1);
			 ?>
			 
			 <div class="col-md-12" style="background-color:white;margin-top:10px;border-radius:5px;">
			 <p style="padding-top:5px;position:relative" ><?php echo $rty['mock_name']; ?> <span> ( Rs <?php echo $rty['test_rate'] ; ?> )</span>
			 <?php
			 $mock_id = $rty['mock_id'] ;
	 $qas = "SELECT * FROM $tables1 WHERE mock_id = '$mock_id' AND user_id = '$user_id'";
	 $rts = mysqli_query($con,$qas);
	 if(mysqli_num_rows($rts) == 0)
	 {
			 ?>
			 <span style="cursor:pointer;position:absolute;right:-9px;bottom:0px" onclick="removeit(this,'<?php echo $mock_id ; ?>')">&#10006;</span></p>
			 </div>
			 <?php
	 }
	  if(mysqli_num_rows($rts) == 1)
	 {
		 $rors = mysqli_fetch_array($rts);
			 ?>
			 <span style="cursor:pointer;position:absolute;right:-9px;bottom:0px"><i style="color:blue" id="mo<?php echo $mock_id ; ?>" class="fa fa-info-circle" aria-hidden="true"></i></span></p>
			 </div>
			 <?php
			 if($rors['mock_state'] == 1)
			 {
			 ?>
			 <script>
			 document.getElementById("mo<?php echo $mock_id ; ?>").title = "You have started the mock but not completed";
			 </script>
			 <?php
			 }
			 if($rors['mock_state'] == 2)
			 {
			 ?>
			 <script>
			 document.getElementById("mo<?php echo $mock_id ; ?>").title = "You have taken the Mock";
			 </script>
			 <?php
			 }
	 }
			 }
			
		 }
  ?>
  </div>
   </div>
   <script type="text/javascript">
		  newrow = <?php echo json_encode($newrow, JSON_PRETTY_PRINT) ?>;
		  newrow1 = <?php echo json_encode($newrow1, JSON_PRETTY_PRINT) ?>;
		  newrow2 = <?php echo json_encode($newrow2, JSON_PRETTY_PRINT) ?>;
		 </script>
  <script>
  document.getElementById("1row1").style.display = "block";
  function showdiv()
  {
	 var courval =  document.getElementById("coursedet").value ;
	  var subcourval =  document.getElementById("subcoursedet").value ;
	  eles = document.getElementsByClassName("hidedivs") ;
	  for(var i=0;i< eles.length;i++)
	  {
		  eles[i].style.display= "none" ;
	  }
	  document.getElementById(subcourval + "row" + courval).style.display = "block";
  }
  
  
  
  function selectsubcourse(x)
  {
	 for(i=0;i<newrow.length;i++)
	 {
		if(newrow[i]['course_id'] == x)
		{
			
			var sub1 = document.getElementById("subcoursedet") ;
	var child = sub1.childNodes
	if(child.length > 0)
	{
	while(child.length > 0)
{
	
    sub1.removeChild(child[0]);
	
}
	}
	if(newrow1[i].length != 0)
 {
for(var k=0;k<newrow1[i].length ;k++)
{
 sub1.options[sub1.options.length] = new Option(newrow2[i][k]['name'], newrow1[i][k]);
}
 }
		}			
	 }
	showdiv() ;  
  }
  </script>
  <script>
  
   function createRequest() {
try {
request = new XMLHttpRequest();
} catch (tryMS) {
try {
request = new ActiveXObject("Msxml2.XMLHTTP");
} catch (otherMS) {
try {
request = new ActiveXObject("Microsoft.XMLHTTP");
} catch (failed) {
request = null;
}
}
}
return request;
}
  request11 = [];
  request10 = [];
 function insertmock(x,y,z)
  {
  if($('.'+x+':checked').length >= 1)
  {
	   arr1 = [] ;
	   arr = [];
        elem = document.getElementsByClassName(x) ;
	   var k = 0
	   for(var i= 0;i<elem.length;i++)
	   {
		   if(elem[i].checked == true)
		   {
			 
		   arr[k] = elem[i].value ;
		   arr1[k] = elem[i].id ;
		   
		   k++ ;
		   }
	   }
 request10[z] = createRequest();
if (request10[z] == null) {
alert("Unable to create request");
return;
}
else
{
	
	document.getElementById("loads").style.display = "block";
	//document.getElementById("contents").style.display = "none";
	var hei = window.innerHeight - 0
	
	document.getElementById("loads").style.height = hei + "px" ;
	document.getElementById("loads").style.width = document.getElementById("contents").clientWidth + "px" 
flag2 = true;	
var url= "addmocklist.php"; 
var requestData10 = "user_id=" +
escape("<?php echo $user_id ?>") + '&arr=' + JSON.stringify(arr) + '&table=' +"<?php echo $tables ; ?>" + '&rate_factor=' +"<?php echo $rate_factor ; ?>" ;
request10[z].open("POST",url,true);

request10[z].onreadystatechange = function displayDetails10() {

if (request10[z].readyState == 4) {
if (request10[z].status == 200) {
	var arrs = JSON.parse(request10[z].responseText)
	//alert(request10[z].responseText)
if(arrs['text'] == "You don't have Required Money in your wallet.Please Recharge" || arrs['text']== "Request failed")
{
	
	document.getElementById(y).innerHTML = arrs['text'];
	document.getElementById(y).style.display = "block" ;
setTimeout(function(){ 
document.getElementById(y).style.display ="none";
document.getElementById(y).innerHTML = "Please Select Any Mock !";
}, 6000);
}
else
{
	
for(m=0;m< arr1.length;m++)
{
 var child = document.getElementById(arr1[m]);
 
 var parents = child.parentNode;
  var parents1 = parents.parentNode;
 //alert(parents.parentNode.tagName)
 
parents1.parentNode.removeChild(parents1);
//alert(parents.childNodes[0].childNodes[3].tagName)
var prev = parents.childNodes[0].childNodes[2].innerHTML ;
var prev1 = parents.childNodes[0].childNodes[3].childNodes[1].innerHTML ;
var elem = document.createElement("P");  
var elem1 = document.createElement("DIV");
var elem2 = document.createElement("span"); 
var elem3 = document.createElement("span");      
//var t = document.createTextNode(prev);
var t1 = document.createTextNode("( Rs " + prev1 + ")");      
//var t2 = document.createTextNode("&#10006;"); 
elem.innerHTML = prev;  
elem2.appendChild(t1);      
//elem3.appendChild(t2);       
someElement1 = document.getElementById("containers")  ;
someElement1.appendChild(elem1);           
someElement = document.getElementById("containers").childNodes[0];
someElement.parentNode.insertBefore(elem1, someElement.nextSibling);
elem1.appendChild(elem); 
elem.appendChild(elem2); 
elem.appendChild(elem3); 
elem1.style.backgroundColor = "white" ;
elem1.className = "col-md-12";
elem1.style.marginTop = "10px" ;
elem1.style.borderRadius = "5px" ;
elem.style.position = "relative" ;
elem3.style.position = "absolute" ;
elem3.style.cursor = "pointer" ;
elem3.style.right = "-9px" ;
elem3.style.bottom = "0px" ;
elem.style.paddingTop = "5px" ;
elem3.innerHTML = "&#10006;";
passit(elem3,arr[m]);

}
document.getElementById(y).innerHTML = arrs['text'];
	document.getElementById(y).style.display = "block" ;
setTimeout(function(){ 
document.getElementById(y).style.display ="none";
document.getElementById(y).innerHTML = "Please Select Any Mock !";
}, 6000);
}
document.getElementById("loads").style.display = "none";

if(arrs['amount'] != "")
{
	document.getElementById("wallet").innerHTML = arrs['amount'] ;
	document.getElementById("wallet1").innerHTML = arrs['amount'] ;
}
}
}
}
request10[z].setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request10[z].send(requestData10);
}
	   
  }
  else
  {
document.getElementById(y).style.display = "block"  
setTimeout(function(){ 
document.getElementById(y).style.display ="none";
}, 6000);
  }
  }
  </script>
  <script>
function passit(x,y)
{
	x.onclick = function()
	{
		removeit(x,y)
	}
}
function removeit(x,z)
  {
	request11[z] = createRequest();
if (request11[z] == null) {
alert("Unable to create request");
return;
}
else
{	
document.getElementById("loads").style.display = "block";
	//document.getElementById("contents").style.display = "none";
	var hei = window.innerHeight - 0
	
	document.getElementById("loads").style.height = hei + "px" ;
	document.getElementById("loads").style.width = document.getElementById("contents").clientWidth + "px" 
var url= "removemocklist.php"; 
var requestData11 = "user_id=" +
escape("<?php echo $user_id ?>") + '&mock_id=' + z + '&table=' +"<?php echo $tables ; ?>" + '&table1=' +"<?php echo $tables1 ; ?>" + '&rate_factor=' +"<?php echo $rate_factor ; ?>";
request11[z].open("POST",url,true);

request11[z].onreadystatechange = function displayDetails11() {
if (request11[z].readyState == 4) {
if (request11[z].status == 200) { 

var arr = JSON.parse(request11[z].responseText)
if(arr['msg'] =="")
{
var elem1 = document.createElement("DIV");
var elem2 = document.createElement("small");
var elem3 = document.createElement("label");
var elem4 = document.createElement("input");
var elem6 = document.createElement("span");
var elem7 = document.createElement("span");
elem1.className = "col-md-4 widget";
elem1.style.marginTop = "20px";
elem1.style.marginBottom = "5px";
if(arr['test_type'] == 2)
{
	var node1 = document.getElementById(arr['subcourse_id'] + "fulls" + arr['course_id'] )
node1.parentNode.insertBefore(elem1, node1.nextSibling);
}

if(arr['test_type'] == 1)
{
	var node1 = document.getElementById(arr['subcourse_id'] + "secs" + arr['course_id'] )
node1.parentNode.insertBefore(elem1, node1.nextSibling);

}
elem1.appendChild(elem2);
elem2.appendChild(elem3);
elem3.appendChild(elem6);
elem2.appendChild(elem4);
elem3.style.width = "100%";

elem3.setAttribute("for","check"+arr['mock_id']); 
elem5 = document.createElement("sup");
var node2  = document.createTextNode("(Rs " );
var node3  = document.createTextNode(")");
elem6.innerHTML = arr['mock_name'] + "&nbsp";

elem5.appendChild(node2);
elem5.appendChild(elem7);
elem7.innerHTML = arr['test_rate'] ;
elem7.style.fontWeight = "Bolder" ;
elem5.appendChild(node3);

elem3.appendChild(elem5);
elem4.type = "checkbox";
elem4.className = arr['subcourse_id'] + "checkbox" + arr['course_id'];
//elem4.id = "check"+arr['mock_id']";
elem4.setAttribute("id","check"+arr['mock_id']);
elem4.setAttribute("value",arr['mock_id']) ;
//elem4.name = "check"+arr['mock_id']";
elem4.setAttribute("name","check"+arr['mock_id']);
$( "#check"+arr['mock_id'] ).checkboxradio();
 var parent = x.parentNode ;
 var parent1 = parent.parentNode ;
parent1.parentNode.removeChild(parent1);

if(arr['amount'] != "")
{
	
	document.getElementById("wallet").innerHTML = arr['amount'] ;
	document.getElementById("wallet1").innerHTML = arr['amount'] ;
}
}
else
{
	document.getElementById("errmsg").style.display = "block"  
setTimeout(function(){ 
document.getElementById("errmsg").style.display ="none";
}, 6000);
}
document.getElementById("loads").style.display = "none";
  }
}
  
}
request11[z].setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request11[z].send(requestData11);
}
  }
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
		document.getElementById("wallet1").innerHTML = response ;
     }
     });
	 
 }
 setInterval(function(){ 
updatewallet();
}, 7000);
  </script>
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 
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
else
{
	header("location: login.php");
}

?>

</body>
</html>