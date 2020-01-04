// Ce fichier permet de gerer les valeurs entrÃ©es par l'utilsateur lors d inscription

 
var nomUtilisateur = document.querySelector('.nomUtilisateur')
var motDePasse = document.querySelector('.motDePasse')
var motDePasseConfirme = document.querySelector('.motDePasseConfirme')
var email = document.querySelector('.email')
var bouttonSubmit = document.querySelector('.buttonSubmit')
var erreureMessage = document.querySelector('.zone_des_messages_erreure')
var pseudo = document.querySelector('.pseudo')
var formulaire = document.querySelector('.singInForm')
var fermeture = document.querySelector(".fermetturePopup") ;
var fenetre = document.getElementById('id01') 
formulaire.addEventListener('submit', function (e) {
  e.preventDefault()
  
  
  var xmlhttp = initialisation()
  xmlhttp.onreadystatechange = function(){
    if(this.status == 200 && this.readyState == 4){
      erreureMessage.style.dispaly='block'
      erreureMessage.innerHTML = ''
      var bon =/acceptées/
      var mauvais =/Désolé/
      if(bon.test(this.responseText))
      {
        
        erreureMessage.style.backgroundColor='#4CAF50'
        erreureMessage.style.textAlign = 'center'
        erreureMessage.style.borderColor  = '#4CAF50'
        erreureMessage.style.display='block'
        erreureMessage.innerHTML =this.responseText 
        
      }
      else if(mauvais.test(this.responseText))
      {
       
        var errors = this.responseText.split(".")
        for(var i = 0 ; i < errors.length - 1; i++){
          erreureMessage.style.display='block'
          erreureMessage.innerHTML += '.'+errors[i] + '<br>'
     }
       
      
      }
      }

  
    }
  xmlhttp.open('POST', 'public/inscription.php', true)
  var donne = new FormData(formulaire)

  xmlhttp.send(donne)


})



function initialisation() {
  var xmlhttp;

  if (window.XMLHttpRequest) {
    // code for modern browsers
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for old IE browsers
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  return xmlhttp;
  
}

// Gestion de la fermetture du Popup

fermeture.addEventListener('click',function(){
  
  pseudo.value = " " ; 
  email.value = " " ; 
  erreureMessage.style.display = 'none' ; 
  fenetre.style.display = "none"
})

/*bouttonSubmit.addEventListener('click',function(e){
   e.preventDefault()
    // Code Ajax
    var xmlhttp = initialisation()
    console.log(xmlhttp)
    xmlhttp.onreadystatechange = function(){
    if(this.status == 200 && this.readyState == 4){

    var errors = this.responseText.split(".")
    if(errors != null){
      erreureMessage.style.display= 'block'
      erreureMessage.innerHTML = ''
       for(var i = 0 ; i < errors.length - 1; i++){
         erreureMessage.innerHTML += '.'+errors[i] + '<br>'
    }
    }
}

}
xmlhttp.open('POST','function/signInTraitement.php',true)
var donne = new FormData(formulaire)

xmlhttp.send(donne)
// Fin du code Ajax
})


function initialisation(){
    var xmlhttp ;

    if (window.XMLHttpRequest) {
   // code for modern browsers
   xmlhttp = new XMLHttpRequest();
 } else {
   // code for old IE browsers
   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

    return xmlhttp ;
}

*/




