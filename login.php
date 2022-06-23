<?php
session_start();
$message = $_SESSION["message"] ?? '';
$name = $_POST["who"] ?? '';
$password = $_POST["pass"] ?? '';
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

if (isset($_POST["cancel"])) {
  header("Location: ./index.php");
  return;
}

if ((isset($name) && strlen($name) > 0) && (isset($password) && strlen($password) > 0)) {
  $md5 = hash('md5', $salt . htmlentities($password));
  if ($md5 === $stored_hash) {
    header("location: game.php?name=" . urlencode($_POST["who"]));
  } else {
    $message = "mot de passe incorrect";
  }
} else {
  $_SESSION["message"] = "le nom d'utilisateur et le mot de passe sont requis";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connection</title>
  <link rel="stylesheet" href="./css/normalize.css">
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <section class="section">
    <?php ?>
    <form action="./login.php" method="POST" class="form">
      <h4>se connecter</h4>
      <?php
      if ($message) {
        echo "<small class='form-alert'>$message</small>";
      }
      ?>
      <div class="form-row">
        <label for="name" class="form-label">nom d'utilisateur</label>
        <input type="text" name="who" id="name" class="form-input">
      </div>
      <div class="form-row">
        <label for="pass" class="form-label">mot de passe</label>
        <input type="password" name="pass" id="pass" class="form-input">
      </div>
      <button type="submit" class="btn">se connecter</button>
      <button type="submit" name="cancel" class="btn">annuler</button>
    </form>
    <p>Pour un indice sur le mot de passe, regarder le code source et trouver l'indice dans les commentaires HTML</p>
    <!-- Indice : Le mot de passe est les trois caractères du langage de progammation utilisé dans ce cours (en minuscule) suivi de 123 -->
  </section>
</body>

</html>