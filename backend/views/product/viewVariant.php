<?php

use common\models\Product;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ProductVariant $model */
/** @var common\models\Product $modelParent */
/** @var common\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title =  $model->name .' Variant';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelParent->name, 'url' => ["view", 'id' => $modelParent->id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="grid grid-cols-5 gap-8">
	<div class="col-span-5 xl:col-span-3">
		<div
			class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
		>
			<?= $this->render('_formVariant', [
				'model' => $model,
			]) ?>

		</div>
	</div>
	<div class="col-span-5 xl:col-span-2">
		<div
			class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
		>
			<div
				class="border-b border-stroke px-7 py-4 dark:border-strokedark"
			>
				<h3 class="font-medium text-black dark:text-white">
					Variant Photo
				</h3>

			</div>
			<div class="p-7">
				<div class="mb-4 flex items-center gap-3">
					<?= Html::img('uploads/productVariantPhoto/' . $model->image, [
						'class' => 'object-contain h-40 w-full '
					])?>
				</div>

				<?php $form2 = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
				<?= $form2->field($model, 'image', [
					'inputOptions' => [
						'class' => 'absolute inset-0 z-50 m-0 h-full w-full cursor-pointer p-0 opacity-0 outline-none',
						'accept' => 'image/*'
					],
					'template' => '
<div
	id="FileUpload"
	class="relative mb-5.5 block w-full cursor-pointer appearance-none rounded border border-dashed border-primary bg-gray px-4 py-4 dark:bg-meta-4 sm:py-7.5"
>
	{input}
	<div
		class="flex flex-col items-center justify-center space-y-3"
	>
		<span
			class="flex h-10 w-10 items-center justify-center rounded-full border border-stroke bg-white dark:border-strokedark dark:bg-boxdark"
		>
			<svg
				width="16"
				height="16"
				viewBox="0 0 16 16"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					fill-rule="evenodd"
					clip-rule="evenodd"
					d="M1.99967 9.33337C2.36786 9.33337 2.66634 9.63185 2.66634 10V12.6667C2.66634 12.8435 2.73658 13.0131 2.8616 13.1381C2.98663 13.2631 3.1562 13.3334 3.33301 13.3334H12.6663C12.8431 13.3334 13.0127 13.2631 13.1377 13.1381C13.2628 13.0131 13.333 12.8435 13.333 12.6667V10C13.333 9.63185 13.6315 9.33337 13.9997 9.33337C14.3679 9.33337 14.6663 9.63185 14.6663 10V12.6667C14.6663 13.1971 14.4556 13.7058 14.0806 14.0809C13.7055 14.456 13.1968 14.6667 12.6663 14.6667H3.33301C2.80257 14.6667 2.29387 14.456 1.91879 14.0809C1.54372 13.7058 1.33301 13.1971 1.33301 12.6667V10C1.33301 9.63185 1.63148 9.33337 1.99967 9.33337Z"
					fill="#3C50E0"
				/>
				<path
					fill-rule="evenodd"
					clip-rule="evenodd"
					d="M7.5286 1.52864C7.78894 1.26829 8.21106 1.26829 8.4714 1.52864L11.8047 4.86197C12.0651 5.12232 12.0651 5.54443 11.8047 5.80478C11.5444 6.06513 11.1223 6.06513 10.8619 5.80478L8 2.94285L5.13807 5.80478C4.87772 6.06513 4.45561 6.06513 4.19526 5.80478C3.93491 5.54443 3.93491 5.12232 4.19526 4.86197L7.5286 1.52864Z"
					fill="#3C50E0"
				/>
				<path
					fill-rule="evenodd"
					clip-rule="evenodd"
					d="M7.99967 1.33337C8.36786 1.33337 8.66634 1.63185 8.66634 2.00004V10C8.66634 10.3682 8.36786 10.6667 7.99967 10.6667C7.63148 10.6667 7.33301 10.3682 7.33301 10V2.00004C7.33301 1.63185 7.63148 1.33337 7.99967 1.33337Z"
					fill="#3C50E0"
				/>
			</svg>
		</span>
		<p class="text-sm font-medium">
			<span class="text-primary">Click to upload</span>
			or drag and drop
		</p>
		<p class="mt-1.5 text-sm font-medium">
			SVG, PNG, JPG or GIF
		</p>
		<p class="text-sm font-medium">
			(max, 800 X 800px)
		</p>
	</div>
</div>
'
				])->fileInput() ?>

				<div class="flex justify-end gap-4.5">
					<?= Html::a('Delete Image', ['delete-variant-image', 'variantId' => $model->id], ['class' => 'flex justify-center rounded bg-danger px-6 py-2 font-medium text-gray hover:bg-opacity-90']) ?>
					<?= Html::submitButton('Save Image', ['class' => 'flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90']) ?>
				</div>
				<?php ActiveForm::end(); ?>

			</div>
		</div>
	</div>
</div>
