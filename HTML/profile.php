<!DOCTYPE html>
<html>
  <?php require_once('head.php'); ?>
<body class="profile-body">

  <div class="container">

    <?php require_once('header.php');?>

    <div class="bodies-main-content">

      <hr>

      <main class="main-profile-nav">

        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1">Mi perfil</label>

        <input id="tab2" type="radio" name="tabs">
        <label for="tab2">Mis Vehículos</label>

        <input id="tab3" type="radio" name="tabs">
        <label for="tab3">Mis cocheras</label>

        <input id="tab4" type="radio" name="tabs">
        <label for="tab4">Reputación</label>

        <section id="content1">

          <div class="profile-image">
            <img src="images/avatar-profile.png" alt="profile image">
          </div>
          <div class="profile-welcome">
            <h1>¡Bienvenido <?php echo $_SESSION["user"]["firstName"] . "!" ?></h1>
          </div>
          <div>
            <div class="clear"></div>
            <article class="verified-information">
              <ul>
                <li class="verified-information-title">Información verificada</li>
                <li>Documento de identidad <img src="icons/check-no.png"></li>
                <li>Correo electrónico <img src="icons/check-yes.png"></li>
                <li>Número telefónico <img src="icons/check-no.png"></li>
                <li><a href="#">Verificar mis datos</a></li>
                <li class="ask-verify-data"><a href="#openModal"><img src="icons/ask-verify-data.png"></a></li>
              </ul>
            </article>
            <div id="openModal" class="modalDialog">
            	<div>
            		<a href="#close" title="Close" class="close">X</a>
            		<h3>¿Para qué verificar mis datos?</h3>
            		<p>Es importante verificar los datos personales para mantener un ámbito de confianza entre los usuarios registrados.</p>
            	</div>
            </div>

          </div>
          <div class="profile-credit-container">
            <article class="profile-credit">
              <h2>¡Invitá a tus amigos y obtené créditos para estacionar!</h2>
              <p>Conseguí hasta %50 de descuento en tu próximo alquiler.</p>
              <a href="credits.php">CONSEGUIR CRÉDITO</a>
            </article>
          </div>
        </section>

        <section id="content2">
          <h2>Mis Vehículos</h2>
          <?php require_once('estacionamiento-carga.php'); ?>
          <p>
            Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken.
          </p>
        </section>

        <section id="content3">
          <h2>Mis Cocheras</h2>

          <p>
            Brisket meatball turkey short loin boudin leberkas meatloaf chuck andouille pork loin pastrami spare ribs pancetta rump. Frankfurter corned beef beef tenderloin short loin meatloaf swine ground round venison.
          </p>
        </section>

        <section id="content4">
          <h2>Reputación</h2>

          <p>
            Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
          </p>
        </section>

      </main>

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
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script> -->
  <script>
    $('.avatar').click(function(){
      $('.profile-nav').slideToggle(100);
    });
  </script>
</body>
</html>
