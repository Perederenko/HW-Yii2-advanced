<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tags}}".
 *
 * @property integer $id
 * @property string $title
 *
 * @property TagProduct[] $tagProducts
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tags}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagProducts()
    {
        return $this->hasMany(TagProduct::className(), ['tag_id' => 'id']);
    }
}
