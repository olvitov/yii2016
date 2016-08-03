<?php
use app\components\FirstWidget;
use app\components\SecondWidget;
use yii\bootstrap\Modal;
use yii\jui\DatePicker;
/**
 * @var $this yii\web\View
 *
 * @var $hello string
 */

?>
<h1>main/index</h1>

<p>
   <?= $hello ?>
</p>

<?php SecondWidget::begin() ?>
Этот цвет красный

<?php SecondWidget::end() ?>

<?= FirstWidget::widget(
    [
        'a' => 33,
        'b' => 67
    ]
);
Modal::begin([
    'header' => '<h2>Hello world</h2>',
    'toggleButton' => ['label' => 'click me'],
]);

echo 'Say hello...';

Modal::end();
echo '<div align="center">';
echo DatePicker::widget([

    'attribute' => 'from_date',
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
]);
echo '</div>';
?>
