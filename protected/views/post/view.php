<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $bookmark */
/* @var $comments Comment[] */
/* @var $author User */
/* @var $subject Subject */

?>

<ol class="breadcrumb">
    <li><a href="index.php">Главная</a> </li>
    <li><a href="<?= Yii::app()->createUrl('subject/'); ?>">Предметы</a></li>
    <li><a href="<?= Yii::app()->createUrl('subject/view', array('id'=>$subject->id)); ?>"><?= $subject->name; ?></a></li>
    <li class="active"><?= $model->head; ?></li>
</ol>

<link rel="stylesheet" href="/mdl/styles-blog.css">
<div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
    <main class="mdl-layout__content">
        <div class="demo-blog__posts mdl-grid" style="margin-left: 0">
            <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col ">
                <div class="mdl-card__media mdl-color-text--grey-50">
                    <h3><?= $model->head; ?></h3>
                </div>
                <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                    <div class="minilog"><img src="/images/<?= $author->image; ?>" height="44px"></div>
                    <div>
                        <strong><a href="<?= Yii::app()->createUrl('user/view', array('id'=>$author->id)); ?>"><?= $author->login; ?></a></strong>
                        <span><?= date('d.m.Y', $model->date); ?></span>
                    </div>
                    <div class="section-spacer"></div>
                    <div class="meta__favorites">
                        <a href="<?= Yii::app()->createUrl('post/ratingplus', array('id'=>$model->id)) ?>" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">thumb_up</i>
                        </a>
                        <b><?= $model->rating; ?></b>
                        <a href="<?= Yii::app()->createUrl('post/ratingminus', array('id'=>$model->id)) ?>" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">thumb_down</i>
                        </a>
                    </div>
                    <div>
                        <?php if($bookmark == 1){?> <!-- Colored icon button -->
                            <a href="<?= Yii::app()->createUrl('post/deletebookmark', array('id'=>$model->id)) ?>" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                                <i class="material-icons">bookmarks</i>
                            </a> <?php } ?>

                        <?php if($bookmark == 0){?> <!-- Colored icon button -->
                            <a href="<?= Yii::app()->createUrl('post/addbookmark', array('id'=>$model->id)) ?>" class="mdl-button mdl-js-button mdl-button--icon">
                                <i class="material-icons">bookmarks</i>
                            </a> <?php } ?>
                    </div>
<!--                    <div>-->
<!--                        <i class="material-icons" role="presentation">share</i>-->
<!--                        <span class="visuallyhidden">share</span>-->
<!--                    </div>-->
                </div>
                <hr>
                <div class="mdl-color-text--grey-700 mdl-card__supporting-text" style="padding-left: 10%; padding-right: 10%;">
                    <?= $model->body; ?>
                </div>


                <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
                    <form method="post" action="<?= Yii::app()->createUrl('post/addcomment', array('id'=>$model->id)); ?>">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea rows=3 class="mdl-textfield__input" id="comment" name="comment"></textarea>
                            <label for="comment" class="mdl-textfield__label">Оставить комментарий</label>
                        </div>
                        <button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                            <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
                        </button>
                    </form>

                    <?php

                    foreach ($comments as $comment){
                        $user = User::model()->findByPk($comment->user_id);
                        ?>
                    <div class="comment mdl-color-text--grey-700">
                        <header class="comment__header">
                            <img src="images/<?= $user->image; ?>" class="comment__avatar">
                            <div class="comment__author">
                                <strong><a href="<?= Yii::app()->createUrl('user/view', array('id'=>$user->id)); ?>"><?php  echo $user->login; ?></a></strong>
<!--                                <span>2 days ago</span>-->
                            </div>
                        </header>
                        <div class="comment__text">
                            <?= $comment->content; ?>
                        </div>
                    </div>
                        <hr>
                    <?php
                    }
                    ?>
    </main>
    <div class="mdl-layout__obfuscator"></div>
</div>


