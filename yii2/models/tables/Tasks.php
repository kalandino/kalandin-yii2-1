<?php

namespace app\models\tables;

use Yii;
use app\behaviors\UpdateBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\imagine\Image;

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
     * @var UploadedFile
     */
    public $image;

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
            [['end'], 'safe'],
            [['description'], 'string'],
            [['image'], 'file', 'extensions' => 'jpg, png'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            // [['user_id'], 'unique'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $baseName = $this->image->getBaseName() . "." . $this->image->getExtension();
            $fileName = '@webroot/img/' . $baseName;
            $this->image->saveAs(\Yii::getAlias($fileName));
            Image::thumbnail($fileName, 120, 80)
                ->save(\Yii::getAlias('@webroot/img/small/' . $baseName));
        }
        return false;
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
            'end' => 'End',
            'description' => 'Description',
            'image' => 'Image',
            'user_id' => 'User ID',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_time', 'update_time'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time'],
                ],
            ],
        ];
    }
}
