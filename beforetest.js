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
        function checkvalidate() {
			var check = document.getElementById("submit1").checked ;
			var langs = document.getElementById("sellang").selectedIndex
			if(langs != 0)
			{
			if(check)
			{	
			document.getElementById("submit2").className = "signup" 
			return true ;
			}
			else if(!check)
			{
				
				document.getElementById("submit2").className = "disable";
				$("#myModalcheck").modal()
				return false ;
			}
			}
			else if(langs == 0)
			{
				
				document.getElementById("submit2").className = "disable";
				$("#myModallang").modal()
				return false ;
			}
        }
		
		
		