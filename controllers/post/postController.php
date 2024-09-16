<?php
require_once './models/postManager.php';
require_once './models/commentManager.php';

if (isset($_GET['id_post'])) {
  $post = GetPost($_GET['id_post']);
  $comments = GetComments($_GET['id_post']);
} else
  throw new Exception("Identifiant de l'article non renseigné.");

$template = './views/pages/post/show_post.php';
