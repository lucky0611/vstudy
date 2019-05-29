<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>
$(function() {
     $( "#sampl" ).datepicker({ dateFormat: 'yy-mm-dd'}); 
});
</script>

<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("'. $msg .'");</script>';
};

include('connect.php');
$sql = "SELECT * FROM passagelist ORDER BY pass_id DESC LIMIT 7";

$result = mysqli_query($con,$sql);

$store = array();

while ($row=mysqli_fetch_array($result)){
	array_push($store,$row);
	}
	

	
	
?>

		<title>Quiz Input</title>
		
	

<style>

.passg{
 margin:20px;
 overflow: hidden;
 text-overflow: ellipsis;
 display: -webkit-box;
 -webkit-line-clamp: 1;
 -webkit-box-orient: vertical;
	 display: -moz-box;
	 -moz-line-clamp: 1;
	 -moz-box-orient: vertical;
	
}

</style>


	<div class="mdl-grid">
	 <div class="mdl-cell mdl-cell--4-col">
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="date" id="sampl" placeholder= "Select Date">
   
  </div>
  
  <button rel="canonical"  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" name="subm"  onclick="ddd('sampl')">
  <b><i class="material-icons">arrow_forward</i></b>
</button>
  
  

  </div>
  </div>



	<div class="mdl-grid"  >
	
 

  <div class="mdl-cell mdl-cell--12-col" id="postList" align="center" >
  <br />
	
  <?php
  $z=1;
  for($i = 0; $i < count($store); $i++)
			{
				?>
				<h3></h3>
				
				
				
				
				

				
				
				
				
				
				
				
				
				
	<div class="mdl-grid">
 <div class="mdl-cell mdl-cell--3-col" align="center">
</div> 
  <div class="mdl-cell mdl-cell--6-col" align="center" >			
				
				<style>
.demo-card-square.mdl-card {
  width: 600px;
 height:270px
  
}
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:
    url('') bottom right 15% no-repeat #3f51b5;
}
</style>

<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand" >
    <h2 class="mdl-card__title-text">Quiz # <?php echo $z;?></h2>
  </div>
  <div class="mdl-card__supporting-text passg" style="text-align:left">
    <?php echo $store[$i]['passage'];?>
  </div>
  <div id="q<?php echo $store[$i]['pass_id'];?>" class="mdl-card__actions mdl-card--border" style="display:none">
    
  </div>
  
  <div class="mdl-card__actions mdl-card--border" id="v<?php echo $store[$i]['pass_id'];?>" >
    <a class="mdl-button  mdl-js-button mdl-js-ripple-effect" rel="canonical" style="color:grey" href="quiz.php?id=<?php echo $store[$i]['pass_id'];?>&quiz_id=<?php echo $z ;?>">
      VIEW QUIZ
    </a>
  </div>
  <div class="mdl-card__menu">
    


      
    <span class="" data-href="http://www.vstudy.in/onlinetest/quiz.php?id=<?php echo $store[$i]['pass_id'];?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.vstudy.in%2Fonlinetest%2Fquiz.php%3Fid%3D<?php echo $store[$i]['pass_id'];?>%26quiz_id%3D<?php echo $z ;?>&amp;src=sdkpreparse"><svg style="width:24px;height:24px;" viewBox="0 0 24 24">
    <path fill="#ffffff" d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
</svg><span style="color:white;font-size:12px"><b>Share</b></span></a></span>
  </div>
</div>
</div>
   <div class="mdl-cell mdl-cell--3-col" align="center">
</div>
</div>
<br /><br />
				
				<?php
			$z++;	
			}
  $postID = end($store)['pass_id'];
  ?>
  <div class="load-more" lastID ="<?php echo $postID; ?>" style="display:none">
				<br /><br />
                <img src="loading.gif"/>
            </div>
				
  
  </div>
  
</div>
	

<br />
<br />
<br />
<br />
<br />
<script>
//alert($("#headheight").height())
var flagsa = true ; 

	$("#scrollpage").scroll(function(){
		var lastID = $('.load-more').attr('lastID');

	if(flagsa == true )
	{
		
		z = lastID ;
	}
		
		if(flagsa == false)
		{
        if (z != lastID )
		{
			flagsa1 = true ;
		}
		 if (z == lastID )
		{
			flagsa1 = false ;
		}
		}
		if(flagsa == true)
		{
        if (z == lastID )
		{
			flagsa1 = true ;
		}
		 if (z != lastID )
		{
			flagsa1 = false ;
		}
		}
		if(flagsa1 == true)
		{
		flagsa = false ;
		var a = $("#scrollpage").height() + $("#scrollpage").scrollTop() + $("#headheight").height() - $(window).height()    ;
		//console.log($("#scrollpage").height())	
		//console.log($(window).height())	
		//console.log($(document).height())	
		//console.log(a)	
		//console.log($("#scrollpage").scrollTop())
		//console.log($(document).scrollTop())
		if (($("#scrollpage").scrollTop()) == a && lastID != 0){
			 z = lastID
			$.ajax({
				type:'POST',
				
				url:'getData.php',
				data:'id='+lastID,
				beforeSend:function(html){
					$('.load-more').show();
				},
				success:function(html){
					$('.load-more').remove();
					$('#postList').append(html);
				}
			});
		}
		}
	});




function displayq(a,b){
	document.getElementById(a).style.display = 'block';
	document.getElementById(b).style.display = 'none';
}
function ddd(z){
	var y = document.getElementById(z).value;

	document.location = 'datefilter.php?date=' + y;
	
}



</script>
