<?php
	include('bdd_connect.php');																		//connexion à la bdd
	session_start();
	$edt = file_get_contents('edt/ADECal (2).ics');														//récupération du fichier calendrier

	/*Utilisation d'expressions régulières afin de récupérer les lignes qui nous intéressent*/
	$regExpMatiere = '/'.'SUMMARY:(.*)'.'/';														//Les '/' sont des délimiteurs
	$regExpDebut = '/'.'DTSTART:(.*)'.'/';
	$regExpFin = '/'.'DTEND:(.*)'.'/';
	$regExpProf = '/'.'DESCRIPTION:(.*)'.'/';
	$regExpSalle = '/'.'LOCATION:(.*)'.'/';

	/*On entre les expressions régulières dans des tableau*/
	$l = preg_match_all($regExpMatiere, $edt, $tabMatiere, PREG_PATTERN_ORDER);						
	preg_match_all($regExpDebut, $edt, $tabDebut, PREG_PATTERN_ORDER);
	preg_match_all($regExpFin, $edt, $tabFin, PREG_PATTERN_ORDER);
	preg_match_all($regExpProf, $edt, $tabProf, PREG_PATTERN_ORDER);
	preg_match_all($regExpSalle, $edt, $tabSalle, PREG_PATTERN_ORDER);

	$id=0;
	/*boucle pour chaque paragraphe event du fichier*/
	for ($i=0 ; $i < $l ; ++$i)
	{
		$id=$id+1;
		$_SESSION['id_cours']=$id;
		// Récupération de l'horaire de début
		$anneede = substr($tabDebut[0][$i], 8);
		$anneedebut = substr($anneede,0,4);
		$moisdebut = substr($tabDebut[0][$i], 12, 2);
		$jourdebut = substr($tabDebut[0][$i], 14, 2);
		$heuredebut = substr($tabDebut[0][$i], 17, 2);
		$mindebut = substr($tabDebut[0][$i], 19, 2);
		$hordebut = $anneedebut.'-'.$moisdebut.'-'.$jourdebut.' '.$heuredebut.':'.$mindebut;

		// Récupération de l'horaire de fin
		$anneef = substr($tabFin[0][$i], 6);
		$anneefin=substr($anneef,0,4);
		$moisfin = substr($tabFin[0][$i], 10, 2);
		$jourfin = substr($tabFin[0][$i], 12, 2);
		$heurefin = substr($tabFin[0][$i], 15, 2);
		$minfin = substr($tabFin[0][$i], 17, 2);
		$horfin = $anneefin.'-'.$moisfin.'-'.$jourfin.' '.$heurefin.':'.$minfin;

		//Récupération de la matière
		$matiere = substr($tabMatiere[0][$i], 8);
		echo " cours de ".$matiere;
		$groupe=strstr($matiere,"Gr.");
		$groupe=substr($groupe,3);
		echo $groupe;

		/*Traitement de la description, récupération des enseignants*/
		$desc = substr($tabProf[0][$i], 16);
		$k=explode('\n',$desc);
		
		if (isset($k[3])){
			if(strlen($k[3])>2){
				list($promo,$prof1,$prof2,$export)=$k;
				echo 'cours avec '.$prof1.' et '.$prof2;
				$nom=explode(' ',$prof1);
			}
			else{
				list($promo,$prof,$export)=$k;
				echo 'cours avec '.$prof;
				$nom=explode(' ',$prof);			
				}
		}
		else{
			list($promo,$export)=$k;
			$prof="Prof Prof";
			$nom=explode(' ',$prof);
		}

		$salle = substr($tabSalle[0][$i],9);														//Récupération de la salle
		echo "<br>";

		/*Récupération de l'id_prof dans la bdd*/
		$rec=$bdd->prepare('SELECT `id_prof` FROM `personnel` WHERE `Nom`=? AND `Prénom`=?');
		$rec->execute(array($nom[0],$nom[1]));
		while($rep=$rec->fetch())
		{
			$idpr=$rep['id_prof'];
		}
		
		//Remplissage de la base de données
		$req = $bdd->prepare("INSERT INTO `cours` (`Matière`, `id_prof`, `id_promo`,`salle`,`debut`,`fin`,`id_cours`) VALUES (:mat,:prof,:promo,:salle,:debut,:fin,:id)");
		$req->execute(array('mat'=>$matiere,'prof'=>$idpr,'promo'=>$promo,'salle'=>$salle,'debut'=>$hordebut,'fin'=>$horfin,'id'=>$id));
	}

?>