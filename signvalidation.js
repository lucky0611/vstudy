// JavaScript Document
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
		document.getElementById("loginerror").style.display = "block";
document.getElementById("loginerror").innerHTML ="Please Enter your Login credentials !" ;
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
document.getElementById("loadimg").style.display = "block "
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
document.getElementById("loadimg").style.display = " none"
}	
}
}
request1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request1.send(requestData);
}
}
/*$(document).ready(function(){
	alert("hi");
$(".login").click(function(){
    $("#login").animate({
        left: '8%'
        
       },800);
	  $("#signup").animate({
        left: '-50%'
       },800); 
}); 
$(".signup").click(function(){
    $("#signup").animate({
        left: '7%'
        
       },800);
	  $("#login").animate({
        left: '-50%'
});        },800); 

});*/
 

/*function signup()
{
	
	$("#signup").animate({
        left: '7%'
        
       },300);
	  $("#login").animate({
        left: '-200%'
       },300); 
	   //document.getElementById("button2").style.backgroundColor = "#8b0539";
	   //document.getElementById("button1").style.backgroundColor = "#1472cc"
}
function login()
{
	
	$("#login").animate({
        left: '8%'
        
       },300);
	  $("#signup").animate({
        left: '-200%'
       },300); 
	  // document.getElementById("button2").style.backgroundColor = "#dd5489";
	  // document.getElementById("button1").style.backgroundColor = "#03376a"  
}*/
window.onload = function()
{ 
  //document.getElementById("button1").style.backgroundColor = "#03376a" ;
	flag = "no"
	flag1 = true ;
	flag2 = true; ;
	flag3 = true ;
	flag4 = true ;
	flag5 = true ;
	flag6 = false ;
	flag7 = false ;
	flag8 = false ;
	flag9 = false ;
	flag10 = true ;
	flag11 = true ;
	matching = false;
}
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
	
  function showname()
{ 

	var a = document.getElementById("name").value.length ;
	if(a == 0)
	{ 
	   
		document.getElementById("name1").innerHTML = "Please Enter Name";
		document.getElementById("name1").className = "mdl-textfield__errors" ;
		
		flag2 = false ;
	}
	 
	 else
	 {
		 document.getElementById("name1").innerHTML = "Name accepted";
		 document.getElementById("name1").className = "mdl-textfield__noerrors" ;
		 
		 flag2 = true ;
	 }
}


 function checkemail(b)
{
request2 = createRequest();
if (request2== null) {
alert("Unable to create request");
return;
}
else
{	
document.getElementById("email").className = "background mdl-textfield__input  " ;
var url= "usernameajax.php";
var requestData1 = "values1=" +
escape(b);
request2.open("POST",url,true);
request2.onreadystatechange = function displayDetails1() {
if (request2.readyState == 4) {
if (request2.status == 200) {
	try
		{
		
var parts = JSON.parse(request2.responseText);
document.getElementById("email1").innerHTML = parts[0] ;
document.getElementById("email1").className = "mdl-textfield__errors" ;
 document.getElementById("email").className = "mdl-textfield__input" ;
 flag9 = false ;
		}
		catch(e)
		{	
	document.getElementById("email1").innerHTML = "Email Available" ;
 document.getElementById("email1").className = "mdl-textfield__noerrors" ;
 document.getElementById("email").className = "mdl-textfield__input" ;
flag9 = true ;
  }
}
}
}
request2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request2.send(requestData1);
}
} 

function showphone()
{ 
	var a = document.getElementById("phone").value.length ;
	if(a > 0)
	{
	if(a != 10 && !isNaN(document.getElementById("phone").value))
	{ 
	   
		document.getElementById("phone1").innerHTML = "Enter Mobile no. of 10 digits"
		document.getElementById("phone1").className = "mdl-textfield__errors" ;
		flag6 = false ;
	}
	 if(isNaN(document.getElementById("phone").value))
	 {
		document.getElementById("phone1").innerHTML = "Mobile no. should be integer" 
		document.getElementById("phone1").className = "mdl-textfield__errors" ;
		flag6 = false ;
	 }
	  else if(a == 10 && !isNaN(document.getElementById("phone").value))
	 {
		 document.getElementById("phone1").innerHTML = "Phone No. Accepted"
		 document.getElementById("phone1").className = "mdl-textfield__noerrors" ;
		 flag6 = true ;
		 
	 }
	}
     if(a == 0)
	{
		
		document.getElementById("phone1").className = "mdl-textfield__errors" ;
        document.getElementById("phone1").innerHTML = "Enter Mobile Number";
		flag6 = false ;	
		}
	 
	
}
function showpassword()
{ 
     var a = document.getElementById("password").value.length ;
     //var b = document.getElementById("confirm").value;
	 var c = document.getElementById("password").value ;
//document.getElementById("password2").style.visibility = "hidden";
if (matching)
	 {
		 if(document.getElementById("password").value != document.getElementById("confirm").value)
		 {
			document.getElementById("confirm1").innerHTML = "Passwords don't match"; 
			document.getElementById("confirm1").className = "mdl-textfield__errors" ;
			flag8 = false;
		 }
		 else
		 {
			document.getElementById("confirm1").innerHTML = "Password Match"; 
			document.getElementById("confirm1").className = "mdl-textfield__noerrors" ;
			flag8 = true;
		 }
	 }
	var passw=  /^[A-Za-z]\w{7,14}$/; 
	if(a>0)
	{ 

document.getElementById("password1").innerHTML = "Password Accepted"
document.getElementById("password1").className = "mdl-textfield__noerrors" ;
flag = "yes";
flag7 = true;

	}
	if(a == 0)
	{
document.getElementById("password1").innerHTML = "Please Enter Password"
document.getElementById("password1").className = "mdl-textfield__errors" ;
flag = "no";
flag7 = false;	
	}
}

function showconfirm()
{ 
	var b = document.getElementById("confirm").value;
	var c = document.getElementById("password").value;
	if(flag == "yes")
	{
		if(b != c)
	{ 
	   
		document.getElementById("confirm1").innerHTML = "Passwords don't match"
		document.getElementById("confirm1").className = "mdl-textfield__errors" ;
		flag8 = false ;
	}
	else if(b == c)
	 {
		 
		 document.getElementById("confirm1").innerHTML = "Password Match" ;
		document.getElementById("confirm1").className = "mdl-textfield__noerrors" ;
		 flag8 = true ;
		 matching = true;
	 }
	
	}
	 else
	 {
		 document.getElementById("confirm").value = "" ;
		 document.getElementById("confirm1").innerHTML = "Enter password correctly first";
		 document.getElementById("confirm1").className = "mdl-textfield__errors" ;
		 flag8 = false ;
	 }
	 
}
function showemail()
{
	var b = document.getElementById("email").value;
	var a = document.getElementById("email").value.length ;
	if(a == 0)
	{
		document.getElementById("email1").innerHTML = "Please enter email";
		document.getElementById("email1").className = "mdl-textfield__errors" ;
		flag9 = false ;
	}
	if(a!=0)
	{
		
		var pattern = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		if(pattern.test(b))
		{
			document.getElementById("email1").className = "mdl-textfield__noerrors" ;
			document.getElementById("email1").innerHTML = "E-mail Accepted"
			//flag9 = true ;
			checkemail(b)
		}
		else
		{
			document.getElementById("email1").innerHTML = "Enter Email Correctly"
			document.getElementById("email1").className = "mdl-textfield__errors" ;
			
			flag9 = false ; 
		}
	}
}

function finalsubmit()
{
	if($('.gender:checked').length == 1){
  genders1 = document.getElementsByName('gender');
  for(var i=0;i<genders1.length;i++)
  {
      if(genders1[i].checked)
	  {
		genders = genders1[i].value  
	  }
  }

	if(flag1 && flag2 && flag3 && flag4 && flag5 && flag6 && flag7 && flag8 && flag9 && flag10 && flag11)
	{ 
	  fname = document.getElementById("name").value ;
	  lname = document.getElementById("lastname").value ;
	  //uname = document.getElementById("username").value ;
	  emails = document.getElementById("email").value ;
	  passwords = document.getElementById("password").value ;
	  confirms = document.getElementById("confirm").value ;
	  phones = document.getElementById("phone").value ;
	  
	 signups() ;
	
	}
	else
	{
		//alert("flag1="+ flag1+ "flag2="+ flag2+ "flag3="+ flag3+ "flag4="+ flag4+ "flag5="+ flag5+ "flag6="+ flag6+ "flag7="+ flag7+ "flag8="+ flag8+ "flag9="+ flag9+ "flag10="+ flag10+ "flag11="+ flag11)
		document.getElementById("loginerror1").style.display = "none";
		document.getElementById("loginerror2").style.display = "block";
		document.getElementById("loginerror2").className ="mdl-cell mdl-cell--12-col alert alert-warning"
		document.getElementById("loginerror2").align ="center"
		document.getElementById("loginerror2").innerHTML = "<p style='color:#d50000'>" +"<strong>"+"Warning!" + "</strong>"+ "&nbsp;"+ "&nbsp;" +  "Enter all the fields correctly before Submitting the form" + "</p>";
		
		return false ;
	}
	}
	else
	{
		document.getElementById("loginerror1").style.display = "none";
		document.getElementById("loginerror2").style.display = "block";
		document.getElementById("loginerror2").className ="mdl-cell mdl-cell--12-col alert alert-warning"
		document.getElementById("loginerror2").align ="center"
		document.getElementById("loginerror2").innerHTML = "<p style='color:#d50000'>" + "<strong>"+"Warning!" + "</strong>"+ "&nbsp;"+ "&nbsp;" + "Please Select Gender" + "</p>";
	}
}
 function signups()
	 {
		 request3 = createRequest();
if (request3 == null)
 {
alert("Unable to create request");
return;
}
else
{	
var url= "signup.php";
var requestData2 = "firstname=" +
escape(fname) +"&password=" +
escape(passwords)+"&confirm=" +
escape(confirms)+"&email=" +
escape(emails)+"&lastname=" +
escape(lname)+"&phone=" +
escape(phones)+ "&gender=" +
escape(genders)  ;
request3.open("POST",url,true);
document.getElementById("loadimg1").style.display = "block "
request3.onreadystatechange = function displayDetails2() {
	
if (request3.readyState == 4) {
if (request3.status == 200) {
	
	var loginerrors = document.getElementById("loginerror1") ;
	var child = loginerrors.childNodes
	if(child.length > 0)
	{
	while(child.length > 0)
{
	
    loginerrors.removeChild(child[0]);
	
}
	}
	document.getElementById("loginerror1").style.display = "block";
	document.getElementById("loginerror2").style.display = "none";
$("#loginerror1").append(request3.responseText);
setTimeout(function(){ 
document.location = "home.php";
document.getElementById("loadimg1").style.display = "none";
}, 3000);

}	
}
}
request3.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request3.send(requestData2);
}
	 }