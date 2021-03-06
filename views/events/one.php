<?php

/**
 * @var $this yii\web\View
 * @var $event \app\models\Event
 */

use yii\helpers\Html;

$this->title = 'Событие';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <h4><?php echo $event->getAttributeLabel('title'); ?>: <?php echo Html::encode($event->title); ?></h4>
    <p><?php echo $event->getAttributeLabel('start'); ?>: <?php echo Yii::$app->formatter->asDatetime($event->start); ?></p>
    <p><?php echo $event->getAttributeLabel('finish'); ?>: <?php echo Yii::$app->formatter->asDatetime($event->finish); ?></p>
    <p><?php echo $event->getAttributeLabel('description'); ?>: <?php echo Html::encode($event->description); ?></p>
    <p><?php echo $event->getAttributeLabel('address'); ?>: <?php echo Html::encode($event->address); ?></p>
    <p><?php echo $event->getAttributeLabel('isRepeat'); ?>:
        <?php if ($event->isRepeat): ?> Да
        <?php else: ?> Нет
        <?php endif; ?>
    </p>
    <p><?php echo $event->getAttributeLabel('isBlock'); ?>:
        <?php if ($event->isBlock): ?> Да
        <?php else: ?> Нет
        <?php endif; ?>
    </p>
</div>

<span><?php echo Html::a('Календарь', '/events/index', ['class' => 'btn btn-primary']); ?>  </span>
<span><?php echo Html::a('Редактировать', '/events/edit?id=' . $event->id, ['class' => 'btn btn-warning']); ?>  </span>
<span><?php echo Html::a('Удалить', '/events/delete?id=' . $event->id, ['class' => 'btn btn-danger']); ?></span>
