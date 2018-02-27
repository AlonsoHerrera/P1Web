<?php
  $titulo = 'Editar Articulo';
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';
    $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : '';
    $articulo_model->update($id, $descripcion, $id_categoria, $imagen);
    return header("Location: /articulos");
  }
  $articulo = $articulo_model->findArticulo($id);
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/header.php';
        include '../shared/nav.php'; ?>
  <title>Editar Articulo</title>
</head>
<body>
  <h2>Editar Articulo</h2>
  <form method="POST">
    <label>Descripción:</label>
    <input type="text" name="descripcion" required autofocus value="<?= $articulo['descripcion']?>">
    <br>
    <label>Id Categoria:</label>
    <input type="text" name="id_categoria" required autofocus value="<?= $articulo['id_categoria']?>">
    <br>
    <label>Imagen:</label>
    <input type="text" name="imagen" required autofocus value="<?= $articulo['imagen']?>">

    <input type="submit" value="Salvar">
    <a href="/articulos/inedit.php">Atras</a>
  </form>
</body>
</html>
