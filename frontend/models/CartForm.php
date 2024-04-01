<?php

namespace frontend\models;

use common\models\Order;
use common\models\OrderItem;
use common\models\OrderItemProduct;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\UploadedFile;

class CartForm extends Model
{
	/* @var string */
	public $fullName;
	/* @var string */
	public $phoneNum;
	/* @var string */
	public $address;
	/* @var string */
	public $pesan;
	/* @var int */
	public $count;
	/* @var UploadedFile */
	public $buktiPembayaran;

	public function rules()
	{
		return [
			[['fullName', 'phoneNum', 'address', 'pesan'], 'string'],
			[['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, webp, jpeg'],
		];
	}

	public function save($productId)
	{
		$fileName = time() . '.' . $this->buktiPembayaran->extension;
		$order = new Order();
		$order->fullname = $this->fullName;
		$order->phonenum = $this->phoneNum;
		$order->address = $this->address;
		$order->message = $this->pesan;
		$order->processed = 0;
		$order->paymentproof = $fileName;
		$order->save();

		$this->buktiPembayaran->saveAs('uploads/paymentProof/' . $fileName);
//		echo 'uploads/paymentProof/' . $fileName;
//		die();

		$orderItem = new OrderItemProduct();
		$orderItem->orderid = $order->id;
		$orderItem->productid = $productId;
		$orderItem->count = 1;

		$orderItem->save();
	}
}