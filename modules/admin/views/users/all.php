<?php
/**
 * @var $users app\models\MyUser
 */
?>

<div>
    <h1><?php echo \yii\helpers\Html::a('Админ-панель', '/admin/default/index'); ?> | Пользователи</h1>
    <p><?php echo \yii\helpers\Html::a('Создать', '/admin/users/create', ['class' => 'btn btn-success']); ?></p>
    <table class="table table-bordered table-hover table-condensed">
        <tr>
            <td>ID</td>
            <td>Имя пользователя</td>
            <td>E-mail</td>
            <td>Статус</td>
            <td>Зарегистрирован</td>
            <td></td>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->status; ?></td>
                <td><?php echo Yii::$app->formatter->asDatetime($user->created); ?></td>
                <td><?php echo \yii\helpers\Html::a('Удалить', '/admin/users/delete?id=' . $user->id, ['class' => 'btn btn-danger']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
