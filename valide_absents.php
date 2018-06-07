<?php
    session_start();
    include('bdd_connect.php');
    $login_prof=/*$_SESSION['login']*/"1234";
    $reponse = $bdd->prepare('SELECT * FROM bdd_promo.etudiant WHERE etudiant.presencetemp = 0 AND etudiant.id_promo = ? ORDER BY Nom');
    $reponse->execute(array(/*$id_promo*/"FI1A"));
    while ($donnees = $reponse->fetch())
        {
            if ($donnees['presencetemp'] == 0) 
            {		
            	$login_etu=$donnees['login'];
            	$date=date('Y-m-d H:i');							
    			$login_etu;
    			$req = $bdd->prepare("INSERT INTO `absences` (`loginetu`, `nj`, `loginprof`,`date`) VALUES (:logetu,:nj,:logprof,:dt)");
				$req->execute(array('logetu'=>$login_etu,'nj'=>"1",'logprof'=>$login_prof,'dt'=>$date));
				header('location:trombi.php');
            }
        }
?>