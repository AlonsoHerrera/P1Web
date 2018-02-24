<?php
  $titulo = 'Home';
  include '../seguridad/verificar_session.php';
  include '../shared/header.php';
  include '../shared/menu.php';
  include '../shared/footer.php';
  include '../DbSetup.php';
  $nombre = $usuario_model->findName($_SESSION['usuario_id']);
?>
<h1>Welcome </h1><?php echo $nombre['nombre']  ; ?>
