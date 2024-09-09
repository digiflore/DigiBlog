<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Mon blog - Liste des articles</title>
</head>

<body>
  <h1>Mon super blog !</h1>
  <p><a href="index.php">Retour à la liste des billets</a></p>

  <div class="news">
    <h3>
      <?= htmlspecialchars($post['title']) ?>
      <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
      <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
  </div>
  <h2>Commentaires</h2>
  <!-- Formulaire pour ajouter un commentaire -->
  <h4>Ajouter un commentaire</h4>
  <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
    <table>
      <tr>
        <td>
          <label for="author">Auteur :</label>
        </td>
        <td>
          <label for="mail">Mail :</label>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" id="author" name="author" />
        </td>
        <td>
          <input type="text" id="mail" name="mail" />
        </td>
      </tr>
    </table>
    </table>
    <div>
      <label for="comment">Commentaire</label><br />
      <textarea id="comment" name="comment" cols=45 rows=5></textarea>
    </div>
    <div>
      <input type="submit" value="Ajouter" />
    </div>
  </form>

  <?php
  while ($comment = $comments->fetch()) {
  ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>
      (<a href='index.php?action=removeComment&id_post=<?= $post['id'] ?>&id=<?= $comment['id'] ?>'>Supprimer</a>)
    </p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
  <?php
  }
  ?>
</body>

</html>