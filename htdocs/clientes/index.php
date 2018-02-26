<?php
include '../seguridad/verificar_session.php';
$search = isset($_GET['search']) ? $_GET['search'] : '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Página php</title>
  <meta charset="utf-8">
</head>
<body>
  <?php include '../shared/menu.php'; ?>
  <h2>Clientes</h2>
  <form method="GET">
    <input type="text" autofocus name="search" value="<?php echo $search ?>">
    <input type="submit" value="Search">
  </form>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th><a href="/clientes/new.php">+</a></th>
    </tr>
    <?php
      include '../DbSetup.php';
      $result_array = $client_model->index($search);
      foreach ($result_array as $row) {
        echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['nombre'] . "</td>";
          echo "<td>" .
                "<a href='/clientes/edit.php?id=" . $row['id'] . "'>Editar</a>".
                "<a href='/clientes/delete.php?id=" . $row['id'] . "'>Eliminar</a>".
                "</td>";
        echo "</tr>";
      }
    ?>
  </table>
</body>
</html>
 