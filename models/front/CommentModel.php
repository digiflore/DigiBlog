<?php
require_once(APP_ROOT . "/models/front/Model.php");

class CommentModel extends Model
{
  public function GetComments($postId)
  {
    $this->db = $this->dbConnect();
    $comments = $this->db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    
    return $comments;
  }
  
  public function GetComment($commentId)
  {
    $this->db = $this->dbConnect();
    $comment = $this->db->prepare('SELECT id, author, comment FROM comments WHERE id = ? ORDER BY comment_date DESC');
    $comment->execute(array($commentId));
    var_dump($comment);
    return $comment;
  }
  
  public function CreateComment($postId, $author, $mail, $comment)
  {
    $this->db = $this->dbConnect();
    $comments = $this->db->prepare('INSERT INTO comments(post_id, author, mail, comment, comment_date) VALUES(?, ?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $mail, $comment));
    
    return $affectedLines;
  }
  
  public function UpdateComment($commentId, $comment)
  {
    $this->db = $this->dbConnect();
    $comments = $this->db->prepare('UPDATE comments SET comment=? Where id=?');
    $affectedLines = $comments->execute(array($comment, $commentId));
    
    return $affectedLines;
  }
  
  public function DeleteComment($commentId)
  {
    $this->db = $this->dbConnect();
    $sql = 'DELETE FROM comments WHERE id=?';
    $comments = $this->db->prepare($sql);
    $affectedLines = $comments->execute([$commentId]);
    
    return $affectedLines;
  }
}
