<?php
	session_start();
	include ('bdd_connect.php');
	$login=$_SESSION['login'];
	$req = $bdd->prepare('UPDATE bdd_promo.etudiant SET `presencetemp` = 1 WHERE login = ?');
	$req->execute(array($login));
	header('location:comfirmation.php');
	
?>

