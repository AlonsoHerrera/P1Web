<?php
  $titulo = 'Agregar Articulo';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    include '../DbSetup.php';

    $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $id_categoria=isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';
    $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : '';


    if(($descripcion=='')||($id_categoria=='')||($imagen=='')){
      echo "Todos los datos son requeridos";
    }else {
     $articulo_model->insert( $descripcion, $id_categoria, $imagen);
      echo "<h3>Articulo registrado con éxito</h3>";
      return header("Location: /home/index.php");
    }
  }
  include '../shared/header.php';
  include '../shared/nav.php';

?>
<?php 
  include '../DbSetup.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if ($user['rol'] == "Comprador"){ 
      return header("Location: /home/fail.php");
  }?>
  <form method="POST">

    <label>Descripcion:</label>
    <input type="text" name="descripcion" >
    <br>
    <label>id_categoria:</label>
    <input type="text" name="id_categoria">
    <br>
    <label>Imagen: </label>
    <input type="text" name="imagen">
    <br>
    <input type="submit" name="" value="Guardar">
  </form>
<?php
include '../shared/footer.php';
?>

