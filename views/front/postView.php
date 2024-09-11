<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Mon blog - Liste des articles</title>
  <script>
    function AddFormComment() {
      document.getElementById("frmAddComment").style.display = "block";
      document.getElementById("frmEditComment").style.display = "none";
    }

    function EditFormComment() {
      document.getElementById("frmAddComment").style.display = "none";
      document.getElementById("frmEditComment").style.display = "block";
    }
  </script>
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
  <!-- Formulaire pour modifier un commentaire -->
  <div id="frmEditComment">
    <h4>Modifier un commentaire</h4>
    <form method="post">
      <input type="submit" name="submit" value="Annuler" />
    </form>
    <p><strong><?= htmlspecialchars($_POST['author']) ?></strong> le <?= $_POST['comment_date_fr'] ?></p>
    <form action="index.php?action=editComment&id_post=<?= $post['id'] ?>&id_comment=<?= $_POST['id'] ?>" method="post">
      <input type="hidden" id="id" name="id" value="<?= isset($_POST["id"]) ? $_POST["id"] : ""; ?>" />
      <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment" cols=45 rows=5 /><?= isset($_POST["comment"]) ? $_POST["comment"] : ""; ?></textarea>
      </div>
      <div>
        <input type="submit" value="Modifier" />
      </div>
    </form>
  </div>
  <?php
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

  <?php
  if (isset($_POST)) {
    if (isset($_POST['submit']) && $_POST['submit'] == "Modifier") {
      echo "<script type='text/javascript'>EditFormComment();</script>";
    } else {
      echo "<script type='text/javascript'>AddFormComment();</script>";
    }
  }
  ?>
</body>

</html>