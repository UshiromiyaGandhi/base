<?php
return [
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
	],
	'modules' => [
		'admin' => [
			'class' => 'mdm\admin\Module',
		]
	],
	'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'components' => [
		'cache' => [
			'class' => \yii\caching\FileCache::class,
		],
		'authManager' => [
			'class' => 'yii\rbac\DbManager'
		],
		'user' => [
//			'class' => 'mdm\admin\models\User',
			'identityClass' => 'mdm\admin\models\User',
			'loginUrl' => ['admin/user/login'],
		]
	],
];
