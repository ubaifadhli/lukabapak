<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MovieReservation;

/**
 * MovieReservationSearch represents the model behind the search form of `frontend\models\MovieReservation`.
 */
class MovieReservationSearch extends MovieReservation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'movie_schedule_id', 'quantity'], 'integer'],
            [['date'], 'safe'],
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
        $query = MovieReservation::find();

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
            'movie_schedule_id' => $this->movie_schedule_id,
            'quantity' => $this->quantity,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
