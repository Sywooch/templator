<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Source */

$this->title = 'Изменить шаблон: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Шаблоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="temlate-update container">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
