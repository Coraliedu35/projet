<?php
    session_start();
?>

<!DOCTYPE html>

<html>
    <?php
        include('bdd_connect.php')
    ?>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <link rel="shortcut icon" type="image/x-icon" href="logo3.png" />
        <title>Paramètres de compte</title>
    </head>
    <body>
        <header>IUT de Saint-Malo</header>


        <fieldset>
        <form id="mod" method="POST" action="update.php">
            <legend>Modification du mot de passe</legend>
            <input type="password" name="mdp1" placeholder="ancien mot de passe"><br>
            <input type="password" name="mdpmodif" placeholder="nouveau mot de passe"><br>
            <input type="submit" class="btn btn-success" value="envoyer" />
        </form>
        </fieldset> 
        <a class="btn-warning btn-outline" href="pageetudiant.php" role="button">Retour</a>

    </body>
</html>
