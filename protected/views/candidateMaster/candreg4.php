<body oncontextmenu="return false;">
     <div class="Container" style="min-height:472px;"> 
<div class="candidate_test1" >
    <p>You will now be taken to the exam module where you can take the test and will be monitored via webcam.</p>
</div>

 <div align="center">   <?php

//echo CHtml::SubmitButton('Proceed',array('class'=>'create1','submit'=>array('/CandidateMaster/TakeTest')));
echo CHtml::SubmitButton('No',array('class'=>'create1','onclick'=>'javascript:window.close();window.opener.close();','style'=>'float:none'));
 echo CHtml::SubmitButton('Proceed',array('class'=>'create1','onclick'=>'checkurl()','style'=>'float:none'));

?></div>
     </div>
</body>

<script type="text/javascript" >
    function checkurl()
    {

         window.location.href='<?php echo Yii::app()->request->baseUrl;?>/Cand_Test';
        
        refreshParent()

        
    }
    function refreshParent()
    {
   //window.opener.location.href ='http://ii-me.com';
        window.opener.close();
    }
   </script>