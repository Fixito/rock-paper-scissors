# Pierre Papier Ciseaux

Réaliser une application en trois pages pour jouer à pierre, papier, ciseaux. On autorisera seulement les utilisateurs connectés à jouer au jeu.

## Spécifications

Quand on arrive sur l'application (index.php) on nous dit d'aller sur la page de connection.

## Conditions pour la page de connection

la page login.php doit être une page de connection. Il doit y avoir un champs pour le nom de la personne (name="who") et son mot de passe (name="pass"). Le formulaire doit avoir un bouton "Se Connecter" qui soumet les données du formulaire en utilisant la method="POST".

La page de connection a besoin d'avoir des vérifications d'erreur pour les champs. Si soit le champs nom ou le mot de passe est vide, on doit mettre un message dans le formulaire :

"Le nom d'utilisateur et le mot de passe sont requis"

Si le mot de passe est non-vide et incorrect, on doit mettre un message dans le formulaire :

"Mot de passe incorrect"

Vous devez "saler" votre mot de passe. Le mot de passe en "texte plein" ne doit pas être présent dans le code source de l'application. Pour ce projet, on utilisera les valeurs suivantes pour le sel et le
hashage stocké :

$salt = 'XyZzy12\*\_';
$stored_hash = 'dddd5970b9fd8de3700b1db3cf7c8b2a';

Le hashage stocké est le MD5 du sel concaténé avec le mot php123 - qui est le mot de passe. Le hashage est calculé avec le PHP suivant :

<!-- $md5 = hash('md5', 'XyZzy12\*\_php123'); -->

## Spécifications de l'écran de jeu

Pour empêcher le jeu d'être joué sans utilisateur proprement connecté, la page game.php doit première vérifier la session pour voir si le nom de l'utilisateur est défini et si l'utilisateur n'est pas défini alors la session de game.php doit s'arrêter immédiatement en utilisant la fonction die() de PHP :

die("Le paramètre name est manquant");

Pour tester, naviguer vers game.php manuellement sans se connecter - cela devrait échouer avec "Le paramètre name est manquant"

Si l'utilisateur est connecté, il devrait y avoir un formulaire avec menu déroulant montrant les options Pierre, Papier, Ciseaux ainsi que des boutons "Jouer" et "Se Déconnecter".

Si le bouton "Se Déconnecter" est pressé l'utilisateur est redirigé vers la page index.php en utilisant :

header('Location: index.php');

Si l'utilisateur sélectionne Pierre, Papier, Ciseaux et appuie sur "Jouer", le jeu choisit un lancer aléatoire et affiche le résultat :

Joueur=Papier Ordinateur=Papier Résultat=Égalité

Le calcul pour savoir si l'utilisateur gagne, perds ou égalise est fait dans une fonction check() qui retourne un string disant à l'utilisateur ce qu'il se passe :

function check($computer, $human) {
...
return "Égalité";
...
return "Tu perds";
...
return "Tu gagnes";
...
}
