<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>

</script>
</head>

<body>
<form action="video.php" method="post">
<input type="datetime-local" name ="dates" />
<input type="submit" value="submt">
</form>
<?php
	//echo "hi";
if(isset($_POST['dates']))
{
 $date = $_POST['dates'] ;
	echo $_POST['dates'] ;
	include("connect.php");
	$sql = "INSERT INTO dummy(date) VALUES('$date')";
	mysqli_query($con,$sql);
}
?>
</video>
</body>
</html>