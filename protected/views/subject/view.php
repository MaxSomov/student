<?php
/* @var $this SubjectController */
/* @var $model Subject */
/* @var $posts Post[] */

?>

<ol class="breadcrumb">
    <li><a href="index.php">Главная</a> </li>
    <li><a href="<?= Yii::app()->createUrl('subject/'); ?>">Предметы</a></li>
    <li class="active"><?= $model->name; ?></li>
</ol>

<h1><?php echo $model->name; ?></h1>

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
