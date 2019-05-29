<div class="row">
<br />
<p style="text-align:center;color:grey;font-size:22px">Question Wise Comparison of Candidate's Performance with Average Performance </p>
<br />
</div>
<div class="row">
<div class="col-xs-12">
<table class="table table-striped">
<tr>
      <th style="text-align:center">Subject</th>
      <th style="text-align:center">Topics & Attempt Summary</th>
     
      </tr>
<?php
for($i=0;$i<count($subarray);$i++)
{
	?>
 
 
      <tr>
    <td style="text-align:center"><?php echo $subarray[$i]; ?></td>
    <td style="text-align:center"><?php 
	?>
    <table class="table table-striped">
    <tr>
    <th style="text-align:center">Topic</th>
    <th style="text-align:center">Question Wise Details</th>
    </tr>
    <?php
	for($z=0;$z<count($topicsubarr[$i]);$z++ )
	{
		?>
        <tr>
        <td style="text-align:center"><?php echo $topicsubarr[$i][$z] ?></td>
        <td style="text-align:center">
        <table class="table table-striped">
        <th style="text-align:center">Question No.</th>
        <th style="text-align:center">Level</th>
        <th style="text-align:center">View Question</th>
        <th style="text-align:center">Status</th>
        <th style="text-align:center">Verification</th>
        <th style="text-align:center">Avg Attempt %</th>
        <th style="text-align:center">Avg Accuracy %</th>
        <th style="text-align:center">Your Time</th>
        <th style="text-align:center">Avg Time</th>
         <th style="text-align:center">Topper's Time</th>
        <?php
		$topics = $topicsubarr[$i][$z] ;
		$sql50 = "SELECT * FROM $table2 WHERE mock_id='$mock_id' AND subject_id='$subarray1[$i]' AND topic = '$topics' ORDER BY question_id ASC";
		$result50 = mysqli_query($con,$sql50);
		while($row50 = mysqli_fetch_array($result50))
		{
			?>
            <tr>
            <td style="text-align:center"><?php echo $row50['question_id'] ?></td>
            <td style="text-align:center"><?php 
			if( $row50['level_id'] == 1)
			{
				echo "Easy" ;
			}
			if( $row50['level_id'] == 2)
			{
				echo "Moderate" ;
			}
         if( $row50['level_id'] == 3)
			{
				echo "Difficult" ;
			}

			 ?></td>
           
            <?php
			$ques_id = $row50['question_id'] ;
			$sql51= "SELECT * FROM $table5 WHERE mock_id='$mock_id' AND question_id='$ques_id' AND user_id='$user_id'";
			$result51 = mysqli_query($con,$sql51);
			$text = "Unattempted";
			$img = "quesmark.png";
			$respos = 0 ;
			if(mysqli_num_rows($result51) == 1)
			{
				$row51 = mysqli_fetch_array($result51);
				$respos = round(($row51['response_time']/60),2) ;
				
				if($row51['tita']== 0)
				{
					if($row51['response'] > 0 && $row51['status'] >= 3)
					{
						
						if($row50['Correct_choice'] == $row51['response'])
			{
				$img = "tick.gif";
			}
				if($row50['Correct_choice'] != $row51['response'])
			{
				$img = "cross.png" ;
			}
						$text = "Attempted" ;
					}
					
				}
				if($row51['tita']== 1)
				{
					if($row51['tita_score'] !== 0 && $row51['status'] >= 3)
					{
						if($row50['tita_correct'] == $row51['tita_score'])
			{
				$img = "tick.gif" ;
			}
				if($row50['tita_correct'] != $row51['tita_score'])
			{
				$img = "cross.png" ;
			}
						$text = "Attempted" ;
					}
				}
			}
			
			
			?>
            <td style="text-align:center"><button class="btn btn-primary" data-toggle="modal" style="font-size:14px" data-target="#myques<?php echo $row50['question_id'] ?>" >View</button></td>
            <!-- Modal -->
  <div class="modal fade" id="myques<?php echo $row50['question_id'] ?>" role="dialog">
    <div class="modal-dialog">
    
<div class="modal-content">
        <div class="modal-header" style="background-color:#337Ab7">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <h2 class="modal-title" style="color:white;text-align:center">Question <?php echo $row50['question_id'] ?> </h2>
        </div>
       
        <div class="modal-body" align="left">
        
        <?php
		if($row50['passage'] != "")
		{
			?>
            <div class="col-xs-12"  style="overflow-y:auto;overflow-x:hidden;height:250px">
            <?php
		echo htmlspecialchars_decode(nl2br($row50['passage'])) ;
       ?>
        </div>
        <?php 
		}
		
		if($row50['passage'] == "")
		{
		
		if($row50['imagefile'] != "" && $row50['imagefile'] != "")
		{
		?>
        <div class="col-xs-12"  style="overflow-y:auto;overflow-x:hidden;height:250px">
        <img src="../images/<?php echo $row50['imagefile'] ?>" style="width:100%;" alt="image" />
        </div>
        <?php
		}
		}
		
		?>
        <div class="row">
        <br /><br />
        <div class="col-xs-1" id="ques<?php echo $row50['question_id'] ?>" style="height:20px">
        </div>
        <div class="col-xs-11" >
        <?php
		echo "<p>"."Q."."&nbsp;" .htmlspecialchars_decode(nl2br($row50['question']))."</p>"."<br />";
		
		?>
        </div>
        </div>
		
        <?php
		if($row50['tita'] == 0)
		{
			?>
            <div class="row">
            <div class="col-xs-1"  id="img1<?php echo $row50['question_id'] ?>" style="height:20px;">
            </div>
            <div class="col-xs-11">
             <p>A &nbsp;<?php echo htmlspecialchars_decode(nl2br($row50["Option1"])) ; ?></p>
           </div>
            </div>
             <div class="row">
            <div class="col-xs-1" id="img2<?php echo $row50['question_id'] ?>" style="height:20px;"> 
            </div>
            <div class="col-xs-11" > 
           <p>B &nbsp;<?php echo htmlspecialchars_decode(nl2br($row50["Option2"])) ; ?></p>
           </div>
            </div>
           <div class="row">
            <div class="col-xs-1" id="img3<?php echo $row50['question_id'] ?>" style="height:20px;">
            </div>
            <div class="col-xs-11" > 
           <p>C &nbsp;<?php echo htmlspecialchars_decode(nl2br($row50["Option3"])) ; ?></p>
           </div>
            </div>
           <div class="row">
            <div class="col-xs-1"  id="img4<?php echo $row50['question_id'] ?>" style="height:20px;">
            </div>
            <div class="col-xs-11">
           <p>D &nbsp;<?php echo htmlspecialchars_decode(nl2br($row50["Option4"])) ; ?></p>
           </div>
            </div>
            <?php
			if($row5['num_option'] == 5)
			{
				?>
                <div class="row">
                <div class="col-xs-1"  id="img5<?php echo $row50['question_id'] ?>" style="height:20px;">
            </div>
            <div class="col-xs-11">
           <p>E &nbsp;<?php echo htmlspecialchars_decode(nl2br($row50["Option5"])) ; ?></p>
           </div>
            </div>
                <?php
			}
			?>
		
            <?php
		}
		?>
         </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
            <td style="text-align:center"><?php echo $text ?></td>
            <td style="text-align:center"><img src="<?php echo $img ; ?>" alt="Status" style="width:20px;height:20px">
             </td>
             <?php
			 $comattempt = 0 ;
			 $accumeasure = 0;
			 $respos1 =0 ;
			 
			 $count = 0 ;
			 for($p=0;$p<count($rank);$p++)
	{
		
		$users_id = $rank[$p]['user_id'] ;
		$sql52 = "SELECT * FROM $table5 WHERE mock_id='$mock_id' AND question_id='$ques_id' AND user_id='$users_id'";
			$result52 = mysqli_query($con,$sql52);
			
			if(mysqli_num_rows($result52) == 1)
			{
				$row52 = mysqli_fetch_array($result52);
				$respos1 = $respos1 + $row52['response_time'] ;
				
				if($row52['tita']== 0)
				{
					if($row52['response'] > 0 && $row52['status'] >= 3)
					{
						if($row50['Correct_choice'] == $row52['response'])
						{
							$accumeasure++ ;
						}
						$comattempt++ ;
					}
					
				}
				if($row52['tita']== 1)
				{
					if($row52['tita_score'] !== 0 && $row52['status'] >= 3)
					{
						if($row50['tita_correct'] == $row52['tita_score'])
			{
				$accumeasure++ ;
			}
						$comattempt++ ;
					}
				}
				$count++ ;
			}
	}
	$perattempt = round(($comattempt/count($rank))*100 ,2);
	if($comattempt != 0)
	{
	$peraccucomp = round(($accumeasure/$comattempt)*100 ,2);
	}
	if($comattempt == 0)
	{
		$peraccucomp = 0;
	}
	if($count != 0)
	{
	$avgrespos = round((($respos1/$count)/60) ,2);
	}
	if($count == 0)
	{
		$avgrespos = 0;
	}
			 ?>
             <td style="text-align:center"><?php echo $perattempt."&nbsp;"."%" ; ?></td>
             <td style="text-align:center"><?php echo $peraccucomp."&nbsp;"."%" ; ?></td>
             <td style="text-align:center"><?php echo $respos."&nbsp;"."Min" ; ?></td>
             <td style="text-align:center"><?php echo $avgrespos."&nbsp;"."Min" ; ?></td>
             <?php
			 $usertop = $rank[0]['user_id'];
             $sql54 = "SELECT * FROM $table5 WHERE mock_id='$mock_id' AND question_id='$ques_id' AND user_id='$usertop'";
			$result54 = mysqli_query($con,$sql54);
			$row54 = mysqli_fetch_array($result54);
			?>
             <td style="text-align:center"><?php echo round(($row54['response_time']/60) ,2)."&nbsp;"."Min" ; ?></td>
            </tr>
            <?php
		}
		?>
        </table>
        </td>
        </tr>
        <?php
	}
	 ?>
     </table>
     </td>  
      </tr>
 
    <?php
}
?>
</table>
</div>
</div>