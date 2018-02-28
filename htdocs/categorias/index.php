<?php
$titulo = 'Categorias';
$search = isset($_GET['search']) ? $_GET['search'] : '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Página php</title>
  <meta charset="utf-8">
</head>
<body class="text-center">
  <?php include '../shared/header.php';
        include '../shared/nav.php'; ?>
  <?php 
    include '../seguridad/verificar_session.php';
    include '../DbSetup.php';
    $user = $usuario_model->findUser($_SESSION['usuario_id']);
    if ($user['rol'] == "Comprador"){ 
      return header("Location: /home/fail.php");
  }?>
  <h2>Editar Categorias</h2>
  <form method="GET">
    <!--<input type="text" autofocus name="search" value="<?php echo $search ?>">
    <input type="submit" value="Search">-->
  </form>
  <table align="center" border="1">
    <tr>
      <th class="text-center">ID</th>
      <th class="text-center">Descripción</th>
      <th class="text-center"><a href="/categorias/new.php">New</a></th>
    </tr>
    <?php
      include '../DbSetup.php';
      $result_array = $categoria_model->index($search);
      foreach ($result_array as $row) {
        echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['descripcion'] . "</td>";

          echo "<td>" .
                "<a href='/categorias/edit.php?id=" . $row['id'] . "'>Editar</a>".
                " ".
                "<a href='/categorias/delete.php?id=" . $row['id'] . "'>Eliminar</a>".
                "</td>";
        echo "</tr>";
      }
    ?>
  </table>
</body>
</html>
