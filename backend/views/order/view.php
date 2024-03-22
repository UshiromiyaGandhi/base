<?php

use common\models\OrderItem;
use common\models\OrderItemSearch;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Order $model */
/** @var OrderItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Order Id ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="flex flex-col gap-5 md:gap-7 2xl:gap-10">
	<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
		<div class="p-7">
			<!--    <p>-->
			<!--		--><?php //= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
			<!--		--><?php //= Html::a('Delete', ['delete', 'id' => $model->id], [
			//			'class' => 'btn btn-danger',
			//			'data' => [
			//				'confirm' => 'Are you sure you want to delete this item?',
			//				'method' => 'post',
			//			],
			//		]) ?>
			<!--    </p>-->
			<?= $this->render('_form', [
				'model' => $model,
			]) ?>
		</div>
	</div>
	<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
		<div class="data-table-common data-table-one max-w-full overflow-x-auto">
			<div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

				<?= GridView::widget(['dataProvider' => $dataProvider, 'layout' => '<div class="datatable-top">
	<div class="datatable-dropdown">
		<label>
			<select class="datatable-selector">
				<option value="5">5</option>
				<option
					value="10"
					selected="">10
				</option>
				<option value="15">15</option>
				<option value="-1">All</option>
			</select> entries per page
		</label>
	</div>
	<div class="datatable-search">
		<input
			class="datatable-input"
			placeholder="Search..."
			type="search"
			title="Search within table"
			aria-controls="dataTableOne">
	</div>
</div>
<div class="datatable-container">
	{items}
</div>
<div class="datatable-bottom">
	<div class="datatable-info">Showing 1 to 10 of 16 entries</div>
	<nav class="datatable-pagination">
		<ul class="datatable-pagination-list">
			<li class="datatable-pagination-list-item datatable-hidden datatable-disabled"><a
				data-page="1"
				class="datatable-pagination-list-item-link">‹</a></li>
			<li class="datatable-pagination-list-item datatable-active"><a
				data-page="1"
				class="datatable-pagination-list-item-link">1</a></li>
			<li class="datatable-pagination-list-item"><a
				data-page="2"
				class="datatable-pagination-list-item-link">2</a></li>
			<li class="datatable-pagination-list-item"><a
				data-page="2"
				class="datatable-pagination-list-item-link">›</a></li>
		</ul>
	</nav>
</div>', 'columns' => [['attribute' => 'productvariant.product.name', 'encodeLabel' => false, 'label' => '<div class="datatable-sorter">
	<div class="flex items-center gap-1.5">
		<p>Product Name</p>
		<div class="inline-flex flex-col space-y-[2px]">
			<span class="inline-block">
				<svg
					class="fill-current"
					width="10"
					height="5"
					viewBox="0 0 10 5"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M5 0L0 5H10L5 0Z"
						fill=""></path>
				</svg>
			</span>
			<span class="inline-block">
				<svg
					class="fill-current"
					width="10"
					height="5"
					viewBox="0 0 10 5"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z"
						fill=""></path>
				</svg>
			</span>
		</div>
	</div>
	</a>',], ['attribute' => 'productvariant.name', 'encodeLabel' => false, 'label' => '<div class="datatable-sorter">
	<div class="flex items-center gap-1.5">
		<p>Variant Name</p>
		<div class="inline-flex flex-col space-y-[2px]">
			<span class="inline-block">
				<svg
					class="fill-current"
					width="10"
					height="5"
					viewBox="0 0 10 5"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M5 0L0 5H10L5 0Z"
						fill=""></path>
				</svg>
			</span>
			<span class="inline-block">
				<svg
					class="fill-current"
					width="10"
					height="5"
					viewBox="0 0 10 5"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z"
						fill=""></path>
				</svg>
			</span>
		</div>
	</div>
	</a>',], ['attribute' => 'count', 'encodeLabel' => false, 'label' => '<div class="datatable-sorter">
	<div class="flex items-center gap-1.5">
		<p>Count</p>
		<div class="inline-flex flex-col space-y-[2px]">
			<span class="inline-block">
				<svg
					class="fill-current"
					width="10"
					height="5"
					viewBox="0 0 10 5"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M5 0L0 5H10L5 0Z"
						fill=""></path>
				</svg>
			</span>
			<span class="inline-block">
				<svg
					class="fill-current"
					width="10"
					height="5"
					viewBox="0 0 10 5"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z"
						fill=""></path>
				</svg>
			</span>
		</div>
	</div>
	</a>',], ['value' => function (OrderItem $model) {
					$totalcost = $model->productvariant->cost * $model->count;
					return Yii::$app->formatter->asCurrency($totalcost, 'IDR');
				}, 'encodeLabel' => false, 'label' => '<div class="datatable-sorter">
	<div class="flex items-center gap-1.5">
		<p>Total Cost</p>
		<div class="inline-flex flex-col space-y-[2px]">
			<span class="inline-block">
				<svg
					class="fill-current"
					width="10"
					height="5"
					viewBox="0 0 10 5"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M5 0L0 5H10L5 0Z"
						fill=""></path>
				</svg>
			</span>
			<span class="inline-block">
				<svg
					class="fill-current"
					width="10"
					height="5"
					viewBox="0 0 10 5"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z"
						fill=""></path>
				</svg>
			</span>
		</div>
	</div>
	</a>',], ], 'tableOptions' => ['class' => 'table w-full table-auto datatable-table', 'id' => "dataTableOne"], 'filterRowOptions' => ['class' => null, 'id' => '']]); ?>
			</div>
		</div>
	</div>
</div>
