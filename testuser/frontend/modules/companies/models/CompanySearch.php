<?php

namespace frontend\modules\companies\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Company;

/**
 * CompanySearch represents the model behind the search form of `common\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'phone'], 'integer'],
            [['namecompany', 'address'], 'safe'],
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
        $query = Company::find();

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
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'namecompany', $this->namecompany])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
