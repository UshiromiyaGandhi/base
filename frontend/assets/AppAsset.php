<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		['https://base-tailwind.preview.uideck.com/style.css']
	];
	public $js = [
//		['https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js', ['position' => View::POS_END, 'defer' => true, 'async' => true]],
//		['https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', ['position' => View::POS_END, 'defer' => true, 'async' => true]],
		['https://base-tailwind.preview.uideck.com/bundle.js' ,['position' => View::POS_END, 'async'=>true, 'defer'=>true]]
	];
	public $depends = [
		'yii\web\YiiAsset',
//		'yii\bootstrap5\BootstrapAsset',
	];
}
