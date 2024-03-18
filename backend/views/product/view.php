<?php

use common\models\Product;
use common\models\ProductVariant;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Product $modelParent */
/** @var common\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $modelParent->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $modelParent->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $modelParent->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $modelParent,
        'attributes' => [
            'id',
            'sellerId',
            'name',
            'description',
        ],
    ]) ?>

    <p>
		<?= Html::a('Create Product Variant', ['create-variant', 'id' => $modelParent->id], ['class' => 'btn btn-success']) ?>
    </p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'id',
			'productid',
			'name',
			'description',
			[
				'class' => ActionColumn::className(),
				'urlCreator' => function ($action, ProductVariant $model, $key, $index, $column) {
					return Url::toRoute([$action . '-variant', 'id' => $model->id]);
				}
			],
		],
	]); ?>

</div>
