<?php
require_once './models/commentManager.php';

CreateComment($_GET['id_post'], $_POST);

require './controllers/post/postController.php';
