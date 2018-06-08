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
        $id_cours= /*$_SESSION['id_cours']*/"1";
        $id_promo= /*$_SESSION['id_promo']*/"FI1A";
        $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant WHERE etudiant.presencetemp = 0 AND etudiant.id_promo = ? ORDER BY Nom');
        //On récupère le contenu du tableau etudiant de la bdd
        $reponse->execute(array($id_promo));
        ?>
        <?php
        while ($donnees = $reponse->fetch())
        {
            if ($donnees['presencetemp'] == 0) 
            {
    ?>
        <img class='trombi' src="trombi/<?php echo $donnees['photo']; ?>.jpg" alt="photo_etudiant"/>
    <?php
                echo $donnees['Nom']." ";
                echo $donnees['Prénom'];
            }
    ?>
        <form method="post" action="corrige.php">
            <input type="text" name="present" value="<?php echo $donnees['login'] ?>" class="cache" />
            <input type="submit" value="Présent"/>
        </form>
        <?php } 
        $reponse->closeCursor();   
        $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant WHERE etudiant.presencetemp = 0 AND etudiant.id_promo = ? ORDER BY Nom');
        //On récupère le contenu du tableau etudiant de la bdd
        $reponse->execute(array($id_promo));
        while ($donnees = $reponse->fetch())
        {
            if ($donnees['presencetemp'] == 0) 
            {
    ?>
        <img class='trombi' src="<?php echo $donnees['photo']; ?>.png" alt="photo_etudiant"/>
    <?php
                echo $donnees['Nom']." ";
                echo $donnees['Prénom'];
            }
    ?>
        <form method="post" action="valide_absents.php">
            <input type="text" name="absent" value="<?php echo $donnees['login'] ?>" class="cache" /></br>
        <?php } ?>
        <input type="submit" value="Valider les absences"/>
        </form>
</html>