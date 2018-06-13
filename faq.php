<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <link rel="shortcut icon" type="image/x-icon" href="logo3.png" />
        <title>FAQ</title>
    </head>
    <body class="contenu">
        <header>IUT de Saint-Malo</header>
            <h2>1) Comment changer mon mot de passe?</h2>
            <p id="azerty">Pour vous connecter à votre compte veuillez <a href="modif.php">cliquer ici</a>  ou aller sur la page parametre du compte puis rentrer votre ancien mot-de-passe puis votre nouveau mot-de-passe.</p>
            <img src="modif.png" alt="" />
        	<h2>2) Comment valider ma presence?</h2>
            <p id="azerty">Au debut du cours, le professeur va projeter un QRcode que vous devrez scanner. Ce QRcode va vous envoyer sur une page ou vous devrez rentrer votre login et votre mot-de-passe.</p>
            <img src="validation.png" alt="" />
            <h2>3) Comment changer l'état d'un étudiant?</h2>
            <p id="azerty">Afin de confirmer l'abscence de l'étudiant le professeur doit simplement cliquer sur le bonton a sa gauche.</p>
            <img src="trombi.png" alt="" />
            <h2>4) Comment valider les absences?</h2>
            <p id="azerty">Il suffit de cliquer sur valider</p>
    		



        <a class="btn-warning btn-outline" href="javascript:history.go(-1)" role="button">retour</a>
    </body>
</html>
