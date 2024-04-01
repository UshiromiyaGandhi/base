<?php

namespace backend\models;

use common\models\ProductImage;
use yii\base\Model;
use yii\db\Exception;
use yii\db\Query;
use yii\web\UploadedFile;

class ProductImageUploadForm extends Model
{
	/**
	 * @var UploadedFile
	 */
	public $imageFile;
	/** @var int */
	public $productImageId;
	/** @var int */
	public $productId;

	public function rules()
	{
		return [
			[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, webp, jpeg'],
			[['productImageId'], 'integer', 'skipOnEmpty' => true],
			[['productId'], 'integer', 'skipOnEmpty' => false]
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
		$productImage = ProductImage::findOne($this->productImageId) ?: new ProductImage();
		if (!isset($this->productImageId)) {
			$maxOrder = (new Query())->from('product_image')->where(['productid' => $this->productId])->max('`order`');
			$productImage->order = $maxOrder + 1;
			$productImage->productid = $this->productId;
		} else {
			try {
				unlink('uploads/productPhoto/' . $productImage->filename);
			} catch (\Exception $e) {
			}
		}
		$fileName = time() . '.' . $this->imageFile->extension;
		$productImage->filename = $fileName;
		$productImage->save();
		$this->imageFile->saveAs('uploads/productPhoto/' . $fileName);
	}

}