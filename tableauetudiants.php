<!DOCTYPE html>

<html>
    <?php
    try
    {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_promo;charset=utf8', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));                                    //lien avec la base de données
    }
    catch (Exception $e)                                                                    //en cas d'erreur on arrête la page
    {
            die('Erreur : ' . $e->getMessage());
    }
    ?>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="projet_final.css" />
        <title>Absence</title>
    </head>
    <body>
        <header> IUT de Saint-Malo </header>
        <img src="logo2.jpg" title="logo2" /> 
        <h1>Feuille d'absence</h1>
        <table align="center">
            <thead>
                <tr>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Photo</td>
                    <td>Présence de la personne</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" ="4">Groupe 1</td>
                </tr>
                <?php
                $reponse = $bdd->query('SELECT * FROM bdd_promo.etudiant WHERE Groupe=1 ORDER BY Nom');                                  //On récupère le contenu du tableau etudiant de la bdd
                while ($donnees = $reponse->fetch())
                {
                ?>
                <tr>
                    <td><?php echo $donnees['Nom']; ?></td>
                    <td><?php echo $donnees['Prénom']; ?></td>
                    <td><img src="trombi/<?php echo $donnees['photo']; ?>.png"/></td>
                    <td>XXX</td>
                </tr>
                <?php
                }

                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
                 <tr>
                    <td colspan="4" ="4">Groupe 2</td>
                </tr>
                <?php
                $reponse = $bdd->query('SELECT * FROM bdd_promo.etudiant WHERE Groupe=2 ORDER BY Nom');                                  //On récupère le contenu du tableau etudiant de la bdd
                while ($donnees = $reponse->fetch())
                {
                ?>
                <tr>
                    <td><?php echo $donnees['Nom']; ?></td>
                    <td><?php echo $donnees['Prénom']; ?></td>
                    <td><img src="trombi/<?php echo $donnees['photo']; ?>.png"/></td>
                    <td>XXX</td>
                </tr>
                <?php
                }

                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
            </tbody>
        </table>
        <!--bouton de déconnexion : voir à créer un pop-up "êtes-vous sûr"-->
        <form method="POST" action="accueil.php">
            <input type="submit" value="déconnexion" />
        </form>

    </body>


</html>
