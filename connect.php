<?php
session_start (); // on démarre la session
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_promo;charset=utf8', 'root', '', // connexion à la BDD
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    //Première étape : Authentification d'un enseignant
    $verif_login = $bdd->prepare('SELECT COUNT(*) FROM bdd_promo.personnel WHERE login = ?'); //On vérifie que le login existe dans la table
    $verif_login->execute(array($_POST['login']));
    if($verif_login->fetchColumn() != 0) // Si le login rentré correspond à un login d'enseignant
        {    
        // Sélection du password pour le login saisi
        $reponse_login = $bdd->prepare('SELECT MDP FROM bdd_promo.personnel WHERE login = ? LIMIT 1'); // Préparation de la requête
        $reponse_login->execute(array($_POST['login'])); // Exécution
        //On vérifie que le mot de passe correspond
        if ($_POST['mdp'] == $reponse_login->fetchColumn())
            {
                $reponse_login->closeCursor(); // Termine le traitement de la requête
                //on stocke les variables dans les variables de session
                $_SESSION['login']=$_POST['login'];
                $_SESSION['mdp']=$_POST['mdp'];
                $reponse_login->closeCursor(); // Termine le traitement de la requête login 
                header('Location: pageprof.php'); //on dirige vers la page principale
            }
            else
                {
                    header('Location: accueil.php'); //On renvoie vers la page d'accueil
                    $reponse_login->closeCursor(); // Termine le traitement de la requête login 
                    $_SESSION['essais']=$_SESSION['essais']+1;
                }
        }
     else // Si le login ne correspond pas à un login d'enseignant
        {
            //On vérifie que le login existe dans la table étudiant
            $verif_login = $bdd->prepare('SELECT COUNT(*) FROM bdd_promo.etudiant WHERE login = ?'); 
            $verif_login->execute(array($_POST['login']));
            if($verif_login->fetchColumn() !=0) // Si il existe dans la table étudiant
                {    
                // Si le login est existant : sélection du password pour le login saisi
                $reponse_login = $bdd->prepare('SELECT MDP FROM bdd_promo.etudiant WHERE login = ? LIMIT 1'); // Préparation de la requête
                $reponse_login->execute(array($_POST['login'])); // Exécution
                 //On vérifie que le mot de passe correspond
                if ($_POST['mdp'] == $reponse_login->fetchColumn())
                    {
                    $reponse_login->closeCursor(); // Termine le traitement de la requête
                     //on stocke les variables dans les variables de session
                    $_SESSION['login']=$_POST['login'];
                    $_SESSION['mdp']=$_POST['mdp'];
                    $reponse_login->closeCursor(); // Termine le traitement de la requête login 
                    header('Location: pageetudiant.php'); //on dirige vers la page principale
                    }
                }
            else
                {
                    header('Location: accueil.php'); // Si il manque login ou mdp, on renvoie vers la page d'accueil
                    $reponse_login->closeCursor(); // Termine le traitement de la requête login 
                    $_SESSION['essais']=$_SESSION['essais']+1;
                }  
        }
?>