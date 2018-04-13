
<div class="profile-nav-container">
  <nav class="navbar">
    <div class="container-fluid">
      <a href="#menu" id="toggle-profile"><span></span></a>
      <div class="profile-welcome-mobile">
        <h3>¡Bienvenido {{Auth::user()->firstName}}!</h3>
      </div>
      <ul class="nav navbar-nav">
        <li class="active first"><a id="perfil-nav-1"href="perfil"><label>PERFIL</label></a></li>
        <li><a id="perfil-nav-2" href="perfil-espacio"><label>MIS ESPACIOS</label></a></li>
        <li><a id="perfil-nav-3" href="perfil-vehiculo"><label>MIS VHICULOS</label></a></li>
        <li><a id="perfil-nav-4" href="perfil-alquileres"><label>ALQUILERES</label></a></li>
        {{-- <li><a id="perfil-nav-5" href="#"><label>EVALUACIONES</label></a></li> --}}
      </ul>
    </div>
  </nav>

  <div class="clear">

  </div>

</div>
{{-- <div class="profile-welcome-tablet">
  <h3>¡Bienvenido {{Auth::user()->firstName}}!</h3>
</div> --}}
{{-- HAMURGUESA --}}
<script>

  $('#toggle-profile').click(function (){
    $(this).toggleClass("on");
    $('.navbar-nav').slideToggle(100);
  });

</script>
