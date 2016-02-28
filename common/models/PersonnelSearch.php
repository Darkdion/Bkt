<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Personnel;

/**
 * PersonnelSearch represents the model behind the search form about `common\models\Personnel`.
 */
class PersonnelSearch extends Personnel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_id', 'title', 'sex', 'marital', 'salary', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['firstname', 'lastname', 'identification', 'birthday', 'address', 'province', 'amphur', 'district', 'zip_code', 'expire_date', 'phone'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Personnel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'per_id' => $this->per_id,
            'title' => $this->title,
            'birthday' => $this->birthday,
            'sex' => $this->sex,
            'marital' => $this->marital,
            'salary' => $this->salary,
            'expire_date' => $this->expire_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'identification', $this->identification])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'amphur', $this->amphur])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
