<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_variant".
 *
 * @property int $id
 * @property int|null $productid
 * @property string|null $name
 * @property string|null $description
 * @property int|null $stock
 * @property int|null $count
 * @property string|null $image
 *
 * @property OrderItem[] $orderItems
 * @property Product $product
 */
class ProductVariant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_variant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'productid', 'stock', 'count'], 'integer'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'productid' => 'Productid',
            'name' => 'Name',
            'description' => 'Description',
            'stock' => 'Stock',
            'count' => 'Count',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['productvariantid' => 'id']);
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
