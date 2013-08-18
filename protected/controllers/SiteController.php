<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
    public $layout='//layouts/column4';
  public $defaultAction = 'EmpLogin';
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
//                        'ajaxcontent'=>'ext.actions.XAjaxViewAction'
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            if(empty(yii::app()->session['id'])) 
                {
                $this->redirect('EmpLogin');
                }
            else
                {
                 $this->redirect('test_index');

                }

	}
            public function actionauto()
         {    
              $jobposting=new JobPosting; 
             $this->render('auto',array('jobposting'=>$jobposting));
         }
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */

        public function actionEmpLogin1()
        {       
               
                $model=new EmployerMaster();
                $loginmodel=new LoginForm();
                if(isset($_POST['EmployerMaster']))
                {
                $model->attributes=$_POST['EmployerMaster'];
                    
               if($model->validate())
               {   
                    $Emp_Login_Id = $model->EMP_LOGIN_ID;
                    $salt = "hpaacskw";  
                    $Emp_Password = hash('sha256', $salt.$model ->EMP_PASSWORD);
                    $EmpLoginId = EmployerMaster::model()->findByAttributes(array('EMP_LOGIN_ID'=>$Emp_Login_Id));
                    if(!empty($EmpLoginId))
                    {   
                        if(($EmpLoginId->EMP_PASSWORD==$Emp_Password)&&($EmpLoginId->EMP_STATUS ==1))
                        {    
                            yii::app()->session['id']=$EmpLoginId->EMP_FIRST_NAME;
                            yii::app()->session['Emp_Id']=$EmpLoginId->EMP_ID;
                            yii::app()->session['User_Name']=Yii::app()->user->name=$EmpLoginId->EMP_FIRST_NAME;
                            yii::app()->session['LoginAction']='Emp_Login_Action';
                            
                            $criteria=new CDbCriteria();
                            $criteria->condition="EJP_EMP_ID='".yii::app()->session['Emp_Id']."'";
                            $jpmcount=JobPosting::model()->count($criteria);
                            if((yii::app()->session['Emp_Id']!='')&&($jpmcount>0))
                            {
                                $this->redirect(Yii::app()->request->baseUrl.'/Site/Dashboard');
                            }
//                            
                            elseif((yii::app()->session['Emp_Id']!='')&&($jpmcount==0)){
                                
                            $this->redirect(Yii::app()->request->baseUrl.'/Site/test_index');
                            
                            }
                            
                        }
                        elseif(($EmpLoginId->EMP_PASSWORD==$Emp_Password)&&($EmpLoginId->EMP_STATUS ==0))
                        {
                            $model-> addError('EMP_LOGIN_ID','You are not a active user ');
                        }
                        else
                        {
                           $model->addError('EMP_PASSWORD','Invalid password'); 
                        }
                    }
                    
                    else
                    { 
                        $model->addError('EMP_LOGIN_ID','Invalid User'); 
                    }
//                   
//                    
                }
                 
                }
                $this->render('Emp_Login',array('employeemodel'=>$model,'model'=>$loginmodel));

                    
        }
        public function actionForgotPassword()
        {       
            if(isset($_POST['EmployerMaster']['Forget_Login_Id']))
            {   
            $empid=$_POST['EmployerMaster']['Forget_Login_Id'];
            $connection=yii::app()->db;
            $sql="SELECT count(*) as Count,EMP_FIRST_NAME, EMP_LOGIN_ID,EMP_STATUS FROM employer_master WHERE  EMP_EMAIL_ID='".$empid."'";
            //$count=$connection->createCommand($sql)->queryAll();
            foreach($connection->createCommand($sql)->queryAll() as $value)
            {
                $count=$value['Count'];
                $Name=$value['EMP_FIRST_NAME'];
                $EMP_LOGIN_ID=$value['EMP_LOGIN_ID'];
                $Status=$value['EMP_STATUS'];
            }
            if($count>0)
            { 
            if($Status==1) 
            {
            $Ran_Code='';
            $Gen_Code= '';
            $Set='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            for($s=0;$s<10;$s++)
            {
            $Ran_Code.=$Set[rand(0,strlen($Set))];
            }
            for ($i = 0; $i < strlen($Ran_Code); $i++)
                     {
                        $Gen_Code .= $Ran_Code[rand(0, strlen($Ran_Code) - 1)];
                     }
//           /  echo  $Gen_Code;  
             echo 'Password Sent to Your Registered Mail ID' ;  
             
             $salt = "hpaacskw";  
             $Encryp_Gen_Code = hash('sha256', $salt.$Gen_Code);
            $update_Pass="update employer_master set EMP_PASSWORD='".$Encryp_Gen_Code."' where EMP_EMAIL_ID='".$empid."'";
            
            if($connection->createCommand($update_Pass)->execute())
            {
            
                              $email = Yii::createComponent('application.extensions.mailer.EMailer');

                               $email->From = Yii::app()->params['RegEmail'];

                               $email->FromName = Yii::app()->params['RegName'];

                               $email->AddReplyTo(Yii::app()->params['RegEmail']);

                               $email->AddAddress($empid);

                               $email->CharSet = 'UTF-8';

                               $email->Subject = 'Confirmation Mail';
                             
                               $email->MsgHTML($this->renderPartial('PasswordMail', array('Gen_Code' =>$Gen_Code,'EMP_LOGIN_ID'=>$EMP_LOGIN_ID,'Name'=>$Name), true));
                             
                               $email->Send();
                                  
                        
            }
            }
            else
            {
                echo 'sorry ,Your account was not yet activated';
            }
            }
            else 
            {
                echo 'User Does Not Exists';
            }
        }
        }
        
         public function actionReferFriend($Emp_Id)
        {   
             if(!(yii::app()->session['id'])) 
                {
                 
                     $this->forward('Site/EmpLogin');
                }
            else
                {   
                 if(isset($_POST['EmployerProspects']['PROS_MAIL_LIST']))
                { 
                
                $connection=yii::app()->db;
                $Check="select EMP_EMAIL_ID from employer_master where EMP_ID=".$Emp_Id;
                $Emp_Mail=$connection->createCommand($Check)->queryScalar();
                $EmployerProspects=new EmployerProspects;
                $Receipents=$_POST['EmployerProspects']['PROS_MAIL_LIST'];
                $Receipent=explode(';',$Receipents);
                $count=0;
                $Mail_List='';
                foreach ($Receipent as $R)  
                    {   
                        if(filter_var($R, FILTER_VALIDATE_EMAIL))
                        {
                            if($Emp_Mail!=$R)
                            {
                                $Mail_List.=$R.";";
                                $count++;
                            }
                            else    
                            {
                                echo 'Self Referring not allowed;';
                                
                            }
                        }
                        else
                        {  
                          echo $R.";";
                          //$this->redirect(Yii::app()->user->returnUrl);
                        }
                     }
                     echo '@@@';
                $EmployerProspects->PROS_EMP_ID=$Emp_Id;
                $EmployerProspects->PROS_INIT_DATE=new CDbExpression('NOW()');
                $EmployerProspects->PROS_MAIL_LIST=$Mail_List;
                $EmployerProspects->PROS_MAIL_COUNT=$count;
                $connection=yii::app()->db;
                $Emp_Name="SELECT EMP_FIRST_NAME FROM employer_master WHERE  EMP_ID='".$Emp_Id."'";
                $Name=$connection->createCommand($Emp_Name)->queryScalar();
                if($EmployerProspects->save()) 
                {
                    echo 'successfully referred Your friend(s)';
                    $List=explode(';',$Mail_List);
                    $email = Yii::createComponent('application.extensions.mailer.EMailer');
                    foreach($List as $Friend_Mail)
                    {  
                    $email->From = Yii::app()->params['RegEmail'];
                    $email->FromName = Yii::app()->params['RegName'];
                    $email->AddReplyTo(Yii::app()->params['RegEmail']);
                    $email->AddAddress($Friend_Mail);
                    $email->CharSet = 'UTF-8';
                    $email->Subject = 'Notification Mail';
                    $email->MsgHTML($this->renderPartial('ReferMail', array('Name' => $Name), true));
                    $email->Send();
                    $email->ClearAddresses();
                    $email->ClearCCs();
                    $email->ClearBCCs();
                    $email->ClearReplyTos();
                    $email->ClearAllRecipients();
                    $email->ClearAttachments();
                    $email->ClearCustomHeaders();
                    }
                }
          }
                }
//            $this->render('ReferFriend',array('EmployerProspects'=> new EmployerProspects,'Emp_Id'=>yii::app()->session['Emp_Id']));
        }
        
	public function actionLogout()
	{
	   //TempTransDetail::model()->deleteAllByAttributes(array('ttd_session_id'=>Yii::app()->session->sessionID,'ttd_emp_id'=>Yii::app()->session['Emp_Id']));
            //Yii::app()->user->logout();
             Yii::app()->session->destroy();
		//$this->redirect(Yii::app()->homeUrl);
		$this->redirect('EmpLogin');
	   // $this->forward('EmployerMaster/index');
		
	}

        public function actionForgotPassword_1()
        {      
            if(isset($_POST['LoginForm']['Forget_Login_Id_1']))
            {  
            $adminid=$_POST['LoginForm']['Forget_Login_Id_1'];
            $connection=yii::app()->db;
            $sql="SELECT count(*) FROM admin WHERE  EMAIL_ID='".$adminid."'";
            
            $count=$connection->createCommand($sql)->queryScalar();
           
            if($count>0)
            {
            $Ran_Code='';
            $Gen_Code= '';
            $Set='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            for($s=0;$s<10;$s++)
            {
            $Ran_Code.=$Set[rand(0,strlen($Set))];
            }
            for ($i = 0; $i < strlen($Ran_Code); $i++)
                     {
                        $Gen_Code .= $Ran_Code[rand(0, strlen($Ran_Code) - 1)];
                     }
//             echo  $Gen_Code;  
             echo 'Password Sent to Your Registered Mail ID' ;   
             $salt = "hpaacskw";  
             $Encryp_Code = hash('sha256', $salt.$Gen_Code);
            $update_Pass="update admin set PASSWORD='".$Encryp_Code."' where EMAIL_ID='".$adminid."'";
            $connection->createCommand($update_Pass)->execute();
            }
            else 
            {
                echo 'User Does Not Exists';
            }
        }
        }
        public function actionDashboard()
	{
		if(!(yii::app()->session['id'])) 
                {
                     $this->forward('Site/EmpLogin');

                }
                 else
		{
                
                 $this->render('Dashboard',array('action'=>'view'));
                }
                
	}
         public function actionNew_Posting()
	{
               if(!(yii::app()->session['id'])) 
                {
                     $this->forward('Site/EmpLogin');
                }
                else
		{              
                    $this->render('New_Posting');
                }
                
              
	}
         public function actionEdit_Posting()
	{
                //$id=yii::app()->session['id'];
                if(!(yii::app()->session['id'])) 
                {
                     $this->forward('Site/EmpLogin');

                }
                 else
		{
		  $this->render('Edit_Posting',array('action'=>'edit'));
		}
		
                
                
              
	}
           public function actionSubscription()
	{
               
	   if(!(yii::app()->session['id'])) 
                {
                     $this->forward('Site/EmpLogin');

                }
                 else
		{
                 $this->render('Subscription');
                }
                
	}      
       
        public function actionEmpLogin()
        {  
              if(empty(yii::app()->session['id']))
              {
                 
               $this->layout='column1';
                 $model=new EmployerMaster();
         
                if(isset($_POST['EmployerMaster']))
                {
               
                $model->attributes=$_POST['EmployerMaster'];
            
//               if($model->validate())
//               {   
                    $Emp_Login_Id = $_POST['EmployerMaster']['login_id'];
                    $salt = "hpaacskw";  
                    $Emp_Password = hash('sha256', $salt.$model ->EMP_PASSWORD);
                    $EmpLoginId = EmployerMaster::model()->findByAttributes(array('EMP_LOGIN_ID'=>$Emp_Login_Id));
                 
                    if(!empty($EmpLoginId))
                    {   
                        if(($EmpLoginId->EMP_PASSWORD==$Emp_Password)&&($EmpLoginId->EMP_STATUS ==1))
                        {    
                            yii::app()->session['id']=$EmpLoginId->EMP_FIRST_NAME;
                            yii::app()->session['Emp_Id']=$EmpLoginId->EMP_ID;
                            yii::app()->session['User_Name']=Yii::app()->user->name=$EmpLoginId->EMP_FIRST_NAME;
                            yii::app()->session['LoginAction']='Emp_Login_Action';
                            
                            $criteria=new CDbCriteria();
                            $criteria->condition="EJP_EMP_ID='".yii::app()->session['Emp_Id']."'";
                            $jpmcount=JobPosting::model()->count($criteria);
                            if((yii::app()->session['Emp_Id']!='')&&($jpmcount>0))
                            {
                                $this->redirect(Yii::app()->request->baseUrl.'/Site/Dashboard');
                            }
//                            
                            elseif((yii::app()->session['Emp_Id']!='')&&($jpmcount==0)){
                            $this->redirect(Yii::app()->user->returnUrl);}
                            
                        }
                        elseif(($EmpLoginId->EMP_PASSWORD==$Emp_Password)&&($EmpLoginId->EMP_STATUS ==0))
                        {
                            $this->redirect(array('EmpLogin','errorarray'=>'You are not a active user')); 
                        }
                        else
                        {
                          
                           $this->redirect(array('EmpLogin','errorarray'=>'Invalid password')); 

                        }
                    }
                    
                    else
                    { 
                        $this->redirect(array('EmpLogin','errorarray'=>'Invalid User')); 
                    }
                  
               // }
                 
                }
                else
                {
                $EmployerMaster=new EmployerMaster;
                $activationkey=  $this->randr(15);
                $connection=yii::app()->db;
                $sql="Select count(*) from employer_master";
                yii::app()->session['First_Record']=$First_Record=$connection->createCommand($sql)->queryScalar();
                $this->render('index',array('Action_Name'=>yii::app()->session['LoginAction'],'action'=>'create',
                'First_Record'=>$First_Record,'Emp_Id'=>yii::app()->session['Emp_Id']));
                }
               
              }
              else
              {
                    $this->layout='column4';
                    $this->redirect('Dashboard');
              }
             
              // $this->render('Emp_login_new',array('employeemodel'=>$model));
        }

        public function actionlearnmore()
        {
            
              $this->render('learn_more');
      
                  //$this->renderPartial('learn_more');
        }
        
         public function actiontest_index()
        {
            
              $this->render('test_index');
      
                  //$this->renderPartial('learn_more');
        }
        protected function randr($j)
        {
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
        
        
        
    }