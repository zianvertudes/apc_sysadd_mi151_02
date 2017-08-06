<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $dept_id
 *
 * @property Employee[] $employees
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
            [['dept_id'], 'required'],
            [['dept_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dept_id' => 'Dept ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['department_dept_id' => 'dept_id']);
    }
}
