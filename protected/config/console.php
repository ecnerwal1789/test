<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'II-Me',
	// preloading 'log' component
	'preload'=>array('log','bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.controllers.*',
                'application.extensions.*',
                'application.vendors.*',
	),
//        'commandMap' => array(
//                'cron' => 'ext.PHPDocCrontab.PHPDocCrontab'
//            ),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'tecneto',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			 //'ipFilters'=>array('127.0.0.1','192.168.1.*','::1'),
                    'ipFilters'=>false,
		
                    
                    'generatorPaths' => array(
          'bootstrap.gii'
       ),
                    ),
		
	),

	// application components
	'components'=>array(
            
//   'widgetFactory' => array(
//            'widgets' => array(
//               'CJuiDatePicker' => array(
//                  
//                    'cssFile' =>Yii::app()->request->baseUrl.'/css/grid_view_style.css',
//                ),
//            ),
//        ),
//      
          
       
            
             'excel'=>array(
                  'class'=>'application.extensions.PHPExcel.PHPExcel',
                ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
      
	

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
		'urlFormat'=>'path',
                'showScriptName'=>false,
		'rules'=>array(
                            
                            'Employer'=>'EmployerMaster/create',
                            'activate'=>'EmployerMaster/active',
                            'EmpLogin'=>'site/EmpLogin',
                            'takeurtest'=>'CandidateMaster/index',
                            
			),
		),
		 /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
	
	'db'=>array(
			'connectionString' => 'mysql:host=tecneto-d2;dbname=i-me',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
	
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
            'bootstrap' => array(
	    'class' => 'application.extensions.bootstrap.components.Bootstrap',
	    'responsiveCss' => true,
	),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'thangapandi.k@gmail.com',  
                'RegEmail'=>'lawrence@tecneto.com',
                'RegName'=>'II-ME Team',
                
	),
);