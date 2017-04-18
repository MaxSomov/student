<?php
/* @var $this UserController */
/* @var $model User */
 ?>

<script>
    document.getElementById('title').innerHTML = '<?= $model->login; ?>';
</script>

<div class="row">
    <h4>Избражение пользователя</h4>
    <img src="/images/<?= $model->image; ?>" width="100px">
</div>
<div class="row">
    <a class="mdl-button mdl-js-button mdl-button--raised" href="<?= Yii::app()->createUrl('moderator/user/delimg', array('id'=>$model->id)); ?>"> Удалить изображение</a>
</div>
<hr>
<div class="row">
    <h4>Информация о пользователе</h4>
    <?= $model->info; ?>
</div>
<div class="row">
    <a class="mdl-button mdl-js-button mdl-button--raised" href="<?= Yii::app()->createUrl('moderator/user/delinfo', array('id'=>$model->id)); ?>"> Удалить информацию</a>
</div>
<hr>
<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" href="<?= Yii::app()->createUrl('moderator/user/del', array('id'=>$model->id)); ?>">
    Удалить пользователя
</a>