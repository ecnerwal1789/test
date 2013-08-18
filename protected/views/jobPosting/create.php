<style>
   .select2-container-multi .select2-choices 
    {
      min-height:120px;
      width:242px;
    }
    #set
    {
        width:250px;
        height:150px;
        overflow:scroll;
    }


</style>
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/si.files.js"> </script>
 
<?php


$this->breadcrumbs=array(
	'Job Postings'=>array('index'),
	'Create',
);
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
      	'enableClientValidation'=>true,
        'action'=>CController::createUrl('JobPosting/create'),
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
        'afterValidate'=>'js:ajaxAfterValidate',
      
   
	),    'htmlOptions'=>array('enctype'=>'multipart/form-data','name'=>'form1'),
));
if((isset($a))&&(isset($b)))
{
  
$c = array_combine($b, $a);
}
$FileUrl =  Yii::app()->createAbsoluteUrl('JobPosting/upload_questions');
?>

<div class="Container4">
 
<?php  
 if((isset($_GET['err'])=='1')){ ?>
<div style="color: red; font-size:15px;">
    <td><i>File Not a readonly format...</i> </td>
</div>
<?php
}
?>
<div class="both"></div>

<!-- middle container part start here -->
 
<div>
<table width="512" border="0" cellspacing="0" cellpadding="0">
  
    <div class="requiredf"> Fields with <span class="required">*</span> are required.</div>
     <tr>
        <td height="30"></td>
      </tr>
     <tr>
        <td class="container_qp_job"  nowrap="nowrap" style="padding-left: 30px"><?php echo $form->labelEx($jobposting,'EJP_NAME'); ?></td>
         <td> <?php echo $form->textField($jobposting,'EJP_NAME',array('class'=>'textbox','maxlength'=>54)); ?>
              <?php echo $form->error($jobposting,'EJP_NAME',array('class'=>'errorf')); ?></td>
      </tr>
     <tr>
        <td height="30"></td>
      </tr>      

      <tr>
        <td class="container_qp" style="padding-left: 25px">
            <?php echo $form->labelEx($jobposting,'EJP_JOB_ID'); ?></td>
        <td  >
        <button type="button" title="click" class="select_job_button select_button">
        <em style="width: 180px;" id="em_job">Select</em></button>
        <div id="job_toggle" style="display: none">
        <div id='job' style="overflow-x:scroll; width:245px; overflow: -moz-scrollbars-horizontal;" >
     <?php echo $form->dropDownList($jobposting,'EJP_JOB_ID', CHtml::listData(JobMaster::model()->findAll(), 'JOB_ID', 'JOB_NAME'),array(
        // 'empty'=>'<- -Select- ->',
         'size'=>10,
//             'width'=>1000,	
                    'ajax' => array(
                    'type'=>'POST', //request type
                    //'dataType'=>'html',
                    'url'=>CController::createUrl('JobPosting/skilldetails'), 
                    'success'=>'updateFields',  //selector to update

                )));
?><div style='font-size: 1px'>&nbsp</div></div></div>
          
                
                
       
		<?php echo $form->error($jobposting,'EJP_JOB_ID',array('class'=>'errorf')); ?>       </td>  </tr>
      <tr>
        <td height="30"></td>
      </tr>
    
      <tr>
        <td class="container_qp" style="padding-left:22px"><?php echo $form->labelEx($jobposting,'EJP_ROLE_ID'); ?></td>
        <td>
        <button type="button" title="click" class="select_role_button select_button">
        <em style="width: 180px;" id="em_role">Select</em></button>
        <div id="role_toggle" style="display: none">
        <div id='role' style="overflow-x:scroll; width:245px; overflow: -moz-scrollbars-horizontal;" >
        <?php 
         echo $form->dropDownList($jobposting,'EJP_ROLE_ID',CHtml::listData(RoleMaster::model()->findAllByAttributes(array('ROLE_JOB_ID'=>$jobposting->EJP_JOB_ID)),'ROLE_ID','ROLE_NAME'),
                        array(
//               'empty'=>'<- -select- ->',
              // 'class'=>'dropdown',
                'size'=>10  
               ));?><div style='font-size: 1px'>&nbsp</div></div></div><?php 
        echo $form->error($jobposting,'EJP_ROLE_ID',array('class'=>'errorf')); ?></td>
      </tr>
      <tr>
        <td height="30"></td>
      </tr>
<!--      <tr>
        <td class="container_qp"><?php //echo $form->labelEx($jobposting,'EJP_SUBSCR_ID'); ?></td>
         <td> <?php 
//      if(isset($c))
//      {
//        echo $form->dropDownList($jobposting,'EJP_SUBSCR_ID',$c,array('empty'=>'<- -Select- ->' , 'ajax' => array(
//                    'type'=>'POST', //request type
//                    'dataType'=>'html',
//                    'url'=>CController::createUrl('JobPosting/subvideodetails'), 
//                    'success'=>'subvideoflag',  //selector to update
//
//                ))); }else { echo $form->dropDownList($jobposting,'EJP_SUBSCR_ID',CHtml::listData(RoleMaster::model()->findAllByAttributes(array('ROLE_JOB_ID'=>$jobposting->EJP_JOB_ID)),'ROLE_ID','ROLE_NAME'),
//           array('empty'=>'<- -select- ->'    
//               ));
                    ?> <a href='Subscription' >Get Subscription</a><?php //}?>
		<?php //echo $form->error($jobposting,'EJP_SUBSCR_ID',array('class'=>'errorf')); ?></td>
      </tr>
      <tr>
        <td height="30"></td>
      </tr>-->
      
          </table>

<table width="auto" border="0" cellspacing="0" cellpadding="0">
<!--    /*  style="padding-left: 61px"  */  -->
<td class="container_qp"  valign="middle" style="padding-left:19px">
          <?php echo $form->labelEx($jobposting,'EJP_PRIMARY_SKILL_CATG'); ?></td>
    <td style="padding-left:40px;"> 
            <?php 
//            echo $form->listBox($jobposting,'EJP_PRIMARY_SKILL_CATG',CHtml::listData(SkillMaster::model()->findAllByAttributes(array('SKILL_JOB_ID'=>$jobposting->EJP_JOB_ID)),'SKILL_ID','SKILL_CATG'),
//           array( 'multiple'=>'multiple',
//               ));
            ?>
            
            <?php $this->widget('bootstrap.widgets.TbSelect2', array(
                        'asDropDownList' => false,
                        'model' => $jobposting,
                        'attribute'=>'EJP_PRIMARY_SKILL_CATG',
                        'options' => array(
                        'tags' => array(),
//                        'placeholder' => 'Choose Skills',
                        'width' =>'30%',
                        //'separator' => ";",
                           
                        )));		
                 ?>
		<?php echo $form->error($jobposting,'EJP_PRIMARY_SKILL_CATG1',array('class'=>'errorf')); ?></td>
        <!-- width:96px; padding-right:150px; float: left;width:96px; -->
        <td class="container_qp1"  valign="middle" style="padding:0 10px 0 30px"><?php echo $form->labelEx($jobposting,'EJP_SEC_SKILL_CATG'); ?></td>
          
         <td><?php
                 echo $form->dropDownList($jobposting,'EJP_SEC_SKILL_CATG',CHtml::listData(SkillMaster::model()->findAll(),'SKILL_ID','SKILL_CATG'),
                array( 'multiple'=>'multiple'
                     ));
                 ?>
		<?php echo $form->error($jobposting,'EJP_SEC_SKILL_CATG',array('class'=>'errorf')); ?>
	</td>
      </table>
     
</div>
<!-- middle container part start here -->
<div>
    <table width="0" border="0" cellspacing="0" cellpadding="0" style="padding-top:30px;">
  
     <tr>      
        
     <td align="left" valign="middle" class="container_qp" width="169px"><?php echo $form->labelEx($jobposting,'EJP_FLAG_UPLOAD_QUES'); ?></td>
    <td width="20px">
        <?php echo $form->checkbox($jobposting,'EJP_FLAG_UPLOAD_QUES',array('onClick'=>'Disab()','id'=>'cbox')
                ); ?>

		<?php echo $form->error($jobposting,'EJP_FLAG_UPLOAD_QUES',array('class'=>'errorf')); ?>
	</td>
 
     
     </tr>
    </table>
</div>

<div class="both"></div>
<!-- main 3 button start here -->
<div class="button_without_bg" id="button_bg">
    <div class="previewqu_but" style="margin:35px 71px 0 55px; " id="preview_qu_button">
<?php echo CHtml::link('Question Preview',"#question_preview", array('id'=>'Ques_Prev','class'=>'button_color','style'=>'color:white',
    'ajax' => array(
                    'type'=>'POST', 
                    'dataType'=>'html',
                    'url'=>CController::createUrl('JobPosting/Page?action=create'), 
                    'success'=>'function(data){
                 
                $.fancybox({
                "autoDimensions" : false,
                "scrolling" : "yes",
                "onStart": function() { $("#fancybox-loading").css("display","block"); },   
                centerOnScroll: true,
                "content" : data

            });
          }'
                ))) ?>

 </div> 
    <div class="fileupload_div1" style="padding-top:35px;display: none"  id="d_f_u">
        <a class="fakedt" href="javascript: openPage()" style="color:white;text-decoration:none">Question Template</a>
    

      </div>   
    <div class="fileupload_div" style="display: none" id="d_f_u1">
        <span class="fake" >Question Upload</span>
        <input type="file" class="fileupload" name="xmlFile" id="xmlFile" onchange="javascript: document.getElementById('file_upload').value = this.value;" disabled="disabled"  />
      </div>
    <input type="hidden" name="file_upload" id="file_upload" style="cursor:pointer"/>
  <span id="valid_file" class="errorf" ></span>
  

</div>
         
    
            
<div>
    <table width="800" border="0" cellspacing="0" cellpadding="0">
  
     <tr> <td class="container_qp2" style="padding-left:29px;"><?php echo $form->labelEx($jobposting,'EJP_SUBSCR_ID'); ?></td>
         <td>        <button type="button" title="click" class="select_sub_button select_button">
        <em style="width: 180px;" id="em_sub">Select</em></button>
        <div id="sub_toggle" style="display: none">
        <div id='sub' style="overflow-x:scroll; width:245px; overflow: -moz-scrollbars-horizontal;" > <?php 
      if(isset($c))
      {
                    echo $form->dropDownList($jobposting,'EJP_SUBSCR_ID',$c,array(
                    // 'empty'=>'<- -Select- ->' , 'class'=>'dropdown',
                      'size'=>10,
                        'ajax' => array(
                    'type'=>'POST', //request type
                    'dataType'=>'html',
                    'url'=>CController::createUrl('JobPosting/subvideodetails'), 
                    'success'=>'subvideoflag',  //selector to update

                ))); 
                    
      }
                else { echo $form->dropDownList($jobposting,'EJP_SUBSCR_ID',CHtml::listData(RoleMaster::model()->findAllByAttributes(array('ROLE_JOB_ID'=>$jobposting->EJP_JOB_ID)),'ROLE_ID','ROLE_NAME'),
           array(//'empty'=>'<- -select- ->','class'=>'dropdown',    
               ));
                    ?> <!--<a href='Subscription' >Get Subscription</a>--><?php }?>  <div style='font-size: 1px'>&nbsp</div></div></div>
		<?php echo $form->error($jobposting,'EJP_SUBSCR_ID',array('class'=>'errorf')); ?></td>
      </tr>
      <tr>
        <td height="30"></td>
      </tr>   
        
        
        
    <tr>    
  
    <td width="170" class="container_qp2" style="padding-left:29px;"><?php echo $form->labelEx($jobposting,'EJP_CAND_EMAIL_ID'); ?></td>
<!--    <td width="10">&nbsp;</td><br>-->
   
    <td width="592" class="container_qp2"><?php  
                        $this->widget('bootstrap.widgets.TbSelect2', array(
                        'asDropDownList' => false,
                        'model' => $jobposting,
                        'attribute'=>'EJP_CAND_EMAIL_ID',
                        'options' => array(
                        'tags' => array(),
//                      'placeholder' => 'Choose Skills',
//                        'width' =>'30%',
                        'separator' => ";",
                           
                        )));	
                 ?>
		<?php echo $form->error($jobposting,'EJP_CAND_EMAIL_ID',array('class'=>'errorf')); ?>
	 <br> <span id="valid_email" class="errorMessage" ></span></td>
  </tr>
  <tr>
        <td height="30"></td>
      </tr> 
  <tr>      
        
    <td align="left" valign="middle" class="container_qp2" style="padding-left:29px;"><?php echo $form->labelEx($jobposting,'EJP_VIDEO_Y_N'); ?></td>
<!--    <td>&nbsp;</td>-->
    
    <td>
	<?php echo $form->checkbox($jobposting,'EJP_VIDEO_Y_N',array('uncheckValue'=>'')); 
                echo CHtml::activehiddenField($jobposting,'email_count');
                echo CHtml::activehiddenField($jobposting,'post_dur'); ?>
		<?php echo $form->error($jobposting,'EJP_VIDEO_Y_N',array('class'=>'errorf')); ?>
	</td>
  </tr>
   <tr>
        <td height="30"></td>
      </tr> 
      <tr>
       <td class="container_qp" >
          <?php echo $form->labelEx($jobposting,'EJP_TEST_DURATION'); ?></td>
          <td>
      <?php echo $form->textField($jobposting,'EJP_TEST_DURATION',array('class'=>'textbox','maxlength'=>11)); ?>
               <?php //echo $form->textField($jobposting,'EJP_CAND_ACTIVE_DAYS',array('maxlength'=>54,'class'=>'textbox')); ?>
		<?php echo $form->error($jobposting,'EJP_TEST_DURATION',array('class'=>'errorf')); ?>
        	</td>
      </tr>
        <tr>
        <td height="30"></td>
      </tr> 
       <tr>
       <td class="container_qp" >
          <?php echo $form->labelEx($jobposting,'EJP_NO_QUES'); ?></td>
          <td>
      <?php echo $form->textField($jobposting,'EJP_NO_QUES',array('class'=>'textbox','maxlength'=>11)); ?>
               <?php //echo $form->textField($jobposting,'EJP_CAND_ACTIVE_DAYS',array('maxlength'=>54,'class'=>'textbox')); ?>
		<?php echo $form->error($jobposting,'EJP_NO_QUES',array('class'=>'errorf')); ?></td>
       </tr>
  <tr>
        <td height="30"></td>
      </tr> 
<!--     <tr>
        <td width="170">&nbsp;</td>
      </tr>-->
      <tr>
<!--          <td class="container_qp2"><span style='padding-left:29px;'>How soon do you need </span><span style='padding-left:29px;'>the  test taken (days)?&nbsp;&nbsp;&nbsp;*</span></td>-->
<!--        <td width="14">&nbsp;</td>-->
 <td class="container_qp" >
          <?php echo $form->labelEx($jobposting,'EJP_TEST_DUE_DATE'); ?></td>
          <td>
            <?php  
   	  $this->widget('zii.widgets.jui.CJuiDatePicker', 
                	array('name'=>'JobPosting[EJP_TEST_DUE_DATE]',
                              'value'=>date('Y-m-d'),
			      'model'=>$jobposting,// additional javascript options for the date picker plugin
                              'options'=>array(
			      'showAnim'=>'fold',
			      'dateFormat'=>'yy-mm-dd',
                              'minDate'=> '0',
//                            'yearRange'=> '-100',
//                              'maxDate'=> '+0',  
//                            'maxYear'=>'new Date()-18y',
//                              'yearRange'=>'-50:-18', 
                              'changeMonth'=>'true', 
                              'changeYear'=>'true'),
			      'htmlOptions'=>array(
			      'style'=>'height:20px;',
                              'readonly'=>"readonly",
                              'class'=>'textbox'
			),
		));
   	  ?>
               <?php //echo $form->textField($jobposting,'EJP_CAND_ACTIVE_DAYS',array('maxlength'=>54,'class'=>'textbox')); ?>
		<?php echo $form->error($jobposting,'EJP_TEST_DUE_DATE',array('class'=>'errorf')); ?>
        	</td>
                
      </tr>
       
        	
      
  <tr> 
  </tr>
  <tr>
      <td style="height:30px"></td>  
 </tr>
</table>
 <table align="center" width="140" border="0" cellspacing="0" cellpadding="0">
     <tr  >
         <td><?php echo CHtml::submitButton($jobposting->isNewRecord ? 'Post Interview' : 'Save', 
                array('class'=>'delete','style'=>'margin:0 0 0 400px;')); ?></td>
        
      </tr>
      <tr>
      <td style="height:30px"></td>  
      </tr>
    </table>   
</div>
</div><?php $this->endWidget(); ?>

<div class="footer_height_question_panel"></div>
<script type="text/javascript">
function updateFields(data)
{

        var splitArr = data.split('@@@');  
       
    $('#JobPosting_EJP_ROLE_ID').html(splitArr[1]);
    //$('#JobPosting_EJP_PRIMARY_SKILL_CATG').html(splitArr[0]);
     
                    var preload_data= splitArr[0];
                
                    getpri()
                    var str=preload_data;
                    var str1 = $.parseJSON(str);
                  
                    $('#JobPosting_EJP_PRIMARY_SKILL_CATG').select2('data', str1 )
                     
                
 }
 
 function subvideoflag(data1)
{
  var splitArray = data1.split('@#&&#@');
  document.getElementById('JobPosting_post_dur').value=splitArray[1];

    if(splitArray[0]=='1')
        {
            //document.getElementById('JobPosting_video_status').value='1';
            
            document.getElementById('JobPosting_EJP_VIDEO_Y_N').checked =true; 
            document.getElementById('JobPosting_EJP_VIDEO_Y_N').disabled =false;
        }
    else
        {
         // document.getElementById('JobPosting_video_status').value='0';
          document.getElementById('JobPosting_EJP_VIDEO_Y_N').checked =false;
          document.getElementById('JobPosting_EJP_VIDEO_Y_N').disabled =true;
        }
}

function ajaxAfterValidate()
{
  document.getElementById('valid_email').innerHTML='';
 var data= document.getElementById('JobPosting_EJP_CAND_EMAIL_ID').value;
 var emp_id=data.split(';');

 var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]/;
 if(emp_id=='')
     {
         emp_id.length='0';
     }
 document.getElementById('JobPosting_email_count').value=emp_id.length;
 var j=1;
 var emp='';
 for(var i=0;i<emp_id.length;i++)
    {
   
         if(!emailReg.test(emp_id[i]))
         {
               
            if(emp_id.length==j)
            {
                 emp += emp_id[i];
            }
         
            else
            {
                emp += emp_id[i]+',';
            }
            j++;
            
             //  $('.select2-search-choice').val(emp_id[i]).empty();
          }
         
    }

  if(j>1)
 {
    document.getElementById('valid_email').innerHTML='Invalid Email(s): '+emp;
    return false; 
 }
 else
     {
          document.getElementById('valid_email').innerHTML='';
     }

      

  if(document.form1.cbox.checked)
            {
                if(document.getElementById('file_upload').value=='')
                    {
                        document.getElementById('valid_file').innerHTML='Please Upload Your Own Questions';
                        return false;
                        
                    }
            }
            else
                {
                    document.getElementById('valid_file').innerHTML='';
                } 
getsubcount();
}
function getsubcount()
{
   var data= document.getElementById('JobPosting_EJP_CAND_EMAIL_ID').value;                
   var sub= document.getElementById('JobPosting_EJP_SUBSCR_ID').value;

   $.ajax({
    type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("JobPosting/getemail"); ?>',
    data:"email_id="+data+"&sub="+sub+"&action=create"+"&sid="+Math.random(),
    dataType:'html',
    success:function(data){

 var dataarr=data.split(';');

if(dataarr[0]=='no')  
{   
    document.getElementById('valid_email').innerHTML='You can send mail to only '+dataarr[1]+' candidates';
     return false;  
}
else
    {
       $('form').unbind('submit').submit();
    }

 }
 });
 return true;
}
function valid_upload_ques()
{
    if(document.getElementById('JobPosting_EJP_FLAG_UPLOAD_QUES').checked==true)
    {  
    document.getElementById('hideupload').style.display='block';
    }
else
    {
        document.getElementById('hideupload').style.display='none';
     
   }
}


    $(document).ready(function() {
    $('#JobPosting_EJP_SEC_SKILL_CATG').select2({height:'150px'});
});
         $(document).ready(function() {
//    $('#JobPosting_EJP_PRIMARY_SKILL_CATG').select2({
//     height:'150px'
//    });
});


function Disab() {
 

if(document.form1.cbox.checked) 
{
   
  document.form1.xmlFile.disabled=false;
//  document.getElementById('downFile').disabled=false;  
  document.getElementById('d_f_u').style.display='block';
   document.getElementById('d_f_u1').style.display='block';
    $("#button_bg").removeClass("button_without_bg");
     $("#button_bg").addClass("button_bg1"); 
     $("#preview_qu_button").removeClass("previewqu_but");
     $("#preview_qu_button").addClass("previewqu_with_bg_but");
     
  
}
else {
    document.getElementById('d_f_u').style.display='none';
    document.getElementById('d_f_u1').style.display='none';
    document.form1.xmlFile.disabled=true;
     $("#button_bg").removeClass("button_bg1");
     $("#button_bg").addClass("button_without_bg");
     $("#preview_qu_button").removeClass("previewqu_with_bg_but");
     $("#preview_qu_button").addClass("previewqu_but");
}
}

function chgurl()
{
    
}
function getpri()
{
 var preload_data=document.getElementById('JobPosting_EJP_JOB_ID').value;
$('#JobPosting_EJP_PRIMARY_SKILL_CATG').select2({
     multiple: true,
    ajax: {
        type: 'POST',
        url: '<?php echo Yii::app()->createAbsoluteUrl("JobPosting/data")?>?id='+preload_data,
        dataType: 'json',
        quietMillis: 100,
        data: function (term) {
            return {
                term: term
            };
        },
        results: function (data) {
          
          var results = [];
          $.each(data, function(index, item){
            results.push({
             id: item.id,
              text: item.text
            });
          });
          return {
              results: results
          };
        }
    },
         
        formatResult: movieFormatResult, // omitted for brevity, see the source of this page
        formatSelection: movieFormatSelection, // omitted for brevity, see the source of this page
        dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
        escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
 
});
}

    function movieFormatResult(movie) {
    
        var markup = "<table class='movie-result'><tr>";
      
        markup += "<td class='movie-info'><div class='movie-title'>" + movie.text + "</div>";
        if (movie.critics_consensus !== undefined) {
            markup += "<div class='movie-synopsis'>" + movie.id + "</div>";
        }
        else if (movie.synopsis !== undefined) {
            markup += "<div class='movie-synopsis'>" + movie.text + "</div>";
        }
        markup += "</td></tr></table>"
        return markup;
    }

    function movieFormatSelection(movie) {
        return movie.text;
    }
    
   $('.select_job_button').click(function() {
   $('#job_toggle').toggle();
   var divid = 'job';
   document.getElementById(divid).getElementsByTagName('div')[0].style.width = document.getElementById(divid).getElementsByTagName('select')[0].offsetWidth+'px';
   document.getElementById(divid).getElementsByTagName('select')[0].style.width = document.getElementById(divid).offsetWidth+'px';
   document.getElementById(divid).onscroll = function scrollEvent() { this.getElementsByTagName('select')[0].style.width = parseInt(this.offsetWidth+this.scrollLeft)+'px'; }
    //$('.select_button1').hide();
});

$('#JobPosting_EJP_JOB_ID').change(function()
{
   var str = "";
   $("#JobPosting_EJP_JOB_ID option:selected").each(function () {
   str += $(this).text() + " ";
   });
   $("#em_job").text(str);
   var divid = 'job';
   document.getElementById(divid).getElementsByTagName('div')[0].style.width = '';
   document.getElementById(divid).getElementsByTagName('select')[0].style.width = '';
   $('#job_toggle').toggle();  
});

   $('.select_role_button').click(function() {
   $('#role_toggle').toggle();
   var divid = 'role';
   document.getElementById(divid).getElementsByTagName('div')[0].style.width = document.getElementById(divid).getElementsByTagName('select')[0].offsetWidth+'px';
   document.getElementById(divid).getElementsByTagName('select')[0].style.width = document.getElementById(divid).offsetWidth+'px';
   document.getElementById(divid).onscroll = function scrollEvent() { this.getElementsByTagName('select')[0].style.width = parseInt(this.offsetWidth+this.scrollLeft)+'px'; }
    //$('.select_button1').hide();
});

$('#JobPosting_EJP_ROLE_ID').change(function()
{
   var str = "";
   $("#JobPosting_EJP_ROLE_ID option:selected").each(function () {
   str += $(this).text() + " ";
   });
   $("#em_role").text(str);
   var divid = 'role';
   document.getElementById(divid).getElementsByTagName('div')[0].style.width = '';
   document.getElementById(divid).getElementsByTagName('select')[0].style.width = '';
   $('#role_toggle').toggle();  
});
   $('.select_sub_button').click(function() {
   
   $('#sub_toggle').toggle();
   var divid = 'sub';
   document.getElementById(divid).getElementsByTagName('div')[0].style.width = document.getElementById(divid).getElementsByTagName('select')[0].offsetWidth+'px';
   document.getElementById(divid).getElementsByTagName('select')[0].style.width = document.getElementById(divid).offsetWidth+'px';
   document.getElementById(divid).onscroll = function scrollEvent() { this.getElementsByTagName('select')[0].style.width = parseInt(this.offsetWidth+this.scrollLeft)+'px'; }
    //$('.select_button1').hide();
});

$('#JobPosting_EJP_SUBSCR_ID').change(function()
{
   var str = "";
   $("#JobPosting_EJP_SUBSCR_ID option:selected").each(function () {
   str += $(this).text() + " ";
   });
   $("#em_sub").text(str);
   var divid = 'sub';
   document.getElementById(divid).getElementsByTagName('div')[0].style.width = '';
   document.getElementById(divid).getElementsByTagName('select')[0].style.width = '';
   $('#sub_toggle').toggle();  
});

        function openPage()
{

if(document.getElementById('cbox').checked==true)
{

window.location.href='<?php echo $FileUrl;?>';
}
else{
// nothing, this else not required
}
}
</script>




  <?php $this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#PasswordLink',
        'config'=>array(
        'scrolling'=>'No',
      
        'titleShow'=>true,
        ),
        )
    );
?> 

<style>
    .select2-container
    {
        position: inherit;
    }
</style>



 
