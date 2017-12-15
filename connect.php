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
            session_start (); // on démarre la session et on stocke les variables dans les variables de session
            $_SESSION[login]=$_POST['login'];
            $_SESSION[mdp]=$_POST['mdp'];
            header('Location: tableauetudiants.php'); //on dirige vers la page principale
        }
    }
?>