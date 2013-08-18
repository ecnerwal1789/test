<?php

class SubscriptionMasterController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column4';

	/**
	 * @return array action filters
	 */
	/*public function filters()
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
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
		$SubscriptionMaster=new SubscriptionMaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                        
		if(isset($_POST['SubscriptionMaster']))
		{
			$SubscriptionMaster->attributes=$_POST['SubscriptionMaster']; 
                        $SubscriptionMaster->SUBSCR_CODE=$_POST['SubscriptionMaster']['SUBSCR_CHAR'].$SubscriptionMaster->SUBSCR_CODE;
                        $SubscriptionMaster->CREATED_USER= Yii::app()->user->name;
                        $SubscriptionMaster->UPDATED_USER= Yii::app()->user->name;
                        $SubscriptionMaster->UPDATED_DATE=new CDbExpression('NOW()');                        
                        $SubscriptionMaster->SUBSCRS_VIDEO_Y_N=$_POST['SubscriptionMaster']['SUBSCRS_VIDEO_Y_N'];
                        
                        if($SubscriptionMaster->save())
			$this->redirect(array('create','id'=>$SubscriptionMaster->SUBSCRS_ID));
		} 
                $criteria = new CDbCriteria();
		$criteria->mergeWith(array(
     			'select'=>"MAX(CAST(SUBSTR(SUBSCR_CODE,'7','9')AS UNSIGNED)) as SUBSCR_CODE ,MAX(CAST(SUBSTR(SUBSCR_CODE,'1','6')AS CHAR)) as SUBSCR_CHAR")); 
		$SubscriptionMastervalue=SubscriptionMaster::model()->find($criteria);
                $SUBSCR_CODE=$SubscriptionMastervalue->SUBSCR_CODE;
		$SUBSCR_CHAR=$SubscriptionMastervalue->SUBSCR_CHAR;                
                $SUBSCR=$SUBSCR_CODE + 1 ;                
                if(($SUBSCR_CHAR=='')&&($SUBSCR_CODE==''))
                {
                $SUBSCR_CHAR='SUBSCR';
                $SUBSCR_CODE=1;
                }
                
		if($SUBSCR_CODE <=9)
		{ 
                    $SUBSCR_CODE="00".$SUBSCR;
		}
                elseif(($SUBSCR_CODE >=9)&&($SUBSCR_CODE<99))
                { 
                    $SUBSCR_CODE="0".$SUBSCR;
                }
		elseif($SUBSCR_CODE>=99)
		{
                    $SUBSCR_CODE=$SUBSCR;
		}                               
		$this->render('create',array(
			'model'=>$SubscriptionMaster,'SUBSCR_CODE'=>$SUBSCR_CODE,'SUBSCR_CHAR'=>$SUBSCR_CHAR
		));
                                
		//$this->render('create',array('model'=>$SubscriptionMaster,));
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

		if(isset($_POST['SubscriptionMaster']))
		{
			$model->attributes=$_POST['SubscriptionMaster'];
                        $model->UPDATED_USER= Yii::app()->user->name;
                        $model->UPDATED_DATE=new CDbExpression('NOW()');
                        $model->SUBSCRS_VIDEO_Y_N=$_POST['SubscriptionMaster']['SUBSCRS_VIDEO_Y_N'];
                        
                        if($model->save())
				$this->redirect(array('admin','id'=>$model->SUBSCRS_ID));
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
		$dataProvider=new CActiveDataProvider('SubscriptionMaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SubscriptionMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SubscriptionMaster']))
			$model->attributes=$_GET['SubscriptionMaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SubscriptionMaster the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SubscriptionMaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SubscriptionMaster $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='subscription-master-form')
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
         
                $model_camp=new SubscriptionMaster;
                           
                foreach ($del_camps as $_camp_id)
                {
                    try
                    {
                        $model_camp->deleteByPk($_camp_id);
                    }
                     catch (CDbException $e)
                    {
                     
                     echo $messages[] = $e->errorInfo[2];
                       
                }
                }                         
              
        }
                 
}  
}
