<?php

return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
	'controllerMap' => [
		'migrate' => [
			'class' => yii\console\controllers\MigrateController::class,
			'templateFile' => '@jamband/schemadump/template.php',
		],
		'schemadump' => [
			'class' => jamband\schemadump\SchemaDumpController::class,
			'db' => [
				'class' => yii\db\Connection::class,
				'dsn' => 'mysql:host=localhost;dbname=base4',
				'username' => 'root',
				'password' => '',
			],
		],
	],
];
