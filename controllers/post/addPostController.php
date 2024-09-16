<?php
require_once './models/postManager.php';

CreatePost($_POST);

$template = './views/pages/post/list_posts.php';
