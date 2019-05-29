# mdl
Flexible modal, confirm &amp; prompt jquery plugin.
Demo : http://hello-interactiv.com/utils/mdl/index.html

## Install 
```html
<link rel="stylesheet" href="dist/mdl.css" >
<script src="demo/libs/jquery.min.js"></script>
<script src="dist/mdl-min.js"></script>
```

## Simple modal - Config by js
```html
<a class="mdl-btn" id="bt1" data-target="#modal1" >
modal by js
</a>
<div class="mdl" id="modal1">
	<div class="mdl-container">

			
			<h2 >carruchis solito altioribus</h2>
			<p>Alii summum decus in carruchis solito altioribus et ambitioso vestium cultu ponentes sudant sub ponderibus lacernarum, quas in collis insertas cingulis ipsis adnectunt nimia subtegminum tenuitate perflabiles, expandentes eas crebris agitationibus maximeque sinistra, ut longiores fimbriae tunicaeque perspicue luceant varietate liciorum effigiatae in species animalium multiformes.
			
			Auxerunt haec vulgi sordidioris audaciam, quod cum ingravesceret penuria commeatuum, famis et furoris inpulsu Eubuli cuiusdam inter suos clari domum ambitiosam ignibus subditis inflammavit rectoremque ut sibi iudicio imperiali addictum calcibus incessens et pugnis conculcans seminecem laniatu miserando discerpsit. post cuius lacrimosum interitum in unius exitio quisque imaginem periculi sui considerans documento recenti similia formidabat.
			
			Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>
	</div>
</div>
```

```javascript
$('#bt1').mdl({
	type: 'modal',
	fullscreen:false,
	overlayClick:true
});
```

##Config by datas attributes
```html
<a class="mdl-btn btns-modal" data-type="modal" data-target="#modal2" data-fullscreen="true" data-overlayClick="true" >
Simple modal fullscreen - Config by datas
</a>
<div class="mdl" id="modal2">
	<div class="mdl-container">

			
			<h2 >carruchis solito altioribus</h2>
			<p>Alii summum decus in carruchis solito altioribus et ambitioso vestium cultu ponentes sudant sub ponderibus lacernarum, quas in collis insertas cingulis ipsis adnectunt nimia subtegminum tenuitate perflabiles, expandentes eas crebris agitationibus maximeque sinistra, ut longiores fimbriae tunicaeque perspicue luceant varietate liciorum effigiatae in species animalium multiformes.
			
			Auxerunt haec vulgi sordidioris audaciam, quod cum ingravesceret penuria commeatuum, famis et furoris inpulsu Eubuli cuiusdam inter suos clari domum ambitiosam ignibus subditis inflammavit rectoremque ut sibi iudicio imperiali addictum calcibus incessens et pugnis conculcans seminecem laniatu miserando discerpsit. post cuius lacrimosum interitum in unius exitio quisque imaginem periculi sui considerans documento recenti similia formidabat.
			
			Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>
	</div>
</div>
```

```javascript
$('.btns-modal').mdl();
```



## Confirm
```html
<a class="mdl-btn btns-confirm" data-type="confirm" data-fullscreen="false" data-overlayClick="true" >
confirm
</a>
```

```javascript
$('.btns-confirm').mdl({
	type:'confirm',
	fullscreen:false,
	overlayClick:false,
	content:"Êtes vous sûr de vouloir supprimer toutes vos données?"
}, function(result){
	alert("result:" + result);
});
```


## Prompt
```html
			
<a class="mdl-btn btns-prompt" data-type="prompt" data-fullscreen="false" data-overlayClick="true" >
Prompt
</a>
```

```javascript
$('.btns-prompt').mdl({
	type:'prompt',
	overlayClick:false,
	content:"what is the color of the white horse?"
}, function(result){
	alert("result:" + result);
});

```



##Open &  close manually
```javascript
mdl_open('#modal1');
			
setTimeout(function(){ 
	mdl_close('#modal1');
}, 2400);		
```
