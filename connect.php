<?php
session_start (); // on démarre la session
$login=$_POST['login'];
$mdp=$_POST['mdp'];

include('bdd_connect.php');

    //Première étape : Authentification d'un enseignant
    $verif_login = $bdd->prepare('SELECT COUNT(*) FROM bdd_promo.personnel WHERE login = ?'); //On vérifie que le login existe dans la table
    $verif_login->execute(array($_POST['login']));
    // Si le login rentré correspond à un login d'enseignant
    if($verif_login->fetchColumn() != 0)  
        {    
        // Sélection du password pour le login saisi
        $verif_mdp = $bdd->prepare('SELECT MDP FROM bdd_promo.personnel WHERE login = ? LIMIT 1'); // Préparation de la requête
        $verif_mdp->execute(array($_POST['login']));                                           // Exécution
        if ($_POST['mdp'] == $verif_mdp->fetchColumn())                                        // Si le mot de passe correspond (enseignant)
            {
                //on stocke les variables dans les variables de session
                $_SESSION['login']=$_POST['login'];
                $_SESSION['mdp']=$_POST['mdp'];
                $verif_mdp->closeCursor(); // Termine le traitement de la requête mdp
                $temps=time();
                $jour=date('d');
                echo $temps."<br>";
                /*Recherche du prof dans la bdd*/
                $rec=$bdd->prepare('SELECT `id_prof` FROM `personnel` WHERE `login` = ?');
                $rec->execute(array($_POST['login']));
                while($rep=$rec->fetch())
                {
                    $idpr=$rep['id_prof'];
                }

                /*Recherche du cours dans la bdd*/
                $req_temps_ref = $bdd->prepare('SELECT * FROM cours WHERE id_prof = ?');
                $req_temps_ref -> execute(array($idpr));

                /*comparaison de l'heure pour trouver le bon cours de la semaine*/
                while($rep=$req_temps_ref->fetch()){

                    $array_deb=array($rep['debut']);
                    $array_fin=array($rep['fin']);
                    $chaine_deb_ref=implode(" ", $array_deb);
                    $chaine_fin_ref=implode(" ", $array_fin);
                    /*découpe du jour*/
                    $jourdeb=substr($chaine_deb_ref, 8, 2);
                    $jourfin=substr($chaine_fin_ref, 8, 2);
                    /*découpe de l'heure et passage en seconde*/
                    $chaine_deb_ref=substr($chaine_deb_ref, 11);
                    $chaine_fin_ref=substr($chaine_fin_ref, 11);
                    $deb_ref=strtotime($chaine_deb_ref);
                    $fin_ref=strtotime($chaine_fin_ref);
                    /*recherche de l'heure correspondante*/
                    if($jour==$jourdeb){
                        if($deb_ref<=$temps){
                            if($temps<=$fin_ref){
                                $idc=$rep['id_cours'];
                            }
                        }
                    }
                }
                $_SESSION['id_cours']=$idc;                 //on stocke le cours dans une variable de session
                
                header('Location: pageprof.php');           //on dirige vers la page principale
            }
        else
            {
                header('Location: index.php');            //On renvoie vers la page d'accueil
                $verif_mdp->closeCursor();                  // Termine le traitement de la requête login 
                $_SESSION['essais']=$_SESSION['essais']+1;
                
            }
        }
     //Si le login ne correspond pas à un login d'enseignant
     else 
        {
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
                         //on stocke les variables dans les variables de session
                        $_SESSION['login']=$_POST['login'];
                        $_SESSION['mdp']=$_POST['mdp'];
                        $verif_mdp->closeCursor(); // Termine le traitement de la requête mdp
                        header('Location: pageetudiant.php'); //on dirige vers la page principale
                    }
                else
                {
                    header('Location: index.php'); // Si il manque login ou mdp, on renvoie vers la page d'accueil
                    $verif_mdp->closeCursor(); // Termine le traitement de la requête mdp
                    $_SESSION['essais']=$_SESSION['essais']+1;
                }  
            }
            // Si le login n'existe pas dans la table étudiant
            else
            {
                $_SESSION['essais']=$_SESSION['essais']+1;
                $verif_login->closeCursor(); // Termine le traitement de la requête mdp
                header('Location: index.php'); // Si il manque login ou mdp, on renvoie vers la page d'accueil
                
            }
        }
?>
