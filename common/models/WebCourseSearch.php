<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebCourse;

/**
 * WebCourseSearch represents the model behind the search form about `common\models\WebCourse`.
 */
class WebCourseSearch extends WebCourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'viewtotail', 'status', 'created_at', 'updated_at', 'typecourse_id'], 'integer'],
            [['name', 'detail', 'photos'], 'safe'],
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
        $query = WebCourse::find();

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
            'viewtotail' => $this->viewtotail,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'typecourse_id' => $this->typecourse_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'photos', $this->photos]);

        return $dataProvider;
    }
}
