<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Templates;

/* @var $this yii\web\View */
/* @var $model app\models\Source */
/* @var $form yii\widgets\ActiveForm */

dosamigos\ckeditor\CKEditorAsset::register($this);
?>

<div class="source-form form-vertical">

    <?php $form = ActiveForm::begin(['enableClientScript' => false]); ?>
    <input type="hidden" id="site__id" name="site_id" value="<?=$site_id;?>">
    <div class="col-md-4">
        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'url')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'template_id')->dropDownList(ArrayHelper::map(Templates::find()->all(), 'id', 'title'), ['prompt' => 'Выберите', 'id' => 'sites__template']) ?>

        <div class="form-group submit-panel">
            <span class="submit input">
                <?= Html::input("submit", "submit", $model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?= Html::input("submit", "submit", 'Сохранить и выйти', ['class' => 'btn btn-primary']) ?>
            </span>
        </div>
    </div>
    <div class="col-md-8" id="sites__tpl_description">
        
    </div>

    
    <div class="col-md-12" id="sites__field_list">
        <?=$fields;?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
