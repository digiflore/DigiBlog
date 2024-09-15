<h1>Le blog</h1>
<a href="index.php?page=add_post" role="button">Ajouter un article</a>
<?php foreach ($posts as $post) { ?>
  <article>
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <a href="index.php?page=show_post&id=<?= $post['id'] ?>" role="button">Lire l'article</a>
  </article>
<?php } ?>