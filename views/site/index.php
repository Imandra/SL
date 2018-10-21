<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

$this->title = 'Сортировка таблицы';

$this->registerJsFile('https://mottie.github.io/tablesorter/js/jquery.tablesorter.widgets.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('https://mottie.github.io/tablesorter/js/jquery.tablesorter.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile('https://mottie.github.io/tablesorter/css/theme.blue.css',
    ['depends' => [yii\bootstrap\BootstrapAsset::className()]]);

$script = <<< JS
$(function() {
        $("#tablesorter-demo").tablesorter({
            theme : 'blue',
            dateFormat : "ddmmyyyy"           
        });
    });
JS;
$this->registerJs($script, yii\web\View::POS_HEAD);
?>

<div class="site-index">

    <div class="body-content">

        <div class="row">

            <div class="col-lg-12">

                <h1>Сортировка таблицы</h1>

                <table id="tablesorter-demo" class="tablesorter">
                    <thead>
                    <tr>
                        <th data-type="integer">№</th>
                        <th data-type="date">Дата</th>
                        <th data-type="text">Имя</th>
                        <th data-type="decimal">Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>12</td>
                        <td>02.07.2016</td>
                        <td class="name">Иванов Александр</td>
                        <td>600.12</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>13.09.2017</td>
                        <td class="name">Семенов Николай</td>
                        <td>7200.60</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>20.05.2015</td>
                        <td class="name">Антонов Алексей</td>
                        <td>1248.16</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>24.12.2016</td>
                        <td class="name">Алексеев Игорь</td>
                        <td>20.65</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>17.08.2015</td>
                        <td class="name">Потапов Серей</td>
                        <td>12720.00</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>20.01.2015</td>
                        <td class="name">Николаев Иван</td>
                        <td>121.16</td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>25.02.2017</td>
                        <td class="name">Петров Алексей</td>
                        <td>200.50</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>17.09.2016</td>
                        <td class="name">Морозов Сергей</td>
                        <td>100.15</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>25.03.2015</td>
                        <td class="name">Иванов Константин</td>
                        <td>600.25</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>29.04.2017</td>
                        <td class="name">Потапов Андрей</td>
                        <td>3200.00</td>
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>

    </div>

</div>


<?php
Modal::begin([
    'header' => '<h2>Написать нам</h2>',
    'toggleButton' => [
        'label' => 'Обратная связь',
        'tag' => 'a',
        'class' => 'btn btn-primary btn-lg',
        'style' => 'margin-top: 30px'
    ],
]);
?>

    <div class="message-form">

        <?php $form = ActiveForm::begin([
            'action' => '/message/create',
            'method' => 'post',
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'user_message')->textarea(['rows' => 6]) ?>

        <p>Нажимая на кнопку "Отправить", я даю <strong>согласие на обработку моих персональных данных</strong></p>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'style' => 'width: 100%']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php Modal::end(); ?>