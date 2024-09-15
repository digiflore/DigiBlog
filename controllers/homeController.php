<?php
require_once './models/postManager.php';

$template = './views/pages/home.php';
$posts = GetLastPosts(NB_LAST_POSTS);
