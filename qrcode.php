<?php
	session_start();
	include ("repqr/qrlib.php");
	include('bdd_connect.php');
	$idc=$_GET['c'];

	//création d'une variable GET aléatoire afin de ne pas pouvoir connaître le lien à l'avance
	$char = 'abcdefghijklmnopqrstuvwxyz0123456789'; 
	$v = str_shuffle($char);

	$date=date('Y-m-d H:i');

	//entrée dans la bdd
	$req = $bdd->prepare("INSERT INTO `qrcode` (`horaire`, `id_cours`, `qr`) VALUES (:dt,:idc,:qr)");
	$req->execute(array('dt'=>$date,'idc'=>$idc,'qr'=>$v));

	QRcode::png("validation.php?v=$v");
?>
