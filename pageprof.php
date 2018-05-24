<?php
    session_start();
    include('bdd_connect.php');
?>
<!DOCTYPE html>

<html>
     <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Absence</title>
    </head>
    <body>
        <header> IUT de Saint-Malo </header>
        <h1>Feuille d'absence</h1>
        <h4><a href="trombi-etudiant.php">Trombi des étudiants manquants</a></h4>
        <form method="POST" action="verif.php">
            <a href="qrcode.php">Lien QR </a>

                <?php
                /*traitement de la chaîne de caractère, identification promo*/
                $promo = $_GET['promo'];
                $gr=substr($promo,-1);
                $promo=substr($promo,0,-1);

                $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant WHERE Groupe= ? AND id_promo = ? ORDER BY Nom');         //On récupère le contenu du tableau etudiant de la bdd
                $reponse->execute(array($gr,$promo));
                ?>
            <table align="center">
                <thead>
                    <tr>
                        <td colspan="4"="4">Promotion</td>
                    </tr>
                    <tr>
                        <td colspan="4"="4><?php echo $promo; ?></td>
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
                    <td colspan="4" ="4">Groupe <?php echo $gr;?></td>
                </tr>
                <?php
                while ($res = $reponse->fetch())                                                                //On affiche une nouvelle ligne par étudiant trouvé
                {
                    $abs = $bdd->prepare('SELECT * FROM `absences`, `etudiant` WHERE etudiant.photo = ? AND etudiant.login=absences.loginetu');
                    $abs->execute(array($res['photo']));
                ?>
                <tr>
                    <td><?php echo $res['Nom']; ?>
                        <li>
                            <ul>nombre d'absences justifiées : <?php echo $res['j']; ?></ul>
                            <ul>nombre d'absences injustifiées : <?php echo $res['nj']; ?></ul>
                        </li>
                    </td>
                    <td><?php echo $res['Prénom']; ?></td>
                    <td><img src="trombi/<?php echo $res['photo']; ?>.png" title="trombi"/></td>
                    <td>
                        <input type="checkbox" name="absent" id="<?php echo $res['login']; ?>" />
                    </td>
                </tr>
                <?php
                }
                $reponse->closeCursor();                                                                        // Termine le traitement de la requête
                ?>

            </tbody>
        </table>
        <input type="submit" class="btn btn-success" value="envoyer" /></form>
        <!--bouton de déconnexion : voir à créer un pop-up "êtes-vous sûr"-->
        <a class="btn btn-outline-primary" href="deconnect.php" role="button">Déconnexion</a>

        <a class="btn btn-outline-warning" href="faq.html" role="button">FAQ</a>
    </body>


</html>
