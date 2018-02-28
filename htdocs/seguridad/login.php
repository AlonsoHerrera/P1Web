<?php
  $titulo = 'Login';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../DbSetup.php';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasenna = isset($_POST['contrasenna']) ? $_POST['contrasenna'] : '';
    $usuario = $usuario_model->find($correo, $contrasenna);
    if (isset($usuario)) {
      session_start();
      $_SESSION['usuario_id'] = $usuario['id'];
      return header("Location: /home");
    } else {
      echo "<h3>Usuario o contraseña invalido</h3>";
    }
  }
  include '../shared/header.php';
?>

<body class="text-center">
  <form class="form-signin" method="POST">
    <input type="email" id="inputEmail" placeholder="Correo electronico" name="correo" value="<?= isset($_POST['correo']) ? $_POST['correo'] : ''; ?>">
    <br>
    <input type="password" placeholder="Contraseña" name="contrasenna">
    <br>
    <input class="btn btn-primary" type="submit" name="" value="Login!">
    <a href="/seguridad/registro.php">Registrarse</a>
  </form>
</body>
<?php
include '../shared/footer.php';
?>


