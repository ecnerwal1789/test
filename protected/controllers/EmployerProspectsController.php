<?php

class EmployerProspectsController extends Controller
{
	public function actionIndex()
	{
                $this->render('index');
	}
        
        public function actionReferFriend()
        {
        
            $EmployerProspects=new EmployerProspects;
            if(isset($_POST['EmployerProspects']['Receipents']))
            {
                
                $Receipents=$_POST['EmployerProspects']['Receipents'];
              
            }
            $this->render('ReferFriend',array('EmployerProspects'=>$EmployerProspects));
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
}