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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Paramètres de compte</title>
    </head>
    <body>
        <header> IUT de Saint-Malo </header>


        <fieldset>
        <form method="POST" action="update.php">
            <legend>Modification du mot de passe</legend>
            <input type="password" name="mdp1" placeholder="ancien mot de passe"><br>
            <input type="password" name="mdpmodif" placeholder="nouveau mot de passe"><br>
            <input type="submit" class="btn btn-success" value="envoyer" />
        </form>
        </fieldset> 
        <a class="btn btn-outline-warning" href="pageetudiant.php" role="button">Retour</a>

    </body>
</html>