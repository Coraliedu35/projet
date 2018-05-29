<!DOCTYPE html>
<html>
    <header>
        <link rel="stylesheet" href="style.css" />
    </header>
    <?php
        session_start();
        try
        {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_promo;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));                                    //lien avec la base de données
        }
        catch (Exception $e)                                                                    //en cas d'erreur on arrête la page
        {
            die('Erreur : ' . $e->getMessage());
        }
        $reponse = $bdd->query('SELECT * FROM bdd_promo.etudiant order by Nom');                                  //On récupère le contenu du tableau etudiant de la bdd
        while ($donnees = $reponse->fetch())
        {
            if ($donnees['presencetemp'] == 0) 
            {
        ?>

        <img src="<?php echo $donnees['photo'] ?>.jpg" alt="photo_etudiant"/>
        <?php
                echo $donnees['Nom']," ";
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
            $presencetemp= $_POST['value']
            $req = $bdd->prepare('UPDATE bdd_promo.etudiant SET `presencetemp` = ? WHERE login = ?');
            $req->execute(array($presencetemp, $login));
        ?>
        }
    ?>
</html>
