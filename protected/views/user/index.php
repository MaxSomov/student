<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
/* @var $users User[] */
?>

<h1>Пользователи</h1>

<table>
    <tr>
        <th>Пользователь</th>
        <th>Рейтинг</th>
        <th>Статей</th>
        <th>Лучшая статья</th>
    </tr>
    <?php
    foreach ($users as $user) {
        ?>
        <tr>
            <td><a href="<?= Yii::app()->createUrl('user/view', array('id'=>$user->id)); ?>"><?= $user->login; ?></a></td>
            <td><?= $user->rating ?></td>
            <td></td>
            <td></td>
        </tr>
        <?php
    }
    ?>
</table>
