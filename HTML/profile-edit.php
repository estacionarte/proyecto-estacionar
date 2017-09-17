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

      <div class="">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
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
