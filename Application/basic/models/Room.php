<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $room_id
 * @property string $room_type
 * @property string $room_loc
 *
 * @property Ticket[] $tickets
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id', 'room_type', 'room_loc'], 'required'],
            [['room_id'], 'integer'],
            [['room_type', 'room_loc'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'room_id' => 'Room ID',
            'room_type' => 'Room Type',
            'room_loc' => 'Room Loc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['room_id' => 'room_id']);
    }
}
