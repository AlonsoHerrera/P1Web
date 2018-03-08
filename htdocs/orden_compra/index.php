<?php
  $titulo = 'Ordenes de compra';
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  include '../shared/header.php';
  include '../shared/nav.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$user = $usuario_model->findUser($_SESSION['usuario_id']);
$carrito= $orden_model->getIdCarrito($user['id']);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ordenes de compra</title>
  <meta charset="utf-8">
</head>
<body class="text-center">
  <h2>Vista de Ordenes</h2>
  <table align="center" border="3">
    <tr>
      <th class="text-center">Nombre</th>
      <th class="text-center">Id Articulo</th>
      <th class="text-center">Cantidad</th>
      <th class="text-center">Precio</th>
      <th class="text-center">Id Carrito</th>
      <th class="text-center">Delete</th>
    </tr>
    
    <?php
      include '../DbSetup.php';
      $result_array = $orden_model->index2($search,$carrito['id']);
      foreach ($result_array as $row) {
        $articulo= $articulo_model->getArticuloById($row['idArticulo']);
        echo "<tr>";
          echo "<td>" . $articulo['nombre'] . "</td>";
          echo "<td>" . $row['idArticulo'] . "</td>";
          echo "<td>" . $row['cantidad'] . "</td>";
          echo "<td>$" . $articulo['precio'] . "</td>";
          echo "<td>" . $row['idCarrito'] . "</td>";

          echo "<td>" .
                "<a href='/orden_compra/delete.php?id=" . $row['id'] . "'>Eliminar</a>".
                "</td>";
        echo "</tr>";
      } 
    ?>
  </table>
</body>
</html>
