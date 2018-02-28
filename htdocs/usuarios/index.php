<?php
  $titulo = 'Editar Cuenta';
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    $nombre=isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellidos=isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasenna = isset($_POST['contrasenna']) ? $_POST['contrasenna'] : '';
    $password_confirmation = isset($_POST['password_confirmation']) ? $_POST['password_confirmation'] : '';
    $direccion=isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $rol=isset($_POST['rol']) ? $_POST['rol'] : '';
    $id = $usuario_model->findUser($_SESSION['usuario_id']);

    if ($contrasenna != $password_confirmation) {
      echo "<h3>Las contraseñas no coinciden</h3>";
    } else if(($nombre=='')||($apellidos=='')||($correo=='')||($direccion=='')||($rol=='')){
      echo "Todos los datos son requeridos";
    }else {
     
     $usuario_model->update( $id['id'],$nombre, $apellidos, $correo, $contrasenna,$direccion,$rol);
      echo "<h3>Usuario registrado con éxito</h3>";
      return header("Location: /home/index.php");
    }
  }
  $usuario = $usuario_model->findUser($_SESSION['usuario_id']);

  include '../shared/header.php';
  include '../shared/nav.php';

?>
<?php 
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if ($user['rol'] == "Comprador"){ 
    return header("Location: /home/fail.php");
}?>
<body class="text-center">
  <form method="POST">
    <input type="text" placeholder="Nombre" name="nombre" required autofocus value="<?= $usuario['nombre']?>" >
    <br>
    <input type="text" placeholder="Apellidos" name="apellidos" required autofocus value="<?= $usuario['apellidos']?>">
    <br>
    <input type="email" placeholder="Correo" name="correo" required autofocus value="<?= $usuario['correo']?>">
    <br>
    <input type="password" placeholder="Contraseña" name="contrasenna" >
    <br>
    <input type="password" placeholder="Confirmar contraseña" name="password_confirmation">
    <br>
    <input type="text" placeholder="Direccion" name="direccion" required autofocus value="<?= $usuario['direccion']?>">
    <br>
    <select name="rol">
      <option  value="Administrador" >Administrador</option>
      <option  value="Comprador">Comprador</option>
    </select> 
    <br>
    <input type="submit" name="" value="Guardar">
  </form>
</body>
<?php
include '../shared/footer.php';
?>

