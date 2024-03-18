<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = Yii::t('rbac-admin', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div
        class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
>
	<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    <form action="#">
        <div class="p-6.5">
            <div class="mb-4.5">
                <div class="mb-4.5">
			            <?= $form->field(
				            $model,
				            'username',
				            [
					            'labelOptions' => [
						            'class' => 'mb-3 block text-sm font-medium text-black dark:text-white'
					            ],
					            'inputOptions' => [
						            'class' => ' w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary'
					            ]
				            ]) ?>
            </div>

            <div class="mb-4.5">
	            <?= $form->field(
		            $model,
		            'email',
		            [
			            'labelOptions' => [
				            'class' => 'mb-3 block text-sm font-medium text-black dark:text-white'
			            ],
			            'inputOptions' => [
				            'class' => ' w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary',
				            'type' => 'email'
			            ]
		            ]) ?>
            </div>

            <div class="mb-4.5">
                <?= $form->field(
                    $model,
                    'password',
                    [
                        'labelOptions' => [
                            'class' => 'mb-3 block text-sm font-medium text-black dark:text-white'
                        ],
                        'inputOptions' => [
                            'class' => ' w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary'
                        ],
                    ])->passwordInput() ?>
            </div>

            <div class="mb-5.5">
                <?= $form->field(
                    $model,
                    'retypePassword',
                    [
                        'labelOptions' => [
                            'class' => 'mb-3 block text-sm font-medium text-black dark:text-white'
                        ],
                        'inputOptions' => [
                            'class' => ' w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary'
                        ]
                    ])->passwordInput() ?>
            </div>

            <?= Html::submitButton(Yii::t('rbac-admin', 'Signup'), ['class' => 'flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90', 'name' => 'signup-button']) ?>
        </div>
    </form>
	<?php ActiveForm::end(); ?>
</div>


