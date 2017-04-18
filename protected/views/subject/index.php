<?php
/* @var $this SubjectController */
/* @var $dataProvider CActiveDataProvider */
/* @var $subjects Subject[] */

?>

    <ol class="breadcrumb">
        <li><a href="index.php">Главная</a> </li>
        <li class="active">Предметы</li>
    </ol>

    <h1>Предметы</h1>

<?php
foreach ($subjects as $subject) {
    $count = count(Post::model()->findAllByAttributes(array('subject_id' => $subject->id)));
    $sql = "select * from post where subject_id = " . $subject->id . " and rating=(select max(rating) from post)";
    $best = Post::model()->findBySql($sql);
    ?>
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
        <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__supporting-text">
                <h4>
                    <a href="<?= Yii::app()->createUrl('subject/view', array('id' => $subject->id)); ?>"><?= $subject->name; ?></a>
                </h4>
            </div>
            <hr>
            <div class="mdl-card__actions">
                Количество статей: <?= $count; ?>
                <div class="mdl-layout-spacer"></div>
                <?php if (isset($best)) {
                    ?>
                    Лучшая статья: <a
                            href="<?= Yii::app()->createUrl('post/view', array('id' => $best->id)); ?>"><?= $best->head; ?></a>
                <?php } ?>
            </div>
        </div>
    </section>
    <br>
    <?php
}
?>