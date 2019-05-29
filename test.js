// JavaScript Document
$(document).ready(function() {
   $(function() {
            $( "#myModalprofile" ).dialog({
               autoOpen: false,
			    modal: true ,
				width: 600  ,
				
            });
            $( "#openpro" ).click(function() {
               $( "#myModalprofile" ).dialog( "open" );
            });
         });
		  $(function() {
            $( "#myModalinst" ).dialog({
               autoOpen: false,
			    modal: true ,
				width: 800  ,
				
            });
            $( "#openinst" ).click(function() {
               $( "#myModalinst" ).dialog( "open" );
            });
         });
		  $(function() {
            $( "#myModalquestion" ).dialog({
               autoOpen: false,
			    modal: true ,
				width: 800  ,
				
            });
            $( "#openques" ).click(function() {
               $( "#myModalquestion" ).dialog( "open" );
			   openquestion();
            });
         });
	
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
	document.getElementById("feedform").style.display = "none";
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
	for(var k=0 ; k<test.length;k++)
	{
		
		(function(k)
		{
		var e = parseInt(k) + 1 ;
		resptime[k] = parseInt(test[k].response_time) ;
		statuses[k] = parseInt(test[k].status1) ;
		if(test[k].status1 == 3)
		{
			document.getElementById("button" + e).className = "buttongreencol";
			document.getElementById("button" + e).style.color = "white";
			
		flag[k] = true;
		//status[k] =' 3 ';
		}
		else if(test[k].status1 == 4)
		{
			
			if(test[k].tita == 0)
			{
			if(test[k].checked !=10 && test[k].checked !=0 )
			{
			greentick(e)
			}
			else if(test[k].checked ==10 || test[k].checked ==0 )
			{
	nogreentick(e);
			}
			}
			else if(test[k].tita == 1)
			{
				if(test[k].tita_checked !== "")
			{
				greentick(e)
			}
			else if(test[k].tita_checked === "" )
			{
	nogreentick(e);
			}
			}
			
		flag[k] = true;
		//status[k] = '4' ;
		}
		else if(test[k].status1 == 2)
		{
			
			document.getElementById("button" + e).className = "buttonredcol"
			document.getElementById("button" + e).style.color = "white";
		flag[k] = false;
		//status[k] = '2' ;
		}
		else if( test[k].status1 == 1 )
		{
		flag[k] = false;
		
		//status[k] = '1' ;	
		}
		if(test[0].status1 == 1)
		{
		document.getElementById("button1").className = "buttonredcol";
			document.getElementById("button1").style.color = "white";	
		}
if(test[k].tita == 0)
{
		if(test[k].checked != 0 && test[k].checked != 10)
	{
		var radioname = document.getElementsByName("option" + e);
		for(var j=0 ; j<radioname.length;j++)
	{
		(function(j)
		{
			
	if(radioname[j].value == test[k].checked )
	{
		
		document.getElementById("option" + test[k].checked + e).checked = true;
 		var id1 = "option" + test[k].checked + e  ;
		//$("#"+id1).button("refresh");
		arresponse[k] = test[k].checked ;
		tita_arresponse[k] = "" ;
	}
	
})(j);
	}
	}
	else if(test[k].checked == 0 || test[k].checked == 10)
	{
		arresponse[k] = test[k].checked ;
		tita_arresponse[k] = "" ;
		
	}
	
}
//alert(test[k].tita)
if(test[k].tita == 1)
{
	
	//alert(e)
	document.getElementById("ans" + e).value = test[k].tita_checked ;
	arresponse[k] = test[k].checked ;
		tita_arresponse[k] = test[k].tita_checked ;
}
	
	
		})(k);
	} 
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
function changeincount(i)
{

	  var attempt = 0;
			var marked = 0;
			var markedrev = 0;
			var notvis = 0;
for(var k = test_start_ques[parseInt(i) - 1];k <= test_end_ques[parseInt(i) - 1]; k++ )
{
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
unattempt = parseInt(totquestion[parseInt(i) - 1]) - parseInt(attempt) - parseInt(marked) - parseInt(markedrev) - parseInt(notvis) ;

document.getElementById("greenincount").innerHTML = "&nbsp;" + "&nbsp;" + attempt + "&nbsp;" +"&nbsp;" ;
document.getElementById("redincount").innerHTML ="&nbsp;" + "&nbsp;" + unattempt + "&nbsp;" +"&nbsp;" ;
document.getElementById("purpincount").innerHTML = "&nbsp;" + "&nbsp;" + marked + "&nbsp;" +"&nbsp;" ;	
document.getElementById("purptickincount").innerHTML ="&nbsp;" + "&nbsp;" + markedrev + "&nbsp;" +"&nbsp;" ;
document.getElementById("whiteincount").innerHTML ="&nbsp;" + "&nbsp;" + notvis + "&nbsp;" +"&nbsp;" ;
    
  
}
for(var i =1;i<= num_sec;i++)
	 {
		 (function(i)
		{
			
 $("#sectionimg" + i).hover(
  function () {
	  var attempt = 0;
			var marked = 0;
			var markedrev = 0;
			var notvis = 0;
for(var k = test_start_ques[parseInt(i) - 1];k <= test_end_ques[parseInt(i) - 1]; k++ )
{
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
unattempt = parseInt(totquestion[parseInt(i) - 1]) - parseInt(attempt) - parseInt(marked) - parseInt(markedrev) - parseInt(notvis) ;

document.getElementById("att" + i).innerHTML = "&nbsp;" + "&nbsp;" + attempt + "&nbsp;" +"&nbsp;" ;
document.getElementById("unatt" + i).innerHTML ="&nbsp;" + "&nbsp;" + unattempt + "&nbsp;" +"&nbsp;" ;
document.getElementById("mark" + i).innerHTML = "&nbsp;" + "&nbsp;" + marked + "&nbsp;" +"&nbsp;" ;	
document.getElementById("markrev" + i).innerHTML ="&nbsp;" + "&nbsp;" + markedrev + "&nbsp;" +"&nbsp;" ;
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
			imagehold(newcount);
	
	for(var i=1;i<=test.length;i++)
	{
			(function(i)
			{
				if (parseInt(quesno) + 1 == i)
		{
			if(navigator.onLine)
			{
	request3[i] = createRequest();
if (request3[i] == null) {
alert("Unable to create request");
return;
}
else
{
	
var url= "savenextajax.php";
var requestData3 = "ques_id=" +
escape(quesid) +"&ques_id1=" +
escape(quesid1) + "&response="+escape(req) + "&subsection_id="+escape(subjectsection_id) + "&mock_id="+escape(mock_id)+ "&resptime="+escape(resptime[parseInt(quesid) - 1])+ "&subsection_id1="+escape(subjectsection_id1) + "&tita_val="+escape(tita_val )+ "&tita_val1="+escape(test[quesid1 -1].tita);
request3[i].open("POST",url,true);
request3[i].onreadystatechange = function displayDetails3() {
if (request3[i].readyState == 4) {
if (request3[i].status == 200) {

}
}
}
request3[i].setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request3[i].send(requestData3);
}
			}
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
	imagehold(newcount);	
	colorchangerev(parseInt(quesno) + 1);
	
	
	for(var i=1;i<=test.length;i++)
	{
			(function(i)
			{
				if (parseInt(quesno) + 1 == i )
		{
			if(navigator.onLine)
			{
	request5[i] = createRequest();
if (request5[i] == null) {
alert("Unable to create request");
return;
}
else
{	
var url= "setresponseajax.php";
var requestData5 = "ques_id=" +
escape(quesid) +"&ques_id1=" +
escape(quesid1) + "&response="+escape(req) + "&subsection_id="+escape(subjectsection_id) + "&mock_id="+escape(mock_id)+ "&resptime="+escape(resptime[parseInt(quesid) - 1])+ "&subsection_id1="+escape(subjectsection_id1)+ "&tita_val="+escape(test[quesid -1].tita)+ "&tita_val1="+escape(test[quesid1 -1].tita);
request5[i].open("POST",url,true);
request5[i].onreadystatechange = function displayDetails5() {
if (request5[i].readyState == 4) {
if (request5[i].status == 200) {
}
}
}
request5[i].setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request5[i].send(requestData5);
}
			}
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
			if(navigator.onLine)
			{
	request4[i] = createRequest();
if (request4[i] == null) {
alert("Unable to create request");
return;
}
else
{	

var url= "clearajax.php";
var requestData4 = "ques_id=" +
escape(quesid) +  "&mock_id="+ escape(mock_id) + "&resptime="+ escape(resptime[parseInt(quesid) - 1]) + "tita_val="+ escape(test[parseInt(quesid) - 1].tita);
request4[i].open("POST",url,true);
request4[i].onreadystatechange = function displayDetails4() {
if (request4[i].readyState == 4) {
if (request4[i].status == 200) {	
}
}
}
request4[i].setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request4[i].send(requestData4);
}
			}
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
			if(navigator.onLine)
			{
	request7[i] = createRequest();
if (request7[i] == null) {
alert("Unable to create request");
return;
}
else
{	

var url= "clickquesajax.php";
var requestData7 = "ques_id=" +
escape(quesid) +  "&mock_id="+ escape(mock_id) + "&subsection_id="+escape(subjectsection_id) + "&resptime="+ escape(resptime[parseInt(quesid) - 1])+"&tita_val="+ escape(test[parseInt(quesid) - 1].tita);
request7[i].open("POST",url,true);
request7[i].onreadystatechange = function displayDetails7() {
if (request7[i].readyState == 4) {
if (request7[i].status == 200) {	
}
}
}
request7[i].setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request7[i].send(requestData7);
}
			}
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
			if(navigator.onLine)
			{
	request6[i] = createRequest();
if (request6[i] == null) {
alert("Unable to create request");
return;
}
else
{	
var url= "clickquesajax.php";
var requestData6 = "ques_id=" +
escape(quesid) + "&mock_id="+escape(mock_id)+ "&subsection_id="+escape(subjectsection_id) + "&resptime="+ escape(resptime[parseInt(quesid) - 1]);
request6[i].open("POST",url,true);
request6[i].onreadystatechange = function displayDetails6() {
if (request6[i].readyState == 4) {
if (request6[i].status == 200) {
}
}
}
request6[i].setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request6[i].send(requestData6);
}
			}
		}
		})(i);
		
}
	count = parseInt(count1) + 1 ;
	

}

// disable right click 

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
			changeincount(m)
			if(timelim == 0)
			{
			document.getElementById("section" + m).style.backgroundColor = "#03376a";
			}
			document.getElementById("secid" ).innerHTML = "&nbsp;" + "<b>" + secdatastore[parseInt(m)-1]['section_name'] + "</b>" + "&nbsp;";
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
var check = setInterval(checksession,20000);

			
			function checksession()
			 { 
			 
	if(navigator.onLine)
	{		
		request2 = createRequest();
if (request2== null) {
alert("Unable to create request");
return;
}
else
{
	
var url= "checksessajax.php";
var requestData2 = "mock_id=" +
escape(mock_id) ;
request2.open("POST",url,true);

request2.onreadystatechange = function displayDetails2() {
if (request2.readyState == 4) {
if (request2.status == 200) {	
if(request2.responseText == '')
{
	clearInterval(check);  
     alert("Session has expired.Please start again ");
	 if(popupWindow1 && !popupWindow1.closed)
	 {
	   popupWindow1.close() ;
	 }
	 window.open('','_parent','');
	  window.close();
	
}
else
{
	
}
}
}
}
request2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request2.send(requestData2);
}
			 }
			/* else if(!navigator.onLine)
			 {
				 alert("No internet connection closing the Test window")
				window.open('','_parent','');
				 window.close();
			 } */
 }

//Update time to database
var timerupdate = setInterval(updatetime,10000)
function updatetime()
{
if(navigator.onLine)
{
request9 = createRequest();
if (request9 == null) {
alert("Unable to create request");
return;
}
else
{
var timesec = parseInt(hour1)*3600 + parseInt(minutes1)*60 + parseInt(remsecond1) ;	
var url= "updatetimeajax.php";
var requestData9 = "timesec=" +
escape(timesec) + "&mock_id=" +
escape(mock_id) ;
request9.open("POST",url,true);
request9.onreadystatechange = function displayDetails9() {
	
if (request9.readyState == 4) {
if (request9.status == 200) {

}
}
}
request9.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request9.send(requestData9);
}
	}

}
	
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
	clearTimeout(timer);
	document.getElementById("totalcont").style.display = "none";
	document.getElementById("hides").style.display = "none";
	document.getElementById("hides1").style.display = "none";
	document.getElementById("feedform").style.display = "block";
// $("#dialog1").dialog("open");

 //finsubmit = setTimeout(finalsubmit , 1000) ;	

}

// finally submit the test to the server 

function finalsubmit()
{
	
//$("#dialog1").dialog("close");
if(navigator.onLine)
{
	if($("input:radio[name='levels']").is(":checked") && $("input:radio[name='testint']").is(":checked") && $("input:radio[name='testexp']").is(":checked"))
	{
		var levels = $('input[name="levels"]:checked').val();
		var testint = $('input[name="testint"]:checked').val();
		var testexp = $('input[name="testexp"]:checked').val();
		var cmmnts = document.getElementById("comments").value ;
request10 = createRequest();
if (request10 == null) {
alert("Unable to create request");
return;
}
else
{
flag2 = true;	
var url= "finalsubmitajax.php"; 
var requestData10 = "mock_id=" +
escape(mock_id) + "&levels="+ levels + "&testint="+ testint + "&testexp="+ testexp + "&comments="+ cmmnts + "&insert1=" + escape(insert1) + '&arr=' + JSON.stringify(arresponse) + '&arr1=' + JSON.stringify(statuses) + '&arr2=' + JSON.stringify(resptime)+ '&arr3=' + JSON.stringify(tita_arresponse)+ '&arr4=' + JSON.stringify(test);
request10.open("POST",url,true);
document.getElementById("totalcont").style.display = "none";
document.getElementById("hides").style.display = "block";
document.getElementById("hides1").style.display = "none";
document.getElementById("feedform").style.display = "none";

request10.onreadystatechange = function displayDetails10() {
	//alert(request10.responseText)
if (request10.readyState == 4) {
if (request10.status == 200) {

if(popupWindow1 && !popupWindow1.closed)
	 {
	   popupWindow1.close() ;
	 }
	 	
var texts = request10.responseText ;
//alert(texts)
popupWindow2 = window.open("finalattempt.php?id="+ texts +"&value="+ insert1 + "&mock_id="+ mock_id,'_self','width='+w+',height='+h+',toolbar=no,menubar=no,resizable=no,directories=no,location=no');

}
}
}
request10.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request10.send(requestData10);
}
 }
else{
document.getElementById("feedmsg").innerHTML = "Please Select the options before submitting the test"
	}
}
else if(!navigator.onLine)
{
	alert("No Internet Connection.You need active internet connection before submitting the Test")
}
}
window.onfocus = function()
{
	if(flag1 == false && flag2 == false )
	{
		if(navigator.onLine)
		{
	request12 = createRequest();
if (request12 == null) {
alert("Unable to create request");
return;
}
else
{
		
var url= "onfocusajax.php";
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
	flag1 = false;
	flag2 = false;
	}
	else
	{
		flag1 = false ;
		flag2 = false;
	}
	
}
window.onblur =  function()
{
	
if(flag1 == false && flag2 == false )
	{
		if(objbrowserName == "Chrome" )
			{
//alert("Warning! Don't leave the Test window otherwise you may be disqualified" )
			}
		if(navigator.onLine)
		{
		request11 = createRequest();
if (request11 == null) {
alert("Unable to create request");
return;
}
else
{
		
var url= "onblurajax.php";
var requestData11 = "mock_id=" +
escape(mock_id) + "&user_id=" + escape(user_id) ;
request11.open("POST",url,true);
request11.onreadystatechange = function displayDetails11() {

if (request11.readyState == 4) {
if (request11.status == 200) {
	


}
}
}
request11.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request11.send(requestData11);
}
}
	}
} 
var updateresp = setInterval(updateresptime,4000);
// update Response time frequently
function updateresptime()
{
	if(navigator.onLine)
	{
request30 = createRequest();
if (request30 == null) {
alert("Unable to create request");
return;
}
else
{
		
var url= "updateresptimeajax.php";
var requestData30 = "mock_id=" + escape(mock_id)  + "&count=" + escape(count) +"&resptime="+ escape(resptime[parseInt(count) - 1]);
request30.open("POST",url,true);
request30.onreadystatechange = function displayDetails30() {
if (request30.readyState == 4) {
if (request30.status == 200) {
}
}
}
request30.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request30.send(requestData30);
}
}
}
// Changing either in english or hindi 

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

function openquestion()
{
	closeques1();
	
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
function slidetogs(x)
{
{
	document.getElementById("cover").style.width = "100%";
	document.getElementById("coversmall").style.width = "0%";
	document.getElementById("coversmall").style.display = "none";
	document.getElementById("slidetog").style.display = "none";
	document.getElementById("slidetog1").style.display = "block"
	}
	if(x == 2)
{

	document.getElementById("cover").style.width = "81%";
	document.getElementById("coversmall").style.width = "19%";
	document.getElementById("coversmall").style.display = "block";
document.getElementById("slidetog").style.display = "block";
	document.getElementById("slidetog1").style.display = "none"	
}
}
