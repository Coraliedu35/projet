<? php
    session_start();
?>


<!DOCTYPE html>

<html>
     <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Absence</title>
    </head>
    <?php
        include('bdd_connect.php');
    ?>
    <body>
        <header> IUT de Saint-Malo </header>
        <!--<img src="logo2.jpg" title="logo2" /> -->
        <h1>Feuille d'absence</h1>
        <h4><a href="trombi-etudiant.php">Trombi des étudiants manquants</a></h4>
        <form method="POST" action="verif.php">
            <a href="qrcode.php">Lien QR </a>
        <table align="center">
            <thead>
                <tr>
                    <td colspan="4"="4">Promotion</td>
                </tr>
                <tr>
                    <td colspan="4"="4>FI1A</td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Photo</td>
                    <td>Présence</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" ="4">Groupe 1</td>
                </tr>
                <?php
                $reponse = mysqli_query($bdd,'SELECT * FROM etudiant WHERE Groupe=1 ORDER BY Nom');                                  //On récupère le contenu du tableau etudiant de la bdd
                while ($res = mysqli_fetch_assoc($reponse))
                {

                ?>
                <tr>
                    <td><?php echo $res['Nom']; ?>
                        <li>
                            <ul>nombre d'absences justifiées : <?php echo $res['absencesJ']; ?></ul>
                            <ul>nombre d'absences injustifiées : <?php echo $res['absencesNJ']; ?></ul>
                        </li>
                    </td>
                    <td><?php echo $res['prenom']; ?></td>
                    <td><img src="trombi/<?php echo $res['photo']; ?>.png" title="trombi"/></td>
                    <td>
                        <input type="checkbox" name="absent" id="absent" />
                    </td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="4" ="4">Groupe 2</td>
                </tr>
                <?php
                $reponse = mysqli_query($bdd,'SELECT * FROM etudiant WHERE Groupe=2 ORDER BY Nom');                                  //On récupère le contenu du tableau etudiant de la bdd
                while ($res = mysqli_fetch_assoc($reponse))
                {
                ?>
                <tr>
                    <td><?php echo $res['Nom']; ?>
                       <li>
                            <ul>nombre d'absences justifiées : <?php echo $res['absencesJ']; ?></ul>
                            <ul>nombre d'absences injustifiées : <?php echo $res['absencesNJ']; ?></ul>
                        </li>
                    </td>
                    <td><?php echo $res['prenom']; ?></td>
                    <td><img src="trombi/<?php echo $res['photo']; ?>.png" title="trombi"/></td>
                    <td>
                        <input type="checkbox" name="absent" id="absent" /> 
                    </td>
                </tr>
                <?php
                }

                mysqli_close($bdd); // Termine le traitement de la requête
                ?>

            </tbody>
        </table>
        <input type="submit" class="btn btn-success" value="envoyer" /></form>
        <!--bouton de déconnexion : voir à créer un pop-up "êtes-vous sûr"-->
        <a class="btn btn-outline-primary" href="deconnect.php" role="button">Déconnexion</a>

        <a class="btn btn-outline-warning" href="faq.html" role="button">FAQ</a>
    </body>


</html>
