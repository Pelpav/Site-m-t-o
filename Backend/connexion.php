<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root');
if (isset($_POST['envoi'])) {
    if (!empty($_POST['username']) and !empty($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = sha1($_POST['password']);

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE username = ? AND mdp = ?');
        $recupUser->execute([$username, $password]);

        if ($recupUser->rowCount() > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['mdp'] = $password;
            $_SESSION['iduser'] = $recupUser->fetch()['iduser'];
            header('Location: index.php');
        } else {
            echo 'Mot de passe ou pseudo incorrect';
        }
    } else {
        echo 'Veuillez compléter tous les champs';
    }
}

?>