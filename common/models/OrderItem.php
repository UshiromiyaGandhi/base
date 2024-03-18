<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int|null $orderid
 * @property int|null $productvariantid
 * @property int|null $count
 *
 * @property Order $order
 * @property ProductVariant $productvariant
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderid', 'productvariantid', 'count'], 'integer'],
            [['orderid'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['orderid' => 'id']],
            [['productvariantid'], 'exist', 'skipOnError' => true, 'targetClass' => ProductVariant::class, 'targetAttribute' => ['productvariantid' => 'id']],
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
            'productvariantid' => 'Productvariantid',
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
     * Gets query for [[Productvariant]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductvariant()
    {
        return $this->hasOne(ProductVariant::class, ['id' => 'productvariantid']);
    }
}
