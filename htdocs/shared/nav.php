 <?php 
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  ?>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/home/index.php">Home</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/articulos/new.php">Agregar Articulos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/articulos/index.php">Editar Articulos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/categorias/new.php"">Agregar Categorias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/categorias/index.php">Editar Categorias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/carrito_compras/index.php">Carrito Compras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/orden_compra/index.php">Ordenes de compra</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/usuarios/index.php">Editar cuenta </a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="/seguridad/logout.php">Logout</a>
      </li>-->
    </ul>
    <!--<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>--> 
      <a class="nav-link"> <?php echo $user['nombre'] . "-" ;echo $user['rol'];?> </a>
      <a class="nav-link" href="/seguridad/logout.php">Logout</a>
  </div>
</nav>

<!--<ul>
  <li> <a href="/home/index.php">Home</a></li>
  <li><a href="/usuarios/index.php">Editar cuenta</a></li>  
  <li><a href="/seguridad/logout.php">Logout</a></li>
  <li><a href="/articulos/new.php">Agregar Articulos</a>
  <li><a href="/articulos/index.php">Editar Articulos</a></li>
  <li><a href="/categorias/new.php">Agregar Categorias</a></li>
  <li><a href="/categorias/index.php">Editar Categorias</a></li>
  </li>
</ul> -->