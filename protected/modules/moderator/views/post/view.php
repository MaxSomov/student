<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $comments Comment[] */

?>

<script>
    document.getElementById('title').innerHTML = '<?= $model->head; ?>';
</script>

    <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" href="<?= Yii::app()->createUrl('moderator/post/del', array('id'=>$model->id)); ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i> Удалить статью</a>
<hr>

<?= $model->body; ?>

<hr>

<h4>Комментарии</h4>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <thead>
    <tr>
        <th class="mdl-data-table__cell--non-numeric">Текст</th>
        <th>Автор</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($comments as $comment){
        $user = User::model()->findByPk($comment->user_id);
        ?>
        <tr>
            <td><?= $comment->content; ?></td>
            <td><?= $user->login; ?></td>
            <td><a href="<?= Yii::app()->createUrl('moderator/post/delcomment', array('id'=>$comment->id)); ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i></a> </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
