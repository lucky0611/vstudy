<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("'. $msg .'");</script>';
};

include('connect.php');
$date = $_GET['date'];
$sql = "SELECT * FROM passagelist WHERE date = '$date'";

$result = mysqli_query($con,$sql);

$store = array();

while ($row=mysqli_fetch_array($result)){
	array_push($store,$row);
	}
	
	
?>

<!DOCTYPE html>
<html>
<head>

		<title>Quiz Input</title>
		
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		
		
		<script src="js/jquery-1.12.1.min.js"></script>
		
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script>
function displayq(a,b){
	document.getElementById(a).style.display = 'block';
	document.getElementById(b).style.display = 'none';
}
function ddd(z){
	var y = document.getElementById(z).value;
	
	document.location = 'datefilter.php?date=' + y;
	
}

</script>
</head>
<body>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<style>
.passg{
 margin:20px;
 overflow: hidden;
 text-overflow: ellipsis;
 display: -webkit-box;
 -webkit-line-clamp: 1;
 -webkit-box-orient: vertical;
}
</style>


<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      
      <span class="mdl-layout-title">DAILY QUIZ</span>
      
      <div class="mdl-layout-spacer"></div>
      
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Title</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
	
	
	
	
	
	<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--4-col">
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="date" name="date" id="sampl">
   
  </div>
  
  <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" name="subm" onclick="ddd('sampl')">
  <b><i class="material-icons">arrow_forward</i></b>
</button>
 
  </div>
  <div class="mdl-cell mdl-cell--4-col"></div>
  <div class="mdl-cell mdl-cell--4-col"></div>
  <div class="mdl-cell mdl-cell--12-col" align="center">
  <?php
  if(count($store)==0){
	  ?>
	  <p style="margin-top:100px">Content unavailable for the date selected, Kindly select another date.</p>
	  <?php
  }
  for($i = count($store); $i > 0; $i--)
			{
				?>
			
				
				
<style>
.demo-card-square.mdl-card {
  width: 600px;
  
}
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:
    url('../assets/demos/dog.png') bottom right 15% no-repeat #448AFF;
}
</style>

<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Quiz # <?php echo $store[$i-1]['pass_id'];?></h2>
  </div>
  <div class="mdl-card__supporting-text passg" style="text-align:left">
    <?php echo $store[$i-1]['passage'];?>
  </div>
  <div id="q<?php echo $store[$i-1]['pass_id'];?>" class="mdl-card__actions mdl-card--border" style="display:none">
    
  </div>
  
  <div class="mdl-card__actions mdl-card--border" id="v<?php echo $store[$i-1]['pass_id'];?>" >
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="quiz.php?id=<?php echo $store[$i-1]['pass_id'];?>">
      VIEW QUIZ
    </a>
  </div>
  <div class="mdl-card__menu">
    <span class="" data-href="https://quiz.php?id=<?php echo $store[$i-1]['pass_id'];?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fquiz.php%3Fid%3D<?php echo $store[$i-1]['pass_id'];?>&amp;src=sdkpreparse"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="#ffffff" d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
</svg><span style="color:white;font-size:12px"><b>Share</b></span></a></span>
  
  </div>
</div>
<br />
				
				
				<?php
			}
  
  ?>
  
  <br />
 
  
</div>
	
	
	
	
	
	
	
	</div>
  </main>
</div>

<br />
<br />
<br />
<br />
<br />



</body>
</html>