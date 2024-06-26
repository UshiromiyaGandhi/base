<?php

namespace backend\controllers;

use backend\models\ProductImageUploadForm;
use common\models\Product;
use common\models\ProductImage;
use common\models\ProductSearch;
use common\models\ProductVariant;
use common\models\ProductVariantSearch;
use Yii;
use yii\db\Query;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use function Psy\debug;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
						'delete' => ['POST', 'GET'],
					],
				],
			]
		);
	}

	/**
	 * Lists all Product models.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		$searchModel = new ProductSearch();
		$dataProvider = $searchModel->search($this->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Product model.
	 * @param int $id ID
	 * @return string|\yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id)
	{
		$modelParent = $this->findModel($id);
		$searchModel = new ProductVariantSearch();
		$dataProvider = $searchModel->search($this->request->queryParams, $id);
		$productImages = ProductImage::find()->where(['productid' => $id])->orderBy(['`order`' => 'asc'])->asArray()->all();

		if ($this->request->isPost) {
			$modelParent->load($this->request->post());
			$modelParent->save();
			Yii::debug('kesavegksih');
			return $this->redirect(['view', 'id' => $modelParent->id]);
		}

		return $this->render('view', [
			'modelParent' => $modelParent,
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'productImages' => $productImages
		]);
	}

	/**
	 * Updates an existing Product model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param int $id ID
	 * @return string|\yii\web\Response
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

	public function actionViewVariant($id)
	{
		$model = ProductVariant::findOne(['id' => $id]);
		$modelParent = $model->product;
		if (isset(Yii::$app->request->post()['ProductVariant']['image'])) {
			$imageFile = UploadedFile::getInstance($model, 'image');
			Yii::debug(Yii::$app->request->post());
			$fileName = time() . '.' . $imageFile->extension;
			try {
				unlink('uploads/productVariantPhoto/' . $model->image);
			} catch (\Exception $e) {
			}
			$model->image = $fileName;
			$model->save();
			$imageFile->saveAs('uploads/productVariantPhoto/' . $fileName);
			return $this->refresh();
		}
		if ($this->request->isPost) {
			$model->load($this->request->post());
			$model->save();
			return $this->refresh();
		}
		return $this->render('viewVariant', [
			'model' => $model,
			'modelParent' => $modelParent
		]);
	}

	public function actionDeleteImage($id)
	{
		$model = ProductImage::findOne($id);
		$idParent = $model->productid;
		try {
			unlink('uploads/productPhoto/' . $model->filename);
		} catch (\Exception $e) {
		}
		$productImagesToBeOrdered = ProductImage::find()
			->where(['productid' => $idParent])
			->andWhere(['>', 'order', $model->order])
			->all();
		foreach ($productImagesToBeOrdered as $productImageToBeOrdered){
			$productImageToBeOrdered->order = $productImageToBeOrdered->order - 1;
		}
		$model->delete();
		foreach ($productImagesToBeOrdered as $productImageToBeOrdered){
			$productImageToBeOrdered->save();
		}
		$this->redirect(['product/edit-image', 'id' => $idParent]);
	}

	public function actionEditImage($id)
	{
		$model = Product::findOne($id);
		$productImageUploadForm = new ProductImageUploadForm();

		$productImagesArray = ProductImage::find()
			->where(['productid' => $model->id])
			->orderBy(['order' => 'asc'])
			->asArray()
			->all();

		if (isset(Yii::$app->request->post()['sortedItems'])) {
			$newOrder = explode(',', Yii::$app->request->post()['sortedItems']);
			$productImagesActiveRecord = ProductImage::find()
				->where(['productid' => $model->id])
				->orderBy(['order' => 'asc'])
				->all();
			try {
				foreach ($newOrder as $index => $newValue) {
					$productImagesActiveRecord[$newValue - 1]->order = $index + 1;
				}
				foreach ($productImagesActiveRecord as $productImage) {
					$productImage->save();
				}
				$this->refresh();
			} catch (\Throwable $exception) {
				Yii::debug($exception);
			}
		}

		if (isset(Yii::$app->request->post()['ProductImageUploadForm']['imageFile'])) {
			Yii::debug(Yii::$app->request->post());
			$productImageUploadForm->productImageId = Yii::$app->request->post()['ProductImageUploadForm']['productImageId'] ?? null;
			$productImageUploadForm->productId = $model->id;
			$productImageUploadForm->imageFile = UploadedFile::getInstance($productImageUploadForm, 'imageFile');
			$productImageUploadForm->upload();
			$this->refresh();
		}

		return $this->render('editImage', [
			'model' => $model,
			'productImagesArray' => $productImagesArray,
			'uploadForm' => $productImageUploadForm,
		]);
	}

	public function actionCreateVariant($id)
	{
		$model = new ProductVariant();
		$model->productid = $id;

		if ($this->request->isPost) {
			if ($model->load($this->request->post()) && $model->save()) {
				Yii::debug("savedddddwoeifjsdoijfiodsjfdiosj");
				return $this->redirect(['view-variant', 'id' => $model->id, 'idParent' => $id]);
			}
		} else {
			$model->loadDefaultValues();
		}

		return $this->render('createVariant', [
			'model' => $model,
			'modelParent' => Product::findOne($id)
		]);
	}

	/**
	 * Creates a new Product model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return string|\yii\web\Response
	 */
	public function actionCreate()
	{
		$model = new Product();
		$model->sellerId = Yii::$app->user->identity->getShop()->id;

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

	public function actionToggleActive($id)
	{
		$model = $this->findModel($id);
		$model->active = (int)!$model->active;
		$model->save();
		return $this->redirect(['index']);
	}

	public function actionUpdateVariant($id)
	{
		$model = ProductVariant::findOne($id);
		$modelParent = $model->product;

		if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $modelParent->id]);
		}

		return $this->render('updateVariant', [
			'model' => $model,
			'modelParent' => $modelParent
		]);
	}

	/**
	 * Deletes an existing Product model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param int $id ID
	 * @return \yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id)
	{
		$model = $this->findModel($id)->delete();
		return $this->redirect(['index']);
	}

	public function actionDeleteVariantImage($variantId)
	{
		$model = ProductVariant::findOne($variantId);
		try {
			unlink('uploads/productVariantPhoto/' . $model->image);
		} catch (\Exception $e) {
		}
		$model->image = null;
		$model->save();

		return $this->redirect(['view-variant', 'id' => $variantId]);
	}

	public function actionDeleteVariant($id)
	{
		$model = ProductVariant::findOne($id);
		$idParent = $model->productid;
		$model->delete();
		return $this->redirect(['view', 'id' => $idParent]);
	}

	/**
	 * Finds the Product model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param int $id ID
	 * @return Product the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Product::findOne(['id' => $id])) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
