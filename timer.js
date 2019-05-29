window.onload = function()
{
	alert("time");
	seconds = 7450 ;
	hour = parseInt(seconds/3600);
	remsec = parseInt(seconds) % 3600 ;
	minutes = parseInt(remsec/60);
	remsecond = parseInt(remsec) % 60 ;
	showtime();
}
function showtime()
{

	if (remsecond == 0)
	{
	
		if(remsecond<10)
		{
			document.getElementById("sec").innerHTML = "&nbsp;"+"0" +remsecond +"&nbsp;";
		}
		else if(remsecond>=10)
		{
			document.getElementById("sec").innerHTML = "&nbsp;"+remsecond + "&nbsp;";
		}
		if(hour<10)
		{
			document.getElementById("hour").innerHTML = "&nbsp;"+"0" +hour + "&nbsp;";
		}
		else if(hour>=10)
		{
			document.getElementById("hour").innerHTML ="&nbsp;"+ hour+"&nbsp;";
		}
		if(minutes<10)
		{
			document.getElementById("min").innerHTML = "&nbsp;"+"0" +minutes +"&nbsp;";
		}
		else if(minutes>=10)
		{
			document.getElementById("min").innerHTML = "&nbsp;"+minutes +"&nbsp;";
		}
		if(minutes == 0)
		{
			if(hour==0)
			{
				alert("over")
			}
			else if(hour!=0)
			{
		remsecond= 59 ;
		minutes =59;
		hour = parseInt(hour)-1;
		timer = setTimeout(showtime,1000)
			}
			
		}
		else if(minutes!=0)
		{
		remsecond= 59 ;
		minutes = parseInt(minutes)-1;
		hour = hour;
		timer = setTimeout(showtime,1000)
		}
		
	}
	else if(remsecond != 0 )
	{
		if(remsecond<10)
		{
			document.getElementById("sec").innerHTML = "&nbsp;"+"0" +remsecond +"&nbsp;";
		}
		else if(remsecond>=10)
		{
			document.getElementById("sec").innerHTML = "&nbsp;"+remsecond + "&nbsp;";
		}
		if(hour<10)
		{
			document.getElementById("hour").innerHTML = "&nbsp;"+"0" +hour + "&nbsp;";
		}
		else if(hour>=10)
		{
			document.getElementById("hour").innerHTML ="&nbsp;"+ hour+"&nbsp;";
		}
		if(minutes<10)
		{
			document.getElementById("min").innerHTML = "&nbsp;"+"0" +minutes +"&nbsp;";
		}
		else if(minutes>=10)
		{
			document.getElementById("min").innerHTML = "&nbsp;"+minutes +"&nbsp;";
		}
		remsecond = parseInt(remsecond)-1;
		hour = hour;
		minutes= minutes;
		timer = setTimeout(showtime,1000)
		
		
	}
}