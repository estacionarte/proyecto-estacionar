<!DOCTYPE html>
<html>
  <?php require_once('head.php'); ?>
  <body>
    <?php require_once('header-profile.php'); ?>
    <hr>

    <section class="profile-edit">
      <h1>Mi Perfil / Mi Cuenta</h1>

      <nav class="profile-edit-nav">
        <a href="#">Datos Personales</a>
        <a href="#">Mis Vehículos</a>
        <a href="#">Mis Estacionamientos</a>
        <a href="#">Reputación</a>
      </nav>


    </section>
  </div>
  <?php require_once('footer.php'); ?>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- <script src="js/menu.js"></script> -->
<script>
  $('.avatar').click(function(){
    $('.profile-nav').slideToggle('open-nav');
  });
</script>
  </body>
</html>
