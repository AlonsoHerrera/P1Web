<?php
  $titulo = '';
  //include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  include '../shared/header.php';
  include '../shared/nav.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$user = $usuario_model->findUser($_SESSION['usuario_id']);
$carrito= $orden_model->getIdCarrito($user['id']);

//$orden= $orden_model->getIdOrden2($user['id']);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body class="text-center">
  <h2>Ordenes de compra</h2>


<form method="GET">
<input type="text" autofocus name="search" value="<?php echo  $search  ?>">
<input type='submit' class='btn btn-lg btn-outline-primary' value="Buscar">
<input type='submit' class='btn btn-lg btn-outline-primary' value="Limpiar filtro">
</form>
<br>

  <table align="center" border="3">
    <tr>
      <th class="text-center">Imagen</th>
      <th class="text-center">Articulo</th>
      <th class="text-center">Cantidad</th>
      <th class="text-center">Precio</th>
      <th class="text-center">#OrdenCompra</th>
    </tr>
    
    <?php
      include '../DbSetup.php';
      $result_array = $orden_model->index3($search,$carrito['id']);
      foreach ($result_array as $row) {
        $articulo= $articulo_model->getArticuloById($row['idArticulo']);
        echo "<tr>";
          echo "<td>" ."<img style=\"width: 20%;\" src='/imagenes/" . $articulo['imagen'] . "'>" . "</td>";
          echo "<td>" . $articulo['nombre'] . "</td>";
          echo "<td>" . $row['cantidad'] . "</td>";
          echo "<td>$" . $articulo['precio'] . "</td>";
          echo "<td>" . $row['idOrdenCompra'] . "</td>";
        echo "</tr>";
      } 
    ?>
  </table>
</body>
</html>
