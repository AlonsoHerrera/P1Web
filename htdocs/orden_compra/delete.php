<?php
  $titulo = '';
  include '../DbSetup.php';
  include '../shared/header.php';
  include '../shared/nav.php';
  //include '../seguridad/verificar_session.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $orden = $orden_model->findOrden($id);
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $orden_model->deleteArticulosOrden($id);
    return header("Location: /orden_compra/index.php");
  }
?>
 
<!DOCTYPE html>
<html>
<head>
  <title>Eliminar Orden</title>
</head>
<body class="text-center">
  <h2>Eliminar Orden</h2>
  <p>
    Esta seguro de eliminar el articulo de la orden: <strong><?php echo $orden['idOrdenCompra']; ?></strong>
  </p>
  <form method="POST">
    <input type="submit" value="Si">
    <a href="/orden_compra/index.php">No</a>
  </form>
</body>
</html>