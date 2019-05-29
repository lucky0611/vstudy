

window.onload = function()
{
checkint()
	
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

function movefor()
		{
			
			//alert(objbrowserName)		
			request2 = createRequest();
if (request2== null) {
alert("Unable to create request");
return;
}
else
{
			
var url= "starttestajax.php";
var requestData1 = "user=" +
escape(user_id) + "&insert=" + escape(insert);
request2.open("POST",url,true);	
request2.onreadystatechange = function displayDetails1() {
if (request2.readyState == 4) {	
if (request2.status == 200) {
	
text = request2.responseText ;
			document.location =  "beforetest.php?value="+ text+"&id=" + user_id;

}
}
}

request2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request2.send(requestData1);
			}
//return false ;

			 
			 
		}
		