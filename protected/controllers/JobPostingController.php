<?php

class JobPostingController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
   
	public $layout='//layouts/column4';

	/**
	 * @return array action filters
	 */
        
   protected function beforeAction($action) {
                 
  	   	$id=yii::app()->session['id'];
                if(!($id)) // $id = how-to-make-pretty-urls
                {
                   
                     $this->forward('Site/EmpLogin');
                 
                }
                 else
		{
		 return true;
		}
        }	
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),*/
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
           $connection=Yii::app()->db;
           $skill='';
           $model=$this->loadModel($id); 
           $arr=$model->EJP_PRIMARY_SKILL_CATG;
           $sec_skill1='';        
           $secarr1=$model->EJP_SEC_SKILL_CATG;
           $arr1= explode(',', $arr);  
           for($i=0;$i<count($arr1);$i++)
            {  
             $skillrow=$arr1[$i]; 
             $Select_Count1="SELECT SKILL_CATG FROM skill_master WHERE SKILL_ID=$skillrow"; 
             foreach($connection->createCommand($Select_Count1)->queryAll() as $value)
             {
                if($i!=count($arr1)-1)
                {                 
                  $skill.=$value['SKILL_CATG'].",";

                } 
                else
                {
                $skill.=$value['SKILL_CATG'];
                }
            }
            }

                  $model->EJP_PRIMARY_SKILL_CATG=$skill;     

                
        
            if($model->EJP_SEC_SKILL_CATG!='')
            {
            $secarr2= explode(',', $secarr1);
            
            for($i=0;$i<count($secarr2);$i++)
             {  
               $skillrow1=$secarr2[$i]; 
             $Select_Count2="SELECT SKILL_CATG FROM skill_master WHERE SKILL_ID=$skillrow1"; 
             foreach($connection->createCommand($Select_Count2)->queryAll() as $value)
             {
                if($i!=count($secarr2)-1)
                {                 
                  $sec_skill1.=$value['SKILL_CATG'].",";

                } 
                else
                {
                $sec_skill1.=$value['SKILL_CATG'];
                }
            }
                       
                    }
             
               $model->EJP_SEC_SKILL_CATG=$sec_skill1;
            }
            else
            {
                 $model->EJP_SEC_SKILL_CATG='';
            }
     
          $EJP_SUBSCR_ID=$model->EJP_SUBSCR_ID;
          $esubdata= EmployerSubscription::model()->findByAttributes(array('ESUB_ID'=>$EJP_SUBSCR_ID));
     
            $data1= SubscriptionMaster::model()->findByAttributes(array('SUBSCRS_ID'=>$esubdata->ESUB_SUBSCRS_ID));
            $model->EJP_SUBSCR_ID=$data1->SUBSCR_DESC;
           $this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            
		$jobposting=new JobPosting;
                $Ques_Ids='';
                    
                $JobName=new JobMaster;
		if(isset($_POST['JobPosting']))
		{
                 
                    $jobposting->attributes=$_POST['JobPosting'];
                    $jobposting->EJP_EMAIL_SENT_COUNT=$_POST['JobPosting']['email_count'];
                    $post_dur=$_POST['JobPosting']['post_dur'];
                    $EJP_PRIMARY_SKILL_CATG=$jobposting->EJP_PRIMARY_SKILL_CATG;
                    $EJP_PRIMARY_SKILL_CATG=explode(',',$EJP_PRIMARY_SKILL_CATG);
                    $EJP_SEC_SKILL_CATG=$jobposting->EJP_SEC_SKILL_CATG;
                    
           
                   
                    $maillist=$jobposting->EJP_CAND_EMAIL_ID;
                    $maillistarr=explode(';',$maillist);
                
                    if($jobposting->EJP_VIDEO_Y_N=='')
                    {
                     $jobposting->EJP_VIDEO_Y_N=0;   
                    }
                    else
                    {
                       $jobposting->EJP_VIDEO_Y_N=1; 
                    }
                   
                    $jobposting->EJP_EMP_ID=yii::app()->session['Emp_Id'];
                    $jobposting->EJP_POST_STATUS=1;
                    $primaryarr=array();
                    $secarr=array();
                    foreach($EJP_PRIMARY_SKILL_CATG as $primaryskill)
                    {
                          $primaryarr[]=$primaryskill;
                    }
                    if($EJP_SEC_SKILL_CATG!='')
                    {
                     foreach ($EJP_SEC_SKILL_CATG as $secskill)
                    {
                          $secarr[]=$secskill;
                    }
                     $jobposting->EJP_SEC_SKILL_CATG= implode(',',$secarr);  
                   
                    }
                    $jobposting->EJP_PRIMARY_SKILL_CATG= implode(',',$primaryarr);
                    $jobposting->EJP_POST_START_DATE= date('Y-m-d');
                    $jobposting->EJP_DATE= date('Y-m-d');
                    $jobposting->EJP_LAST_UPDATE_DATE= new CDbExpression('NOW()');
                  //  $jobposting->EJP_POST_END_DATE=$jobposting->EJP_TEST_DUE_DATE;
                    if($jobposting->EJP_TEST_DUE_DATE==$jobposting->EJP_POST_START_DATE)
                    {
                        $can_dur=1;
                    }
                      else
                     {
                     $can_dur = (strtotime( $jobposting->EJP_TEST_DUE_DATE) - strtotime($jobposting->EJP_POST_START_DATE)) / (60 * 60 * 24);
                      }

                    $jobposting->EJP_CAND_ACTIVE_DAYS= $can_dur;
                    $jobposting->EJP_POST_END_DATE= date('Y-m-d', strtotime("+{$post_dur} days"));
                    $Emp_Detail=EmployerMaster::model()->findByAttributes(array('EMP_ID'=>yii::app()->session['Emp_Id']));
                    $Job=JobMaster::model()->findByAttributes(array('JOB_ID'=>$jobposting->EJP_JOB_ID));
                    $Job_Name=$Job->JOB_NAME;
                    $rolemaster=RoleMaster::model()->findByattributes(array('ROLE_ID'=>$jobposting->EJP_ROLE_ID));
                    $role_name=$rolemaster->ROLE_NAME;
                     $jobposting->UPDATED_DATE=new CDbExpression('NOW()');
                     $jobposting->CREATED_DATE=new CDbExpression('NOW()');  
                    if($jobposting->save())
                    {   
                        $EPE_EJP_ID=$jobposting->getPrimaryKey();
                        $jobpostedit=new JobPostEdit;
                        $jobpostedit->EPE_EJP_ID=$EPE_EJP_ID;
                        $jobpostedit->EPE_START_DATE= $jobposting->EJP_POST_START_DATE;
                        $jobpostedit->EPE_CAND_ACTIVE_DAYS=$jobposting->EJP_CAND_ACTIVE_DAYS;
                        $jobpostedit->EPE_END_DATE= $jobposting->EJP_POST_END_DATE;
                        $jobpostedit->EPE_MAIL_LIST=$jobposting->EJP_CAND_EMAIL_ID;
                        $jobpostedit->EPE_MAIL_SENT_COUNT=$jobposting->EJP_EMAIL_SENT_COUNT;
                        $jobpostedit->EPE_VIDEO_Y_N=$jobposting->EJP_VIDEO_Y_N;
                        $jobpostedit->EPE_CAND_ACTIVE_DAYS=$jobposting->EJP_CAND_ACTIVE_DAYS;
                        $jobpostedit->EPE_TEST_DUE_DATE=$jobposting->EJP_TEST_DUE_DATE;
                        $jobpostedit->EPE_TEST_DURATION=$jobposting->EJP_TEST_DURATION;
                        $jobpostedit->EPE_NO_QUES=$jobposting->EJP_NO_QUES;
                        $jobpostedit->UPDATED_DATE=new CDbExpression('NOW()');
                        $jobpostedit->CREATED_DATE=new CDbExpression('NOW()'); 
                        yii::app()->session['mail_sent']=$jobposting->EJP_EMAIL_SENT_COUNT;
                        
                        $subsid=$_POST['JobPosting']['EJP_SUBSCR_ID'];
                        $connection=Yii::app()->db;
                  
                        $Select_Count1="select ESUB_REMAIN_COUNT,ESUB_UTILIZED_COUNT from employer_subscription
                                        where ESUB_ID=".$subsid.
                                        " and ESUB_EMP_ID=".yii::app()->session['Emp_Id'] ;
                        
                        foreach($connection->createCommand($Select_Count1)->queryAll() as $value)
                          {
                              $rem_count=$value['ESUB_REMAIN_COUNT'];
                              $Uti_Count=$value['ESUB_UTILIZED_COUNT'];
                          }
                          
                        $update_count1=$rem_count-yii::app()->session['mail_sent'];
                        $update_count2=$Uti_Count+yii::app()->session['mail_sent'];
                        if($update_count1==0)
                        {
                          $ESUB_STATUS=',ESUB_STATUS=0' ;
                        }
                        else
                        {
                           $ESUB_STATUS=''; 
                        }
                        $UPDATED_DATE=new CDbExpression('NOW()');
                        $sql2="update employer_subscription set ESUB_REMAIN_COUNT=".$update_count1.
                                                            ",ESUB_UTILIZED_COUNT=".$update_count2.$ESUB_STATUS.
                                                            ",UPDATED_DATE=".$UPDATED_DATE.
                                                            " where ESUB_ID=".$subsid.
                                                            " and ESUB_EMP_ID=".yii::app()->session['Emp_Id'];
                        $connection->createCommand($sql2)->execute();
                        
                        $jobpostedit->save();
                    
                        $EPE_ID=$jobpostedit->getPrimaryKey();
                        /*$upload= CUploadedFile::getInstance($jobposting, 'xmlFile');
                        if($upload!='')
                        {
                        $da=rand(date('ymdhms'));
                        $path= "{$da}{$upload}";
                        }
                        
                        if($path!='')
                        {
                            $upload->saveAs('xlsfile/'.$path);
                        }*/
                    
                   }
                   $email = Yii::createComponent('application.extensions.mailer.EMailer');
                    foreach($maillistarr as $cand_mail)
                    {
                    $email->From = Yii::app()->params['RegEmail'];
                    $email->FromName = Yii::app()->params['RegName'];
                    $email->AddReplyTo(Yii::app()->params['RegEmail']);
                    $email->AddAddress($cand_mail);
                    $email->CharSet = 'UTF-8';
                    $email->Subject = 'Test Notification from '.$Emp_Detail->EMP_COMP_NAME .' for  '.$Job_Name . ' '.$role_name.''; 
                    $email->MsgHTML($this->renderPartial('mail', array('cand_mail' => $cand_mail,'EPE_ID'=>$EPE_ID,'posting_id'=>$EPE_EJP_ID,'EMP_COMP_NAME'=>$Emp_Detail->EMP_COMP_NAME), true));
                    $email->Send();
                    $email->ClearAddresses();
                    $email->ClearCCs();
                    $email->ClearBCCs();
                    $email->ClearReplyTos();
                    $email->ClearAllRecipients();
                    $email->ClearAttachments();
                    $email->ClearCustomHeaders();
                    }
                                        
   
                  if($jobposting->EJP_SUBSCR_ID=='19')
                  {
                      $referralclaims=new ReferralClaims;
                      $referralclaims->ERC_EMP_ID=$jobposting->EJP_EMP_ID;
                      $referralclaims->ERC_EJP_ID=$EPE_EJP_ID;
                      $referralclaims->ERC_DATE=new CDbExpression('NOW()');
                      if($referralclaims->save())
                      {    
                          //Insert into emp_referral_claims 
                          $Select_Count="select COUNT(*) as COUNT, REF_ACT_CREDITS,REF_UTILIZED_CREDITS from employer_referrals
                              where REF_EMP_ID=".yii::app()->session['Emp_Id'];
                          $connection=yii::app()->db;
                          foreach($connection->createCommand($Select_Count)->queryAll() as $value)
                          {    
                              $Count=$value['COUNT'];
                              $Act_count=$value['REF_ACT_CREDITS'];
                              $Util_Count=$value['REF_UTILIZED_CREDITS'];
                          }
                          if($Count>0)
                          {
                          $Upd_Act_Count=$Act_count-1;
                          $Upd_Util_Count=$Util_Count+1;
                          $Update_Count="update employer_referrals set REF_ACT_CREDITS=".$Upd_Act_Count.
                                                                ",REF_UTILIZED_CREDITS=".$Upd_Util_Count.
                                                       " where REF_EMP_ID=".yii::app()->session['Emp_Id'];
                          
                          $connection->createCommand($Update_Count)->execute();
                          }
                      }
                  }
                  if($jobposting->EJP_FLAG_UPLOAD_QUES==0)
                  {
                      foreach ($EJP_PRIMARY_SKILL_CATG as $primaryskill)
                     {
                       $mapques= MapQuesMaster::model()->findAllByAttributes(array('MAP_JOB_ID'=>$jobposting->EJP_JOB_ID,'MAP_SKILL_ID'=>$primaryskill,'MAP_QUES_STATUS'=>1));
                         // $primaryarr[]=$primaryskill;
                        if(!empty($mapques))
                        {
                        foreach($mapques as $mapquesvalue)
                          {
                            $jplev_2=new JobPostLevel_2;
                            $jplev_2->EJPL2_QUES_ID=$mapquesvalue->MAP_QUES_ID;
                            $jplev_2->EJPL2_SKILL_ID=$map_skill_id=$mapquesvalue->MAP_SKILL_ID;
                            $jplev_2->EJPL2_EJP_ID=$EPE_EJP_ID;
                            $jplev_2->EJPL2_EPE_ID=$EPE_ID;
                            $jplev_2->EJPL2_PR_SEC_FLAG='P';
                            if($jplev_2->save())
                            {
                                    $Ques_Ids.=$mapquesvalue->MAP_QUES_ID.",";
                            }
                          }
                        }
                     }
                    if($EJP_SEC_SKILL_CATG!='')
                    {
                       
                    foreach ($EJP_SEC_SKILL_CATG as $secskill)
                    {
                       
                       $mapques= MapQuesMaster::model()->findAllByAttributes(array('MAP_JOB_ID'=>$jobposting->EJP_JOB_ID,'MAP_SKILL_ID'=>$secskill,'MAP_QUES_STATUS'=>1));
                       
                       if(!empty($mapques))
                       {
                       foreach($mapques as $mapquesvalue)
                       {
                          
                            $jplev_2=new JobPostLevel_2;
                            $jplev_2->EJPL2_QUES_ID=$mapquesvalue->MAP_QUES_ID;
                            $jplev_2->EJPL2_SKILL_ID=$map_skill_id=$mapquesvalue->MAP_SKILL_ID;
                            $jplev_2->EJPL2_EJP_ID=$jobposting->getPrimaryKey();
                            $jplev_2->EJPL2_EPE_ID=$EPE_ID;
                            $jplev_2->EJPL2_PR_SEC_FLAG='S';
                            $connection=Yii::app()->db;
                            $sql="Select count(*) from employer_job_post_level_2 where EJPL2_SKILL_ID=$secskill and  EJPL2_QUES_ID=$jplev_2->EJPL2_QUES_ID and EJPL2_EJP_ID=$EPE_EJP_ID";
                            $countlev_r=$connection->createCommand($sql)->queryScalar();
                            if($countlev_r==0)
                            {
                                 $jplev_2->save(); 
                            }
                       }
            
                      } 
                    }
                   }
                   $this->redirect(array('posting_suc','maillist'=>$maillist));             
                  }
                  else
                  {
                   
                     // echo $jobposting->xmlfile= $_POST['JobPosting'];
        
                     // echo $upload= CUploadedFile::getInstanceById("name"); 
                       $jobposting->attributes= $_POST['JobPosting'];

                      // $upload= CUploadedFile::getInstance($jobposting,'xmlFile');
                       $upload = CUploadedFile::getInstanceByName("xmlFile"); 
                        if($upload!='')
                        {
                        $da=date('ymdhms');
                        $path= "{$da}{$upload}";
                        }                                       
                        if($path!='')
                        {
                            $upload->saveAs('xlsfile/'.$path);
                        }
                     
                         $this->render('upload_question',array('temp'=>$path,'EQU_EJP_ID'=>$jobposting->getPrimaryKey(),'maillist'=>$maillist,'EPE_ID'=>$EPE_ID));        
                  }
                  	
                     
              
}
/* To get Emp Sub details*/
        
        $data= EmployerSubscription::model()->findAllByAttributes(array('ESUB_EMP_ID'=>yii::app()->session['Emp_Id']));
        $criteria=new CDbCriteria();
        $criteria->condition='ESUB_EMP_ID='.yii::app()->session['Emp_Id'].' and ESUB_REMAIN_COUNT>0 and ESUB_STATUS=1';
        $criteria->distinct=true;
      
        $data=EmployerSubscription::model()->findAll($criteria);
        $a=array();
        $b=array();
        $countemp=count($data);
        if($countemp>0)
        {  
    	foreach($data as $v)
        {
            $esu=$v->ESUB_SUBSCRS_ID;
            $data1= SubscriptionMaster::model()->findByAttributes(array('SUBSCRS_ID'=>$esu));
            $countesu=count($data1);
            if($countesu>0)
            {
                $a[]=$data1->SUBSCR_DESC;
               $b[]=$v->ESUB_ID;
            }
            //print_r($b);
           
          
        } 
        $this->render('create',array(
			'jobposting'=>$jobposting,'a'=>$a,'b'=>$b,'JobName'=>$JobName
                                                            ));
        }
        else
        {          
                    $this->render('create',array(
			'jobposting'=>$jobposting,'JobName'=>$JobName
                                                            ));
        }
//$c = array_combine($a, $b);
//print_r($c);
                
//        $this->renderInternal('view',$data=null,true);
	}

          
                        
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$jobposting=$this->loadModel($id);
                $jobselect= JobPosting::model()->findByAttributes(array('EJP_ID'=>$id));
                $ejp_pri=$jobselect->EJP_PRIMARY_SKILL_CATG;
                $EPE_EJP_ID=$id;
              
            if(isset($_POST['JobPosting']))
	    {
                
                        $jobposting->attributes=$_POST['JobPosting'];
                        $jobpostedit=new JobPostEdit;
                        $jobpostedit->EPE_EJP_ID=$jobposting->EJP_ID;
                        $jobpostedit->EPE_START_DATE= new CDbExpression('NOW()');           
                        $actdays=$jobposting->EJP_CAND_ACTIVE_DAYS;
                        $jobpostedit->EPE_END_DATE= date('Y-m-d', strtotime("+{$actdays} days"));
                        //$jobpostedit->EPE_MAIL_SENT_COUNT=$jobposting->EJP_EMAIL_SENT_COUNT;
                        $jobpostedit->EPE_MAIL_SENT_COUNT=$_POST['JobPosting']['email_count'];
                        $jobpostedit->EPE_CAND_ACTIVE_DAYS=$jobposting->EJP_CAND_ACTIVE_DAYS;
                        $EJP_PRIMARY_SKILL_CATG=$jobposting->EJP_PRIMARY_SKILL_CATG;
                        $EJP_SEC_SKILL_CATG=$jobposting->EJP_SEC_SKILL_CATG;
                        $jobpostedit->EPE_MAIL_LIST=$jobposting->EJP_CAND_EMAIL_ID;
                        $maillistarr=explode(';',$jobpostedit->EPE_MAIL_LIST);
                        $jobposting->EJP_LAST_UPDATE_DATE=new CDbExpression('NOW()');
                        $jobposting->EJP_DATE= date('Y-m-d');
                        //$jobposting->EJP_LAST_UPDATE_DATE= date('Y-m-d');
                        $jobpostedit->EPE_TEST_DUE_DATE=$jobposting->EJP_TEST_DUE_DATE;
                        $jobpostedit->EPE_TEST_DURATION=$jobposting->EJP_TEST_DURATION;
                        $jobpostedit->EPE_NO_QUES=$jobposting->EJP_NO_QUES;
                        $jobpostedit->UPDATED_DATE=new CDbExpression('NOW()');
                        $jobpostedit->CREATED_DATE=new CDbExpression('NOW()');  
                        $primaryarr=array();
                        $secarr=array();
                        foreach ($EJP_PRIMARY_SKILL_CATG as $primaryskill)
                        {
                        $primaryarr[]=$primaryskill;
                        }
                        $jobposting->EJP_PRIMARY_SKILL_CATG= implode(',',$primaryarr);

                        if($EJP_SEC_SKILL_CATG!='')
                        {
                        foreach ($EJP_SEC_SKILL_CATG as $secskill)
                        {
                              $secarr[]=$secskill;
                        }
                        $jobposting->EJP_SEC_SKILL_CATG= implode(',',$secarr);  
                        }
                          if($jobposting->EJP_VIDEO_Y_N=='')
                        {
                         $jobposting->EJP_VIDEO_Y_N=0;   
                        }
                        else
                        {
                           $jobposting->EJP_VIDEO_Y_N=1; 
                        }
                        $jobposting->EJP_FLAG_UPLOAD_QUES=$jobselect->EJP_FLAG_UPLOAD_QUES;
//                           if($jobposting->EJP_FLAG_UPLOAD_QUES=='')
//                        {
//                         $jobposting->EJP_FLAG_UPLOAD_QUES=0;   
//                        }
//                        else
//                        {
//                           $jobposting->EJP_FLAG_UPLOAD_QUES=1; 
//                        }
                        if($jobposting->EJP_TEST_DUE_DATE==$jobposting->EJP_POST_START_DATE)
                       {
                           $can_dur=1;
                       }
                       else
                       {
                       $can_dur = (strtotime( $jobposting->EJP_TEST_DUE_DATE) - strtotime($jobposting->EJP_POST_START_DATE)) / (60 * 60 * 24);
                       }
                        $jobpostedit->EPE_VIDEO_Y_N=$jobposting->EJP_VIDEO_Y_N;
                        $jobpostedit->EPE_CAND_ACTIVE_DAYS=$can_dur;
                        $Emp_Detail=EmployerMaster::model()->findByAttributes(array('EMP_ID'=>yii::app()->session['Emp_Id']));
                        $Job=JobMaster::model()->findByAttributes(array('JOB_ID'=>$jobposting->EJP_JOB_ID));
                        $Job_Name=$Job->JOB_NAME;
                        $rolemaster=RoleMaster::model()->findByattributes(array('ROLE_ID'=>$jobposting->EJP_ROLE_ID));
                        $role_name=$rolemaster->ROLE_NAME;


                        if($jobpostedit->save())
                        {  

                        $EPE_ID=$jobpostedit->getPrimaryKey();
                        $connection=Yii::app()->db;
                        $Select_Old_Count="select EJP_EMAIL_SENT_COUNT from employer_job_posting where EJP_ID=".$id;
                        $Old_Count=$connection->createCommand($Select_Old_Count)->queryScalar();
                        yii::app()->session['mail_sent']=$jobpostedit->EPE_MAIL_SENT_COUNT;
                        $Mail_Count=$Old_Count + $jobpostedit->EPE_MAIL_SENT_COUNT;
                        $UPDATED_DATE=new CDbExpression('NOW()');
    //                    $Select_Mail_Count="SELECT EPE_MAIL_SENT_COUNT from  employer_post_edits where EPE_EJP_ID=".$jobposting->EJP_ID;
    //                    $Mail_Count=$connection->createCommand($Select_Mail_Count)->queryScalar();
                        $updatesql ='UPDATE  employer_job_posting set 
                        EJP_PRIMARY_SKILL_CATG="'.$jobposting->EJP_PRIMARY_SKILL_CATG.'",
                        EJP_SEC_SKILL_CATG="'.$jobposting->EJP_SEC_SKILL_CATG.'",
                        EJP_EMAIL_SENT_COUNT='.$Mail_Count.',
                        EJP_LAST_UPDATE_DATE='.$jobposting->EJP_LAST_UPDATE_DATE.',
                        EJP_FLAG_UPLOAD_QUES='.$jobposting->EJP_FLAG_UPLOAD_QUES.',

                        EJP_SUBSCR_ID='.$jobposting->EJP_SUBSCR_ID.',
                        EJP_VIDEO_Y_N='.$jobposting->EJP_VIDEO_Y_N.',    
                        UPDATED_DATE='.$UPDATED_DATE.'
                        where  EJP_ID="'.$id.'"';

                        $connection->createCommand($updatesql)->execute(); 
                        $email = Yii::createComponent('application.extensions.mailer.EMailer');
                        foreach($maillistarr as $cand_mail)
                        {
                        $email->From = Yii::app()->params['RegEmail'];
                        $email->FromName = Yii::app()->params['RegName'];
                        $email->AddReplyTo(Yii::app()->params['RegEmail']);
                        $email->AddAddress($cand_mail);
                        $email->CharSet = 'UTF-8';
                        $email->Subject = 'Test Notification from '.$Emp_Detail->EMP_COMP_NAME .' for  '.$Job_Name . ' '.$role_name.'';
                        $email->MsgHTML($this->renderPartial('mail', array('cand_mail' => $cand_mail,'posting_id'=>$id,'EPE_ID'=>$EPE_ID,'EMP_COMP_NAME'=>$Emp_Detail->EMP_COMP_NAME), true));
                        $email->Send();
                        $email->ClearAddresses();
                        $email->ClearCCs();
                        $email->ClearBCCs();
                        $email->ClearReplyTos();
                        $email->ClearAllRecipients();
                        $email->ClearAttachments();
                        $email->ClearCustomHeaders();
                        }
                         $subsid=$_POST['JobPosting']['EJP_SUBSCR_ID'];
                         $connection=Yii::app()->db;
                         $Select_Count1="select ESUB_REMAIN_COUNT,ESUB_UTILIZED_COUNT from employer_subscription
                                            where ESUB_ID=".$subsid.
                                            " and ESUB_EMP_ID=".yii::app()->session['Emp_Id'] ;
                         foreach($connection->createCommand($Select_Count1)->queryAll() as $value)
                         {
                                  $rem_count=$value['ESUB_REMAIN_COUNT'];
                                  $Uti_Count=$value['ESUB_UTILIZED_COUNT'];
                         }
                         $update_count1=$rem_count-yii::app()->session['mail_sent'];
                         $update_count2=$Uti_Count+yii::app()->session['mail_sent'];
                         if($update_count1==0)
                         {
                              $ESUB_STATUS=',ESUB_STATUS=0' ;
                         }
                         else
                         {
                               $ESUB_STATUS=''; 
                         }
                         $sql2="update employer_subscription set ESUB_REMAIN_COUNT=".$update_count1.
                                                                ",ESUB_UTILIZED_COUNT=".$update_count2.$ESUB_STATUS.
                                                                ",UPDATED_DATE=".$UPDATED_DATE.
                                                                " where ESUB_ID=".$subsid.
                                                                " and ESUB_EMP_ID=".yii::app()->session['Emp_Id'];
                          $connection->createCommand($sql2)->execute();
                      if($jobposting->EJP_SUBSCR_ID=='19')
                      {
                          $referralclaims=new ReferralClaims;
                          $referralclaims->ERC_EMP_ID=$jobposting->EJP_EMP_ID;
                          $referralclaims->ERC_EJP_ID=$EPE_EJP_ID;
                          $referralclaims->ERC_DATE=new CDbExpression('NOW()');
                          if($referralclaims->save())
                          {    
                              //Insert into emp_referral_claims 
                              $Select_Count="select COUNT(*) as COUNT, REF_ACT_CREDITS,REF_UTILIZED_CREDITS from employer_referrals
                                  where REF_EMP_ID=".yii::app()->session['Emp_Id'];
                              $connection=yii::app()->db;
                              foreach($connection->createCommand($Select_Count)->queryAll() as $value)
                              {    
                                  $Count=$value['COUNT'];
                                  $Act_count=$value['REF_ACT_CREDITS'];
                                  $Util_Count=$value['REF_UTILIZED_CREDITS'];
                              }
                              if($Count>0)
                              {
                              $Upd_Act_Count=$Act_count-1;
                              $Upd_Util_Count=$Util_Count+1;
                              $Update_Count="update employer_referrals set REF_ACT_CREDITS=".$Upd_Act_Count.
                                                                    ",REF_UTILIZED_CREDITS=".$Upd_Util_Count.
                                                           " where REF_EMP_ID=".yii::app()->session['Emp_Id'];

                              $connection->createCommand($Update_Count)->execute();
                              }
                          }
                      }
                      
                    /* QUESTION TAKEN FROM OUR  DB*/
                        if($jobposting->EJP_FLAG_UPLOAD_QUES==0)
                        {
                        /* $sql = 'delete FROM  employer_job_post_level_2 WHERE EJPL2_EJP_ID='.$jobpostedit->EPE_EJP_ID.' and  EJPL2_SKILL_ID NOT IN ('.$jobposting->EJP_PRIMARY_SKILL_CATG.') and EJPL2_PR_SEC_FLAG="P"';
                        $connection->createCommand($sql)->execute();*/

                        foreach ($EJP_PRIMARY_SKILL_CATG as $primaryskill)
                        {

                           $mapques= MapQuesMaster::model()->findAllByAttributes(array('MAP_JOB_ID'=>$jobposting->EJP_JOB_ID,'MAP_SKILL_ID'=>$primaryskill,'MAP_QUES_STATUS'=>1));
                           if(!empty($mapques))
                           {
                           foreach($mapques as $mapquesvalue)
                           {
                                $jplev_2=new JobPostLevel_2;
                                $jplev_2->EJPL2_QUES_ID=$mapquesvalue->MAP_QUES_ID;
                                $jplev_2->EJPL2_SKILL_ID=$map_skill_id=$mapquesvalue->MAP_SKILL_ID;
                                $jplev_2->EJPL2_EJP_ID=$id;
                                $jplev_2->EJPL2_EPE_ID=$EPE_ID;
                                $jplev_2->EJPL2_PR_SEC_FLAG='P';
                                try
                                {

                                    $jplev_2->save();
                                }
                                catch(Exception $e) // an exception is raised if a query fails
                                 {

                                 }

                              }
                            }
                         }

                        if($EJP_SEC_SKILL_CATG!='')
                        {
                        /* $sql = 'delete FROM  employer_job_post_level_2 WHERE EJPL2_EJP_ID='.$id.' and  EJPL2_SKILL_ID NOT IN ('.$jobposting->EJP_SEC_SKILL_CATG.') and EJPL2_PR_SEC_FLAG="S"';
                        $connection->createCommand($sql)->execute();*/
                        foreach ($EJP_SEC_SKILL_CATG as $secskill)
                        {

                           $mapques= MapQuesMaster::model()->findAllByAttributes(array('MAP_JOB_ID'=>$jobposting->EJP_JOB_ID,'MAP_SKILL_ID'=>$secskill,'MAP_QUES_STATUS'=>1));

                           if(!empty($mapques))
                           {
                           foreach($mapques as $mapquesvalue)
                           {

                                $jplev_2=new JobPostLevel_2;
                                $jplev_2->EJPL2_QUES_ID=$mapquesvalue->MAP_QUES_ID;
                                $jplev_2->EJPL2_SKILL_ID=$map_skill_id=$mapquesvalue->MAP_SKILL_ID;
                                $jplev_2->EJPL2_EJP_ID=$id;
                                $jplev_2->EJPL2_EPE_ID=$EPE_ID;
                                $jplev_2->EJPL2_PR_SEC_FLAG='S';
                                /*$sql="Select count(*) from employer_job_post_level_2 where EJPL2_SKILL_ID=$secskill and  EJPL2_QUES_ID=$jplev_2->EJPL2_QUES_ID and EJPL2_EJP_ID=$EPE_EJP_ID";
                                $countlev_r=$connection->createCommand($sql)->queryScalar();
                                if($countlev_r==0)
                                {
                                     $jplev_2->save(); 
                                }*/
                                try
                                {
                                    $jplev_2->save();
                                }
                                catch(Exception $e) // an exception is raised if a query fails
                                {

                                }

                           }

                          } 
                        }
                       }
                         $this->redirect(array('posting_suc','maillist'=>$jobpostedit->EPE_MAIL_LIST));    
                     // $this->redirect(array('view','id'=>$jobposting->EJP_ID));               
                      }
                      
                      /* QUESTION WILL BE UPLAODED BY EMPLOYEE*/
                      else
                      {
                          if($_POST['file_upload']!='')
                          {
                         // echo $jobposting->xmlfile= $_POST['JobPosting'];

                         // echo $upload= CUploadedFile::getInstanceById("name"); 
                           $jobposting->attributes= $_POST['JobPosting'];

                           //$upload= CUploadedFile::getInstance($jobposting,'xmlFile');
                             $upload = CUploadedFile::getInstanceByName("xmlFile"); 
                            if($upload!='')
                            {
                            $da=date('ymdhms');
                            $path= "{$da}{$upload}";
                            }                                       
                            if($path!='')
                            {
                                $upload->saveAs('xlsfile/'.$path);
                            }

                             $this->render('upload_question',array('temp'=>$path,'EQU_EJP_ID'=>$id,'EPE_ID'=>$EPE_ID));     exit;         
                          }
                          else
                          {
                           $epdquery="select EPE_ID from employer_post_edits where EPE_EJP_ID=".$id. " order by EPE_ID ASC LIMIT 0,1";
                           $epdidsql=$connection->createCommand($epdquery)->queryAll();  
                           $EPE_ID_last=$epdidsql[0]['EPE_ID'];
                           $empquesupload= EmpQuestionUpload::model()->findByAttributes(array('EQU_EJP_ID'=>$id,'EQU_EPE_ID'=>$EPE_ID_last));
                           
                           
                           if(!empty($empquesupload))
                           {
                          
                              $sql="INSERT INTO `employer_ques_upload`
                                 (`EQU_EJP_ID`,
                                 `EQU_EPE_ID`,
                                 `EQU_QUES_DESC`,
                                 `EQU_OPT_CDE_1`, 
                                 `EQU_OPT_1`,
                                 `EQU_OPT_CDE_2`,
                                 `EQU_OPT_2`,
                                 `EQU_OPT_CDE_3`,
                                 `EQU_OPT_3`, 
                                 `EQU_OPT_CDE_4`,
                                 `EQU_OPT_4`,
                                 `EQU_OPT_CDE_5`, 
                                 `EQU_OPT_5`,
                                 `EQU_OPT_CDE_6`,
                                 `EQU_OPT_6`,
                                 `EQU_ANS_OPT_CDE`,
                                 `EQU_ANS_OPT`)
                                  SELECT 
                                 `EQU_EJP_ID`, 
                                 $EPE_ID,
                                 `EQU_QUES_DESC`, 
                                 `EQU_OPT_CDE_1`, 
                                 `EQU_OPT_1`,
                                 `EQU_OPT_CDE_2`,
                                 `EQU_OPT_2`,
                                 `EQU_OPT_CDE_3`, 
                                 `EQU_OPT_3`,
                                 `EQU_OPT_CDE_4`,
                                 `EQU_OPT_4`,
                                 `EQU_OPT_CDE_5`, 
                                 `EQU_OPT_5`,
                                 `EQU_OPT_CDE_6`,
                                 `EQU_OPT_6`, 
                                 `EQU_ANS_OPT_CDE`,
                                 `EQU_ANS_OPT` 
                                  FROM `employer_ques_upload`
                                  WHERE `EQU_EJP_ID`=$empquesupload->EQU_EJP_ID and `EQU_EPE_ID`=$empquesupload->EQU_EPE_ID" ;
                             
                              $connection->createCommand($sql)->execute(); 
                               
                          
                           }
                           
                    
                              
                              
             }
                             
                      } 
                      }
                            $this->forward('admin');
                            //$this->redirect(array('admin'));
                    }

                 /* To get Emp Sub details*/   
            $criteria=new CDbCriteria();
            $criteria->condition='ESUB_EMP_ID='.yii::app()->session['Emp_Id'].' and ESUB_REMAIN_COUNT>0 and ESUB_STATUS=1';
            $criteria->distinct=true;
            $data=EmployerSubscription::model()->findAll($criteria);
            $a=array();
            $b=array();
            $countemp=count($data);
            if($countemp>0)
            {  
            foreach($data as $v)
            {
                $esu=$v->ESUB_SUBSCRS_ID;
                $data1= SubscriptionMaster::model()->findByAttributes(array('SUBSCRS_ID'=>$esu));
                $countesu=count($data1);
                if($countesu>0)
                {
                    $a[]=$data1->SUBSCR_DESC;
                   $b[]=$v->ESUB_ID;
                }
                //print_r($b);


            } 
        }
          /* primary skills and sec skills ,already sent email */
            $EJP_PRIMARY_SKILL_CATG=$jobposting->EJP_PRIMARY_SKILL_CATG;
            $EJP_SEC_SKILL_CATG=$jobposting->EJP_SEC_SKILL_CATG;
            $connection=yii::app()->db;
            $primarysql="SELECT SKILL_CATG FROM skill_master WHERE  SKILL_ID IN(".$EJP_PRIMARY_SKILL_CATG.")";
            $primary=$connection->createCommand($primarysql)->queryAll();
            if($EJP_SEC_SKILL_CATG!='')
            {
            $secsql="SELECT SKILL_CATG FROM skill_master WHERE  SKILL_ID IN(".$EJP_SEC_SKILL_CATG.")";
            $sec=$connection->createCommand($secsql)->queryAll();
            }
            else
            {
             $sec='';  
            }
            $ejpcan_email="SELECT group_concat(EPE_MAIL_LIST) as ejp_can_email_id FROM employer_post_edits  , employer_job_posting  WHERE EJP_EMP_ID=$jobposting->EJP_EMP_ID and EPE_EJP_ID=EJP_ID";
            $ejpcanarr=$connection->createCommand($ejpcan_email)->queryAll(); 

	    $this->render('update',array(
			'model'=>$jobposting,'primary'=>$primary,'sec'=>$sec,'a'=>$a,'b'=>$b,'ejpcanarr'=>$ejpcanarr,'id'=>$id
		));
	}
        public function actionViewCandidateScore()
        {
           $model=new TestSummary();
           //
            $Job_Post_Id=$_GET['Job_Post_Id'];
           $this->render('ViewCandidateScore',array(
			'model'=>$model,
		));
        
          
       
  
//         $this->render('ViewCandidateScore');   
}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('JobPosting');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new JobPosting('search');
		$model->unsetAttributes();  // clear any default values
              
                            
		if(isset($_GET['JobPosting']))
			$model->attributes=$_GET['JobPosting'];
//              $empty=$model->attributes=['EJP_NAME'];
                $jpmcount=JobPosting::model()->count();
		$this->render('admin',array(
			'model'=>$model,'action'=>'view','jpmcount'=>$jpmcount //'emptypost'=>$empty
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return JobPosting the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=JobPosting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param JobPosting $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='job-posting-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
     
      public function actionSkilldetails()
      {
          
           $command_id = $_POST['JobPosting']['EJP_JOB_ID'];
	
       $data=SkillMaster::model()->findAllByAttributes(array('SKILL_JOB_ID'=>$command_id));
//         //$data=CHtml::listData($data,'SKILL_ID','SKILL_CATG');
         $results = array();
         foreach($data as $p) 
             {
                $results[] = array(
                'id' => $p->SKILL_ID, 
                 'text' => $p->SKILL_CATG, );
             }
             echo CJSON::encode($results);
         
         $data1= RoleMaster::model()->findAllByAttributes(array('ROLE_JOB_ID'=>$command_id));
         $data1=CHtml::listData($data1,'ROLE_ID','ROLE_NAME');	
//	foreach($data as $value=>$skill) {
//	echo  CHtml::tag('option',array('value'=>$value),CHtml::encode($skill),true);
//     
//       }
        echo '@@@';
       // echo CHtml::tag('option',array('value'=>''),CHtml::encode('<- - select - ->'),true);
        foreach($data1 as $value=>$role) {
        echo  CHtml::tag('option',array('value'=>$value),CHtml::encode($role),true);
       	}
      
//	  $command_id = $_POST['JobPosting']['EJP_JOB_ID'];   
//        //echo  $command_id = $_POST['EJP_JOB_ID'];  
//         $data=SkillMaster::model()->findAllByAttributes(array('SKILL_JOB_ID'=>$command_id));
////         //$data=CHtml::listData($data,'SKILL_ID','SKILL_CATG');
//         $results = array();
//         foreach($data as $p) 
//             {
//                $results[] = array(
//                'id' => $p->SKILL_ID, 
//                 'text' => $p->SKILL_CATG, );
//             }
//             echo CJSON::encode($results);
//          //echo "'".CJSON::encode($results)."'";
////          $split=json_decode($json);
////          
////             
//echo  CHtml::tag('option',array('value'=>$id,'selected'=>'selected'),CHtml::encode($text),true);  
////          
//         
//          $data1= RoleMaster::model()->findAllByAttributes(array('ROLE_JOB_ID'=>$command_id));
//          $data1=CHtml::listData($data1,'ROLE_ID','ROLE_NAME');	
//            
//         
////	 foreach($data as $value=>$skill) 
////             {
////                echo  CHtml::tag('option',array('value'=>$value),CHtml::encode($skill),true);   
////             }
//         
//        echo '@@@';
//       
//       // echo CHtml::tag('option',array('value'=>''),CHtml::encode('<- - select - ->'),true);
//        foreach($data1 as $value=>$role)
//        {
//        echo  CHtml::tag('option',array('value'=>$value),CHtml::encode($role),true);
//       	}
      }
      public function actionPrimarySkill()
      {
          $id=$_POST['id'];
          $text=$_POST['text'];
          //$Job_Id=$_POST['EJP_JOB_ID'];
          $ids=explode(';',$id);
          $texts=explode(';',$text);
//          foreach ($ids as $p)
//                {
//               echo $pp[$p] = array('selected'=>'selected');
//                } 
      }
      public function actionsubvideodetails()
      {
              $EJP_SUBSCR_ID= $_POST['JobPosting']['EJP_SUBSCR_ID'];
  
//            $connection=Yii::app()->db;
//            $EJP_SUBSCR_ID="select EJP_SUBSCR_ID from employer_subscription,employer_job_posting
//                                        where ESUB_EMP_ID=".yii::app()->session['Emp_Id'].
//                                        " and ESUB_REMAIN_COUNT>0"   ;
           $esubdata= EmployerSubscription::model()->findByAttributes(array('ESUB_ID'=>$EJP_SUBSCR_ID,'ESUB_STATUS'=>1));
     
            $data1= SubscriptionMaster::model()->findByAttributes(array('SUBSCRS_ID'=>$esubdata->ESUB_SUBSCRS_ID));
            echo $data1->SUBSCRS_VIDEO_Y_N;
            echo '@#&&#@';
            echo $data1->SUBSCRS_POST_DURATION;
      }
            public function actionupload_questions()
        {
                //$model=new User;
          // $model = new QuestionMaster();
          $this->render('downloadlink');
        }  
        
        public  function actionmulticheck()
        {
            $this->render('multicheck');
            
        }
         public  function actionques_prev()
        {
       
        $jobposting->attributes=$_POST['JobPosting'];
        $EJP_JOB_ID=$jobposting->EJP_JOB_ID;
        $EJP_ROLE_ID=$jobposting->EJP_ROLE_ID;
        $EJP_PRIMARY_SKILL_CATG=$jobposting->EJP_PRIMARY_SKILL_CATG;
        $EJP_SEC_SKILL_CATG=$jobposting->EJP_SEC_SKILL_CATG;
                    
        }
        public function actionjob_result($Cand_Id,$ejp_id)
        {
            $model=new EmpJobPostResult;
            if(isset($_GET['EmpJobPostResult']))
        
            $model->attributes=$_GET['EmpJobPostResult'];
            $connection=Yii::app()->db;
            $sql = "SELECT * from emp_job_post_result where EJPR_CAND_ID=".$Cand_Id. " and EJPR_EJP_ID=$ejp_id";
            $cmd=$connection->createCommand($sql);
            foreach($cmd->queryAll() as $id){
            $model->EJPR_CAND_ID=$id['EJPR_CAND_ID']; 
            } 

           
            $sql1 = "SELECT SUM(EJPR_QUES_ASKED) as QUES_ASKED FROM emp_job_post_result WHERE EJPR_CAND_ID=".$Cand_Id . " and EJPR_EJP_ID=$ejp_id";
            $Cand_Detail=$connection->createCommand($sql1)->queryScalar();

       
            $sql2 = "SELECT SUM(EJPR_CORRECT_ANS) as CORRECT_ANS FROM emp_job_post_result WHERE EJPR_CAND_ID=".$Cand_Id . " and EJPR_EJP_ID=$ejp_id";
            $Cand_Detail1=$connection->createCommand($sql2)->queryScalar();


                $this->render('job_result',array(
                        'model'=>$model,'Cand_Detail'=>$Cand_Detail,'Cand_Detail1'=>$Cand_Detail1,'Cand_Id'=>$Cand_Id,'ejp_id'=>$ejp_id,
                )); 
                       
        }   
         public function actiondelebut($id)
        {
            //id;
           $Cand_Test_Result=CandidateTest::model()->findByAttributes(array('CAND_TEST_EJP_ID'=>$id));
           $countcandidate=count($Cand_Test_Result);
           if($countcandidate==0)
           {
              $deemp=EmployerReferrals::model()->deleteAllByAttributes(array('REF_EMP_ID'=>$id));	
                  $deemp=ReferralClaims::model()->deleteAllByAttributes(array('ERC_EJP_ID'=>$id));
                  $deemp=EmpJobPostResult::model()->deleteAllByAttributes(array('EJPR_EJP_ID'=>$id));
                  $deemp=TestSummary::model()->deleteAllByAttributes(array('CAND_TS_EJP_ID'=>$id));
                  $deemp=CandidateTest::model()->deleteAllByAttributes(array('CAND_TEST_EJP_ID'=>$id));
                  $deemp=CandidateUploadTest::model()->deleteAllByAttributes(array('CAND_UT_EJP_ID'=>$id));
                  $deemp=JobPostLevel_2::model()->deleteAllByAttributes(array('EJPL2_EJP_ID'=>$id));
                  $deemp=JobPostEdit::model()->deleteAllByAttributes(array('EPE_EJP_ID'=>$id));
                  $deemp=JobPosting::model()->deleteAllByAttributes(array('EJP_ID'=>$id));

           }
           else
           {
               echo '2';
           }
        }
        public function actionposting_suc($maillist)
        {
             $mailstr=str_replace(";",",",$maillist);
/*        echo      '<html><table style=" height: 400px;
          margin: 118px 300px ;
           color:green;font-size:21px"><tr><td><b>
            You have successfully posted new job on II-ME.
    Your Posting Link has been sent to the following Candidates. <br>.
    "'.$mailstr.'"</b></td></tr></table>';*/
                   $this->render('posting_suc',array('maillist'=>$mailstr));


        }
          public function actionPage()
       {
           // echo $action=  yii::app()->getController()->getAction()->controller->action->id;
        
//          echo   $jobval= $_POST['JobPosting']['EJP_JOB_ID'];
//          exit;
              $jobval= $_POST['JobPosting']['EJP_JOB_ID'];
              $rolevalue= $_POST['JobPosting']['EJP_ROLE_ID'];     
              if($_GET['action']=='update')
              {
                $priskillval=$_POST['JobPosting']['EJP_PRIMARY_SKILL_CATG'];
                foreach ($priskillval as $primaryskill)
              {
              $primaryarr[]=$primaryskill;
              }
             $priskillval= implode(',',$primaryarr);
              }
              else
              {
              $priskillval=$_POST['JobPosting']['EJP_PRIMARY_SKILL_CATG'];
              }
   
              /*  Before using Grid for job
               *             
              $priskillval=$_POST['JobPosting']['EJP_PRIMARY_SKILL_CATG'];
               * $secskillval=$_POST['JobPosting']['EJP_SEC_SKILL_CATG'];    
              $primaryarr=array();
             // $secarr=array();
              foreach ($priskillval as $primaryskill)
              {
              $primaryarr[]=$primaryskill;
              }
             $priskillval= implode(',',$primaryarr); */
             $Map_Search = RoleMaster::model()->findByAttributes(array('ROLE_ID'=>$rolevalue));
             $rolename= strtoupper($Map_Search->ROLE_NAME);
             $roleval="MAP_RFLAG_".$rolename;
             $connection=yii::app()->db;
             $secsql="select a.* from question_master a ,map_ques_master b where ques_id=map_ques_id and MAP_SKILL_ID IN(".$priskillval.") and MAP_JOB_ID=$jobval and `$roleval`=1 and MAP_FLAG_PREVIEW=1 LIMIT 0,10";
             $Cand_Test=$connection->createCommand($secsql)->queryAll();

           $this->renderPartial('fancyboxpage',array('Cand_Test'=>$Cand_Test), false, true);
        }
       public function actiongetemail()
       {
             //$canemail=$_POST['JobPosting']['EJP_CAND_EMAIL_ID'];
             $canemail=$_POST['email_id'];
             $sub=$_POST['sub'];
              $action=$_POST['action'];
             
          
             if($action=='update')
             {
             $EPE_EJP_ID=$_POST['id'];
             $canarr= explode(';', $canemail);
             $countemail=count($canarr);
             $esubdata= EmployerSubscription::model()->findByAttributes(array('ESUB_ID'=>$sub));
             $ESUB_REMAIN_COUNT=$esubdata->ESUB_REMAIN_COUNT;
             if(intval($countemail)>intval($ESUB_REMAIN_COUNT))
             {
                 echo 'no'.';'.$ESUB_REMAIN_COUNT;
             }
 else {
             
             $connection=yii::app()->db;
             $ejpcan_email="SELECT group_concat(`EPE_MAIL_LIST`) as EPE_MAIL_LIST FROM `employer_post_edits` WHERE EPE_EJP_ID=$EPE_EJP_ID";          
             $ejpcanarr=$connection->createCommand($ejpcan_email)->queryAll();
             $emailid=array();
             foreach($ejpcanarr  as $value)
             {  
                        $emailid[]=$value;
             }
            $aa=$emailid[0]['EPE_MAIL_LIST'];
            $ejpcanarr=str_replace(";",",",$aa);
            $canemailarr=explode(';',$canemail);
           //echo count($canemailarr);
            $canemailid=array();
            $cancount='';
//             $command = 'call count_char1("'.$canemail.'","'.$ejpcanarr.'",@test)';
//            $ee=$connection->createCommand($command)->query(); 
//            $command = $connection->createCommand('select @test');
//            $Check_Avail=$command->queryScalar();
                 $i=1; 
            foreach($canemailarr  as $value1)
            {  
           
             $command = 'call count_char1("'.$ejpcanarr.'","'.$value1.'",@test)';
            $ee=$connection->createCommand($command)->query(); 
            $command = $connection->createCommand('select @test');
            $Check_Avail=$command->queryScalar();
          
              
               if(($Check_Avail>0)&&($i==count($canemailarr)))      
               {
                   $cancount.=$value1;
                    
               }
              elseif(($Check_Avail>0)&&($i!=count($canemailarr)))      
               
               {
                   $cancount.=$value1.','; 
               }
            else {  
                    $cancount.='';
                }
              
              $i++;
                        
            }
         
           echo 'yes'.';'.$cancount;
 }
             }
             else
             {
                
              $canarr= explode(';', $canemail);
             $countemail=count($canarr);
             $esubdata= EmployerSubscription::model()->findByAttributes(array('ESUB_ID'=>$sub));
             $ESUB_REMAIN_COUNT=$esubdata->ESUB_REMAIN_COUNT;
             if(intval($countemail)>intval($ESUB_REMAIN_COUNT))
             {
                 echo 'no'.';'.$ESUB_REMAIN_COUNT;
             } 
             }
             
             // $aa=$emailid[0]['EPE_MAIL_LIST'];
         
             //$arr= implode(';',$canemail); 
             // echo $sql = "select count(*) from  employer_post_edits WHERE EPE_EJP_ID=$EPE_EJP_ID and  EPE_MAIL_LIST  IN ('".$canemail."')";
                   // $connection->createCommand($sql)->execute();
              }
              
                 public function actionemp_subscription()
       {
                   $this->renderPartial('emp_subscription');
                     
       }
              
           public  function actiondata()
       {
    
         $command_id = $_GET['id'];   
         $data=SkillMaster::model()->findAllByAttributes(array('SKILL_JOB_ID'=>$command_id));
         $results = array();
         foreach($data as $p) 
             {
                $results[] = array(
                'id' => $p->SKILL_ID, 
                 'text' => $p->SKILL_CATG, );
             }
             echo CJSON::encode($results);
           
       }
//       public function actionmail()
//       {
//           $cand_mail='mh@mh.com';
//           $EPE_ID='6';
//           $EPE_EJP_ID='7';
//           $EMP_COMP_NAME='tss';
//           $this->renderPartial('mail', array('cand_mail' => $cand_mail,'EPE_ID'=>$EPE_ID,'posting_id'=>$EPE_EJP_ID,'EMP_COMP_NAME'=>$EMP_COMP_NAME));
//       }
 
       
                      
      public function actionSkilldetails1()
      {
          
  
	 $command_id = $_POST['JobPosting']['EJP_JOB_ID'];
	
         $data= SkillMaster::model()->findAllByAttributes(array('SKILL_JOB_ID'=>$command_id));
         $data=CHtml::listData($data,'SKILL_ID','SKILL_CATG');
         
         $data1= RoleMaster::model()->findAllByAttributes(array('ROLE_JOB_ID'=>$command_id));
         $data1=CHtml::listData($data1,'ROLE_ID','ROLE_NAME');	
	foreach($data as $value=>$skill) {
	echo  CHtml::tag('option',array('value'=>$value),CHtml::encode($skill),true);
     
       }
        echo '@@@';
        echo CHtml::tag('option',array('value'=>''),CHtml::encode('<- - select - ->'),true);
        foreach($data1 as $value=>$role) {
        echo  CHtml::tag('option',array('value'=>$value),CHtml::encode($role),true);
       	}
      }
      
           public function actioncall_log()
        {
                   $this->layout='column3';
               $jobposting=new JobPosting;
         $connection=yii::app()->db;
        $data= EmployerSubscription::model()->findAllByAttributes(array('ESUB_EMP_ID'=>yii::app()->session['Emp_Id']));
        $criteria=new CDbCriteria();
        $criteria->condition='ESUB_EMP_ID='.yii::app()->session['Emp_Id'].' and ESUB_REMAIN_COUNT>0';
        $criteria->distinct=true;
        $data=EmployerSubscription::model()->findAll($criteria);
        $a=array();
        $b=array();
        $countemp=count($data);
        if($countemp>0)
        {  
    	foreach($data as $v)
        {
            $esu=$v->ESUB_SUBSCRS_ID;
            $data1= SubscriptionMaster::model()->findByAttributes(array('SUBSCRS_ID'=>$esu));
            $countesu=count($data1);
            if($countesu>0)
            {
                $a[]=$data1->SUBSCR_DESC;
                $b[]=$data1->SUBSCRS_ID;
            }
           
          
        } }
           $this->render('call_log_load',array(
			'jobposting'=>$jobposting,'a'=>$a,'b'=>$b
                                                            ));
        }
             public function actionsess_sub()
        {
                
              yii::app()->session['sub_id']= $_GET['sub_id'];  
        }
       public function actionUpdateAjax()
    {
      
      $this->renderPartial('_ajaxContent', array('rolemodel'=>new RoleMaster), false, true);
    }
        
        public function actionview_cand_image($Cand_Id,$ejp_id)
    {
               $data=CandidateImages::model()->findAllByAttributes(array('ci_ejp_id'=>$ejp_id,'ci_cand_id'=>$Cand_Id));

               $this->render('view_cand_image', array('data'=>$data));
    }
      
        public function actionview_cand_video($Cand_Id,$ejp_id)
    {
               $data=CandidateVideos::model()->findByAttributes(array('cv_ejp_id'=>$ejp_id,'cv_cand_id'=>$Cand_Id),array('order'=>'cv_id DESC' ));

               $this->render('view_cand_video', array('data'=>$data));
    }
            public function actionviewcandstatus($Job_Post_Id)
    {
               $Job_Post_Id=$_GET['Job_Post_Id'];
               $this->render('viewcandstatus', array('Job_Post_Id'=>$Job_Post_Id));
    }
    
             public function actionviewques()
    {
            $criteria=new CDbCriteria();
            

			$count=QuestionMaster::model()->count($criteria);    // pagenation
			$pages=new CPagination($count);
			$pages->pageSize=500;			
			$pages->applyLimit($criteria);	
			
			
                        
                        
            $data=QuestionMaster::model()->findAll($criteria);
            $this->render('viewques', array('data'=>$data,'pages' => $pages));
    }
            public function actionactive_cand()
	{
          $id= $_GET['CAND_TS_CAND_ID'];  
          $EJPL2_EJP_ID= $_GET['ejp_id'];  
        
          $connection=yii::app()->db;
          $Update="UPDATE candidate_test_summary SET CAND_TS_STATUS=1 where  CAND_TS_EJP_ID=$EJPL2_EJP_ID and CAND_TS_CAND_ID=".$id;
          $connection->createCommand($Update)->execute();
          $jobposting=JobPosting::model()->findByAttributes(array('EJP_ID'=>$EJPL2_EJP_ID));
        
          $Emp_Detail=EmployerMaster::model()->findByAttributes(array('EMP_ID'=>yii::app()->session['Emp_Id']));
          $Job=JobMaster::model()->findByAttributes(array('JOB_ID'=>$jobposting->EJP_JOB_ID));
          
          $Job_Name=$Job->JOB_NAME;
          $rolemaster=RoleMaster::model()->findByattributes(array('ROLE_ID'=>$jobposting->EJP_ROLE_ID));
          $role_name=$rolemaster->ROLE_NAME;
          $cancount= CandidateMaster::model()->findByAttributes(array('CAND_ID'=>$id));   
          $sql = "select EPE_ID from  employer_post_edits WHERE EPE_EJP_ID=$EJPL2_EJP_ID and  EPE_MAIL_LIST  LIKE '%$cancount->CAND_EMAIL_ID%'";
          $EPE_ID=$connection->createCommand($sql)->queryScalar(); 
          $email = Yii::createComponent('application.extensions.mailer.EMailer');
                  
            $email->From = Yii::app()->params['RegEmail'];
            $email->FromName = Yii::app()->params['RegName'];
            $email->AddReplyTo(Yii::app()->params['RegEmail']);
            $email->AddAddress($cancount->CAND_EMAIL_ID);
            $email->CharSet = 'UTF-8';
            $email->Subject = 'Test Notification from '.$Emp_Detail->EMP_COMP_NAME .' for  '.$Job_Name . ' '.$role_name.''; 
            $email->MsgHTML($this->renderPartial('mail', array('cand_mail' => $cancount->CAND_EMAIL_ID,'EPE_ID'=>$EPE_ID,'posting_id'=>$EJPL2_EJP_ID,'EMP_COMP_NAME'=>$Emp_Detail->EMP_COMP_NAME), true));
            $email->Send();
            $email->ClearAddresses();
            $email->ClearCCs();
            $email->ClearBCCs();
            $email->ClearReplyTos();
            $email->ClearAllRecipients();
            $email->ClearAttachments();
            $email->ClearCustomHeaders();

        } 
        public function actionsecskill()
        {
               $data=SkillMaster::model()->findAll();
//         //$data=CHtml::listData($data,'SKILL_ID','SKILL_CATG');
         $results = array();
         foreach($data as $p) 
             {
                $results[] = array(
                'id' => $p->SKILL_ID, 
                 'text' => $p->SKILL_CATG, );
             }
            echo  CJSON::encode($results);
        }
        
    
        public function actiontest(){
          $cs = Yii::app()->clientScript;
               $cs->registerCoreScript('jquery');
               $cs->registerScript('my_script', 'window.open("candidateresult","_self","status=1, toolbar=0,scrollbars=yes,resizable=no");', CClientScript::POS_READY);
               $this->render('/candidateMaster/can');
        } 
            public function actioncandidateresult()
        {
          $this->layout='column3'; 
        $this->renderPartial('candidate_result',array('Cand_Test'=>1), false, true);

        }
  
}


