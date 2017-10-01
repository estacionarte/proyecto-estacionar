<!DOCTYPE html>
<html>
  <?php require_once('head.php'); ?>
  
  <style media="screen">
  .profile-edit h1{
    color: grey;
    font-size: 1.2em;
  }

  .profile-edit-nav{
    background-color: #ededed;
    overflow: auto;
    white-space: nowrap;
    border-bottom: 3px solid #9c9c9c;
  }

  .profile-edit-nav a {
    display: inline-block;
    color: #9c9c9c;
    text-align: center;
    padding: 14px;

    margin: 0;
  }

  .profile-edit-nav a:hover {
    background-color: #48A8C1;
    color: #fff;
  }
  </style>
  <body>
    <?php require_once('header.php'); ?>
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
