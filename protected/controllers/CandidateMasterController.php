<?php

class CandidateMasterController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column4';

	
	//public $defaultAction = 'index';
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
         $this->layout='column_candiate_test';
	$model=new CandidateMaster;
        $Job_Post_Id=yii::app()->session['Job_Post_Id'];
        $model->CAND_EMAIL_ID=$CAND_EMAIL_ID=yii::app()->session['CAND_EMAIL_ID'];
        $cancount= CandidateMaster::model()->findByAttributes(array('CAND_EMAIL_ID'=>$CAND_EMAIL_ID));
     
        if(count($cancount)==0)
        {     
      
        $jobposting= JobPostEdit::model()->findAllByAttributes(array('EPE_EJP_ID'=>$Job_Post_Id));
        foreach($jobposting as $jobpostingarr)
        {
        $email_id= $jobpostingarr->EPE_MAIL_LIST;
        }
         $connection=Yii::app()->db;
         $ejpcan_email="SELECT group_concat(`EPE_MAIL_LIST`) as EPE_MAIL_LIST FROM `employer_post_edits` WHERE EPE_EJP_ID=$Job_Post_Id";
         $ejpcanarr=$connection->createCommand($ejpcan_email)->queryAll();
         $emailid=array();
         foreach($ejpcanarr  as $value)
         {  
                 $emailid[]=$value;
         }
        $aa=$emailid[0]['EPE_MAIL_LIST'];
        $ejpcanarr=str_replace(";",",",$aa);
       // $aaa=explode(',',$ejpcanarr);    
         if(isset($_POST['CandidateMaster']))
		{
			$model->attributes=$_POST['CandidateMaster'];
                        $model->UPDATED_DATE=new CDbExpression('NOW()');
                        $model->UPDATED_USER = Yii::app()->user->name;
                        $model->CREATED_DATE=new CDbExpression('NOW()');  
                        $Cand=$model->CAND_EMAIL_ID;
                        //$Job_Post_Id=4;
                        $connection=yii::app()->db;
                        //global $test;
                       // $Check_Query="SELECT COUNT_CHAR(EJP_CAND_EMAIL_ID,'".$Cand."') FROM employer_job_posting WHERE EJP_ID=".$Job_Post_Id;
                          $command = Yii::app()->db->createCommand('call count_char1("'.$ejpcanarr.'","'.$Cand.'",@test)');
                        // $command = Yii::app()->db->createCommand('call count_char1("mutharasi.n@tecneto.com;thangapandi.k@tecneto.com","mutharasi.n@tecneto.com",@test)'); 
                    
                          $ee=$command->query(); 
                          $command = Yii::app()->db->createCommand('select @test');
                          $Check_Avail=$command->queryScalar();
        
                       // $Check_Avail=$connection->createCommand($Check_Query)->queryScalar();
                        if($Check_Avail!=0)
                        {  
			if($model->save())
                        {
                         // print_r($model->save());
                        
                        yii::app()->session['Cand']=$model->getPrimaryKey();
			//$this->redirect(array('cand_test'));
                        $this->redirect(array('TakeTest'));
                        }
                        }
                        else
                        {
                           $model->addError('CAND_EMAIL_ID','You are not a invited user..Check your email ');
                        }
		}
                $this->render('create',array(
			'model'=>$model,
		));

}
 else {
    	   yii::app()->session['Cand']=$cancount->CAND_ID;		//$this->redirect(array('TakeTest'));
           // $this->redirect(array('cand_test'));
            $this->redirect(array('TakeTest'));

}
		
	}
        public function actionTakeTest()
        {
         $this->layout='column_candiate_test';  
         $Cand_Id=yii::app()->session['Cand'];
         $Job_Post_Id=yii::app()->session['Job_Post_Id'];
         $Cand_Test=TestSummary::model()->findAllByAttributes(array('CAND_TS_CAND_ID'=>$Cand_Id,'CAND_TS_EJP_ID'=>$Job_Post_Id,'CAND_TS_STATUS'=>array('0','2')));
         $cantescount=  count($Cand_Test);
       
        if($cantescount>0)
        {
            $this->redirect(array('test_taken'));
           
        }
        else
        {
            
            $this->redirect(array('cand_test'));
                // $this->redirect('Cand_Test');

            // $this->redirect(array('CandidateTest/test_suc'));
        }
        }
   public function actionTakeTest1()
        {
          $this->layout='column_candiate_test';
       $this->render('TakeTest');
   }
     

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CandidateMaster']))
		{
			$model->attributes=$_POST['CandidateMaster'];
                         $model->UPDATED_DATE=new CDbExpression('NOW()');
                         $model->UPDATED_USER = Yii::app()->user->name;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->CAND_ID));
		}

		$this->render('update',array(
			'model'=>$model,'action'=>'update'
		));
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

           
            if((isset(yii::app()->session['Job_Post_Id']))||(isset(yii::app()->session['CAND_EMAIL_ID']))||(isset(yii::app()->session['EPE_ID'])))
            {
            Yii::app()->session->clear();
            //$this->redirect(array('index1'));
            }
//            else
//            {
             $Job_Post_Id=yii::app()->session['Job_Post_Id']=$_GET['id'];
             $CAND_EMAIL_ID=yii::app()->session['CAND_EMAIL_ID']=$_GET['valemail'];
             $EPE_ID=yii::app()->session['EPE_ID']=$_GET['epd']; 
            
           if((isset($_GET['id']))&&(isset($_GET['valemail']))&&(isset($_GET['epd'])))
           {
            
             
             $connection=yii::app()->db;
             $Select="select EPE_CAND_ACTIVE_DAYS,EPE_END_DATE,EPE_TEST_DUE_DATE from employer_post_edits where EPE_ID=".$EPE_ID;
             $Active_Days=$connection->createCommand($Select)->queryScalar();
             foreach($connection->createCommand($Select)->queryAll() as $PostEdit)
             {
                 $Epe_act_days=$PostEdit['EPE_CAND_ACTIVE_DAYS'];
                 $Epe_end_date=$PostEdit['EPE_TEST_DUE_DATE'];
             }
          
             $currentDate =date("Y-m-d");           
             $Diff='SELECT DATEDIFF("'.$Epe_end_date.'","'.$currentDate.'") as DiffEdit ';
             $Diff_Days_Edit=$connection->createCommand($Diff)->queryScalar(); 

             if($Diff_Days_Edit>=0)
             $this->redirect('CandidateMaster/create');
             else
             $this->redirect(array('CandidateMaster/TestExpired'));
           }
           // }
         
            
             
	}
        public function actionTestExpired()
        {
               $this->layout='column_candiate_test';
               $EJPL2_EJP_ID=yii::app()->session['Job_Post_Id'];
                     $jobposting= JobPosting::model()->findByAttributes(array('EJP_ID'=>$EJPL2_EJP_ID));
                    $Emp_Detail=EmployerMaster::model()->findByAttributes(array('EMP_ID'=>$jobposting->EJP_EMP_ID));
                    $EMP_COMP_NAME=$Emp_Detail->EMP_COMP_NAME;
            $this->render('TestExpired',array('EMP_COMP_NAME'=>$EMP_COMP_NAME));
            
        }
             public function actioncand_test()
        {
               $this->layout='column_candiate_test';
               $cs = Yii::app()->clientScript;
               $cs->registerScript('my_script', 'window.open("cand_test1","_self","status=1, toolbar=0,scrollbars=yes,resizable=no");', CClientScript::POS_HEAD);
               $this->render('can');
        } 
               public function actioncand_test1()
        {

            $this->layout='column_candiate_test';
            $Job_Post_Id= yii::app()->session['Job_Post_Id'];
             $EPE_ID=yii::app()->session['EPE_ID'];
            $jobposting=JobPostEdit::model()->findByAttributes(array('EPE_EJP_ID'=>$Job_Post_Id,'EPE_ID'=>$EPE_ID));
          if(count($jobposting)>0)
          {
            $EPE_VIDEO_Y_N=$jobposting->EPE_VIDEO_Y_N;
            $connection=yii::app()->db;
            $EJPL2_EJP_ID=yii::app()->session['Job_Post_Id'];
            $EJPL2_CAND_ID=yii::app()->session['Cand'];
            $EPE_ID=yii::app()->session['EPE_ID'];
            $epesql="select EPE_NO_QUES,EPE_TEST_DURATION  from employer_post_edits where EPE_EJP_ID=$EJPL2_EJP_ID and EPE_ID=".$EPE_ID ;
            $epequery=$connection->createCommand($epesql)->queryAll();
            yii::app()->session['EJP_TEST_DURATION']=$EJP_TEST_DURATION=$epequery[0]['EPE_TEST_DURATION'];  
             yii::app()->session['EJP_NO_QUES']=$EJP_NO_QUES=$epequery[0]['EPE_NO_QUES'];
            $image_inter=intval($EJP_TEST_DURATION)/20;
            if(isset(yii::app()->session['image_interval']))
             {
                 yii::app()->session['image_interval']='';
             }
            yii::app()->session['image_interval']=round($image_inter,3)*60*1000;
            $this->render('index',array('SUBSCRS_VIDEO_Y_N'=>$EPE_VIDEO_Y_N));
          }
          else
          {
            echo '<html><table style=" height: 400px;
            margin: 118px 380px ;
            color:#092962;font-size:20px; margin:10px 175px;font-family:"Oswald",sans-serif;"><tr><td><b> i-me has encountered a technical issue. Please try again after sometime.</b></td></tr></table>';
                   
            Yii::app()->session->destroy();
          }
        } 
        

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CandidateMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CandidateMaster']))
			$model->attributes=$_GET['CandidateMaster'];
                 $candscount=CandidateMaster::model()->count("CAND_ID IN (SELECT DISTINCT a.cand_test_cand_id FROM candidate_test a, employer_job_posting b WHERE b.ejp_emp_id ='".yii::app()->session['Emp_Id']."' AND a.cand_test_ejp_id = b.ejp_id)");

		$this->render('admin',array(
			'model'=>$model,'candscount'=>$candscount
		));
	}
        public function actionCandPerJob()
        {    
            
            $connection=yii::app()->db;
            $job="select EJP_ID from employer_job_posting where EJP_EMP_ID=".yii::app()->session['Emp_Id'];
            foreach($connection->createCommand($job)->queryScalar() as $Val)
            {
                $Cand="select SUBSTRING_INDEX(EJP_CAND_EMAIL_ID, ';', 1)from employer_job_posting where EJP_ID=".$Val['EJP_ID'];
                foreach($connection->createCommand($Cand)->queryScalar() as $Id)
                {
                    $Cand_det="select * from candidate_master where CAND_EMAIL_ID=".$Id['EJP_CAND_EMAIL_ID'];
                    $model=$connection->createCommand($Cand_det)->queryAll();
                }
            }
           $this->render('admin',array('model'=>$model,));
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CandidateMaster the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CandidateMaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CandidateMaster $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='candidate-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionDeleteAll()
        { 
         
        if ($_POST['ids'])
        {
               
                $del_camps = $_POST['ids'];
         
                $model_camp=new CandidateMaster;
                           
                foreach ($del_camps as $_camp_id)
                {
                    try{
                        $model_camp->deleteByPk($_camp_id);
                    }
                     catch (CDbException $e)
                    {
                     
                     echo $messages[] = $e->errorInfo[2];
                       
                }
                }                         
              
        }
                 
}

public function actionCandreg1()
        { 
         
       $this->render('candreg1');
                 
}
public function actionCandreg2()
        { 
         
       $this->render('candreg2');
                 
}
public function actionCandreg3()
        { 
    
    
         $this->render('candreg3');
        }
        
        public function actionCandreg4()
        { 
       $Job_Post_Id= yii::app()->session['Job_Post_Id'];
       $EPE_ID=yii::app()->session['EPE_ID'];
      // $jobpostedit= JobPostEdit::model()->findByAttributes(array('EPE_EJP_ID'=>$Job_Post_Id,'EPE_ID'=>$EPE_ID));

       //$jobposting=JobPosting::model()->findAllByAttributes(array('EJP_ID'=>$Job_Post_Id));
      // $EPE_VIDEO_Y_N=$jobpostedit->EPE_VIDEO_Y_N;
       
       
//       $data= EmployerSubscription::model()->findByAttributes(array('ESUB_ID'=>$EJP_SUBSCR_ID));
//       $ESUB_SUBSCRS_ID=$data->ESUB_SUBSCRS_ID;
//       $data1= SubscriptionMaster::model()->findByAttributes(array('SUBSCRS_ID'=>$ESUB_SUBSCRS_ID));
//       $SUBSCRS_VIDEO_Y_N=$data1->SUBSCRS_VIDEO_Y_N;
        $this->layout='column_candiate_test';
         //$this->render('candreg4',array('SUBSCRS_VIDEO_Y_N'=>$EPE_VIDEO_Y_N));
           $this->render('candreg4');
        }

    public function actiontest_taken()
    {
         $this->layout='column_candiate_test';
         $this->render('test_taken');
      
    }
         public function actionindex1()
    {
      $this->layout='column_candiate_test';
      echo '<html><table style="height: 400px;
            margin: 118px 300px ;
            color:red;font-size:18px"><tr><td><b>Some technical issues in this page.try again later.
</b></td></tr></table>';
      
    } 

    public function actionagreement_policy()
{   
         $this->layout='column_candiate_test';
    $this->render('agreement_policy');
}
    

	
	
}
