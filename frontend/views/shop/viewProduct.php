<?php
/**
 * @var Shop $model
 */

use common\models\Shop;
use yii\helpers\Html;

?>
<!-- ===== Blog Single Start ===== -->
<section class="gj qp gr hj rp hr">
	<div class="bb ze ki xn 2xl:ud-px-0">
		<div class="tc sf yo zf kq">
			<div class="ro">
				<div class="animate_top rounded-md shadow-solid-13 bg-white dark:bg-blacksection border border-stroke dark:border-strokedark p-7.5 md:p-10">
					<img
						src="images/blog-big.png"
						alt="Blog"/>

					<h2 class="ek vj 2xl:ud-text-title-lg kk wm nb gb">Kobe Steel plant that supplied</h2>

					<ul class="tc uf cg 2xl:ud-gap-15 fb">
						<li><span class="rc kk wm">Penjual: </span> Devin Rizky</li>
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
