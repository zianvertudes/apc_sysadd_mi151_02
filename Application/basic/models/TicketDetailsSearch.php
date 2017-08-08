<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TicketDetails;

/**
 * TicketDetailsSearch represents the model behind the search form about `app\models\TicketDetails`.
 */
class TicketDetailsSearch extends TicketDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_det_id', 'emp_resp_id', 'category_id', 'ticket_id', 'dept_resp_id'], 'integer'],
            [['status', 'time_start', 'time_end', 'desc'], 'safe'],
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
        $query = TicketDetails::find();

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
            'ticket_det_id' => $this->ticket_det_id,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'emp_resp_id' => $this->emp_resp_id,
            'category_id' => $this->category_id,
            'ticket_id' => $this->ticket_id,
            'dept_resp_id' => $this->dept_resp_id,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'desc', $this->desc]);

        return $dataProvider;
    }
}
