<?php

/**
 * @var $this yii\web\View
 * @var $event \app\models\Event
 */

use yii\helpers\Html;

$this->title = 'Событие';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo Html::a('Предыдущая страница', Yii::$app->session->getFlash('previousPage')); ?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <h2><?php echo $event->getAttributeLabel('title'); ?>: <?php echo $event->title; ?></h2>
    <p><?php echo $event->getAttributeLabel('start'); ?>: <?php echo $event->start; ?></p>
    <p><?php echo $event->getAttributeLabel('finish'); ?>: <?php echo $event->finish; ?></p>
    <p><?php echo $event->getAttributeLabel('description'); ?>: <?php echo $event->description; ?></p>
    <p><?php echo $event->getAttributeLabel('where'); ?>: <?php echo $event->where; ?></p>
    <p><?php echo $event->getAttributeLabel('repeat'); ?>:
        <?php if ($event->repeat): ?> Да
        <?php else: ?> Нет
        <?php endif; ?>
    </p>
    <p><?php echo $event->getAttributeLabel('block'); ?>:
        <?php if ($event->block): ?> Да
        <?php else: ?> Нет
        <?php endif; ?>
    </p>
</div>
