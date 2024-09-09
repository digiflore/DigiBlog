<?php
require_once(APP_ROOT . './models/front/CommentModel.php');
function GetComment()
{
  $CommentModel = new CommentModel();

  $affectedLines = $CommentModel->GetComment($_GET['commentId']);

  if ($affectedLines === false) {
    throw new Exception('Impossible d\'afficher le commentaire !');
  } else {
    header('Location: index.php?action=post&commentId=' . $_GET['commentId']);
  }
}

function AddComment(string $postId, array $input)
{
  $author = null;
  $mail = null;
  $comment = null;
  if (!empty($input['author']) && !empty($input['mail']) && !empty($input['comment'])) {
    $author = $input['author'];
    $mail = $input['mail'];
    $comment = $input['comment'];
  } else {
    throw new Exception('Les données du formulaire sont invalides.');
  }

  $commentModel = new CommentModel();
  $success = $commentModel->CreateComment($postId, $author, $mail, $comment);
  if (!$success) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
  } else {
    header('Location: index.php?action=post&id=' . $postId);
  }
}

function EditComment(string $postId, string $commentId, array $input)
{
  $comment = null;
  if (!empty($input['comment'])) {
    $comment = $input['comment'];
  } else {
    throw new Exception('Les données du formulaire sont invalides.');
  }

  $commentModel = new CommentModel();
  $success = $commentModel->UpdateComment($commentId, $comment);
  if (!$success) {
    throw new Exception('Impossible de modifier le commentaire !');
  } else {
    header('Location: index.php?action=post&id=' . $postId);
  }
}

function RemoveComment($postId, $commentId)
{
  $commentModel = new CommentModel();
  $success = $commentModel->DeleteComment($commentId);
  if (!$success) {
    throw new Exception('Impossible de supprimer le commentaire !');
  } else {
    header('Location: index.php?action=post&id=' . $postId);
  }
}
