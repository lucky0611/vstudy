
<script>
request1 = [] ;
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
function bookmark(x,y,z)
{
	
request1[y-1] = createRequest();
if (request1[y-1]== null)
 {
alert("Unable to create request");
return;
}
else
{	
var url= "bookmarkques.php";
var requestData = "mock_id=" +
escape(x) +"&ques_id=" +
escape(y) + "&user_id=" + escape(z) ;
request1[y-1].open("POST",url,true);
request1[y-1].onreadystatechange = function displayDetails() {
	
if (request1[y-1].readyState == 4) {
if (request1[y-1].status == 200) {
	document.getElementById("bookmar" + y).remove() ;
	texts = document.createElement("p");
document.getElementById("bookdiv"+ y).appendChild(texts)	
	texts.appendChild(document.createTextNode("Bookmarked" ))
	texts.style.fontWeight = "bold"
}	
}
}
request1[y-1].setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request1[y-1].send(requestData);
}
}
 
</script>
<?php
$stat1 = array() ;
$level_tot = array() ; 
$tita_tot = 0 ;
$notita_tot = 0 ;
?>
<div class="row">
<div class="col-xs-12">
<table class="table table-striped">
<caption>Question-wise Analysis</caption>
<tr>
<th style="text-align:center">Question No</th>
<th style="text-align:center">Question Type</th>
<th style="text-align:center">Section</th>
<th style="text-align:center">SectionName</th>
<th style="text-align:center">Level</th>
<th style="text-align:center">Status</th>
<th style="text-align:center">Verfication</th>
<th style="text-align:center">Marks Awarded</th>
<th style="text-align:center">Response Time</th>
<th style="text-align:center">View Question</th>
</tr>
<?php

$sql15 = "SELECT * FROM $table2 WHERE mock_id='$mock_id'";
$result15 = mysqli_query($con,$sql15);
$k = 0 ;
$secs_id = 1 ;
$corr_ques = "" ;
$rowsd = array();
while($rowcount = mysqli_fetch_array($result15))
{
	array_push($rowsd ,$rowcount);
}
function sortByOrder1($a, $b)
 {
    return $a['question_id'] - $b['question_id'];
}

usort($rowsd, 'sortByOrder1');
sort($rowsd);
 foreach($rowsd as $row15)
 {
	$level_tot[$row15['question_id'] -1] = $row15['level_id']; 
	if($row15['level_id'] == 1)
	{
		$level = "Easy" ;
	}
	if($row15['level_id'] == 2)
	{
		$level = "Moderate" ;
	}
	if($row15['level_id'] == 3)
	{
		$level = "Difficult" ;
	}
	if($secs_id != $row15['section_id']) 
	{
		$secs_id = $row15['section_id'];
		$k++ ;
	}
	for($i = 0;$i<count($quesid_arr);$i++)
	{
		
		if($row15['question_id'] == $quesid_arr[$i])
		{
			$corchoice = $cor_choice[$i] ;
			$resp_time = round($time_arr[$i],2) ;
		$corr_ques = $cor_arr[$i] ;
		$stat1[$row15['question_id']] = $ques_type[$i] ;
		break ;	
		}
		else
		{
			$corchoice = "" ;
			$resp_time = 0 ;
			$corr_ques = "" ;
			$stat1[$row15['question_id']] = "Not Visited" ;
		}
	}
?>
<tr>
<td style="text-align:center"><?php echo $row15['question_id']  ?></td>
<?php
if($row15['tita'] == 0)
{	
$notita_tot++ ;
	?>
    <td style="text-align:center">Multiple Choice Type</td>
    <?php
}
if($row15['tita'] == 1)
{
	$tita_tot++ ;
	?>
    <td style="text-align:center">TITA Type</td>
    <?php
}
?>
<td style="text-align:center">Section<?php echo $row15['section_id']  ?></td>
<td style="text-align:center"><?php echo $secname[$k]  ?></td>
<td style="text-align:center"><?php echo $level  ?></td>
<td style="text-align:center"><?php echo $stat1[$row15['question_id']]  ?></td>
<td style="text-align:center">
<?php  
if($corr_ques == "Correct")
{
?>
&nbsp;&nbsp;&nbsp;<img src="tick.png" style="height:20px;width:20px" />
<?php
}
if($corr_ques == "Incorrect")
{
?>
&nbsp;&nbsp;&nbsp;<img src="cross.png" style="height:20px;width:20px" />
<?php
}
if($corr_ques == "")
{
?>
&nbsp;&nbsp;&nbsp;<img src="quesmark.png" style="height:20px;width:20px" />
<?php
}
 ?>
</td>
<?php
if($corr_ques == "Correct")
{
	$marks1 = $row5['correct_marks'] ;
}
if($corr_ques == "Incorrect")
{
	$marks1 = "-".$row5['incorrect_marks'] ;
}
if($corr_ques == "")
{
	$marks1 = 0 ;
}
?>
<td style="text-align:center"><?php echo $marks1 ;  ?></td>
<td style="text-align:center"><?php echo $resp_time."&nbsp;"."Min" ;  ?></td>
<td style="margin:auto">
<div class="col-xs-3">
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" style="font-size:14px" data-target="#myModal<?php echo $row15['question_id'] ?>" >View Question&nbsp;&nbsp;<i class="fa fa-question"></i></button>
</div>
<!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $row15['question_id'] ?>" role="dialog">
    <div class="modal-dialog">
    
<div class="modal-content">
        <div class="modal-header" style="background-color:#337Ab7;">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <h2 class="modal-title" style="color:white;text-align:center">Question <?php echo $row15['question_id'] ?> </h2>
        </div>
       
        <div class="modal-body">
        
        <?php
		if($row15['passage'] != "")
		{
			?>
            <div class="col-xs-12"  style="overflow-y:auto;overflow-x:hidden;height:250px">
            <?php
		echo htmlspecialchars_decode(nl2br($row15['passage'])) ;
       ?>
        </div>
        <?php 
		}
		
		if($row15['passage'] == "")
		{
		
		if($row15['imagefile'] != "" && $row15['imagefile'] != "")
		{
		?>
        <div class="col-xs-12"  style="overflow-y:auto;overflow-x:hidden;height:250px">
        <img src="http://www.vstudy.in/test/images/<?php echo $row15['imagefile'] ?>" style="width:100%;" alt="image" />
        </div>
        <?php
		}
		}
		
		?>
		<div class="row">
        <br />
		<div class="col-xs-8">
		<p >Topic Name: <?php echo "<b>".$row15['topic']."</b>" ?></p>
		</div>
        <div class="col-xs-1">
        </div>
        <div class="col-xs-3" id="bookdiv<?php echo $row15['question_id']; ?>">
        <?php 
		$ques_id = $row15['question_id'];
		$que = "SELECT * FROM bookmark_question WHERE mock_id='$mock_id'AND question_id='$ques_id'AND user_id='$user_id'";
		$res = mysqli_query($con,$que);
		if(mysqli_num_rows($res) == 0)
		{
		?>
        <button id="bookmar<?php echo $ques_id ; ?>" onclick="bookmark(<?php echo $mock_id ; ?>,<?php echo $row15['question_id'] ; ?>,<?php echo $user_id ; ?>)" class="btn btn-success"> Bookmark</button>
        <?php
		}
		else if(mysqli_num_rows($res) == 1)
		{
		echo "<b>Bookmarked</b>" ;
		}
		?>
        </div>
        
		</div>
        <div class="row">
        <br /><br />
        <div class="col-xs-1" id="ques<?php echo $row15['question_id'] ?>" style="height:20px">
        </div>
        <div class="col-xs-11" >
        <?php
		echo "<p>"."Q."."&nbsp;" .htmlspecialchars_decode(nl2br($row15['question']))."</p>"."<br />";
		
		?>
        </div>
        </div>
		
        <?php
		if($row15['tita'] == 0)
		{
			?>
            <div class="row">
            <div class="col-xs-1"  id="img1<?php echo $row15['question_id'] ?>" style="height:20px;">
            </div>
            <div class="col-xs-11">
             <p>A &nbsp;<?php echo htmlspecialchars_decode(nl2br($row15["Option1"])) ; ?></p>
           </div>
            </div>
             <div class="row">
            <div class="col-xs-1" id="img2<?php echo $row15['question_id'] ?>" style="height:20px;"> 
            </div>
            <div class="col-xs-11" > 
           <p>B &nbsp;<?php echo htmlspecialchars_decode(nl2br($row15["Option2"])) ; ?></p>
           </div>
            </div>
           <div class="row">
            <div class="col-xs-1" id="img3<?php echo $row15['question_id'] ?>" style="height:20px;">
            </div>
            <div class="col-xs-11" > 
           <p>C &nbsp;<?php echo htmlspecialchars_decode(nl2br($row15["Option3"])) ; ?></p>
           </div>
            </div>
           <div class="row">
            <div class="col-xs-1"  id="img4<?php echo $row15['question_id'] ?>" style="height:20px;">
            </div>
            <div class="col-xs-11">
           <p>D &nbsp;<?php echo htmlspecialchars_decode(nl2br($row15["Option4"])) ; ?></p>
           </div>
            </div>
            <?php
			if($row5['num_option'] == 5)
			{
				?>
                <div class="row">
                <div class="col-xs-1"  id="img5<?php echo $row15['question_id'] ?>" style="height:20px;">
            </div>
            <div class="col-xs-11">
           <p>E &nbsp;<?php echo htmlspecialchars_decode(nl2br($row15["Option5"])) ; ?></p>
           </div>
            </div>
                <?php
			}
			?>
		
            <?php
			if($corr_ques == "Correct" || $corr_ques == "" )
			{
				if($corr_ques == "")
				{
					?>
                    <script>
					document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundImage = "url(quesmark.png)";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundSize = "20px 20px";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundPosition = "right top";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundRepeat = "no-repeat";
					</script>
                    <?php
				}
				if($corr_ques == "Correct")
				{
					?>
                    <script>
					document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundImage = "url(tick.png)";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundSize = "20px 20px";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundPosition = "right top";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundRepeat = "no-repeat";
					</script>
                    <?php
				}
			?>
            <script>
			document.getElementById("img<?php echo $row15['Correct_choice'].$row15['question_id'] ?>").style.backgroundImage = "url(tick.png)";
			document.getElementById("img<?php echo $row15['Correct_choice'].$row15['question_id'] ?>").style.backgroundSize = "20px 20px";
			document.getElementById("img<?php echo $row15['Correct_choice'].$row15['question_id'] ?>").style.backgroundPosition = "right top";
			document.getElementById("img<?php echo $row15['Correct_choice'].$row15['question_id'] ?>").style.backgroundRepeat = "no-repeat";
			</script> 
            <?php
		}
		if($corr_ques == "Incorrect")
			{
			?>
            <script>
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundImage = "url(cross.png)";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundSize = "20px 20px";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundPosition = "right top";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundRepeat = "no-repeat";
			document.getElementById("img<?php echo $row15['Correct_choice'].$row15['question_id'] ?>").style.backgroundImage = "url(tick.png)";
			document.getElementById("img<?php echo $row15['Correct_choice'].$row15['question_id'] ?>").style.backgroundSize = "20px 20px";
			document.getElementById("img<?php echo $row15['Correct_choice'].$row15['question_id'] ?>").style.backgroundPosition = "right top";
			document.getElementById("img<?php echo $row15['Correct_choice'].$row15['question_id'] ?>").style.backgroundRepeat = "no-repeat";
			document.getElementById("img<?php echo $corchoice.$row15['question_id'] ?>").style.backgroundImage = "url(cross.png)";
			document.getElementById("img<?php echo $corchoice.$row15['question_id'] ?>").style.backgroundSize = "20px 20px";
			document.getElementById("img<?php echo $corchoice.$row15['question_id'] ?>").style.backgroundPosition = "right top";
			document.getElementById("img<?php echo $corchoice.$row15['question_id'] ?>").style.backgroundRepeat = "no-repeat";
			</script> 
            <?php
		}
		}
		if($row15['tita'] == 1)
		{
			?>
            <div class="row">
            <div class="col-xs-1"  id="tita<?php echo $row15['question_id'] ?>" style="height:20px;">
            </div>
            <div class="col-xs-11">
             <p><b>Correct Choice : </b> &nbsp;<?php echo nl2br($row15["tita_correct"]) ; ?></p>
           </div>
            </div>
             <div class="row">
            <div class="col-xs-1"  id="tita1<?php echo $row15['question_id'] ?>" style="height:20px;">
            </div>
            <div class="col-xs-11">
             <p><b>Marked Choice : </b> &nbsp;<span id="tita2<?php echo $row15['question_id'] ?>"><?php echo $corchoice; ?></span></p>
           </div>
            </div>
       
            <?php
			if($corr_ques == "Correct")
				{
					?>
                    <script>
document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundImage = "url(tick.png)";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundSize = "20px 20px";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundPosition = "right top";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundRepeat = "no-repeat";
					
					</script>
                    <?php
				}
				if($corr_ques == "Incorrect")
				{
					?>
                    <script>
	document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundImage = "url(cross.png)";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundSize = "20px 20px";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundPosition = "right top";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundRepeat = "no-repeat";
					
					</script>
                    <?php
				}
				if($corr_ques == "")
				{
					?>
                    <script>
	document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundImage = "url(quesmark.png)";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundSize = "20px 20px";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundPosition = "right top";
			document.getElementById("ques<?php echo $row15['question_id'] ?>").style.backgroundRepeat = "no-repeat";
					
					</script>
		
        <?php
				}
		}
		?>
         </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</td>
<?php
}
?>
</tr>
</table>
</div>
</div>