<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room1".
 *
 * @property integer $id
 * @property string $room_type
 * @property string $room_loc
 *
 * @property CheckIn[] $checkIns
 */
class Room1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_type', 'room_loc'], 'required'],
            [['room_type', 'room_loc'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_type' => 'Room Type',
            'room_loc' => 'Room Loc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckIns()
    {
        return $this->hasMany(CheckIn::className(), ['room_id' => 'id']);
    }
}
