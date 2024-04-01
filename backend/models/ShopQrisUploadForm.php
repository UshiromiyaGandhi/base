<?php

namespace backend\models;

use common\models\ProductImage;
use common\models\Shop;
use yii\base\Model;
use yii\db\Exception;
use yii\db\Query;
use yii\web\UploadedFile;

class ShopQrisUploadForm extends Model
{
	/**
	 * @var UploadedFile
	 */
	public $imageFile;
	/** @var int */
	public $shopId;

	public function rules()
	{
		return [
			[['productImageId'], 'integer', 'skipOnEmpty' => true],
			[['shopId'], 'integer', 'skipOnEmpty' => false]
		];
	}
//
//	public function delete()
//	{
//		if (!$this->productImageId) return false;
//		$productImage = ProductImage::findOne($this->productImageId);
//		try {
//			unlink('uploads/productPhoto/' . $productImage->filename);
//		} catch (\Exception $e) {
//		}
//		$productImage->delete();
//		return true;
//	}

	public function upload()
	{
		$shop = Shop::findOne($this->shopId);
		try {
			unlink('uploads/qrisPhoto/' . $shop->qrisimage);
		} catch (\Exception $e) {
		}
//		if (!isset($this->productImageId)) {
//			$maxOrder = (new Query())->from('product_image')->where(['productid' => $this->productId])->max('`order`');
//			$productImage->order = $maxOrder + 1;
//			$productImage->productid = $this->productId;
//		} else {
//			try {
//				unlink('uploads/productPhoto/' . $productImage->filename);
//			} catch (\Exception $e) {
//			}
//		}
		$fileName = time() . '.' . $this->imageFile->extension;
		$shop->qrisimage = $fileName;
		$shop->save();
		$this->imageFile->saveAs('uploads/qrisPhoto/' . $fileName);
	}

}