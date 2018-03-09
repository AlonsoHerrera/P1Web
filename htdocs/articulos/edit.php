<?php
  $titulo = 'Editar Articulo';
  //include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';;
    $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : '';
    $nombre=isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $precio=isset($_POST['precio']) ? $_POST['precio'] : '';
    $articulo_model->update($id, $descripcion, $id_categoria, $imagen,$nombre,$precio);
    return header("Location: /articulos");
  }
  $articulo = $articulo_model->findArticulo($id);
?>
 <?php 
  include '../DbSetup.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if ($user['rol'] == "Comprador"){ 
    return header("Location: /home/fail.php");
  }?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/header.php';
        include '../shared/nav.php'; ?>
  <title>Editar Articulo</title>
</head>
<body class="text-center">
  <h2>Editar Articulo</h2>
  <form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required autofocus value="<?= $articulo['nombre']?>">
    <br>
    <label>Descripción:</label>
    <input type="text" name="descripcion" required autofocus value="<?= $articulo['descripcion']?>">
    <br>
    <label>Categoria:</label>
    <select name="id_categoria">
    <?php
      $result_array1 = $categoria_model->index($search);
      foreach ($result_array1 as $row) {
        echo "<option  value='".$row['descripcion']."''>".$row['descripcion']."</option>";    
      } 
     ?>
    </select> 
    <br>
     <label>Precio:</label>
    <input type="text" name="precio" required autofocus value="<?= $articulo['precio']?>">
    <br>
    <label>Imagen:</label>
    <input type="text" name="imagen" required autofocus value="<?= $articulo['imagen']?>">

    <input type="submit" value="Salvar">
    <a href="/articulos/index.php">Atras</a>
  </form>
</body>
</html>
