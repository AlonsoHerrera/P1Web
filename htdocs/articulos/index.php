<?php
$titulo = 'Articulos';
$search = isset($_GET['search']) ? $_GET['search'] : '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Página php</title>
  <meta charset="utf-8">
</head>
<body class="text-center">
  
  <?php 
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if ($user['rol'] == "Comprador"){ 
      return header("Location: /home/fail.php");
  }?>

  <?php include '../shared/header.php';
        include '../shared/nav.php'; ?>

  <!--<form method="GET">
     <input type="text" autofocus name="search" value="<?php echo $search ?>">
    <input type="submit" value="Search">
  </form>-->
  
  <h2>Editar Articulos</h2>
  <table align="center" border="3">
    <tr>
      <th class="text-center">ID</th>
      <th class="text-center">Nombre</th>
      <th class="text-center">Descripción</th>
      <th class="text-center">Precio</th>
      <th class="text-center">ID Categoria</th>
      <th class="text-center">Imagen</th>
      <th class="text-center">Opciones</th>
    </tr>
    <?php
      include '../DbSetup.php';
      $result_array = $articulo_model->index($search);
      foreach ($result_array as $row) {
        echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['nombre'] . "</td>";
          echo "<td>" . $row['descripcion'] . "</td>";
          echo "<td>" . $row['precio'] . "</td>";
          echo "<td>" . $row['id_categoria'] . "</td>";
          echo "<td>" ."<img style=\"width: 15%;\" src='/imagenes/" . $row['imagen'] . "'>" . "</td>";
          echo "<td>" .
                "<a href='/articulos/edit.php?id=" . $row['id'] . "'>Editar</a>".
                " ".
                "<a href='/articulos/delete.php?id=" . $row['id'] . "'>Eliminar</a>".
                "</td>";
        echo "</tr>";
      } 
    ?>
  </table>
</body>
</html>
