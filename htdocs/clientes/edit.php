<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $client_model->update($id, $nombre);
    return header("Location: /clientes");
  }
  $cliente = $client_model->find($id);
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/menu.php'; ?>
  <title>Editar Cliente</title>
</head>
<body>
  <h2>Editar Cliente</h2>
  <form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required autofocus value="<?= $cliente['nombre']?>">
    <input type="submit" value="Salvar">
    <a href="/clientes">Atras</a>
  </form>
</body>
</html>
 