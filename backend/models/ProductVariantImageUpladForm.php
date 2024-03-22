<?php

namespace backend\models;

use common\models\ProductVariant;
use common\models\Shop;
use yii\base\Model;
use yii\db\Exception;
use yii\web\UploadedFile;

class ProductVariantImageUpladForm extends Model
{
	/**
	 * @var UploadedFile
	 */
	public $imageFile;

	public function rules()
	{
		return [
			[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
		];
	}

	/** @param $productVariant ProductVariant */
	public function upload($productVariant)
	{
		$this->validate();
		$fileName = time() . '.' . $this->imageFile->extension;
		try {
			unlink('uploads/productVariantPhoto/' . $productVariant->image);
		} catch (\Exception $e) {}
		$productVariant->image = $fileName;
		$productVariant->save();
		$this->imageFile->saveAs('uploads/profilephoto/' . $fileName);
	}

}