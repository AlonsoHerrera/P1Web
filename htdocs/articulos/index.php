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
<body>
  <?php 
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if ($user['rol'] == "Comprador"){ 
      return header("Location: /home/fail.php");
  }?>

  <?php include '../shared/header.php';
        include '../shared/nav.php'; ?>
  <h2>Editar Articulos</h2>
  <form method="GET">
     <!--<input type="text" autofocus name="search" value="<?php echo $search ?>">
    <input type="submit" value="Search">-->
  </form>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Descripción</th>
      <th>ID Categoria</th>
      <th>Imagen</th>
      <th><a href="/articulos/new.php">+</a></th>
    </tr>
    <?php
      include '../DbSetup.php';
      $result_array = $articulo_model->index($search);
      foreach ($result_array as $row) {
        echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['descripcion'] . "</td>";
          echo "<td>" . $row['id_categoria'] . "</td>";
          echo "<td>" . $row['imagen'] . "</td>";

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
