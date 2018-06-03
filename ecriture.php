<?php
	session_start();
	$login=$_POST['login'];
	$mdp=$_POST['mdp'];
	$v=$_SESSION['v'];
	include('bdd_connect.php');
    // Récupéraiton du temps de génération du QR code
    $req_temps_ref = $bdd-> prepare('SELECT horaire FROM qrcode WHERE id_cours = ? LIMIT 1');
    $req_temps_ref -> execute(array($POST['id_cours']));
    $array_temps_ref = $req_temps_ref -> fetch();
    //print_r($array_temps_ref);
    $chaine_temps_ref=implode(" ", $array_temps_ref);
    $chaine_temps_ref=substr($chaine_temps_ref, 19);
    $temps_ref=strtotime($chaine_temps_ref);
    echo $temps_ref;
    $temps=time();
    echo $temps;
   	//On vérifie que le login existe dans la table étudiant
    $verif_login = $bdd->prepare('SELECT COUNT(*) FROM bdd_promo.etudiant WHERE login = ?'); 
    $verif_login->execute(array($_POST['login']));
    // Si le login existe dans la table étudiant
    if($verif_login->fetchColumn() !=0) 
        {    
        // Sélection du password pour le login saisi
        $verif_mdp = $bdd->prepare('SELECT MDP FROM bdd_promo.etudiant WHERE login = ? LIMIT 1'); // Préparation de la requête
        $verif_mdp->execute(array($_POST['login'])); // Exécution
        //Si le mot correpond au mot de passe d'un étudiant
            if ($_POST['mdp'] == $verif_mdp->fetchColumn())
 	           {
                // si la date correspond (moins de 30 secondes après génération du QR code)
                if ($temps<=$temps_ref+30)
                {
                $verif_mdp->closeCursor(); // Termine le traitement de la requête mdp              
				$req = $bdd->prepare('UPDATE bdd_promo.etudiant SET `presencetemp` = 1 WHERE login = ?');
				$req->execute(array($login));
				alert("Votre présence a bien été enregistrée (sous réserve de validation de l'enseignant");
				header('location:accueil.php');
                }
                else
                {
                    header('Location: accueil.php'); // Si il manque login ou mdp, on renvoie vers la page d'accueil
                    $verif_mdp->closeCursor(); // Termine le traitement de la requête mdp
                }  
            }
            // Si le login n'existe pas dans la table étudiant
            else
            {
                $_SESSION['essais']=$_SESSION['essais']+1;
                $verif_login->closeCursor(); // Termine le traitement de la requête mdp
                header('Location: accueil.php'); // Si il manque login ou mdp, on renvoie vers la page d'accueil                
            }
        }
?>
