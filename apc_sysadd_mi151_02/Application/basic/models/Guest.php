<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guest".
 *
 * @property integer $guest_id
 * @property string $guest_name
 *
 * @property Ticket[] $tickets
 */
class Guest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guest_id', 'guest_name'], 'required'],
            [['guest_id'], 'integer'],
            [['guest_name'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guest_id' => 'Guest ID',
            'guest_name' => 'Guest Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['guest_id' => 'guest_id']);
    }
}
