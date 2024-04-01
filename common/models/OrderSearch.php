<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Order;

/**
 * OrderSearch represents the model behind the search form of `common\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['phonenum', 'address'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Order::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


//		$query
//			->innerJoin('order_item', '`order`.id = `order_item`.orderid')
//			->innerJoin('product_variant', '`order_item`.productvariantid = `product_variant`.id')
//			->innerJoin('product', '`product_variant`.productid = `product`.id');


        $query->andFilterWhere([
            'id' => $this->id,
        ]);

//	    $query->andFilterWhere([ 'or',
//			'product.sellerid' => \Yii::$app->user->identity->shop->id,
//		]);
        $query->andFilterWhere(['like', 'phonenum', $this->phonenum])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
