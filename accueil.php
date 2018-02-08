<?php
    session_start(); // on démarre la session
    if(empty($_SESSION['essais'])) 
    {
        $_SESSION['essais'] = 0;
    }
    else if($_SESSION['essais'] > 3) 
    {        
        exit('trop de tentatives');
    }   
    echo $_SESSION['essais']; //debug
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
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
            <label for="remember">Se souvenir de moi</label> <input type="checkbox" name="remember" id="remember" />  <br/>
            <br/>
            <input type="submit" value="Valider" />    
            </fieldset>   
        </form> 
    </body>
</html>