<?php
require('./partials/header.php');

   if(isset($_SESSION['id']))
   {
     $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
     $requser->execute(array($_SESSION['id']));
     $user = $requser->fetch();

     if(isset($_POST['newpseudo']) && !empty($_POST['newpseudo']) && $_POST['newpseudo'] != $user['pseudo'])
     {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
        echo "<meta http-equiv='refresh' content='0; URL=profil.php?id=".$_SESSION['id']."' />";
     }

     if(isset($_POST['newmail']) && !empty($_POST['newmail']) && $_POST['newmail'] != $user['mail'])
     {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
        echo "<meta http-equiv='refresh' content='0; URL=profil.php?id=".$_SESSION['id']."' />";

     }

     if(isset($_POST['newmdp1']) && !empty($_POST['newmdp1']) && ($_POST['newmdp2']) && !empty($_POST['newmdp2']))
     {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']);

        if($mdp1 == $mdp2)
        {
          $insertmdp = $bdd->prepare("UPDATE membres SET password = ? WHERE id = ?");
          $insertmdp->execute(array($mdp1, $_SESSION['id']));
          echo "<meta http-equiv='refresh' content='0; URL=profil.php?id=".$_SESSION['id']."' />";
        }
        else
        {
          $msg = "Vos deux mots de passe ne correspondent pas !";
        }
     }
     if(isset($_POST['newpseudo']) && $_POST['newpseudo'] == $user['pseudo'])
     {
       echo "<meta http-equiv='refresh' content='0; URL=profil.php?id=".$_SESSION['id']."' />";
     }

?>
      <div align="center" class="container">
        <h3>Edition de mon profil</h3>
        <div class="row">
            <form class="col s12" method="POST" action="">
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Votre pseudo"
                id="newpseudo"
                type="text"
                name="newpseudo"
                value="<?php echo $user['pseudo']; ?>"
                class="validate">
                <label for="newpseudo">Pseudo</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Votre mail"
                id="newmail"
                type="email"
                name="newmail"
                value="<?php echo $user['mail']; ?>"
                class="validate">
                <label for="newmail">Mail</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Votre mot de passe"
                id="newmdp1"
                type="password"
                name="newmdp1"
                class="validate">
                <label for="newmdp1">Mot de passe</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                placeholder="Confirmez votre mot de passe"
                id="newmdp2"
                type="password"
                name="newmdp2"
                class="validate">
                <label for="newmdp2">Confirmation de votre mot de passe</label>
              </div>
              <div class="input-field col s6 offset-s3">
                <input
                class="waves-effect waves-light btn"
                type="submit"
                name="forminscription"
                value="Mettre à jour mon profil"
                onclick=toast
                />
            </div>
          </form>
        </div>
      </div>
<?php
require('./partials/footer.php');
}
else {
  echo "<meta http-equiv='refresh' content='0; URL=connexion.php' />";
}
 ?>
