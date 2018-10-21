<?php

/* @var $this yii\web\View */
/* @var $count app\controllers\FileIteratorController */

/* @var $executionTime app\controllers\FileIteratorController */

use yii\helpers\Html;

?>

<h1>Чтение текстового файла</h1>

<?= Html::a('Сделать выборку из файла', ['/file-iterator/test'],
    ['class' => 'btn btn-primary btn-lg', 'style' => 'margin: 10px 0 20px 0', 'onclick' => '$("#progress").css("display", "block")']); ?>

<div id="progress" style="display: none">
    <img src="../../web/img/loader.gif">
</div>