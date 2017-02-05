<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Source */

$this->title = 'Создать сайт';
$this->params['breadcrumbs'][] = ['label' => 'Сайты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="templates-create container">
    <?= $this->render('_form', [
        'model' => $model,
        'fields' => $fields,
        'site_id' => $site_id,
    ]) ?>
</div>
