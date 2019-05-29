<!DOCTYPE html>
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
<title>FEEDBACK</title>
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
<body>
<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_GET['feedback_name']) && isset($_GET['feedback_id']))
{
include("connect.php");
include("sess_var.php") ;
include("profiletop.php") ;
   ?>

<script>
cont = new Array();
cont1 = new Array();
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
function proceed(i,tea)
{
	flag = false ;
	for(k=1;k<=7;k++)
	{
	cont1[k-1] = false ;	
	}
	for(k=1;k<=7;k++)
	{
	opt = document.getElementsByName("optradio" + k + i)
	for(j=0;j<opt.length;j++)
	{
    (function(j)
	{
		
    if(opt[j].checked)
	{
	
	cont[k-1] = opt[j].value ;
	cont1[k-1] = true ;
	
	}
	})(j);
	}
	}
	
	for(m=0;m<7;m++)
	{
		
		if(cont1[m] == true)
		{
			flag = true ;
		}
		else if(cont1[m] == false)
		{
			flag = false ;
			break ;
		}
		
	}
if(flag == false)
{
	alert("Please Select all the options before proceeding further !!!");
}
else if(flag == true)
{
request1 = createRequest();
if (request1== null)
 {
alert("Unable to create request");
return;
}
else
{
document.getElementById("next" + i).innerHTML = "Saving........" ;		
var url= "submitfeedback.php";
var requestData = "feedback_id="+escape('<?php echo $_GET['feedback_id'] ?>')+"&index=" + escape(i)+"&teacher_id=" + escape(tea) + "&user_id=" + escape('<?php echo $user_id ; ?>')+"&value1=" + escape(cont[0])+"&value2=" + escape(cont[1])+"&value3=" + escape(cont[2])+"&value4=" + escape(cont[3])+"&value5=" + escape(cont[4])+"&value6=" + escape(cont[5])+"&value7=" + escape(cont[6]) +"&total=" + escape(tot) ;
request1.open("POST",url,true);
request1.onreadystatechange = function displayDetails() {
//alert(request1.responseText)	
if (request1.readyState == 4) {
if (request1.status == 200) {
	//texts.style.fontWeight = "bold"
	for(k=1;k<=tot;k++)
	{
		if(k != parseInt(i + 1))
		{
document.getElementById("hiddiv" + k).style.visibility = "hidden" ;
		}
	}
	
	if(i != tot)
	{
document.getElementById("hiddiv" + parseInt(i + 1)).style.visibility = "visible" ;

	}
	if(i == tot)
	{
document.getElementById("hids").style.visibility = "visible" ;	
document.getElementById("hidebut"+ i).style.visibility = "hidden" ;	
	}
	if(i == tot-1)
	{
		document.getElementById("next" + parseInt(i+1)).innerHTML = "Submit" ;
	}
	if(i != tot-1)
	{	
document.getElementById("next" + parseInt(i+1)).innerHTML = "Save Next >>" ;
	}
}	
}
}
request1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request1.send(requestData);
}
}
}
</script>

<div class="container-fluid">
<div class="page-header">
<h1 class="text-center">Feedback</h1>
</div>
<div class="row">

<div class="col-xs-12" style="font-size:18px">
  <?php
  $feedback_id = $_GET['feedback_id'];
  $count = 5;
 $sql1 = "SELECT * FROM feedback_teachername";
 $result1 = mysqli_query($con,$sql1); 
 if(mysqli_num_rows($result1) > 0)
 {
	 $i =1;
 while($row1 = mysqli_fetch_array($result1))
 {
	 $teacher_id = $row1['teacher_id'] ;
  $sql2 = "SELECT * FROM feedback_student WHERE feedback_id='$feedback_id' AND teacher_id='$teacher_id' AND user_id='$user_id' ";
  $result2 = mysqli_query($con,$sql2);
  if(mysqli_num_rows($result2) < 7)
  {
    ?>
    <div style="width:98%;position:absolute" id="hiddiv<?php echo $i ?>">
    <div class="col-xs-12">
   <p style="text-align:center;font-weight:bold"><?php echo $row1['teacher_name'];?></p>
   <table class="table table-striped table-bordered">
   <tr>
   <th style="text-align:Center">Qualities</th>
   <th style="text-align:left">Very Poor</th>
   <th style="text-align:left">Poor</th>
   <th style="text-align:left">Good</th>
   <th style="text-align:left">Very Good</th>
   <th style="text-align:left">Excellent</th>
   </tr>
   <tr>
   <td style="text-align:left">Knowledge base of the teacher(as perceived by you).</td>
   <form>
   <td style="text-align:left"><input value="1" type="radio" name="optradio1<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="2" type="radio" name="optradio1<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="3"  type="radio" name="optradio1<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="4" type="radio" name="optradio1<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="5" type="radio" name="optradio1<?php echo $i ; ?>"></td>
   
   </form>
   </tr>
   <tr>
   <td style="text-align:left">Interest generated by the teacher.</td>
   <form>
   <td style="text-align:left"><input value="1" type="radio" name="optradio2<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="2" type="radio" name="optradio2<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="3"  type="radio" name="optradio2<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="4" type="radio" name="optradio2<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="5" type="radio" name="optradio2<?php echo $i ; ?>"></td>
   
   </form>
   </tr>
   <tr>
   <td style="text-align:left">Sincerity /Commitment of the teacher.</td>
   <form>
   <td style="text-align:left"><input value="1" type="radio" name="optradio3<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="2" type="radio" name="optradio3<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="3"  type="radio" name="optradio3<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="4" type="radio" name="optradio3<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="5" type="radio" name="optradio3<?php echo $i ; ?>"></td>
   
   </form>
   </tr>
 <tr>
   <td style="text-align:left">Communication skills (in terms of articulation and comprehension).</td>
   <form>
   <td style="text-align:left"><input value="1" type="radio" name="optradio4<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="2" type="radio" name="optradio4<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="3"  type="radio" name="optradio4<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="4" type="radio" name="optradio4<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="5" type="radio" name="optradio4<?php echo $i ; ?>"></td>
   
   </form>
   </tr>  
    <tr>
   <td style="text-align:left">Ability to integrate course material with environment/other issues to provide a broader perspective.</td>
   <form>
   <td style="text-align:left"><input value="1" type="radio" name="optradio5<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="2" type="radio" name="optradio5<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="3"  type="radio" name="optradio5<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="4" type="radio" name="optradio5<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="5" type="radio" name="optradio5<?php echo $i ; ?>"></td>
   
   </form>
   </tr> 
   <tr>
   <td style="text-align:left">Accessibility of the teacher in and out of the class (includes availability of the teacher).</td>
   <form>
   <td style="text-align:left"><input value="1" type="radio" name="optradio6<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="2" type="radio" name="optradio6<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="3"  type="radio" name="optradio6<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="4" type="radio" name="optradio6<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="5" type="radio" name="optradio6<?php echo $i ; ?>"></td>
   
   </form>
   </tr>  
   <tr>
   <td style="text-align:left">Overall Rating.</td>
   <form>
   <td style="text-align:left"><input value="1" type="radio" name="optradio7<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="2" type="radio" name="optradio7<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="3"  type="radio" name="optradio7<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="4" type="radio" name="optradio7<?php echo $i ; ?>"></td>
   <td style="text-align:left"><input value="5" type="radio" name="optradio7<?php echo $i ; ?>"></td>
   
   </form>
   </tr>  
   </table>
 </div>   
<div class="col-xs-6">
</div>
<div class="col-xs-2" style="margin-top:3%" id="hidebut<?php echo $i ?>">

<button class="btn btn-primary" onClick="proceed(<?php echo $i ?>,<?php echo $row1['teacher_id'];?>)" id="next<?php echo $i ; ?>" name="next">Save & Next >></button>
</div>
</div>
<?php
if($i != 1)
{
	?>
    <script>
	document.getElementById("hiddiv" + <?php echo $i ?>).style.visibility = "hidden" ;
	</script>
    <?php
}
$i++ ;
  }
 }
 }
 if($i == 1)
  {
	  $sql3 = "SELECT * FROM feedback_submitted WHERE user_id='$user_id' AND feedback_id='$feedback_id'";
	  $result3 = mysqli_query($con,$sql3);
	  if(mysqli_num_rows($result3) == 0)
	  {
		  $sql4 = "INSERT INTO feedback_submitted(feedback_id,user_id) VALUES('$feedback_id','$user_id')";
		mysqli_query($con,$sql4);
	  }
	  ?>
      <p style="font-size:22px;color:red;text-align:center">You have successfully submitted the feedback</p>
      <?php
  }
$tot = $i -1 ;
 if($tot == 1)
  {
	  ?>
      <script>
document.getElementById("next"+ <?php echo $tot ?>).innerHTML = "Submit" ;
	  </script>
      <?php
  }
?>
<script>
var tot = "<?php echo $tot ;?>"
</script>
</div>
</div>	
 <div style="width:98%;position:absolute;visibility:hidden" id="hids">
 <p style="font-size:22px;color:red;text-align:center">You have successfully submitted the feedback</p>
 </div>
</div>
<?php
}
else
{
	?>
 <script>
 document.location = "login.php";
 </script>
    <?php
}
?>
</body>
</html>	