<?php
require_once './models/postManager.php';
require_once './models/commentManager.php';

$post = GetPost($_GET['id_post']);
$comments = GetComments($_GET['id_post']);

$template = './views/pages/post/show_post.php';
