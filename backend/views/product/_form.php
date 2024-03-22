<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

	<?php $form = ActiveForm::begin(); ?>


	<div class="mb-5.5">
		<div>
			<label
				class="mb-3 block text-sm font-medium text-black dark:text-white"
			>
				Product Seller
			</label>
			<div class='relative'>
				<span class='absolute left-4.5 top-4'>
					<svg
						class='fill-current'
						width='20'
						height='20'
						viewBox='0 0 20 20'
						fill='none'
						xmlns='http://www.w3.org/2000/svg'
					>
						<g opacity='0.8'>
							<path
								fill-rule='evenodd'
								clip-rule='evenodd'
								d='M3.72039 12.887C4.50179 12.1056 5.5616 11.6666 6.66667 11.6666H13.3333C14.4384 11.6666 15.4982 12.1056 16.2796 12.887C17.061 13.6684 17.5 14.7282 17.5 15.8333V17.5C17.5 17.9602 17.1269 18.3333 16.6667 18.3333C16.2064 18.3333 15.8333 17.9602 15.8333 17.5V15.8333C15.8333 15.1703 15.5699 14.5344 15.1011 14.0655C14.6323 13.5967 13.9964 13.3333 13.3333 13.3333H6.66667C6.00363 13.3333 5.36774 13.5967 4.8989 14.0655C4.43006 14.5344 4.16667 15.1703 4.16667 15.8333V17.5C4.16667 17.9602 3.79357 18.3333 3.33333 18.3333C2.8731 18.3333 2.5 17.9602 2.5 17.5V15.8333C2.5 14.7282 2.93899 13.6684 3.72039 12.887Z'
								fill=''
							/>
							<path
								fill-rule='evenodd'
								clip-rule='evenodd'
								d='M9.99967 3.33329C8.61896 3.33329 7.49967 4.45258 7.49967 5.83329C7.49967 7.214 8.61896 8.33329 9.99967 8.33329C11.3804 8.33329 12.4997 7.214 12.4997 5.83329C12.4997 4.45258 11.3804 3.33329 9.99967 3.33329ZM5.83301 5.83329C5.83301 3.53211 7.69849 1.66663 9.99967 1.66663C12.3009 1.66663 14.1663 3.53211 14.1663 5.83329C14.1663 8.13448 12.3009 9.99996 9.99967 9.99996C7.69849 9.99996 5.83301 8.13448 5.83301 5.83329Z'
								fill=''
							/>
						</g>
					</svg>
				</span>
				<input
					type="text"
					placeholder="<?= $model->shop->name ?>"
					disabled=""
					class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 pl-11.5 pr-4.5 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary dark:disabled:bg-black"
				/>
			</div>

		</div>
	</div>
	<div class="mb-5.5">
		<?= $form->field($model, 'name', [
			'labelOptions' => [
				'class' => 'mb-3 block text-sm font-medium text-black dark:text-white'
			],
			'inputOptions' => [
				'class' => 'w-full rounded border-[1.5px] border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary'
			],
			'template' => "{label} <div class='relative'>
	<span class='absolute left-4.5 top-4'>
		
		<?xml version='1.0' encoding='utf-8'?>
		<!-- Generator: Adobe Illustrator 22.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
		<svg
			class='fill-current'
			width='20'
			height='20'
			xmlns='http://www.w3.org/2000/svg'
			viewBox='0 0 64 64'
			xml:space='preserve'>
			<g>
				<path
					d='M37.1,47.8c-4,0-7.2,3.2-7.2,7.2c0,4,3.2,7.2,7.2,7.2c4,0,7.2-3.2,7.2-7.2C44.3,51.1,41,47.8,37.1,47.8z M37.1,57.8
		c-1.5,0-2.7-1.2-2.7-2.7c0-1.5,1.2-2.7,2.7-2.7c1.5,0,2.7,1.2,2.7,2.7C39.8,56.5,38.5,57.8,37.1,57.8z'/>
				<path
					d='M18.1,47.8c-4,0-7.2,3.2-7.2,7.2c0,4,3.2,7.2,7.2,7.2s7.2-3.2,7.2-7.2C25.3,51.1,22,47.8,18.1,47.8z M18.1,57.8
		c-1.5,0-2.7-1.2-2.7-2.7c0-1.5,1.2-2.7,2.7-2.7c1.5,0,2.7,1.2,2.7,2.7C20.8,56.5,19.6,57.8,18.1,57.8z'/>
				<path
					d='M58.2,1.8h-5.4c-2.4,0-4.5,1.8-4.8,4.2l-1.6,11.5H6.9c-1,0-2,0.5-2.7,1.3c-0.6,0.8-0.9,1.9-0.6,2.9c0,0.1,0,0.1,0,0.2
		l6.2,18.7c0.4,1.4,1.7,2.4,3.2,2.4h27.6c3.7,0,6.9-2.8,7.4-6.5l4.2-29.9c0-0.2,0.2-0.3,0.4-0.3h5.4c1.2,0,2.3-1,2.3-2.3
		S59.4,1.8,58.2,1.8z M43.7,35.8c-0.2,1.5-1.5,2.6-3,2.6H13.9L8.5,22h37.2L43.7,35.8z'/>
			</g>
		</svg>
	</span>
	{input}
</div> {hint} {error}"
		])->textInput(['maxlength' => true])->label('Product Name') ?>
	</div>
	<div class="mb-5.5">
		<?= $form->field($model, 'description', ['labelOptions' => [
			'class' => 'mb-3 block text-sm font-medium text-black dark:text-white'
		], 'inputOptions' => [
			'class' => 'w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary'
		], 'template' => "{label} <div class='relative'>
	<span class='absolute left-4.5 top-4'>
		<svg
			class='fill-current'
			width='20'
			height='20'
			viewBox='0 0 20 20'
			fill='none'
			xmlns='http://www.w3.org/2000/svg'
		>
			<g
				opacity='0.8'
				clip-path='url(#clip0_88_10224)'
			>
				<path
					fill-rule='evenodd'
					clip-rule='evenodd'
					d='M1.56524 3.23223C2.03408 2.76339 2.66997 2.5 3.33301 2.5H9.16634C9.62658 2.5 9.99967 2.8731 9.99967 3.33333C9.99967 3.79357 9.62658 4.16667 9.16634 4.16667H3.33301C3.11199 4.16667 2.90003 4.25446 2.74375 4.41074C2.58747 4.56702 2.49967 4.77899 2.49967 5V16.6667C2.49967 16.8877 2.58747 17.0996 2.74375 17.2559C2.90003 17.4122 3.11199 17.5 3.33301 17.5H14.9997C15.2207 17.5 15.4326 17.4122 15.5889 17.2559C15.7452 17.0996 15.833 16.8877 15.833 16.6667V10.8333C15.833 10.3731 16.2061 10 16.6663 10C17.1266 10 17.4997 10.3731 17.4997 10.8333V16.6667C17.4997 17.3297 17.2363 17.9656 16.7674 18.4344C16.2986 18.9033 15.6627 19.1667 14.9997 19.1667H3.33301C2.66997 19.1667 2.03408 18.9033 1.56524 18.4344C1.0964 17.9656 0.833008 17.3297 0.833008 16.6667V5C0.833008 4.33696 1.0964 3.70107 1.56524 3.23223Z'
					fill=''
				/>
				<path
					fill-rule='evenodd'
					clip-rule='evenodd'
					d='M16.6664 2.39884C16.4185 2.39884 16.1809 2.49729 16.0056 2.67253L8.25216 10.426L7.81167 12.188L9.57365 11.7475L17.3271 3.99402C17.5023 3.81878 17.6008 3.5811 17.6008 3.33328C17.6008 3.08545 17.5023 2.84777 17.3271 2.67253C17.1519 2.49729 16.9142 2.39884 16.6664 2.39884ZM14.8271 1.49402C15.3149 1.00622 15.9765 0.732178 16.6664 0.732178C17.3562 0.732178 18.0178 1.00622 18.5056 1.49402C18.9934 1.98182 19.2675 2.64342 19.2675 3.33328C19.2675 4.02313 18.9934 4.68473 18.5056 5.17253L10.5889 13.0892C10.4821 13.196 10.3483 13.2718 10.2018 13.3084L6.86847 14.1417C6.58449 14.2127 6.28409 14.1295 6.0771 13.9225C5.87012 13.7156 5.78691 13.4151 5.85791 13.1312L6.69124 9.79783C6.72787 9.65131 6.80364 9.51749 6.91044 9.41069L14.8271 1.49402Z'
					fill=''
				/>
			</g>
			<defs>
				<clipPath id='clip0_88_10224'>
					<rect
						width='20'
						height='20'
						fill='white'/>
				</clipPath>
			</defs>
		</svg>
	</span>
	{input}
</div> {hint} {error}"
		])->textarea(['maxlength' => true])->label("Product Description") ?>
	</div>
	<div class="mb-5.5">
		<div x-data="{ switcherToggle: <?= $model->active ? "true" : "false" ?> }">
			<label
				class="mb-3 block text-sm font-medium text-black dark:text-white"
			>
				Active
			</label>
			<label
				for="toggle4"
				class="flex cursor-pointer select-none items-center"
			>
				<div class="relative">
					<input
						type="checkbox"
						id="toggle4"
						class="sr-only"
						name="Product[active]"
						value="<?= $model->active ? "0" : "1" ?>"
						@change="switcherToggle = !switcherToggle"
					/>
					<div
						:class="switcherToggle && '!bg-primary'"
						class="block h-8 w-14 rounded-full bg-black"
					></div>
					<div
						:class="switcherToggle && '!right-1 !translate-x-full'"
						class="absolute left-1 top-1 flex h-6 w-6 items-center justify-center rounded-full bg-white transition"
					></div>
				</div>
			</label>
		</div>
	</div>
	<div class="flex justify-end gap-4.5">
		<?php if ($model->id): ?>
			<?= Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'flex justify-center rounded bg-danger px-6 py-2 font-medium text-gray hover:bg-opacity-90']) ?>
		<?php endif ?>
		<button
			class="flex justify-center rounded border border-stroke px-6 py-2 font-medium text-black hover:shadow-1 dark:border-strokedark dark:text-white"
			type="submit"
		>
			Cancel
		</button>
		<?= Html::submitButton('Save', ['class' => 'flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90']) ?>
	</div>
	<?php ActiveForm::end(); ?>

</div>
