<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property string $date
 * @property string $description
 * @property int $user_id
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date'], 'required'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            // [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
            'description' => 'Description',
            'user_id' => 'User ID',
        ];
    }
}
