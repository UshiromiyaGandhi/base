<?php

/**
 * @var Shop $model
 */

use common\models\Shop;
use yii\helpers\Html;

?>
<div class="animate_top sg vk rm xm">
	<div class="c rc i z-1 pg">
		<img
			class="w-full"
			src="images/blog-01.png"
			alt="Blog"/>

		<div
			class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10"
		>
			<?= Html::a('Lebih Lanjut', ['shop/view-product', 'id' => $model->id], ['class' => 'vc ek rg lk gh sl ml il gi hi']) ?>
		</div>
	</div>

	<div class="yh">
		<div class="tc uf wf ag jq">
			<div class="tc wf ag">
				<img
					src="images/icon-man.svg"
					alt="User"/>
				<p><?= $model->shop->name ?></p>
			</div>
<!--			<div class="tc wf ag">-->
<!--				<img-->
<!--					src="images/icon-calender.svg"-->
<!--					alt="Calender"/>-->
<!--				<p>25 Dec, 2025</p>-->
<!--			</div>-->
		</div>
		<h4 class="ek tj ml il kk wm xl eq lb">
			<?= Html::a($model->name, ['shop/view-product', 'id' => $model->id]) ?>
		</h4>
	</div>
</div>
