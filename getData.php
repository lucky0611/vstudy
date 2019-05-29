<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("'. $msg .'");</script>';
};

include('connect.php');

if (isset($_POST['id'])){
$lastID = $_POST['id'];


$showLimit = 2;


$sql = "SELECT COUNT(*) as num_rows FROM passagelist WHERE pass_id < ".$lastID." ORDER BY pass_id DESC";
$result1 = mysqli_query($con,$sql);

$row1=mysqli_fetch_array($result1);


$sql = "SELECT * FROM passagelist WHERE pass_id < ".$lastID." ORDER BY pass_id DESC LIMIT ".$showLimit;

$result = mysqli_query($con,$sql);
$store = array();
if($row1['num_rows'] > 0){
	
	while($row=mysqli_fetch_array($result)){
		array_push($store,$row);
		?>
		<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Quiz # <?php echo $row['pass_id'];?></h2>
  </div>
  <div class="mdl-card__supporting-text passg" style="text-align:left">
    <?php echo $row['passage'];?>
  </div>
  <div id="q<?php echo $row['pass_id'];?>" class="mdl-card__actions mdl-card--border" style="display:none">
    
  </div>
  
  <div class="mdl-card__actions mdl-card--border" id="v<?php echo $row['pass_id'];?>" >
    <a class="mdl-button  mdl-js-button mdl-js-ripple-effect" style="color:grey" href="quiz.php?id=<?php echo $row['pass_id'];?>">
      VIEW QUIZ
    </a>
  </div>
  <div class="mdl-card__menu">
    


      
    <span class="" data-href="https://quiz.php?id=<?php echo $row['pass_id'];?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fquiz.php%3Fid%3D<?php echo $row['pass_id'];?>&amp;src=sdkpreparse"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="#ffffff" d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
</svg></a></span>
  </div>
</div>
	<br />	
		
		<?php
		
	}
	
		if($row1['num_rows'] > $showLimit){
			$postID = end($store)["pass_id"];
			?>
			<div class="load-more" lastID = "<?php echo $postID; ?>" style="display: none;">
        <img src="loading.gif"/>
    </div>
			<?php
		}
		else{?>
			<div class="load-more" lastID="0">
        <hr>
    </div>
	<?php
		}
		
}
else{
	?>
	<div class="load-more" lastID="0">
        <hr>
    </div>
	<?php
}
}
?>


































