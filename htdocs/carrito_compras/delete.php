<?php
  $titulo = 'Borrar Articulo del Carrito';
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php'; 
  include '../shared/header.php';
  include '../shared/nav.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';

  $articuloscarrito = $carrito_model->findArticulo($id);
  $user = $usuario_model->findUser($_SESSION['usuario_id']);

        //$orden = $orden_model->findOrden($id);
  //var_dump($orden_model->findOrden($id));
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $carrito_model->delete($id);

        //$orden_model->deleteArticulosOrden($id);

    return header("Location: /carrito_compras");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Eliminar Articulo</title>
</head>
<body class="text-center">
  <h2>Eliminar Articulo</h2>
  <p>
    Esta seguro de eliminar el articulo del carrito: 
  </p>
  <form method="POST">
    <input type="submit" value="Si">
    <a href="/carrito_compras/index.php">No</a>
  </form>
</body>
</html>