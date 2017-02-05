<?php
namespace app\models;
use Yii;

/**
 * This is the model class for table "templates_fields".
 */
class Fields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'templates_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['template_id', 'title', 'type'], 'required'],
            [['default_value', 'template_value'], 'safe'],
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
    
    public static function create($field, $t_id, $order = 0, $dir = '')
    {
        $attr = [];
        
        $field = explode('|', $field);
        $title = $field[0];
    
        $f = Fields::find()->where('template_id = '.$t_id.' AND title = "'.$title.'"')->one();
        if(!$f)
            $f = new Fields;
        
        $f->type = 'text';
        $f->order = $order;

        foreach($field as $opt)
        {
            $opt = explode(':', $opt);
            
            if(count($opt) == 1)
            {
                if($opt[0] == 'html')
                    $f->type = 'html';
                    
                if($opt[0] == 'simplehtml')
                    $f->type = 'simplehtml';
                    
                continue;
            }
            
            switch($opt[0])
            {
                case 'tpl':
                    if(file_exists($dir.'/tpls/'.$opt[1].".php"))
                        $f->template_value = rtrim(htmlspecialchars(file_get_contents($dir.'/tpls/'.$opt[1].".php")));
                break;
                case 'default':
                    if(file_exists($dir.'/tpls/'.$opt[1].".php"))
                        $f->default_value = rtrim(htmlspecialchars(file_get_contents($dir.'/tpls/'.$opt[1].".php")));
                break;
                case 'text':
                    $f->default_value = $opt[1];
                break;
                case 'order':
                    $f->order = $opt[1];
                break;
            }
        }
        
        $f->title = $title;
        $f->template_id = $t_id;
        $f->save();
        
        return "var".$f->id."";
    }
    
    public static function cleaning($fields, $t_id)
    {
        $fields = array_map(function ($d) { $d = explode('|', $d)[0]; return "'".$d."'"; }, $fields);
        $old_fields = Fields::find()->where('template_id = '.$t_id.' AND title NOT IN ('.implode(', ', $fields).')')->all();

        foreach($old_fields as $field)
            $field->delete();
            
        return true;
    }
}
