<?php
	session_start();
	include ("repqr/qrlib.php");
	include('bdd_connect.php');
	$log = $_SESSION['login'];
	$promo=$_GET['promo'];
	$char = 'abcdefghijklmnopqrstuvwxyz0123456789'; //permet d'avoir une variable GET aléatoire afin de ne pas pouvoir connaître le lien à l'avance
	$v = str_shuffle($char);
	$date=date('Y-m-d H:i');
	$date=date_modify($date,'+2 H' );

	$req = $bdd->prepare("INSERT INTO `qrcode` (`horaire`, `id_cours`, `qr`) VALUES (:dt,'1',:qr)");
	$req->execute(array('dt'=>$date,'qr'=>$v));

	QRcode::png("validation.php?v=$v");
?>
