<?php
/** @var ProductImage[] $productImagesArray */
/** @var Product $model */
/** @var yii\web\View $this */

/** @var ProductImageUploadForm $uploadForm */

use backend\models\ProductImageUploadForm;
use common\models\Product;
use common\models\ProductImage;
use kartik\sortable\Sortable;
use kartik\sortinput\SortableInput;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Product Images';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['product/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

?>

<div
	x-data="{
	popupOpen: false,
	<?php foreach ($productImagesArray as $productImageArray): ?>
	<?= 'popupOpen' . $productImageArray['id'] . ': false, ' ?>
	<?php endforeach; ?>
	}"
>
	<div
		class="flex flex-col gap-y-4 rounded-sm border border-stroke bg-white p-3 shadow-default dark:border-strokedark dark:bg-boxdark sm:flex-row sm:items-center sm:justify-between"
	>

		<div>
			<!---->
			<h3 class="text-title-lg font-bold text-black dark:text-white">
				Product Image List
			</h3>
		</div>

		<?php $form = ActiveForm::begin(['id' => 'form 1']); ?>
		<div class="flex flex-col gap-4 2xsm:flex-row 2xsm:items-center">
			<!--Edit And Delete Button-->
			<div>
				<?= Html::submitButton('<svg
					class="fill-current"
					width="16"
					height="16"
					viewBox="0 0 16 16"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M15 7H9V1C9 0.4 8.6 0 8 0C7.4 0 7 0.4 7 1V7H1C0.4 7 0 7.4 0 8C0 8.6 0.4 9 1 9H7V15C7 15.6 7.4 16 8 16C8.6 16 9 15.6 9 15V9H15C15.6 9 16 8.6 16 8C16 7.4 15.6 7 15 7Z"
						fill=""></path>
				</svg>
				Save Order', [
					'class' => 'flex items-center gap-2 rounded bg-primary px-4.5 py-2 font-medium text-white hover:bg-opacity-80'
				]); ?>
			</div>
			<div>
				<button
					type="button"
					@click="popupOpen = true"
					class="flex items-center gap-2 rounded bg-primary px-4.5 py-2 font-medium text-white hover:bg-opacity-80">
					<svg
						class="fill-current"
						width="16"
						height="16"
						viewBox="0 0 16 16"
						fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M15 7H9V1C9 0.4 8.6 0 8 0C7.4 0 7 0.4 7 1V7H1C0.4 7 0 7.4 0 8C0 8.6 0.4 9 1 9H7V15C7 15.6 7.4 16 8 16C8.6 16 9 15.6 9 15V9H15C15.6 9 16 8.6 16 8C16 7.4 15.6 7 15 7Z"
							fill=""></path>
					</svg>
					Add Image
				</button>
			</div>
		</div>
	</div>
	<div class="mt-6 gap-7.5">
		<?php
		$productImages = [];
		foreach ($productImagesArray as $productImage) {
			$productImages[$productImage['order']] = [
				'content' => '
		<div>
			<div class="my-10 mx-4">
				<img
					src="uploads/productPhoto/' . $productImage['filename'] . '"
					class="w-full aspect-video object-countain"
					alt="Task">
			</div>
		</div>
		<div class="absolute right-4 top-4">
			<div
				x-data="{openDropDown: false}"
				class="relative">
				<button type="button" @click="openDropDown = !openDropDown">
					<svg
						width="18"
						height="18"
						viewBox="0 0 18 18"
						fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M2.25 11.25C3.49264 11.25 4.5 10.2426 4.5 9C4.5 7.75736 3.49264 6.75 2.25 6.75C1.00736 6.75 0 7.75736 0 9C0 10.2426 1.00736 11.25 2.25 11.25Z"
							fill="#98A6AD"></path>
						<path
							d="M9 11.25C10.2426 11.25 11.25 10.2426 11.25 9C11.25 7.75736 10.2426 6.75 9 6.75C7.75736 6.75 6.75 7.75736 6.75 9C6.75 10.2426 7.75736 11.25 9 11.25Z"
							fill="#98A6AD"></path>
						<path
							d="M15.75 11.25C16.9926 11.25 18 10.2426 18 9C18 7.75736 16.9926 6.75 15.75 6.75C14.5074 6.75 13.5 7.75736 13.5 9C13.5 10.2426 14.5074 11.25 15.75 11.25Z"
							fill="#98A6AD"></path>
					</svg>
				</button>
				<div
					x-show="openDropDown"
					@click.outside="openDropDown = false"
					class="absolute right-0 top-full z-40 w-40 space-y-1 rounded-sm border border-stroke bg-white p-1.5 shadow-default dark:border-strokedark dark:bg-boxdark"
					style="display: none;">
					<button 
						type="button"
					    @click="popupOpen' . $productImage['id'] . ' = true"
					    class="flex w-full items-center gap-2 rounded-sm px-4 py-1.5 text-left text-sm hover:bg-gray dark:hover:bg-meta-4">
						<svg
							class="fill-current"
							width="16"
							height="16"
							viewBox="0 0 16 16"
							fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_62_9787)">
								<path
									d="M15.55 2.97499C15.55 2.77499 15.475 2.57499 15.325 2.42499C15.025 2.12499 14.725 1.82499 14.45 1.52499C14.175 1.24999 13.925 0.974987 13.65 0.724987C13.525 0.574987 13.375 0.474986 13.175 0.449986C12.95 0.424986 12.75 0.474986 12.575 0.624987L10.875 2.32499H2.02495C1.17495 2.32499 0.449951 3.02499 0.449951 3.89999V14C0.449951 14.85 1.14995 15.575 2.02495 15.575H12.15C13 15.575 13.725 14.875 13.725 14V5.12499L15.35 3.49999C15.475 3.34999 15.55 3.17499 15.55 2.97499ZM8.19995 8.99999C8.17495 9.02499 8.17495 9.02499 8.14995 9.02499L6.34995 9.62499L6.94995 7.82499C6.94995 7.79999 6.97495 7.79999 6.97495 7.77499L11.475 3.27499L12.725 4.49999L8.19995 8.99999ZM12.575 14C12.575 14.25 12.375 14.45 12.125 14.45H2.02495C1.77495 14.45 1.57495 14.25 1.57495 14V3.87499C1.57495 3.62499 1.77495 3.42499 2.02495 3.42499H9.72495L6.17495 6.99999C6.04995 7.12499 5.92495 7.29999 5.87495 7.49999L4.94995 10.3C4.87495 10.5 4.92495 10.675 5.02495 10.85C5.09995 10.95 5.24995 11.1 5.52495 11.1H5.62495L8.49995 10.15C8.67495 10.1 8.84995 9.97499 8.97495 9.84999L12.575 6.24999V14ZM13.5 3.72499L12.25 2.49999L13.025 1.72499C13.225 1.92499 14.05 2.74999 14.25 2.97499L13.5 3.72499Z"
									fill=""></path>
							</g>
							<defs>
								<clipPath id="clip0_62_9787">
									<rect
										width="16"
										height="16"
										fill="white"></rect>
								</clipPath>
							</defs>
						</svg>
						Edit
					</button>
					'. Html::a('<svg
							class="fill-current"
							width="16"
							height="16"
							viewBox="0 0 16 16"
							fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12.225 2.20005H10.3V1.77505C10.3 1.02505 9.70005 0.425049 8.95005 0.425049H7.02505C6.27505 0.425049 5.67505 1.02505 5.67505 1.77505V2.20005H3.75005C3.02505 2.20005 2.42505 2.80005 2.42505 3.52505V4.27505C2.42505 4.82505 2.75005 5.27505 3.22505 5.47505L3.62505 13.75C3.67505 14.775 4.52505 15.575 5.55005 15.575H10.4C11.425 15.575 12.275 14.775 12.325 13.75L12.75 5.45005C13.225 5.25005 13.55 4.77505 13.55 4.25005V3.50005C13.55 2.80005 12.95 2.20005 12.225 2.20005ZM6.82505 1.77505C6.82505 1.65005 6.92505 1.55005 7.05005 1.55005H8.97505C9.10005 1.55005 9.20005 1.65005 9.20005 1.77505V2.20005H6.85005V1.77505H6.82505ZM3.57505 3.52505C3.57505 3.42505 3.65005 3.32505 3.77505 3.32505H12.225C12.325 3.32505 12.425 3.40005 12.425 3.52505V4.27505C12.425 4.37505 12.35 4.47505 12.225 4.47505H3.77505C3.67505 4.47505 3.57505 4.40005 3.57505 4.27505V3.52505V3.52505ZM10.425 14.45H5.57505C5.15005 14.45 4.80005 14.125 4.77505 13.675L4.40005 5.57505H11.625L11.25 13.675C11.2 14.1 10.85 14.45 10.425 14.45Z"
								fill=""></path>
							<path
								d="M8.00005 8.1001C7.70005 8.1001 7.42505 8.3501 7.42505 8.6751V11.8501C7.42505 12.1501 7.67505 12.4251 8.00005 12.4251C8.30005 12.4251 8.57505 12.1751 8.57505 11.8501V8.6751C8.57505 8.3501 8.30005 8.1001 8.00005 8.1001Z"
								fill=""></path>
							<path
								d="M9.99994 8.60004C9.67494 8.57504 9.42494 8.80004 9.39994 9.12504L9.24994 11.325C9.22494 11.625 9.44994 11.9 9.77494 11.925C9.79994 11.925 9.79994 11.925 9.82494 11.925C10.1249 11.925 10.3749 11.7 10.3749 11.4L10.5249 9.20004C10.5249 8.87504 10.2999 8.62504 9.99994 8.60004Z"
								fill=""></path>
							<path
								d="M5.97497 8.60004C5.67497 8.62504 5.42497 8.90004 5.44997 9.20004L5.62497 11.4C5.64997 11.7 5.89997 11.925 6.17497 11.925C6.19997 11.925 6.19997 11.925 6.22497 11.925C6.52497 11.9 6.77497 11.625 6.74997 11.325L6.57497 9.12504C6.57497 8.80004 6.29997 8.57504 5.97497 8.60004Z"
								fill=""></path>
						</svg>
						Delete', ['product/delete-image', 'id' => $productImage['id'], 'idParent' => $model->id], ['class' => 'flex w-full items-center gap-2 rounded-sm px-4 py-1.5 text-left text-sm hover:bg-gray dark:hover:bg-meta-4']) .'
				</div>
			</div>
		</div>
'
			];
		} ?>
		<?= SortableInput::widget([
			'name' => 'sortedItems',
			'items' => $productImages,
			'hideInput' => true,
			'sortableOptions' => [
				'itemOptions' => [
					'class' => 'task relative w-64 justify-between rounded-sm border border-stroke bg-white p-7 shadow-default dark:border-strokedark dark:bg-boxdark'
				],
				'options' => [
					'class' => 'flex flex-row flex-wrap gap-5.5 border-transparent'
				]
			],
		]); ?>
	</div>
	<?php ActiveForm::end(); ?>
	<?php $form2 = ActiveForm::begin(['id' => 'form 2', 'options' => ['enctype' => 'multipart/form-data']]); ?>

	<!-- ===== Task Popup Start ===== -->
	<div
		x-show="popupOpen"
		x-transition=""
		class="fixed left-0 top-0 z-99999 flex h-screen w-full justify-center overflow-y-scroll bg-black/80 px-4 py-5"
		style="display: none;">
		<div
			@click.outside="popupOpen = false"
			class="relative m-auto w-full max-w-180 rounded-sm border border-stroke bg-gray p-4 shadow-default dark:border-strokedark dark:bg-meta-4 sm:p-8 xl:p-10">
			<button
				@click="popupOpen = false"
				class="absolute right-1 top-1 sm:right-5 sm:top-5">
				<svg
					class="fill-current"
					width="20"
					height="20"
					viewBox="0 0 20 20"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						fill-rule="evenodd"
						clip-rule="evenodd"
						d="M11.8913 9.99599L19.5043 2.38635C20.032 1.85888 20.032 1.02306 19.5043 0.495589C18.9768 -0.0317329 18.141 -0.0317329 17.6135 0.495589L10.0001 8.10559L2.38673 0.495589C1.85917 -0.0317329 1.02343 -0.0317329 0.495873 0.495589C-0.0318274 1.02306 -0.0318274 1.85888 0.495873 2.38635L8.10887 9.99599L0.495873 17.6056C-0.0318274 18.1331 -0.0318274 18.9689 0.495873 19.4964C0.717307 19.7177 1.05898 19.9001 1.4413 19.9001C1.75372 19.9001 2.13282 19.7971 2.40606 19.4771L10.0001 11.8864L17.6135 19.4964C17.8349 19.7177 18.1766 19.9001 18.5589 19.9001C18.8724 19.9001 19.2531 19.7964 19.5265 19.4737C20.0319 18.9452 20.0245 18.1256 19.5043 17.6056L11.8913 9.99599Z"
						fill=""></path>
				</svg>
			</button>

			<div class="mb-5">
				<label
					for="taskImg"
					class="mb-2.5 block font-medium text-black dark:text-white">Add image</label>
				<div x-data="{ files: null }">

					<?= $form2->field($uploadForm, 'imageFile', [
						'inputOptions' => [
							'class' => 'absolute cursor-pointer inset-0 z-50 m-0 h-full w-full p-0 opacity-0 outline-none',
							'accept' => 'image/*',
							'type' => 'file',
							'x-on:change' => '$event.target.files;',
							'x-on:drop' => '$el.classList.remove(' . "'active'" . ')'
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
		</div>
	</div>
	<!-- ===== Task Popup End ===== -->
	<?php ActiveForm::end() ?>

	<?php foreach ($productImagesArray as $productImageArray): ?>


		<?php $form3 = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
		<!-- ===== Task Popup Edit Start ===== -->
		<div
			x-show="popupOpen<?= $productImageArray['id'] ?>"
			x-transition=""
			class="fixed left-0 top-0 z-99999 flex h-screen w-full justify-center overflow-y-scroll bg-black/80 px-4 py-5"
			style="display: none;">

			<div
				@click.outside="popupOpen<?= $productImageArray['id'] ?> = false"
				class="relative m-auto w-full max-w-180 rounded-sm border border-stroke bg-gray p-4 shadow-default dark:border-strokedark dark:bg-meta-4 sm:p-8 xl:p-10">
				<button
					@click="popupOpen<?= $productImageArray['id'] ?> = false"
					class="absolute right-1 top-1 sm:right-5 sm:top-5">
					<svg
						class="fill-current"
						width="20"
						height="20"
						viewBox="0 0 20 20"
						fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path
							fill-rule="evenodd"
							clip-rule="evenodd"
							d="M11.8913 9.99599L19.5043 2.38635C20.032 1.85888 20.032 1.02306 19.5043 0.495589C18.9768 -0.0317329 18.141 -0.0317329 17.6135 0.495589L10.0001 8.10559L2.38673 0.495589C1.85917 -0.0317329 1.02343 -0.0317329 0.495873 0.495589C-0.0318274 1.02306 -0.0318274 1.85888 0.495873 2.38635L8.10887 9.99599L0.495873 17.6056C-0.0318274 18.1331 -0.0318274 18.9689 0.495873 19.4964C0.717307 19.7177 1.05898 19.9001 1.4413 19.9001C1.75372 19.9001 2.13282 19.7971 2.40606 19.4771L10.0001 11.8864L17.6135 19.4964C17.8349 19.7177 18.1766 19.9001 18.5589 19.9001C18.8724 19.9001 19.2531 19.7964 19.5265 19.4737C20.0319 18.9452 20.0245 18.1256 19.5043 17.6056L11.8913 9.99599Z"
							fill=""></path>
					</svg>
				</button>

				<div class="mb-5">
					<label
						for="taskImg"
						class="mb-2.5 block font-medium text-black dark:text-white">Add image</label>
					<div x-data="{ files: null }">

						<?= $form3->field($uploadForm, 'imageFile', [
							'inputOptions' => [
								'class' => 'absolute cursor-pointer inset-0 z-50 m-0 h-full w-full p-0 opacity-0 outline-none',
								'accept' => 'image/*',
								'type' => 'file',
								'x-on:change' => '$event.target.files;',
								'x-on:drop' => '$el.classList.remove(' . "'active'" . ')'
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
			</div>
			<input
				type="hidden"
				name="ProductImageUploadForm[productImageId]"
				value="<?= $productImageArray['id'] ?>"
			>
		</div>
		<?php ActiveForm::end() ?>
		<!-- ===== Task Popup Edit End ===== -->
	<?php endforeach; ?>

</div>
