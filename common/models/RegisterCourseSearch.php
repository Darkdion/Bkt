<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RegisterCourse;

/**
 * RegisterCourseSearch represents the model behind the search form about `common\models\RegisterCourse`.
 */
class RegisterCourseSearch extends RegisterCourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'status', 'created_at', 'update_at'], 'integer'],
            [['date_register'], 'safe'],
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
        $query = RegisterCourse::find();

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
            'id' => $this->id,
            'student_id' => $this->student_id,
            'date_register' => $this->date_register,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
        ]);

        return $dataProvider;
    }
}
