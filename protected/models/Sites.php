<?php
namespace app\models;
use Yii;

/**
 * This is the model class for table "sites".
 */
class Sites extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sites';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['template_id', 'user_id'], 'integer'],
            [['content'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'url' => 'URL',
            'content' => 'Контент',
            'template' => 'Шаблон'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate()
    {
        return $this->hasOne(Templates::className(), ['id' => 'template_id']);
    }
    
    public function generate()
    {
        $dir = \Yii::getAlias('@webroot')."/sites/".$this->id;
        
        if(!is_dir($dir))
            mkdir($dir, 0777, 1);
    
        $files = Files::find()->where('template_id = '.$this->template_id.'')->all();
        foreach($files as $file)
        {
            $f = explode('/', $file->filename);
            $filename = array_pop($f);
            $fdir = implode('/', $f);
            
            if(!is_dir($dir.'/'.$fdir))
                mkdir($dir.'/'.$fdir, 0777, 1);
                
            if(is_dir($file->path))
            {
                var_dump($file->path);
                exit;
            }

            copy($file->path, $dir.'/'.$fdir.'/'.$filename);
        }
        
        $files = SitesFiles::find()->where("site_id = '".$this->id."'")->all();
        foreach($files as $file)
        {
            $fdir = 'files';
            if(!is_dir($dir.'/'.$fdir))
                mkdir($dir.'/'.$fdir, 0777, 1);
                
            copy($file->path, $dir.'/'.$fdir.'/'.$file->filename);
        }
        
        copy('htaccess/.htaccess', $dir.'/.htaccess');
        
        $html = $this->template->template;
        $fields = json_decode($this->content, 1);
        
        foreach($fields as $var => $field) {
            $html = str_replace("{{".$var."}}", $field, $html);
        }
            
        $html = str_replace("templates/".$this->template->title."/", "", $html);
        $html = str_replace("/files/".$this->id, "files", $html);
            
        file_put_contents($dir.'/index.html', $html);
        
        return "/sites/".$this->id."/index.html";
    }
}
