// JavaScript Document
$(document).ready(function() {
    //$(".radio").buttonset();
	
$('.ans').on("keydown keypress keyup", false);	 
  });
  
 // Mouse Cursor code 
  $.fn.setCursorPosition = function(pos)
{
this.each(function(index,elem){

if(elem.setSelectionRange)
{
elem.setSelectionRange(pos,pos);
}
else if(elem.createTextRange)
{
var range = elem.createTextRange();
range.collapse(true);
range.moveEnd('character',pos);
range.moveStart('character',pos);
range.select();
}
});
return this ;
} ;
// tita code

function toleft(x)
{ 
var i = ids.substring(1,0)
var last = ids.substring(ids.length ,1)
$("#"+ids).animate({top : '1px'},"fast",function()
{
$("#"+ids).animate({top : '-1px'},"fast")
})
var len = document.getElementById('ans'+last).selectionStart
$('#ans' + last).setCursorPosition(parseInt(len) - 1);
}
function toright(x)
{ 
var i = ids.substring(1,0)
var last = ids.substring(ids.length ,1)
$("#"+ids).animate({top : '1px'},"fast",function()
{
$("#"+ids).animate({top : '-1px'},"fast")
})
var len = document.getElementById('ans'+last).selectionStart
$('#ans' + last).setCursorPosition(parseInt(len) + 1);
}
function update(ids)
{
	//alert(ids)
	
var i = ids.substring(1,0)
var last = ids.substring(ids.length ,1)
//alert(last)
if(i == '.'){
if(a == true){
$(".dot").animate({top : '1px'},"fast",function()
{
$(".dot").animate({top : '-1px'},"fast")
})
document.getElementById("ans" + last).value += i;
a = false;
}
}
else if(i=='-'){
$(".minus").animate({top : '1px'},"fast",function()
{
$(".minus").animate({top : '-1px'},"fast")
})	
if(document.getElementById("ans" + last).value == ""){
document.getElementById("ans" + last).value += i;
}
}
else
{
	$("#"+ids).animate({top :'1px'},"fast",function()
{
$("#"+ids).animate({top : '-1px'},"fast")
})
	document.getElementById("ans" + last).value += i;
}
}
function lessone(i)
{
	var last = i.substring(i.length , 1)
	$("#"+i).animate({top :'1px'},"fast",function()
{
$("#"+i).animate({top : '-1px'},"fast")
})
if (i == "backspace" + last){
if(document.getElementById("ans" + last).value.substring(document.getElementById("ans" + last).value.length, document.getElementById("ans" + last).value.length - 1) == '.'){
var val = document.getElementById("ans" + last).value ;
var len = document.getElementById('ans' + last).selectionStart - 1;
document.getElementById("ans" + last).value = val.substring(document.getElementById('ans' + last).selectionStart - 1, 0) + val.substring(document.getElementById("ans" + last).value.length , parseInt(document.getElementById('ans' + last).selectionStart) ) ;
$('#ans' + last).setCursorPosition(len);
a = true; 
}
else{
var val = document.getElementById("ans" + last).value ;
var len = document.getElementById('ans'+ last).selectionStart - 1;
document.getElementById("ans" + last).value = val.substring(document.getElementById('ans' + last).selectionStart - 1, 0) + val.substring(document.getElementById("ans" + last).value.length , parseInt(document.getElementById('ans' + last).selectionStart) ) ;
$('#ans' + last).setCursorPosition(len);
}
}
else{
document.getElementById("ans" + last).value = "";
a = true;
}
}
request3 = [] ;
request5 = [] ;
request4 = [] ;
request7 = [] ;
request6 = [] ;
// on windows load event
window.onload = function()
{
	//document.getElementById("calciup").style.visibility = "hidden" ;
	document.getElementById("totalcont").style.display = "block";
	document.getElementById("hides").style.display = "none";
	document.getElementById("hides1").style.display = "none";
	a = true;
	if(timelim == 1)
	{
	count = test_start_ques[parseInt(secstart) - 1];
	}
	else if(timelim == 0)
	{
	count = 1 ;
	}
	hei = document.getElementById("cover").offsetHeight*0.68;
	changelang();
	
	first = 1 ;
	arresponse = [];
	tita_arresponse = [] ;
		flag = [] ;
		statuses = [] ;
		resptime = [] ;
		checkopt = [];
	flag1 = false ;
	flag2 = false ;
	hour = hour2 = parseInt(seconds[0]/3600);
	remsec = remsec2 = parseInt(seconds[0]) % 3600 ;
	minutes = minutes2 = parseInt(remsec/60);
	remsecond = remsecond2 = parseInt(remsec) % 60 ;
	hour1 = hour3 = parseInt(test_dur/3600);
	remsec1 = remsec3 = parseInt(test_dur) % 3600 ;
	minutes1 = minutes3 = parseInt(remsec1/60);
	remsecond1 = remsecond3 = parseInt(remsec1) % 60 ;
	times = 0;
	showtime();	
	for(var k=0 ; k<test.length;k++)
	{
		
		(function(k)
		{
		//var e = parseInt(k) + 1 ;
		//resptime[k] = parseInt(test[k].response_time) ;
		statuses[k] = parseInt(test[k].status1) ;
		arresponse[k] = 10 ;
		tita_arresponse[k] = "" ;
		flag[k]= false ;

		})(k);
	}
	var newcount = parseInt(count)-1 ;
	if(timelim == 1)
	{
	document.getElementById("section"+secstart).style.display = "block";
	for(var d=1;d <=num_sec;d++)
	{
		if(d != secstart)
		{
	document.getElementById("section"+d).style.display = "none"
	document.getElementById("section"+d).disabled = true;
		}
	}
	imagehold(test_start_ques[parseInt(secstart) - 1])
	}
	if(timelim == 0)
	{
		for(var d=1;d <=num_sec;d++)
	{
	document.getElementById("section"+d).style.display = "block"
		}
		document.getElementById("section1").style.backgroundColor = "#03376a";
		imagehold(1)
	}
}

for(var i =1;i<= num_sec;i++)
	 {
		 (function(i)
		{
			
 $("#section" + i).hover(
  function () {
	  var attempt = 0;
			var marked = 0;
			var markedrev = 0;
			var notvis = 0;
for(var k = test_start_ques[parseInt(i) - 1];k <= test_end_ques[parseInt(i) - 1]; k++ )
{
	//var notvis = test_end_ques[parseInt(i) - 1] - test_start_ques[parseInt(i) - 1] + 1 ;
	var j = parseInt(k) - 1;
	if(test[j].tita == 0)
{
	if(arresponse[j] != 0 && statuses[j] == 3)
	{
		attempt = parseInt(attempt) + 1;
	}
	if(arresponse[j] == 0 && statuses[j] ==4)
	{
		marked = parseInt(marked) + 1;
	}
	if(arresponse[j] != 0 && statuses[j] ==4)
	{
		markedrev = parseInt(markedrev) + 1;
	}
	if(statuses[j] == 1)
	{
		
		notvis = parseInt(notvis) + 1;
	}
}
if(test[j].tita == 1)
{
	if(tita_arresponse[j] !== "" && statuses[j] == 3)
	{
		attempt = parseInt(attempt) + 1;
	}
	if(tita_arresponse[j] === "" && statuses[j] ==4)
	{
		marked = parseInt(marked) + 1;
	}
	if(tita_arresponse[j] !== "" && statuses[j] ==4)
	{
		markedrev = parseInt(markedrev) + 1;
	}
	if(statuses[j] == 1)
	{
		
		notvis = parseInt(notvis) + 1;
	}
}
}
//alert(notvis)
unattempt = parseInt(totquestion[parseInt(i) - 1]) - parseInt(attempt) - parseInt(marked) - parseInt(markedrev) - parseInt(notvis) ;

document.getElementById("att" + i).innerHTML = "&nbsp;" + "&nbsp;" + attempt + "&nbsp;" +"&nbsp;" ;
document.getElementById("unatt" + i).innerHTML ="&nbsp;" + "&nbsp;" + unattempt + "&nbsp;" +"&nbsp;" ;
document.getElementById("mark" + i).innerHTML = "&nbsp;" + "&nbsp;" + marked + "&nbsp;" +"&nbsp;" ;	
document.getElementById("markrev" + i).innerHTML ="&nbsp;" + "&nbsp;" + markedrev + "&nbsp;" +"&nbsp;" ;

//document.getElementById("totques" + i).innerHTML = totquestion[parseInt(i) - 1];
document.getElementById("notvis" + i).innerHTML ="&nbsp;" + "&nbsp;" + notvis + "&nbsp;" +"&nbsp;" ;
    $("#falldown" + i).stop().slideDown(100);
  },
  function () {
	 
    $("#falldown" + i).stop().slideUp(100);
  }
);
	 })(i) ;
	 }
	 
// save and next option

function savenext()
{
	var quesno = parseInt(count)-1 ;
	if(timelim == 0)
	{
	if(count < test.length)
	{
		var newcount = parseInt(count)+1 ;
		count =  parseInt(newcount)- 1 ;
		var subjectsection_id1 = test[parseInt(quesno) + 1].section_id;
		var quesid1 = newcount ;
	}
	
	if(count == test.length)
	{
		
		var newcount = 1 ;
		count =  parseInt(newcount)- 1 ;
		var subjectsection_id1 = test[0].section_id;
		var quesid1 = 1
	}
	}
	if(timelim == 1)
	{
	if(count < test_end_ques[parseInt(secstart) - 1])
	{
		var newcount = parseInt(count)+1 ;
		count =  parseInt(newcount)- 1 ;
		var subjectsection_id1 = test[parseInt(quesno) + 1].section_id;
		var quesid1 = newcount ;
	}
	
	if(count == test_end_ques[parseInt(secstart) - 1])
	{
		
		var newcount = test_start_ques[parseInt(secstart) - 1] ;
		count =  parseInt(newcount)- 1 ;
		var subjectsection_id1 = test[count].section_id;
		var quesid1 = newcount ;
	}
	}
	 req = 0 ;
	
	var subjectsection_id = test[quesno].section_id;
	var quesid = test[quesno].question_id;
	var plusone = parseInt(quesno) + 1;
	var tita_val = test[plusone-1].tita ;
	if(test[plusone-1].tita == 0)
		{
	var name = document.getElementsByName("option" + plusone);
		}
	colorchange(parseInt(quesno) + 1);
	//statuses[quesno] = 2 ;
	
	if(arresponse[count] == 0 || arresponse[count] == 10 )
		{
		if(flag[count] == false)
			{	
			statuses[count] = 2 ;
	 colorred(newcount);
	arresponse[count] = 0 ;
	
		}
		
		}
	imagehold(newcount);
	if(test[quesno].tita == 0)
		{
	checkopt[quesno] = false ;		
	for(var k=0 ;k<name.length;k++)
	{
		(function(k)
		{
			
	if(name[k].checked)
	{
		req = name[k].value ;
		arresponse[quesno] = req ;
		tita_arresponse[quesno] = "" ;
		statuses[quesno] = 3 ;
		checkopt[quesno] = true ;	
	}
	
})(k);
	}
	       if(checkopt[quesno] == false)
		   {
			  
			  statuses[quesno] = 2 ; 
		   }
		}
		if(test[quesno].tita == 1)
		{
			req = document.getElementById('ans' + parseInt(quesno + 1)).value ;
			tita_arresponse[quesno] = req ;
		arresponse[quesno] = test[quesno].checked ;
		if(req !== "")
		{
			statuses[quesno] = 3
		}
		else
		{
			statuses[quesno] = 2;
		}
		}
	
	for(var i=1;i<=test.length;i++)
	{
			(function(i)
			{
				if (parseInt(quesno) + 1 == i)
		{
		}
		})(i);
		
}
count = parseInt(newcount);

}

// mark for review and next


function reviewnext()
{
	var quesno = parseInt(count)-1 
	if(timelim == 0)
	{
	if(count < test.length)
	{
		var newcount = parseInt(count)+1 ;
		count =  parseInt(newcount)- 1 ;
		var subjectsection_id1 = test[parseInt(quesno) + 1].section_id;
		var quesid1 = newcount ;
	}
	if(count == test.length)
	{
		var newcount = 1 ;
		count =  parseInt(newcount)- 1 ;
		var subjectsection_id1 = test[0].section_id;
		var quesid1 = 1;
	}
}
	if(timelim == 1)
	{
	if(count < test_end_ques[parseInt(secstart) - 1])
	{
		var newcount = parseInt(count)+1 ;
		count =  parseInt(newcount)- 1 ;
		var subjectsection_id1 = test[parseInt(quesno) + 1].section_id;
		var quesid1 = newcount ;
	}
	
	if(count == test_end_ques[parseInt(secstart) - 1])
	{
		
		var newcount = test_start_ques[parseInt(secstart) - 1] ;
		count =  parseInt(newcount)- 1 ;
		var subjectsection_id1 = test[count].section_id;
		var quesid1 = newcount ;
	}
	}
	req = 0 ;
	;
	
	var quesid = test[quesno].question_id;
	var subjectsection_id = test[quesno].section_id;
	var plusone = parseInt(quesno) + 1
	if(test[plusone-1].tita == 0)
	{
	var name = document.getElementsByName("option" + plusone);
	}
	if(arresponse[count] == 0 || arresponse[count] == 10)
	{
	if(flag[count] == false)
			
		{
		statuses[count] = 2 ;	
	 colorred(newcount);
	arresponse[count] = 0;
		}
			}
			
	imagehold(newcount);
	if(test[quesno].tita == 0)
		{
	
	for(var k=0 ; k<name.length;k++)
	{
		(function(k)
		{
		
		
	if(name[k].checked)
	{
		req = name[k].value ;
		arresponse[quesno] = req ;
		tita_arresponse[quesno] = "" ;
		statuses[quesno] = 4;
		checkopt[quesno] == true ;
		}
			
})(k);
	}
	  
			   
}
if(test[quesno].tita == 1)
		{
		req = document.getElementById('ans' + parseInt(quesno + 1)).value
		arresponse[quesno] = test[quesno].checked ;
		tita_arresponse[quesno] = req ;
		}
	statuses[quesno] = 4 ;
		
	colorchangerev(parseInt(quesno) + 1);
	
	
	for(var i=1;i<=test.length;i++)
	{
			(function(i)
			{
				if (parseInt(quesno) + 1 == i )
		{
		}
		})(i);
		
}

count = parseInt(newcount)  ;

}


// option for clearing response
function clearres()
{
	
	var quesno = parseInt(count)-1 ;
	var quesid = test[quesno].question_id;
	statuses[quesno] = 2 ;
	if(test[count-1].tita == 0)
	{	
	var name = document.getElementsByName("option" + count);
	}
	
	if(test[quesno].tita == 0)
		{
	for(var j=0 ; j<name.length;j++)
	{
		(function(j)
		{
			
	if(name[j].checked)
	{
		
	var id = name[j].id
		document.getElementById(id).checked = false ;
		arresponse[quesno] = 0 ;
		tita_arresponse[quesno] = ""
		//$("#"+id).button("refresh");
		}
})(j);
	}
	}
	if(test[quesno].tita == 1)
		{
			document.getElementById('ans' + parseInt(quesno + 1)).value = "" ;
			arresponse[quesno] = test[quesno].checked ;
		tita_arresponse[quesno] = ""
		}
		flag[quesno] =  false ;
		colorred(count);
	//nogreentick(count)	
	for(var i=1;i<=test.length;i++)
	{
			(function(i)

			{
				if (count == i)
		{
		}
		})(i);
		
}
	
	
}

// option for changing section
function section(num,tot)
{
	
	count = num;
	var newcount = parseInt(count)+1 ;
	var quesid = test[count].question_id;
	var subjectsection_id = test[count].section_id;
imagehold(newcount);
radiohidden(newcount);
	for(var p=1; p<=num_sec ;p++)
	{
		if(p != tot)
		{
		document.getElementById("numbers" + p).style.visibility = "hidden";	
		document.getElementById("section" + p).style.backgroundColor = "#1472cc";
		}
	}
	if(test[count].tita == 0)
		{
	if(arresponse[count] == 0 || arresponse[count] == 10)
	{
	if(flag[count] == false)
			
		{
			statuses[count] = 2 ;
			 colorred(newcount);
	arresponse[count] == 0;
	tita_arresponse[count] == ""; 
		}
	}
		}
		if(test[count].tita == 1)
		{
			if(tita_arresponse[count] === "" )
	{
		if(flag[count] == false)
			
		{
			statuses[count] = 2 ;
			 colorred(newcount);
	arresponse[count] == 0;
	tita_arresponse[count] == "" ; 
		}
	}
		}
	
for(var i=1;i<=test.length;i++)
	{
			(function(i)
			{
				if (newcount == i)
		{
		}
		})(i);
		
}	
count = parseInt(count) + 1 ;	
}

// option for clicking question on side pallette

function changeques(number)
{
	newcount1 = parseInt(count) -1;
	count1 = parseInt(number) -1 ;
	var quesid = test[count1].question_id;
   var subjectsection_id = test[count1].section_id;
var newcount = number ;
if(test[count1].tita == 0)
		{
if(arresponse[count1] == 0 || arresponse[count1] == 10)
	{
	if(flag[count1] == false)
			
		{
			statuses[count1] = 2 ;
			 colorred(newcount);
	arresponse[count1] = 0 ;
	tita_arresponse[count1] = "" ;
		}
	}
		}
		if(test[count1].tita == 1)
		{
if(tita_arresponse[count1] === "")
	{
	if(flag[count1] == false)
			
		{
			statuses[count1] = 2 ;
			 colorred(newcount);
	arresponse[count1] = 0 ;
	tita_arresponse[count1] = "" ;
		}
	}
		}
	
//colorchangebutt(newcount);
imagehold(newcount);
if(test[count-1].tita == 0)
		{	
var name = document.getElementsByName("option" + count);
		
for(var k=0 ; k<name.length;k++)
	{
		(function(k)
		{
			
	if(name[k].checked)
	{
		var id = name[k].id
		document.getElementById(id).checked = false ;
		//$("#"+id).button("refresh");
		
		if(arresponse[newcount1] != 0 && arresponse[newcount1] != 10)
		{
		document.getElementById("option" + arresponse[newcount1]+ count).checked = true ;
		//id1 =document.getElementById("option" + arresponse[newcount1]+ count).id ;
		//$("#"+id1).button("refresh");
		}
	
	}
	
})(k);
	}
		}
		if(test[count-1].tita == 1)
		{	
		
		if(tita_arresponse[newcount1] !== "")
		{
		document.getElementById("ans" + count).value = tita_arresponse[newcount1]
		}
	}
		
	for(var i=1;i<=test.length;i++)
	{
			(function(i)
			{
				if (newcount == i)
		{
		}
		})(i);
		
}
	count = parseInt(count1) + 1 ;
	

}

// disable right click 
/*
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
*/

//Change question when it don't contains image


function withoutimage(x,y)
{
	
	setTimeout(function recordtime()
{
	resptime[parseInt(x)-1] = parseFloat(resptime[parseInt(x)-1]) + 0.5 ;
	if(x == count)
	{
	setTimeout(recordtime,500)
	}
},500)
    document.getElementById("imagebox").style.width = "0%";
    document.getElementById("imagebox").style.height = "0%";
	document.getElementById("questionbox").style.borderLeft = "";
	document.getElementById("questionbox").style.width = "99%";
	//document.getElementById("cover").style.border = "1px dotted black";
	//document.getElementById("cover").style.borderRight = "none";
	//document.getElementById("questionbox").style.borderRight = "1px dotted black";			
	document.getElementById("numb").innerHTML = "<b>" + test[y].question_id +"."+"</b>";
	document.getElementById("radio" + x).style.visibility = "visible" ;
	if(val == "english")
	{
	if(test[y].passage != null && test[y].passage != "")
	{
	variablesize();
	document.getElementById("passagdiv" + x).style.visibility = "visible";
	document.getElementById("passagdivhindi" + x).style.visibility = "hidden";
	hidedivs(x);
}
	document.getElementById("question").innerHTML =  test[y].question;
		
	if(test[y].tita == 0)
	{
		document.getElementById("questype").innerHTML = "Question Type" + "&nbsp;" +"&nbsp;" + ":Multiple Choice Questions"
document.getElementById("option1text" + x).innerHTML = test[y].Option1;
	document.getElementById("option2text" + x).innerHTML = test[y].Option2;
	document.getElementById("option3text" + x).innerHTML = test[y].Option3;
	document.getElementById("option4text" + x).innerHTML = test[y].Option4;
	if(num_opt == 5)
	{
	document.getElementById("option5text" + x).innerHTML = test[y].Option5;
	}
	}
	if(test[y].tita == 1)
	{
		//alert(45)
		document.getElementById("questype").innerHTML = "Question Type" + "&nbsp;" +"&nbsp;" + ":Type In the Answer Type"
		var inc = parseInt(y) + 1
		document.getElementById("ans" + inc).focus();
	}
	}
	if(val == "hindi")
	{
     
	quesoptdisplay(x,y);
	}
}

//Change question when it contains image

function withimage(x,y)
{
	
	
	setTimeout(function recordtime()
{
	resptime[parseInt(x)-1] = parseFloat(resptime[parseInt(x)-1]) + 0.5 ;
	if(x == count)
	{
	setTimeout(recordtime,500)
	
	}
},500)
	imagequessize(x,y);
		//document.getElementById("cover").style.border = "1px dotted black";
	//document.getElementById("cover").style.borderRight = "none";
	//document.getElementById("questionbox").style.borderRight = "1px dotted black";			
	document.getElementById("numb").innerHTML = "<b>" + test[y].question_id + "."+"</b>";
	
	
	document.getElementById("radio" + x).style.visibility = "visible"	;
	if(val == "english")
	{ 
	document.getElementById("question").innerHTML =  test[y].question;
		
	if(test[y].tita == 0)
	{
		document.getElementById("questype").innerHTML = "Question Type" + "&nbsp;" +"&nbsp;" + ":Multiple Choice Questions";
document.getElementById("option1text" + x).innerHTML = test[y].Option1;
	document.getElementById("option2text" + x).innerHTML = test[y].Option2;
	document.getElementById("option3text" + x).innerHTML = test[y].Option3;
	document.getElementById("option4text" + x).innerHTML = test[y].Option4;
	
	if(num_opt == 5)
	{
		document.getElementById("option5text" + x).innerHTML = test[y].Option5;
	}
	}
	if(test[y].tita == 1)
	{
		document.getElementById("questype").innerHTML = "Question Type" + "&nbsp;"+"&nbsp;" + ":Type In the Answer Type"
		var inc = parseInt(y) + 1
		document.getElementById("ans" + inc).focus();
	}
	}
	if(val == "hindi")
	{
		if(document.getElementById("imagehindi" + x).height < hei )
	{
		
		document.getElementById("imagehindi" + x).height = hei ;
		
	}
	document.getElementById("imagediv" + x).style.visibility = "hidden";
	document.getElementById("imagedivhindi" + x).style.visibility = "visible";
	
	hidedivs(x);
	
	quesoptdisplay(x,y)
	}
}
// hide all other passage and image div

function hidedivs(x)
{
	
	for (var t =1 ; t<= test.length;t++)
	{
		if(t!= x)
		{
			document.getElementById("imagedivhindi" + t).style.visibility = "hidden";
			document.getElementById("imagediv" + t).style.visibility = "hidden";
			document.getElementById("passagdiv" + t).style.visibility = "hidden";
			document.getElementById("passagdivhindi" + t).style.visibility = "hidden";
		}
	}
}
// if ques in hindi null then function diplays english

function quesoptdisplay(x,y)
{
	
	if(test[y].questionh == null || test[y].questionh == "" )
	{
		document.getElementById("question").innerHTML = test[y].question;
			
	}
	else
	{
	document.getElementById("question").innerHTML =  test[y].questionh;
	}
	if(test[y].tita == 0)
	{
	if(test[y].option1h == null || test[y].option1h == "" )
	{
		document.getElementById("option1text" + x).innerHTML = test[y].Option1;
	}
	else
	{
	document.getElementById("option1text" + x).innerHTML =  test[y].option1h;
	}
	if(test[y].option2h == null || test[y].option2h == "" )
	{
		document.getElementById("option2text" + x).innerHTML = test[y].Option2;
	}
	else
	{
	document.getElementById("option2text" + x).innerHTML =  test[y].option2h;
	}
	if(test[y].option3h == null || test[y].option3h == "" )
	{
		document.getElementById("option3text" + x).innerHTML = test[y].Option3;
	}
	else
	{
	document.getElementById("option3text" + x).innerHTML =  test[y].option3h;
	}
	if(test[y].option4h == null || test[y].option4h == "" )
	{
		document.getElementById("option4text" + x).innerHTML = test[y].Option4;
		
	}
	else
	{
	document.getElementById("option4text" + x).innerHTML =  test[y].option4h;

	}
	if(num_opt == 5)
	{
	if(test[y].option5h == null || test[y].option5h == "" )
	{
		document.getElementById("option5text" + x).innerHTML = test[y].Option5;
		
	}
	else
	{
	document.getElementById("option5text" + x).innerHTML =  test[y].option5h;

	}
	}
	}
	if(test[y].tita == 1)
	{
		var inc = parseInt(y) + 1
		document.getElementById("ans" + inc).focus();
	}
	if(test[y].imagefile != null && test[y].imagefile != "" )
	{
	imagequessize(x,y);
	imagequessizehindi(x,y)
	}
	else if(test[y].imagefile == null || test[y].imagefile == "" )
	{
	//variablesize()
	if(test[y].passage != null && test[y].passage != "" )
	{
		hidedivs(x);
	if(test[y].passageh == null || test[y].passageh == "" )
	{
		variablesize();
		
	document.getElementById("passagdiv" + x).style.visibility = "visible";
	document.getElementById("passagdivhindi" + x).style.visibility = "hidden";
	}
	else
	{
		variablesize();
	document.getElementById("passagdivhindi" + x).style.visibility = "visible";	
	document.getElementById("passagdiv" + x).style.visibility = "hidden";
	}
	}
	
	}
	
}

function variablesize()
{
	document.getElementById("imagebox").style.width = "48%";
    document.getElementById("imagebox").style.height = "76%";
	document.getElementById("questionbox").style.borderLeft = "2px solid silver";
    document.getElementById("questionbox").style.width = "49%";
}

//  adjusting whether image displayed or not and adjusting height and width of image and questionbox if displayed

function imagequessize(x,y)
{
	
	variablesize()
	
	if(test[y].passageh != null && test[y].passageh != "" )
	{
	
	document.getElementById("passagdiv" + x).style.visibility = "visible";
	}
	else
	{
		
	if(document.getElementById("image" + x).height < hei )
	{
		
		document.getElementById("image" + x).height = hei ;
		
	}
	if(document.getElementById("imagehindi" + x).height < hei )
	{
		
		document.getElementById("imagehindi" + x).height = hei ;
		
	}
	document.getElementById("imagediv" + x).style.visibility = "visible";
	document.getElementById("imagedivhindi" + x).style.visibility = "hidden";
	}
	hidedivs(x);
	}
function imagequessizehindi(x,y)
{
	document.getElementById("imagediv" + x).style.visibility = "hidden";
	document.getElementById("imagedivhindi" + x).style.visibility = "visible";
}
// record time per question

//Change radio button for different questions

function radiohidden(t)
{
	for(i=0; i<test.length ;i++)
	{
		j=i+1 ;
		
		if(j!= t)
		{
		document.getElementById("radio" + j).style.visibility = "hidden"
		}
	}
}

// section buton color change when clicked on it

function buttondiv(s)
{
	
	for(var m=1;m<=num_sec;m++)	
	{
		//k = parseInt(m) +1 ;
		for(var n=0;n< box[m].length;n++)
		{
			
			if(box[m][n]== s)
			{
				
				
			
			document.getElementById("numbers" + m).style.visibility = "visible";
			if(timelim == 0)
			{
			document.getElementById("section" + m).style.backgroundColor = "#03376a";
			}
			document.getElementById("secid" ).innerHTML = "You are viewing" + "&nbsp;" + "<b>" + secdatastore[parseInt(m)-1]['section_name'] + "</b>" + "&nbsp;" + "Section";
			//alert(document.getElementById("section" + m).className)
			for(var p=1; p<=num_sec ;p++)
	{
		if(p != m)
		{
			
		document.getElementById("numbers" + p).style.visibility = "hidden";
		document.getElementById("section" + p).style.backgroundColor = "#1472cc";
			
		}
	}	
		}
		}
	}
}
function colorchange(o)
{
	var  less = parseInt(o) -1 ;
	flag[less] = true ;
	document.getElementById("button" + o).className = "buttonredcol";
	document.getElementById("button" + o).style.color = "white";
	//nogreentick(o)
	if(test[o-1].tita == 0)
	{
	var name = document.getElementsByName("option" + o);
	for(var i=0 ; i<name.length;i++)
	{
		(function(i)
		{
	if(name[i].checked)
	{
		document.getElementById("button" + o).className = "buttongreencol";
	document.getElementById("button" + o).style.color = "white";
	
	}
	
})(i);

	}
}
if(test[o-1].tita == 1)
	{
		if(document.getElementById("ans" + o).value.length != 0)
		{
	document.getElementById("button" + o).className = "buttongreencol";
	document.getElementById("button" + o).style.color = "white";
		}

	}
}
/*function colorchangebutt(o)
{
	var less = parseInt(o)-1;
	if(flag[less] == false)
	{
	document.getElementById("button" + o).style.backgroundColor = "red";
	document.getElementById("button" + o).style.color = "white";
	}
	if(flag[less] == true)
	{
	document.getElementById("button" + o).style.backgroundColor = "purple";
	document.getElementById("button" + o).style.color = "white";
	}
	var name = document.getElementsByName("option" + o);
	for(var i=0 ; i<name.length;i++)
	{
		(function(i)
		{
	if(name[i].checked)
	{
	if(flag[less] == false)
	{	
		 checkoption = name[i];
		document.getElementById("button" + o).style.backgroundColor = "green";
	document.getElementById("button" + o).style.color = "white";
	}
	}
})(i);
	}
} */
function colorchangerev(o)
{
	
	document.getElementById("button" + o).className = "buttonpurplecol";
	document.getElementById("button" + o).style.color = "white";
	var name = document.getElementsByName("option" + o);
	var less = parseInt(o)-1 ;
	if(test[o-1].tita == 0)
	{
	if(arresponse[less] !=10 && arresponse[less] !=0 )
	{
	greentick(o)	
	}
	else if(arresponse[less] ==10 || arresponse[less] ==0 )
	{
		nogreentick(o)
	}
	}
	if(test[o-1].tita == 1)
	{
	if(tita_arresponse[less] !== "" )
	{
	greentick(o)	
	}
	else if(tita_arresponse[less] === "" )
	{
		nogreentick(o)
	}
	}
	flag[less] = true ;
	/*for(var i=0 ; i<name.length;i++)
	{
		(function(i)
		{
	if(name[i].checked)
	{
		
	}
})(i);
	}*/
}

// red color for button

function colorred(idnums)
{
	document.getElementById("button" + idnums).className = "buttonredcol";
	document.getElementById("button" + idnums).style.color = "white";
	//nogreentick(idnums);
}
//image of tick for review

function greentick(idnums)
{
document.getElementById("button" + idnums).className = "buttonpurpletickcol"
document.getElementById("button" + idnums).style.color = "white";
//document.getElementById("buttonright" + idnums).style.height = "15px";
//document.getElementById("buttonright" + idnums).style.width = "15px";	
}

// no image tick for review

function nogreentick(idnums)
{	
	document.getElementById("button" + idnums).className = "buttonpurplecol"
			document.getElementById("button" + idnums).style.color = "white";
	//document.getElementById("buttonright" + idnums).style.height = "0px";
	//document.getElementById("buttonright" + idnums).style.width = "0px";
}


//function time display


function showtime()
{

	if (remsecond == 0)
	{
	
		if(remsecond<10)
		{
			document.getElementById("sec").innerHTML = "0" +remsecond ;
		}
		else if(remsecond>=10)
		{
			document.getElementById("sec").innerHTML = remsecond ;
		}
		if(hour<10)
		{
			document.getElementById("hour").innerHTML = "0" +hour ;
		}
		else if(hour>=10)
		{
			document.getElementById("hour").innerHTML = hour;
		}
		if(minutes<10)
		{
			document.getElementById("min").innerHTML = "0" + minutes ;
		}
		else if(minutes>=10)
		{
			document.getElementById("min").innerHTML = minutes ;
		}
		if(minutes == 0)
		{
			if(hour==0)
			{
				alert("The time for this section has elapsed.Submitting the section")
				changetime();
				
			}
			else if(hour!=0)
			{
		remsecond= 59 ;
		remsecond1= 59 ;
		minutes =59;
		minutes1 =59;
		hour = parseInt(hour)-1;
		hour1 = parseInt(hour1)-1;
		timer = setTimeout(showtime,1000)
			}
			
		}
		else if(minutes!=0)
		{
		remsecond= 59 ;
		remsecond1= 59 ;
		minutes = parseInt(minutes)-1;
		minutes1 = parseInt(minutes1)-1;
		hour = hour;
		hour1 = hour1;
		timer = setTimeout(showtime,1000)
		}
		
	}
	else if(remsecond != 0 )
	{
		if(remsecond<10)
		{
			document.getElementById("sec").innerHTML = "0" +remsecond ;
		}
		else if(remsecond>=10)
		{
			document.getElementById("sec").innerHTML = remsecond;
		}
		if(hour<10)
		{
			document.getElementById("hour").innerHTML = "0" +hour ;
		}
		else if(hour>=10)
		{
			document.getElementById("hour").innerHTML = hour;
		}
		if(minutes<10)
		{
			document.getElementById("min").innerHTML = "0" +minutes;
		}
		else if(minutes>=10)
		{
			document.getElementById("min").innerHTML = minutes ;
		}
		remsecond = parseInt(remsecond)-1;
		remsecond1 = parseInt(remsecond1)-1
		hour = hour;
		hour1 = hour1;
		minutes= minutes;
		minutes1= minutes1;
		timer = setTimeout(showtime,1000)
		
		
	}
//	var timerupdate = setInterval(updatetime,40000)
}
function changetime()
	{
		times = parseInt(times) + 1 ;
		if(times < seconds.length)
		{
			secstart = parseInt(secstart) + 1 ;
			for(var d=1;d <=num_sec;d++)
	{
		
	document.getElementById("section"+d).disabled = false;
		}
	document.getElementById("section"+secstart).style.display = "block";
			for(var d=1;d <=num_sec;d++)
	{
		if(d != secstart)
		{
			document.getElementById("section"+d).style.display = "none"
	document.getElementById("section"+d).disabled = true;
		}
	}
			section(test_start_ques[parseInt(secstart) - 1] - 1 ,secstart)
		hour3 = hour3 - hour2 ; 
	remsec3 = remsec3 - remsec2 ;
	minutes3 = minutes3 -  minutes2 ;
	remsecond3 = remsecond3 - remsecond2;
		hour = hour2 = parseInt(seconds[times]/3600);
	remsec = remsec2 = parseInt(seconds[times]) % 3600 ;
	minutes = minutes2 = parseInt(remsec/60);
	remsecond = remsecond2 = parseInt(remsec) % 60 ;
	hour1 = hour3;
	remsec1 = remsec3;
	minutes1 = minutes3;
	remsecond1 = remsecond3;
	showtime();		
		}
		else
		{
		submittest();
		}
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
var popupWindow1 = null;
var popupWindow2 = null;
var w = window.outerWidth;
var h = window.outerHeight;
//Update time to database
	
	// confirm form time when submitted

function confirmsubmit()
{
	var confirmation = confirm("Are you sure you want to submit the test");
	if(confirmation == true)
	{
		submittest();
	}
}

// Submit the test to the server

function submittest()
{
// $("#dialog1").dialog("open");
 finsubmit = setTimeout(finalsubmit , 1000) ;	
}

// finally submit the test to the server 

function finalsubmit()
{
	var matcharray = new Array() ;
	var corcount = 0 ;
	var incorcount = 0 ;
	var leftcount = 0 ;
//$("#dialog1").dialog("close");
document.getElementById("totalcont").style.display = "none";

document.getElementById("hides1").style.display = "none";
for(var k =0 ;k<test.length;k++)
{
	//console.log(test[k].Correct_choice)
	if(test[k]['tita'] == 0)
	{
	if(arresponse[k] != 10 && arresponse[k] != 0)
	{
		
		if(arresponse[k] == test[k].Correct_choice)
		{
			corcount++ ;
			matcharray[k] = 1 ;
		}
		if(arresponse[k] != test[k].Correct_choice)
		{
			incorcount++ ;
			matcharray[k] = 2 ;
		}
}
else if(arresponse[k] == 10 || arresponse[k] == 0)
	{
		leftcount++ ;
		matcharray[k] = 0 ;
	}
}
else if(test[k]['tita'] == 1)
	{
		if(tita_arresponse[k] !== "")
	{
		if(tita_arresponse[k] == test[k].tita_correct)
		{
			corcount++ ;
			matcharray[k] = 1 ;
		}
		else if(tita_arresponse[k] != test[k].tita_correct)
		{
			incorcount++ ;
			matcharray[k] = 2 ;
		}
		}
		if(tita_arresponse[k] === "")
	{
		leftcount++ ;
		matcharray[k] = 0 ;
	}
	}
}
document.getElementById("score1").innerHTML = parseInt(corcount) + parseInt(incorcount);
document.getElementById("score2").innerHTML = leftcount ;
document.getElementById("score3").innerHTML = corcount ;
document.getElementById("score4").innerHTML = incorcount ;
document.getElementById("score5").innerHTML = parseFloat(corcount)*corr_marks - parseFloat(incorcount)*incorr_marks ;
document.getElementById("hides2").style.display = "block";
for(var k =1 ;k<=test.length;k++)
{ 
    if(matcharray[k -1] == 1)
	{
    document.getElementById("veri" + k).style.color = "green"
	document.getElementById("veri" + k).innerHTML = "Correct";
	}
	if(matcharray[k -1] == 2)
	{
    document.getElementById("veri" + k).style.color = "red"
	document.getElementById("veri" + k).innerHTML = "Incorrect";
	}
	if(matcharray[k -1] == 0)
	{
    document.getElementById("veri" + k).style.color = "black"
	document.getElementById("veri" + k).innerHTML = "Unattempted";
	}
}
}
function changelang()
{
	for(var k =1;k<=test.length;k++)
	{
	document.getElementById("language" + k).onchange = function()
	{
	var newcounts = parseInt(count) - 1 ;
	//alert(test[newcounts].imagefileh);
	imagehold(count);
	}
}
}

// Check if imagefile in hindi or english is null or not

function imagehold(z)
{
	
	//alert(count)
	document.getElementById("quesimageoptbox1").style.height ="100%";
	document.getElementById("openprofile" ).style.visibility ="hidden";
	document.getElementById("openquespaperbox").style.visibility ="hidden";
     document.getElementById("openinstruction").style.visibility ="hidden";
	document.getElementById("quesimageoptbox").style.visibility ="visible";
	
	document.getElementById("languagechange" + z).style.visibility ="visible";
	for(var i=1;i<=test.length;i++)
	{
		if(i != z)
		{
		
			document.getElementById("languagechange" + i).style.visibility ="hidden";
		}
		
	}
	e = document.getElementById("language" + z);
    val = e.options[e.selectedIndex].value;
	
	var k = parseInt(z) - 1 ;
	buttondiv(z);
	if(val == "english")
	{	
	if(test[k].imagefile == null || test[k].imagefile == "" )
	{
		
		
	//document.getElementById("numbers" + z).style.visibility = "visible"	;
	radiohidden(z);
	
	
		withoutimage(z,k);
	
}
	
	else 
	{
	
	//document.getElementById("numbers" + z).style.visibility = "visible";
	document.getElementById("imagediv" + z).style.visibility = "visible";
withimage(z,k);
	radiohidden(z);
	}
	}
	if(val == "hindi")
	{
		
	if(test[k].imagefileh == null || test[k].imagefileh == "" )
	{
				withoutimage(z,k);
	//document.getElementById("numbers" + z).style.visibility = "visible"	;
	radiohidden(z);
}
	
	else 
	
	{
		
			//document.getElementById("numbers" + z).style.visibility = "visible";
	document.getElementById("imagediv" + z).style.visibility = "visible";
withimage(z,k);
	radiohidden(z);
	}
	}
}
function openprofile()
{
	
	// below line not understood why 
	document.getElementById("quesimageoptbox1").style.height ="0%";
	document.getElementById("openprofile" ).style.visibility ="visible";

	document.getElementById("quesimageoptbox").style.visibility ="hidden";
	document.getElementById("openinstruction").style.visibility ="hidden";
	document.getElementById("languagechange" + count ).style.visibility ="hidden";
	document.getElementById("openquespaperbox").style.visibility ="hidden";
}
function closeprofile()
{
	
	imagehold(count);
}

function openquestion()
{
	closeques1();
	
	document.getElementById("quesimageoptbox1").style.height ="0%";
	document.getElementById("openprofile" ).style.visibility ="hidden";

	document.getElementById("quesimageoptbox").style.visibility ="hidden";
	
	document.getElementById("openinstruction").style.visibility ="hidden";
	document.getElementById("languagechange" + count ).style.visibility ="hidden";
	document.getElementById("openquespaperbox").style.visibility ="visible";
	for(var i =1;i<= num_sec;i++)
	 {
		 if(test_start_ques[parseInt(i) - 1]<= count && count <= test_end_ques[parseInt(i) - 1])
		 {
			 document.getElementById("sec_name").innerHTML = "Section:" + "&nbsp;" + sec_name[parseInt(i) - 1];
			 for(var k = test_start_ques[parseInt(i) - 1];k <= test_end_ques[parseInt(i) - 1]; k++ )
			 {
		element = document.createElement("p");
		 e = document.getElementById("language" + k);
   var val1 = e.options[e.selectedIndex].value;
   element1 = document.getElementById("openquespaperbox1");
   element1.appendChild(element);
   
   if(val1 == "english")
				 {
					 str = "Q" + k + String.fromCharCode(160) + String.fromCharCode(160) + test[parseInt(k) - 1].question ;
			
			}
			if(val1 == "hindi")
				 {
					 if(test[parseInt(k) - 1].questionh != null && test[parseInt(k) - 1].questionh != "")
					 {
					 str = "Q" + k + String.fromCharCode(160) + String.fromCharCode(160) + test[parseInt(k) - 1].questionh ;
					 }
					 else
					 {
						 str = "Q" + k + String.fromCharCode(160) + String.fromCharCode(160) + test[parseInt(k) - 1].question ;
					 }
			
			}
			//str = str.replace('<br />g', '\n' );
			//element2 = document.createTextNode(str.replace(new RegExp('<br />', 'g'), String.fromCharCode(13)));
				 element.innerHTML = str ; 
			element.style.marginLeft ="10px"
			element.style.paddingBottom ="15px"
			element.style.paddingTop ="15px";
			element.style.borderBottom ="2px solid silver"
			element.className ="toremove"
			 }
		 }
	 }
}
function closeques()
{
 closeques1();
 imagehold(count);	
}

function closeques1()
{
	
var parent = document.getElementById("openquespaperbox1");
var child = document.getElementsByClassName("toremove");
var chilength = child.length ;
if(chilength > 0)
 {  
 
while(child.length > 0)
{
    parent.removeChild(child[0]);
	
}
}
}
function Openinstruction()
{
document.getElementById("quesimageoptbox1").style.height ="0%";
	document.getElementById("openprofile" ).style.visibility ="hidden";

	document.getElementById("quesimageoptbox").style.visibility ="hidden";
	
	document.getElementById("openinstruction").style.visibility ="visible";
	document.getElementById("languagechange" + count ).style.visibility ="hidden";
	document.getElementById("openquespaperbox").style.visibility ="hidden";	
}
function closeinstruction()
{
	imagehold(count);
}