<?php
	session_start();
	$login=$_POST['login'];
	$mdp=$_POST['mdp'];
	$v=$_SESSION['v'];
	include('bdd_connect.php');
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
