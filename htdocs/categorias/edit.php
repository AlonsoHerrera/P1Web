<?php
  $titulo = 'Editar Categoria';
  include '../DbSetup.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $categoria_model->update($id, $descripcion);
    return header("Location: /categorias");
  }
  $categoria = $categoria_model->findCategoria($id);
?>
<?php 
  include '../seguridad/verificar_session.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if ($user['rol'] == "Comprador"){ 
    return header("Location: /home/fail.php");
  }?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/header.php';
        include '../shared/nav.php'; ?>
  <title>Editar Categoria</title>
</head>
<body>
  <h2>Editar Categoria</h2>
  <form method="POST">
    <label>Descripción:</label>
    <input type="text" name="descripcion" required autofocus value="<?= $categoria['descripcion']?>">
    <br>
    <input type="submit" value="Salvar">
    <a href="/categorias/index.php">Atras</a>
  </form>
</body>
</html>
