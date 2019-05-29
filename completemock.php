<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COMPLETE MOCK</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="noback.js">
   </script>
   
<!--jquery links -->
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.css">
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.theme.css">
<script src="../jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="../jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>

<style>
.ui-dialog .ui-dialog-content
{
	background-color: #E5E6E5 ;
}
.ui-dialog-title .ui-dialog-titlebar
{
	background-color: white;
}
@font-face 
{
 src: url('../font/Lato-Regular.ttf');
 font-family: 'Lato';
}

@font-face {
    font-family: Walkman-Chanakya-901;
    src: url('../font/WalkmanChanakya901Normal-Italic.ttf');
}
@font-face {
    font-family: Walkman-Chanakya-901;
    src: url('../font/WalkmanChanakya901Normal.woff');
}
@font-face {
    font-family:Arial Unicode MS;
    src: url('../font/ARIALUNI.ttf');
}
body 
{
font-family: 'Lato', sans-serif;
}
</style>
<?php
session_start();
?>

<style>
.tick 
{
	background-image:url("../userside/tick.png");
	background-repeat:no-repeat;
	background-position: 0px 0px ;
	background-size: 30px 30px ;
	
}
</style>
</head>
<body>
<?php
include("connect.php");
define('uploadpath','../images/');
mysqli_set_charset($con,"utf8");
mysqli_query($con,"SET NAMES 'utf8'");

/*	if(isset($_POST['source'])=='repo')
		include("insertquestionfromrepo.php");
	die(); */
if(isset($_SESSION['adminusername']) && isset($_SESSION['adminpassword']) && isset($_SESSION['school_name']) && isset($_SESSION['class_name']) && isset($_SESSION['section_name']) && isset($_GET['mock_id']))
{
	$school_name = $_SESSION['school_name'];
$class_name = $_SESSION['class_name'];
$section_name = $_SESSION['section_name'];
	$table = "mock_section_details_".$school_name ;
	$tablee = "subsection_".$school_name ;
	$table1 = "mocktest_details_".$school_name;
	$table5 = "mock_questions_".$school_name;
	$table6 = "mock_questions_hindi_".$school_name;
	$mocid1 = $_GET['mock_id'];
	$_SESSION['mock_id'] = $mocid1;
$sqls = "SELECT * FROM $table1 WHERE mock_id = '$mocid1'";
$results = mysqli_query($con,$sqls);
$rows = mysqli_fetch_array($results);
$_SESSION['mocktest_name'] = $rows['mock_name'];
$num_of_sections = $rows['num_of_sections'];
$_SESSION['num_of_sections'] = $rows['num_of_sections'];
$_SESSION['num_option'] = $rows['num_option'];
?>
<div id="logo" style="width:100%;float:left;height:77px;background-color:#075caf;margin-top:0px;left:0px;background-image: url(logo.jpg);background-size:55px 55px ;background-repeat:no-repeat;background-position: 10px 10px;-webkit-box-shadow: 2px 0 5px 4px #969696; -moz-box-shadow: 2px 0 5px 4px #969696;
  box-shadow: 2px 0 5px 4px #969696;">
<h1 style="color:white ;text-align:center;margin-top:20px;">
COMPLETE MOCK</h1>
 </div><br /><br <br /><br /><br />
<?php
$sqls1 = "SELECT * FROM $table WHERE mock_id='$mocid1'";
$results1 = mysqli_query($con,$sqls1);
$tot = 0;
 $num_question = array();
 $section_name = array();
 $nerows = array();
$i=0 ;
while($nrows = mysqli_fetch_array($results1))
{
	array_push($nerows, $nrows);
}
function sortByOrder($a, $b)
 {
    return $a['section_id'] - $b['section_id'];
}

usort($nerows, 'sortByOrder');
foreach($nerows as $rows1)
{
$tot = $tot + $rows1['no_of_question'];	
$_SESSION['total'] = $tot ;
array_push($num_question ,$rows1['no_of_question']);
array_push($section_name ,$rows1['section_name']);
}
$_SESSION['num_questions'] = $num_question;
$_SESSION['sec_name'] = $section_name ;
	?>
    
    <script>
	
	var tot = <?php echo $tot ; ?>;
	countnumber = 1 ;
	var unattempt = new Array();
 var attempt = new Array();
		</script>
  <?php
  $attempt = array();
	$unattempt = array();
	for($i=1;$i<=$tot;$i++)
	{
	$sql = "SELECT * FROM $table5 WHERE  mock_id ='$mocid1' AND question_id = '$i'";
	$result = mysqli_query($con,$sql);	
	if(mysqli_num_rows($result) == 1)
	{
		?>
		<script>
		attempt[<?php echo $i ?> -1] = <?php echo $i ?> ;
		</script>
        <?php
	}
	else if(mysqli_num_rows($result) == 0)
	{
		?>
		<script>
		unattempt[<?php echo $i ?> -1] = <?php echo $i ?> ;
		
		</script>
        <?php
	}
	
		}

  ?>
<script>
redlength()
function redlength()
{
for(var i=0;i<unattempt.length;i++)
{
	if(typeof unattempt[i] === 'undefined') 
{
unattempt.splice(i,1);
redlength()
}

}
}
</script>
<form role="form" action="insertquesdatacomp.php#no-back" method = "POST" onsubmit="return checkvalidate()" enctype="multipart/form-data">
 <script type="text/javascript">
$(document).ready(function () {
$(".upload").each(function() {
$(this).change(function(){
var ext = $(this).val().split('.').pop().toLowerCase();
if(this.value.length != 0) {
if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
	document.getElementById("quessubmit").disabled = true ;
    alert('invalid extension!');
	
	this.value = ""
} 
else
{
	document.getElementById("quessubmit").disabled = false ;
}
}
else if(this.value.length == 0) {
document.getElementById("quessubmit").disabled = false ;

}
});
});
});
ques = [];
ques =<?php echo json_encode($_SESSION['num_questions']) ?>;
</script>
<br />
 <div class="container-fluid">
 <div class="col-xs-12" >
<div class="col-xs-2">
<input name="quesfile" type = "file" class="image" value = "upload" id="quesfile" >
</div>
<div class="col-xs-2">
<input type="button" class="btn btn-success" value="Upload" onclick="uploadquesimage(this)">
</div>
 </div>
 <div class="col-xs-12">
  <br /><br />
 </div>
 <div class="col-xs-12" id="imageuploadhold">
 </div>
  </div>
  <div class="col-xs-12">
  <br /><br />
 </div>
<?php
$image = 'image';
  $topic = 'topic';
  $subject = 'subject';
  $level = 'level' ;
  $correct = 'correct';
  $question = 'question';
  $optionstita = 'optionstita';
 // $hoptionstita = 'hoptionstita';
  $tita = 'tita';
  $htita = 'htita';
  $Option1 = 'Optiona';
  $Option2 = 'Optionb';
  $Option3 = 'Optionc';
  $Option4 = 'Optiond';
   $Option5 = 'Optione';
  $himage = 'himage';
  $hquestion = 'hquestion';
  $hOption1 = 'hOptiona';
  $hOption2 = 'hOptionb';
  $hOption3 = 'hOptionc';
  $hOption4 = 'hOptiond';
  $hOption5 = 'hOptione';
  $radiopass = 'radiopass';
  $hradiopass = 'hradiopass';
  $passage = 'passage';
  
  $hpassage = 'hpassage';
 $i = 1;
 $k = 1 ;
 $m = 1 ;
  foreach ($_SESSION['num_questions'] as $num_questions)
 {
	 ?>
 <div class="container-fluid">    
 <div style="col-xs-12">
	 <p style ="text-align:center;font-weight:bolder;font-size:20px"><?php echo"Section $i";?></p>
     </div>
     <div class="col-xs-12">
     <?php
	 for ($z = $m; $z<=$num_questions + $m -1;$z++)
	{
		?>
        <button id="pressbut<?php echo $z ; ?>" type="button" class="btn btn-primary" style="text-align:center" onClick="chques(<?php echo $z ; ?>,<?php echo $i ; ?>,'yes')"><?php echo $z ; ?></button>
     <script>
	 
	 if(<?php echo $z ; ?> == 1)
	 {
	document.getElementById("pressbut" + <?php echo $z ; ?>)	.className = "btn btn-success"	 
	 }
	 
	 </script>
        <?php
		$k++ ;
}
$m = $k ;
	 ?>
     </div>
     
     <div class="col-xs-12">
      <br />
     </div>
     </div>
     <?php
	 $i++ ;
 }
?>



<div class="col-xs-12">
<br />
</div>
<div class="container-fluid">  
<div  class="col-xs-12" style="position:relative;height:1300px">
<div id ="form" style="overflow-y:auto;overflow-x:hidden;border:1px dotted black;position:absolute;top:0px;width:98%;height:98%">  
<?php
include("quesboxcomp.php");
?>
</div>
 <?php
 $i = 1;
 $k = 1 ;
  foreach ($_SESSION['num_questions'] as $num_questions)
 {

	
	for ($j = 1; $j<=$num_questions;$j++)
	
{
	
  
         
?>

		
  <script>
		count = <?php echo $k ; ?> ;
		</script>
<br /><br />

 <div style="position:fixed;bottom:30px;right:10px;z-index:100">
     <button type="button" onClick="chques('<?php echo $k ; ?>','<?php echo $i ; ?>','no')" class="btn btn-primary" id="next<?php echo $k ?>" style="display:none" >Save & Next</button>
     <script>
	 if(<?php echo $k ?> == 1)
	 {
	document.getElementById("next" + <?php echo $k ?>).style.display = "block"
	 }
	 </script>
     </div>  
<?php
$k++ ;
 }
 $i++;
 }
 ?>
 </div>
</div>
<div class="col-xs-5">
</div>
 <div class="col-xs-1" style="margin-bottom:30px">
<input type="submit" value=" Submit "  name="submit" id="quessubmit" class="btn btn-primary" />
 </form>
</div>

<?php
//mysqli_close($con);


?>
<script src="texteditor.js"></script>
<script src="etexteditor.js"></script>
<script src="texteditor1.js"></script>
<script src="texteditor2.js"></script>
<script src="texteditor3.js"></script>
<script src="texteditor4.js"></script>
<script src="etexteditor1.js"></script>
<script src="etexteditor2.js"></script>
<script src="etexteditor3.js"></script>
<script src="etexteditor4.js"></script>
<?php
if($_SESSION['num_option'] == 5)
  {
	  ?>
 <script src="texteditor5.js"></script>
 <script src="etexteditor5.js"></script>
      <?php
  }
	  ?>

<script src="texteditor6.js"></script>
<script src="etexteditor6.js"></script>
<script type="text/javascript" src="insertquestioncomp.js">
   </script>
   <script src="wordfilter.js"></script>
<script>
request1 = [];
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

function checkvalidate()
{
if(unattempt.length > 0)
{
	textsw = "" ;
 for(i=0;i<tot;i++)
 {
	 if(typeof unattempt[i] !== 'undefined') 
{
 textsw = textsw + unattempt[i] + ","
}
} 

alert("Please Enter Question Number" + textsw )
return false ;
}
else if(unattempt.length == 0)
{
	return true ;
}
/*request5 = createRequest();
if (request5== null)
 {
alert("Unable to create request");
return;
}
else
{
	var url= "checksubmitcomp.php";
var requestData5 = "mock_id=" +
encodeURIComponent
request5.open("POST",url,true)+ "&total=" + encodeURIComponent(tot);
//document.getElementById("loadimg").className ="col-xs-1 background"
request5.onreadystatechange = function displayDetails5() 
{
if (request5.readyState == 4) {
if (request5.status == 200) {
//document.getElementById("loadimg").className ="col-xs-1 "
//alert(request2.responseText)
var arr1 = JSON.parse(request5.responseText)
alert(arr1.length)
return false ;
}	
}
}
request5.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request5.send(requestData5);
return false ;
}*/
}
function chques(z,i,flagship)
{
	countnumber = z ;	

request1[z-1] = createRequest();
if (request1[z-1]== null)
 {
alert("Unable to create request");
return;
}
else
{	
var question = document.getElementById("entext").value
var hquestion = document.getElementById("text").value
var option1 = document.getElementById("etexta").value
var option2 = document.getElementById("etextb").value
var option3 = document.getElementById("etextc").value
var option4 = document.getElementById("etextd").value;
<?php
  if($_SESSION['num_option'] == 5)
  {
	  ?>
var option5 = document.getElementById("etexte").value
var hoption5 = document.getElementById("texte").value;
<?php
  }
?>
var hoption1 = document.getElementById("texta").value
var hoption2 = document.getElementById("textb").value
var hoption3 = document.getElementById("textc").value
var hoption4 = document.getElementById("textd").value

var tita = document.getElementById("tita").value;
var passage = document.getElementById("etextp").value;
var hpassage = document.getElementById("textp").value;
var htita = document.getElementById("htita").value;
//var himage = document.getElementById("himage" + i + j).value
//var image = document.getElementById("image" + i + j).value
var topic = document.getElementById("topic").value;
var level =  document.getElementById("level").options[document.getElementById("level").selectedIndex].value;
var subject =  document.getElementById("subject").options[document.getElementById("subject").selectedIndex].value;
var optiontita1 = document.getElementsByName("optionstita")
for(var m =0;m< optiontita1.length;m++)
{
if(optiontita1[m].checked)
{
var optionstita =  $("input[name=optionstita"+"]:checked").val();
flagcheck = true ;
break ;
}
else
{
	flagcheck = false ;
}
}
var corrects1 = document.getElementsByName("correct")
for(var m =0;m< corrects1.length;m++)
{
if(corrects1[m].checked)
{
var correct =  $("input[name=correct"+"]:checked").val();
break ;
}
else
{
	
	var correct = "1" ;

}
}
var radiopass =  $("input[name=radiopass"+"]:checked").val();

var hradiopass =  $("input[name=hradiopass"+"]:checked").val();

if(flagship == 'no')
{
if(flagcheck == true)
{
flagcheck1 = true;	
}
else
{
	flagcheck1 = false;
}
}
if(flagship == 'yes')
{
	flagcheck1 = true ;
}
if(flagcheck1 == true)
{
	if(flagship == 'no')
{
document.getElementById("next" + z).innerHTML = "Saving" ;	
}
var url= "submitquesajax.php";
<?php
  if($_SESSION['num_option'] == 5)
  {
	  ?>
	  alert(z)
var requestData = "mock_id=" +
encodeURIComponent(<?php echo $mocid1 ?>) +"&ques_id=" +
encodeURIComponent(z) + "&question=" + encodeURIComponent(question) + "&hquestion=" + encodeURIComponent(hquestion)  + "&option1=" + encodeURIComponent(option1) + "&option2=" + encodeURIComponent(option2) + "&option3=" + encodeURIComponent(option3) + "&option4=" + encodeURIComponent(option4)+ "&hoption1=" + encodeURIComponent(hoption1) + "&hoption2=" + encodeURIComponent(hoption2)+ "&hoption3=" + encodeURIComponent(hoption3) + "&hoption4=" + encodeURIComponent(hoption4) + "&hoption5=" + encodeURIComponent(hoption5)+ "&option5=" + encodeURIComponent(option5)+ "&tita=" + encodeURIComponent(tita)+ "&htita=" + encodeURIComponent(htita)+ "&hpassage=" + encodeURIComponent(hpassage)+ "&passage=" + encodeURIComponent(passage)+ "&level=" + encodeURIComponent(level)+ "&subject=" + encodeURIComponent(subject)+ "&topic=" + encodeURIComponent(topic)+ "&optionstita=" + encodeURIComponent(optionstita)+ "&correct=" + encodeURIComponent(correct)+ "&radiopass=" + encodeURIComponent(radiopass)+ "&hradiopass=" + encodeURIComponent(hradiopass)+ "&section_id=" + encodeURIComponent(i)+ "&total=" + encodeURIComponent(tot)+ "&flagship=" + encodeURIComponent(flagship) ;
<?php
  }
else
  {
	  ?>
var requestData = "mock_id=" +
encodeURIComponent(<?php echo $mocid1 ?>) +"&ques_id=" +
encodeURIComponent(z) + "&question=" + encodeURIComponent(question) + "&hquestion=" + encodeURIComponent(hquestion)  + "&option1=" + encodeURIComponent(option1) + "&option2=" + encodeURIComponent(option2) + "&option3=" + encodeURIComponent(option3) + "&option4=" + encodeURIComponent(option4)+ "&hoption1=" + encodeURIComponent(hoption1) + "&hoption2=" + encodeURIComponent(hoption2)+ "&hoption3=" + encodeURIComponent(hoption3) + "&hoption4=" + encodeURIComponent(hoption4)+ "&tita=" + encodeURIComponent(tita)+ "&htita=" + encodeURIComponent(htita)+ "&hpassage=" + encodeURIComponent(hpassage)+ "&passage=" + encodeURIComponent(passage) + "&level=" + encodeURIComponent(level)+ "&subject=" + encodeURIComponent(subject)+ "&topic=" + encodeURIComponent(topic)+ "&optionstita=" + encodeURIComponent(optionstita)+ "&correct=" + encodeURIComponent(correct)+ "&radiopass=" + encodeURIComponent(radiopass)+ "&hradiopass=" + encodeURIComponent(hradiopass)  + "&section_id=" + encodeURIComponent(i)+ "&total=" + encodeURIComponent(tot)+ "&flagship=" + encodeURIComponent(flagship) ;
<?php
  }
?>
request1[z-1].open("POST",url,true);
request1[z-1].onreadystatechange = function displayDetails() {
	//alert(request1[z-1].responseText)	
if (request1[z-1].readyState == 4) {
	
if (request1[z-1].status == 200) {

if(flagship == 'no')
{
document.getElementById("next" + z).innerHTML = "Save & Next" ;
//document.getElementById("next" + z).disabled = false ;
if(unattempt.length > 0)
{
	for(var m=0;m<unattempt.length;m++)
	{
		
		if(unattempt[m] == z )
		{
			
if(typeof unattempt[m] !== 'undefined') 
{
	
unattempt.splice(m,1);
}
}
}
}
if(z == tot)
{
	var nex = 1 ;
}
if(z != tot)
{
	
	var nex = parseInt(z) + 1 ;
	
}
}
if(flagship == 'yes')
{
nex = z ;
}
for(var u = 1; u<= tot;u++)
{
	if(u != nex)
	{
//document.getElementById("form" + u).style.display = "none" ;
document.getElementById("pressbut" + u)	.className = "btn btn-primary"
document.getElementById("next" + u).style.display = "none"
	}
	if(u == nex)
	{
		
document.getElementById("pressbut" + u)	.className = "btn btn-success"	
//document.getElementById("form" + u).style.display = "block" ;
document.getElementById("next" + u).style.display = "block"
	}
}
var arr = JSON.parse(request1[z-1].responseText)
document.getElementById("quesnumb").innerHTML = arr[0]["secid"] + "-" + "&nbsp;" + "<span style='color:#1472cc'>" + arr[0]["secname"] + "</span>"
document.getElementById("enterques").innerHTML = "Enter Question No."+ arr[0]["question_id"] +  "- English"
 ;
 document.getElementById("henterques").innerHTML = "Enter Question No."+ arr[0]["question_id"] +  "- Hindi"
 ;
var docs = document.getElementById('entextEditor').contentWindow.document ;
docs.open();
docs.write(arr[0]["question"]);
docs.close();
var docsa = document.getElementById('etextEditora').contentWindow.document ;
docsa.open();
docsa.write(arr[0]["option1"]);
docsa.close();
var docsa = document.getElementById('etextEditorb').contentWindow.document ;
docsa.open();
docsa.write(arr[0]["option2"]);
docsa.close();
var docsa = document.getElementById('etextEditorc').contentWindow.document ;
docsa.open();
docsa.write(arr[0]["option3"]);
docsa.close();
var docsa = document.getElementById('etextEditord').contentWindow.document ;
docsa.open();
docsa.write(arr[0]["option4"]);
docsa.close();
var docsp = document.getElementById('etextEditorp').contentWindow.document ;
docsp.open();
docsp.write(arr[0]["passage"]);
docsp.close();
var hdocs = document.getElementById('textEditor').contentWindow.document ;
hdocs.open();
hdocs.write(arr[1]["question"]);
hdocs.close();
var hdocs = document.getElementById('textEditora').contentWindow.document ;
hdocs.open();
hdocs.write(arr[1]["option1"]);
hdocs.close();
var hdocs = document.getElementById('textEditorb').contentWindow.document ;
hdocs.open();
hdocs.write(arr[1]["option2"]);
hdocs.close();
var hdocs = document.getElementById('textEditorc').contentWindow.document ;
hdocs.open();
hdocs.write(arr[1]["option3"]);
hdocs.close();
var hdocs = document.getElementById('textEditord').contentWindow.document ;
hdocs.open();
hdocs.write(arr[1]["option4"]);
hdocs.close();
var hdocs = document.getElementById('textEditorp').contentWindow.document ;
hdocs.open();
hdocs.write(arr[1]["passage"]);
hdocs.close();
cutpaste("textEditor");
cutpaste("textEditora");
cutpaste("textEditorb");
cutpaste("textEditorc");
cutpaste("textEditord");
cutpaste("textEditore");
cutpaste("textEditorp");
cutpaste("entextEditor");
cutpaste("etextEditora");
cutpaste("etextEditorb");
cutpaste("etextEditorc");
cutpaste("etextEditord");
cutpaste("etextEditore");
cutpaste("etextEditorp");
document.getElementById("image").value = "" ;
document.getElementById("etextp").value = "" ;
document.getElementById("himage").value = "" ;
document.getElementById("textp").value = "" ;
if(arr[0]['correct_choice'] != ""  && arr[0]['correct_choice'] != null)
{
document.getElementById("radiopanel"+ arr[0]['correct_choice']).checked = true ;
}
if(arr[0]['correct_choice'] == ""  || arr[0]['correct_choice'] == null)
{
document.getElementById("radiopanel1").checked = true ;
}
<?php
if($_SESSION['num_option'] == 5)
  {
	  ?>
var hdocs = document.getElementById('textEditore').contentWindow.document ;
hdocs.open();
hdocs.write(arr[1]["option5"]);
hdocs.close();
var hdocs = document.getElementById('etextEditore').contentWindow.document ;
hdocs.open();
hdocs.write(arr[0]["option5"]);
hdocs.close();
	  <?php
  }
?>
if(arr[0]['options'] == 1)
{
document.getElementById('<?php echo "opt"; ?>').checked = true ;
document.getElementById('<?php echo "quesoption"; ?>').style.visibility = "block" ;
document.getElementById('<?php echo "titas"; ?>').style.visibility = "none" ;
document.getElementById('<?php echo "hquesoption"; ?>').style.visibility = "block" ;
document.getElementById('<?php echo "htitas"; ?>').style.visibility = "none" ;
}
else if(arr[0]['options'] === 0)
{
document.getElementById('<?php echo "tit" ?>').checked = true ;
document.getElementById('<?php echo "quesoption" ?>').style.display = "none" ;
document.getElementById('<?php echo "titas" ?>').style.visibility = "block" ;
document.getElementById('<?php echo "hquesoption" ?>').style.display = "none" ;
document.getElementById('<?php echo "htitas" ?>').style.visibility = "block" ;
}
else
{
	document.getElementById('<?php echo "tit" ?>').checked = false ;
	document.getElementById('<?php echo "opt"; ?>').checked = false ;
	document.getElementById('<?php echo "quesoption" ?>').style.display = "none" ;
document.getElementById('<?php echo "titas" ?>').style.visibility = "none" ;
document.getElementById('<?php echo "hquesoption" ?>').style.display = "none" ;
document.getElementById('<?php echo "htitas" ?>').style.visibility = "none" ;
}
document.getElementById("texting").style.display = "none";
document.getElementById("htext").style.display = "none";
document.getElementById("analytics").style.display = "none";
document.getElementById("hanalytics").style.display = "none";
document.getElementById("subimg").style.display = "none";
document.getElementById("hsubimg").style.display = "none";

if(arr[0]['radiopass'] == 0)
{
	document.getElementById('formelements').className = "tick";
document.getElementById("im").checked = true ;
document.getElementById("img").style.display = "block";
document.getElementById("passagediv").style.display = "none";
}
if(arr[0]['radiopass'] == 1)
{
	document.getElementById('formelements').className = "";
document.getElementById("pa").checked = true ;
document.getElementById("img").style.display = "none";
document.getElementById("passagediv").style.display = "block";
}
if(arr[0]['radiopass'] == 2)
{
	document.getElementById('formelements').className = "";
	document.getElementById("no").checked = true ;
	document.getElementById("img").style.display = "none";
	document.getElementById("passagediv").style.display = "none";
}
if(arr[0]['hradiopass'] == 0)
{
document.getElementById("him").checked = true ;
document.getElementById("himg").style.display = "block";
document.getElementById("hpassagediv").style.display = "none";
document.getElementById('formelements1').className = "tick";
}
if(arr[0]['hradiopass'] == 1)
{
	document.getElementById('formelements1').className = "";
document.getElementById("hpa").checked = true ;
document.getElementById("himg").style.display = "none";
document.getElementById("hpassagediv").style.display = "block";
}
if(arr[0]['hradiopass'] == 2)
{
	document.getElementById('formelements1').className = "";
	document.getElementById("hno").checked = true ;
	document.getElementById("himg").style.display = "none";
	document.getElementById("hpassagediv").style.display = "none";
}
document.getElementById("topic").value = arr[0]['topic'];
if(arr[0]['level_id'] != ""  && arr[0]['level_id'] != null)
{
	//alert(arr[0]['level_id'])
document.getElementById("level").value = arr[0]['level_id'] ;
}
if(arr[0]['level_id'] == ""  || arr[0]['level_id'] == null)
{
//alert("level" + 0)	
document.getElementById("level").selectedIndex = 0;
}
if(arr[0]['subject_id'] != ""  && arr[0]['subject_id'] != null)
{
document.getElementById("subject").value = arr[0]['subject_id'];
}
var parentid = document.getElementById("himg" );
	child = parentid.childNodes ;
	if(child.length > 5)
	{
	while(child.length > 5)
{
	
    parentid.removeChild(child[5]);
	
}
	}	
var parentid = document.getElementById("img" );
	child = parentid.childNodes ;
	if(child.length > 5)
	{
	while(child.length > 5)
{
	
    parentid.removeChild(child[5]);
	
}
	}	
}
}
}

request1[z-1].setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request1[z-1].send(requestData);
}
else
{
	alert("Please Enter all the details before saving")
}
}

}
</script>
<?php
}
 else
  {
  	header("location: adminlogout.php");
  	}
	
?>
</body>
</html>