<?php
/* @var $this SubjectController */
/* @var $model Subject */


?>
<script>
    document.getElementById('title').innerHTML = 'Новый предмет';
</script>

<form action="<?= Yii::app()->createUrl('moderator/subject/create'); ?>" method="post">
    <div class="row">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="Subject_name" name="Subject[name]">
            <label class="mdl-textfield__label" for="Subject_name">Название предмета</label>
        </div>
    </div>

    <div class="row buttons">
        <input type="submit" name="yt0" value="Продолжить"
               class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
    </div>
</form>