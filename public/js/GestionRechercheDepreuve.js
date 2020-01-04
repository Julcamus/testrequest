/*
        ----------\\\ Ce code permet de gerer l'affichage des
                    |    matieres , ecole , et Niveaux en stock à l'uitilisateur lors 
                    |   de la recherche
        ----------///
*/

var formulaireDeRecherche = document.querySelector('#formulaireDeRecherche')
var matiereInput = document.querySelector('#matiereInput')
var notionInput = document.querySelector('#notionInput')
var anneeInput = document.querySelector('#anneeInput')
var niveauInput = document.querySelector('#niveauInput')
var sousMatiereInput = document.querySelector('#sousMatiereInput')
var sousEcoleInput = document.querySelector('#sousEcoleInput')
var sousNiveauInput = document.querySelector('#sousNiveauInput')
var sousDivElement = document.querySelectorAll('.sousDivElement')
var bouttonDeRecherche = document.querySelector('#bouttonDeRecherche')
var messageInputChampVide = new Array()
var messageDeNomRemplissageDiv = document.querySelector('.messageDeNomRemplissageDiv')

sousDiv = document.querySelectorAll('.sousDiv')


matiereInput.addEventListener('click', function () {
    this.setAttribute('placeholder', 'Matiere')
    for (var j = 0; j < sousDiv.length - 1; j++) {
        sousDiv[j].style.display = 'none'
    }
    sousMatiereInput.style.display = 'block'


})
matiereInput.addEventListener('blur', function () {

    this.setAttribute('placeholder', 'Matiere')
})


ecoleInput.addEventListener('focus', function () {
    this.setAttribute('placeholder', 'Ecole')
    for (var j = 0; j < sousDiv.length - 1; j++) {
        sousDiv[j].style.display = 'none'
    }
    sousEcoleInput.style.display = 'block'
})
ecoleInput.addEventListener('blur', function () {

    this.setAttribute('placeholder', 'Ecole')

})

niveauInput.addEventListener('focus', function () {
    this.setAttribute('placeholder', 'Niveaux')
    for (var j = 0; j < sousDiv.length; j++) {
        sousDiv[j].style.display = 'none'
    }
    sousNiveauInput.style.display = 'block'
})
niveauInput.addEventListener('blur', function () {

    this.setAttribute('placeholder', 'Nivaux')

})

anneeInput.addEventListener('click', function () {
    for (var j = 0; j < sousDiv.length; j++) {
        sousDiv[j].style.display = 'none'
    }
})

notionInput.addEventListener('click', function () {
    for (var j = 0; j < sousDiv.length; j++) {
        sousDiv[j].style.display = 'none'
    }
})

for (var i = 0; i < sousDivElement.length; i++) {

    sousDivElement[i].addEventListener('click', function () {
        var divPapa = this.parentNode.parentNode
        var inputConsidere = divPapa.querySelector('input')
        inputConsidere.value = this.textContent

    })
}

bouttonDeRecherche.addEventListener('click', function (e) {
    e.preventDefault()
    for (var j = 0; j < sousDiv.length; j++) {
        sousDiv[j].style.display = 'none'
    }

    if (matiereInput.value == '') {
        messageInputChampVide.push(" <p>Vous devez renseigner  <span style='color:#EF3F0E'>La Matière </span> </p>")
    }
    if (niveauInput.value == '') {
        messageInputChampVide.push(" <p>Vous devez renseigner  <span style='color:#EF3F0E'>Le Niveau </span> </p>")
    }
    if (niveauInput.value == '' && matiereInput.value == '' && ecoleInput.value == '' && notionInput.value == '' && anneeInput.value == '') {
        for (var l = 0; l < messageInputChampVide.length; l++) {
            delete messageInputChampVide[l]
        }
        messageInputChampVide.push(" <p>Veuillez remplir les <span style='color:#EF3F0E'>champs  </span> pour que je puisse vous aider</p>")
    }
    if (messageInputChampVide != null) {

        var contenu = document.createElement('div')
        var closeButton = document.createElement('span')
        
        


        contenu.className = 'messageCaseRechercheNonRempli'

        for (var k = 0; k < messageInputChampVide.length; k++) {
            contenu.innerHTML = ''
            contenu.innerHTML += messageInputChampVide[k]
        }

        messageDeNomRemplissageDiv.innerHTML = ''

      
        messageDeNomRemplissageDiv.appendChild(contenu)
        contenu.appendChild(closeButton)

 
    }


})
