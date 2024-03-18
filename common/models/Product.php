<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $sellerId
 * @property string|null $name
 * @property string|null $description
 * @property int $active
 *
 * @property ProductImage[] $productImages
 * @property ProductVariant[] $productVariants
 * @property Shop $seller
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sellerId'], 'required'],
            [['sellerId'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['sellerId'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::class, 'targetAttribute' => ['sellerId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sellerId' => 'Seller ID',
            'name' => 'Name',
            'description' => 'Description',
	        'active' => 'Active'
        ];
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::class, ['productid' => 'id']);
    }

    /**
     * Gets query for [[ProductVariants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductVariants()
    {
        return $this->hasMany(ProductVariant::class, ['productid' => 'id']);
    }

    /**
     * Gets query for [[Seller]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeller()
    {
        return $this->hasOne(Shop::class, ['id' => 'sellerId']);
    }
}
