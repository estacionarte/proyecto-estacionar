<?php
require_once('head.php');
require_once('header.php'); ?>

<body>
  <section class="credits-container">
    <article class="credits">
      <h1>¡Ahorrá dinero invitando a amigos!</h1>
      <h2>Invita a un amigo y le descontaremos un 50% en su primer alquiler con EstacionAPP. Cuando finalice su estadia, obtendrás $50 de crédito para vos. ¡Solo para usuarios nuevos de EstacionAPP!</h2>
    </article>
    <article class="form-generico">
        <form class="credits-form" action="" method="post">
          <input type="email" name="email" placeholder="Ingresá un e-mail" id="credit-email">
          <input type="submit" name="" value="Enviar invitación">
        </form>
    </article>
  </section>
  <?php require_once('footer.php'); ?>
</body>
