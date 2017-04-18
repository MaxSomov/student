<?php
/* @var $this SiteController */
/* @var $posts Post[] */

$this->pageTitle = Yii::app()->name;
?>
    <ol class="breadcrumb">
        <li class="active">Главная</li>
    </ol>


<?php
foreach ($posts as $post) {
    ?>

    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
        <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__supporting-text">
                <h4><?= $post->head; ?></h4>
                <?= $post->body; ?>
            </div>
            <hr>
            <div class="mdl-card__actions">
                <a href="<?= Yii::app()->createUrl('post/view', array('id' => $post->id)); ?>">Читать далее...</a>
            </div>
        </div>
    </section>
    <br>
    <?php
}
?>