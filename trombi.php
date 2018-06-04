<!DOCTYPE html>
<html>
    <header>
        <link rel="stylesheet" href="style.css" />
    </header>
    <?php
        session_start();
        include('bdd_connect.php');

        $reponse = $bdd->query('SELECT * FROM bdd_promo.etudiant order by Nom');                                  //On récupère le contenu du tableau etudiant de la bdd
        while ($donnees = $reponse->fetch())
        {
            if ($donnees['presencetemp'] == 0) 
            {
    ?>

        <img src="<?php echo $donnees['photo']; ?>.jpg" alt="photo_etudiant"/>
        <?php
                echo $donnees['Nom']." ";
                echo $donnees['Prénom'];
            }
        ?>
        <form method="post" action="trombi.php">
           <p>
               <select name="etat" >
                   <option value="2">Abscence justifié</option>
                   <option value="3">Abscence injustifié</option>
                   <option value="4">Retard</option>
               </select>
           </p>
        </form>
        <?php
            $login= $donnees['Nom'];
            $presencetemp= $_POST['etat'];
            $req = $bdd->prepare('UPDATE bdd_promo.etudiant SET `presencetemp` = ? WHERE login = ?');
            $req->execute(array($presencetemp, $login));
        }
        ?>
</html>
