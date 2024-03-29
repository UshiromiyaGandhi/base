<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var common\models\ProductVariant $modelParent */

$this->title = 'Update Product Variant: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelParent->name, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div
	class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
>

    <?= $this->render('_formVariant', [
        'model' => $model,
    ]) ?>

</div>
