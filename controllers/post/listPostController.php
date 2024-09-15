<?php
require_once './models/postManager.php';

$posts = GetPosts();

$template = './views/pages/list_post.php';
