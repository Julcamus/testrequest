<?php

function selectionDesEcolesNiveauxMatiere()

{

	/*
			ce code permet de récuperer depuis la base de donné la liste complète des écoles , des    niveaux et des matières
		*/

	require("requettes/connectionFileToDataBase.php");
	$requetteFormation  = $connection->query('SELECT  formation  FROM bank_epreuve ');
	$requetteMatiere  = $connection->query('SELECT  matiere  FROM bank_epreuve ');
	$requetteEcole  = $connection->query('SELECT  ecole  FROM bank_epreuve ');
	$requetteNiveaux  = $connection->query('SELECT  classe , serie  FROM bank_epreuve ');
	$lesNiveaux = array();
	while ($reponse = $requetteNiveaux->fetch()) {
		if ($reponse['serie'] == "" and in_array($reponse['classe'], $lesNiveaux) == False) {
			$lesNiveaux[] =  $reponse['classe'];
		} elseif ($reponse['serie'] != "" and in_array($reponse['classe'] . '/' . $reponse['serie'], $lesNiveaux) == False) {
			$lesNiveaux[] = $reponse['classe'] . "/" . $reponse["serie"];
		}
	}

	$lesEcoles  = array();
	$lesMatieres = array();
	$lesFormations = array();

	$lesEcoles = remplissageTableaux($requetteEcole, 'ecole', $lesEcoles);
	$lesMatieres = remplissageTableaux($requetteMatiere, 'matiere', $lesMatieres);
	$lesFormation = remplissageTableaux($requetteFormation, 'formation', $lesFormations);

	$resultat = array($lesNiveaux, $lesEcoles, $lesMatieres, $lesFormation);



	return $resultat;
}

// Cette function est appelé dans la fonction selectionDesEcolesNiveauxMatiere()
function remplissageTableaux($requetteName, $requetteType, $tableauName)
{
	while ($reponse = $requetteName->fetch()) {
		if (in_array($reponse[$requetteType], $tableauName) == FALSE) {
			$tableauName[] = $reponse[$requetteType];
		}
	}
	return $tableauName;
}


function afficherLesEpreuves()
{
	// Cette fonction permet d'afficher les épreuves sur la home

	require("/requettes/connectionFileToDataBase.php");



	$requette = $connection->query("SELECT tocken , matiere ,  classe , serie ,  icone FROM bank_epreuve LIMIT 24");
	$reponse = $requette->fetchAll();

	$i = 6;

	while ($i <= 24) {
		$numeroLigne = $i / 6;
		echo "<div class= 'row ligne_une_epreuve ' id='ligne" . $numeroLigne . "'  >";

		for ($j = 0; $j <= 5; $j++) {
			$niveau = " ";
			$element = $j + ($i - 6);
			$tocken_epreuve  = $reponse[$element]['tocken'];
			if ($reponse[$element]['serie'] != "") {
				$niveau = $reponse[$element]['classe'] . '/' . $reponse[$element]['serie'];
			} else {
				$niveau = $reponse[$element]['classe'];
			}

			$matiere = $reponse[$element]['matiere'];
			$icone = $reponse[$element]['icone'];
			echo "
			
		<div class='col-lg-2  une_epreuve ' style='margin-bottom:20px;'>
		<div class='thumbnail'>
			<img src='public/img/logoEpreuves/" . $icone . "'  >
			<div class='caption epreuve_info ' style='margin-top:3px'>
			<p class='matiere' >" . $matiere . "</p>
			 <p class='classe'>" . $niveau . "</p><br><br>
            <p style='text-align:center'> <a href='function/compilation/downloadpage.php?nom_epreuve =" . $tocken_epreuve . "' class='click_lien'>Télécharger</a> </p>
           
			</div>
		  </a>
		</div>
	  </div> ";
		}

		echo "</div>";
		$i += 6;
	}
}


function selectionDesNiveauxMatieresFormationsEcoles()
{
	// Cette fonction permet d'avoir la liste de tous les niveaux , matieres , formations et ecoles
	$resultat = array(
		"niveaux" => array(),
		"matieres" => array(),
		"formations" => array(),
		"ecoles" => array()
	);
	require("requettes/connectionFileToDataBase.php");
	$requette = $connection->query("SELECT matiere , classe , serie , formation , ecole  FROM bank_epreuve ");
	while ($reponse = $requette->fetch()) {
		if ($reponse["serie"] == null) {
			$resultat["niveaux"][] = $reponse["classe"];
		} elseif ($reponse["serie"] != null) {
			$resultat["niveaux"][] = $reponse["classe"] . '/' . $reponse["serie"];
		}
		$resultat["matieres"][] = $reponse["matiere"];
		$resultat["formations"][] = $reponse["formation"];
		$resultat["ecoles"][] = $reponse["ecole"];

		$resultat["matieres"] = array_unique($resultat["matieres"]);
		$resultat["formations"] = array_unique($resultat["formations"]);
		$resultat["ecoles"] = array_unique($resultat["ecoles"]);
		$resultat["niveaux"] =  array_unique($resultat["niveaux"]);
	}

	return $resultat;
}
