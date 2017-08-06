<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $emp_id
 * @property integer $department_dept_id
 * @property string $position
 *
 * @property Department $departmentDept
 * @property Ticket[] $tickets
 * @property TicketDetails[] $ticketDetails
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_id', 'department_dept_id', 'position'], 'required'],
            [['emp_id', 'department_dept_id'], 'integer'],
            [['position'], 'string', 'max' => 45],
            [['department_dept_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_dept_id' => 'dept_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => 'Emp ID',
            'department_dept_id' => 'Department Dept ID',
            'position' => 'Position',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentDept()
    {
        return $this->hasOne(Department::className(), ['dept_id' => 'department_dept_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['emp_create_id' => 'emp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketDetails()
    {
        return $this->hasMany(TicketDetails::className(), ['emp_resp_id' => 'emp_id', 'dept_resp_id' => 'department_dept_id']);
    }
}
