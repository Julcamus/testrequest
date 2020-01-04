 
<?php
/*
            || Fichier pour la gestion de  l'inscription des  utilisateurs

*/
require('../requettes/connectionFileToDataBase.php');

if (!empty($_POST)) {
    extract($_POST);
    
    $requette = $connection->prepare('SELECT * FROM  users WHERE pseudo = ?  OR email = ? ');
    $requette->execute([$pseudo , $email]);
    $reponse = $requette->fetch();
    $errors = array();
    $success = '' ; 

    if ($reponse['pseudo'] == '' &&  $psw == $pswConfirm && filter_var($email, FILTER_VALIDATE_EMAIL) && $reponse['email'] == '') {
        $alphabet = str_repeat("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",60) ; 
        $melange = str_shuffle($alphabet)  ; 
        $tocken = substr($melange ,0 , 60) ;
         
        $motDePasseHasher = password_hash($_POST['psw'] ,PASSWORD_BCRYPT) ;
        $requette2 = $connection->prepare('INSERT INTO users(pseudo,motDePasse,email,tocken,InscriptionStatus) VALUES(?,?,?,?,?) ');
        $status = 'nonValide' ;
        $requette2->execute([$pseudo, $motDePasseHasher, $email, $tocken , $status]);
        $userId = $connection->lastInsertId() ; 
       // mail($email,'Confirmation de votre compte sur testRequest' , "Afin de valider votre compte ,veuillez cliquez sur le lien ci- dessous\n\n http://localhost/sessien_2/public/validation.php?id=$userId &tocken=$tocken") ; 
        //header("location:public/validation.php") ; 
        $success ='Vos informations ont été acceptées .Veuillez cliquez sur le lien qui vous a etez envoyé dans votre boite mail' ; 
       
    }

    if ($reponse['pseudo'] != '') {
        $errors[] = 'Désolé le pseudo <span style="color:black">' . $pseudo . '</span> existe déja ; Veuillez choisir un autre .';
    }
    if ($reponse['email'] != '') {
        $errors[] = "Désolé votre email est déjà utilisé ; Veuillez choisir un autre .";
    }
    if ($psw != $pswConfirm) {
        $errors[] = 'Désolé les deux mots de passes ne sont pas les memes .';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] =  "Désolé l'email n'est pas valide . ";
    }
    if(!empty($errors)){

        foreach ($errors as $error) {
        echo  $error ;
      }
    }
    if($success != ''){
        echo $success ; 
    }
    
    
    
}


