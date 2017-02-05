<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сайты';
$this->params['breadcrumbs'][] = $this->title;
$pager = $dataProvider->getPagination();

?>
<h1><?= Html::encode($this->title) ?> <?= Html::a('Создать сайт', ['create'], ['class' => 'submit']) ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'title',
        'url',
        [
            'class' => ActionColumn::className(),
            'template' => '{preview} {download} {update} {delete}',
            'buttons' => [
                'preview' => function ($url, $model) {
                    $url = yii\helpers\Url::toRoute(['sites/preview', 'id' => $model->id]);
                
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => \Yii::t('yii', 'Preview'),
                                'data-pjax' => '0',
                    ]);
                },
                'download' => function ($url, $model) {
                    $url = yii\helpers\Url::toRoute(['sites/download', 'id' => $model->id]);
                
                    return Html::a('<span class="glyphicon glyphicon-download-alt"></span>', $url, [
                                'title' => \Yii::t('yii', 'Download'),
                                'data-pjax' => '0',
                    ]);
                },
            ]
        ],
    ],
]) ?>
