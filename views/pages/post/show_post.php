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
      <em>le <?= $post['creation_date'] ?></em>
    </h3>

    <p>
      <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
  </div>
  <h2>Commentaires</h2>
  <!-- Formulaire pour ajouter un commentaire -->
  <div id="frmAddComment">
    <h4>Ajouter un commentaire</h4>
    <form action="index.php?action=addComment&id_post=<?= $post['id'] ?>" method="post">
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
        <input type="submit" value="Valider" />
      </div>
    </form>
  </div>
  <?php
  // Pour chaque commentaire 
  while ($comment = $comments->fetch()) {
  ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <table>
      <tr>
        <td>
          <form method="POST">
            <input type="hidden" id="id" name="id" value="<?= $comment['id'] ?>" />
            <input type="hidden" id="author" name="author" value="<?= $comment['author'] ?>" />
            <input type="hidden" id="comment_date_fr" name="comment_date_fr" value="<?= $comment['comment_date_fr'] ?>" />
            <input type="hidden" id="comment" name="comment" cols=45 rows=5 value="<?= $comment['comment'] ?>" />
            <input type="submit" id="submit" name="submit" value="Modifier" />
          </form>
        </td>
        <td>
          <form method="POST" action="'index.php?action=removeComment&id_post=<?= $post['id'] ?>&id_comment=<?= $comment['id'] ?>'">
            <input type="submit" id="submit" name="submit" value="Supprimer" />
          </form>
        </td>
      </tr>
    </table>
  <?php
  }
  ?>
  </table>
</body>

</html>