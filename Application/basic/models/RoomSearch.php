<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Room;

/**
 * RoomSearch represents the model behind the search form about `app\models\Room`.
 */
class RoomSearch extends Room
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'room_no'], 'integer'],
            [['room_type', 'room_loc'], 'safe'],
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
        $query = Room::find();

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
            'room_no' => $this->room_no,
        ]);

        $query->andFilterWhere(['like', 'room_type', $this->room_type])
            ->andFilterWhere(['like', 'room_loc', $this->room_loc]);

        return $dataProvider;
    }
}
