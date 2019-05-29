// JavaScript Document
var message="Sorry, right-click has been disabled"; 

function clickIE() 
{
    if (document.all) {(message);return false;}
}

function clickNS(e) 
{
    if (document.layers||(document.getElementById&&!document.all)) 
    { 
       if (e.which==2||e.which==3) {(message);return false;}}
    } 
if (document.layers) 
{
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS;
} 
else
{
    document.onmouseup=clickNS;
    document.oncontextmenu=clickIE;
} 
document.oncontextmenu = new Function("return false");

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


window.onfocus = function()
{
	
	request12 = createRequest();
if (request12 == null) {
alert("Unable to create request");
return;
}
else
{
		
var url= "onfocusajax1.php";
var requestData12 = "mock_id=" +
escape(mock_id) + "&user_id=" + escape(user_id) ;
request12.open("POST",url,true);
request12.onreadystatechange = function displayDetails12() {
if (request12.readyState == 4) {
if (request12.status == 200) {

}
}
}
request12.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request12.send(requestData12);
	
	}
}
window.onblur =  function()
{
	
request11 = createRequest();
if (request11 == null) {
alert("Unable to create request");
return;
}
else
{
		
var url= "onblurajax1.php";
var requestData11 = "mock_id=" +
escape(mock_id) + "&user_id=" + escape(user_id) ;
request11.open("POST",url,true);
request11.onreadystatechange = function displayDetails11() {

if (request11.readyState == 4) {
if (request11.status == 200) {
	if(objbrowserName == "Chrome" )
			{
alert("Warning!Don't Minimise the window otherwise you may be disqualified" )
}
}
}
}
request11.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request11.send(requestData11);
}
}
