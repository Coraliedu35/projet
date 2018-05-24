<?php
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
        <title>Statistiques d'absence</title>
    </head>
    <body>
        <header> IUT de Saint-Malo </header>
        <h1>Statistiques individuelles d'absence</h1>
        <table align="center">
            <thead>
                <tr>
                    <td>Absences justifiées </td>
                    <td>Absence injustifiées</td>
                    <td>Absences totales</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant WHERE login=?');
                $reponse->execute(array($_SESSION['login']));
                while ($donnees = $reponse->fetch())    
                {
                ?>
                <tr>
                    <td><?php echo $donnees['absencesJ']; ?></td>
                    <td><?php echo $donnees['absencesNJ']; ?></td>
                    <td><?php echo $donnees['absencesNJ']+$donnees['absencesJ']; ?></td>
                </tr>
                <?php
                }

                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
            </tbody>
        </table>
        <script>
        function Deconnexion ()
        {
        function RedirigeDeconnexion()
        {
        document.location.href="deconnect.php"; 
        }
        if (confirm("Etes-vous sûr de vouloir vous déconnecter ?")) 
            {
                RedirigeDeconnexion();
            }
        }
        </script>
         <button onclick="Deconnexion()">Deconnexion</button> 
    </body>


</html>
