
<table><?php 


foreach($data as $dd)
{

    ?>

 <tr>
         <td><?php echo nl2br($dd->QUES_ID)?></td>
    <td><?php echo nl2br($dd->QUES_DESC)?></td>
     </tr>
<?php
}
?></table>

<?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>