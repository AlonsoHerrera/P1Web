<?php
  $titulo = 'Categorias';
  include '../DbSetup.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $categoria = $categoria_model->findCategoria($id);
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $categoria_model->delete($id);
    return header("Location: /categorias");
  }
?>
<?php 
  include '../seguridad/verificar_session.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if ($user['rol'] == "Comprador"){ 
    return header("Location: /home/fail.php");
  }?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/header.php';
        include '../shared/nav.php';  ?>
  <title>Eliminar Categoria</title>
</head>
<body class="text-center">
  <h2>Eliminar Categoria</h2>
  <p>
    Esta seguro de eliminar la categoria: <strong><?php echo $categoria['descripcion']; ?></strong>
  </p>
  <form method="POST">
    <input type="submit" value="Si">
    <a href="/categorias">No</a>
  </form>
</body>
</html>