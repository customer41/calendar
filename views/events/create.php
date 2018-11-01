<?php

/**
 * @var $this yii\web\View
 * @var $event \app\models\Event
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Создание события';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo Html::a('Календарь', '/events/index', ['class' => 'btn btn-primary']); ?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['method' =>'POST', 'action' => '/events/create']); ?>
        <?php echo $form->field($event, 'title'); ?>
        <?php echo $form->field($event, 'description')->textarea(); ?>
        <?php echo $form->field($event, 'start')->textInput(['value' => date('Y-m-d H:i')]); ?>
        <?php echo $form->field($event, 'finish')->textInput(['value' => date('Y-m-d H:i')]); ?>
        <?php echo $form->field($event, 'address'); ?>
        <?php echo $form->field($event, 'isRepeat')->checkbox(); ?>
        <?php echo $form->field($event, 'isBlock')->checkbox(); ?>
        <?php echo Html::submitButton('Создать', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end(); ?>
</div>