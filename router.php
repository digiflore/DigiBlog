<?php

try {
  if (isset($_GET['page']) && strlen($_GET['page']) > 0) {
    $params = explode('/', $_GET['page']);
    $controller = ucfirst($params[0]);
  } else {
    $controller = "Home";
  }

  $action = isset($params[1]) ? $params[1] : 'index';
  require APP_ROOT . '/controllers/' . $controller . '.php';

  $controller = new $controller();
  if (method_exists($controller, $action)) {
    if (isset($params)) {
      // enlève les 2 premiers paramètres qui correspondent à controller et action
      unset($params[0]);
      unset($params[1]);

      // On appelle le controller avec la fonction (action) auquel on envoie des paramètres
      call_user_func_array([$controller, $action], $params);
    } else {
      $controller->$action();
    }
  } else {
    //http_response_code(404);
    echo "La page demandée n'existe pas.";
  }
} catch (Exception $e) {
  echo "Erreur reçue : " . $e->getMessage();
}
