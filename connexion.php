<?php
require('./partials/header.php');

   if(isset($_POST['formconnexion']))
   {
     $mailconnect = htmlspecialchars($_POST['mailconnect']);
     $mdpconnect = sha1($_POST['mdpconnect']);
     if(!empty($mailconnect) && !empty($mdpconnect))
     {
       $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND password = ?");
       $requser->execute(array($mailconnect, $mdpconnect));
       $userexist = $requser->rowCount();
       if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         echo "<meta http-equiv='refresh' content='0; URL=travel.php' />";
       }
       else {
         $msg = "Mauvais mail ou mot de passe";
       }
     }
     else {
       $msg = "Tous les champs doivent être complétés !";
     }
   }

?>
      <div align="center" class="container">
        <h3>Connexion</h3>
        <div class="row">
            <form class="col s12" method="POST" action="">
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Votre mail"
                id="mail"
                type="email"
                name="mailconnect"
                value="<?php if(isset($mailconnect)) { echo $mailconnect; } ?>"
                class="validate">
                <label for="mail">Mail</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Votre mot de passe"
                id="mdp"
                type="password"
                name="mdpconnect"
                class="validate">
                <label for="mdp">Mot de passe</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                class="waves-effect waves-light btn"
                type="submit"
                name="formconnexion"
                value="Se connecter"
                onclick=toast
                />
              </div>
            </form>
        </div>
      </div>
      <?php
      require('./partials/footer.php');
      ?>
