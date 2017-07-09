<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Managemen Project',
	'theme'=>'classic',

	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.EExcelWriter.*', 
		),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			'ipFilters'=>array('127.0.0.1','::1'),
			),
		
		),

	'components'=>array(
		'user'=>array(
			'allowAutoLogin'=>true,
			),

		'authManager'=>array(
			'class'=>'RDbAuthManager',
			),

		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

	'db'=>array(
		'connectionString' => 'mysql:host=127.0.0.1;dbname=u0282705_menpro',
		'emulatePrepare' => true,
		'username' => 'u0282705_menpro',
		'password' => '3rA%g]};q#m*',
		'charset' => 'utf8',
		),

// 		'db'=>array(
// 			'connectionString' => 'mysql:host=127.0.0.1;dbname=db_aplikasi_menpro',
// 			'emulatePrepare' => true,
// 			'username' => 'root',
// 			'password' => '',
// 			'charset' => 'utf8',
// 			),		

		'errorHandler'=>array(
			'errorAction'=>'site/error',
			),
		
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
					),
				),
			),
		),

	// 'language'=>'id',
	// 'sourceLanguage'=>'id',
	'timeZone'=>'Asia/Jakarta',

	'params'=>array(
		'adminEmail'=>'infomugi@gmail.com',
		),
	);