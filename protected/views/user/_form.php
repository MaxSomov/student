<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">
    <form id="user-form" action="<?= Yii::app()->createUrl('user/create'); ?>" method="post">
        <div class="row">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="User[login]" id="User_login">
                <label class="mdl-textfield__label" for="User_login">Логин</label>
            </div>
        </div>

        <div class="row">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="email" name="User[email]" id="User_email">
                <label class="mdl-textfield__label" for="User_email">E-mail</label>
            </div>
        </div>

        <div class="row">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="User[password]" id="User_password">
                <label class="mdl-textfield__label" for="User_password">Пароль</label>
            </div>
        </div>

        <div class="row buttons">
            <input type="submit" name="yt0" value="Продолжить" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
        </div>
    </form>
</div>
