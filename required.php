<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$username = mysqli_real_escape_string($dbc,trim($_POST['username']));
$password = mysqli_real_escape_string($dbc,trim($_POST['password']));
$name = $_POST['name'];
$class = $_POST['class'];
$school = $_POST['school'];
$email = $_POST['e-mail'];
?>
</body>
</html>