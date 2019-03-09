<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Sensus Penduduk</h2>

        <p class="lead">Selamat Datang</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::toRoute(['regions/summary']);?>">Summary Data Daerah</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong><?php echo Yii::t('app', 'Penduduk');?></strong></div>
                    <div class="panel-body">
                        <p><br />
                            <a class="btn btn-default" href="<?= Url::toRoute(['person/index']);?>">Data Penduduk &raquo;</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong><?php echo Yii::t('app', 'Daerah');?></strong></div>
                    <div class="panel-body">
                        <p><br />
                            <a class="btn btn-default" href="<?= Url::toRoute(['regions/index']);?>">Data Penduduk &raquo;</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
