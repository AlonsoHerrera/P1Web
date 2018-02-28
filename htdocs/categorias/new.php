<?php
  $titulo = 'Agregar Categoria';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    include '../DbSetup.php';

    $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

    if($descripcion==''){
      echo "Todos los datos son requeridos";
    }else {
     $categoria_model->insert( $descripcion);
      echo "<h3>Categoria registrada con éxito</h3>";
      return header("Location: /home/index.php");
    }
  }
  include '../shared/header.php';
  include '../shared/nav.php';
?>
<?php 
  include '../seguridad/verificar_session.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if ($user['rol'] == "Comprador"){ 
    return header("Location: /home/fail.php");
  }?>
  <form method="POST">

    <label>Descripcion:</label>
    <input type="text" name="descripcion" >
    <br>
    <input type="submit" name="" value="Guardar">
  </form>
<?php
include '../shared/footer.php';
?>

