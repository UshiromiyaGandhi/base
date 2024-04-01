<?php
/**
 * @var \common\models\Product $model
 */
/** @var \common\models\ProductImage $productImages*/

use common\models\Shop;
use yii\helpers\Html;
use yii\helpers\Url;

$this->registerJsFile('https://demo.tailadmin.com/bundle.js');
?>
<!-- ===== Blog Single Start ===== -->
<section class="gj qp gr hj rp hr">
	<div class="bb ze ki xn 2xl:ud-px-0">
		<div class="tc sf yo zf kq">
			<div class="ro">
				<div class="animate_top rounded-md shadow-solid-13  p-7.5 md:p-10">
					<div
						class="swiper carouselThree swiper-initialized swiper-horizontal swiper-backface-hidden"
					>
						<div
							class="swiper-wrapper "
							style="transition-duration: 0ms;">
							<?php
							foreach ($productImages as $productImage) {
								echo '<div
								class="swiper-slide">
								<img
									class="object-cover w-full aspect-video"
									src="'. str_replace('frontend', 'backend', Url::base()) .'/uploads/productPhoto/' . $productImage->filename .'"
									alt="carousel">
							</div>';
							}
							?>

						</div>
						<div class="swiper-button-next">
							<svg
								class="fill-current"
								width="12"
								height="20"
								viewBox="0 0 12 20"
								fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M1.75938 19.4875C1.53438 19.4875 1.34687 19.4125 1.15937 19.2625C0.821875 18.925 0.821875 18.4 1.15937 18.0625L9.03437 9.99998L1.15937 1.97498C0.821875 1.63748 0.821875 1.11248 1.15937 0.774976C1.49687 0.437476 2.02187 0.437476 2.35937 0.774976L10.8344 9.39997C11.1719 9.73748 11.1719 10.2625 10.8344 10.6L2.35937 19.225C2.20937 19.375 1.98438 19.4875 1.75938 19.4875Z"
									fill=""></path>
							</svg>
						</div>
						<div class="swiper-button-prev">
							<svg
								class="fill-current"
								width="12"
								height="20"
								viewBox="0 0 12 20"
								fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M10.2344 19.4875C10.0094 19.4875 9.78438 19.4125 9.63437 19.225L1.15937 10.6C0.821875 10.2625 0.821875 9.73748 1.15937 9.39997L9.63437 0.774976C9.97188 0.437476 10.4969 0.437476 10.8344 0.774976C11.1719 1.11248 11.1719 1.63748 10.8344 1.97498L2.95937 9.99998L10.8719 18.025C11.2094 18.3625 11.2094 18.8875 10.8719 19.225C10.6469 19.375 10.4594 19.4875 10.2344 19.4875Z"
									fill=""></path>
							</svg>
						</div>
					</div>

					<h2 class="ek vj 2xl:ud-text-title-lg kk wm nb gb"><?= $model->name ?></h2>

					<ul class="tc uf cg 2xl:ud-gap-15 fb">
						<li><span class="rc kk wm">Penjual: </span> <?= $model->shop->name ?> </li>
						<li><span class="rc kk wm">Published On: </span> 16 April 2024</li>
						<li><span class="rc kk wm">Kategori: </span> Barang</li>
						<?= Html::a('Pembayaran Selanjutnya', ['shop/upload-product', 'id' => $model->id], ['class' => 'lk gh dk rg tc wf xf _l gi hi', 'id' => 'paymentNext']) ?>
					</ul>

					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis nibh lorem. Duis sed odio
						lorem. In a efficitur leo. Ut venenatis rhoncus quam sed condimentum. Curabitur vel turpis
						in dolor volutpat imperdiet in ut mi. Integer non volutpat nulla. Nunc elementum elit
						viverra, tempus quam non, interdum ipsum.
					</p>
				</div>
			</div>

			<div class="jn/2 so">
				<div class="animate_top">
					<h4 class="tj kk wm qb">Related Posts</h4>

					<div>
						<div class="tc fg 2xl:ud-gap-6 qb">
							<img
								src="images/blog-small-01.png"
								alt="Blog"/>
							<h5 class="wj kk wm xl bn ml il">
								<a href="#">Free advertising for your online business</a>
							</h5>
						</div>
						<div class="tc fg 2xl:ud-gap-6 qb">
							<img
								src="images/blog-small-02.png"
								alt="Blog"/>
							<h5 class="wj kk wm xl bn ml il">
								<a href="#">9 simple ways to improve your design skills</a>
							</h5>
						</div>
						<div class="tc fg 2xl:ud-gap-6">
							<img
								src="images/blog-small-03.png"
								alt="Blog"/>
							<h5 class="wj kk wm xl bn ml il">
								<a href="#">Tips to quickly improve your coding speed.</a>
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Popup -->

</section>


<!-- ===== Blog Single End ===== -->

<!-- ===== CTA Start ===== -->
<section class="i pg gh ji">
	<!-- Bg Shape -->
	<img
		class="h p q"
		src="images/shape-16.svg"
		alt="Bg Shape"/>

	<div class="bb ye i z-10 ki xn dr">
		<div class="tc uf sn tn un gg">
			<div class="animate_left to/2">
				<h2 class="fk vj zp pr lk ac">
					Bergabunglah dengan 50+ Startup yang Berkembang bersama Base.
				</h2>
				<p class="lk">
					Temukan kesempatan kolaborasi, jaringan yang luas, dan dukungan untuk mewujudkan potensi bisnis
					Anda. Segera jadi bagian dari komunitas yang dinamis dan berinovasi!
				</p>
			</div>
			<div class="animate_right bf">
				<a
					href="#"
					class="vc ek kk hh rg ol il cm gi hi">
					Lebih Lanjut
				</a>
			</div>
		</div>
	</div>
</section>

<!-- ===== CTA End ===== -->
