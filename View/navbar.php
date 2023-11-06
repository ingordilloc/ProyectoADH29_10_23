<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">

    <nav class="navbar navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="https://www.ant.gob.ec/wp-content/uploads/2020/11/renta-de-vehiculos-ANT.png" style="height: 150px; width: 150px;">
        </a>
      </div>
    </nav>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center navbar-dark bg-dark" id="navbarNavAltMarkup">
      <div class="navbar-nav  navbar-dark bg-dark">
        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        <a class="nav-link" href="index.php?action=nosotros">Nosotros</a>
        <a class="nav-link" href="index.php?action=contacto">Contactanos</a>
        <?php
        if (!empty($_SESSION['id']) && (!empty($_SESSION['rol']))) {
          //Mostrar todas las opciones disponibles
        ?>
          <a class="nav-link" href="index.php?action=registros">Rentar Vehiculo</a>
          <a class="nav-link" href="index.php?action=registroTipo">Rentar por Tipo</a>
          <a class="nav-link" href="index.php?action=mostrar">Rentas realizadas</a>
          <a class="nav-link" href="index.php?action=logout">Cerrar Sesion</a>
        <?php } else {  ?>
          <a class="nav-link" href="index.php?action=login">Iniciar Sesion</a>
          <a class="nav-link" href="index.php?action=crearUsuarioNuevo">Nuevo Usuario</a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>