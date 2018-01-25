<?php
session_start (); // on démarre la session
    // $_SESSION('essais'); 
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_promo;charset=utf8', 'root', '', // connexion à la BDD
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $login = htmlspecialchars($_POST['login']); //Sécurisation des données saisies
    $mdp = htmlspecialchars($_POST['mdp']);
    $verif_login = $bdd->prepare('SELECT COUNT(*) FROM bdd_promo.personnel WHERE n° = ?'); //On vérifie que le login existe dans la table
    $verif_login->execute(array($_POST['login']));
    if($verif_login->fetchColumn() == 0) // Si il n'existe pas
        {    
            header('Location: accueil.php'); // Si il manque login ou mdp, on renvoie vers la page d'accueil
            // $nombre_essais= on incrémente le nombre de tentatives
        }
    else 
        {   // Si le login est existant : sélection du password pour le login saisi
            $reponse_login = $bdd->prepare('SELECT MDP FROM bdd_promo.personnel WHERE n° = ? LIMIT 1'); // Préparation de la requête
            $reponse_login->execute(array($_POST['login'])); // Exécution
             //On vérifie que le mot de passe correspond
            if ($mdp == $reponse_login->fetchColumn())
                {
                    $reponse_login->closeCursor(); // Termine le traitement de la requête
                     //on stocke les variables dans les variables de session
                    $_SESSION['login']=$_POST['login'];
                    $_SESSION['mdp']=$_POST['mdp'];
                    $reponse_login->closeCursor(); // Termine le traitement de la requête login 
                    header('Location: tableauetudiants.php'); //on dirige vers la page principale
                }
            else
                {
                    header('Location: accueil.php'); // Si il manque login ou mdp, on renvoie vers la page d'accueil
                    $reponse_login->closeCursor(); // Termine le traitement de la requête login 
                    exit();
                }
        }
?>