<?php

class EmployerSubscriptionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column4';

	/**
	 * @return array action filters
	 */
//	public function filter  s()
//	{
//		return array(
//			'accessControl', // perform access control for CRUD operations
//			'postOnly + delete', // we only allow deletion via POST request
//		);
//	}
//
//	/**
//	 * Specifies the access control rules.
//	 * This method is used by the 'accessControl' filter.
//	 * @return array access control rules
//	 */
//	public function accessRules()
//	{
//		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
//	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
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
		
                 $Subscription=new SubscriptionMaster();   
              
		if($_POST['ids'])
		{       
                           
                            $del_camps = $_POST['ids'];
                            foreach ($del_camps as $_camp_id)
                           {
                             
                           $model=new EmployerSubscription; 
		           yii::app()->session['userid']=Yii::app()->user->name;  
                         $model->ESUB_EMP_ID =yii::app()->session['Emp_Id'];
                        $model->ESUB_SUBSCRS_ID=yii::app()->session['subsid']=$_camp_id; 
                        $model->ESUB_PURCHASE_DATE=NEW CDbExpression('NOW()');
                       
                        $connection=Yii::app()->db;
                       $sql1 = 'SELECT date_add(CURRENT_DATE,INTERVAL SUBSCRS_ACTIVE_DURATION DAY) as ExpireDate from subscription_master where SUBSCRS_ID="'.yii::app()->session['subsid'].'"';
                      
                        $cmd=$connection->createCommand($sql1);
                        foreach($cmd->queryAll() as $E_Date)
                        $model->ESUB_EXPIRY_DATE=$E_Date['ExpireDate'];  
                        $sql2 = 'SELECT SUBSCRS_CAND_COUNT from subscription_master where SUBSCRS_ID="'.yii::app()->session['subsid'].'"';
                        $model->ESUB_REMAIN_COUNT=$connection->createCommand($sql2)->queryScalar();
   
                        if($model->save())
                        {       
                          
                               $Total_Ref_Credit=0;
                               $Ref_Active_Credits=0;
                               $All_Emp_Ids='';
                               $All_Emp_Mail='';
                               $Update_Paid_Memeber="update employer_master set EMP_PAID_MEMBER=1 where EMP_ID=".yii::app()->session['Emp_Id'];
                               $connection->createCommand($Update_Paid_Memeber)->execute();
                            
                               
                               //employer_referrals record entry
                               
                               $Emp_Referral=new EmployerReferrals;
                              $Select_Emp="Select EMP_EMAIL_ID,EMP_REFERRED_BY from employer_master where EMP_ID=".$model->ESUB_EMP_ID;
                              $seemp=$connection->createCommand($Select_Emp)->queryAll();
                             
                               foreach($connection->createCommand($Select_Emp)->queryAll() as $emp)
                               {
                                   $Ref_Emp_Code=$emp['EMP_REFERRED_BY'];
                                   $Ref_Emp_Mail=$emp['EMP_EMAIL_ID'];
                               }
                                $Select_Id="select EMP_ID from employer_master where EMP_CODE='".$Ref_Emp_Code."'";
                               $Ref_Emp_Id=$connection->createCommand($Select_Id)->queryScalar();
                              
                           
                               if($Ref_Emp_Id!='')
                               {
                               $Select_Ref="Select REF_ALL_EMP_IDS,REF_ALL_MAIL_LIST,REF_TOT_CREDITS,REF_ACT_CREDITS from employer_referrals where REF_EMP_ID=".$Ref_Emp_Id;
                               $Select_Count="Select count(*) from employer_referrals where REF_EMP_ID=".$Ref_Emp_Id;   
                              $Count=$connection->createCommand($Select_Count)->queryScalar();
                               foreach($connection->createCommand($Select_Ref)->queryAll() as $ref)
                               {
                                   $All_Emp_Ids=$ref['REF_ALL_EMP_IDS'];
                                   $All_Emp_Mail=$ref['REF_ALL_MAIL_LIST'];
                                   $Total_Ref_Credit=$ref['REF_TOT_CREDITS'];
                                  $Ref_Active_Credits=$ref['REF_ACT_CREDITS'];
                               }    
                               if($Count==0)
                               {
                                   $Total_Ref_Credit=0;
                                   $Ref_Active_Credits=0;
                               }
                              // echo $check="SELECT COUNT_CHAR(REF_ALL_EMP_IDS,'".$model->ESUB_EMP_ID."') FROM employer_referrals WHERE REF_EMP_ID=".$Ref_Emp_Id;
                              // $Id_exists=$connection->createCommand($check)->queryScalar();
                              //   $va='call count_char1(REF_ALL_EMP_IDS,"'.$model->ESUB_EMP_ID.'",@test)';
                                $command = Yii::app()->db->createCommand('call count_char1("'.$All_Emp_Ids.'","'.$model->ESUB_EMP_ID.'",@test)');

                          $ee=$command->query(); 
                           $command = Yii::app()->db->createCommand('select @test');
                           $Id_exists=$command->queryScalar();
                              
                                if(($Id_exists==0))
                                  {
                                         $All_Emp_Ids.=$model->ESUB_EMP_ID.",";
                                         $All_Emp_Mail.=$Ref_Emp_Mail.",";
                                         $Total_Ref_Credit=$Total_Ref_Credit+1;
                                         $Ref_Active_Credits=$Ref_Active_Credits+1;
                                   } 
                               if($Count==0)
                               {            
                                        $Emp_Referral->REF_EMP_ID=$Ref_Emp_Id;
                                        $Emp_Referral->REF_TOT_CREDITS=1;
                                        $Emp_Referral->REF_ACT_CREDITS=1;
                                        $Emp_Referral->REF_ALL_EMP_IDS=$All_Emp_Ids;
                                        $Emp_Referral->REF_ALL_MAIL_LIST=$All_Emp_Mail;
                                        $Emp_Referral->save();
                                       
                               }
                               else
                               {        
                                       $Update_Emp_Referral="update employer_referrals set REF_TOT_CREDITS=".$Total_Ref_Credit.
                                                            ",REF_ALL_EMP_IDS='".$All_Emp_Ids.
                                                            "',REF_ALL_MAIL_LIST='".$All_Emp_Mail.
                                                            "',REF_ACT_CREDITS=".$Ref_Active_Credits.
                                                            " where REF_EMP_ID=".$Ref_Emp_Id;
                                       $connection->createCommand($Update_Emp_Referral)->execute();
                                       
                               }
                                if(($Id_exists==0))
                                  {
                                $subs_id = "SELECT date_add(CURRENT_DATE,INTERVAL SUBSCRS_ACTIVE_DURATION DAY) as ExpireDate from subscription_master where SUBSCRS_ID=19";
                                $connection->createCommand($subs_id);
                                foreach($connection->createCommand($subs_id)->queryAll() as $Exp_Date)
                                $Expiry_Date=$Exp_Date['ExpireDate'];
                                $Remain_Count = "SELECT SUBSCRS_CAND_COUNT from subscription_master where SUBSCRS_ID=19";
                                $R_Count=$connection->createCommand($Remain_Count)->queryScalar();
                                echo $Insert_Sub="insert into employer_subscription
                                (ESUB_EMP_ID,ESUB_SUBSCRS_ID,ESUB_PURCHASE_DATE,
                                    	ESUB_EXPIRY_DATE,ESUB_UTILIZED_COUNT,ESUB_REMAIN_COUNT)values
                                        (".$Ref_Emp_Id.",19,".NEW CDbExpression('NOW()').",'".$Expiry_Date."','',".$R_Count.")";
                               $connection->createCommand($Insert_Sub)->execute();
                               }
                               }
                               
                        }
                }
               // echo 'you got your subscription successfully';
               
              
        }
                  
                $this->render('create',array('model'=>$model,'Subscription'=>$Subscription));
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

		if(isset($_POST['EmployerSubscription']))
		{
			$model->attributes=$_POST['EmployerSubscription'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ESUB_ID));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('EmployerSubscription');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmployerSubscription('search');
		$model->unsetAttributes();  // clear any default values
                
                
                yii::app()->session['userid']=Yii::app()->user->name;
                $connection=Yii::app()->db;
                if(yii::app()->session['LoginAction']=='Emp_Login_Action')
                {
                $sql = 'SELECT EMP_ID from employer_master where EMP_FIRST_NAME ="'.yii::app()->session['userid'].'"';
                $model->ESUB_EMP_ID=$connection->createCommand($sql)->queryScalar();
                }
                    
		if(isset($_GET['EmployerSubscription']))
		$model->attributes=$_GET['EmployerSubscription'];
                
                 $empscount=EmployerSubscription::model()->count("ESUB_EMP_ID='".yii::app()->session['Emp_Id']."' and ESUB_STATUS=1");
            //
                 
//                 $model= EmployerSubscription::model()->findAllByAttributes(array('ESUB_EMP_ID'=>yii::app()->session['Emp_Id']));
//        $criteria=new CDbCriteria();
//        $criteria->condition='ESUB_EMP_ID='.yii::app()->session['Emp_Id'].' and ESUB_REMAIN_COUNT>0';
//        $criteria->distinct=true;
//        $model=EmployerSubscription::model()->findAll("ESUB_REMAIN_COUNT>0");
            
                 
                 
                 $this->render('admin',array(
			'model'=>$model,'action'=>'view','empscount'=>$empscount,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EmployerSubscription the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EmployerSubscription::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EmployerSubscription $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='employer-subscription-form')
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
         
                $model_camp=new EmployerSubscription;
                           
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
        
        	public function actionaddsub()
	{
		
               	 TempTransDetail::model()->deleteAllByAttributes(array('ttd_emp_id'=>Yii::app()->session['Emp_Id']));


		if($_POST['ids'])
		{       
                        $del_camps = $_POST['ids'];
                        foreach($del_camps as $value)
                        {
                             $model=new TempTransDetail();   
                             $model->ttd_emp_id=yii::app()->session['Emp_Id'];
                             $model->ttd_session_id= Yii::app()->session->sessionID;
                             $model->ttd_sub_id=$value;
                             $model->ttd_status=0;
                             $model->ttd_creates_date=NEW CDbExpression('NOW()');
                             $model->save();
                         }
                           
                }
        }
        
        
              	public function actionorder1()
	{
                $model=new SubscriptionMaster();   
              
		$this->render('order',array(
			'model'=>$model,
		));          
        }
       public function actionshopping_cart()
	{
                $model=new SubscriptionMaster();   
              
		$this->render('shopping_cart',array(
			'model'=>$model,
		));          
        }
        
             
        	public function actionupdatesub()
	{
		
               
              
		if($_POST['ids'])
            {         $del_camps = $_POST['ids'];
                      foreach($del_camps as $value)
                    {     
                          
                         $var= TempTransDetail::model()->findAllByAttributes(array('ttd_sub_id'=>$value,'ttd_emp_id'=>yii::app()->session['Emp_Id'],'ttd_session_id'=>Yii::app()->session->sessionID));
                         $temp_count= count($var);
                         if($temp_count==0)
                         {
                             $model=new TempTransDetail();   
                             $model->ttd_emp_id=yii::app()->session['Emp_Id'];
                             $model->ttd_session_id= Yii::app()->session->sessionID;
                             $model->ttd_sub_id=$value;
                             $model->ttd_status=0;
                             $model->ttd_creates_date=NEW CDbExpression('NOW()');
                             $model->save();
                         }
                    }
                 

                           
                }
        }
                            
           	public function actionremovesub()
	{
                $model=new  TempTransDetail;   
                $key=$_POST['key'];
                $ttd_td_id=$_POST['ttd_td_id'];
                $model->deleteByPk($key);
                $var= TempTransDetail::model()->findAllByAttributes(array('ttd_session_id'=>Yii::app()->session->sessionID,'ttd_emp_id'=>yii::app()->session['Emp_Id']));
                echo $temp_count= count($var);
                     
                      //unset(yii::app()->session['dimension1'][$key]); 
                    
//                $session = Yii::app()->session;
//
//       //unset(yii::app()->session['cart']);
//       echo yii::app()->session['cart'];
//       exit;
//              $remove_item=$_POST['id'];
//              $key=$_POST['key'];
//             unset($session['dimension1'][$key]); 
//               
//               $key1=array_search($remove_item,yii::app()->session['dimension1']);
//    if($key1!==false) unset(yii::app()->session['dimension1'][$key1]);
//         //  echo   $index = array_search($key, yii::app()->session['dimension1']);
////              unset(yii::app()->session['dimension1'][0]);
//print_r(yii::app()->session['dimension1'][$key]);

        }
        public function actionremovesuball()
	{
            TempTransDetail::model()->deleteAllByAttributes(array('ttd_session_id'=>Yii::app()->session->sessionID));
            $this->redirect(array('Site/Subscription'));
        
        }
        public function actionorder()
	{   
                  
                        yii::app()->session['cart'];
                        $sub_id=yii::app()->session['subsid'];
                        $total= intval(yii::app()->session['total']);
                     
                        $transmodel=new TransactionDetails;
                        $transmodel->td_emp_id=yii::app()->session['Emp_Id'];
                        $transmodel->td_session_id= Yii::app()->session->sessionID;
                        $transmodel->td_status='Pending';
                        $transmodel->td_amount=$total;
                        $transmodel->td_created_date=new CDbExpression('NOW()');
          
                       if($transmodel->save())
                        {  
                           $td_id=yii::app()->session['td_id']=$transmodel->getPrimaryKey();
                           $connection=Yii::app()->db;    
                           $Update_trans_temp_details="update temp_trans_detail set  ttd_td_id="."'$td_id'".


                                                                         " where ttd_session_id="."'$transmodel->td_session_id'" ."and ttd_emp_id=".yii::app()->session['Emp_Id'];
                          $connection->createCommand($Update_trans_temp_details)->execute(); 

                             $this->redirect(array('payment','id'=>$td_id,'session_id'=>$transmodel->td_session_id));
                        }
               

        }
      
        
}
