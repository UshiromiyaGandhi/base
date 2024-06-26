<?php

use common\models\Product;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var common\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">

	<div class="flex justify-start gap-4.5">
		<?= Html::a('Create Product', ['create'], ['class' => 'flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90']) ?>
	</div>

	<br>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
//		'filterModel' => $searchModel,
		'summary' => '',
		'columns' => [
			[
				'attribute' => 'name',
				'headerOptions' => ['class' => 'min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11'],
				'contentOptions' => ['class' => 'border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11']
			],
			[
				'headerOptions' => ['class' => 'min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11'],
				'attribute' => 'description',
				'contentOptions' => ['class' => 'border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11']
			],
			[
				'headerOptions' => ['class' => 'min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11'],
				'attribute' => 'active',
				'contentOptions' => ['class' => 'border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11'],
				'content' => function (Product $model) {
					if ($model->active) {
						return '
					<p
						class="inline-flex rounded-full bg-success bg-opacity-10 px-3 py-1 text-sm font-medium text-success"
					>
						Active
					</p>
			';
					} else {
						return '
					<p
						class="inline-flex rounded-full bg-danger bg-opacity-10 px-3 py-1 text-sm font-medium text-danger"
					>
						Inactive
					</p>
						';
					}
				}
			],
			[
				'class' => ActionColumn::className(),
				'contentOptions' => ['class' => 'border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11'],
				'headerOptions' => ['class' => 'min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11'],
				'urlCreator' => function ($action, Product $model, $key, $index, $column) {
					return Url::toRoute([$action, 'id' => $model->id]);
				},
				'buttons' => [
					'toggle-active' =>
						function ($url, Product $model, $index) {
							$title = Yii::t('yii', !$model->active ? 'Activate' : 'Deactivate');
							return Html::a(
								!$model->active ?
									'<svg
	fill="#1C2033"
	width="18"
	height="18"
	version="1.1"
	id="lni_lni-checkmark"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:xlink="http://www.w3.org/1999/xlink"
	x="0px"
	y="0px"
	viewBox="0 0 64 64"
	style="enable-background:new 0 0 18 18;"
	xml:space="preserve">
<path
	d="M60.6,13.4c-0.9-0.9-2.3-0.9-3.2,0l-34,33L6.6,29.9c-0.9-0.9-2.3-0.8-3.2,0c-0.9,0.9-0.8,2.3,0,3.2l17.7,17.2
	c0.6,0.6,1.4,0.9,2.3,0.9s1.6-0.3,2.3-0.9l34.9-33.9C61.5,15.7,61.5,14.3,60.6,13.4z"/>
</svg>' : '<svg
	fill="#1C2033"
	width="18"
	height="18"
	version="1.1"
	id="lni_lni-close"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:xlink="http://www.w3.org/1999/xlink"
	x="0px"
	y="0px"
	viewBox="0 0 64 64"
	style="enable-background:new 0 0 18 18;"
	xml:space="preserve">
<path
	d="M35.2,32L59.6,7.6c0.9-0.9,0.9-2.3,0-3.2c-0.9-0.9-2.3-0.9-3.2,0L32,28.8L7.6,4.4c-0.9-0.9-2.3-0.9-3.2,0
	c-0.9,0.9-0.9,2.3,0,3.2L28.8,32L4.4,56.4c-0.9,0.9-0.9,2.3,0,3.2c0.4,0.4,1,0.7,1.6,0.7c0.6,0,1.2-0.2,1.6-0.7L32,35.2l24.4,24.4
	c0.4,0.4,1,0.7,1.6,0.7c0.6,0,1.2-0.2,1.6-0.7c0.9-0.9,0.9-2.3,0-3.2L35.2,32z"/>
</svg>'
								, $url, [
									'title' => $title,
									'aria-label' => $title,
									'data-pjax' => '0',
								]
							);
						},
					'view' => function ($url) {
						$title = Yii::t('yii', 'View');
						return Html::a('<svg
	class="fill-current"
	width="18"
	height="18"
	viewBox="0 0 18 18"
	fill="none"
	xmlns="http://www.w3.org/2000/svg"
>
	<path
		d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
		fill=""
	/>
	<path
		d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
		fill=""
	/>
</svg>',
							$url, [
								'title' => $title,
								'aria-label' => $title,
								'data-pjax' => '0',
							]);
					},
					'delete' => function ($url) {
						$title = Yii::t('yii', 'Delete');
						return Html::a('<?xml version="1.0" encoding="utf-8"?>
<svg
	class="fill-current"
	width="18"
	height="18"
	viewBox="0 0 18 18"
	fill="none"
	xmlns="http://www.w3.org/2000/svg"
>
	<path
		d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
		fill=""
	/>
	<path
		d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
		fill=""
	/>
	<path
		d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
		fill=""
	/>
	<path
		d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
		fill=""
	/>
</svg>
', $url, [
							'title' => $title,
							'aria-label' => $title,
							'data-pjax' => '0',
						]);
					},
				],
				'template' => '<div class="flex items-center space-x-4">
	{view} {toggle-active} {delete}
</div>',
				'header' => 'Actions'
			],
		],
		'headerRowOptions' => ['class' => 'bg-gray-2 text-left dark:bg-meta-4'],
		'tableOptions' => ['class' => 'w-full table-auto'],
	]); ?>
</div>

