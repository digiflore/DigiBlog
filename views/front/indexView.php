<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<?php require_once("header.php"); ?>
<h1>Mon super blog !</h1>
<p>Derniers articles du blog :</p>

<?php
while ($data = $posts->fetch()) {
?>
  <div class="news">
    <h3>
      <?= htmlspecialchars($data['title']) ?>
      <em>le <?= $data['creation_date_fr'] ?></em>
    </h3>

    <p>
      <?= nl2br(htmlspecialchars($data['content'])) ?>
      <br>
      <br>
      <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Lire la suite ...</a></em>
    </p>
  </div>
<?php
}
$posts->closeCursor(); // libère la connexion au serveur
?>
<?php $content = ob_get_clean(); ?>

<?php require(APP_ROOT . '/views/front/template.php'); ?>