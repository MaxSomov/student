<?php
/* @var $this UserController */
/* @var $model User */
/* @var $comments */
/* @var $posts Post[] */
?>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <main class="mdl-layout__content">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--1-col graybox"><img src="/images/<?= $model->image; ?>" width="90%"></div>
            <div class="mdl-cell mdl-cell--10-col graybox">
                <div class="row"><h3 style="margin: 0 0 0 0;"><?= $model->login; ?></h3></div>
                <div class="row"><a href="mailto:<?= $model->email; ?>"><?= $model->email; ?></a></div>
                <div class="row">Рейтинг: <?= $model->rating; ?></div>
                <div class="row">Статей: <?= count($posts); ?></div>
                <div class="row">Комментариев: <?= $comments; ?></div>
            </div>
            <?php
            foreach ($posts as $post) {
                ?>

                <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp mdl-cell mdl-cell--10-col">
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
        </div>

    </main>

</div>

