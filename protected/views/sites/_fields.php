<?php   
use yii\helpers\Html;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Url;

$return = [];
foreach($fields as $field)
{
    $value = '';
    if(!empty($field->default_value))
        $value = $field->default_value;
    if(!empty($f['var'.$field->id]))
        $value = $f['var'.$field->id];

    $label = '<label class="control-label" for="var'.$field->id.'">'.$field->title.'</label>';

    $tpl = '';
    if(!empty($field->template_value))
        $tpl = '<input type="hidden" value="'.$field->template_value.'" id="tplvar'.$field->id.'" class="sites__tpl_field">';

    $input = '';
    switch($field->type)
    {
        case 'html':
            $input = Html::textarea('Field[var'.$field->id.']', htmlspecialchars_decode($value), ['class' => 'ckeditor4', 'id' => 'var'.$field->id, 'rows' => '20']);     
        break;
        case 'simplehtml':
            $input = Html::textarea('Field[var'.$field->id.']', htmlspecialchars_decode($value), ['class' => 'form-control', 'id' => 'var'.$field->id, 'rows' => '20']);     
        break;
        default:
            $input = '<input class="form-control" id="var'.$field->id.'" type="text" value="'.$value.'" name="Field[var'.$field->id.']">';
        break;
    }
    
    $return[] = "<div class='form-group'>\n".$label."\n".$input."\n".$tpl."\n"."</div>";
}

echo implode("\n", $return);
?>
