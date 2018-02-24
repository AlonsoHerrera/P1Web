<?php
  include '../seguridad/verificar_session.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../DbSetup.php';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $nombre = $_POST['nombre'];
    $client_model->insert($nombre);
    header("Location: /clientes");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/menu.php'; ?>
  <title>Nuevo Cliente</title>
</head>
<body>
  <h2>Nuevo Cliente</h2>
  <form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required autofocus>
    <input type="submit" value="Salvar">
    <a href="/clientes">Atras</a>
  </form>
</body>
</html>
