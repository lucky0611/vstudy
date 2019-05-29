<?php


function phpAlert($msg) {
    echo '<script type="text/javascript">alert("'. $msg .'");</script>';
};

include('connect.php');

$sql = "SELECT * FROM passagelist";

$result = mysqli_query($con,$sql);

$store = array();

while ($row=mysqli_fetch_array($result)){
	array_push($store,$row);
	}
	
	



?>

<!DOCTYPE html>
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


  <script>

  function validate(){
	  var checkbox= document.querySelector('input[name="delquiz[]"]:checked');
  if(!checkbox) {
    alert('Please select!');
    return false;
  }
  else return confirm('confirm submit?');
	  
  }
  </script>


	
	</head>
<body>

<div class="container">
<div class="col-md-12">
<form method="post" action="delete.php" onsubmit="return validate()">
<?php 
for ($i = 0; $i < count($store);$i++){
	?>
	<div class="col-md-2">
	<input id ="check<?php echo $store[$i]['pass_id'];?>" type="checkbox" name="delquiz[]" value="<?php echo $store[$i]['pass_id'];?>">Quiz #<?php echo $store[$i]['pass_id'];?>
	</div>
	
	<?php
	
}


?>
<div class="col-md-12" align="center">

<br />
<br />
<button class="btn btn-danger" name="deletequizbut" type="submit">Delete</button>
</form>
</div>
</div>
</div>



</body>
</html>