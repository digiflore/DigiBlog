<?php
require_once './models/connection.php';

function GetComments($postId)
{
  $comments = dbConnect()->prepare('SELECT id, author,mail, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
  $comments->execute(array($postId));

  return $comments;
}

function GetComment($commentId)
{
  $comment = dbConnect()->prepare('SELECT id, author,mail, comment FROM comments WHERE id = ? ORDER BY comment_date DESC');
  $comment->execute(array($commentId));
  return $comment;
}

function CreateComment($postId, $author, $mail, $comment)
{
  $comments = dbConnect()->prepare('INSERT INTO comments(post_id, author, mail, comment, comment_date) VALUES(?, ?, ?, ?, NOW())');
  $affectedLines = $comments->execute(array($postId, $author, $mail, $comment));

  return $affectedLines;
}

function UpdateComment($commentId, $comment)
{
  $comments = dbConnect()->prepare('UPDATE comments SET comment=? Where id=?');
  $affectedLines = $comments->execute(array($comment, $commentId));

  return $affectedLines;
}

// Suppression d'un commentaire
function DeleteComment($commentId)
{
  $sql = 'DELETE FROM comments WHERE id=?';
  $comments = dbConnect()->prepare($sql);
  $affectedLines = $comments->execute([$commentId]);

  return $affectedLines;
}
