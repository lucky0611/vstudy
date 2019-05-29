<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
 <h1 class = 'header' style ="color:#1E90FF;font-family: Arial;
font-size:35px;margin: 0px">
<img class = "logo" src ="logo1.jpg" style="padding: 0px;float: left;" alt="logo" /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TESTATHON </h1><br />
<p>
<img src="line7.jpg">
</p>
<br />
<div id ="existinguser" style ="padding: 0px 0px 0px 0px ;text-align:left;width:520px ;float: right" >
<p class ="user" style ="color:#0ABDFA ; font-weight:bold;font-size:22px;padding =0px 0px 0px 60px ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EXISTING USERS </p>
<br />
<?php
$username = $_POST['username'];
$password = $_POST['password'];
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<p class = "text">
USERNAME &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="username"value="<?php echo $username;?>" maxlength="40" STYLE="  background-color: #F5F5F5"  /> <br /><br />
PASSWORD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
<input type ="password" name = "password"value="<?php echo $password;?>" STYLE="  background-color: #F5F5F5" /><?php echo'<span style="color: red">&nbsp;&nbsp;&nbsp;&nbsp;You forgot password</span>';?> 
<p><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="    LOGIN    " name="submit" STYLE="border-radius:8px;moz-border-radius:8px;webkit-border-radius:8px; font-weight: bold; color: white; height: 2.5em; background-color: #00BFFF"><br />
</p>
</form>
</div>
<div id ="signup" STYLE = "padding:0px 0px 0px 140px; width: 750px;background: url(vertical4.jpg) right no-repeat " >
<p class ="user" style="color:#0ABDFA;padding:0px 0px 0px 125px;font-weight:bold;font-size:22px"> NEW USERS </p>
<form action="test.php"  method="POST">
<p class="text">
NAME &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="name" STYLE="  background-color: #F5F5F5" /> <br /><br />
CLASS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="class"; style="  background-color: #F5F5F5">
  <option value="Select class">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
  <option value="class6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class 6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
  <option value="Class7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class 7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
  <option value="Class8">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class 8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
  <option value="Class9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class 9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
  <option value="Class10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
  <option value="Clas11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class 11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
  <option value="Class12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class 12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
</select>
<br /><br />
SCHOOL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="school" STYLE="  background-color: #F5F5F5" /> <br /><br />
PHONE NO &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="phone" STYLE="  background-color: #F5F5F5" /> <br /><br />
E-MAIL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="e-mail" maxlength="40" STYLE="  background-color: #F5F5F5"  /> <br /><br />
PASSWORD &nbsp;&nbsp;&nbsp;<input type = "password" name = "password" STYLE="  background-color: #F5F5F5 " /> <br /><br />
CONFIRM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type ="password" name ="confirm" STYLE="  background-color: #F5F5F5;font-family: sans-serif; " /> <br /><br />
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="   SIGN UP   " name="submit" STYLE="border-radius:8px;moz-border-radius:8px;webkit-border-radius:8px; font-weight: bold; padding: 0px ; color: white; height: 2.5em; background-color: #00BFFF"><br />
</p>
</form>
</div>
<BR />
<p class = "footer" style ="clear:right">
<img src ="footer18.jpg">
</p>
</body>
</html>