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
    ?>
