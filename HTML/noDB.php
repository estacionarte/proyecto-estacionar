<!DOCTYPE html>
<html>
  <?php
  require_once('head.php');?>
  <body>
    <div class="home-container">
      <?php require_once('header.php');?>
      <!-- MIGRATE TO SQL -->
      <?php require_once('migrateToSql.php'); ?>
      <div class="clear"></div>
      <div class="migrate-btn-container">
        <?php $status = getDataBaseStatus();
        echo 'Status: ' . $status; ?>
        <form action="" method="post">
          <input class="migrate-btn-1" type="submit" name="db" value="Crear Base de Datos">
        </form>
        <br>
        <form class="" action="" method="post">
          <input class="migrate-btn-2" type="submit" name="table" value="Crear Tabla"
          <?php
          if ($status == 'No se encontró la Base de Datos') {
            echo "disabled";
          }
          ?>>
        </form>
        <br>
        <form class="" action="" method="post">
          <input class="migrate-btn-3" type="submit" name="data" value="Migrar usuarios a la Base de Datos"

          <?php
          if ($status !== 'La Tabla esta vacía' && $status !== 'La Tabla tiene los usuarios cargados') {
            echo "disabled";
          }

          ?>>
        </form>
      </div>

      <?php require_once('footer.php'); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  		<script>
  		$('.toggle-nav').click(function (){
  			$('.main-nav').slideToggle(100);
        $('.toggle-nav').toggleClass('rotate');
  		});
  	  </script>
  </body>
</html>
