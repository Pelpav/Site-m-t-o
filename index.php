<?php

session_start();
if (!$_SESSION['iduser']) {
    header('Location: connexion.html');
}
echo $_SESSION['iduser'].'<br>';
echo $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>
    
</body>
</html>