<div class="row">

<div class="col-xs-12">
<p style="text-align:center;font-size:22px;color:grey">Overall Remarks</p>
</div>

</div>
<div class="col-xs-row">
<div class="col-xs-12">
<br />
<?php
$scorecount = 0 ;
$scorecount1 = 0;
$coatt = 0;
$coatt1 = 0;
for($i=0;$i<count($rank);$i++)
{
$scorecount = $scorecount + $rank[$i]['score'] ;
$coatt = $coatt + $rank[$i]['attempt'] ;	
}
$avscore = round(($scorecount/count($rank)),2);
$marksscored = $marksgained - $markslost ;
$att1 = (($totattempt)/$totques )*100 ;
if($totattempt != 0)
{
$corr1 = (($corattempt/$totattempt))*100 ;
}
else if($totattempt == 0)
{
	$corr1 = 0;
}
?>
<ul >

<?php
if($marksscored > $avscore)
{
	?>
     <li style="color:#3c663d;width:98%;background-color:#Dff0d8;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Performance is above the Average Level. You have scored more marks than the Average Performer.</span></li>
    <br />
    <?php
}
if($marksscored == $avscore)
{
	?>
  <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Marks is same as the Marks of Average Performer.</span></li>
    <br />
    <?php
}
if($marksscored < $avscore)
{
	?>
    <li style="color:#A94464;width:98%;background-color:#F2DEDE;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Performance is Below the Average Level. You have scored Less marks than the Average Performer.</span></li>
    <br />
    <?php
}
if($att1 >= 70 )
{
	if($corr1 >= 70)
	{
		?>
    <li style="color:#3c663d;width:98%;background-color:#Dff0d8;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Attempts & Accuracy are Both Excellent.</span></li>
    <br />
    <?php
	}
	if($corr1 < 70 && $corr1 >= 50)
	{
		?>
     <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Attempts are Excellent and Accuracy is also good.You need to improve your accuracy.</span></li>
    <br />
    <?php
	}
	if($corr1 < 50 )
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Attempts are Excellent but Accuracy is poor. It Seems either your concepts are not clear or you are guessing the answers.</span></li>
    <br />
    <?php
	}
}
if($att1< 70 && $att1 >= 50 )
{
	if($corr1 >= 70)
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your attempts are good and Accuracy is Excellent.You need to cover the remaining topics in order to increase your Attempts.</span></li>
    <br />
    <?php
	}
	if($corr1 < 70 && $corr1 >= 50)
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Attempts and Accuracy are good.But you need to improve your Accuracy and Attempts both.</span></li>
    <br />
    <?php
	}
	if($corr1 < 50 )
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Attempts are good but accuracy is poor. It Seems either your concepts are not clear or you are guessing the answers. Also you need to increase your Attempts in order to perform well .</span></li>
    <br />
    <?php
	}
}
if($att1< 50  )
{
	if($corr1 >= 70)
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Attempts are poor but Accuracy is Excellent.You need to cover the remaining topics in order to increase your Attempts.</span></li>
    <br />
    <?php
	}
	if($corr1 < 70 && $corr1 >= 50)
	{
		?>
<li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Attempts are poor but Accuracy is good.You need to improve your Accuracy and study the left topics in order to perform well.</span></li>
    <br />
    <?php
	}
	if($corr1 < 50 )
	{
		?>
    <li style="color:#A94464;width:98%;background-color:#F2DEDE;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Attempts and Accuracy are poor. You need to work very hard to perform well.</span></li>
    <br />
    <?php
	}
}
if($tita_tot != 0)
{
	$tita_attper = round(($tita_att/$tita_tot)*100 ,1); 
	if($tita_att == 0)
	{
	$accu_tita  = 0;
	}
	if($tita_att != 0)
	{
	$accu_tita  = round(($tita_corr/$tita_att)*100 ,1);
	}
	if($notita_att == 0)
	{
	$accu_notita  = 0;
	}
	if($notita_att != 0)
	{
	$accu_notita  = round(($notita_corr/$notita_att)*100 ,1);
	}
	if($accu_notita >$accu_tita)
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Accuracy in Multiple Choice question is more than accuracy in TITA type.</span> </li>
    <br />
    <?php
	}
	if($accu_notita < $accu_tita)
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Accuracy in Multiple Choice question is less than accuracy in TITA type. </span></li>
    <br />
    <?php
	}
	if($accu_tita < 50 && $tita_attper >=70)
	{
		?>
    <li style="color:#A94464;width:98%;background-color:#F2DEDE;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">You are attempting TITA type question mostly by guess work or are unclear with your basics . Your attempts are Excellent but accuracy is very poor. You should  focus on accuracy.</span></li>
    <br />
    <?php
	}
	if($accu_tita < 50 && $tita_attper <50 && $tita_att >8)
	{
		?>
    <li style="color:#A94464;width:98%;background-color:#F2DEDE;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">Your Attempts and Accuracy both in TITA type questions is very low. Either you should focus more on multiple choice question or get tight hold on basics to solve TITA type questions.</span> </li>
    <br />
    <?php
	}
	if($accu_tita < 50 && $tita_attper >=50 && $tita_attper <70)
	{
		?>
    <li style="color:#A94464;width:98%;background-color:#F2DEDE;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">You should focus on both Accuracy and Attempts both in TITA Type questions. Both are not upto the mark.</span></li>
    <br />
    <?php
	}
}


?>
</ul>
</div>
<div class="col-xs-12">
<br />
<p style="text-align:center;font-size:22px;color:grey">Sectional Remarks</p>
</div>
<div class="col-xs-12">
<br />

<?php
for($j = 1 ;$j<=$num_sec;$j++)
{
	$scorecount1 = 0 ;
	$coatt1 = 0;
	for($i=0;$i<count($rank);$i++)
	{
		
	$scorecount1 = $scorecount1 + $seccompresult1[$j - 1][$i]['score'] ;
$coatt1 = $coatt1 +  $seccompresult1[$j - 1][$i]['attempt'] ;	
	}
	?>
	
<?php
	$avscore1 = round(($scorecount1/count($rank)),2);
$att1 = (($attemptsum[$j - 1])/$numquesstore[$j - 1] )*100 ;
$corr1 = (($datarray[$j - 1][0]/$numquesstore[$j - 1]))*100 ;
$marks1 = ($datarray[$j - 1][0])*$row5['correct_marks'] -  ($attemptsum[$j - 1] - $datarray[$j - 1][0])*$row5['incorrect_marks'] ;
?>
<p style="text-align:center;color:black;font-size:18px">Section <?php echo $j ; ?> - <?php echo $secname[$j -1 ] ?></p>
<br />
<ul>
<?php
if($marks1 > $avscore1)
{
	?>
    <li style="color:#3c663d;width:98%;background-color:#Dff0d8;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this Section your Performance is above the Average Level. You have scored more marks than the Average Performer.</span></li>
    <br />
    <?php
}
if($marks1 == $avscore1)
{
	?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this section your Marks is same as the Marks of Average Performer.</span></li>
    <br />
    <?php
}
if($marks1 < $avscore1)
{
	?>
    <li style="color:#A94464;width:98%;background-color:#F2DEDE;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this section your Performance is Below the Average Level. You have scored Less marks than the Average Performer.</span></li>
    <br />
    <?php
}
if($att1 >= 70 )
{
	if($corr1 >= 70)
	{
		?>
    <li style="color:#3c663d;width:98%;background-color:#Dff0d8;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this Section your Attempts & Accuracy are Both Excellent.</span></li>
    <br />
    <?php
	}
	if($corr1 < 70 && $corr1 >= 50)
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this Section your Attempts are Excellent and Accuracy is also good.You need to improve your accuracy.</span></li>
    <br />
    <?php
	}
	if($corr1 < 50 )
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this Section your Attempts are Excellent but Accuracy is poor.It Seems either your concepts are not clear or you are guessing the answers.</span></li>
    <br />
    <?php
	}
}
if($att1< 70 && $att1 >= 50 )
{
	if($corr1 >= 70)
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this Section your attempts are good and Accuracy is Excellent.You need to cover the remaining topics in order to increase your Attempts.</span></li>
    <br />
    <?php
	}
	if($corr1 < 70 && $corr1 >= 50)
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this Section your Attempts and Accuracy are good.You need to improve your Accuracy and Attempts both.</span></li>
    <br />
    <?php
	}
	if($corr1 < 50 )
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this Section your Attempts are good but accuracy is poor.It Seems either your concepts are not clear or you are guessing the answers. Also you need to increase your Attempts in order to perform well.</span> </li>
    <br />
    <?php
	}
}
if($att1< 50  )
{
	if($corr1 >= 70)
	{
		?>
    <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this Section your Attempts are poor but Accuracy is Excellent.You need to cover the remaining topics in order to increase your Attempts.</span></li>
    <br />
    <?php
	}
	if($corr1 < 70 && $corr1 >= 50)
	{
		?>
   <li style="color:#31708F;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this Section your Attempts are poor but Accuracy is good.You need to improve your Accuracy and study the left topics in order to perform well.</span></li>
    <br />
    <?php
	}
	if($corr1 < 50 )
	{
		?>
    <li style="color:#A94464;width:98%;background-color:#F2DEDE;font-weight:bolder;border:1px dotted #BCE8F1;border-radius:5px;margin-left:5p"><span style="margin-left:10px">In this Section your Attempts and Accuracy are poor. You need to work very hard to perform well. </span></li>
    <br />
    <?php
	}
}
echo "</ul>" ;
}
?>

</div>
</div>