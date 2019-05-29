window.onload = function()
{ 
  //document.getElementById("button1").style.backgroundColor = "#03376a" ;
	flag = "yes"
	flag1 = true ;
	flag2 = true ;
	flag3 = true ;
	flag4 = true ;
	flag5 = true ;
	flag6 = true ;
	flag7 = true ;
	flag8 = true;
	flag9 = true ;
	matching = true;
 document.getElementById("namepic").style.visibility = "visible";
 document.getElementById("usernamepic").style.visibility = "visible";
 document.getElementById("emailpic").style.visibility = "visible";
 document.getElementById("phonepic").style.visibility = "visible";
  document.getElementById("passwordpic").style.visibility = "visible";
   document.getElementById("confirmpic").style.visibility = "visible";
  // document.getElementById("classpic").style.visibility = "visible";
  // document.getElementById("sectionpic").style.visibility = "visible";
  // document.getElementById("schoolpic").style.visibility = "visible";
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
		document.getElementById("namepic").style.visibility = "hidden" ;
		flag2 = false ;
	}
	 
	 else
	 {
		 document.getElementById("name1").innerHTML = "";
		 document.getElementById("namepic").style.visibility = "visible";
		 
		 flag2 = true ;
	 }
}
function userhint()
{
document.getElementById("username2").style.visibility = "visible";
document.getElementById("username3").style.visibility = "visible";
	document.getElementById("username2").innerHTML = "<ul>" + "<li>"+ "Username should range from 8-20 letters" +"</li>" + "<li>"+ "Username should be from combination of alphabet(a-z OR A-Z),numbers(0-9) & underscore( _ )" +"</li>"+ "<li>" +"First Character must be an alphabet. "+ "</li>" +"</ul>"		
}
 function showusername()
{ 

  document.getElementById("username2").style.visibility = "hidden";
  document.getElementById("username3").style.visibility = "hidden";
    var b = document.getElementById("username").value
	var a = document.getElementById("username").value.length ;
	var userw=  /^[A-Za-z]\w{7,19}$/;
	if(a>0)
	{
	if(b.match(userw))
	{
		 checkusername(b);
		
	}
	else
	{
document.getElementById("username1").innerHTML = "Invalid Username format" ;
document.getElementById("usernamepic").style.visibility = "hidden";
flag1 = false ;	
	}
	 } 
else 
{
document.getElementById("username1").innerHTML = "Please Enter Username" ;
document.getElementById("usernamepic").style.visibility = "hidden";
flag1 = false ;
}
}
 function checkusername(b)
{

request2 = createRequest();
if (request2== null) {
alert("Unable to create request");
return;
}
else
{	
document.getElementById("username").className = "background" ;
var url= "usernameajax1.php";
var requestData1 = "values1=" +
escape(b);

request2.open("POST",url,true);
request2.onreadystatechange = function displayDetails1() {
if (request2.readyState == 4) {
if (request2.status == 200) {
	try
		{
var parts = JSON.parse(request2.responseText);
document.getElementById("username1").innerHTML = parts[0] ;
 document.getElementById("usernamepic").style.visibility = "hidden";
 document.getElementById("username").className = "" ;
 flag1 = false ;
		}
		catch(e)
		{
	document.getElementById("username1").innerHTML = "" ;
 document.getElementById("usernamepic").style.visibility = "visible";
 document.getElementById("username").className = "" ;
flag1 = true ;
  }
}
}
}
request2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request2.send(requestData1);
}
} 
function showclassname()
{ 
    var c = document.getElementById("class");
	var a = document.getElementById("class").value ;
	if(a == "Select Class")
	{ 
	   
		document.getElementById("class1").innerHTML = "Please Select your class";
		document.getElementById("classpic").style.visibility = "hidden";
		flag3 = false ;
	}
	 
	 else 
	 {
		 document.getElementById("class1").innerHTML = "";
		 document.getElementById("classpic").style.visibility = "visible";
		 flag3 = true ;
		 
	 }
}
function showsectionname()
{ 
    var c = document.getElementById("section");
	var a = document.getElementById("section").value ;
	if(a == "Select Section")
	{ 
	   document.getElementById("section1").innerHTML = "Please Select your section";
	   document.getElementById("sectionpic").style.visibility = "hidden";
		flag4 = false ;	
	}
	 
	 else 
	 {
		 document.getElementById("section1").innerHTML = "";
		 document.getElementById("sectionpic").style.visibility = "visible";
		  flag4 = true ;
	 }
}
function showschoolname()
{  
    var c = document.getElementById("school");
	var a = document.getElementById("school").value ;
	if(a == "Select School")
	{ 
	   
		document.getElementById("school1").innerHTML = "Please Select your school";
		document.getElementById("schoolpic").style.visibility = "hidden";
		flag5 = false ;
	}
	 
	 else 
	 {
		 document.getElementById("school1").innerHTML = "";
		 document.getElementById("schoolpic").style.visibility = "visible";
		  flag5 = true ;
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
		document.getElementById("phonepic").style.visibility = "hidden"
		flag6 = false ;
	}
	 if(isNaN(document.getElementById("phone").value))
	 {
		document.getElementById("phone1").innerHTML = "Mobile no. should be integer" 
		document.getElementById("phonepic").style.visibility = "hidden"
		flag6 = false ;
	 }
	  else if(a == 10 && !isNaN(document.getElementById("phone").value))
	 {
		 document.getElementById("phone1").innerHTML = ""
		 document.getElementById("phonepic").style.visibility = "visible"
		 flag6 = true ;
		 
	 }
	}
     if(a == 0)
	{
		
		document.getElementById("phonepic").style.visibility = "hidden";
        document.getElementById("phone1").innerHTML = "Enter Mobile Number";
		flag6 = false ;	
		}
	 
	
}
function showpassword()
{ 
     var a = document.getElementById("password").value.length ;
     //var b = document.getElementById("confirm").value;
	 var c = document.getElementById("password").value ;
document.getElementById("password2").style.visibility = "hidden";
document.getElementById("password3").style.visibility = "hidden"; 
if (matching)
	 {
		 if(document.getElementById("password").value != document.getElementById("confirm").value)
		 {
			 alert("1")
			document.getElementById("confirm1").innerHTML = "Passwords don't match"; 
			document.getElementById("confirmpic").style.visibility = "hidden";
			flag8 = false;
		 }
		 else
		 {
			document.getElementById("confirm1").innerHTML = ""; 
			document.getElementById("confirmpic").style.visibility = "visible";
			flag8 = true;
		 }
	 }
	var passw=  /^[A-Za-z]\w{7,14}$/; 
	if(a>0)
	{ 
if(c.match(passw))   
{   
document.getElementById("password1").innerHTML = ""
document.getElementById("passwordpic").style.visibility = "visible";
flag = "yes";
flag7 = true;
}
else
{
document.getElementById("password1").innerHTML = "Invalid Password format"
document.getElementById("passwordpic").style.visibility = "hidden";
document.getElementById("confirmpic").style.visibility = "hidden";
flag = "no";
flag7 = false;
}
	}
	if(a == 0)
	{
document.getElementById("password1").innerHTML = "Please Enter Password"
document.getElementById("passwordpic").style.visibility = "hidden"
flag = "no";
flag7 = false;	
	}
}
function passwordhint()
{
document.getElementById("password2").style.visibility = "visible";
document.getElementById("password3").style.visibility = "visible";
	document.getElementById("password2").innerHTML = "<ul>" + "<li>"+ "Password should range from 8-15 letters" +"</li>" + "<li>"+ "Password should be from combination of alphabet(a-z OR A-Z),numbers(0-9) & underscore( _ )" +"</li>"+ "<li>" +"First Character must be an alphabet. "+ "</li>" +"</ul>"	
}
function showconfirm()
{ 
	var b = document.getElementById("confirm").value;
	var c = document.getElementById("password").value;
	if(flag == "yes")
	{
		if(b != c)
	{ 
	   alert("2")
		document.getElementById("confirm1").innerHTML = "Passwords don't match"
		document.getElementById("confirmpic").style.visibility = "hidden"
		flag8 = false ;
	}
	else if(b == c)
	 {
		 
		 document.getElementById("confirm1").innerHTML = "" ;
		 document.getElementById("confirmpic").style.visibility = "visible" ;
		 flag8 = true ;
		 matching = true;
	 }
	
	}
	 else
	 {
		 document.getElementById("confirm").value = "" ;
		 document.getElementById("confirm1").innerHTML = "Enter password correctly first";
		 flag8 = false ;
	 }
	 
}
function showemail()
{
	var b = document.getElementById("email").value;
	var a = document.getElementById("email").value.length ;
	if(a == 0)
	{
		document.getElementById("email1").innerHTML = "Please enter the email"
		document.getElementById("emailpic").style.visibility = "hidden"
		flag9 = false ;
	}
	if(a!=0)
	{
		var pattern = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		if(pattern.test(b))
		{
			document.getElementById("emailpic").style.visibility = "visible"
			document.getElementById("email1").innerHTML = ""
			flag9 = true ;
		}
		else
		{
			document.getElementById("email1").innerHTML = "Enter Email Correctly"
			document.getElementById("emailpic").style.visibility = "hidden"
			
			flag9 = false ; 
		}
	}
}

function finalsubmit(form)
{
	if(flag1 && flag2 && flag3 && flag4 && flag5 && flag6 && flag7 && flag8 && flag9)
	{ 
	    return true ;
	}
	else
	{
		alert("Enter all the fields correctly before Submitting the form")
		return false ;
	}
}// JavaScript Document