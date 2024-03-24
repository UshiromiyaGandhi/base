<?php

use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView; ?>
<!-- ===== Blog Grid Start ===== -->
<section class="ji gp uq">
	<div class="bb ye ki xn vq jb jo">

		<!-- Blog Item -->
		<?= ListView::widget([
			'dataProvider' => new ActiveDataProvider([
				'query' => Product::find(),
				'pagination' => [
					'pageSize' => 20,
				],
			]),
			'itemView' => '_shopProduct',
			'options' => ['class' => 'wc qf pn xo zf iq'],
			'layout' => '{items}'
		]) ?>

		<!-- Pagination -->
		<div class="mb lo bq i ua">
			<nav>
				<ul class="tc wf xf bg">
					<li>
						<a
							class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an"
							href="#"
						>
							<svg
								class="th lm ml il"
								width="8"
								height="14"
								viewBox="0 0 8 14"
								fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M2.93884 6.99999L7.88884 11.95L6.47484 13.364L0.11084 6.99999L6.47484 0.635986L7.88884 2.04999L2.93884 6.99999Z"/>
							</svg>
						</a>
					</li>
					<li>
						<a
							class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an"
							href="#"
						>
							1
						</a>
					</li>
					<li>
						<a
							class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an"
							href="#"
						>
							2
						</a>
					</li>
					<li>
						<a
							class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an"
							href="#"
						>
							3
						</a>
					</li>
					<li>
						<a
							class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an"
							href="#"
						>
							4
						</a>
					</li>
					<li>
						<a
							class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an"
							href="#"
						>
							<svg
								class="th lm ml il"
								width="8"
								height="14"
								viewBox="0 0 8 14"
								fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M5.06067 7.00001L0.110671 2.05001L1.52467 0.636014L7.88867 7.00001L1.52467 13.364L0.110672 11.95L5.06067 7.00001Z"
									fill="#fefdfo"/>
							</svg>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<!-- Pagination -->
	</div>
</section>


<!-- ===== Blog Grid End ===== -->

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