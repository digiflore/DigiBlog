<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link href="./public/css/style.css" rel="stylesheet">
  <link href="./public/css/green-nav.css" rel="stylesheet">
  <title>Digiblog</title>
</head>

<body>
  <?php require './views/partials/_header.php'; ?>
  <main class="main">
    <?php require $template; ?>
  </main>
  <?php require './views/partials/_footer.php'; ?>
</body>

</html>