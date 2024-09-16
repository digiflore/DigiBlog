<?php
const AVAILABLE_ROUTES = [
  'home' => 'homeController.php',
  // Post
  'post' => 'post/postController.php',
  'list_posts' => 'post/listPostController.php',
  'add_post' => 'post/addPostController.php',
  'add_comment' => 'addCommentController.php',
  'privacy_policy' => 'privacyPolicyController.php',
];

const DEFAULT_ROUTE = AVAILABLE_ROUTES['home'];
