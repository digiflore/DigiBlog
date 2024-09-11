<!DOCTYPE html>
<html>

<head>
  <link href="./public/css/style.css" rel="stylesheet">
</head>


<!--
URLs possibles :
- /
- /action=listPosts
- /action=post&id_post=<id_post>
- /action=addComment&id_comment=<id_comment>
- /action=editComment&id_comment=<id_comment>
- /action=removeComment&id_comment=<id_comment>
-->

<?php
require_once('./app/config.php');
require_once(APP_ROOT . '/controllers/front/_Controllers.php');
try {
  if (isset($_GET['action'])) {
    switch ($_GET['action']) {
      case 'listPosts':
        ListPosts();
        break;

      case 'post':
        if (isset($_GET['id_post']) && $_GET['id_post'] > 0) {
          GetPost();
        } else {
          echo 'Erreur : aucun identifiant de billet envoyé';
        }
        break;
      case 'addComment':
        if (isset($_GET['id_comment']) && $_GET['id_comment'] > 0) {
          AddComment($_GET['id_comment'], $_POST);
        } else {
          throw new Exception('Aucun identifiant de billet envoyé');
        }
        break;
      case 'editComment':
        if (isset($_GET['id_post']) && $_GET['id_comment'] > 0) {
          EditComment($_GET['id_post'], $_POST);
        } else {
          throw new Exception('Aucun identifiant de billet envoyé');
        }
        break;
      case 'removeComment':
        if (isset($_GET['id_comment']) && $_GET['id_comment'] > 0) {
          RemoveComment($_GET['id_post'], $_GET['id_comment']);
        } else {
          throw new Exception('Aucun identifiant de billet envoyé');
        }
        break;
      default:
        break;
    }
  } else
    ListPosts();
} catch (Exception $e) { // S'il y a eu une erreur, alors...
  echo 'Erreur : ' . $e->getMessage();
}
