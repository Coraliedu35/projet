<?php
	session_start();
	// Réinitialisation des variables de session
	unset($_SESSION['login']);
	unset($_SESSION['mdp']);
	unset($_SESSION['essais']);
	session_destroy(); // le script quitte la session
    header('Location: connect.php'); // redirection vers la page d'accueil    
?>