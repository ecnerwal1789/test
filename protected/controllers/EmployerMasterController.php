<?php

class EmployerMasterController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column4';

	/**
	 * @return array action filters
	 
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}*/

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
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
			),
		);
	} 
        
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
        }*/
         public function actionCity()
        {    
        $list = EmployerMaster::model()->findAll();
        $results = array();
         foreach($list as $p) 
             {
                $results[] = array(
                'id' => $p->EMP_ID, 
                 'text' => $p->EMP_CODE, );
            }
        echo CJSON::encode($results);
        }
        public function actionCountryDropDown()
        {  
           $Country=$_POST['EmployerMaster']['EMP_COUNTRY_ID'];
           //$Country_Name=CountryMaster::model()->findByAttributes(array('COUNTRY_ID'=>$Country));
           $State=StateMaster::model()->findAllByAttributes(array('STATE_COUNTRY_ID'=>$Country));
            $list=CHtml::listData($State,'STATE_ID','STATE_NAME');
             //echo CHtml::tag('option',  array('Value'=>0),'- - - - Select State - - - -',true);
            foreach($list as $value=>$State_Name)
                {   
                
                    echo CHtml::tag('option',array('value'=>$value),CHtml::encode($State_Name),true);
                }
            }
        public function actionStateDropDown()
        {  
           $State=$_POST['EmployerMaster']['EMP_STATE_ID'];
           //$State_Name=SState::model()->findByAttributes(array('State_Id'=>$State));
           $City=CityMaster::model()->findAllByAttributes(array('CITY_STATE_ID'=>$State));
            $list=CHtml::listData($City,'CITY_ID','CITY_NAME');
             echo CHtml::tag('option',  array('Value'=>0),'- - - - Select City - - - -',true);
            foreach($list as $value=>$City_Name)
                {
                    echo CHtml::tag('option',array('value'=>$value),CHtml::encode($City_Name),true);
                }
        }
        public function actionChangePassword($Emp_Id)
        {  
            $EmployerMaster=new EmployerMaster;
            $Emp_Detail=EmployerMaster::model()->findByAttributes(array('EMP_ID'=>$Emp_Id));
            $salt = "hpaacskw";  
            $Old_Password = hash('sha256', $salt.$_POST['EmployerMaster']['Old_Password']);
            
            if($Emp_Detail->EMP_PASSWORD==$Old_Password)
            {   
                if($_POST['EmployerMaster']['New_Password']!='')
                {
                if($_POST['EmployerMaster']['New_Password']==$_POST['EmployerMaster']['Confirm_Password'])
                {
                   $New_Password=hash('sha256', $salt.$_POST['EmployerMaster']['Confirm_Password']);
                   $connection=yii::app()->db;
                   $update="update employer_master set EMP_PASSWORD='".$New_Password."' where EMP_ID='".$Emp_Id."'";
                   $connection->createCommand($update)->execute();
                   echo 'Password Changed Successfully';
                   //$this->redirect('update',array('id'=>1));
                }
                else
                {
                    echo 'Password mismatch';     
                }
                }
                else
                {
                    echo 'New Password Cant be Empty';
                    exit;
                }
            }
            
            else 
            {
                echo 'Password Wrong';
            }
             
        }
        public function actionEmpReferred()
        {   
                $Emp_Referred=$_POST['EmployerMaster']['EMP_REFERRED_BY'];
                $criteria=new CDbCriteria();
                $criteria->condition="EMP_CODE='".$Emp_Referred."'";
                $count=EmployerMaster::model()->count($criteria);
                if($count==0)
                {
                echo 'Emp Does not Exists';
                }
        }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'EmployerMaster'=>$this->loadModel($id),
		));
	}
        
	public function actionCreate()
	{
		
             if(isset(yii::app()->session['id']))
             {
                 
                 $this->redirect('Site/Dashboard');
             }
 else {
                $EmployerMaster=new EmployerMaster;
                $activationkey=  $this->randr(15);
                $connection=yii::app()->db;
                $sql="Select count(*) from employer_master";
                yii::app()->session['First_Record']=$First_Record=$connection->createCommand($sql)->queryScalar();
                // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidatssssion($model);
		if(isset($_POST['EmployerMaster']))
		{       
			$EmployerMaster->attributes=$_POST['EmployerMaster'];
                        if(isset($_POST['EmployerMaster']['EMP_REFERRED_BY']))
                        {
                        $EmployerMaster->EMP_REFERRED_BY=  strtoupper($_POST['EmployerMaster']['EMP_REFERRED_BY']);
                        }
                        $EmployerMaster->EMP_COUNTRY_ID=$_POST['EmployerMaster']['EMP_COUNTRY_ID'];
                        $EmployerMaster->EMP_STATE_ID=$_POST['EmployerMaster']['EMP_STATE_ID'];
                        $EmployerMaster->EMP_CITY_ID=$_POST['EmployerMaster']['EMP_CITY_ID'];
                        $EmployerMaster->CREATED_DATE=new CDbExpression('NOW()');  
                        if($EmployerMaster->validate())
                        {
                            $salt = "hpaacskw";  
                            $password = hash('sha256', $salt.$EmployerMaster->EMP_PASSWORD);  
                            $EmployerMaster->EMP_PASSWORD=$password;
                                  $result=EmployerMaster::model()->findAll();
                                  $count=count($result);
                                  if($count==0)
                                  {
                                    $EmployerMaster->EMP_CODE="IME"."000000001";
                                  }
                                  else
                                  {     
                                 
                                      $sql="Select MAX(CAST(SUBSTR(EMP_CODE,'4','12')AS UNSIGNED)) as EMP_CODE  from employer_master";
                                      $Last_Code=$connection->createCommand($sql)->queryScalar();
                                      $Code=$Last_Code+1;
                                      if($Code<=9)
                                      {
                                          $New_Code="00000000".$Code;
                                      }
                                      else if(($Code>9)&&($Code<=99))
                                      {
                                          $New_Code="0000000".$Code;
                                      }
                                      else if(($Code>99)&&($Code<=999))
                                      {
                                          $New_Code="000000".$Code;
                                      }
                                      else if(($Code>999)&&($Code<=9999))
                                      {
                                          $New_Code="00000".$Code;
                                      }
                                      else if(($Code>9999)&&($Code<=99999))
                                      {
                                          $New_Code="0000".$Code;
                                      }
                                      else if(($Code>99999)&&($Code<=999999))
                                      {
                                          $New_Code="000".$Code;
                                      }
                                      else if(($Code>999999)&&($Code<=9999999))
                                      {
                                          $New_Code="00".$Code;
                                      }
                                      else if(($Code>9999999)&&($Code<=99999999))
                                      {
                                          $New_Code="0".$Code;
                                      }
                                      else if(Code>99999999)
                                      {
                                          $New_Code=$Code;
                                      }
                                      
                                     $EmployerMaster->EMP_CODE="IME".$New_Code;
                                  }
//                            $password1 = hash('sha256', $salt.'asdfgh');
//                            if($password==$password1)echo'eq';
//                            exit;
                                  
                        $EmployerMaster->EMP_COMP_URL=strtolower($_POST['EmployerMaster']['EMP_COMP_URL']);
                        $EmployerMaster->UPDATED_USER=$_POST['EmployerMaster']['EMP_FIRST_NAME'];
                        $EmployerMaster->UPDATED_DATE=new CDbExpression('Now()');
                        $EmployerMaster->EMP_ACT_KEY=$activationkey;
                        /* Changed on 3-7-13 by pandi  */             
                        //$admin_mail='thangapandi.k@tecneto.com' ;
                        
			if($EmployerMaster->save())
                        {
                       
                            $email = Yii::createComponent('application.extensions.mailer.EMailer');

                               $email->From = Yii::app()->params['RegEmail'];

                               $email->FromName = Yii::app()->params['RegName'];

                               //$email->AddReplyTo(Yii::app()->params['RegEmail']);

                               $email->AddAddress(Yii::app()->params['RegEmail']);

                               $email->CharSet = 'UTF-8';

                               $email->Subject = 'Employer Registration Mail';

                               $email->MsgHTML($this->renderPartial('mail', array('EmployerMaster' => $EmployerMaster), true));

                               $email->Send();
                             
                                        
                        }
                            
				//$this->forward(array('register_suc',array('id'=>$EmployerMaster->EMP_FIRST_NAME)));
                                     $this->redirect(array('register_suc','id'=>$EmployerMaster->EMP_FIRST_NAME));
                        }
		}
                        $this->render('create',array(
			'EmployerMaster'=>$EmployerMaster,'Action_Name'=>yii::app()->session['LoginAction'],'action'=>'create',
                         'First_Record'=>$First_Record,'Emp_Id'=>yii::app()->session['Emp_Id']
		));
 }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
         
//               $EmployerMaster=new EmployerMaster;
//            print_r($EmployerMaster);
//            exit;
		$EmployerMaster=$this->loadModel($id);
               
                if(yii::app()->session['LoginAction']=='Emp_Login_Action')
                {
                if(yii::app()->session['Emp_Id']==$EmployerMaster->EMP_ID)
                {
		if(isset($_POST['EmployerMaster']))
		{        
                        
			$EmployerMaster->attributes=$_POST['EmployerMaster'];
                        yii::app()->session['User_Name']=$_POST['EmployerMaster']['EMP_FIRST_NAME'];
                        $EmployerMaster->UPDATED_DATE=new CDbExpression('NOW()');
                        $EmployerMaster->UPDATED_USER=yii::app()->session['User_Name'];
                        if($EmployerMaster->validate())
                        {
                        try
                        {
                            $EmployerMaster->save();    
                        }
                        catch (CDbException $e)
                        {


                        }
                        }
		
                           
                            $this->redirect(array('View','id'=>yii::app()->session['Emp_Id']));
                        
                        
                }

		$this->render('update',array(
			'EmployerMaster'=>$EmployerMaster,'Action_Name'=>yii::app()->session['LoginAction'],'action'=>'update',
                        'First_Record'=>yii::app()->session['First_Record'],'Emp_Id'=>yii::app()->session['Emp_Id']
		));
                }
                 else
                {
                    throw new CHttpException(':Access Denied');
                }
                }
                else 
                    {
                if(isset($_POST['EmployerMaster']))
                    {
                    
			$EmployerMaster->attributes=$_POST['EmployerMaster'];
                        $EmployerMaster->UPDATED_DATE=new CDbExpression('NOW()');
                        $EmployerMaster->UPDATED_USER=yii::app()->session['id'];
//                        
                        if($EmployerMaster->validate())
                        {
			if($EmployerMaster->save())
                        $this->redirect(array('admin','User'=>yii::app()->session['id']));
                        
                        }
                }

		$this->render('update',array(
			'EmployerMaster'=>$EmployerMaster,'Action_Name'=>yii::app()->session['LoginAction'],'action'=>'update',
                        'First_Record'=>yii::app()->session['First_Record'],'Emp_Id'=>yii::app()->session['Emp_Id']
		));
                    }
               
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
              if(empty(yii::app()->session['id']))
              {
               $this->layout='column1';
               	$EmployerMaster=new EmployerMaster;
                $activationkey=  $this->randr(15);
                $connection=yii::app()->db;
                $sql="Select count(*) from employer_master";
                yii::app()->session['First_Record']=$First_Record=$connection->createCommand($sql)->queryScalar();
                $this->render('index',array('Action_Name'=>yii::app()->session['LoginAction'],'action'=>'create',
                'First_Record'=>$First_Record,'Emp_Id'=>yii::app()->session['Emp_Id']));
              }
              else
              {
                    $this->layout='column4';
              }

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$EmployerMaster=new EmployerMaster('search');
		$EmployerMaster->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployerMaster']))
		$EmployerMaster->attributes=$_GET['EmployerMaster'];               
		$this->render('admin',array(
			'EmployerMaster'=>$EmployerMaster,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EmployerMaster the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$EmployerMaster=EmployerMaster::model()->findByPk($id);
		if($EmployerMaster===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $EmployerMaster;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EmployerMaster $model the model to be validated
	 */
	protected function performAjaxValidation($EmployerMaster)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='employer-master-form')
		{
			CActiveForm::validate($EmployerMaster);
			Yii::app()->end();
		}
	}
        public function actionDeleteAll()
        { 
         
        if ($_POST['ids'])
        {
                
                $del_camps = $_POST['ids'];
         
                $model_camp=new EmployerMaster;
                           
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
protected function randr($j){
    $string = "";
    for($i=0; $i < $j; $i++){
        $x = mt_rand(0, 2);
        switch($x){
            case 0: $string.= chr(mt_rand(97,122));break;
            case 1: $string.= chr(mt_rand(65,90));break;
            case 2: $string.= chr(mt_rand(48,57));break;
        }
    }
    return $string; 
}
public function actionactive()
{
  $EmployerMaster=new EmployerMaster;
  $EMP_ID=$_GET['id'];
  $EMP_ACT_KEY=$_GET['activationKey'];
  $empcount=EmployerMaster::model()->findByPk($EMP_ID);
  //$empcount=count($EmployerMaster);
  $connection=yii::app()->db;
    if(!empty($empcount))
{   
     $currentDate =date("Y-m-d H:i:s");
     $Reg_Date=$empcount->EMP_REG_DATE;
     $select = 'SELECT DATEDIFF("'.$currentDate.'","'.$Reg_Date.'") as Diff ';
     $Diff=$connection->createCommand($select)->queryScalar();
     if($Diff<=7)
     {
            if(($empcount->EMP_ACT_KEY ==$EMP_ACT_KEY) )
           {  
                  $update="update employer_master set EMP_STATUS=1 where EMP_ID='".$EMP_ID."'";
                  $connection->createCommand($update)->execute(); 
                  $this->redirect(array('Site/EmpLogin'));
           }
     }
     else
     {
            $this->redirect(array('EmployerMaster/InActive'));
              //$this->render('InactiveUser');
     }
 }
}
public function actionInActive()
{   
    $this->render('InactiveUser');
}
public function actionregister_suc($id)
{
   
     $this->render('register_suc',array('emp_first_name'=>$id));
}
public function actionagreement_policy()
{   
    $this->render('agreement_policy');
}
        
}
