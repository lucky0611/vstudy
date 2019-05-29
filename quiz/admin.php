<!DOCTYPE html>

<?php
include('connect.php');
?>

<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Quiz Input</title>
		<meta name="description" content="Examples for creative website header animations using Canvas and JavaScript" />
		<meta name="keywords" content="header, canvas, animated, creative, inspiration, javascript" />
		<meta name="author" content="Codrops" />
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.12.1.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Raleway:200,400,800' rel='stylesheet' type='text/css'>

		

<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/adapters/jquery.js"></script>		
	</head>
<body>
<div class="container">

<div class="col-md-12" align="center" style="margin-top:100px">
<div class="col-md-4" >
<a class="btn btn-danger" href="deletequiz.php">Delete Quizes</a>
</div>

<form method="post">
 <div class="col-md-4"> 
    <textarea class="form-control editor" type="text" rows= "5" id="sample5" name="passage" placeholder="Passage" required></textarea><br />
    <input id="num" class="form-control" type="number" placeholder="No. of Questions" name="quesno" required /><br />
	</div>
	<div class="col-md-4">
	
	</div>
	<div id="pan" class="col-md-12 sect" align="center">
	
	</div>
  

<div class="col-md-12">
	<button class="btn btn-primary" style="margin-top:25px" type="submit" name="sub" >Submit</button>
	</div>
	</form>
</div>

<script>
$( '.editor' ).ckeditor();
$("#num").blur(function(){
$("#pan").empty();

for(a=0;a< $("#num").val();a++){
	
$("#pan")
.append($("<div>").attr("class","col-md-6")
.append($("<textarea>").attr("class","form-control editor1").attr("type","text").attr("rows","3").attr("name","Q"+a).attr("placeholder","Question"))
.append($("<br />"))
.append($("<textarea>").attr("class","form-control editor1").attr("type","text").attr("placeholder","Option 1").attr("name","O1"+a))
.append($("<br />"))
.append($("<textarea>").attr("class","form-control editor1").attr("type","text").attr("placeholder","Option 2").attr("name","O2"+a))
.append($("<br />"))
.append($("<textarea>").attr("class","form-control editor1").attr("type","text").attr("placeholder","Option 3").attr("name","O3"+a))
.append($("<br />"))
.append($("<textarea>").attr("class","form-control editor1").attr("type","text").attr("placeholder","Option 4").attr("name","O4"+a))
.append($("<br />"))
.append($("<p>").text("Choose Right Option :"))
.append($("<lable>").text("Option 1   "))
.append($("<input>").attr("type","radio").attr("value","A").attr("name","ans"+a))
.append($("<lable>").text("Option 2   "))
.append($("<input>").attr("type","radio").attr("value","B").attr("name","ans"+a))
.append($("<lable>").text("Option 3   "))
.append($("<input>").attr("type","radio").attr("value","C").attr("name","ans"+a))
.append($("<lable>").text("Option 4   "))
.append($("<input>").attr("type","radio").attr("value","D").attr("name","ans"+a))
.append($("<br />"))
.append($("<textarea>").attr("class","form-control editor1").attr("type","text").attr("rows","3").attr("placeholder","Explanation").attr("name","E"+a))
.append($("<hr>"))
);
$( '.editor1' ).ckeditor();
}
})

</script>

<?php 

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if(isset($_POST["sub"]) and $_POST['passage'] != '' and $_POST["quesno"] != ''){
$passage = $_POST["passage"];

$quesno = $_POST["quesno"];
if($quesno > 0){
$sql = "INSERT INTO passagelist(passage,quesno,date) VALUES('$passage','$quesno',curdate())";
$result = mysqli_query($con,$sql);
$sql1 = "SELECT pass_id FROM passagelist WHERE passage = '$passage'";
$result1 = mysqli_query($con,$sql1);
	 
	 $row=mysqli_fetch_array($result1);
	 $pid = $row[0];
	 phpAlert($row[0]);

for($i=0; $i < $quesno; $i++){
$Q = $_POST["Q".$i];
$O1 = $_POST["O1".$i];
$O2 = $_POST["O2".$i];
$O3 = $_POST["O3".$i];
$O4 = $_POST["O4".$i];
$ans = $_POST["ans".$i];
$E = $_POST["E".$i];
if(isset($_POST["sub"]) and $_POST['passage'] != '' and $_POST['quesno'] != '' and $_POST['Q'.$i] != '' and $_POST['O1'.$i] != '' and $_POST['O2'.$i] != '' and $_POST['O3'.$i] != '' and $_POST['O4'.$i] != '' and $_POST['ans'.$i] != ''){
$sql = "INSERT INTO questiondata(pass_id,question,one,two,three,four,ans,exp) VALUES('$pid','$Q','$O1','$O2','$O3','$O4','$ans','$E')";
$result = mysqli_query($con,$sql);

}
}
$ms = "New Subject Added!";
echo "<div align='center'><p style='color:red'>".$ms."</p></div>";
}
else{
	echo "<div align='center'><p style='color:red'>Invalid Input</p></div>";
}
};
?>







</div>
</body>
</html>	