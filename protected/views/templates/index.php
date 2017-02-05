<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Шаблоны';
$this->params['breadcrumbs'][] = $this->title;
$pager = $dataProvider->getPagination();

?>
<h1><?= Html::encode($this->title) ?> <?= Html::a('Обновить', ['update'], ['class' => 'submit']) ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'title',
        [
            'class' => ActionColumn::className(),
            'template' => '',
        ],
    ],
]) ?>
