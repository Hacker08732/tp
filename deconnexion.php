<?php
//deconnexion.php : cette page permet de se déconnecter
//Démarrage de la session
session_start();

//Destruction de toutes les données de sessions
session_destroy();

//Redirection vers la page login
header('Location: login.php');
exit();
?>