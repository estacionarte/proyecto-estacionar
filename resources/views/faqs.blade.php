@extends('layouts.app')
@section('title') Faqs @endsection
@section('faqs')

<div class="bodies-main-content">

  <hr>

  <h1>Preguntas Frecuentes</h1>

  <div class="faqs-search">
    <form class="faqs-form-search" action="" method="get">
      <input type="text" name="buscar-texto" placeholder="ej. Medios de pago">
      <input type="submit" name="buscar-submit" value="">
    </form>
  </div>

  <section class="faqs-preguntas">

    <section class="faqs-preguntas-general">
      <h2>General</h2>

      <article class="pregunta">
        <h3>¿Qué es "Proyecto Parking"?</h3>
        <p>"Proyecto Parking" es una plataforma que permite a los usuarios alquilar cocheras donde quieras, cuando quieras y por el tiempo que quieras, tanto para quienes quieran ofrecer la propia como para quienes necesiten una.</p>
      </article>

      <article class="pregunta">
        <h3>¿Es seguro?</h3>
        <p>¡Sí! Solicitamos los datos de todos los usuarios registrados para asegurarnos de que sean confiables.</p>
      </article>

      <article class="pregunta">
        <h3>¿Qué pasa si tengo un problema?</h3>
        <p>Utilizá el buscador de arriba para encontrar la solución. Si ninguna respuesta arregla tu problema, contactate con nosotros por correo: contacto@proyectoparking.com</p>
      </section>

      <hr>

      <section class="faqs-preguntas-propietarios">
        <h2>Ofrezco estacionamiento</h2>

        <article class="pregunta">
          <h3>¿Cómo alquilo mi cochera a otros usuarios?</h3>
          <p>¡Es muy fácil! Registrate, clickeá el boton "Agregar Cochera" en tu perfil y seguí los pasos.</p>
        </article>

        <article class="pregunta">
          <h3>¿Cómo recibo el dinero del alquiler?</h3>
          <p>Tu dinero estará disponible en tu cuenta 72 horas después de que tu cliente haya retirado su vehículo. Hacemos esto para asegurarnos de que no haya habido problemas entre ninguna de las dos partes.</p>
        </article>

      </section>

      <hr>

      <section class="faqs-preguntas-locatarios">
        <h2>Necesito estacionamiento</h2>

        <article class="pregunta">
          <h3>¿Cómo alquilo una cochera de otros usuarios?</h3>
          <p>¡Es muy fácil! Registrate, clickeá el boton "Buscar Estacionamiento" en tu perfil (o usá la barra de búsqueda principal en la página de inicio), elegí la cochera que más te guste en el mapa y después seguí los pasos para finalizar la reserva.</p>
        </article>

        <article class="pregunta">
          <h3>¿Qué medios de pago puedo utilizar?</h3>
          <p>Únicamente tarjeta de crédito y débito.</p>
        </article>

        <article class="pregunta">
          <h3>¿Puedo pagar en efectivo al dueño de la cochera?</h3>
          <p>No. Todos los pagos se realizan a través de nuestra plataforma con tarjetas de crédito o débito.</p>
        </article>

      </section>

    </section>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$('.pregunta').click(function (){
$('p', this).slideToggle(200);
});
</script>
<script>
$('.toggle-nav').click(function (){
$('.main-nav').slideToggle(100);
});
</script>

@endsection
