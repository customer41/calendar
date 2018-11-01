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
 * @property string $created
 * @property int $userId
 *
 * @property User $user
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
            [['title', 'userId'], 'required'],
            [['description'], 'string'],
            [['start', 'finish', 'created'], 'safe'],
            [['isRepeat', 'isBlock', 'userId'], 'integer'],
            [['title', 'address'], 'string', 'max' => 255],
            //[['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
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
            'created' => Yii::t('app', 'Created'),
            'userId' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
