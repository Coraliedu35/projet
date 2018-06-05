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
        <h4><a href="trombi.php">Trombi des étudiants manquants</a></h4>
        <form method="POST" action="verif.php">
            <a href="qrcode.php">Lien QR </a>

                <?php
                /*traitement de la chaîne de caractère, identification promo*/
                $cours = $_SESSION['id_cours'];
                $rep=$bdd->prepare('SELECT `id_promo` FROM `cours` WHERE `id_cours` = ?');
                $rep->execute(array($cours));
                while($res=$rep->fetch()){
                    $promo=$res['id_promo'];

                    /*cours en groupe*/
                    if(strlen($promo)==5){
                        $gr=substr($promo,-1);
                        $promo=substr($promo,0,-2).'A';        
                    }
                    /*cours en classe entière*/
                    else if(substr($promo,0,3)=='R&T'){
                        $promo=substr($promo,-4);
                    }
                }
                /*affichage des étudiants en fonction de leur promo et leur groupe*/
                $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant WHERE Groupe= ? AND id_promo = ? ORDER BY Nom');
                $reponse->execute(array($gr,$promo));
                ?>
            <table align="center">
                <thead>
                    <tr>
                        <td colspan="3"="3">Promotion</td>
                    </tr>
                    <tr>
                        <td colspan="3"><?php echo $promo; ?></td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Photo</td>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="3" ="3">Groupe <?php echo $gr;?></td>
                </tr>
                <?php
                while ($res = $reponse->fetch())                                                                //On affiche une nouvelle ligne par étudiant trouvé
                {
                    $abs = $bdd->prepare('SELECT * FROM `absences`, `etudiant` WHERE etudiant.photo = ? AND etudiant.Nom=absences.loginetu');
                    $abs->execute(array($res['photo']));
                ?>
                <tr>
                    <td><?php echo $res['Nom']; ?>
                        <li>
                            <ul>nombre d'absences justifiées : <?php echo 'j'; ?></ul>
                            <ul>nombre d'absences injustifiées : <?php echo 'nj'; ?></ul>
                        </li>
                    </td>
                    <td><?php echo $res['Prénom']; ?></td>
                    <td><img src="trombi/<?php echo $res['photo']; ?>.png" title="trombi"/></td>
                </tr>
                <?php
                }
                $reponse->closeCursor();                                                                        // Termine le traitement de la requête
                ?>

            </tbody>
        </table>
        <input type="submit" class="btn btn-success" value="envoyer" /></form>
        <!--bouton de déconnexion : voir à créer un pop-up "êtes-vous sûr"-->
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
        <button class="btn btn-outline-primary" href="deconnect.php" onclick="Deconnexion()">Déconnexion</button>

        <a class="btn btn-outline-warning" href="faq.html" role="button">FAQ</a>

        <a class="btn btn-outline-warning" href="modifs.php" role="button">Paramètres du compte</a>
    </body>


</html>
