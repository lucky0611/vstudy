<!--jquery links -->
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.css">
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.theme.css">
<script src="../jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="../jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<style>
#signup
{
 -webkit-box-shadow: 2px 0 5px 4px #969696;
  -moz-box-shadow: 2px 0 5px 4px #969696;
  box-shadow: 2px 0 5px 4px #969696;	
}
</style>
<div class="container-fluid">
<div class="row">
<div class="col-xs-12">
<div class="col-xs-5" >
<form id ="signup" role="form" action= "signup.php"  method="POST" onsubmit=" return finalsubmit()" style="background-image: url('newuser.jpg');background-repeat: no-repeat;background-size: 100% auto " > 
<br /><br /><br /><br />

<div class="col-xs-6" >
<div class="row">
<span id="name1" style="color:red;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type="text" class="form-control" id="name" name="firstname" placeholder="First Name"  onblur="showname()"   />
</div>
</div>
<div class="col-xs-2" >
<span style="color:red">*&nbsp;&nbsp;<img width="20px" height="20px" id="namepic" src="tick.gif" style="visibility:hidden"/></span>
</div>
</div>
</div>
<div class="col-xs-6" >
<div class="row">
<span id="lastname1" style="color:red"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last Name"  />
</div>
</div>
<div class="col-xs-2" >
&nbsp;&nbsp;<img width="20px" height="20px" id="lastnamepic1" src="tick.gif" style="visibility:hidden"/>
</div>
</div>
</div>
<div class="col-xs-6" >
<div class="row">
<span id="username1" style="color:red;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type="text" id="username" class="form-control" placeholder="Username" name="username"  onblur="showusername()" onfocus ="userhint()"  />
</div>
</div>
<div class="col-xs-2">
&nbsp;<img src= "border.png" id ="username3" style="position:absolute;top:33%;left:38%;width:20px;visibility:hidden"></span><span id="username2" style="position:absolute;top:31%;left:41%;width:46%;background-color:#fbd6e4"></span><span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="usernamepic" src="tick.gif" style="visibility:hidden"/>
</div>
</div>
</div>
<div class="col-xs-6" >
<div class="col-xs-row">
<span id="email1" style="color:red;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type="text" id="email"name="email" class="form-control" placeholder="E-mail"  onblur="showemail()"  />
</div>
</div>
<div class="col-xs-2">
&nbsp;<span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="emailpic" src="tick.gif" style="visibility:hidden"/>
</div>
</div>
</div>
<div class="col-xs-6" >
<div class="col-xs-row">
<span id="class1" style="color:red;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
 <select name="class" class="form-control session" id="class"  onchange ="showclassname()"  />
  <option value="Select Class"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Course&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
  <?php
$sql = "SELECT * FROM class_details ";
$result =  mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
?>
  <option value="<?php echo $row['class_name'] ?>"><?php echo $row['class'] ?></option>

<?php
}

?>
</select>
</div>
</div>
<div class="col-xs-2">
&nbsp;<span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="classpic" src="tick.gif" style="visibility:hidden"/></span>
</div>
</div>
</div>
<div class="col-xs-6" >
<div class="col-xs-row">
<span id="phone1" style="color:red;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type="text" name="phone" class="form-control" placeholder="Mobile No." id="phone"  onblur="showphone()"  />
</div>
</div>
<div class="col-xs-2">
&nbsp;<span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="phonepic" src="tick.gif" style="visibility:hidden"/>
</div>
</div>
</div>
<div class="col-xs-6" >
<div class="col-xs-row">
<span id="section1" style="color:red;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<select name="section" id="section"  onchange ="showsectionname()" class="session form-control"  />
<option value="Select Section">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; User Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </option>
 <?php
$sql1 = "SELECT * FROM section_details ";
$result1 =  mysqli_query($con,$sql1);
while($row1 = mysqli_fetch_array($result1))
{
?>
  <option value="<?php echo $row1['section_name'] ?>"><?php echo $row1['section_name'] ?></option>

<?php
}

?>
  </select>
  </div>
  </div>
  <div class="col-xs-2">
  &nbsp;<span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="sectionpic" src="tick.gif" style="visibility:hidden"/><span id="section1" style="color:red"></span>
  </div>
  </div>
  </div>
  <div class="col-xs-6" >
<div class="col-xs-row">
<span id="password1" style="color:red;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
  <input type ="password" class="form-control" name ="password" id="password" placeholder="Password"  onblur="showpassword()" onfocus="passwordhint()"   />
  </div>
  </div>
  <div class="col-xs-2" >
  &nbsp;<img src= "border1.png" id ="password3" style="position:absolute;top:58%;right:45%;width:20px;visibility:hidden"></span><span id="password2" style="position:absolute;top:56%;right:48%;width:46%;background-color:#fbd6e4"></span><span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="passwordpic" src="tick.gif" style="visibility:hidden"/><span id="password1" style="color:red" ></span>
  </div>
  </div>
  </div>
 <div class="col-xs-6" >
<div class="col-xs-row">
<span id="school1" style="color:red;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
 <select id="school" name="school" onchange ="showschoolname()" class="session form-control"  />
 <option value="Select School"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Institute&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
<?php
while($ro = mysqli_fetch_array($res))
{
	if($ro['approval'] == 1)
	{
?>
  <option value="<?php echo $ro['school_name'] ?>" style="text-align:center"><?php echo $ro['school'] ?></option>
  
  <?php
}
}
  ?>
</select>
</div>
</div>
<div class="col-xs-2">
&nbsp;<span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="schoolpic" src="tick.gif" style="visibility:hidden"/>
</div>
</div>
</div>
<div class="col-xs-6" >
<div class="col-xs-row">
<span id="confirm1" style="color:red;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type ="password" name ="confirm" class="form-control" id="confirm" placeholder="Confirm Password"  onblur="showconfirm()"  />
</div>
</div>
<div class="col-xs-2">
&nbsp;<span style="color:red">*</span><img width="20px" height="20px" id="confirmpic" src="tick.gif" style="visibility:hidden"/>
</div>
</div>
</div>
<div class="row">
<br /><br />
</div>
<div class="col-xs-4">
</div>
<div class="col-xs-6" id="radio">
<input type="radio" id="male" name="gender" value="m" style="height:0.5em" required="required"/><label for="male">Male</label> &nbsp;&nbsp;<input type="radio" id="female" name="gender" value="f" style="height:0.5em" required="required"/><label for="female">Female</label>
</div>
<div class="col-xs-2">
</div>
<div class="row">
<br /><br /><br />
<div class="col-xs-4">
</div>
<div class="col-xs-4">
<input type="submit" class="btn btn-danger" value="SIGN UP " name="signup"  />
</div>
</div>
<br />
<span style="position:relative;left:75%;color:red">
* Mandatory fields</span>
</form>
</div>
</div>
</div>
</div>