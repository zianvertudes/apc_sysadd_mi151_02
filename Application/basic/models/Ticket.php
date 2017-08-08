<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $ticket_id
 * @property integer $guest_id
 * @property integer $room_id
 * @property integer $emp_create_id
 * @property string $date_created
 *
 * @property Employee $empCreate
 * @property Guest $guest
 * @property Room $room
 * @property TicketDetails[] $ticketDetails
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id', 'guest_id', 'room_id', 'emp_create_id', 'date_created'], 'required'],
            [['ticket_id', 'guest_id', 'room_id', 'emp_create_id'], 'integer'],
            [['date_created'], 'safe'],
            [['emp_create_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['emp_create_id' => 'emp_id']],
            [['guest_id'], 'exist', 'skipOnError' => true, 'targetClass' => Guest::className(), 'targetAttribute' => ['guest_id' => 'guest_id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'room_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ticket_id' => 'Ticket ID',
            'guest_id' => 'Guest ID',
            'room_id' => 'Room ID',
            'emp_create_id' => 'Emp Create ID',
            'date_created' => 'Date Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpCreate()
    {
        return $this->hasOne(Employee::className(), ['emp_id' => 'emp_create_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuest()
    {
        return $this->hasOne(Guest::className(), ['guest_id' => 'guest_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['room_id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketDetails()
    {
        return $this->hasMany(TicketDetails::className(), ['ticket_id' => 'ticket_id']);
    }
}
