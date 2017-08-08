<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $dept_id
 * @property string $dept_name
 * @property string $dept_description
 *
 * @property Employee[] $employees
 * @property TicketDetails[] $ticketDetails
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dept_id', 'dept_name', 'dept_description'], 'required'],
            [['dept_id'], 'integer'],
            [['dept_description'], 'string'],
            [['dept_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dept_id' => 'Dept ID',
            'dept_name' => 'Dept Name',
            'dept_description' => 'Dept Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['dept_id' => 'dept_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketDetails()
    {
        return $this->hasMany(TicketDetails::className(), ['dept_resp_id' => 'dept_id']);
    }
}
