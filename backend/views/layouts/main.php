<?php

/** @var \yii\web\View $this */

/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
			<?php $this->head() ?>
    </head>
    <body
            class="d-flex flex-column h-100"
            x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
            x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
            :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}"
    >
		<?php $this->beginBody() ?>

    <!--        Preloader-->
    <?= $this->render('@app/web/partials/preloader.php') ?>
    <!--        Preloader End-->

    <div class="flex h-screen overflow-hidden">


	    <?= $this->render('@app/web/partials/sidebar.php') ?>

        <div
                class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
        >
            <!--        Header-->
            <?= $this->render('@app/web/partials/header.php') ?>
            <!--        Header End-->

            <div style="height: 16px"></div>
            <main role="main" class="flex-shrink-0">
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
<!--									--><?php //= Breadcrumbs::widget([
//										'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//									]) ?>
<!---->
                    <div
                            class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
                    >
                        <h2 class="text-title-md2 font-bold text-black dark:text-white">
                            Form Layout
                        </h2>

                        <nav>
                            <ol class="flex items-center gap-2">
                                <li>
                                    <a class="font-medium" href="index.html">Dashboard /</a>
                                </li>
                                <li class="font-medium text-primary">Form Layout</li>
                            </ol>
                        </nav>
                    </div>
									<?= Alert::widget() ?>
									<?= $content ?>
                </div>
            </main>
        </div>

    </div>

    <!--<header>-->
    <!--    --><?php
		//    NavBar::begin([
		//        'brandLabel' => Yii::$app->name,
		//        'brandUrl' => Yii::$app->homeUrl,
		//        'options' => [
		//            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
		//        ],
		//    ]);
		//    $menuItems = [
		//        ['label' => 'Home', 'url' => ['/site/index']],
		//    ];
		//    if (Yii::$app->user->isGuest) {
		//        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
		//    }
		//    echo Nav::widget([
		//        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
		//        'items' => $menuItems,
		//    ]);
		//    if (Yii::$app->user->isGuest) {
		//        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
		//    } else {
		//        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
		//            . Html::submitButton(
		//                'Logout (' . Yii::$app->user->identity->username . ')',
		//                ['class' => 'btn btn-link logout text-decoration-none']
		//            )
		//            . Html::endForm();
		//    }
		//    NavBar::end();
		//    ?>

		<?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
