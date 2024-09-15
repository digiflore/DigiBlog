<div class="home">
  <h1>Digiblog</h1>
  <?php
  ?>
  <?php foreach ($posts as $post) { ?>
    <div class="news">
      <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date'] ?></em>
      </h3>

      <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
        <br>
        <br>
        <em><a href="index.php?page=post&id_post=<?= $post['id'] ?>">Lire la suite ...</a></em>
      </p>
    </div>
  <?php } ?>
</div>