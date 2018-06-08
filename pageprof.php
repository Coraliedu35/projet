<?php
    session_start();
    include('bdd_connect.php');
?>
<!DOCTYPE html>

<html>
     <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <link rel="shortcut icon" type="image/x-icon" href="logo3.png" />
        <title>Enseignant</title>
    </head>
    <body>
        <?php
            $cours = $_SESSION['id_cours'];
        ?>
        <header> IUT de Saint-Malo </header>
        <h1>Feuille d'absence</h1>
        <h4><a href="trombi.php">Trombi des étudiants manquants</a></h4>
            <h4><a href="qrcode.php?c=<?php echo $cours;?>" target="_blank">Lien QR </a></h4>

                <?php
                /*traitement de la chaîne de caractère, identification promo*/
                $rep=$bdd->prepare('SELECT `id_promo` FROM `cours` WHERE `id_cours` = ?');
                $rep->execute(array($cours));
                while($res=$rep->fetch()){
                    $promo=$res['id_promo'];
                    /*cours en groupe*/
                    if(strlen($promo)==5){
                        $gr=substr($promo,-1);
                        $promo=substr($promo,0,-2).'A';   
                        /*affichage des étudiants en fonction de leur promo et leur groupe*/
                        $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant WHERE Groupe= ? AND id_promo = ? ORDER BY Nom');
                        $reponse->execute(array($gr,$promo));  
                    }
                    /*cours en classe entière*/
                    else if(substr($promo,0,3)=='R&T'){
                        $promo=substr($promo,-4);
                        $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant WHERE id_promo = ? ORDER BY Nom');
                        $reponse->execute(array($promo));
                    }
                    $_SESSION['id_promo']=$promo;
                }
                ?>
            <table id="b">
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
                    <td colspan="3" ="3"><?php if(isset($gr)){ echo 'Groupe'.$gr;} else{ echo " Classe entière";}?></td>
                </tr>
                <?php
                while ($res = $reponse->fetch())                                         //On affiche une nouvelle ligne par étudiant trouvé
                {

                $abs = $bdd->prepare('SELECT * FROM bdd_promo.etudiant,bdd_promo.absences WHERE etudiant.login=? AND etudiant.login=absences.loginetu');
                $abs->execute(array($res['login']));
                $jtot=0;
                $njtot=0;
                $atot=0;

                ?>
                <tr>
                    <td><?php echo $res['Nom']; 
                        while($rep=$abs->fetch())
                        {
                            $njtot=$njtot+$rep['nj'];
                            $jtot=$jtot+$rep['j'];
                            $atot=$atot+1;
                        }
                    ?>
                        <li>
                            <ul>nombre d'absences justifiées : <?php echo $jtot; ?></ul>
                            <ul>nombre d'absences injustifiées : <?php echo $njtot; ?></ul>
                            <ul>absences totales : <?php echo $atot; ?></ul>
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
        <button class="btn-warning btn-outline" href="deconnect.php" onclick="Deconnexion()">Déconnexion</button>

        <a class="btn-warning btn-outline" href="faq.php" role="button">FAQ</a>

        <a class="btn-warning btn-outline" href="modifs.php" role="button">Paramètres du compte</a>
    </body>


</html>
