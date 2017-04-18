<?php
/* @var $this SubjectController */
/* @var $dataProvider CActiveDataProvider */
/* @var $subjects Subject[] */

?>
<script>
    document.getElementById('title').innerHTML = 'Предметы';
</script>

<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" href="<?= Yii::app()->createUrl('moderator/subject/create'); ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">add</i> Новый предмет</a>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <thead>
    <tr>
        <th class="mdl-data-table__cell--non-numeric">Текст</th>
        <th>Автор</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach ($subjects as $subject){
            $posts = count(Post::model()->findAllByAttributes(array('subject_id'=>$subject->id)));
            ?>
            <tr>
                <td><?= $subject->name; ?></td>
                <td><?= $posts; ?></td>
                <td><a href="<?= Yii::app()->createUrl('moderator/subject/update', array('id'=>$subject->id)); ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">mode_edit</i></a> </td>
                <td><a href="<?= Yii::app()->createUrl('moderator/subject/del', array('id'=>$subject->id)); ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i></a> </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>