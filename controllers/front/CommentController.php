<?php
require_once(APP_ROOT . './models/front/CommentModel.php');

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
    header('Location: index.php?action=post&id_post=' . $postId);
  }
}

// Modification d'un commentaire
function EditComment(string $postId, array $input)
{
  var_dump($input);
  $commentId = null;
  $comment = null;

  if (!empty($input['id']) && !empty($input['comment'])) {
    $commentId = $input['id'];
    $comment = $input['comment'];
  } else {
    throw new Exception('Les données du formulaire sont invalides.');
  }

  $commentModel = new CommentModel();
  $success = $commentModel->UpdateComment($commentId, $comment);
  if (!$success) {
    throw new Exception('Impossible de modifier le commentaire !');
  } else {
    header('Location: index.php?action=post&id_post=' . $postId);
  }
}

function RemoveComment($postId, $commentId)
{
  $commentModel = new CommentModel();
  $success = $commentModel->DeleteComment($commentId);
  if (!$success) {
    throw new Exception('Impossible de supprimer le commentaire !');
  } else {
    header('Location: index.php?action=post&id_post=' . $postId);
  }
}
