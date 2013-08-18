<?php

class PaypalController extends Controller
{
    public $layout='//layouts/column4';
         /*protected function beforeAction($action) {
                 
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
    public function actioncancel()
	{
		//The token of the cancelled payment typically used to cancel the payment within your application
                    TempTransDetail::model()->deleteAllByAttributes(array('ttd_emp_id'=>Yii::app()->session['Emp_Id']));
           	    $this->render('paypal_con',array('action'=>'cancel'));
	}
	
        
         public function actionsuccess()
	{
           $del_camps =yii::app()->session->sessionID;
//            if($_GET['session_id']==$del_camps)
//            {
               $connection=Yii::app()->db;    
               $transid= $_GET['tx'];  
               $trans_status= $_GET['st'];
               $Update_trans_details="update transaction_details set  td_trans_id="."'$transid'".
                                                            ",td_status="."'$trans_status'".

                                                            " where td_session_id="."'$del_camps'" ."and td_emp_id=".yii::app()->session['Emp_Id']." and td_id=".yii::app()->session['td_id'];
             $connection->createCommand($Update_trans_details)->execute();

		//The token of the cancelled payment typically used to cancel the payment within your application
	       
                         $del_camps= TempTransDetail::model()->findAllByAttributes(array('ttd_session_id'=>Yii::app()->session->sessionID));
                            $sub_id=array();
                            foreach ($del_camps as $var1)
                           {
                        $data1= SubscriptionMaster::model()->findByAttributes(array('SUBSCRS_ID'=>$var1->ttd_sub_id));
                        $esub= EmployerSubscription::model()->findByAttributes(array('ESUB_SUBSCRS_ID'=>$var1->ttd_sub_id,'ESUB_EMP_ID'=>yii::app()->session['Emp_Id']));
                        $counesub=count($esub);
                        $model=new EmployerSubscription; 
                        yii::app()->session['userid']=Yii::app()->user->name;  
                        $model->ESUB_EMP_ID =yii::app()->session['Emp_Id'];
                        $sub_id[]=$model->ESUB_SUBSCRS_ID=yii::app()->session['subsid']=$var1->ttd_sub_id; 
                        $model->ESUB_PURCHASE_DATE=new CDbExpression('NOW()');
                        $model->CREATED_DATE=new CDbExpression('NOW()');
                        $model->UPDATED_DATE=new CDbExpression('NOW()');
                        $sql1 = 'SELECT date_add(CURRENT_DATE,INTERVAL SUBSCRS_ACTIVE_DURATION DAY) as ExpireDate from subscription_master where SUBSCRS_ID="'.$var1->ttd_sub_id.'"';
                        $cmd=$connection->createCommand($sql1);
                        foreach($cmd->queryAll() as $E_Date)
                        $model->ESUB_EXPIRY_DATE=$E_Date['ExpireDate'];  
                        $sql2 = 'SELECT SUBSCRS_CAND_COUNT from subscription_master where SUBSCRS_ID="'.$var1->ttd_sub_id.'"';
                        $model->ESUB_REMAIN_COUNT=$connection->createCommand($sql2)->queryScalar();
                       if($counesub>0)
                       {
                            $ESUB_REMAIN_COUNT= intval($esub->ESUB_REMAIN_COUNT)+ intval($model->ESUB_REMAIN_COUNT);
                             $sql2="update employer_subscription set
                                 ESUB_REMAIN_COUNT=$ESUB_REMAIN_COUNT
                                 ,ESUB_EXPIRY_DATE='".$model->ESUB_EXPIRY_DATE."'
                                 ,UPDATED_DATE=$model->UPDATED_DATE
                                  where ESUB_SUBSCRS_ID=$var1->ttd_sub_id
                                  and ESUB_EMP_ID='".yii::app()->session['Emp_Id']."'";
                      
                            $connection->createCommand($sql2)->execute();
                           
                        }
                        else
                        {
                           $model->save(); 
                          
                        }
//                        if($model->save())
//                        {       
                          
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
                                $Insert_Sub="insert into employer_subscription
                                (ESUB_EMP_ID,ESUB_SUBSCRS_ID,ESUB_PURCHASE_DATE,
                                    	ESUB_EXPIRY_DATE,ESUB_UTILIZED_COUNT,ESUB_REMAIN_COUNT)values
                                        (".$Ref_Emp_Id.",19,".NEW CDbExpression('NOW()').",'".$Expiry_Date."','',".$R_Count.")";
                               $connection->createCommand($Insert_Sub)->execute();
                               }
                               }
                               
                           //} 
                     TempTransDetail::model()->deleteAllByAttributes(array('ttd_session_id'=>Yii::app()->session->sessionID));

                }
            //}
		$this->redirect('paypal_con');
	}
	

            	public function actionpaypal_con()
	{
              $this->render('paypal_con',array('action'=>'success'));      
                }
        
        	public function actionCreate1()
	{
		$model=new CardDetails;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CardDetails']))
		{
                    $host = "localhost"; //database location
$user = "root"; //database username
$pass = ""; //database password
$db_name = "i-me"; //database name
$paypal_email = 'thangapandi.k@tecneto.com';
$return_url = 'http://example.com/payment-successful.htm';
$cancel_url = 'http://example.com/payment-cancelled.htm';
$notify_url = 'http://example.com/paypal/payments.php';

$item_name = 'Test Item';
$item_amount = 5.00;

// Include Functions
include("functions.php");

//Database Connection
$link = mysql_connect($host, $user, $pass);
mysql_select_db($db_name);
$querystring='';
// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){

	// Firstly Append paypal account to querystring
	$querystring .= "?business=".urlencode($paypal_email)."&";	
	
	// Append amount& currency (Â£) to quersytring so it cannot be edited in html
	
	//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";
	
	//loop for posted values and append to querystring
   
//	foreach($_POST as $key => $value){
//		$value = urlencode(stripslashes($value));
//		$querystring .= "$key=$value&";
//	}
	
	// Append paypal return addresses
	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "notify_url=".urlencode($notify_url);
	
	// Append querystring with custom field
	//$querystring .= "&custom=".USERID;
	
	// Redirect to paypal IPN
	header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
	exit();

}else{
	
	// Response from Paypal

	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
		$req .= "&$key=$value";
	}
	
	// assign posted variables to local variables
	$data['item_name']			= $_POST['item_name'];
	$data['item_number'] 		= $_POST['item_number'];
	$data['payment_status'] 	= $_POST['payment_status'];
	$data['payment_amount'] 	= $_POST['mc_gross'];
	$data['payment_currency']	= $_POST['mc_currency'];
	$data['txn_id']				= $_POST['txn_id'];
	$data['receiver_email'] 	= $_POST['receiver_email'];
	$data['payer_email'] 		= $_POST['payer_email'];
	$data['custom'] 			= $_POST['custom'];
		
	// post back to PayPal system to validate
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	
	$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);	
	
	if (!$fp) {
		// HTTP ERROR
	} else {	

		fputs ($fp, $header . $req);
		while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp($res, "VERIFIED") == 0) {
			
				// Used for debugging
				//@mail("you@youremail.com", "PAYPAL DEBUGGING", "Verified Response<br />data = <pre>".print_r($post, true)."</pre>");
						
				// Validate payment (Check unique txnid & correct price)
				$valid_txnid = check_txnid($data['txn_id']);
				$valid_price = check_price($data['payment_amount'], $data['item_number']);
				// PAYMENT VALIDATED & VERIFIED!
				if($valid_txnid && $valid_price){				
					$orderid = updatePayments($data);		
					if($orderid){					
						// Payment has been made & successfully inserted into the Database								
					}else{								
						// Error inserting into DB
						// E-mail admin or alert user
					}
				}else{					
					// Payment made but data has been changed
					// E-mail admin or alert user
				}						
			
			}else if (strcmp ($res, "INVALID") == 0) {
			
				// PAYMENT INVALID & INVESTIGATE MANUALY! 
				// E-mail admin or alert user
				
				// Used for debugging
				//@mail("you@youremail.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
			}		
		}		
	fclose ($fp);
	}
}
                }

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
             public function actionCountryDropDown()
        {  
           $Country=$_POST['CardDetails']['cd_country'];
           //$Country_Name=CountryMaster::model()->findByAttributes(array('COUNTRY_ID'=>$Country));
           $State=StateMaster::model()->findAllByAttributes(array('STATE_COUNTRY_ID'=>$Country));
            $list=CHtml::listData($State,'STATE_ID','STATE_NAME');
             //echo CHtml::tag('option',  array('Value'=>0),'- - - - Select State - - - -',true);
            foreach($list as $value=>$State_Name)
                {   
                
                    echo CHtml::tag('option',array('value'=>$value),CHtml::encode($State_Name),true);
                }
            }
            
         public function actionorder1()
	{
                $model=new SubscriptionMaster();   
              
		$this->render('order',array(
			'model'=>$model,
		));          
        }
            	public function actionCreate()
	{
		$model=new CardDetails;
             
                if(isset($_POST['CardDetails']))
		{
                    $model->attributes=$_POST['CardDetails'];
                   //$transmodel->attributes=$_POST['CardDetails'];
                    if($model->save())
                    {
                        $transmodel=new TransactionDetails;
                        $transmodel->td_emp_id=$model->getPrimaryKey();
                        $transmodel->td_session_id= Yii::app()->session->sessionID;
                        
                        $transmodel->td_status='Pending';
                        $transmodel->td_amount='250';
                        $transmodel->save();
                        $paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
                        //header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
                      $this->redirect(array('payment','id'=>$transmodel->td_cd_id,'session_id'=>$transmodel->td_session_id));
                    }
                  
                }
                	$this->render('create',array(
			'model'=>$model,
		));
        }
             	public function actionpayment($id,$session_id)
	{       
                  //  $carddetails=CardDetails::model()->findAllByAttributes(array('cd_id'=>$id));
                
                    	$this->render('paypal_con',array(
			'session_id'=>$session_id,'action'=>'payment'
		));
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