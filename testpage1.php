<?php
include_once 'mysql.php';
	session_start();
	$time_left = intval($_SESSION["time_left"]) - time();


?>
<html>
	<head>
		<title>Test Page</title>
        <script>

		var time_x = <?php echo"$time_left "; ?>;
		function update_timer(){

			var hour = 0;
			var mins = 0;
			var sec = 0;
			var temp_time = time_x;

			hour = Math.floor(temp_time/3600);
			temp_time = temp_time - 3600*hour;

			mins = Math.floor(temp_time/60);
			temp_time = temp_time - 60*mins;

			sec = temp_time;

			var time_in_min = " "+hour.toString()+" : "+mins.toString()+" : "+sec.toString()+" ";

			document.getElementById("show_time").innerHTML = time_in_min;
			time_x = time_x - 1;

		}

		</script>
	</head>

	
	<body>
    
		<p id = "show_time" style = "z-index: 100;position:absolute;top:95px ;left:1200px;font-weight:bold">  </p>
	<p style="position:absolute;top:95px;left:1115px;"> Time Left:</p>
	<script>
		update_timer();
		var y = setInterval(function(){ update_timer() },1000);

	</script>
		
   
  <div id="logo" style="width:1355px;height:80px;background-color:#3778BD">
   <p><img class = "logo" src ="logo3.jpg" style="padding: 5px;float: left;" alt="logo" /></p><br /><br /><br />
   
   </div>


 

<?php

	
$noquestion_temp = intval($_SESSION["noquestion"]);	$question_no = intval($_SESSION["current_question"]);
	if($question_no-1==intval($_SESSION["noquestion"]))
	{
		$question_no = 1;
		$_SESSION["current_question"] = 1;
	}

	$_SESSION["yes_seen"]["$question_no"] = 1;
	$mock_id_temp = $_SESSION["mock_id"];
?>
<div id="decorate" style="width:1355px;height:60px;background-color:#E4EDF7">
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a>
				Question <?php echo"$question_no of $noquestion_temp
	 "; ?>
			</a>
</div>

	<div id ="questionbox" style="width:1000px;float:left;padding:15px;margin:10px;" >
    
			<a>
				Q <?php echo"$question_no
	 "; ?>
			</a>

	&nbsp;&nbsp;
			
			<?php 
				$query = "select * from $mock_id_temp where sno = $question_no";
				$res = mysqli_query($connection,$query) or die("Could not fetch the question");
				
				$row = mysqli_fetch_array($res);
				extract($row);
				echo "$question<br />";
			?>
<br />

	  <form method = 'post' action = 'inter_test.php'>
				<input type = 'radio' name = 'answer_selected' value = '1' <?php 
								if(intval($_SESSION["yes_answered"]["$question_no"])== 1) echo "checked";
								?> > <?php echo"$C1";?> <br />
				<input type = 'radio' name = 'answer_selected' value = '2' <?php 
								if(intval($_SESSION["yes_answered"]["$question_no"])==2) echo "checked";
								?> > <?php echo"$C2";?> <br />
				<input type = 'radio' name = 'answer_selected' value = '3' <?php 
								if(intval($_SESSION["yes_answered"]["$question_no"])==3) echo "checked";
								?> > <?php echo"$C3";?> <br />
				<input type = 'radio' name = 'answer_selected' value = '4' <?php 
								if(intval($_SESSION["yes_answered"]["$question_no"])==4) echo "checked";
								?> > <?php echo"$C4";?> <br /> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type = 'submit' name = 'answered' value = '  Save & Next  ' STYLE=" font-weight: bold; color: white; height: 2.2em; background-color: #3778BD;position: absolute; top: 555px; ;">
	 	<input type = 'submit' name = 'marked' value = '   Marked for Review & Next  '  STYLE=" font-weight: bold; color: black; height: 2.2em; background-color: #C7DCF0;position: absolute; top: 555px; left: 30px ;">

     
      </form>
            
            <div style="width: 100px; position: absolute; top: 555px; left: 300px;">
			<form method = 'post' action = 'inter_test.php'>
			
			  <input type = 'hidden' name = 'reset_hidden' value = '1'>
              
                <input type = 'submit' name = 'reset_button' value = ' Clear Response 'STYLE=" font-weight: bold; color: black; height: 2.2em; background-color: #C7DCF0" >
            </form>
            

		</div>



		
         <img src="symbol5.jpg" style="position:absolute;left:1050px;top:452px" alt="symbol" />
			<div id ="sidebar" style="width: 240px;height:300px;background-color:#E4EDF7;overflow:scroll;overflow-y:sc7roll;overflow-x:hidden; position:absolute;left:1050px;top:155px">
           
				
			
            
           
				<?php 
				echo '<br />';

					$i = 1;
					//here noquestion variable signifies the number of question for the selected mock_id
					$noquestion_temp = intval($_SESSION["noquestion"]);
					$self_page = $_SERVER["PHP_SELF"];
					for($i=1;$i<=$noquestion_temp;$i++)
					{
						
						if(intval($_SESSION["yes_marked"]["$i"])!=0)
						{
							echo"
									
										<a href = 'inter_test.php?from_button=yes&question_no=$i'style='text-decoration:none;color:white'><span style='padding:15px;color:white;margin-top:15px; margin-bottom:15px;background:url(m7.jpg) no-repeat '>$i &nbsp;&nbsp;</span></a>
									
								";
						}

						
						
						else
						if(intval($_SESSION["yes_answered"]["$i"])!=0)
						{
							echo"
									
										<a href = 'inter_test.php?from_button=yes&question_no=$i'style='text-decoration:none;color:white'><span style='padding:15px;color:white;margin-top:15px; margin-bottom:15px;background:url(s6.jpg) no-repeat '>$i &nbsp;&nbsp;</span></a>
									
								";
						}

						else if(intval($_SESSION["yes_seen"]["$i"])==1)
						{
							echo" 
									<a href = 'inter_test.php?from_button=yes&question_no=$i'style='text-decoration:none;color:white'><span style='padding:15px;margin-top: 15px;margin-bottom:15px;background:url(ns6.jpg) no-repeat'>$i &nbsp;&nbsp;</span></a>
								";
						}

						else 
						{
							echo" 
								<a href = 'inter_test.php?from_button=yes&question_no=$i'style='text-decoration:none;color:black'><span style='padding:15px;margin-top:15px;margin-bottom:15px;background:url(ks6.jpg) no-repeat'>$i &nbsp;&nbsp;</span></a>
								";
						}
						
					

						if($i%4==0)
						{
							echo'<br /><br />';
						}
					}
					?>
	
     </div>:
    
    
    <img src="foot8.png" alt="footer" style="position:absolute;left:6px ;top:605px">

	</body>

</html>

 

