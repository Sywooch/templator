<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Source */

$this->title = 'Создать шаблон';
$this->params['breadcrumbs'][] = ['label' => 'Шаблоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="template-create container">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
