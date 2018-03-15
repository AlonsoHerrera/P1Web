<?php
  $titulo = 'Articulos';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    include '../DbSetup.php';

    $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $id_categoria=isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';
    //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : '';
    $nombre=isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $precio=isset($_POST['precio']) ? $_POST['precio'] : '';

      $nombre_imagen=$_FILES['imagen']['name'];
      $tipo_imagen=$_FILES['imagen']['type'];
      $tamagno_imagen=$_FILES['imagen']['size'];

      $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'\\imagenes\\';
      move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);

    if(($descripcion=='')||($id_categoria=='')||($nombre_imagen=='')||($nombre=='')||($precio=='')){
      echo "Todos los datos son requeridos";
    }else {
     $articulo_model->insert( $descripcion, $id_categoria, $nombre_imagen,$nombre,$precio);
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

<body class="text-center">

  <h2>Agregar Articulos</h2>
  <form method="POST"  enctype="multipart/form-data">
    <input type="text" placeholder="Nombre" name="nombre">
    <br>
    <input type="text" placeholder="Descripción" name="descripcion" >
    <br>
    <input  type="number" placeholder="Precio" name="precio"  min="1">
    <br>

    <select name="id_categoria">
    <?php
      $result_array1 = $categoria_model->index($search);
      foreach ($result_array1 as $row) {
        echo "<option  value='".$row['descripcion']."''>".$row['descripcion']."</option>";    
      } 
     ?>
    </select>     
    <br>
      <label for="imagen">Imagen:</label>
      <input type="file" name="imagen" size="20">
    <br>
    <input type="submit" name="" value="Guardar">
  </form>
</body>

<?php
include '../shared/footer.php';
?>

