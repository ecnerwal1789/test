<body oncontextmenu="return false;">  
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Candidate_Test',      
    'action'=>'SubmitTest',
	'enableAjaxValidation'=>false,
            'enableClientValidation'=>true,
    
)); ?>   
 <?php       $i=1;     
 ?>         <div id="tabs">
            <div>
        
            <?PHP $count=count($Cand_Test);
            foreach($Cand_Test as $cand)
            {               
                        $Questions=QuestionMaster::model()->findByAttributes(array('QUES_ID'=>$cand->CAND_TEST_QUES_ID));
                        $Cand_Test=new CandidateTest;
                        echo   $i.'. '.$Questions->QUES_DESC;echo "</br>";
                        
                        //
                        
                                                   
                   

                if (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)&&($Questions->QUES_OPT_3)&&($Questions->QUES_OPT_4)&&($Questions->QUES_OPT_5)&&($Questions->QUES_OPT_6)!='') 
                {   
                   echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      "$Questions->QUES_OPT_CDE_2:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_2),
                      "$Questions->QUES_OPT_CDE_3:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_3),
                      "$Questions->QUES_OPT_CDE_4:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_4),
                      "$Questions->QUES_OPT_CDE_5:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_5),
                      "$Questions->QUES_OPT_CDE_6:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_6)				
                      ), array('separator' => '<br>'
                                   ));}
                                   
 elseif (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)&&($Questions->QUES_OPT_3)&&($Questions->QUES_OPT_4)&&($Questions->QUES_OPT_5)!='') 
                { 
      echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      "$Questions->QUES_OPT_CDE_2:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_2),
                      "$Questions->QUES_OPT_CDE_3:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_3),
                      "$Questions->QUES_OPT_CDE_4:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_4),
                      "$Questions->QUES_OPT_CDE_5:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_5),
                     				
                      ), array('separator' => '<br>'
                                   ));
 }
  elseif (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)&&($Questions->QUES_OPT_3)&&($Questions->QUES_OPT_4)!='') 
                { 
      echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      "$Questions->QUES_OPT_CDE_2:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_2),
                      "$Questions->QUES_OPT_CDE_3:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_3),
                      "$Questions->QUES_OPT_CDE_4:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_4),
                      
                     				
                      ), array('separator' => '<br>'
                                   ));
 }
  elseif (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)&&($Questions->QUES_OPT_3)!='') 
                { 
      echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      "$Questions->QUES_OPT_CDE_2:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_2),
                      "$Questions->QUES_OPT_CDE_3:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_3),
                     				
                      ), array('separator' => '<br>'
                                   ));
 }
 elseif (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)!='') 
                { 
      echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      "$Questions->QUES_OPT_CDE_2:$cand->CAND_TEST_QUES_ID" => Yii::t('dashboard', $Questions->QUES_OPT_2),
                     
                     				
                      ), array('separator' => '<br>'
                                   ));
 }
 elseif (($Questions->QUES_OPT_1)!='') 
                { 
      echo CHtml ::radioButtonList('CAND_TEST_QUES_ID'.$i,'CAND_TEST_QUES_ID'.$i, array(

                      "$Questions->QUES_OPT_CDE_1:$cand->CAND_TEST_QUES_ID"=> Yii::t('dashboard', $Questions->QUES_OPT_1),
                      				
                      ), array('separator' => '<br>'
                                   ));
 }
 if (($Questions->QUES_OPT_1)&&($Questions->QUES_OPT_2)&&($Questions->QUES_OPT_3)&&($Questions->QUES_OPT_4)&&($Questions->QUES_OPT_5)&&($Questions->QUES_OPT_6)=='') 
                {   
                  }
 
                                                
                                                
  //                                              
                        echo "</br>";
                        echo "</br>";
                        echo CHtml::hiddenField('counti',$i);
                        
            $i++;
                 
            if($i==6)
              {
                ?>
                </div>
                <div>
                <?php 
                    }
           else if($i==11)
                {?>
                </div>
                <div>
                <?php  }
            else if($i==16)
                {?>
                </div>
                <div>
                <?php  }
                }?>
                 </div>  

 </div>
 <?php $this->endWidget();
 $deleteUrl =  Yii::app()->createAbsoluteUrl('CandidateTest/SubmitTest');?>
        
        
 <script>
   $('#tabs div').first().attr('class', 'current');
			
			$('#tabs div').each(function(i) {
				i = i + 1;

				$(this).attr('id', 'tab-' + i);
				if(i !== 1) {
					$(this).append('<button class="tabPagination" rel="tab-' + (i - 1) + '">Previous</button>');
                                        $("#Next").attr('disabled',true);
				}
                                else
                                    {
                                      $(this).append('<button class="tabPagination" id="Prev" rel="tab-' + (i - 1) + '">Previous</button>');
                                      $("#Prev").attr('disabled',true);
                                    }
				if(i !== $('#tabs div').size()) {
					$(this).append('<button class="tabPagination" rel="tab-' + (i + 1) + '">Next</button>');
				}
                                else
                                    {
                                        $(this).append('<button class="tabPagination" id="Next" rel="tab-' + (i + 1) + '">Next</button>');
                                        $("#Next").attr('disabled',true);
                                        $(this).append('<button class="tabPagination" id="Submit" name="Submit" >Submit</button>');
                                    }
				
			});			

			$('#tabs div[class!="current"]').hide();
			
			$('.tabPagination').live('click', function(e) {
				$('.current').removeAttr('class');
				$('#tabs div[class!="current"]').hide();
				$('#' + $(this).attr('rel')).show();
                                e.preventDefault();
			});
                        $('#Submit').click(function()
                        {   
                            
                            document.getElementById('Candidate_Test').submit();			
                        }


          


    );

             
                            
//                            $('#Submit').trigger('SubmitTest');
//                              $.ajax({
//                                'type':'POST',
//                                'url':'CandidateTest/SubmitTest'
//                              });  
//                            alert('hi');
                              //  $(this).attr('action','SubmitTest')
                    
                            
//                            $.yii.submitForm(
//                                     this,
//                                     'candidateTest/SubmitTest',{}
//                                          );return false;});



    document.onkeydown = function (e) {
       
                    return false;
           
    }


                             
</script>      
</body>