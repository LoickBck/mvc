<?php $title='Mon blog';?>

<?php ob_start();?>

<h1>Mon super Blog</h1>
<p>Les derniers sujets</p>

<?php
    foreach($posts as $sujet):

?>
    <div class="news">
        <h3>
            <a href="index.php?action=post&id=<?=$sujet['id']?>"><?=$sujet['title']?></a>
            <em>le <?=$sujet['creation_date_fr']?></em>
    </h3>
    <div>
        <?=nl2br($sujet['content'])?>
    </div>
    </div>
<?php
    endforeach;
?>

<?php $content = ob_get_clean(); ?>

<?php require "template.php";