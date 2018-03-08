<?php
  $titulo = 'Facturación ';
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php'; 
  include '../shared/header.php';
  include '../shared/nav.php';
 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $carrito_model->deleteAll();
    return header("Location: /carrito_compras");
  }
?>
<!DOCTYPE html>
  <html>
    <head>
      <?php  $result_array = $carrito_model->pay();
      foreach ($result_array as $row) {
      } ?>
      <title>Eliminar Articulo</title>
    </head>
    <body class="text-center">
      <h2>Cancelar compra</h2>
      <p>
        Desea realizar el pago por: <strong> $<?php echo $row['precio']; ?></strong> 
      </p>
      <form method="POST">
        <input type="submit" value="Si">
        <a href="/carrito_compras/index.php">No</a>
      </form>
    </body>
  </html>