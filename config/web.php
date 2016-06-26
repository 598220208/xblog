<?php
$params = require (__DIR__ . '/params.php');

$config = [ 
		'id' => 'basic',
		'language' => 'zh-CN',
		'basePath' => dirname ( __DIR__ ),
		'bootstrap' => [ 
				'log' 
		],
		'name'=>'XBlog',
		'defaultRoute' => 'post/index',
	 	'as access' => [ 
				'class' => 'mdm\admin\components\AccessControl',
				'allowActions' => [   
						'post/*',
						'admin/site/*',
				] // 允许所有人访问admin节点及其子节点
		], 
		'modules' => [ 
				'admin' => [ 
						'class' => 'app\modules\admin\Module',
						'defaultRoute' => 'site/index',
						'modules' => [ 
								'permission' => [ 
										'class' => 'mdm\admin\Module',
										//'layout' =>'left-menu',
								] 
								,
								'aliases' => [ 
										'@mdm/permission' => '@vendor/mdmsoft/yii2-admin' 
								] 
						],
						/* 'as access' => [
								'class' => 'mdm\admin\components\AccessControl',
								'allowActions' => [
										//'post/*',
										//'admin/site/*',
								] // 允许所有人访问admin节点及其子节点
						], */
				]
				 
		]
		,
		'components' => [ 
				'request' => [
						// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
						'cookieValidationKey' => 'WUQeqT9ujBqh7IJ-v6YGP2Uvt9OOQXq8' 
				],
				'cache' => [ 
						'class' => 'yii\caching\FileCache' 
				],
				'user' => [ 
						'identityClass' => 'app\modules\admin\models\User',
						'enableAutoLogin' => true 
				],
				'errorHandler' => [ 
						'errorAction' => 'admin/site/error' 
				],
				'mailer' => [ 
						'class' => 'yii\swiftmailer\Mailer',
						// send all mails to a file by default. You have to set
						// 'useFileTransport' to false and configure a transport
						// for the mailer to send real emails.
						'useFileTransport' => true 
				],
				'log' => [ 
						'traceLevel' => YII_DEBUG ? 3 : 0,
						'targets' => [ 
								[ 
										'class' => 'yii\log\FileTarget',
										'levels' => [ 
												'error',
												'warning' 
										] 
								] 
						] 
				],
				'db' => require (__DIR__ . '/db.php'),
				'authManager' => [ 
						'class' => 'yii\rbac\DbManager',
						'defaultRoles' => [ 
								'guest' 
						] 
				],
				'urlManager' => [ 
						'enablePrettyUrl' => true,
						'enableStrictParsing' => false,
						'showScriptName' => false,
						'suffix' => '',
						'rules' => [ 
								"<controller:\w+>/<id:\d+>" => "<controller>/view",
								"<controller:\w+>/<action:\w+>" => "<controller>/<action>" 
						] 
				] 
		],
		'params' => $params 
];

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config ['bootstrap'] [] = 'debug';
	$config ['modules'] ['debug'] = [ 
			'class' => 'yii\debug\Module' 
	];
	
	$config ['bootstrap'] [] = 'gii';
	$config ['modules'] ['gii'] = [ 
			'class' => 'yii\gii\Module' 
	];
}

return $config;
