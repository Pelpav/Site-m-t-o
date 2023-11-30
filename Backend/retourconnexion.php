<?php

session_start();
if (!$_SESSION['iduser']) {
    header('Location: connexion.html');
}
?>