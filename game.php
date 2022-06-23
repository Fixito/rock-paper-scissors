<?php
session_start();
var_dump($_SESSION);
$tab = ['0', '1', '2'];
$names = ["Pierre", "Papier", "Ciseaux"];
$humanGuess = $_POST["human"] ?? '';
$name = $_GET["name"] ?? '';
$result = "";

function check($computer, $human)
{
  if ($human === $computer) {
    return "Égalité";
  } else if ($human == "0" && $computer == "1") {
    return "Tu perds";
  } else if ($human == "0" && $computer == "2") {
    return "Tu gagnes";
  } else if ($human == "1" && $computer == "0") {
    return "Tu gagnes";
  } else if ($human == "1" && $computer == "2") {
    return "Tu perds";
  } else if ($human == "2" && $computer == "1") {
    return "Tu gagnes";
  } else if ($human == "2" && $computer == "0") {
    return "Tu perds";
  }
}

if (!isset($_GET["name"])) {
  die("Le paramètre name est manquant.");
}

if (isset($_POST["logout"])) {
  header("Location: index.php");
}

if ($humanGuess || $humanGuess === "0") {
  $computerGuess = $tab[rand(0, 2)];
  $result = check($computerGuess, $humanGuess);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pierre Papier Ciseaux</title>
  <link rel="stylesheet" href="./css/normalize.css">
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <section class="section">
    <div class="title">
      <h2>pierre papier ciseaux</h2>
      <div class="title-uderline"></div>
    </div>
    <p>Bienvenue : <?= ucfirst($name) ?></p>
    <form method="POST" class="form">
      <div class="form-row">
        <select name="human" class="form-input">
          <option value="-1">Sélectionner</option>
          <option value="0">Pierre</option>
          <option value="1">Papier</option>
          <option value="2">Ciseaux</option>
          <option value="3">Test</option>
        </select>
      </div>
      <button type="submit" class="btn">jouer</button>
      <button type="submit" name="logout" class="btn">se déconnecter</button>
    </form>
    <pre>
    <?php
    if ($humanGuess === "3") {
      for ($c = 0; $c < 3; $c++) {
        for ($h = 0; $h < 3; $h++) {
          $r = check($c, $h);
          echo "Humain=$names[$h] Ordinateur=$names[$c] Résultat=$r\n";
        }
      }
    } else if ($result) {
      echo "Joueur={$names[$humanGuess]} Ordinateur={$names[$computerGuess]} Résultat=$result";
    } else {
      echo "Sélectionner une stratégie et appuyer sur Jouer";
    }
    ?>
  </pre>
  </section>
</body>

</html>