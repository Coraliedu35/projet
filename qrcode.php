<?php
	include ("repqr/qrlib.php");

	$char = 'abcdefghijklmnopqrstuvwxyz0123456789'; //permet d'avoir une variable GET aléatoire afin de ne pas pouvoir connaître le lien à l'avance
	$v = str_shuffle($char);

	QRcode::png("index.php?v=$v");
?>
