<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Shop $model */

$this->title = 'My Shop';
$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shop-update">

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
