<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_desc
 *
 * @property TicketDetails[] $ticketDetails
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'category_name', 'category_desc'], 'required'],
            [['category_id'], 'integer'],
            [['category_name'], 'string', 'max' => 45],
            [['category_desc'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'category_desc' => 'Category Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketDetails()
    {
        return $this->hasMany(TicketDetails::className(), ['category_id' => 'category_id']);
    }
}
