<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductVariant $model */
/** @var common\models\Product $modelParent */

$this->title = 'Create Product Variant';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelParent->name , 'url' => ["view", 'id' => $modelParent->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
>

    <?= $this->render('_formVariant', [
        'model' => $model,
    ]) ?>

</div>
