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
 * @property float|null $cost
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
            [['productid', 'stock', 'count'], 'integer'],
            [['cost'], 'number'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
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
            'productid' => 'Product Id',
            'name' => 'Variant Name',
            'description' => 'Variant Description',
            'stock' => 'Initial Stock',
            'cost' => 'Cost',
            'count' => 'Bought Count',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[OrderItems]].
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
