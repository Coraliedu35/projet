<?php 
        session_start();
        include('bdd_connect.php');
        $login_etu = $_POST['present'];
        $req = $bdd->prepare('UPDATE bdd_promo.etudiant SET `presencetemp` = 1 WHERE login = ?');
		$req->execute(array($login_etu));
		header('location:trombi.php');
?>