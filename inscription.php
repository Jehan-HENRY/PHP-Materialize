<?php
require('./partials/header.php');
   if(isset($_POST['forminscription']))
    {
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['mail']);
      $mail2 = htmlspecialchars($_POST['mail2']);
      $mdp = sha1($_POST['mdp']);
      $mdp2 = sha1($_POST['mdp2']);

      if(!empty($_POST['pseudo'])
      && !empty($_POST['mail'])
      && !empty($_POST['mail2'])
      && !empty($_POST['mdp'])
      && !empty($_POST['mdp2']))
      {
        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255)
        {
          if($mail == $mail2)
          {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
              $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
              $reqmail->execute(array($mail));
              $mailexist = $reqmail->rowCount();
              if($mailexist == 0)
              {
                if($mdp == $mdp2)
                {
                  $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, password) VALUES(?, ?, ?)");
                  $insertmbr->execute(array($pseudo, $mail, $mdp));
                  echo "<meta http-equiv='refresh' content='0; URL=connexion.php' />";

                }
                else {
                  $msg = "Vos mots de passe ne correspondent pas !";
                }
              }
              else {
                $msg = "Adresse mail déjà utilisée !";
              }
            }
            else {
              $msg = "Voter adresse mail n'est pas valide !";
            }
          }
          else {
            $msg = "Vos adresses mail ne correspondent pas !";
          }
        }
        else {
          $msg = "Votre pseudo ne doit pas dépasser 255 caractères !";
        }
      }
      else {
        $msg = "Tous les champs doivent être complétés !";
      }
    }
?>
      <div align="center" class="container">
        <h3>Inscription</h3>
        <div class="row">
            <form class="col s12" method="POST" action="">
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Votre pseudo"
                id="pseudo"
                type="text"
                name="pseudo"
                value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"
                class="validate">
                <label for="pseudo">Pseudo</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Votre mail"
                id="mail"
                type="email"
                name="mail"
                value="<?php if(isset($mail)) { echo $mail; } ?>"
                class="validate">
                <label for="mail">Mail</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Confirmez votre mail"
                id="mail2"
                type="email"
                name="mail2"
                value="<?php if(isset($mail2)) { echo $mail2; } ?>"
                class="validate">
                <label for="mail2">Confirmation du mail</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Votre mot de passe"
                id="mdp"
                type="password"
                name="mdp"
                class="validate">
                <label for="mdp">Mot de passe</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Confirmez votre mot de passe"
                id="mdp2"
                type="password"
                name="mdp2"
                class="validate">
                <label for="mdp2">Confirmation du mot de passe</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                class="waves-effect waves-light btn"
                type="submit"
                name="forminscription"
                value="Je m'inscris"
                onclick=toast
                />
            </div>
          </form>
        </div>
      </div>
      <?php
      require('./partials/footer.php');?>
