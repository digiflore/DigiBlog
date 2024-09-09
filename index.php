<!DOCTYPE html>
<html>

<head>
  <link href="./public/css/style.css" rel="stylesheet">
</head>

<!--
URLs possibles :
- /
- /action=listPosts
- /action=post&id=<idpost>
- /action=addComment&id=<idpost>
- /action=editComment&id=<idpost>
- /action=removeComment&id=<idComment>
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
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          GetPost();
        } else {
          echo 'Erreur : aucun identifiant de billet envoyé';
        }
        break;
      case 'addComment':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          AddComment($_GET['id'], $_POST);
        } else {
          throw new Exception('Aucun identifiant de billet envoyé');
        }
        break;
      case 'removeComment':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          RemoveComment($_GET['id_post'], $_GET['id']);
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
