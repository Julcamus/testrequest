<?php
/*
    Cette fonction permet de gerer l'inscription des utilisateurs
*/
function inscription (){
    if (!empty($_POST)) {
        extract($_POST);
        echo "Désolé ".$pseudo ; 
    
    } 

}