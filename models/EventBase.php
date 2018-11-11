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
 * @property string $updated
 * @property int $userId
 *
 * @property MyUser $user
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
            [['start', 'finish', 'created', 'updated'], 'safe'],
            [['isRepeat', 'isBlock', 'userId'], 'integer'],
            [['title', 'address'], 'string', 'max' => 255],
            //[['userId'], 'exist', 'skipOnError' => true, 'targetClass' => MyUser::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'start' => 'Start',
            'finish' => 'Finish',
            'address' => 'Address',
            'isRepeat' => 'Is Repeat',
            'isBlock' => 'Is Block',
            'created' => 'Created',
            'updated' => 'Updated',
            'userId' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(MyUser::className(), ['id' => 'userId']);
    }
}
