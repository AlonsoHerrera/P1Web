<?php
$titulo = 'Carrito de compras';
$search = isset($_GET['search']) ? $_GET['search'] : '';
include '../seguridad/verificar_session.php';
include '../DbSetup.php';
include '../shared/header.php';
include '../shared/nav.php';

$user = $usuario_model->findUser($_SESSION['usuario_id']);
$carrito= $carrito_model->getIdCarrito($user['id']);

if ($user['rol'] == "Comprador"){ 
     return header("Location: /home/fail.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Carrito Compras</title>
  <meta charset="utf-8">
</head>
<body class="text-center">

<h2>Editar Articulos</h2>
  <table align="center" border="3">
    <tr>
      <th class="text-center">Descripción</th>
      <th class="text-center">Imagen</th>
      <th class="text-center">Cantidad</th>
      <th class="text-center">Total</th>
     </tr>

<?php 
    $result_array = $carrito_model->index2($search,$carrito['id']);
    foreach ($result_array as $row) {
         echo "<tr>";
          echo "<td>" . $row['descripcion'] . "</td>";
          echo "<td>" . $row['imagen'] . "</td>";
          echo "<td>" . $row['cantidad'] . "</td>";
          echo "<td>$" . $row['total'] . "</td>";
          echo "<td>" ."<a href='/articulos/delete.php?id=" . $row['id'] . "'>Eliminar</a>"."</td>";
        echo "</tr>";
    } 
?>
</table>
</body>
</html>
