<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $user_message
 * @property string $create_time
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'create_time', 'user_message'], 'required'],
            ['email', 'email'],
            [['user_message'], 'string'],
            [['create_time'], 'safe'],
            [['username', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя',
            'email' => 'Электронная почта',
            'user_message' => 'Сообщение',
            'create_time' => 'Создано',
        ];
    }
}
