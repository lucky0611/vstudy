<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("'. $msg .'");</script>';
};

include('connect.php');

$id = $_GET['id'];
$sql = "SELECT passage FROM passagelist WHERE pass_id = '$id'";
$sql1 = "SELECT * FROM questiondata WHERE pass_id = '$id'";
$result = mysqli_query($con,$sql);
$result1 = mysqli_query($con,$sql1);
$store = array();
$store1 = array();
while ($row=mysqli_fetch_array($result)){
	array_push($store,$row);
	}
	
while ($row=mysqli_fetch_array($result1)){
	array_push($store1,$row);
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
function displaye(a){
	document.getElementById(a).style.display = 'block';

	


<?php for($i = 0; $i < count($store1); $i++){ ?>


if($('input[name="options'+'<?=$i?>'+'"]:checked').length == 0){
var x = 'kok';}
else{
	var x = document.querySelector('input[name="options'+'<?=$i?>'+'"]:checked').value;
	
};

if(x == '<?=$store1[$i]['ans']?>'){
	
	document.getElementById('done' + '<?=$store1[$i]['ans']?>' + '<?=$i?>').style.display = 'inline';
}
else if (x == 'kok'){
	document.getElementById('done' + '<?=$store1[$i]['ans']?>' + '<?=$i?>').style.display = 'inline';
	
}
else{
	document.getElementById('done' + '<?=$store1[$i]['ans']?>' + '<?=$i?>').style.display = 'inline';
	document.getElementById('clear' + x + '<?=$i?>').style.display = 'inline';
};

<?php } ?>
	
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

<!-- Always shows a header, even in smaller screens. -->
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
  
  <div class="mdl-cell mdl-cell--12-col" align="center">
  <?php
  for($i = count($store); $i > 0; $i--)
			{
				?>
				<h3></h3>
				
				
				
				
				

				
				
				
				
				
				
				
				
				
				
				
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
    <h2 class="mdl-card__title-text">Quiz # <?php echo $id;?></h2>
  </div>
  <div class="mdl-card__supporting-text" style="text-align:left">
    <?php echo $store[$i-1]['passage'];?>
  </div>
  <div id="q" class="mdl-card__actions mdl-card--border">
    <div class="mdl-card__supporting-text" style="text-align:left">
    
	<?php 
	
	for($j = 0; $j < count($store1); $j++)
			{
				$c = $j + (int)"1";
					
				?>
				
				<table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--1dp" style="width:100%">
  <tbody>
  
    <tr>
	<td class="mdl-data-table" colspan="3" style ="text-align:left">
	<p><b>Q</b><?php echo $c;?>&nbsp;:&nbsp;<?php echo $store1[$j]['question'];?></p>
	</td>
	
	</tr>
	<tr>
	<td class="mdl-data-table__cell--non-numeric" >
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1<?php echo $j; ?>">
	  <input type="radio" id="option-1<?php echo $j; ?>" class="mdl-radio__button" name="options<?php echo $j; ?>" value="A">
	  </label>
	  </td>
      <td class="mdl-data-table__cell--non-numeric" style ="text-align:left"><?php echo $store1[$j]['one'];?></td>
      <td class="mdl-data-table__cell--non-numeric" style ="text-align:left">
	  <i class="material-icons" style="display:none;color:green" id="doneA<?php echo $j; ?>" >done</i>
  <i class="material-icons" style="display:none;color:red" id="clearA<?php echo $j; ?>">clear</i>
	  </td>
      
    </tr>
    <tr>
      <td class="mdl-data-table__cell--non-numeric">
	  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2<?php echo $j; ?>">
	  <input type="radio" id="option-2<?php echo $j; ?>" class="mdl-radio__button" name="options<?php echo $j; ?>" value="B">
	  </label>
	  </td>
      <td class="mdl-data-table__cell--non-numeric"style ="text-align:left"><?php echo $store1[$j]['two'];?></td>
      <td class="mdl-data-table__cell--non-numeric"style ="text-align:left">
	  <i class="material-icons" style="display:none;color:green" id="doneB<?php echo $j; ?>" >done</i>
  <i class="material-icons" style="display:none;color:red" id="clearB<?php echo $j; ?>">clear</i>
	  </td>
      
    </tr>
    <tr>
	<td class="mdl-data-table__cell--non-numeric">
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3<?php echo $j; ?>">
	  <input type="radio" id="option-3<?php echo $j; ?>" class="mdl-radio__button" name="options<?php echo $j; ?>" value="C">
	  </label>
	  </td>
      <td class="mdl-data-table__cell--non-numeric"style ="text-align:left"><?php echo $store1[$j]['three'];?></td>
      <td class="mdl-data-table__cell--non-numeric"style ="text-align:left">
	  <i class="material-icons" style="display:none;color:green" id="doneC<?php echo $j; ?>">done</i>
  <i class="material-icons" style="display:none;color:red" id="clearC<?php echo $j; ?>">clear</i>
	  </td>
    
    </tr>
	<tr>
	<td class="mdl-data-table__cell--non-numeric">
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4<?php echo $j; ?>">
	  <input type="radio" id="option-4<?php echo $j; ?>" class="mdl-radio__button" name="options<?php echo $j; ?>" value="D">
	  </label>
	  </td>
      <td class="mdl-data-table__cell--non-numeric"style ="text-align:left"><?php echo $store1[$j]['four'];?></td>
      <td class="mdl-data-table__cell--non-numeric"style ="text-align:left">
	  <i class="material-icons" style="display:none;color:green" id="doneD<?php echo $j; ?>">done</i>
  <i class="material-icons" style="display:none;color:red" id="clearD<?php echo $j; ?>">clear</i>
	  </td>
    
    </tr>
  </tbody>
</table>
				
				<?php
				
				
				
			
			
			}

			?>
  </div>
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" onclick="displaye('ed')">
  SUBMIT
</button>
  </div>
  
  <div id="ed" class="mdl-card__actions mdl-card--border" style="display:none">
    <div class="mdl-card__supporting-text" style="text-align:left">
    EXPLANATION<hr>
	<?php 
	
	for($j = 0; $j < count($store1); $j++)
			{
				$c = $j + (int)"1";
					
				echo '<p><b>A</b>'.$c.'&nbsp;:&nbsp;<b>('.$store1[$j]['ans'].')</b></p>';
				echo '<p style="font-size:18px">'.$store1[$j]['exp'].'</p>';
				
				
				
			
			
			}

			?>
	</div>
	</div>
  <div class="mdl-card__menu">
     <span class="" data-href="https://quiz.php?id=<?php echo $id?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fquiz.php%3Fid%3D<?php echo $id;?>&amp;src=sdkpreparse"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="#ffffff" d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
</svg><span style="color:white;font-size:12px"><b>Share</b></span></a></span>
  
  </div>
</div>
				
				
				<?php
			}
  
  ?>
  
  
  <br /><br />
  <div id="disqus_thread" class="mdl-cell mdl-cell--12-col"></div>
<script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://vstudy.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//vstudy.disqus.com/count.js" async></script> 
  
  
  
  </div>
  
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