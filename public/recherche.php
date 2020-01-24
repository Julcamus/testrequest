<?php
// Page pour faire les recherches d'epreuves de l'utilisateur
if (!empty($_POST)) {
  extract($_POST);
  //var_dump($_POST);
  $classe = "";
  $serie = "";
  $reponse = NULL;
  $resultatFinal = array();
  $tailleResultat = 0;
  if (preg_match('/\//', $niveaux) == 1 or preg_match('/\//', $niveaux) == 1) {
    $niveauxEnTableaux = explode("/", $niveaux);
    $classe = $niveauxEnTableaux[0];
    $serie = $niveauxEnTableaux[1];
  } else {
    $classe = $niveaux;
  }



  require("../requettes/connectionFileToDataBase.php");
  // Requette pour niveaux secondaire , matiere
  if ($serie = "") {
    if ($niveaux != Null and $matiere != Null and $formation == "" and $annee == "" and $ecole == "") {
      $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND classe = ? ");
      $requette->execute([$matiere, $classe]);
      $reponse = $requette->fetchAll();
    } elseif ($niveaux != Null and $matiere != Null and $ecole != NULL and $formation == "" and $annee == "") {
      // Requette pour niveaux secondaire , matiere , ecole 
      $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND classe = ?  AND ecole = ? ");
      $requette->execute([$matiere, $classe,  $ecole]);
      $reponse = $requette->fetchAll();
    } elseif ($niveaux != Null and $matiere != Null and $annee != NULL and $formation == "" and $ecole == "") {
      // Requette pour niveaux secondaire , matiere , annee
      $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND classe = ?  AND annee = ? ");
      $requette->execute([$matiere, $classe,  $annee]);
      $reponse = $requette->fetchAll();
    } elseif ($niveaux != Null and $matiere != Null and $formation != NULL and $annee == "" and $ecole == "") {
      // Requette pour niveaux universitaire , matiere ,formation , classe , serie
      $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND formation = ? AND classe = ?  ");
      $requette->execute([$matiere, $formation,  $classe,]);
      $reponse = $requette->fetchAll();
    } elseif ($niveaux != Null and $matiere != Null and $ecole != NULL and $formation != NULL and $annee == "") {
      // Requette pour niveaux universitaire , matiere ,formation , classe , serie , ecole
      $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ?  AND formation = ? AND classe = ?  AND ecole = ? ");
      $requette->execute([$matiere, $formation,  $classe,  $ecole]);
      $reponse = $requette->fetchAll();
    } elseif ($niveaux != Null and $matiere != Null and $annee != NULL and $formation != NULL and $ecole == "") {
      // Requette pour  niveaux universitaire , matiere ,formation , classe , serie, annee
      $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND formation = ? AND classe = ?  AND annee = ? ");
      $requette->execute([$matiere, $formation, $classe,  $annee]);
      $reponse = $requette->fetchAll();
    }

    $tailleResultat = count($reponse);
  }
} else {
  if ($niveaux != Null and $matiere != Null and $formation == "" and $annee == "" and $ecole == "") {
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND classe = ? AND serie = ? ");
    $requette->execute([$matiere, $classe, $serie]);
    $reponse = $requette->fetchAll();
  } elseif ($niveaux != Null and $matiere != Null and $ecole != NULL and $formation == "" and $annee == "") {
    // Requette pour niveaux secondaire , matiere , ecole 
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND classe = ? AND serie = ? AND ecole = ? ");
    $requette->execute([$matiere, $classe, $serie, $ecole]);
    $reponse = $requette->fetchAll();
  } elseif ($niveaux != Null and $matiere != Null and $annee != NULL and $formation == "" and $ecole == "") {
    // Requette pour niveaux secondaire , matiere , annee
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND classe = ? AND serie = ? AND annee = ? ");
    $requette->execute([$matiere, $classe, $serie, $annee]);
    $reponse = $requette->fetchAll();
  } elseif ($niveaux != Null and $matiere != Null and $formation != NULL and $annee == "" and $ecole == "") {
    // Requette pour niveaux universitaire , matiere ,formation , classe , serie
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND formation = ? AND classe = ? AND serie = ? ");
    $requette->execute([$matiere, $formation,  $classe, $serie]);
    $reponse = $requette->fetchAll();
  } elseif ($niveaux != Null and $matiere != Null and $ecole != NULL and $formation != NULL and $annee == "") {
    // Requette pour niveaux universitaire , matiere ,formation , classe , serie , ecole
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ?  AND formation = ? AND classe = ? AND serie = ? AND ecole = ? ");
    $requette->execute([$matiere, $formation,  $classe, $serie, $ecole]);
    $reponse = $requette->fetchAll();
  } elseif ($niveaux != Null and $matiere != Null and $annee != NULL and $formation != NULL and $ecole == "") {
    // Requette pour  niveaux universitaire , matiere ,formation , classe , serie, annee
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND formation = ? AND classe = ? AND serie = ? AND annee = ? ");
    $requette->execute([$matiere, $formation, $classe, $serie, $annee]);
    $reponse = $requette->fetchAll();
  }

  $tailleResultat = count($reponse);
}




//if ($reponse != NULL) {

  $i = 0;

  while ($i < $tailleResultat) {

    $epreuveNiveau = " ";
    if ($reponse[$i]['serie'] == NULL) {
      $epreuveNiveau = $reponse[$i]['classe'];
    } else {
      $epreuveNiveau = $reponse[$i]['classe'] . "/" . $reponse[$i]['serie'];
    }


    echo " 
  <div class='swiper-slide' style='margin-right:15px;'>
  <div class='thumbnail' style='border:1px solid silver'>
      <div><img style='height:110px;width:100%' src='public/img/logoEpreuves/pdfico22.png'></div>

      <div class='caption  ' style=''>
          <p class='' style='font-weight:bold'>" . $reponse[$i]['matiere'] . "</p>
          <p class='' style='font-weight:bold'>" . $epreuveNiveau . "</p>
          <p class='' style='font-weight:bold;letter-spacing:1px'>" . $reponse[$i]['ecole'] . "</p>
          <p style='text-align:center;margin-top:25px;'> <a href='function/compilation/downloadpage.php?nom_epreuve =" . $reponse[$i]['tocken'] . "' class='click_lien'>Télécharger</a> </p>

      </div>
      </a>
  </div>
</div>
  ";

    $i++;
  }


  echo " </div>
        <!-- Add Pagination -->
        <div class='swiper-pagination'></div>
      </div> ";
//} else {
  //echo " Désolé votre recherche n'a pas trouvé de résultat";
//}
