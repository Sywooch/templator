<?php
namespace app\models;
use Yii;

/**
 * This is the model class for table "templates".
 */
class Templates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'templates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'schema', 'preview'], 'required'],
            [['template'], 'safe'],
            [['deleted'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'html' => 'Шаблон',
            'schema' => 'Схема',
            'Превью' => 'preview'
        ];
    }
}
