<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property int $id
 * @property int|null $userid
 * @property string|null $name
 * @property string|null $description
 * @property string|null $profileimage
 * @property int $active
 *
 * @property Product[] $products
 * @property User $user
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'active'], 'integer'],
            [['name', 'description', 'profileimage'], 'string', 'max' => 255],
            [['userid'], 'unique'],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'name' => 'Name',
            'description' => 'Description',
            'profileimage' => 'Profileimage',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['sellerId' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'userid']);
    }
}
