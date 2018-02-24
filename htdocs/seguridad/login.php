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
  <form method="POST">
    <label>Email: </label>
    <input type="email" name="correo" value="<?= isset($_POST['correo']) ? $_POST['correo'] : ''; ?>">
    <br>
    <label>Contraseña:</label>
    <input type="password" name="contrasenna">
    <br>
    <input type="submit" name="" value="Login!">
    <a href="/seguridad/registro.php">Registrarse</a>
  </form>
<?php
include '../shared/footer.php';
?>
