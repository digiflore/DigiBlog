<h1>Le blog</h1>
<a href="index.php?page=add_post" role="button"><i class="fa-solid fa-plus"></i> Ajouter un article</a>
<?php foreach ($posts as $post) { ?>
  <article>
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <a href="index.php?page=show_article&id=<?= $post['id'] ?>" role="button" class="outline">Lire l'article</a>
  </article>
<?php } ?>