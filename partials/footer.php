<footer class="page-footer teal lighten-1">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Nous contacter</h5>
        <div class="grey-text text-lighten-4">
          <strong>Happy Trip</strong>
          <br /> 11 le bas de Jonville
          <br />61110 Bretoncelles
          <p>Tel : + 33 6 19 76 57 78</p>
          <p><a class="mail" href="mailto:jehan.henry@gmail.com">jehan.henry@gmail.com</a></p>
        </div>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Liens</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Youtube</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Google+</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © 2018 Happy Trip
      <a class="grey-text text-lighten-4 right" href="#!">Plus de liens</a>
    </div>
  </div>
</footer>
<script src="./vendor/js/jquery-3.3.1.js"></script>
<script src="./vendor/js/materialize.min.js"></script>
<script src="./vendor/js/draggable.bundle.min.js"></script>
<script>
  $(document).ready(function() {
    $('.parallax').parallax();
  });
  <?php if (isset($msg)) {?>
  var toast = ""
  setTimeout(function(){
    toast = Materialize.toast('<?php echo $msg ;?>', 4000)
  }, 500)
  <?php }?>
  $( document ).ready(function() {
    function collapseAll(){
      $(".collapsible-header").removeClass("active");
      $('.collapsible-body').css('display', 'none');
      $(".collapsible").collapsible();
    }
    const draggable = new Draggable.Draggable(document.querySelectorAll('ul.collapsible'), {
      draggable: 'li',
      classes:{mirror: 'container'}
    });
    draggable.on('drag:start', () => collapseAll());
  });
  </script>
</body>

</html>
