<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ProductVariant $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div
	class="border-b border-stroke px-6.5 py-4 dark:border-strokedark"
>
	<h3 class="font-medium text-black dark:text-white">
		Attributes
	</h3>
</div>
<div class="p-7">

	<?php $form = ActiveForm::begin(); ?>

	<div class="mb-4.5">
		<?= $form->field($model, 'name', [
			'labelOptions' => [
				'class' => 'mb-3 block text-sm font-medium text-black dark:text-white'
			],
			'inputOptions' => [
				'class' => 'w-full rounded border-[1.5px] border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary'
			],
			'template' => "{label}
<div class='relative'>
	<span class='absolute left-4.5 top-4'>
		<svg
			fill=\"#1C2033\"
			width=\"20\"
			height=\"20\"
			version=\"1.1\"
			id=\"lni_lni-tag\"
			xmlns=\"http://www.w3.org/2000/svg\"
			xmlns:xlink=\"http://www.w3.org/1999/xlink\"
			x=\"0px\"
			y=\"0px\"
			viewBox=\"0 0 64 64\"
			style=\"enable-background:new 0 0 64 64;\"
			xml:space=\"preserve\">
<path
	d=\"M57.4,16.3c0-2.3-1.9-4.1-4.2-4.2L44.4,12C40.2,5.6,32.7-0.7,21.3,1.1c-1.2,0.2-2.1,1.3-1.9,2.6c0.2,1.2,1.3,2.1,2.6,1.9
	c8-1.3,13.4,2.4,16.7,6.4l-6.3-0.1c0,0-0.1,0-0.1,0c-1.1,0-2.2,0.5-3,1.2L8.1,34.2c-1.2,1.2-1.8,2.7-1.8,4.4s0.6,3.2,1.8,4.4
	l18.3,18.3c1.2,1.2,2.8,1.8,4.4,1.8s3.2-0.6,4.4-1.8l21.2-21.2c0,0,0,0,0,0c0.8-0.8,1.3-1.9,1.2-3.1L57.4,16.3z M32.1,58.2
	c-0.7,0.7-1.8,0.7-2.5,0L11.3,39.9c-0.3-0.3-0.5-0.8-0.5-1.2c0-0.5,0.2-0.9,0.5-1.2l21.2-21.2l9.4,0.2c0.4,0.8,0.7,1.5,1,2.1
	c-1.7,1-2.8,2.9-2.8,5c0,3.2,2.6,5.8,5.8,5.8s5.8-2.6,5.8-5.8c0-2.7-1.8-4.9-4.3-5.6c-0.2-0.4-0.3-0.9-0.5-1.3l6,0.1l0.4,20.4
	L32.1,58.2z M45.8,22.1c0.7,0,1.3,0.6,1.3,1.3s-0.6,1.3-1.3,1.3s-1.3-0.6-1.3-1.3S45.1,22.1,45.8,22.1z\"/>
</svg>
	</span>
	{input}
</div>
{hint}
{error}
                            "
		])->textInput(['maxlength' => true])->label('Variant Name') ?>
	</div>
	<div class="mb-4.5">
		<?= $form->field($model, 'description', [
			'labelOptions' => [
				'class' => 'mb-3 block text-sm font-medium text-black dark:text-white'
			],
			'inputOptions' => [
				'class' => 'w-full rounded border border-stroke bg-gray py-3 px-5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary'
			],
		])->textarea(['maxlength' => true])->label('Variant Description') ?>
	</div>
	<div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
		<div class="w-full xl:w-1/2">

			<?= $form->field($model, 'stock', [
				'labelOptions' => [
					'class' => 'mb-3 block text-sm font-medium text-black dark:text-white'
				],
				'inputOptions' => [
					'class' => 'w-full rounded border-[1.5px] border-stroke bg-gray py-3 px-5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary'
				],
			])->textInput(['maxlength' => true])->label('Variant Stock') ?>
		</div>
		<div class="w-full xl:w-1/2">
			<?= $form->field($model, 'cost', [
				'labelOptions' => [
					'class' => 'mb-3 block text-sm font-medium text-black dark:text-white'
				],
				'inputOptions' => [
					'class' => 'w-full rounded border-[1.5px] border-stroke bg-gray py-3 px-5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary'
				],
			])->textInput(['maxlength' => true])->label('Variant Cost') ?>
		</div>
	</div>

	<div class="flex justify-start gap-4.5">
		<?php if ($model->id): ?>
			<?= Html::a('Delete Variant', ['delete', 'id' => $model->id], ['class' => 'flex justify-center rounded bg-danger px-6 py-2 font-medium text-gray hover:bg-opacity-90']) ?>
		<?php endif ?>
		<button
			class="flex justify-center rounded border border-stroke px-6 py-2 font-medium text-black hover:shadow-1 dark:border-strokedark dark:text-white"
			type="submit"
		>
			Cancel
		</button>
		<?= Html::submitButton('Save Variant', ['class' => 'flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>
