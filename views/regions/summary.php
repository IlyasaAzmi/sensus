<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Daerah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            // 'created_at:datetime',
            [
                'attribute' => 'personCount',
                'label' => 'Jumlah Penduduk'
            ],
            [
                'label' => 'Total Pendapatan',
                'format' => 'html',
                'value' => function($model) {
                    if ($model->totalIncome){
                        return Yii::$app->formatter->asCurrency($model->totalIncome);
                    } else{
                        return '-';
                    }

                }
            ],
            [
                'label' => 'Rata-rata',
                'format' => 'html',
                'value' => function($model) {
                    if($model->averageIncome){
                        return Yii::$app->formatter->asCurrency($model->averageIncome);
                    } else {
                        return '-';
                    }

                }
            ],
            [
                'label' => 'Status',
                'format' => 'html',
                'value' => function($model) {
                    if ($model->totalIncome < 1700000) {
                        return '<span class="label label-danger">merah</span>';
                    } elseif (($model->totalIncome > 1700000 && $model->totalIncome < 2200000)) {
                        return '<span class="label label-warning">kuning</span>';
                    } else {
                        return '<span class="label label-success">hijau</span>';
                    }
                }
            ],
        ],
    ]); ?>
</div>
