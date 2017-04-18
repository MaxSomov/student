<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
/* @var $users User[] */

?>

<script>
    document.getElementById('title').innerHTML = 'Пользователи';
</script>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <thead>
    <tr>
        <th class="mdl-data-table__cell--non-numeric">Имя</th>
        <th>Рейтинг</th>
        <th>Постов</th>
        <th>Комментариев</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $user){
        $posts = count(Post::model()->findAllByAttributes(array('user_id'=>$user->id)));
        $comments = count(Comment::model()->findAllByAttributes(array('user_id'=>$user->id)));
        ?>
        <tr>
            <td><a href="<?= Yii::app()->createUrl('moderator/user/view', array('id'=>$user->id)); ?>"><?= $user->login; ?></a> </td>
            <td><?= $user->rating; ?></td>
            <td><?= $posts; ?></td>
            <td><?= $comments; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>