<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Source */

$this->title = 'Изменить сайт: ' . ' ' . $model->url;
$this->params['breadcrumbs'][] = ['label' => 'Сайты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->url, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="templates-update container">
    <?= $this->render('_form', [
        'model' => $model,
        'fields' => $fields,
        'site_id' => $site_id,
    ]) ?>
</div>
