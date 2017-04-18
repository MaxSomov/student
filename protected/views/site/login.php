<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Login';
?>

<ol class="breadcrumb">
    <li><a href="index.php">Главная</a> </li>
    <li class="active">Вход</li>
</ol>

<h1>Вход</h1>

<div class="form">
    <form id="login-form" action="<?= Yii::app()->createUrl('site/login'); ?>" method="post">

        <div class="row">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="LoginForm[username]" id="LoginForm_username" autocomplete="off">
                <label class="mdl-textfield__label" for="LoginForm_username">Логин</label>
            </div>
        </div>

        <div class="row">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" name="LoginForm[password]" id="LoginForm_password" autocomplete="off">
                <label class="mdl-textfield__label" for="LoginForm_password">Пароль</label>
            </div>
        </div>

        <div class="row rememberMe">
            <input id="ytLoginForm_rememberMe" type="hidden" value="0" name="LoginForm[rememberMe]">
            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="LoginForm_rememberMe">
                <input type="checkbox" id="LoginForm_rememberMe" value="1" name="LoginForm[rememberMe]" class="mdl-switch__input">
                <span class="mdl-switch__label">Запомнить меня</span>
            </label>
        </div>

        <br>
        <div class="row buttons">
            <input type="submit" name="yt0" value="Вход" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
        </div>
    </form>
</div>