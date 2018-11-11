<?php
/**
 * @var $users app\models\MyUser
 */
?>

<div>
    <h1><?php echo \yii\helpers\Html::a('Админ-панель', '/admin/default/index'); ?> | События пользователей</h1>
    <?php foreach ($users as $user): ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">События пользователя: <?php echo $user->username; ?></h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover table-condensed">
                    <tr>
                        <td>Дата</td>
                        <td>Название события</td>
                        <td>Описание события</td>
                        <td>Дата начала</td>
                        <td>Дата завершения</td>
                        <td>Место назначения</td>
                        <td>Повтор события</td>
                        <td>Блокировка события</td>
                    </tr>
                    <?php foreach ($user->events as $event): ?>
                        <tr>
                            <td><?php echo Yii::$app->formatter->asDate($event->start); ?></td>
                            <td><?php echo $event->title; ?></td>
                            <td><?php echo $event->description; ?></td>
                            <td><?php echo Yii::$app->formatter->asDatetime($event->start); ?></td>
                            <td><?php echo Yii::$app->formatter->asDatetime($event->finish); ?></td>
                            <td><?php echo $event->address; ?></td>
                            <td><?php echo $event->isRepeat ? 'Да' : 'Нет'; ?></td>
                            <td><?php echo $event->isBlock ? 'Да' : 'Нет'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</div>