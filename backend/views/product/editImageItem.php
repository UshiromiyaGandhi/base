<?php

use backend\models\ProductImageUploadForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var ProductImageUploadForm $formUpload */
/** @var \common\models\ProductImage $model */
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<!-- ===== Task Popup Start ===== -->
<div class="mb-5">
	<label
		for="taskImg"
		class="mb-2.5 block font-medium text-black dark:text-white">Add image</label>
	<?= $form->field($formUpload, 'imageFile', [
		'inputOptions' => [
			'class' => 'absolute cursor-pointer inset-0 z-50 m-0 h-full w-full p-0 opacity-0 outline-none',
			'accept' => 'image/*',
		],
		'template' => '<div
	id="FileUpload"
	class="relative block w-full appearance-none rounded-sm border border-dashed border-stroke bg-white px-4 py-4 dark:border-strokedark dark:bg-boxdark sm:py-14">
	{input}
	<div class="flex flex-col items-center justify-center space-y-3">
		<span class="flex h-11.5 w-11.5 items-center justify-center rounded-full border border-stroke bg-primary/5 dark:border-strokedark">
			<svg
				width="20"
				height="20"
				viewBox="0 0 20 20"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_75_12841)">
					<path
						d="M2.5 15.8333H17.5V17.5H2.5V15.8333ZM10.8333 4.85663V14.1666H9.16667V4.85663L4.1075 9.91663L2.92917 8.73829L10 1.66663L17.0708 8.73746L15.8925 9.91579L10.8333 4.85829V4.85663Z"
						fill="#3C50E0"></path>
				</g>
				<defs>
					<clipPath id="clip0_75_12841">
						<rect
							width="20"
							height="20"
							fill="white"></rect>
					</clipPath>
				</defs>
			</svg>
		</span>
		<p class="text-xs">
			<span class="text-primary">Click to upload</span> or drag and
			drop
		</p>
	</div>
</div>',
	])->fileInput() ?>

</div>

<?= Html::submitButton('<svg
	class="fill-current"
	width="20"
	height="20"
	viewBox="0 0 20 20"
	fill="none"
	xmlns="http://www.w3.org/2000/svg">
	<g clip-path="url(#clip0_60_9740)">
		<path
			d="M18.75 9.3125H10.7187V1.25C10.7187 0.875 10.4062 0.53125 10 0.53125C9.625 0.53125 9.28125 0.84375 9.28125 1.25V9.3125H1.25C0.875 9.3125 0.53125 9.625 0.53125 10.0312C0.53125 10.4062 0.84375 10.75 1.25 10.75H9.3125V18.75C9.3125 19.125 9.625 19.4687 10.0312 19.4687C10.4062 19.4687 10.75 19.1562 10.75 18.75V10.7187H18.75C19.125 10.7187 19.4687 10.4062 19.4687 10C19.4687 9.625 19.125 9.3125 18.75 9.3125Z"
			fill=""></path>
	</g>
	<defs>
		<clipPath id="clip0_60_9740">
			<rect
				width="20"
				height="20"
				fill="white"></rect>
		</clipPath>
	</defs>
</svg>
Save Image', [
	'class' => 'flex w-full items-center justify-center gap-2 rounded bg-primary px-4.5 py-2.5 font-medium text-white']) ?>
<!-- ===== Task Popup End ===== -->

<?php ActiveForm::end() ?>
