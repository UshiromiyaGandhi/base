<?php

return [
	'bootstrap' => ['gii'],
	'modules' => [
		'gii' => 'yii\gii\Module',
	],
	'controllerMap' => [
		'migration' => [
			'class' => 'bizley\migration\controllers\MigrationController',
//			'migrationPath' => '@app/migrations', // Directory storing the migration classes
//			'migrationNamespace' => null, // Full migration namespace
//			'useTablePrefix' => true, // Whether the table names generated should consider the $tablePrefix setting of the DB connection
//			'onlyShow' => false, // Whether to only display changes instead of generating update migration
//			'fixHistory' => false, // Whether to add generated migration to migration history
//			'skipMigrations' => [], // List of migrations from the history table that should be skipped during the update process
//			'excludeTables' => [], // List of database tables that should be skipped for actions with "*"
//			'fileMode' => null, // Permission to be set for newly generated migration files
//			'fileOwnership' => null, // User and/or group ownership to be set for newly generated migration files
//			'leeway' => 0, // Leeway in seconds to apply to a starting timestamp when generating migration
		],
	],
];
