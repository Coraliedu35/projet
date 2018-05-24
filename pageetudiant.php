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
                $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant,bdd_promo.absences WHERE etudiant.login=? AND etudiant.login=absences.loginetu');
                $reponse->execute(array($_SESSION['login']));
                while ($res =$reponse->fetch())    
                {
                ?>
                <tr>
                    <td><?php echo $res['j']; ?></td>
                    <td><?php echo $res['nj']; ?></td>
                    <td><?php echo $res['nj']+$res['j']; ?></td>
                </tr>
                <?php
                }
                $reponse->closeCursor();                                                //Termine le traitement de la requête
                ?>
            </tbody>
        </table>
        <a class="btn btn-outline-warning" href="modifs.php" role="button">Paramètres du compte</a>

        <a class="btn btn-outline-info" href="faq.html" role="button">FAQ</a>
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
        <button class="btn btn-outline-primary" onclick="Deconnexion()">Deconnexion</button> 
    </body>

</html>
