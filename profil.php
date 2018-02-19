<?php
require('./partials/header.php');

   if(isset($_GET['id']) && $_GET['id'] > 0)
   {
      $getid = intval($_GET['id']);
      $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
      $requser->execute(array($getid));
      $userinfo = $requser->fetch();
?>
    <div align="center" class="container main">
      <h3>Profil de <?php echo $userinfo['pseudo']; ?></h3>
      <br />
      <table class="bordered centered">
        <thead>
          <tr>
            <th>Pseudo</th>
            <th>Mail</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $userinfo['pseudo']; ?></td>
            <td><?php echo $userinfo['mail']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
<?php
require('./partials/footer.php');
}
 ?>
