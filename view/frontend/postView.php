<?php $title = $post['title'] ?>

<?php ob_start(); ?>
<a href="index.php">Retour à la page d'accueil</a>

<div class="news">
    <h3><?= $post['title']; ?></h3>
    <h4><em><?= $post['creation_date_fr']; ?></em></h4>
    <div>
        <?= nl2br($post['content']); ?>
    </div>
</div>

<?php
    if(!$comments)
    {
        echo "<div>Il n'y a pas encore de commentaire</div>";
    }else{
        foreach($comments as $com):
?>
            <div>
                <div><strong><?= $com['author'] ?></strong> le <?= $com['comment_date_fr'] ?></div>
                <div><?= nl2br($com['comment']) ?></div>
            </div>

<?php

        endforeach;
    }

?>

<form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="POST">
    <div>
        <label for="author">Auteur: </label>
        <input type="text" name="author" id="author">
    </div>
    <div>
        <label for="comment">Commentaire: </label>
        <input type="text" name="comment" id="comment">
    </div>
    <div>
        <input type="submit" value="Envoyer">
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require "template.php"; ?>