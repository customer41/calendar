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

<?php echo Html::a('Предыдущая страница', Yii::$app->session->getFlash('previousPage')); ?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['method' =>'POST', 'action' => '/events/save']); ?>
        <?php echo $form->field($event, 'title'); ?>
        <?php echo $form->field($event, 'description')->textarea(); ?>
        <?php echo $form->field($event, 'start')->textInput(['value' => date('Y-m-d H:i')]); ?>
        <?php echo $form->field($event, 'finish')->textInput(['value' => date('Y-m-d H:i')]); ?>
        <?php echo $form->field($event, 'where'); ?>
        <?php echo $form->field($event, 'repeat')->checkbox(); ?>
        <?php echo $form->field($event, 'block')->checkbox(); ?>
        <?php echo Html::submitButton('Создать', ['class' => 'btn btn-primary']); ?>
    <?php ActiveForm::end(); ?>
</div>