<?php
	session_start();
	include ("repqr/qrlib.php");
	include('bdd_connect.php');
	$log = $_SESSION['login'];
	$promo=$_GET['promo'];
	$char = 'abcdefghijklmnopqrstuvwxyz0123456789'; //permet d'avoir une variable GET aléatoire afin de ne pas pouvoir connaître le lien à l'avance
	$v = str_shuffle($char);

	$req = $bdd->prepare("INSERT INTO `cours` (`Matière`, `id_prof`, `id_promo`,`salle`,`Horaire`,`qrcode`) VALUES ('Maths',:login,:promo,'TD3','2019-04-17 10:14:37',:qr)");
	$req->execute(array('login'=>$log,'promo'=>$promo,'qr'=>$v));

	QRcode::png("validation.php?v=$v");
?>
