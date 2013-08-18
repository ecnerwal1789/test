<?php

class CandidateTestController extends Controller
{

        public $layout='//layouts/column_candiate_test';
	public function actionTakeTest()
	{     $this->layout='column3'; 
        
             /* when test page open  insert into candidate test,test_summary,test_result with ans,correct ans 0 and finally update  test taken count in job posting*/
                $connection=yii::app()->db;
                $EJPL2_EJP_ID=yii::app()->session['Job_Post_Id'];
                $EJPL2_CAND_ID=yii::app()->session['Cand'];
                $EPE_ID=yii::app()->session['EPE_ID'];
                $UPDATED_DATE=new CDbExpression('NOW()');
                $Count_Query="select EJP_FLAG_UPLOAD_QUES,EJP_TEST_TAKEN_COUNT from employer_job_posting where EJP_ID=".$EJPL2_EJP_ID;
                $Test_Taken=$connection->createCommand($Count_Query)->queryAll();
                $EJP_FLAG_UPLOAD_QUES=$Test_Taken[0]['EJP_FLAG_UPLOAD_QUES'];
                $EJP_TEST_TAKEN_COUNT=$Test_Taken[0]['EJP_TEST_TAKEN_COUNT'];
                if(isset($EPE_ID) && isset($EJPL2_EJP_ID) && isset($EJPL2_CAND_ID))
                {
                /*$Cand_Test=CandidateTest::model()->deleteAllByAttributes(array('CAND_TEST_CAND_ID'=>$EJPL2_CAND_ID,'CAND_TEST_EJP_ID'=>$EJPL2_EJP_ID));
                $Cand_Test_summary=TestSummary::model()->deleteAllByAttributes(array('CAND_TS_CAND_ID'=>$EJPL2_CAND_ID,'CAND_TS_EJP_ID'=>$EJPL2_EJP_ID));
                $Cand_job_post_result=EmpJobPostResult::model()->deleteAllByAttributes(array('EJPR_CAND_ID'=>$EJPL2_CAND_ID,'EJPR_EJP_ID'=>$EJPL2_EJP_ID));*/
                
                $Cand_Test=TestSummary::model()->findAllByAttributes(array('CAND_TS_CAND_ID'=>$EJPL2_CAND_ID,'CAND_TS_EJP_ID'=>$EJPL2_EJP_ID,'CAND_TS_STATUS'=>array('1')));
                $cantescount=  count($Cand_Test); 
                $epesql="select EPE_NO_QUES,EPE_TEST_DURATION  from employer_post_edits where EPE_EJP_ID=$EJPL2_EJP_ID and EPE_ID=".$EPE_ID ;
                $epequery=$connection->createCommand($epesql)->queryAll();
                yii::app()->session['EJP_NO_QUES']=$EJP_NO_QUES=$epequery[0]['EPE_NO_QUES'];
                yii::app()->session['EJP_TEST_DURATION']=$EJP_TEST_DURATION=$epequery[0]['EPE_TEST_DURATION'];  
       
          
                if($cantescount>0)
                {
                 $Cand_job_post_result=EmpJobPostResult::model()->deleteAllByAttributes(array('EJPR_CAND_ID'=>$EJPL2_CAND_ID,'EJPR_EJP_ID'=>$EJPL2_EJP_ID));
                 $Cand_Test_summary=TestSummary::model()->deleteAllByAttributes(array('CAND_TS_CAND_ID'=>$EJPL2_CAND_ID,'CAND_TS_EJP_ID'=>$EJPL2_EJP_ID));
                 $Cand_Test=CandidateTest::model()->deleteAllByAttributes(array('CAND_TEST_CAND_ID'=>$EJPL2_CAND_ID,'CAND_TEST_EJP_ID'=>$EJPL2_EJP_ID));
                 $Cand_Test=CandidateUploadTest::model()->deleteAllByAttributes(array('CAND_UT_CAND_ID'=>$EJPL2_CAND_ID,'CAND_UT_EJP_ID'=>$EJPL2_EJP_ID));

                 $can_image="select ci_img_url from candidate_images where ci_ejp_id=$EJPL2_EJP_ID and ci_cand_id=".$EJPL2_CAND_ID ." order by ci_id  desc";
                 $can_image_query=$connection->createCommand($can_image)->queryAll();
                 //echo $can_image_query[0]['ci_img_url'];
                 //print_r($can_image_query);
                if($can_image_query!='')
                {
                   foreach($can_image_query as $canarr)
                   {
                       //print_r($canarr);
                   // echo   //$canarr[0]['ci_img_url'];
                      $ima=  $canarr['ci_img_url'];
                      $imafile="image_capture/".$ima;
                      // echo Yii::app()->request->baseUrl."/image_capture/".$ci_img_url;
                      @unlink($imafile);

                   }
                $Cand_Test=CandidateImages::model()->deleteAllByAttributes(array('ci_cand_id'=>$EJPL2_CAND_ID,'ci_ejp_id'=>$EJPL2_EJP_ID));

                }
                      $Update_Count="update employer_job_posting set EJP_TEST_TAKEN_COUNT=$EJP_TEST_TAKEN_COUNT-1,UPDATED_DATE=$UPDATED_DATE where EJP_ID=".$EJPL2_EJP_ID;
                      $connection->createCommand($Update_Count)->execute();  
                    
                }
            
                $Cand_Test=TestSummary::model()->findAllByAttributes(array('CAND_TS_CAND_ID'=>$EJPL2_CAND_ID,'CAND_TS_EJP_ID'=>$EJPL2_EJP_ID,'CAND_TS_STATUS'=>array('0')));
                $cantescount=  count($Cand_Test);
                
 /*         if question taken from our db          */
                
                if(($cantescount==0) &&($EJP_FLAG_UPLOAD_QUES==0))
                {
                /* Question taken from job post level2 table */
                $ranresult = JobPostLevel_2::model()->findAllByAttributes(array('EJPL2_EJP_ID'=>$EJPL2_EJP_ID,'EJPL2_EPE_ID'=>$EPE_ID)
               ,array(
               'order' => new CDbExpression('RAND()'),
               'limit' => yii::app()->session['EJP_NO_QUES'],
               'group'=>'ejpl2_ques_id',
               'distinct' => 'true'));
               $countran= count($ranresult);
               
                /* insert  Question in CandidateTest table */
                if($countran!=0)
                {
                    foreach($ranresult as $randd)
                    {
                          $randd->EJPL2_QUES_ID.',';
                          $Cand_Test=new CandidateTest;
                          $Cand_Test->CAND_TEST_QUES_ID=$randd->EJPL2_QUES_ID;
                          $Cand_Test->CAND_TEST_EJP_ID=$EJPL2_EJP_ID;
                          $Cand_Test->CAND_TEST_CAND_ID=$EJPL2_CAND_ID;
                          $Cand_Test->CAND_TEST_CAND_ANS_OPT='';
                          $Cand_Test->CAND_TEST_ANS_FLAG='S';
                          $Cand_Test->CAND_TEST_SKILL_ID=$randd->EJPL2_SKILL_ID;
                          $Cand_Test->UPDATED_DATE=new CDbExpression('NOW()');
                          $Cand_Test->CREATED_DATE=new CDbExpression('NOW()');  
                          $Cand_Test->save();

                    } 
                }
                else
                {   
                    echo '<html><table style=" height: 400px;
                     margin: 118px 380px ;
                     color:#092962;font-size:20px; margin:10px 175px;font-family:"Oswald",sans-serif;"><tr><td><b> i-me has encountered a technical issue. Please try again after sometime.</b></td></tr></table>';

                     Yii::app()->session->destroy();
                    // echo CHtml::script("window.close()");
                     exit;


                }
           
                }
                     
 /*         if question upload by EMPLOYEE          */              
                if(($cantescount==0)&&($EJP_FLAG_UPLOAD_QUES==1))
                {
                       
                $ranresultemp = EmpQuestionUpload::model()->findAllByAttributes(array('EQU_EJP_ID'=>$EJPL2_EJP_ID,'EQU_EPE_ID'=>$EPE_ID)
               ,array(
               'order' => new CDbExpression('RAND()'),
               'limit' => yii::app()->session['EJP_NO_QUES'],
               //'group'=>'ejpl2_ques_id',
               'distinct' => 'true'));
               $countranemp= count($ranresultemp);
          
                            /* insert  Question in CandidateTest table */
       if($countranemp!=0)
       {
          
                foreach($ranresultemp as $randemp)
                {
                      //$randemp->EJPL2_QUES_ID.',';
                      $Cand_upload_Test=new CandidateUploadTest;
                      $Cand_upload_Test->CAND_UT_QUES_ID=$randemp->EQU_QUES_ID;
                      $Cand_upload_Test->CAND_UT_EJP_ID=$EJPL2_EJP_ID;
                      $Cand_upload_Test->CAND_UT_CAND_ID=$EJPL2_CAND_ID;
                      $Cand_upload_Test->CAND_UT_CAND_ANS_OPT='';
                      $Cand_upload_Test->CAND_UT_ANS_FLAG='S';
                      $Cand_upload_Test->UPDATED_DATE=new CDbExpression('NOW()');
                      $Cand_upload_Test->CREATED_DATE=new CDbExpression('NOW()');  
                      $Cand_upload_Test->save();
                      
                } 
       }  
          else
       {   
           echo '<html><table style=" height: 400px;
            margin: 118px 380px ;
            color:#092962;font-size:20px; margin:10px 175px;font-family:"Oswald",sans-serif;"><tr><td><b> i-me has encountered a technical issue. Please try again after sometime.</b></td></tr></table>';
                   
            Yii::app()->session->destroy();
           // echo CHtml::script("window.close()");
            exit;
           
           
       }
                }
                /* insert  test summary in TestSummary table */
                $testmodel=new TestSummary;
                $testmodel->CAND_TS_EJP_ID=$EJPL2_EJP_ID;
                $testmodel->CAND_TS_CAND_ID=$EJPL2_CAND_ID;     
                //$testmodel->CAND_TS_SCORE=$countans;
                $testmodel->CAND_TS_TEST_DATE=new CDbExpression('NOW()');
                
                $testmodel->CAND_TS_ET=yii::app()->session['CAND_TS_ET']= strtotime("+$EJP_TEST_DURATION minutes");
                $testmodel->CAND_TS_ST=yii::app()->session['CAND_TS_ST']=strtotime("now");
                $testmodel->CAND_TS_STATUS=0;
                $testmodel->UPDATED_DATE=new CDbExpression('NOW()');
                $testmodel->CREATED_DATE=new CDbExpression('NOW()');  
                $testmodel->save();
   
  /*  INSERT  EmpJobPostResult TABLE ONLY IF QUES TAKEN FROM OUR DB*/              
                if($EJP_FLAG_UPLOAD_QUES==0)
                {
                /* insert  test summary against skill  in EmpJobPostResult table */
                $Cand_Test_Result=CandidateTest::model()->findAllByAttributes(array('CAND_TEST_CAND_ID'=>$EJPL2_CAND_ID,'CAND_TEST_EJP_ID'=>$EJPL2_EJP_ID),
                array('distinct'=>'true','group'=>'CAND_TEST_SKILL_ID'));
                foreach($Cand_Test_Result as $Cand_Res)
                {     
                  $Emp_Job_Post_Result=new EmpJobPostResult;
                  $Emp_Job_Post_Result->EJPR_SKILL_ID=$Cand_Res->CAND_TEST_SKILL_ID;
                  $Q_Skipped="SELECT COUNT(CAND_TEST_ANS_FLAG) FROM candidate_test WHERE CAND_TEST_ANS_FLAG IN ('S') and CAND_TEST_SKILL_ID=".$Cand_Res->CAND_TEST_SKILL_ID." AND CAND_TEST_CAND_ID=".$EJPL2_CAND_ID." AND CAND_TEST_EJP_ID=".$EJPL2_EJP_ID;
                  $Q_Asked="SELECT COUNT(CAND_TEST_QUES_ID) FROM candidate_test WHERE  CAND_TEST_SKILL_ID=".$Cand_Res->CAND_TEST_SKILL_ID." AND CAND_TEST_CAND_ID=".$EJPL2_CAND_ID." AND CAND_TEST_EJP_ID=".$EJPL2_EJP_ID;   
                  $Count_Asked=$connection->createCommand($Q_Asked)->queryScalar();
                  $Count_Skipped=$connection->createCommand($Q_Skipped)->queryScalar();
                  $Emp_Job_Post_Result->EJPR_EJP_ID=$EJPL2_EJP_ID;
                  $Emp_Job_Post_Result->EJPR_CAND_ID=$EJPL2_CAND_ID;
                  $Emp_Job_Post_Result->EJPR_QUES_ASKED=$Count_Asked;
                  $Emp_Job_Post_Result->EJPR_CORRECT_ANS=0;
                  $Emp_Job_Post_Result->EJPR_QUES_ANSWERED=0;
                  $Emp_Job_Post_Result->EJPR_QUES_SKIPPED=$Count_Skipped;
                  $Emp_Job_Post_Result->UPDATED_DATE=new CDbExpression('NOW()');
                  $Emp_Job_Post_Result->CREATED_DATE=new CDbExpression('NOW()');  
                  $Emp_Job_Post_Result->save();
                  //print_r($Emp_Job_Post_Result->getErrors());
                  

                } 
                  }
                 // exit;
                  /* update test taken count employer_job_posting table */
                  $Count_Query="select EJP_TEST_TAKEN_COUNT  from employer_job_posting where EJP_ID=".$EJPL2_EJP_ID;
                  $Test_Taken=$connection->createCommand($Count_Query)->queryScalar();
                  $Update_Count="update employer_job_posting set EJP_TEST_TAKEN_COUNT= $Test_Taken+1 ,UPDATED_DATE=$UPDATED_DATE  where EJP_ID=".$EJPL2_EJP_ID;
                  $connection->createCommand($Update_Count)->execute();  
                   $this->forward('starttest');
                 // $this->redirect(array('starttest','EJP_FLAG_UPLOAD_QUES'=>$EJP_FLAG_UPLOAD_QUES));
      }  
         else
       {   
           echo '<html><table style=" height: 400px;
            margin: 118px 380px ;
            color:#092962;font-size:20px; margin:10px 175px;font-family:"Oswald",sans-serif;"><tr><td><b> i-me has encountered a technical issue. Please try again after sometime.</b></td></tr></table>';
                   
            Yii::app()->session->destroy();
           // echo CHtml::script("window.close()");
           
           
       }
                    //$Cand_Test=CandidateTest::model()->findAllByAttributes(array('CAND_TEST_CAND_ID'=>$EJPL2_CAND_ID,'CAND_TEST_EJP_ID'=>$EJPL2_EJP_ID));
              
                 //count( $connection=yii::app()->db;)
                //$this->forward('Site/starttest');
                
       //}
          //}
                
//                else
//                {
//                     echo '<html><table style=" height: 400px;
//            margin: 118px 380px ;
//            color:#092962;font-size:20px; margin:10px 175px;"><tr><td><b> i-me has encountered a technical issue. Please try again after sometime.</b></td></tr></table>';
//                  
//            Yii::app()->session->destroy();
//                }
//                
    }
        
        public function actionSubmitTest()
	{ 
            $id= yii::app()->session['Cand'];
            $EJPL2_EJP_ID=yii::app()->session['Job_Post_Id'];
            $UPDATED_DATE=new CDbExpression('NOW()'); 
            $EJP_FLAG_UPLOAD_QUES=$_POST['EJP_FLAG_UPLOAD_QUES'];
            $EJP_NO_QUES=$_POST['EJP_NO_QUES'];
            $connection=yii::app()->db;
            if($EJP_FLAG_UPLOAD_QUES==0)
            {
         
            for($i=1;$i<=$EJP_NO_QUES;$i++)
            {
               
                if((!empty($_POST['CAND_TEST_QUES_ID'.$i]))&&(isset($_POST['CAND_TEST_QUES_ID'.$i])))
                {
                
              $CAND_TEST_QUES_ID= $_POST['CAND_TEST_QUES_ID'.$i];
              $question=explode(':',$CAND_TEST_QUES_ID);
              $ques_option=$question[0];
              $ques_id=$question[1];
             
              $questab= QuestionMaster::model()->findByAttributes(array('QUES_ID'=>$ques_id));
              $ans_opt=$questab->QUES_ANS_OPT_CDE;
              if($ans_opt==$ques_option)
              {
                  $CAND_TEST_ANS_FLAG='Y';
              }
            else
            {
                $CAND_TEST_ANS_FLAG='N';
            }
            
            $Update="UPDATE candidate_test SET CAND_TEST_CAND_ANS_OPT='".$ans_opt."',CAND_TEST_ANS_FLAG='".$CAND_TEST_ANS_FLAG."',UPDATED_DATE=$UPDATED_DATE where CAND_TEST_QUES_ID=$ques_id and CAND_TEST_EJP_ID=$EJPL2_EJP_ID and CAND_TEST_CAND_ID=".$id;
            $connection->createCommand($Update)->execute();
            }
            
            
            }
           
            $countsql="select count(*) from candidate_test where CAND_TEST_ANS_FLAG='Y' and CAND_TEST_EJP_ID=$EJPL2_EJP_ID and CAND_TEST_CAND_ID=".$id;
            $countans=$connection->createCommand($countsql)->queryScalar();

            $Update="UPDATE candidate_test_summary SET CAND_TS_SCORE='".$countans."',CAND_TS_STATUS=2,UPDATED_DATE=$UPDATED_DATE where  CAND_TS_EJP_ID=$EJPL2_EJP_ID and CAND_TS_CAND_ID=".$id;
            $connection->createCommand($Update)->execute();
                
                 $Cand_Test_Result=CandidateTest::model()->findAllByAttributes(array('CAND_TEST_CAND_ID'=>$id,'CAND_TEST_EJP_ID'=>$EJPL2_EJP_ID),
                                array('distinct'=>'true','group'=>'CAND_TEST_SKILL_ID'));
                  foreach($Cand_Test_Result as $Cand_Res)
                  {     
                    //$Emp_Job_Post_Result=new EmpJobPostResult;
                    $EJPR_SKILL_ID=$Cand_Res->CAND_TEST_SKILL_ID;
                    $EJPR_EJP_ID=$EJPL2_EJP_ID;
                    $Q_Skipped="SELECT COUNT(CAND_TEST_ANS_FLAG) FROM candidate_test WHERE CAND_TEST_ANS_FLAG IN ('S') and CAND_TEST_SKILL_ID=".$Cand_Res->CAND_TEST_SKILL_ID." and CAND_TEST_CAND_ID=".$id." and CAND_TEST_EJP_ID=".$EJPL2_EJP_ID;
                    $Q_Answered="SELECT COUNT(CAND_TEST_ANS_FLAG) FROM candidate_test WHERE CAND_TEST_ANS_FLAG IN ('Y','N') and CAND_TEST_SKILL_ID=".$Cand_Res->CAND_TEST_SKILL_ID." and  CAND_TEST_CAND_ID=".$id." and CAND_TEST_EJP_ID=".$EJPL2_EJP_ID ;
                    $Q_Correct="SELECT COUNT(CAND_TEST_ANS_FLAG) FROM candidate_test WHERE CAND_TEST_ANS_FLAG IN ('Y') and CAND_TEST_SKILL_ID=".$Cand_Res->CAND_TEST_SKILL_ID." and  CAND_TEST_CAND_ID=".$id." and CAND_TEST_EJP_ID=".$EJPL2_EJP_ID ;
                    $Count_Answered=$connection->createCommand($Q_Answered)->queryScalar();
                    $Count_Correct=$connection->createCommand($Q_Correct)->queryScalar();
                    $Count_Skipped=$connection->createCommand($Q_Skipped)->queryScalar();
                    $EJPR_CORRECT_ANS=$Count_Correct;
                    $EJPR_QUES_ANSWERED=$Count_Answered;
                    $EJPR_QUES_SKIPPED=$Count_Skipped;
                    //$Emp_Job_Post_Result->save();
                    
                     $Update="UPDATE emp_job_post_result SET  EJPR_CORRECT_ANS='".$EJPR_CORRECT_ANS."', EJPR_QUES_ANSWERED='".$EJPR_QUES_ANSWERED."', EJPR_QUES_SKIPPED='".$EJPR_QUES_SKIPPED."' ,UPDATED_DATE=$UPDATED_DATE where EJPR_EJP_ID=$EJPR_EJP_ID and EJPR_CAND_ID=$id and EJPR_SKILL_ID='".$EJPR_SKILL_ID."'";
                     $connection->createCommand($Update)->execute();
                   
                  } 
                  
                   $Q_Skipped="SELECT COUNT(CAND_TEST_ANS_FLAG) FROM candidate_test WHERE CAND_TEST_ANS_FLAG IN ('S')  AND CAND_TEST_CAND_ID=".$id." AND CAND_TEST_EJP_ID=".$EJPL2_EJP_ID;
                   $Count_Skipped=$connection->createCommand($Q_Skipped)->queryScalar();
        }
 else 
     {
        for($i=1;$i<=$EJP_NO_QUES;$i++)
            {
               if((!empty($_POST['CAND_UT_QUES_ID'.$i]))&&(isset($_POST['CAND_UT_QUES_ID'.$i])))
                {
                
              $CAND_TEST_QUES_ID= $_POST['CAND_UT_QUES_ID'.$i];
              $question=explode(':',$CAND_TEST_QUES_ID);
              $ques_option=$question[0];
              $ques_id=$question[1];
             
              $questab= EmpQuestionUpload::model()->findByAttributes(array('EQU_QUES_ID'=>$ques_id));
              $ans_opt=$questab->EQU_ANS_OPT_CDE;
              if($ans_opt==$ques_option)
              {
                  $CAND_TEST_ANS_FLAG='Y';
              }
              else
              {
                  $CAND_TEST_ANS_FLAG='N';
              }

                $Update="UPDATE candidate_upload_test SET CAND_UT_CAND_ANS_OPT='".$ans_opt."',CAND_UT_ANS_FLAG='".$CAND_TEST_ANS_FLAG."',UPDATED_DATE=$UPDATED_DATE where CAND_UT_QUES_ID=$ques_id and CAND_UT_EJP_ID=$EJPL2_EJP_ID and CAND_UT_CAND_ID=".$id;
                $connection->createCommand($Update)->execute();
            }
            
            }
            $countsql="select count(*) from candidate_upload_test where CAND_UT_ANS_FLAG='Y' and CAND_UT_EJP_ID=$EJPL2_EJP_ID and CAND_UT_CAND_ID=".$id;
            $countans=$connection->createCommand($countsql)->queryScalar();

            $Update="UPDATE candidate_test_summary SET CAND_TS_SCORE='".$countans."',CAND_TS_STATUS=2,UPDATED_DATE=$UPDATED_DATE where  CAND_TS_EJP_ID=$EJPL2_EJP_ID and CAND_TS_CAND_ID=".$id;
            $connection->createCommand($Update)->execute();
     
 }
//if($Count_Skipped==20)
//{
//    $EMP_COMP_NAME='';
//}
//else
//{
                    
                    $jobposting= JobPosting::model()->findByAttributes(array('EJP_ID'=>$EJPL2_EJP_ID));
                    $Emp_Detail=EmployerMaster::model()->findByAttributes(array('EMP_ID'=>$jobposting->EJP_EMP_ID));
                    $EMP_COMP_NAME=$Emp_Detail->EMP_COMP_NAME;
                    $cancount= CandidateMaster::model()->findByAttributes(array('CAND_ID'=>$id));
    
                    $email = Yii::createComponent('application.extensions.mailer.EMailer');
                    $email->From = Yii::app()->params['RegEmail'];
                    $email->FromName = Yii::app()->params['RegName'];
                    $email->AddReplyTo(Yii::app()->params['RegEmail']);
                    $email->AddAddress($Emp_Detail->EMP_EMAIL_ID);
                    $email->CharSet = 'UTF-8';
                    //$email->Subject = 'i-me notification-test by candidate for job posting '.$jobposting->EJP_NAME.''; 
                    $email->Subject = 'i-me Notification : Test Results for Job Posting '.$jobposting->EJP_NAME.''; 
                    $email->MsgHTML($this->renderPartial('emp_test_suc', array('cand_mail' =>$cancount->CAND_EMAIL_ID,'jp_name'=>$jobposting->EJP_NAME,'cand_name'=>$cancount->CAND_FIRST_NAME), true));

                    $email->Send();
                  
                   
//}
             $this->redirect(array('test_suc1','EMP_COMP_NAME'=>$EMP_COMP_NAME));          
	}
        public function actionstarttest()
        {
            $EJPL2_EJP_ID=yii::app()->session['Job_Post_Id'];
            $EJPL2_CAND_ID=yii::app()->session['Cand'];
            $connection=yii::app()->db;
            $Count_Query="select EJP_FLAG_UPLOAD_QUES,EJP_TEST_TAKEN_COUNT from employer_job_posting where EJP_ID=".$EJPL2_EJP_ID;
            $Test_Taken=$connection->createCommand($Count_Query)->queryAll();
            $EJP_FLAG_UPLOAD_QUES=$Test_Taken[0]['EJP_FLAG_UPLOAD_QUES'];
            //$EJP_FLAG_UPLOAD_QUES=$_GET['EJP_FLAG_UPLOAD_QUES'];
            if($EJP_FLAG_UPLOAD_QUES==0)
            {
            $Cand_Test=CandidateTest::model()->findAllByAttributes(array('CAND_TEST_CAND_ID'=>$EJPL2_CAND_ID,'CAND_TEST_EJP_ID'=>$EJPL2_EJP_ID));
            }
            else
            {
            $Cand_Test=CandidateUploadTest::model()->findAllByAttributes(array('CAND_UT_CAND_ID'=>$EJPL2_CAND_ID,'CAND_UT_EJP_ID'=>$EJPL2_EJP_ID));
 
            }
       
              $this->render('Test',array('Cand_Test'=>$Cand_Test,'EJP_FLAG_UPLOAD_QUES'=>$EJP_FLAG_UPLOAD_QUES));
        }
        public function actionSample()
        {
            $this->render('sample');
        }
         public function actioncountdown()
        {
//              echo  $from_time = strtotime("+20 minutes");
//
//                session_start();
//
//   $to_time = strtotime("now");
//   $from_time ='1363699709';
//   exit;
            $this->render('countdown');
        }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
        
          public function actiontest_suc($EMP_COMP_NAME)
        {
             //$mailstr=str_replace(";",",",$maillist);
         echo '<html><table style=" height: 400px;
            margin: 118px 300px ;
            color:green;font-size:21px"><tr><td><b>You have Successfully completed your test.
    Your results have been sent to the '.$EMP_COMP_NAME.'.They will revert back to you.</b></td></tr></table>';
                   
       Yii::app()->session->destroy();
        }
           public function actiontest_suc1($EMP_COMP_NAME)
        {
          $this->render('test_suc',array('EMP_COMP_NAME'=>$EMP_COMP_NAME)); 
           
        }
            public function actioncall_log()
        {
//            $connection=yii::app()->db;
//            $countsql="select * from subscription_master";
//            $countans=$connection->createCommand($countsql)->queryAll();
            $this->layout='column3';
            $this->render('call_log_load');
       
        }
        
        public function actiontest2()
	{  
             $this->render('test2');
        }
        public function actionflip()
	{  
           
                     $EJPL2_EJP_ID=yii::app()->session['Job_Post_Id'];
         $jobposting= JobPosting::model()->findByAttributes(array('EJP_ID'=>$EJPL2_EJP_ID));
         $Emp_Detail=EmployerMaster::model()->findByAttributes(array('EMP_ID'=>$jobposting->EJP_EMP_ID));
         //$EMP_COMP_NAME=$Emp_Detail->EMP_COMP_NAME;
          $this->render('scriptcam',array('EMP_COMP_NAME'=>$Emp_Detail->EMP_COMP_NAME));
        }
          public function actionvideo()
	{
      
          $EJPL2_EJP_ID=yii::app()->session['Job_Post_Id'];
          $EJPL2_CAND_ID=yii::app()->session['Cand'];
            $connection=yii::app()->db;
          $can_video="select cv_video_url from candidate_videos where cv_ejp_id=$EJPL2_EJP_ID and cv_cand_id=".$EJPL2_CAND_ID;
          $can_video_query=$connection->createCommand($can_video)->queryAll();
                 //echo $can_image_query[0]['ci_img_url'];
                 //print_r($can_image_query);
              if($can_video_query!='')
              {
                 foreach($can_video_query as $canvideo)
                 {
                     //print_r($canarr);
                 // echo   //$canarr[0]['ci_img_url'];
                    $vid= $canvideo['cv_video_url'];
                    $vidfile="candidate_videos/".$vid;
                    // echo Yii::app()->request->baseUrl."/image_capture/".$ci_img_url;
                    @unlink($vidfile);

                 } 
                 $Cand_Test=CandidateVideos::model()->deleteAllByAttributes(array('cv_cand_id'=>$EJPL2_CAND_ID,'cv_ejp_id'=>$EJPL2_EJP_ID));

              }
          //$ranresult = CandidateVideos::model()->deleteAllByAttributes(array('cv_ejp_id'=>yii::app()->session['Job_Post_Id'],'cv_cand_id'=>yii::app()->session['Cand']));
          $model=new CandidateVideos; 
          $model->cv_ejp_id=yii::app()->session['Job_Post_Id'];
          $model->cv_cand_id=yii::app()->session['Cand'];
          yii::app()->session['videofilename']=$model->cv_video_url=$_POST['fileName1'];
          $model->save();
          echo $cv_id=$model->getPrimaryKey();
           
        }
     
        public function actionframeset()
      {
          $this->layout='column3';
        $this->render('framescriptcam');      
      }
     public function actionscriptcam()
    {
         $this->layout='column1';
         $EJPL2_EJP_ID=yii::app()->session['Job_Post_Id'];
         $jobposting= JobPosting::model()->findByAttributes(array('EJP_ID'=>$EJPL2_EJP_ID));
         $Emp_Detail=EmployerMaster::model()->findByAttributes(array('EMP_ID'=>$jobposting->EJP_EMP_ID));
         //$EMP_COMP_NAME=$Emp_Detail->EMP_COMP_NAME;
          $this->render('scriptcam',array('EMP_COMP_NAME'=>$Emp_Detail->EMP_COMP_NAME));
     }
         public function actionframeset1()
      {
          $this->layout='column3';
        $this->render('framescriptcam1');      
      }
      
        public function actionviewrendervideo()
    {
            $this->layout='column3'; 
          //   $data=1;
          $videofilename=$_GET['videofilename'];
          $data=CandidateVideos::model()->findByAttributes(array('cv_id'=>$videofilename));
         
               $this->renderPartial('view_cand_video', array('data'=>$data), false, true);
             //$this->renderPartial('_ajaxContent', array('data'=>$data), false, true);

    }
        public function actiontest_load()
	{  
        
      
             $this->render('Test_load');
        }
 
        
        public function actiontest_load1()
	{  
             $this->render('test111');
        }
}