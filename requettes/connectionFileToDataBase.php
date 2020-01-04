<?php
      // Les informations relatives à la base de donnée
      // - Sur le serveur 
     /*
     $nom_de_la_base_de_donne = "testr1237261"  ;
      $host = "91.216.107.164"  ; 
      $identifiant_base_de_donne = "testr1237261"  ; 
      $mot_de_passe_base_de_donne = "gnfdlbtxbw" ;
      $charset = "utf8mb4";
     */ 
     
      // - Information en locale
      
      $nom_de_la_base_de_donne = "ses!!ienproject2019&developperparjuliolecodeur1..."  ;
      $host = "localhost"  ; 
      $identifiant_base_de_donne = "root"  ; 
      $mot_de_passe_base_de_donne = "" ;
      $charset = "utf8mb4";
      

      // Code de connection à la base de donné

      $dsn = "mysql:host=$host;dbname=$nom_de_la_base_de_donne;charset=$charset";
      $connection = new PDO($dsn, $identifiant_base_de_donne, $mot_de_passe_base_de_donne);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>