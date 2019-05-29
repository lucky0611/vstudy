<!doctype html>
 
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Button - Radios</title>
 <script src="../jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
 <script> 
  window.onload = function()
  {
	  loadimage();
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
function loadimage()
{
	image = document.getElementsByClassName("image")
	 for (var i =0;i<image.length;i++)
	 {
		 
		 image1 = image[i];
		 image1.onchange = function()
		 {
			 
		 var ext = $(this).val().split('.').pop().toLowerCase();
         if(this.value.length != 0) {
			 
         if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
	
              alert('invalid extension!');
} 
             else
		    {
			
			 file = this.files[0] ;
			 sendimage();
			}
			 }
			 }
}
}
 function sendimage()
 {
	 request21 = [] ;
	 for(var i=0;i<image.length ; i++)
{
	(function(i){ 
request21[i]  = createRequest();
if (request21[i]==null) {
alert("Unable to create request");
return;
}
else
{
request21[i].upload.addEventListener("progress", uploadProgress, false);
request21[i].addEventListener("load", uploadComplete, false);
request21[i].addEventListener("error", uploadFailed, false);
request21[i].addEventListener("abort", uploadCanceled, false);	
var url= "expajax.php";
formData = new FormData() ;
formData.append('files', file);
request21[i].open("POST",url,true);

request21[i].addEventListener("readystatechange", function(event){
	
	if (request21[i].readyState == 4) {
if (request21[i].status == 200) 
{
	
	
		
}
	}
 });
request21[i].send(formData);
} 
	})(i);
	}
 } 
 function uploadProgress(evt) {
        if (evt.lengthComputable) {
          var percentComplete = Math.round(evt.loaded * 100 / evt.total);
          
		 
	document.getElementById('progressNumber').innerHTML = percentComplete.toString() + '%';
	document.getElementById("incre").style.width = percentComplete.toString() + '%';
	
	
	
	

        }
        else {
          document.getElementById('progressNumber').innerHTML = 'unable to compute';
        }
      }

      function uploadComplete(evt) {
        /* This event is raised when the server send back a response */
        
      }

      function uploadFailed(evt) {
        alert("There was an error attempting to upload the file.");
      }

      function uploadCanceled(evt) {
        alert("The upload has been canceled by the user or the browser dropped the connection.");
      }
  
  </script>
</head>
<body>
<input  class ="image" type="file" id="upload" /> 
<br /><br />
<div style="width:300px;height:5px">

<div id="incre" style="background-color:green;width:0px;height:5px">
</div>
</div>
<br />
<p id="progressNumber"></p> 
</body>
</html>