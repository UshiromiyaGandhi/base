<?php

namespace backend\controllers;

use backend\models\ShopProfileUploadForm;
use common\models\Shop;
use common\models\ShopSearch;
use mdm\admin\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ShopController implements the CRUD actions for Shop model.
 */
class ShopController extends Controller
{
	/**
	 * @inheritDoc
	 */
	public function behaviors()
	{
		return array_merge(
			parent::behaviors(),
			[
				'verbs' => [
					'class' => VerbFilter::className(),
					'actions' => [
						'delete' => ['POST'],
					],
				],
				'access' => [
					'class' => AccessControl::class,
					'only' => ['index'],
					'rules' => [
						[
							'allow' => true,
							'roles' => ['haveActiveShop']
						]
					]
				]
			]
		);
	}

	/**
	 * Open current user's shop
	 *
	 * @return string|Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionIndex()
	{
		$userModel = Yii::$app->user->identity;
		$shopModel = $this->findModel($userModel->shop);
		$profileUploadForm = new ShopProfileUploadForm();

		if (
//			$this->request->isPost &&
//			$shopModel->load($this->request->post()) &&
//			$shopModel->save()
			$userModel->load(Yii::$app->request->post()) &&
			$shopModel->load(Yii::$app->request->post())
		) {
			$userModel->save();
			$shopModel->save();
		}

		if (isset(Yii::$app->request->post()['ShopProfileUploadForm'])) {
			$profileUploadForm->imageFile = UploadedFile::getInstance($profileUploadForm, 'imageFile');
			$profileUploadForm->upload($shopModel);
		}

		return $this->render('index', [
			'shopModel' => $shopModel,
			'userModel' => $userModel,
			'profileUploadForm' => $profileUploadForm
		]);
//        $searchModel = new ShopSearch();
//        $dataProvider = $searchModel->search($this->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//	        'model' => $model
//        ]);
	}

	/**
	 * Displays a single Shop model.
	 * @param int $id ID
	 * @return string
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Shop model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return string|Response
	 */
	public function actionCreate()
	{
		$model = new Shop();

		if ($this->request->isPost) {
			if ($model->load($this->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
		} else {
			$model->loadDefaultValues();
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Shop model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param int $id ID
	 * @return string|Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Shop model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param int $id ID
	 * @return Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Shop model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param int $id ID
	 * @return Shop the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Shop::findOne(['id' => $id])) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
