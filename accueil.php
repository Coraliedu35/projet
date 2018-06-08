<?php
 session_start (); // on démarre la session
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <link rel="shortcut icon" type="image/x-icon" href="logo3.png" />
        <title>Gestion des absences : authentification</title>
    </head>
    <body>
        <header> Département R&T FI1A </header>
        <h1>Gestion des absences</h1>
         <!--formulaire qui envoie les information vers le script d'authentification : login et mdp-->
        <form method="post" action="connect.php">
            <fieldset>
            <input type="text" name="login" placeholder="N° SESAME"/> <br/> 
            <input type="password" name="mdp" placeholder="Mot de passe" /> <br/>
            <br/>
            <input type="submit" value="Valider" class="btn-warning btn-input" />    
            </fieldset>   
        </form> 
    </body>
</html>
