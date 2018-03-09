<?php
  $titulo = 'Categorias';
  include '../shared/header.php';
  include '../shared/nav.php';
  include '../seguridad/verificar_session.php';
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
?>
<?php 
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if ($user['rol'] == "Comprador"){ 
    return header("Location: /home/fail.php");
  }?>
<body class="text-center">
  <h2>Agregar Categoria</h2>
  <form method="POST">
    <input type="text" placeholder="Descripción" name="descripcion" >
    <br>
    <input type="submit" placeholder="Guardar" name="" value="Guardar">
  </form>
</body>  
<?php
include '../shared/footer.php';
?>

