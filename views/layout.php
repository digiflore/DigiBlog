<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Digiblog</title>
</head>

<body>
  <?php require './views/partials/_header.php'; ?>
  <main>
    <?php require($template); ?>
  </main>
  <?php require './views/partials/_footer.php'; ?>
</body>

</html>