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
<?php
session_start() ;

?>
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
window.onload = function()
{
	var e = document.getElementById("Selectsec");
	
 selques(e.options[e.selectedIndex].value)
 checksel();
}
function checksel()
 {
  $(".checkbox1:checkbox").on('click', function(){
		   if($('.checkbox1:checked').length>0)
           $('#delbookmark').prop("disabled",false);
       if($('.checkbox1:checked').length==0)
           $('#delbookmark').prop("disabled",true);
});	
}
function selques(x)
{
var appendid = document.getElementById("appendques") ;
if(appendid.childNodes.length > 0)
{
	while(appendid.childNodes.length > 0)
	{
		appendid.removeChild(appendid.childNodes[0]);
	}
}
var k = 1;
for(var i=0;i<len;i++)
{
if(quesstore[i]['subject_id'] == x)
{
	topdiv = document.createElement("div");
	appendid.appendChild(topdiv);
	topdiv.className = "col-xs-5"
	tops = document.createElement("p")
	tops.innerHTML = "<b>" +"Topic :"+"</b>"+"&nbsp;" +quesstore[i]['topic'] + "<br />" ;
	topdiv.appendChild(tops);
	//topdiv.style.border = "1px solid black";
	topdiv1 = document.createElement("div");
	appendid.appendChild(topdiv1);
	topdiv1.className = "col-xs-7"
	//topdiv1.style.border = "1px solid black";
	tops2 = document.createElement("p")
	topdiv1.appendChild(tops2);
	tops1 = document.createElement("span")
	tops1.innerHTML = "SELECT TO <span style='color:red'>DELETE<span>" +"&nbsp;" +"&nbsp;"+"&nbsp;"+"&nbsp;" ;
	tops2.appendChild(tops1);
	var checkbox = document.createElement('input')
    checkbox.type = "checkbox" ;
    checkbox.setAttribute("name","deletebook")
	checkbox.setAttribute("class","checkbox1") 
	//checkbox.onchange = "alert(1)"
    checkbox.value = quesstore[i]['question_id'] + "+" + quesstore[i]['mock_id'] + "+" + user_id  ;
    tops2.appendChild(checkbox)
	
if(quesstore[i]['passage'] != null && quesstore[i]['passage'] == null)
{
	
	texts = document.createElement("p")
	texts.innerHTML = quesstore[i]['passage'] ;
	appendid.appendChild(texts)
}
if(quesstore[i]['passage'] == null || quesstore[i]['passage'] == "")
{
	
	if(quesstore[i]['imagefile'] != null && quesstore[i]['imagefile'] != "")
	{
		texts1 = document.createElement("div")
		appendid.appendChild(texts1)
		texts1.style.width = "100%"
		//alert(texts1.style.width)
		texts1.style.height = "300px";
		texts1.style.overflowY = "auto";
		//texts1.style.border ="1px solid black" ;
	
	imgs = document.createElement("img") ;
	texts1.appendChild(imgs)
	imgs.src = "http://www.vstudy.in/test/images/" + quesstore[i]['imagefile'] ;
	imgs.style.width = "100%" ;
	}
}


texts2 = document.createElement("p")
texts2.innerHTML = "<br />"+k+"&nbsp;"+ "&nbsp;"+quesstore[i]['question'] + "<br />" ;
appendid.appendChild(texts2)
if(quesstore[i]['tita'] == 0)
{
texts3 = document.createElement("p")
texts3.innerHTML = "&nbsp;"+ "&nbsp;"+"A"+ "&nbsp;"+ "&nbsp;"+ "&nbsp;"+ quesstore[i]['option1'] + "<br />" ;
appendid.appendChild(texts3)
texts4 = document.createElement("p")
texts4.innerHTML ="&nbsp;"+ "&nbsp;"+ "B"+"&nbsp;"+"&nbsp;"+"&nbsp;"+quesstore[i]['option2'] + "<br />" ;
appendid.appendChild(texts4)
texts5 = document.createElement("p")
texts5.innerHTML ="&nbsp;"+ "&nbsp;"+ "C"+"&nbsp;"+"&nbsp;"+"&nbsp;"+quesstore[i]['option3'] + "<br />" ;
appendid.appendChild(texts5)
texts6 = document.createElement("p")
texts6.innerHTML = "&nbsp;"+ "&nbsp;"+"D"+"&nbsp;"+"&nbsp;"+"&nbsp;"+quesstore[i]['option4'] + "<br />" ;
appendid.appendChild(texts6)
if(quesstore[i]['option5'] != null && quesstore[i]['option5'] != "")
{
texts8 = document.createElement("p")
texts8.innerHTML = "&nbsp;"+ "&nbsp;"+"E"+"&nbsp;"+"&nbsp;"+"&nbsp;"+quesstore[i]['option4'] + "<br />" ;
appendid.appendChild(texts8)	
}
texts9 = document.createElement("p")
texts9.innerHTML = "&nbsp;"+ "&nbsp;"+"Correct Choice :"+"&nbsp;"+"&nbsp;"+"&nbsp;"+"<b>" + quesstore[i]['correct_choice'] +"</b>"+ "<br />" + "<br />" ;
appendid.appendChild(texts9)
}
if(quesstore[i]['tita'] == 1)
{
	texts7 = document.createElement("p")
texts7.innerHTML = "&nbsp;"+ "&nbsp;"+"Answer :"+"&nbsp;"+"&nbsp;"+"&nbsp;"+"<b>"+quesstore[i]['tita_correct']+ "</b>" + "<br />" ;
appendid.appendChild(texts7)
}
}
k++ ;
}
$('#delbookmark').prop("disabled",true);
checksel()
}
</script>
<title>BOOKMARKED QUESTIONS</title>
</head>

<body class="hold-transition skin-blue sidebar-mini">

<?php
date_default_timezone_set("Asia/Kolkata");
if( isset($_SESSION['username'] ) && isset($_SESSION['password']) && isset($_SESSION['class_name']) && isset($_SESSION['school_name']) && isset($_SESSION['section']) )
{
	include("connect.php");
	mysqli_set_charset($con,"utf8");
mysqli_query($con,"SET NAMES 'utf8'");
	// $class = $_SESSION['class_name'];
	  $school = $_SESSION['school_name'];
	 $section = $_SESSION['section'];
	 $user_id = $_SESSION['user_id'];
$table1 = "mocktest_details_".$school;
$table2 = "mock_questions_".$school ;
$table3 = "time_remaining_".$school ;
  $user_id = $_SESSION['user_id']; 
 include("sess_var.php") ;
 include("profiletop.php") ;
 $quesstore = array( array());
 $x = 1;
 $y = 1;
 if(isset($_POST['delbookmark']))
 {
	$todel = $_POST['deletebook'];
	$todel1 = explode('+',$todel,3) ;
	$sql4 = "DELETE FROM bookmark_question WHERE question_id='$todel1[0]' AND mock_id ='$todel1[1]' AND user_id='$todel1[2]'" ;
	mysqli_query($con,$sql4);
 }
 $sql2 = "SELECT * FROM bookmark_question WHERE user_id='$user_id'";
 $result2 =  mysqli_query($con,$sql2);
 if(mysqli_num_rows($result2) >0)
 {
	 $i = 0 ;
	 while($row2 = mysqli_fetch_array($result2))
	 {
		 $mock_id = $row2['mock_id'] ;
		 $ques_id =  $row2['question_id'] ;
		 $sql3= "SELECT * FROM $table2 WHERE mock_id='$mock_id' AND question_id = '$ques_id'" ;
		 $result3 =  mysqli_query($con,$sql3);
		 if(mysqli_num_rows($result3) == 1)
 {
	  $row3 = mysqli_fetch_array($result3) ;
	  $quesstore[$i]['mock_id'] = $mock_id ;
	 $quesstore[$i]['subject_id'] = nl2br($row3['subject_id']);
	 $quesstore[$i]['question_id'] = nl2br($row3['question_id']);
	 $quesstore[$i]['question'] = nl2br($row3['question']);
	 $quesstore[$i]['options'] = nl2br($row3['Options']);
	 $quesstore[$i]['tita'] = nl2br($row3['tita']);
	 $quesstore[$i]['tita_correct'] = nl2br($row3['tita_correct']);
	  $quesstore[$i]['option1'] = nl2br($row3['Option1']);
	  $quesstore[$i]['option2'] = nl2br($row3['Option2']);
	  $quesstore[$i]['option3'] = nl2br($row3['Option3']);
	  $quesstore[$i]['option4'] = nl2br($row3['Option4']);
	  $quesstore[$i]['option5'] = nl2br($row3['Option5']);
	  if($row3['Correct_choice'] == 1)
	  {
	  $quesstore[$i]['correct_choice'] = "A";
	  }
	  if($row3['Correct_choice'] == 2)
	  {
	  $quesstore[$i]['correct_choice'] = "B";
	  }
	  if($row3['Correct_choice'] == 3)
	  {
	  $quesstore[$i]['correct_choice'] = "C";
	  }
	  if($row3['Correct_choice'] == 4)
	  {
	  $quesstore[$i]['correct_choice'] = "D";
	  }
	  if($row3['Correct_choice'] == 5)
	  {
	  $quesstore[$i]['correct_choice'] = "E";
	  }
	  $quesstore[$i]['imagefile'] = $row3['imagefile'];
	  $quesstore[$i]['passage'] =nl2br($row3['passage']);
	  $quesstore[$i]['topic'] = nl2br($row3['topic']);
	  }
	$i++ ;	
	
	 }
 } 
 ?>
 <script>
var quesstore = <?php echo json_encode($quesstore, JSON_PRETTY_PRINT) ?>
 </script>
 <script>
var user_id = <?php echo $user_id ; ?> ;
 var len = <?php echo $i ; ?> ;

 </script>
 <div class="wrapper">
   <?php
	  include("headertop.php");
	  ?>
	  <script>
document.getElementById("markbook").className = "active treeview";
</script>
  <div class="content-wrapper" >
   <section class="content" id="contents">
 <div class="container-fluid">
 <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
 <div class="row">
 <br /><br />
 <div class="col-xs-12"  >
 <div class="col-xs-2">
 <p style="font-size:20px;text-align:center;font-weight:400px">Select Section :</p>
 </div>
 <div class="col-xs-3">
 <div class="form-group">
 <select style="align:center"  class="form-control" name="selectsec" id="Selectsec" onchange="selques(this.value)" required="required">
 <?php
 $sql = "SELECT * FROM qp_sections";
 $result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
	$id = $row['section_id'] ;
	$name = $row['section_name'] ;
	?>
    <option value="<?php echo $id ?>"><?php echo $name ; ?></option>
    <?php
}
 ?>
 
 </select>
 <br /><br />
 </div>
 </div>
 <div class="col-xs-1">
 </div>
 <div class="col-xs-1">
 <input type="submit" name="delbookmark" value="Delete" class="btn btn-primary" id="delbookmark" disabled="disabled" />
 </div>
 <div class="col-xs-1">
 <button type="button" class="btn btn-primary"onClick="window.location='home.php'">Back</button>
 </div>
 </div>
 
 <div class="col-xs-1">
 </div>
 <div class="col-xs-8" style="text-align:justify" id="appendques" style="margin-top:50px">
 </div>
 </div>
 <div class="row">
 <br /><br />
 </div>
 </form>
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
?>
</body>
</html>