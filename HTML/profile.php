<!DOCTYPE html>
<html>
  <?php require_once('head.php'); ?>
<body>

  <div class="container">

    <?php require_once('header.php');  ?>

    <div class="bodies-main-content">

      <hr>
      <img src="<?php echo $_SESSION["user"]["profilePic"] ?>">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      <!-- <h1>Mi Perfil / Mi Cuenta</h1> -->

      <!-- <section class="profile">

        <nav class="prrofile-nav">
          <a href="#">Datos Personales</a>
          <a href="#">Mis Vehículos</a>
          <a href="#">Mis Estacionamientos</a>
          <a href="#">Reputación</a>
        </nav>

      </section> -->
    </div>
    <?php require_once('footer.php'); ?>
  </div>
  <!-- <script>
  function initMap() {
    var input = document.getElementById('pac-input');
    var autocomplete = new google.maps.places.Autocomplete(input);
  };
  </script> -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSkfauiLSZEhmyR3Yti92BCrmMCFbqB0Y&libraries=places&callback=initMap" async defer></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- <script src="js/menu.js"></script> -->
  <script>
    $('.avatar').click(function(){
      $('.profile-nav').slideToggle(100);
    });
  </script>
</body>
</html>
