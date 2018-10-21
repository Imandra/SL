<?php

namespace app\controllers;

use Yii;
use app\components\FileIterator;

class FileIteratorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest()
    {
        $start_memory = memory_get_usage();
        $start_time = microtime(true);

        $fileIterator = new FileIterator(__DIR__ . '/../files/text.txt');
        $fileIterator->rewind();

        $count = 0;
        while ($count < 10000) {
            $randomNum = mt_rand(0, 14500);
            $fileIterator->seek($randomNum);
            $count++;
        }

        $end_time = microtime(true);
        $execution_time = round($end_time - $start_time, 3);
        $end_memory = memory_get_usage();
        $allocated_memory = round(($end_memory - $start_memory) / 1048576, 3);

        Yii::$app->session->setFlash('success', 'Выборка ' . $count .
            ' случайных записей завершена. Время выполнения: ' . $execution_time .
            ' секунд. Выделенная память: ' . $allocated_memory . ' Mбайт.');

        return $this->redirect('index');
    }
}
