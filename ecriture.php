<?php
    session_start();
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
    $v=$_SESSION['v'];
    include('bdd_connect.php');


    $req_promo = $bdd->prepare('SELECT id_promo FROM etudiant WHERE login = ?');
    $req_promo->execute(array($login));
    while($rep_promo=$req_promo->fetch())
    {
        $id_promo = $rep_promo['id_promo'];
    }
    $id_promo="R&T ".$id_promo;

    $req_cours=$bdd->prepare('SELECT debut,fin,id_cours FROM cours WHERE id_promo = ?');
    $req_cours->execute(array($id_promo));
    while($rep_cours=$req_cours->fetch()){
        $id_cours=$rep_cours['id_cours'];
        /*traitement des horaires*/
        $array_deb=array($rep_cours['debut']);
        $array_fin=array($rep_cours['fin']);
        $chaine_deb_ref=implode(" ", $array_deb);
        $chaine_fin_ref=implode(" ", $array_fin);
        /*découpe du jour*/
        $jourdeb=substr($chaine_deb_ref, 8, 2);
        /*découpe de l'heure et passage en seconde*/
        $heure_deb_ref=substr($chaine_deb_ref, 11);
        $heure_fin_ref=substr($chaine_fin_ref, 11);
        $deb_ref=strtotime($chaine_deb_ref);
        $fin_ref=strtotime($chaine_fin_ref);

        // Récupération du temps de génération du QR code
        $req_temps_ref = $bdd->prepare('SELECT horaire FROM qrcode WHERE `id_cours` = ?');
        $req_temps_ref->execute(array($id_cours));
        while($array_temps_ref = $req_temps_ref->fetch())
        {
            $chaine_temps_ref=implode(" ", $array_temps_ref);
            $chaine_temps_ref=substr($chaine_temps_ref, 19);
            $temps_ref=strtotime($chaine_temps_ref);
            $jour=substr($chaine_temps_ref,9,2);

            if($jour==$jourdeb){
                if($deb_ref<=$temps_ref){
                    if($temps_ref<=$fin_ref){
                        $idc=$rep_cours['id_cours'];
                    }
                }
            }
        }
    }
    //récupération de la variable du QR code
    $req_qr= $bdd->prepare('SELECT qr FROM qrcode, cours WHERE qrcode.id_cours=cours.id_cours AND cours.id_cours = ?');
    $req_qr->execute (array($idc));
    while($rep_qr=$req_qr->fetch())
    {
        $qr_code = $rep_qr['qr'];
    }
    //On vérifie que le login existe dans la table étudiant
    $verif_login = $bdd->prepare('SELECT COUNT(*) FROM bdd_promo.etudiant WHERE login = ?'); 
    $verif_login->execute(array($_POST['login']));
    // Si le login existe dans la table étudiant
    if($verif_login->fetchColumn() !=0) 
        {    
        // Sélection du password pour le login saisi
        $verif_mdp = $bdd->prepare('SELECT MDP FROM bdd_promo.etudiant WHERE login = ? LIMIT 1'); // Préparation de la requête
        $verif_mdp->execute(array($login)); // Exécution
        //Si le mot correpond au mot de passe d'un étudiant
            if ($mdp == $verif_mdp->fetchColumn())
               {
                $temps=time();
                // si la date correspond (moins de 30 secondes après génération du QR code)
                if ($temps<=$temps_ref+300000)
                {
                    if ($v==$qr_code)
                    {
                        $req = $bdd->prepare('UPDATE bdd_promo.etudiant SET `presencetemp` = 1 WHERE login = ?');
                        $req->execute(array($login));
                        echo "<script> alert('Votre présence a bien été enregistrée (sous réserve de validation de l'enseignant')</script>";
                        header('Location:index.php');
                    }
                    else
                    {
                        header('Location: index.php'); // Si il manque login ou mdp, on renvoie vers la page d'accueil
                        $verif_mdp->closeCursor(); // Termine le traitement de la requête mdp
                    }  
                }
        }
    }
?>
