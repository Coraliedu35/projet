<?php
	session_destroy(); // le script quitte la session
    header('Location: connect.php'); // redirection vers la page d'accueil
?>