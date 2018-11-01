<?php

/**
 * @var $this yii\web\View
 * @var $events app\models\Event|array
 */

use yii\helpers\Html;

$this->title = 'Календарь событий';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php echo Html::a('Создать', '/events/create', ['class' => 'btn btn-success']); ?>

<?php if (empty($events)): ?>
    <h2>Пока не создано ни одного события...</h2>
<?php else: ?>
    <h2>Календарь событий</h2>
    <table class="table table-bordered table-hover table-condensed">
        <tr>
            <td><?php echo 'Дата'; ?></td>
            <td><?php echo $events[0]->getAttributeLabel('title'); ?></td>
            <td><?php echo $events[0]->getAttributeLabel('description'); ?></td>
            <td><?php echo $events[0]->getAttributeLabel('start'); ?></td>
            <td><?php echo $events[0]->getAttributeLabel('finish'); ?></td>
            <td><?php echo $events[0]->getAttributeLabel('address'); ?></td>
            <td><?php echo $events[0]->getAttributeLabel('isRepeat'); ?></td>
            <td><?php echo $events[0]->getAttributeLabel('isBlock'); ?></td>
        </tr>
        <?php foreach ($events as $event): ?>
            <tr>
                <td>
                    <span class="glyphicon glyphicon-calendar">
                        <?php echo date('d-m-Y', strtotime($event->start)); ?>
                    </span>
                </td>
                <td>
                    <?php echo Html::a($event->title, '/events/one?id=' . $event->id); ?>
                    <?php echo Html::a('<span class="glyphicon glyphicon-edit"></span>', '/events/edit?id=' . $event->id); ?>
                    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span>', '/events/delete?id=' . $event->id); ?>
                </td>
                <td><?php echo $event->description; ?></td>
                <td><?php echo date('d-m-Y H:i', strtotime($event->start)); ?></td>
                <td><?php echo date('d-m-Y H:i', strtotime($event->finish)); ?></td>
                <td><?php echo $event->address; ?></td>
                <td><?php echo $event->isRepeat ? 'Да' : 'Нет'; ?></td>
                <td><?php echo $event->isBlock ? 'Да' : 'Нет'; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
