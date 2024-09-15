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

require './router.php';
require './views/layout.php';
