<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ticket;

/**
 * TicketSearch represents the model behind the search form about `app\models\ticket`.
 */
class TicketSearch extends ticket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id', 'guest_id', 'room_id', 'emp_create_id'], 'integer'],
            [['date_created'], 'safe'],
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
        $query = ticket::find();

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
            'ticket_id' => $this->ticket_id,
            'guest_id' => $this->guest_id,
            'room_id' => $this->room_id,
            'emp_create_id' => $this->emp_create_id,
            'date_created' => $this->date_created,
        ]);

        return $dataProvider;
    }
}
