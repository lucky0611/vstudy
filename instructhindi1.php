<p class="blacktext">प्रश्नपत्र में <?php echo $ques1 ; ?>  प्रश्न  <?php echo $num_sec ; ?> अनुभागों  में विभाजित हैं | </p>
<?php
$a =1 ;
$b = 0;
?>
<p>
<?php
foreach($newrow as $data)

{
$b = $b + $data['no_of_question'] ;
echo $data['section_number'].'&nbsp;'.'is'.'&nbsp;'.'&nbsp;'.$data['section_name'].'&nbsp;'.'(Q.No'.'&nbsp;'.$a.'&nbsp;'.'-'.'&nbsp;'.$b.'&nbsp;'.')'.'.'.'&nbsp;';
$a = $a + $data['no_of_question'] ;
}
 ?> 
 </p>
<p class="blacktext">हर प्रश्न का केवल एक ही सही उत्तर है | 
</p>