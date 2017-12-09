<?php



$login_valide = 'logintest';
$mdp_valide = 'mdptest';

if(empty($_POST['login']) || empty($_POST['mdp']))
{
    header('Location: accueil.php'); // Si il manque login ou mdp, on renvoie vers la page d'accueil
    exit();
}
    else
    {
        //require('config.php'); // Vérification via le fichier config.php
        if ($_POST['login'] == $login_valide && $_POST['mdp'] == $mdp_valide )
        {
            session_start (); // on démarre la session 
            $_SESSION_
            echo 'Vous êtes identifié !';
        }
    }
?>