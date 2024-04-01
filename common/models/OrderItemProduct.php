<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_item_product".
 *
 * @property int $id
 * @property int|null $orderid
 * @property int|null $productid
 * @property int|null $count
 *
 * @property Order $order
 * @property Product $product
 */
class OrderItemProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderid', 'productid', 'count'], 'integer'],
            [['orderid'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['orderid' => 'id']],
            [['productid'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['productid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderid' => 'Orderid',
            'productid' => 'Productid',
            'count' => 'Count',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'orderid']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'productid']);
    }
}
