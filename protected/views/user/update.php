<?php
/* @var $this UserController */
/* @var $model User */
?>

<h1>Редактирование информации</h1>

<div class="form">
    <form enctype="multipart/form-data" id="user-form" action="<?= Yii::app()->createUrl('user/update', array('id'=>$model->id)); ?>" method="post">

        <div class="row">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" value="<?= $model->email; ?>" type="email" name="User[email]" id="User_email">
                <label class="mdl-textfield__label" for="User_email">E-mail</label>
            </div>
        </div>

        <div class="row">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea rows="6" class="mdl-textfield__input" type="text" name="info" id="User_info"><?= $model->info; ?></textarea>
                <label class="mdl-textfield__label" for="User_info">Информация о себе</label>
            </div>
        </div>

        <div class="row">
            <input type="file" name="image">
        </div><br>

        <div class="row buttons">
            <input type="submit" name="yt0" value="Сохранить" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
        </div>
    </form>
</div>