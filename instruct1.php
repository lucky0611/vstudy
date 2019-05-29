
<p class="blacktext">This question paper contains<?php echo $ques1 ; ?> questions which are divided into <?php echo $num_sec ; ?> Sections </p>
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
<p class="blacktext">Each question has only one correct answer to it.
</p>