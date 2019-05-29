
<div style="float:left;position:relative;width:150px;">
<input id="ans<?php echo $j ?>" class="ans" type="text" value="" style="float:left;position:relative;margin-top:12px;margin-bottom:12px">
</input>
<div id="back"  style="background-color:#f4f4f4;width:150px;height:300px;float:left;position:relative">
<div id="backspace<?php echo $j ?>"  onclick="lessone('backspace<?php echo $j ?>')"  style="cursor:pointer;border-radius:10px;border: 1px solid black;width:120px;height:25px;float:left;position:relative;margin-left:14px;margin-top:12px" class="backspace">
<p style="text-align:justify;margin-top:2px;margin-left:25px">Backspace</p>
</div>
<div  id="7<?php echo $j ?>" class="seven" onClick="update('7<?php echo $j ?>')" value="7" style="cursor:pointer;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:30px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">7</p>
</div>
<div id="8<?php echo $j ?>" class="eight" onClick="update('8<?php echo $j ?>')" style="cursor:pointer;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:5px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">8</p>
</div>
<div id="9<?php echo $j ?>" class="nine" onClick="update('9<?php echo $j ?>')" style="cursor:pointer;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:5px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">9</p>
</div>
<div id="4<?php echo $j ?>" class="four" onClick="update('4<?php echo $j ?>')" style="cursor:pointer;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:30px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">4</p>
</div>
<div id="5<?php echo $j ?>" class="five"onclick="update('5<?php echo $j ?>')" style="cursor:pointer;border-radius:10px ;border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:5px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">5</p>
</div>

<div id="6<?php echo $j ?>" class="six" onClick="update('6<?php echo $j ?>')" style="cursor:pointer;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:5px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">6</p>
</div>
<div id="1<?php echo $j ?>" class="one" onClick="update('1<?php echo $j ?>')" style="cursor:pointer;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:30px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">1</p>
</div>
<div id="2<?php echo $j ?>" class="two" onClick="update('2<?php echo $j ?>')" style="cursor:pointer;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:5px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">2</p>
</div>
<div id="3<?php echo $j ?>" class="three" onClick="update('3<?php echo $j ?>')" style="cursor:pointer;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:5px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">3</p>
</div>
<div id="0<?php echo $j ?>" class="zero" onClick="update('0<?php echo $j ?>')" style="cursor:pointer;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:30px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">0</p>
</div>
<div id=".<?php echo $j ?>" class="dot" disabled="True" onClick="update('.<?php echo $j ?>')" style="cursor:pointer;border-top-left-radius:20px;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:5px;margin-top:5px">
<p style="text-align:justify;margin-top:2px;margin-left:12px"><b>.</b></p>
</div>
<div id="-<?php echo $j ?>" class="minus" onClick="update('-<?php echo $j ?>')" style="cursor:pointer;border-radius:10px; border:1px solid black; width:25px;height:30px;float:left;position:relative;margin-left:5px;margin-top:5px">
<p style="text-align:justify;margin-top:8px;margin-left:12px">-</p>
</div>
<div class="la" id="la<?php echo $j ?>" onClick="toleft(this)" style="cursor:pointer;background-image:url(ra.png);background-repeat:no-repeat;background-position:5px 5px;background-size:25px 20px;border:1px solid black; width:40px;height:30px;float:left;position:relative;margin-left:30px;margin-top:5px;border-radius: 10px"></div>
<div class="ra" id="ra<?php echo $j ?>" onClick="toright(this)"  style="cursor:pointer;background-image:url(la.png);background-repeat:no-repeat;background-position:10px 5px;background-size:25px 20px; border:1px solid black; width:40px;height:30px;float:left;position:relative;margin-left:8px;margin-top:5px;border-radius:10px">
</div>
<div class="clears" id="clear<?php echo $j ?>"  onclick="lessone('clear<?php echo $j ?>')" style="cursor:pointer;border: 1px solid black;width:104px;height:25px;float:left;position:relative;margin-left:22px;margin-top:12px;border-radius: 10px">
<p style="text-align:justify;margin-top:2px;margin-left:25px">Clear all</p>
</div>
</div>
</div>
