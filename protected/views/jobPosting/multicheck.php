<?php

$colors = array('red','yellow','orange','black','green','blue');
$this->widget('ext.EchMultiselect.EchMultiselect', array(
    'name'=>'colors[]',
    'data'=>$colors,
    'value'=>array(0,3),
    'dropDownHtmlOptions'=> array(
        'class'=>'span-10',
        'id'=>'colors',
    ),
        'options' => array( 
        'header'=> Yii::t('EchMultiSelect.EchMultiSelect','Choose an Option!'),
        'minWidth'=>350,
        'position'=>array('my'=>'left bottom', 'at'=>'left top'),
        'filter'=>true,
    ),
));
?>