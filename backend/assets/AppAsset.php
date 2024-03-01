<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
	public $depends = [
//		'yii\web\YiiAsset',
//		'yii\bootstrap5\BootstrapAsset',
	];
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'css/tw.css',
		'template1font.css',
	];
	public $js = [
		'js/index.js',
		'js/us-aea-en.js',
		'js/components/chart-01.js',
		'js/components/chart-02.js',
		'js/components/chart-03.js',
		'js/components/chart-04.js',
		'js/components/map-01.js',
		['https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', ['position' => View::POS_END, 'defer' => true, 'async' => true]]
	];
}
