<div class="row">
<br />
<p style="font-size:22px;color:grey;text-align:center">Sectional Comparison with Toppers</p>
</div>
<?php
function sortByOrder2($a, $b)
 {
    return $b['score'] - $a['score'];
}
$seccompresult1 = array( array( array()));

for($j = 1 ;$j<=$num_sec;$j++)
{
	$flag_user_sec = false ;
	
    $seccompresult = array( array());
	for($i=0;$i<count($rank);$i++)
	{
		$seccores = 0;
$seccores1 = 0 ;
		$u_id = $rank[$i]["user_id"];
		$sql40 = "SELECT * FROM $table5 WHERE user_id='$u_id' AND mock_id='$mock_id' AND subjectsection_id = '$j'";
		$result40 = mysqli_query($con,$sql40);
		if(mysqli_num_rows($result40) >0)
		{
		while($row40 = mysqli_fetch_array($result40))
		{
			$ques_id = $row40['question_id'] ;
			if($row40['tita'] == 0)
			{
				if($row40['response'] >0 && $row40['status'] >= 3)
				{
					$seccores++ ;
					
					$sql41 = "SELECT * FROM $table2 WHERE  mock_id = '$mock_id' AND question_id='$ques_id'";
					$result41 = mysqli_query($con,$sql41);
					$row41 = mysqli_fetch_array($result41);
					
					if($row41['Correct_choice'] == $row40['response'])
					{
						$seccores1++ ; 
					}
				}
			}
			else if($row40['tita'] == 1)
			{
				if($row40['tita_score'] !== 0 && $row40['status'] >= 3)
				{
					$seccores++ ;
					$sql41 = "SELECT * FROM $table2 WHERE  mock_id = '$mock_id' AND question_id='$ques_id'";
					$result41 = mysqli_query($con,$sql41);
					$row41 = mysqli_fetch_array($result41);
					
					if($row41['tita_correct'] == $row40['tita_score'])
					{
						$seccores1++ ; 
					}
				}
			}
		}
		}
	$seccompresult[$i]['attempt'] = $seccores ;
	$seccompresult1[$j - 1][$i]['attempt'] = $seccores ;
	$seccompresult[$i]['correct'] = $seccores1 ;
	$seccompresult1[$j - 1][$i]['correct'] = $seccores1 ;
	$seccompresult[$i]['user_id'] = $u_id ;
	$seccompresult1[$j -1][$i]['user_id'] = $u_id ;
	?>
    
    <?php
$seccompresult1[$j-1][$i]['score'] =	$seccompresult[$i]['score'] = $seccompresult[$i]['correct']*$row5['correct_marks'] -($seccompresult[$i]['attempt'] - $seccompresult[$i]['correct'])*$row5['incorrect_marks'] ;
?>
<?php
	}
usort($seccompresult, function ($i, $j) {
    $a = $i['score'];
    $b = $j['score'];
    if ($a == $b) return 0;
    elseif ($a < $b) return 1;
    else return -1;
});

//usort($seccompresult, 'sortByOrder2');
 //rsort($seccompresult);
 for($m=0;$m<count($seccompresult);$m++)
 {
	 
	 if($user_id == $seccompresult[$m]['user_id'])
	 {
		 $ranksecured_sec = $m + 1 ;
	 }
 }
?>

<div class="row">
<div class="col-xs-12">

    <br /><br />
    <p style="text-align:center;color:black;font-size:18px">Section <?php echo $j ; ?> - <?php echo $secname[$j -1 ] ?></p>
    
    <br />
<table class="table table-striped">
<tr>
<th style="text-align:center">Student's Name</th>
<th style="text-align:center">Rank</th>
<th style="text-align:center">Total Questions</th>
<th style="text-align:center">Attempted</th>
 <th style="text-align:center">Unattempted</th>
<th style="text-align:center">Correct</th>
<th style="text-align:center">Incorrect</th>
 <th style="text-align:center">Marks obtained</th>
 <th style="text-align:center">Accuracy %</th>
</tr>
<?php
 $avgsecscores = 0 ;
for($i=0;$i<count($seccompresult);$i++)
{
	$avgsecscores = $avgsecscores + $seccompresult[$i]['correct']*$row5['correct_marks'] -($seccompresult[$i]['attempt'] - $seccompresult[$i]['correct'])*$row5['incorrect_marks'] ;
	if($i <= 4)
	{
	
	$users_id =$seccompresult[$i]['user_id'] ;
$sqls ="SELECT * FROM user_details WHERE user_id='$users_id'";
$results = mysqli_query($con,$sqls);
$rows = mysqli_fetch_array($results);
$firstn = strtoupper($rows['firstname']);
$lastn = strtoupper($rows['lastname']);
?>
<tr>
<td style="text-align:center"><?php echo $firstn."&nbsp;".$lastn ;
if($user_id == $users_id)
{
	$flag_user_sec = true ;
	?>
   <span>(</span><span style="color:green">You</span><span>)</span>
    <?php
}
 ?></td>
<td style="text-align:center"><?php echo $i + 1 ; ?></td>
<td style="text-align:center"><?php echo $numquesstore[$j-1]; ?></td>
<td style="text-align:center"><?php echo $seccompresult[$i]['attempt'] ; ?></td>
<td style="text-align:center"><?php echo $numquesstore[$j-1] -  $seccompresult[$i]['attempt'] ; ?></td>
<td style="text-align:center"><?php echo $seccompresult[$i]['correct'] ; ?></td>
<td style="text-align:center"><?php echo $seccompresult[$i]['attempt'] - $seccompresult[$i]['correct'] ; ?></td>
<td style="text-align:center"><?php echo $seccompresult[$i]['correct']*$row5['correct_marks'] -($seccompresult[$i]['attempt'] - $seccompresult[$i]['correct'])*$row5['incorrect_marks'] ; ?></td>
<?php
if($seccompresult[$i]['attempt'] != 0)
{
	$accu = round(($seccompresult[$i]['correct']/$seccompresult[$i]['attempt'])*100,2);
}
if($seccompresult[$i]['attempt'] == 0)
{
	$accu = 0 ;
}
?>
<td style="text-align:center"><?php echo $accu."&nbsp;"."%"; ?></td>
</tr>
<?php
	}
}
if($flag_user_sec == false)
{
?>
<tr>
<td style="text-align:center"><?php echo strtoupper($_SESSION['firstname'])."&nbsp;".strtoupper($_SESSION['lastname']) ;

	?>
   <span>(</span><span style="color:red">You</span><span>)</span>
    <?php

 ?></td>
<td style="text-align:center"><?php echo $ranksecured_sec ; ?></td>
<td style="text-align:center"><?php echo $numquesstore[$j-1] ; ?></td>
<td style="text-align:center"><?php echo $attemptsum[$j - 1] ; ?></td>
<td style="text-align:center"><?php echo $numquesstore[$j-1] - $attemptsum[$j - 1]; ?></td>
<td style="text-align:center"><?php echo $datarray[$j - 1][0] ; ?></td>
<td style="text-align:center"><?php echo $attemptsum[$j - 1] - $datarray[$j - 1][0]; ?></td>
<td style="text-align:center"><?php echo ($datarray[$j - 1][0])*$row5['correct_marks'] -  ($attemptsum[$j - 1] - $datarray[$j - 1][0])*$row5['incorrect_marks'] ; ?></td>
<?php
if($totattempt != 0)
{
	$accu = round(($corattempt/$totattempt)*100,2);
}
if($totattempt == 0)
{
	$accu = 0 ;
}
?>
<td style="text-align:center"><?php echo $accu."&nbsp;"."%"; ?></td>
</tr>
<?php
}
?>
</table>
</div>
</div>
<div class="row">
<br /><br />
<div class="col-xs-5">
</div>
<div class="col-xs-3 well" style="height:40px;">
<p style="text-align:center;font-size:18px;margin-top:-15px">Average Score = <span style="color:#1472cc;font-weight:bold"><?php echo round(($avgsecscores/count($rank)),2) ?></span></p> 
</div>
</div>
<?php
}
?>
<div class="row">
<br /><br />
</div>