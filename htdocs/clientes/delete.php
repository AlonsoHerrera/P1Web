<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $cliente = $client_model->find($id);
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $client_model->delete($id);
    return header("Location: /clientes");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/menu.php'; ?>
  <title>Eliminar Cliente</title>
</head>
<body>
  <h2>Eliminar Cliente</h2>
  <p>
    Esta seguro de eliminar el cliente: <strong><?php echo $cliente['nombre']; ?></strong>
  </p>
  <form method="POST">
    <input type="submit" value="Si">
    <a href="/clientes">No</a>
  </form>
</body>
</html>
