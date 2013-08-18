<style>
 .select2-container-multi .select2-choices 
    {
      min-height:120px;
      width:242px;
    }

</style>
<?php
$this->breadcrumbs=array(
	'Job Postings'=>array('index'),
	'Create',
);

?>
<div class="tab">Edit Posting</div> 
<div class="Container4">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
      	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
        'afterValidate'=>'js:ajaxAfterValidate'
	), 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));

if((isset($a))&&(isset($b)))
{
  
$c = array_combine($b, $a);
}

$FileUrl =  Yii::app()->createAbsoluteUrl('JobPosting/upload_questions');
?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php //echo $form->errorSummary($model); ?>
<div>
    <table width="512" border="0" cellspacing="0" cellpadding="0">
	
        <tr>
        <td height="30"></td>
      </tr>
		<tr>
         <td class="container_qp_job"  nowrap="nowrap"><?php echo $form->labelEx($model,'EJP_NAME'); ?></td>
		<td><?php echo $form->textField($model,'EJP_NAME',array('class'=>'textbox','maxlength'=>54,'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'EJP_NAME',array('class'=>'errorf')); ?>
                <?php echo CHtml::hiddenField('id',$id)?></td>
 </tr>
      <tr>
        <td height="30"></td>
      </tr>


	<tr>
       <td class="container_qp_job">
		<?php echo $form->labelEx($model,'EJP_JOB_ID'); ?></td>
		 <td  id="demo-form">
                     <button type="button" title="click" class="select_job_button select_button" id="se_j_b" disabled="disabled" >
                  <em style="width: 180px;" id="em_job">Select</em></button>
                  <div id="job_toggle" style="display: none">
                  <div id='job' style="overflow-x:scroll; width:245px; overflow: -moz-scrollbars-horizontal;" >
                     <?php echo $form->dropDownList($model,'EJP_JOB_ID', CHtml::listData(JobMaster::model()->findAll(), 'JOB_ID', 'JOB_NAME'),array(	
                    'ajax' => array(
                    'type'=>'POST', //request type
                    'dataType'=>'html',
                    'url'=>CController::createUrl('skilldetails1'), 
                    'success'=>'updateFields',  //selector to update
                  
                ),'size'=>10));
?><div style='font-size: 1px'>&nbsp</div></div></div>
          
                
                   </td>
         <td>
		<?php echo $form->error($model,'EJP_JOB_ID',array('class'=>'errorf')); ?></td>
      </tr>
      <tr>
        <td height="30"></td>
      </tr>
      <tr>
        <td class="container_qp_job"><?php echo $form->labelEx($model,'EJP_ROLE_ID'); ?></td>
	<td>
        <button type="button" title="click" class="select_role_button select_button" disabled="disabled">
        <em style="width: 180px;" id="em_role">Select</em></button>
        <div id="role_toggle" style="display: none">
        <div id='role' style="overflow-x:scroll; width:245px; overflow: -moz-scrollbars-horizontal;" >
            <?php echo $form->dropDownList($model,'EJP_ROLE_ID',CHtml::listData(RoleMaster::model()->findAllByAttributes(array('ROLE_JOB_ID'=>$model->EJP_JOB_ID)),'ROLE_ID','ROLE_NAME'),
           array(
//               'class'=>'dropdown',
               'size'=>10
               ));?><div style='font-size: 1px'>&nbsp</div></div></div>

		<?php echo $form->error($model,'EJP_ROLE_ID',array('class'=>'errorf')); ?></td>
      </tr>
      <tr>
        <td height="30"></td>
      </tr>
      
      
      
	
</table>

 <table width="auto" border="0" cellspacing="0" cellpadding="0">
     <td class="container_qp" valign="middle">	
	<?php echo $form->labelEx($model,'EJP_PRIMARY_SKILL_CATG'); ?></td>
<?php  $primary=explode(',',$model->EJP_PRIMARY_SKILL_CATG);

foreach ($primary as $p)
{
$pp[$p] = array('selected'=>'selected');
}
if(!empty($sec))
{
$sec=explode(',',$model->EJP_SEC_SKILL_CATG);
foreach ($sec as $secarray)
{
$arr[$secarray] = array('selected'=>'selected');
}
}
 else {
    $arr='';
}
?>
          
   <td style="padding-left:35px;"><?php echo $form->listBox($model,'EJP_PRIMARY_SKILL_CATG',
           CHtml::listData(SkillMaster::model()->findAllByAttributes(array('SKILL_JOB_ID'=>$model->EJP_JOB_ID)),'SKILL_ID','SKILL_CATG'),
           array( 'multiple'=>'multiple' ,
           'options'=>$pp
               ));?>
		<?php echo $form->error($model,'EJP_PRIMARY_SKILL_CATG',array('class'=>'errorf')); ?></td>
	

	
   <td class="container_qp" valign="middle" style="padding:0 10px 0 10px">	<?php echo $form->labelEx($model,'EJP_SEC_SKILL_CATG'); ?></td>
		 <td><?php // $form->textField($model,'EJP_SEC_SKILL_CATG',array('size'=>20,'maxlength'=>240));
                 echo $form->dropDownList($model,'EJP_SEC_SKILL_CATG',CHtml::listData(SkillMaster::model()->findAll(),'SKILL_ID','SKILL_CATG'),
           array( 'multiple'=>'multiple', 'options'=>$arr ));?>
		<?php echo $form->error($model,'EJP_SEC_SKILL_CATG',array('class'=>'errorf')); ?></td>
                 
       <tr>
        <td height="30"></td>
      </tr>
                 
</table>
<!--  <table width="926" border="0" cellspacing="0" cellpadding="0">
      
      <td class="container_qp" width="152px"><?php echo $form->labelEx($model,'EJP_PRIMARY_SKILL_CATG'); ?></td>
        <td> <?php echo $form->listBox($model,'EJP_PRIMARY_SKILL_CATG',CHtml::listData(SkillMaster::model()->findAllByAttributes(array('SKILL_JOB_ID'=>$model->EJP_JOB_ID)),'SKILL_ID','SKILL_CATG'),
           array( 'multiple'=>'multiple',
               ));?>
		<?php echo $form->error($model,'EJP_PRIMARY_SKILL_CATG',array('class'=>'errorf')); ?></td>
        
         <td class="container_qp1" width="96px" padding-right="150px"><?php echo $form->labelEx($model,'EJP_SEC_SKILL_CATG'); ?></td>
          
         <td><?php
                 echo $form->dropDownList($model,'EJP_SEC_SKILL_CATG',CHtml::listData(SkillMaster::model()->findAll(),'SKILL_ID','SKILL_CATG'),
                array( 'multiple'=>'multiple'
                     ));?>
		<?php echo $form->error($model,'EJP_SEC_SKILL_CATG',array('class'=>'errorf')); ?>
	</td>
      </table>               -->
   
</div>	
    <div><table width="800" border="0" cellspacing="0" cellpadding="0">
  
     <tr> 
         <td align="left" valign="middle" class="container_qp" width="174px"><?php echo $form->labelEx($model,'EJP_FLAG_UPLOAD_QUES'); ?></td>
	
    
         <td>	   <?php echo $form->checkbox($model,'EJP_FLAG_UPLOAD_QUES',array('onClick'=>'Disab()','id'=>'cbox','disabled'=>'disabled')
                ); ?>
		<?php echo $form->error($model,'EJP_FLAG_UPLOAD_QUES',array('class'=>'errorf')); ?></td>

         
     </tr>    </table>
</div>
        
 <div class="both"></div>
<!-- main 3 button start here -->
<div class="button_without_bg" id="button_bg">
    <div class="previewqu_but" style="margin:35px 71px 0 55px;" id="preview_qu_button">
<?php echo CHtml::link('Question Preview',"#question_preview", array('id'=>'Ques_Prev','class'=>'button_color','style'=>'color:white',
    'ajax' => array(
                    'type'=>'POST', 
                    'dataType'=>'html',
                    'url'=>CController::createUrl('JobPosting/Page?action=update'), 
                    'success'=>'function(data){
               
                $.fancybox({
                "autoDimensions" : false,
                "scrolling" : "yes",
                "onStart": function() { $("#fancybox-loading").css("display","block"); },  
                centerOnScroll: true,
                "content" : data

            });
          }'
                ))) ?></div>   
  
   <div class="fileupload_div1" style="display: none;margin-top:35px" id="d_f_u"> 
        <a class="fakedt" href="javascript: openPage()" style="color:white;text-decoration:none;margin-top:15px">Download Template</a>
    

      </div>   
    <div class="fileupload_div" style="display: none;margin-top: 15px;" id="d_f_u1">
        <span class="fake" >Question Upload</span>
        <input type="file" class="fileupload" name="xmlFile" id="xmlFile" onchange="javascript: document.getElementById('file_upload').value = this.value;" />
      </div>
     <input type="hidden" name="file_upload" id="file_upload" />
  <span id="valid_file" class="errorf"></span>

</div>         
   
            
<div><table width="800" border="0" cellspacing="0" cellpadding="0">     

        
        <tr>  
          <td class="container_qp2" style="padding-left:29px;"> <?php echo $form->labelEx($model,'EJP_SUBSCR_ID'); ?></td>
		<td>  <button type="button" title="click" class="select_sub_button select_button">
        <em style="width: 180px;" id="em_sub">Select</em></button>
        <div id="sub_toggle" style="display: none">
        <div id='sub' style="overflow-x:scroll; width:245px; overflow: -moz-scrollbars-horizontal;" > 
            
            <?php 
              if(isset($c))
         {
            echo $form->dropDownList($model,'EJP_SUBSCR_ID',$c,array('size'=>10,
//                'class'=>'dropdown',
                'ajax' => array(
                    'type'=>'POST', //request type
                    'dataType'=>'html',
                    'url'=>CController::createUrl('subvideodetails'), 
                    'success'=>'subvideoflag',  //selector to update

                )));
            } ?>
		<div style='font-size: 1px'>&nbsp</div></div></div><?php echo $form->error($model,'EJP_SUBSCR_ID',array('class'=>'errorf')); ?></td>
        </tr>
        <tr>
        <td height="30"></td>
      </tr> 
     <tr>
         <td width="170" class="container_qp2" style="padding-left:29px;"><?php echo $form->labelEx($model,'EJP_CAND_EMAIL_ID'); ?></td>
        <?php $model->EJP_CAND_EMAIL_ID=''; ?>
             
         <td width="592" class="container_qp2">
         <?php 
         $emailid=array();
         foreach($ejpcanarr  as $value)
        {  
                 $emailid[]=$value;
        }
        $aa=$emailid[0]['ejp_can_email_id'];      
        $ejpcanarr=str_replace(";",",",$aa);
        $aaa=explode(',',$ejpcanarr);
        $a=array_unique($aaa);
//         $aaaa=implode(',',$a);
//         print_r($a);
//        //$a
//        print_R($aaa);
        // print_R($aa);
      //print_R($aaaa);
        $this->widget('bootstrap.widgets.TbSelect2',
        array(
         'asDropDownList' => false,
        'model' => $model,
        'attribute'=>'EJP_CAND_EMAIL_ID',
        'options' => array(
        'tags' => $aaa,
        
        'separator' => ";",
        
                        ))
             
             );	
                 ?>
		<?php echo $form->error($model,'EJP_CAND_EMAIL_ID',array('class'=>'errorf','uncheckValue'=>'')); ?>
             <br><span id="valid_email" class="errorMessage" style="color: red;"></span></td> 
	
     </tr> 
     <tr>
        <td height="30"></td>
      </tr> 
	<tr>      
        
            <td align="left" valign="middle" class="container_qp2" style="padding-left:29px;">
		<?php echo $form->labelEx($model,'EJP_VIDEO_Y_N'); ?></td>
	
    
        <td>	<?php if($model->EJP_VIDEO_Y_N==0){
            echo $form->checkbox($model,'EJP_VIDEO_Y_N',array('uncheckValue'=>'','disabled'=>'disabled')); 
        }
        else
        {
              echo $form->checkbox($model,'EJP_VIDEO_Y_N',array('uncheckValue'=>'')); 
        }
                echo CHtml::activehiddenField($model,'email_count');
                echo CHtml::activehiddenField($model,'post_dur');?>
		<?php echo $form->error($model,'EJP_VIDEO_Y_N',array('class'=>'errorf')); ?></td>

</tr>

              <tr>
        <td height="30"></td>
      </tr> 
      <tr>
       <td class="container_qp" >
          <?php echo $form->labelEx($model,'EJP_TEST_DURATION'); ?></td>
          <td>
      <?php echo $form->textField($model,'EJP_TEST_DURATION',array('class'=>'textbox','maxlength'=>11,'disabled'=>"disabled")); ?>
              <span class="pclass"></span><?php //echo $form->textField($model,'EJP_CAND_ACTIVE_DAYS',array('maxlength'=>54,'class'=>'textbox')); ?>
		<?php echo $form->error($model,'EJP_TEST_DURATION',array('class'=>'errorf')); ?>
        	</td>
      </tr>
        <tr>
        <td height="30"></td>
      </tr> 
       <tr>
       <td class="container_qp" >
          <?php echo $form->labelEx($model,'EJP_NO_QUES'); ?></td>
          <td>
      <?php echo $form->textField($model,'EJP_NO_QUES',array('class'=>'textbox','maxlength'=>11,'disabled'=>"disabled")); ?>
               <?php //echo $form->textField($model,'EJP_CAND_ACTIVE_DAYS',array('maxlength'=>54,'class'=>'textbox')); ?>
		<?php echo $form->error($model,'EJP_NO_QUES',array('class'=>'errorf')); ?></td>
       </tr>
     <tr>
        <td width="170">&nbsp;</td>
      </tr>
      
      <tr>
        <td class="container_qp" > <?php echo $form->labelEx($model,'EJP_TEST_DUE_DATE'); ?></td>
          <td>
            <?php  
   	  $this->widget('zii.widgets.jui.CJuiDatePicker', 
                	array('name'=>'JobPosting[EJP_TEST_DUE_DATE]',
                              'value'=>date('Y-m-d'),
			      'model'=>$model,// additional javascript options for the date picker plugin
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
               <?php //echo $form->textField($model,'EJP_CAND_ACTIVE_DAYS',array('maxlength'=>54,'class'=>'textbox')); ?>
		<?php echo $form->error($model,'EJP_TEST_DUE_DATE',array('class'=>'errorf')); ?>
        	</td>
	 </tr>
        	

 <tr> 
  </tr>
  <tr>
      <td style="height:30px"></td>  
 </tr>
</table>
    <table align="center" width="140" border="0" cellspacing="0" cellpadding="0">
     <tr>
         <td>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update',array('class'=>'create')); ?></td>

 </tr>
      <tr>
      <td style="height:30px"></td>  
      </tr>
    </table>   
</div>
<?php $this->endWidget(); ?>

</div>
<br>

<script type="text/javascript">
function updateFields(data)
{

    var splitArr = data.split('@@@');  
    $('#s2id_JobPosting_EJP_PRIMARY_SKILL_CATG .select2-search-choice').remove();

    $('#JobPosting_EJP_ROLE_ID').html(splitArr[1]);
   $('#JobPosting_EJP_PRIMARY_SKILL_CATG').html(splitArr[0]);
     

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
//    if(document.getElementById('cbox').checked==true)
//            {
//                if(document.getElementById('file_upload').value=='')
//                    {
//                        document.getElementById('valid_file').innerHTML='Please upload your own questions';
//                        return false;
//                    }
//            }
//            else
//                {
//                    document.getElementById('valid_file').innerHTML='';
//                }
 var data= document.getElementById('JobPosting_EJP_CAND_EMAIL_ID').value;
 var id= document.getElementById('id').value;

 var emp_id=data.split(';');

 var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,4}$/;
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
    var sub= document.getElementById('JobPosting_EJP_SUBSCR_ID').value;
 

  
     $.ajax({
    type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("JobPosting/getemail"); ?>',
    data:"email_id="+data+"&id="+id+"&action=update"+"&sub="+sub+"&sid="+Math.random(),
     dataType:'html',
    success:function(data){

   
    
 var dataarr=data.split(';');

if(dataarr[0]=='no')  
{   
      document.getElementById('valid_email').innerHTML='You can send only '+dataarr[1]+' candidates';
      return false;  
}
else if((dataarr[0]=='yes') &&(dataarr[1]!='')) 
{ 
  
    document.getElementById('valid_email').innerHTML='Already you sent  posting to the following candidates: '+dataarr[1];
      return false;  
       
 }
else
    {    
         $('form').unbind('submit').submit();
        
    }
    }
   }); 

      
  
}

function getemail()
{
 var data= document.getElementById('JobPosting_EJP_CAND_EMAIL_ID').value;
 
 var sub= document.getElementById('JobPosting_EJP_SUBSCR_ID').value;
 alert(sub)
 if(document.getElementById('JobPosting_EJP_SUBSCR_ID').value=='')
     {
         alert("please select subscription");
         return false;
     }
 var id= document.getElementById('id').value;
      $.ajax({
    type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("JobPosting/getemail"); ?>',
     data:"email_id="+data+"&id="+id+"&sub="+sub+"&sid="+Math.random(),
    success:function(data){
 var dataarr=data.split(';');
if(dataarr[0]=='no')  
{   
    document.getElementById('valid_email').innerHTML='You can send mail to only '+dataarr[1]+' candidates';
      return false;  
 }
else if(dataarr[0]=='yes')  
{   
    document.getElementById('valid_email').innerHTML='Already you sent  posting to the following candidates: '+dataarr[1];
      return false;  
 }
  else
     {
          return true;
           
    }
 }
 });  

  //return true;

}
         $(document).ready(function() {
    $('#JobPosting_EJP_SEC_SKILL_CATG').select2({     });
});
         $(document).ready(function() {
    $('#JobPosting_EJP_PRIMARY_SKILL_CATG').select2({     });
});
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
 function subvideoflag1(data1)
{
    
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

 
 $(function() {
var job=$("#JobPosting_EJP_JOB_ID option:selected").text();
var role=$("#JobPosting_EJP_ROLE_ID option:selected").text();
var sub=$("#JobPosting_EJP_SUBSCR_ID option:selected").text();
if(job=='')
var job='Select';
if(role=='')
var role='Select';
if(sub=='')
var sub='Select';
get_data(job,role,sub)
 Disab();
  //document.getElementById("se_j_b").disabled=true;
});
function get_data(job,role,sub)
{
$("#em_job").text(job);
$("#em_role").text(role);
$("#em_sub").text(sub);

}
function Disab() {

if(document.getElementById('cbox').checked==true)
{

// document.getElementById('xmlFile').disabled=false;
// document.getElementById('downFile').disabled=false;  
 document.getElementById('d_f_u').style.display='block';
   document.getElementById('d_f_u1').style.display='block';
     $("#button_bg").removeClass("button_without_bg");
     $("#button_bg").addClass("button_bg1"); 
     $("#preview_qu_button").removeClass("previewqu_but");
     $("#preview_qu_button").addClass("previewqu_with_bg_but");
   
}
else
{
     document.getElementById('d_f_u').style.display='none';
     document.getElementById('d_f_u1').style.display='none';
    //document.getElementById('xmlFile').disabled=true
    $("#button_bg").removeClass("button_bg1");
     $("#button_bg").addClass("button_without_bg");
     $("#preview_qu_button").removeClass("previewqu_with_bg_but");
     $("#preview_qu_button").addClass("previewqu_but");
}
}
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
//        var preload_data =[{"id":"51","text":"454544"},{"id":"43","text":"adsad"},{"id":"48","text":"s1"},{"id":"47","text":"samp1"},{"id":"49","text":"test"},{"id":"50","text":"test,fdsfs"}];
//  var preload_data =document.getElementById('ski').value;
//    $(document).ready(function () {
// 
//    $('#e21').select2({
//    multiple: true
//    ,query: function (query){
//
//    var data = {results: []};
//     
//    $.each(preload_data, function(){
//    if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
//    data.results.push({id: this.id, text: this.text });
//    }
//    });
//     
//    query.callback(data);
//    }
//    });
//    $('#e21').select2('data', preload_data )
//    
//       });
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



  
