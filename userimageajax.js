// JavaScript Document
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
function choseimage(x)
{
	{
		
		 var ext = $("#chose").val().split('.').pop().toLowerCase();
         if(x.value.length != 0) {
         if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
	
              alert('invalid extension!');
} 
             else
		    {
				
				file = x.files[0];
				
			 sendimage();
			}
			 }
			 
}
}
 function sendimage()
 {
	 
request1  = createRequest();
if (request1==null) {
alert("Unable to create request");
return;
}
else
{
document.getElementById('frameid').style.opacity = "0.2";
document.getElementById('imagehold').className = "imageback" ;	
var url= "userajaximage.php";
formData = new FormData() ;
formData.append('files', file);
request1.open("POST",url,true);
request1.onreadystatechange =  function imageDetails()
 {
   
	if (request1.readyState == 4) {
if (request1.status == 200) 
{
	document.getElementById('readon').value = "" ;
		
			try
		{
			
var parts = JSON.parse(request1.responseText);
document.getElementById('frameid').style.opacity = "1";
document.getElementById('imagehold').className = "" ;
document.getElementById("frameid").src = "../profilepic/" + parts[1] ;
document.getElementById("chose").value = "";
document.getElementById("errors").innerHTML = parts[0];
flag1 = false ;
setTimeout(function() {
document.getElementById("errors").innerHTML = "";
  }, 5000);
		}
		catch(e)
		{
 	if(flag2 == false)
	{
document.getElementById("frameid").src = "../profilepic/male.jpg" ;
	}
	if(flag2 == true)
	{
document.getElementById("frameid").src = "../profilepic/female.jpg" ;
	}
	document.getElementById('imagehold').className = "" ;
	document.getElementById('frameid').style.opacity = "1"
document.getElementById("chose").value = "";
document.getElementById("errors").innerHTML = request1.responseText;
flag1 = true ;
setTimeout(function() {
document.getElementById("errors").innerHTML = "";
  }, 5000);
		}
}
	}
 }
request1.send(formData);
} 
}
function removeimage(x)
 {
	id = x.id ;
	
	 if(flag1 == false)
	 {
		
	 sendremimage(id)
	 }
	 else if(flag1 == true)
	 {
		 
	 }
 }
 
 function sendremimage(buttonid)
 {
//document.getElementById(remimageid).src = "loadingimage.gif" ; 
request2 = createRequest();
 if (request2==null)
 {
alert("Unable to create request");
return;
}
else
{
document.getElementById('frameid').style.opacity = "0.2";
document.getElementById('imagehold').className = "imageback" ;	
var url= "userremoveimage.php";
var requestData2 = "remove=" +
escape(buttonid);
request2.open("POST",url,true);
request2.onreadystatechange = function RemoveDetails()
 {
	 if (request2.readyState == 4)
	  {
if (request2.status == 200) 
{
	document.getElementById('readon').value = "" ;
document.getElementById('frameid').style.opacity = "1";
document.getElementById('imagehold').className = "" ;	
if(flag2 == false)
	{
		document.getElementById("frameid").src = "../profilepic/male.jpg" ;
	}
	if(flag2 == true)
	{
document.getElementById("frameid").src = "../profilepic/female.jpg" ;
	}
	
}
	 }
 }
request2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request2.send(requestData2);
}
}


	