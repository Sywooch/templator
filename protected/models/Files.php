<?php
namespace app\models;
use Yii;

/**
 * This is the model class for table "templates_files".
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'templates_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['template_id', 'filename', 'path'], 'required'],
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
    
    public static function addNew($dir, $t_id)
    {
        $dirs = ['css', 'images', 'js', 'fonts'];
        
        foreach($dirs as $d)
        {
            if(is_dir($dir.'/'.$d) && $handle = opendir($dir.'/'.$d))
                while ($file = readdir($handle)) 
                {
                    if($file == '.' OR $file == '..')
                        continue;
                        
                    $filename = $d."/".$file;
                    $f = Files::find()->where('template_id = '.$t_id.' AND filename = "'.$filename.'"')->one();
                    if(!$f)
                    {
                        $f = new Files;
                        $f->template_id = $t_id;
                        $f->filename = $filename;
                        $f->path = $dir."/".$filename;
                        $f->save();
                    }
                }
        }
    }
    
    public static function deleteUnexisted($dir, $t_id)
    {
        $files = Files::find()->where('template_id = '.$t_id)->all();
        foreach($files as $file)
            if(!file_exists($file->path))
                $file->delete();
    }
}
