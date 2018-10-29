<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%events}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $start
 * @property string $finish
 * @property string $address
 * @property int $isRepeat
 * @property int $isBlock
 */
class EventBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%events}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['start', 'finish'], 'safe'],
            [['isRepeat', 'isBlock'], 'integer'],
            [['title', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'start' => Yii::t('app', 'Start'),
            'finish' => Yii::t('app', 'Finish'),
            'address' => Yii::t('app', 'Address'),
            'isRepeat' => Yii::t('app', 'Is Repeat'),
            'isBlock' => Yii::t('app', 'Is Block'),
        ];
    }
}
