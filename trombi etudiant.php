<!Doctype>
<html>
    <header>
        <link rel="stylesheet" href="style.css" />
    </header>
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

        $reponse = $bdd->query('SELECT * FROM bdd_promo.etudiant order by Nom');                                  //On récupère le contenu du tableau etudiant de la bdd
        while ($donnees = $reponse->fetch())
        {
            if ($donnees['presence'] == 1) 
            {
        ?>

        <img src="<?php echo $donnees['photo'] ?>.jpg" alt="photo_etudiant"/>
        <?php
                echo $donnees['Nom']," ";
                echo $donnees['Prénom'];

            }
        }
    ?>
</html>
