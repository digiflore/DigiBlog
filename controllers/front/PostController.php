<?php

require_once(APP_ROOT . './models/front/PostModel.php');

function ListPosts()
{
  $PostModel = new PostModel();
  $posts = $PostModel->GetPosts();

  require(APP_ROOT . 'views/front/indexView.php');
}

function GetPost()
{
  $postModel = new PostModel();
  $commentModel = new CommentModel();

  $post = $postModel->getPost($_GET['id']);
  $comments = $commentModel->getComments($_GET['id']);

  require(APP_ROOT . 'views/front/postView.php');
}

function EditPost()
{
  $postModel = new PostModel();
  $commentModel = new CommentModel();

  $post = $postModel->getPost($_GET['id']);
  $comments = $commentModel->getComment($_GET['id']);

  require(APP_ROOT . 'views/front/postView.php');
}
