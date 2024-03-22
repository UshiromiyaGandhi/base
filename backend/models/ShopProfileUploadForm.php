<?php

namespace backend\models;

use common\models\Shop;
use yii\base\Model;
use yii\db\Exception;
use yii\web\UploadedFile;

class ShopProfileUploadForm extends Model
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

	/** @param $shopModel Shop */
	public function upload($shopModel)
	{
		$this->validate();
		$fileName = time() . '.' . $this->imageFile->extension;
		try {
			unlink('uploads/profilephoto/' . $shopModel->profileimage);
		} catch (\Exception $e) {}
		$shopModel->profileimage = $fileName;
		$shopModel->save();
		$this->imageFile->saveAs('uploads/profilephoto/' . $fileName);
	}

}