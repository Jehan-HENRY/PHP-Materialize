<?php
require('./partials/header.php');

   if(isset($_SESSION['id'])) {
     $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
     $requser->execute(array($_SESSION['id']));
     $user = $requser->fetch();

     if (isset($_POST['delete'])) {
        $deletetravel = $bdd->prepare("DELETE FROM voyages WHERE id = ?");
        $deletetravel->execute(array($_POST['delete']));
     }

     $reqtravels = $bdd->prepare("SELECT * FROM voyages WHERE id_user = ?");
     $reqtravels->execute(array($_SESSION['id']));
     if ($reqtravels->rowCount()) {
       $travels = $reqtravels;
     } else {
       $travels = array();
     }

     if (isset($_POST['name'])) {
       $name = trim($_POST['name']);
       $description = trim($_POST['description']);
       if (!empty($name)) {
         $inserttravel = $bdd->prepare("INSERT INTO voyages(id_user, name, description, done, created) VALUES (?, ?, ?, 0, now())");
         $inserttravel->execute(array($_SESSION['id'], $name, $description));
         echo "<meta http-equiv='refresh' content='0; URL=travel.php' />";

       }
     }

?>
      <div align="center" class="container">
        <h3>Organiser mon tour</h3>
        <div class="row">
          <div class="fixed-action-btn">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
              <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
              <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
              <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
              <li id='trashcan'><a class="btn-floating blue"><i class="material-icons">delete</i></a></li>
            </ul>
          </div>
        </div>
        <form class="item-add" action="" method="post">
          <input
          type="text"
          name="name"
          placeholder="Entrez une destination ici !"
          class="input"
          autocomplete="off"
          required
          >
          <textarea name="description" placeholder="Ajoutez des détails ici !" class="materialize-textarea"></textarea>
          <input
          type="submit"
          class="btn"
          value="Ajouter">
        </form>
        <div class="list">
          <h4>Destinations :</h4>
          <ul class="collapsible popout" data-collapsible="accordion">
            <?php foreach ($travels as $travel) { ?>
            <li>
              <div class="collapsible-header"><i class="material-icons">place</i><?php echo $travel['name']; ?>
              </div>
              <div class="collapsible-body"><span><?php echo $travel['description']; ?></span>
                <div class="right-align">
                  <form class="" action="" method="post">
                    <input type="hidden" name="delete" value="<?php echo $travel['id'] ?>">
                    <button class="btn btn-floating btn-tiny waves-effect waves-light red" type="submit"><i class="material-icons">close</i></button></a>
                  </form>
                </div>
              </div>
            </li>
          <?php } ?>
          </ul>
        </div>
      </div>
<?php
require('./partials/footer.php');
}
else {
  echo "<meta http-equiv='refresh' content='0; URL=connexion.php' />";

}
?>
