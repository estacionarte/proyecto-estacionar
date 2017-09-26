<header class="main-header">
  <?php
    session_start();
    if (isset($_SESSION['user']))?>

    <a href="index.php"><h1>EstacionARte</h1></a>

    <div class="main-search">
      <form class="main-form-search" action="" method="get">
        <input type="text" name="buscar-texto" placeholder="Buscar cocheras">
        <input type="submit" name="buscar-submit" value="">
      </form>
    </div>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="icons/close-profile-nav2.png" alt=""></a>
      <a href="profile-edit.php">Editar perfil</a>
      <a href="#">Configuración de mi cuenta</a>
      <a href="#">Ayuda</a>
      <a href="signout.php">Salir</a>
    </div>

    <span style="font-size:30px;cursor:pointer" onclick="openNav()"><img src="icons/avatar.png" alt="avatar" class="avatar"></span>

    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";}

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";}
    </script>

</header>
