<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_details".
 *
 * @property integer $ticket_det_id
 * @property string $status
 * @property string $time_start
 * @property string $time_end
 * @property string $desc
 * @property integer $emp_resp_id
 * @property integer $category_id
 * @property integer $ticket_id
 * @property integer $dept_resp_id
 *
 * @property Category $category
 * @property Department $deptResp
 * @property Employee $empResp
 * @property Ticket $ticket
 */
class TicketDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_det_id', 'status', 'emp_resp_id', 'category_id', 'ticket_id', 'dept_resp_id'], 'required'],
            [['ticket_det_id', 'emp_resp_id', 'category_id', 'ticket_id', 'dept_resp_id'], 'integer'],
            [['time_start', 'time_end'], 'safe'],
            [['desc'], 'string'],
            [['status'], 'string', 'max' => 45],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['dept_resp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['dept_resp_id' => 'dept_id']],
            [['emp_resp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['emp_resp_id' => 'emp_id']],
            [['ticket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ticket::className(), 'targetAttribute' => ['ticket_id' => 'ticket_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ticket_det_id' => 'Ticket Det ID',
            'status' => 'Status',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
            'desc' => 'Desc',
            'emp_resp_id' => 'Emp Resp ID',
            'category_id' => 'Category ID',
            'ticket_id' => 'Ticket ID',
            'dept_resp_id' => 'Dept Resp ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeptResp()
    {
        return $this->hasOne(Department::className(), ['dept_id' => 'dept_resp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpResp()
    {
        return $this->hasOne(Employee::className(), ['emp_id' => 'emp_resp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Ticket::className(), ['ticket_id' => 'ticket_id']);
    }
}
