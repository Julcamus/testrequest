
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

    <div class="w3-center"><br>
      <span  class="fermetturePopup  w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      <img src="public/img/test_request_icone/InscriptionImage.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
    </div>


    <div class='zone_des_messages_erreure  container' style='display : none '> </div>

    <form class="singInForm w3-container" action="public/inscription.php" method="POST">
      <div class="w3-section">

        <label><b>Votre pseude</b></label>
        <input class="pseudo w3-input w3-border w3-margin-bottom" type="text" placeholder="Entrez votre pseudo" name="pseudo" required>
        <br>
        <label><b>Mot de passe </b></label>
        <input class="motDePasse w3-input w3-border inputFormulaire" type="password" placeholder="Entrer le mot de passe" name="psw" required><br>
        <label><b>Confirmer le mot de passe </b></label>
        <input class=" motDePasseConfirme w3-input w3-border" type="password" placeholder="Confirmer votre mot de passe " name="pswConfirm" required>
        <br>
        <label><b>Votre adresse mail</b></label>
        <input class="email w3-input w3-border" type="email" placeholder="Entrez votre adresse mail " name="email" required>
        <button class="buttonSubmit w3-button w3-block w3-green w3-section w3-padding" type="">S'inscrire</button>

      </div>
    </form>

    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button style.display='none'" type="button" class="fermetturePopup w3-button w3-red">Cancel</button>

    </div>

  </div>
</div>