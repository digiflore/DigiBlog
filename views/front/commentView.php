<!-- Formulaire pour ajouter un commentaire -->
<h4>Ajouter un commentaire</h4>
<form action="index.php?action=<?= $_GET['action'] ?>&id=<?= $post['id'] ?>" method="post">
  <input type="text" id="id" />;
  <div>
    <label for="author">Auteur</label><br />
    <input type="text" id="author" name="author" />
  </div>
  <div>
    <label for="comment">Commentaire</label><br />
    <textarea id="comment" name="comment"></textarea>
  </div>
  <div>
    <input type="submit" value="Ajouter" />
  </div>
</form>