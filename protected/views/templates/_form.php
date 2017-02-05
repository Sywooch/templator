<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Source */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="template-form form-vertical">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <div class="form-group submit-panel">
        <span class="submit input">
            <?= Html::input("submit", "submit", $model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </span>
    </div>
    <?= $form->field($model, 'id')->hiddenInput()->label('') ?>
    <?php ActiveForm::end(); ?>
</div>
