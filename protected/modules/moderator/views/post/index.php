<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */
/* @var $posts Post[] */

?>

<script>
    document.getElementById('title').innerHTML = 'Статьи';
</script>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <thead>
    <tr>
        <th class="mdl-data-table__cell--non-numeric">Заголовок</th>
        <th>Автор</th>
        <th>Рейтинг</th>
        <th>Предмет</th>
        <th>Дата</th>
        <th>Комментариев</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($posts as $post){
        $user = User::model()->findByPk($post->user_id);
        $comments = count(Comment::model()->findAllByAttributes(array('post_id'=>$post->id)));
        $subject = Subject::model()->findByPk($post->subject_id);
        ?>
        <tr>
            <td><a href="<?= Yii::app()->createUrl('moderator/post/view', array('id'=>$post->id)); ?>"><?= $post->head; ?></a> </td>
            <td><?= $user->login; ?></td>
            <td><?= $post->rating; ?></td>
            <td><?= $subject->name; ?></td>
            <td><?= date('d.m.Y', $post->date); ?></td>
            <td><?= $comments; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
