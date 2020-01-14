<?php
// Page pour faire les recherches d'epreuves de l'utilisateur
if (!empty($_POST)) {
  extract($_POST);

  var_dump($_POST);
  $reponse = NULL;
  $reponsePlusPrecis = NULL;
  $classe = "";
  $serie = "";
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

  if ($niveaux != Null and $matiere != Null and $formation == "" and $annee == "" and $ecole == "") {
    // Requette pour niveaux secondaire , matiere
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
  } elseif ($niveaux != Null and $matiere != Null and $annee != NULL and $formation == "" and $ecole != NULL) {
    // Requette pour niveaux secondaire , matiere , annee , ecole
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND classe = ? AND serie = ? AND annee = ? AND ecole = ?");
    $requette->execute([$matiere, $classe, $serie, $annee, $ecole]);
    $reponse = $requette->fetchAll();
  } elseif ($niveaux != Null and $matiere != Null and $formation != NULL and $annee == "" and $ecole == "") {
    // Requette pour niveaux universitaire , matiere ,formation 
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND formation = ? AND classe = ? AND serie = ? ");
    $requette->execute([$matiere, $formation,  $classe, $serie]);
    $reponse = $requette->fetchAll();
  } elseif ($niveaux != Null and $matiere != Null and $ecole != NULL and $formation != NULL and $annee == "") {
    // Requette pour niveaux universitaire , matiere ,formation , ecole
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ?  AND formation = ? AND classe = ? AND serie = ? AND ecole = ? ");
    $requette->execute([$matiere, $formation,  $classe, $serie, $ecole]);
    $reponse = $requette->fetchAll();
  } elseif ($niveaux != Null and $matiere != Null and $annee != NULL and $formation != NULL and $ecole == "") {
    // Requette pour  niveaux universitaire , matiere ,formation , annee
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND formation = ? AND classe = ? AND serie = ? AND annee = ? ");
    $requette->execute([$matiere, $formation, $classe, $serie, $annee]);
    $reponse = $requette->fetchAll();
  } elseif ($niveaux != Null and $matiere != Null and $annee != NULL and $formation != NULL and $ecole != NULL) {
    // Requette pour  niveaux universitaire , matiere ,formation , annee
    $requette  = $connection->prepare("SELECT * FROM bank_epreuve WHERE matiere = ? AND formation = ? AND classe = ? AND serie = ? AND annee = ? AND ecole = ? ");
    $requette->execute([$matiere, $formation, $classe, $serie, $annee, $ecole]);
    $reponse = $requette->fetchAll();
  }
 
 // Gestion de la précision de la notion par l'utilisateur  
    if ($reponse != NULL) {
      $pas = 0 ; 
      foreach ($reponse as $element => $value) {
        
        $notionsMots = explode(" ", $notion);
        $nombreNotionsMots = count($notionsMots);
         
        $niveauxDeCompatibilite = 0;
        for ($i = 0; $i < $nombreNotionsMots ; $i++) {
          if (preg_match('/'.$notionsMots[$i].'/i', $value['description']) == 1) {
            $niveauxDeCompatibilite ++ ; 
          }
        }
        if($niveauxDeCompatibilite >= 1)
        {
          $reponsePlusPrecis = $value ; 
          unset($reponse[$pas]) ; 
        }
      }
      $pas ++ ; 
    }

    echo 'Le resultat géné est : ' ; 
    var_dump($reponse) ; 
    echo 'Le résultat précis donne : ' ; 
    var_dump($reponsePlusPrecis) ; 
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/home.css">

  <!-- Demo styles -->
  <style>
    /* body {
      background: #262626;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }*/

    .swiper-container {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 200px;

      background-color: #fff;
    }
  </style>
</head>

<body>
  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <?php
      $i = 0;

      while ($i < $tailleResultat) {

        $epreuveNiveau = " ";
        if ($reponse[$i]['serie'] == NULL) {
          $epreuveNiveau = $reponse[$i]['classe'];
        } else {
          $epreuveNiveau = $reponse[$i]['classe'] . "/" . $reponse[$i]['serie'];
        }
        echo " 
          <div class='swiper-slide' >
          <div class='imgBx'>
            <img src='img/logoEpreuves/francais.jpg' style='width:100%;'>
          </div>
          <div class='details caption epreuve_info'>
            <p class='matiere'>" . $reponse[$i]['matiere'] . "</p>
            <p class='classe'>" . $epreuveNiveau . "</p><br><br>
            <p style='text-align:center'> <a href='function/compilation/downloadpage.php?nom_epreuve =' class='click_lien'>Télécharger</a> </p>
          </div>
        </div>
              ";

        $i++;
      }

      ?>





    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>

  <!-- Swiper JS -->
  <script src="js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
</body>

</html>