<script>
errors1 = false ;
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
function logins()
{
	user = document.getElementById("users").value
	pass = document.getElementById("passs").value
	if(user.length != 0 && pass.length != 0 )
	{
		login1(user,pass);
	}
	else
	{
		alert("Enter all the Details before submitting the form")
	}
}
function login1(x,y)
{
	request1 = createRequest();
if (request1== null)
 {
alert("Unable to create request");
return;
}
else
{	
var url= "submitform.php";
var requestData = "username=" +
escape(x) +"&password=" +
escape(y) ;
request1.open("POST",url,true);
document.getElementById("loadimg").className = "background col-xs-3 "
request1.onreadystatechange = function displayDetails1() {	
if (request1.readyState == 4) {
if (request1.status == 200) {
if(request1.responseText !== "noerror")
{
document.getElementById("loginerror").style.display = "block";
document.getElementById("loginerror").innerHTML =request1.responseText ;
}
else
{
document.location ="home.php" ;
}
document.getElementById("loadimg").className = " col-xs-3"
}	
}
}
request1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request1.send(requestData);
}
}
</script>
<div class="container-fluid">
<div class="row" style="height:70px;background-color:#222D32;background-image:url('vstudy.png');background-repeat:no-repeat;background-size:150px 62px" align="center">
<h2 style="color:white">Online Test Platform</h2>
</div>
</div>
 <div class="form">
      
      <ul class="tab-group">
	  <li class="tab active"><a href="#login1">Log In</a></li>
        <li class="tab "><a href="#signup">Sign Up</a></li>
        
      </ul>
      
      <div class="tab-content">

<div class="row" id="login1">
<form role="form"  method="POST" >

<div class="col-xs-12">
<div class="col-xs-12">
<div class="col-xs-12 alert alert-danger" align="center" id="loginerror" style="display:none">
</div>
</div>
<div class="col-xs-1">
</div>
<div class="col-xs-10">
<br />
<div class="form-group">
<input type="text" name="username" id="users" placeholder="E-mail" class="form-control" /><i style="position:relative;left:95%;top:-27px;color:grey" class="fa fa-user fa-x"></i> <br />
</div>
 <div class="form-group">
<input type ="password" id="passs" name = "password" placeholder="Password" class="form-control"  /><i style="position:relative;left:95%;top:-27px;color:grey" class="fa fa-key fa-x"></i> <br /> 
</div>
</div>
<div class="row">
<div class="col-xs-3">
</div>
<div class="col-xs-6">
<br />
<button type="button" class="button button-block"  name="login" onclick = "logins()" /> Login </button>

</div>
<div class="col-xs-3" id="loadimg" style="height:40px;margin-top:25px">
</div>
</div>
<div class="col-xs-12" align="center">
<br />

<p ><a href="forgotpass.php" style="color:white">Forgot Username or Password ?</a></p>
</div>
</div>
</form>
</div>
<div id="signup" class="row" >
<form id ="signup1" role="form"  method="POST"> 

<div class="col-xs-12" id="loginerror1" style="display:none">
</div>
<div class="col-xs-12" id="loginerror2" style="display:none">
</div>
<div class="col-xs-6" >
<div class="row">
<span id="name1" style="color:white;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type="text" class="form-control" id="name" name="firstname" placeholder="First Name"  onblur="showname()"   />

</div>
</div>

<i style="position:relative;left:-63px;top:10px;color:grey" class="fa fa-user fa-x"></i>

<div class="col-xs-1" >
<span style="color:white">*&nbsp;&nbsp;<img width="20px" height="20px" id="namepic" src="tick.gif?v=1.0.1" style="visibility:hidden;position:relative;top:-10px"/></span>
</div>
</div>
</div>
<div class="col-xs-6" >
<div class="row">
<span id="lastname1" style="color:white"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last Name"  />
</div>
</div>
<i style="position:relative;left:-63px;top:10px;color:grey" class="fa fa-user fa-x"></i>

<div class="col-xs-1" >
&nbsp;&nbsp;<img width="20px" height="20px" id="lastnamepic1" src="tick.gif?v=1.0.1" style="visibility:hidden;position:relative;top:-10px"/>
</div>
</div>
</div>

<div class="col-xs-6" style="margin-bottom:-20px" >
<div class="col-xs-row">
<span id="email1" style="color:white;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type="text" id="email"name="email" class="form-control" placeholder="E-mail"  onblur="showemail()"  /><span  style="color:white;position:relative;left:115%;top:-35px">*</span>
</div>
</div>
<i style="position:relative;left:-63px;top:10px;color:grey" class="fa fa-envelope-o fa-x"></i>
<div class="col-xs-1">
<img width="20px" height="20px" id="emailpic" src="tick.gif?v=1.0.1" style=";position:relative;top:15px;visibility:hidden"/>
</div>
</div>
</div>
  <div class="col-xs-6" >
<div class="col-xs-row">
<span id="phone1" style="color:white;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type="text" name="phone" class="form-control" placeholder="Mobile No." id="phone"  onblur="showphone()"  />
</div>
</div>
<i style="position:relative;left:-63px;top:10px;color:grey" class="fa fa-phone fa-x"></i>
<div class="col-xs-1">
&nbsp;<span style="color:white">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="phonepic" src="tick.gif?v=1.0.1" style="visibility:hidden;position:relative;top:-10px"/>
</div>
</div>
</div>
 
  <div class="col-xs-6" >
<div class="col-xs-row">
<span id="password1" style="color:white;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group" style="position:relative">

  <input type ="password" class="form-control" name ="password" id="password" placeholder="Password"  onblur="showpassword()"   />
  </div>
  </div>
  <i style="position:relative;left:-63px;top:10px;color:grey" class="fa fa-lock fa-x"></i>
  <div class="col-xs-1" >
  &nbsp;<span style="color:white">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="passwordpic" src="tick.gif?v=1.0.1" style="visibility:hidden;position:relative;top:-10px"/><span id="password1" style="color:white" ></span>
  </div>
  </div>
  </div>

<div class="col-xs-6" >
<div class="col-xs-row">
<span id="confirm1" style="color:white;"></span><br />
</div>
<div class="row" >
<div class="col-xs-10" >
<div class="form-group">
<input type ="password" name ="confirm" class="form-control" id="confirm" placeholder="Confirm Password"  onblur="showconfirm()"  />
</div>
</div>
  <i style="position:relative;left:-63px;top:10px;color:grey" class="fa fa-key fa-x"></i>
<div class="col-xs-1">
&nbsp;<span style="color:white">*</span><img width="20px" height="20px" id="confirmpic" src="tick.gif?v=1.0.1" style="visibility:hidden;position:relative;top:-10px"/>
</div>
</div>
</div>


<div class="row">
<br />
</div>
<div class="col-xs-12" align="center">
<input class="gender" type="radio" id="male" name="gender" value="m"  required="required"/><label style="color:white" for="male">&nbsp;&nbsp;Male</label> &nbsp;&nbsp;<input class="gender" type="radio" id="female" name="gender" value="f"  required="required"/><label style="color:white" for="female">&nbsp;&nbsp;Female</label>
</div>

<div class="row">
<br /><br />
<div class="col-xs-3">
</div>
<div class="col-xs-6">
<button id="signupbutt" type="button" class="button button-block" name="signup" onclick="finalsubmit()">SIGN UP</button>
</div>
<div class="col-xs-3" id="loadimg1" style="height:40px;margin-top:10px;">
</div>
</div>
<br />
</form>
</div>



</div>
</div>
 
