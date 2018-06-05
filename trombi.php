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
        $id_cours= /*$_SESSION['id_cours']*/ 1;
        $id_promo= /*$_SESSIOn['id_promo']*/ "FI1A";
        $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant WHERE etudiant.presencetemp = 0 AND etudiant.id_promo = ?');                                  //On récupère le contenu du tableau etudiant de la bdd
        $reponse->execute(array($id_promo));
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
                   <option value="2">Absence justifiée</option>
                   <option value="3">Absence injustifiée</option>
                   <option value="4">Retard</option>
               </select>
           </p>
        </form>
        <?php } ?>
</html>