<? php
    session_start();
?>

*<!DOCTYPE html>

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
        <link rel="stylesheet" href="style.css" />
        <title>Absence</title>
    </head>
    <body>
        <header> IUT de Saint-Malo </header>
        <h1>Feuille d'absence</h1>
        <h4><a href="absents.php">Trombi des étudiants manquants</a></h4>
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
                    <td><?php echo $donnees['Nom']; ?>
                        <li>
                            <ul>nombre d'absences justifiées : <?php echo $donnees['Nb absences J']; ?></ul>
                            <ul>nombre d'absences injustifiées : <?php echo $donnees['Nb absences NJ']; ?></ul>
                        </li>                        
                    </td>
                    <td><?php echo $donnees['Prénom']; ?></td>
                    <td><img src="trombi/<?php echo $donnees['photo']; ?>.png"/></td>
                    <td><input type="checkbox" name="absent" id="absent" /></td>
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
                    <td><?php echo $donnees['Nom']; ?>
                        <li>
                            <ul>nombre d'absences justifiées : <?php echo $donnees['Nb absences J']; ?></ul>
                            <ul>nombre d'absences injustifiées : <?php echo $donnees['Nb absences NJ']; ?></ul>
                        </li>                    
                    </td>
                    <td><?php echo $donnees['Prénom']; ?></td>
                    <td><img src="trombi/<?php echo $donnees['photo']; ?>.png"/></td>
                    <td><input type="checkbox" name="absent" id="absent" /></td>
                </tr>
                <?php
                }

                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
            </tbody>
        </table>
        <form method="POST" action="verif.php"><input type="submit" value="envoyer" /></form>        
        <!--bouton de déconnexion : voir à créer un pop-up "êtes-vous sûr"-->
       <form method="POST" action="accueil.php">
            <input type="submit" value="déconnexion" />
        </form>
        <form method="POST" action="faq.html"><input type="submit" value="FAQ" /></form>

    </body>


</html>
