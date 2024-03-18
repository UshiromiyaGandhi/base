<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductVariant;

/**
 * ProductVariantSearch represents the model behind the search form of `common\models\ProductVariant`.
 */
class ProductVariantSearch extends ProductVariant
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'productid', 'stock', 'count'], 'integer'],
            [['name', 'description', 'image'], 'safe'],
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
    public function search($params, $productId)
    {
        $query = ProductVariant::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'productid' => $this->productid,
            'stock' => $this->stock,
            'count' => $this->count,
        ]);

	    $query->andFilterWhere([
			'productId' => $productId
	    ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
