
var popupWindow = null;
var w = window.outerWidth;
var h = window.outerHeight;
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
	 
function movefor(mock_id)
		{
		
			 if (popupWindow && !popupWindow.closed)
			 {
				 
			 }
			 else
			 {
			if(objbrowserName == "Chrome"  || objbrowserName == "Safari" || objbrowserName == "Firefox")
			{
			//alert(objbrowserName)		
			
			popupWindow = window.open ("starttest.php?&id=" + mock_id,'_blank','width='+w+',height='+h+',toolbar=no,menubar=no,resizable=no,directories=no,location=no');
			var timer = setInterval(checkchild,1000)
			
			function checkchild()
			 {  
	if(navigator.onLine)
	{
    if(popupWindow.closed) 
	{
		clearInterval(timer); 
				request1 = createRequest();
if (request1 == null) {
alert("Unable to create request");
return;
}
else
{
		
var url= "closewinajax.php";
var requestData1 = "mock_id=" +
escape(mock_id) + "&user_id=" + escape(user_id) ;
request1.open("POST",url,true);
request1.onreadystatechange = function displayDetails1() {
if (request1.readyState == 4) { 
if (request1.status == 200) {
	var minu =  parseInt(request1.responseText/60);
//alert("Test Window has been closed");

} 
	}
 }
request1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request1.send(requestData1); 
}
}
			}
			 }
			}
//return false ;
else
{
	alert("Please Start the test in CHROME OR SAFARI OR FIREFOX")
}
			 
			 
		}
		}
		