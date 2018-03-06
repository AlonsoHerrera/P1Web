<?php
  $titulo = 'Borrar Articulo del Carrito';
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php'; 
  include '../DbSetup.php';
  include '../shared/header.php';
  include '../shared/nav.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $articulo = $articulo_model->findArticulo($id);
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $articulo_model->delete($id);
    return header("Location: /articulos");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php   ?>
  <title>Eliminar Articulo</title>
</head>
<body>
  <h2>Eliminar Articulo</h2>
  <p>
    Esta seguro de eliminar el articulo: <strong><?php echo $articulo['descripcion']; ?></strong>
  </p>
  <form method="POST">
    <input type="submit" value="Si">
    <a href="/articulos">No</a>
  </form>
</body>
</html>