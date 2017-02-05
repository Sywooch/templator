<?php
namespace app\models;
use Yii;

/**
 * This is the model class for table "sites_files".
 */
class SitesFiles extends \yii\db\ActiveRecord
{
    public $upload;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sites_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename', 'path'], 'required'],
            [['site_id', 'tmp_site_id'], 'safe'],
            [['upload'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        ];
    }
}
