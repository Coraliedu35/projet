<?php
        session_start();
        include('bdd_connect.php');
?>
<!DOCTYPE html>
<html>
    <header>
        <link rel="stylesheet" href="style.css" />
    </header>
    <?php
        $id_cours= $_SESSION['id_cours'];
        $id_promo= $_SESSIOn['id_promo'];
        $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant WHERE etudiant.presencetemp = 0 AND etudiant.id_promo = ?');                                  //On récupère le contenu du tableau etudiant de la bdd
        $reponse->execute(array($id_promo));
        while ($donnees = $reponse->fetch())
        {
            if ($donnees['presencetemp'] == 0) 
            {
    ?>
        <img class='trombi' src="<?php echo $donnees['photo']; ?>.jpg" alt="photo_etudiant"/>
    <?php
                echo $donnees['Nom']." ";
                echo $donnees['Prénom'];
            }
    ?>
        <form method="post" action="corrige.php">
            <input type="text" name="present" value="<?php echo $donnees['login'] ?>" class="cache" />
            <input type="submit" value="Présent"/>
        </form>
        <?php } ?>
</html>