<?php
  $titulo = 'Registro';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    include '../DbSetup.php';

    $nombre=isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellidos=isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasenna = isset($_POST['contrasenna']) ? $_POST['contrasenna'] : '';
    $password_confirmation = isset($_POST['password_confirmation']) ? $_POST['password_confirmation'] : '';
    $direccion=isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $rol=isset($_POST['rol']) ? $_POST['rol'] : '';

    if ($contrasenna != $password_confirmation) {
      echo "<h3>Las contraseñas no coinciden</h3>";
    } else if(($nombre=='')||($apellidos=='')||($correo=='')||($direccion=='')||($rol=='')){
      echo "Todos los datos son requeridos";
    }else {
     $usuario_model->insert( $nombre, $apellidos, $correo, $contrasenna,$direccion,$rol);
     $user= $usuario_model->getIdUsuario();
       $carrito_model->insert( $user['id']);
       echo "Este es el id:" .$user['id'];
      echo "<h3>Usuario registrado con éxito</h3>";
      return header("Location: /seguridad/login.php");
    }
  }
  include '../shared/header.php';
?>
<body class="text-center ">
  <form  method="POST">

    <input placeholder="Nombre" type="text" name="nombre" >
    <br>
    <input placeholder="Apellidos" type="text" name="apellidos">
    <br>
    <input placeholder="Correo" type="email" name="correo">
    <br>
    <input placeholder="Contraseña" type="password" name="contrasenna">
    <br>
    <input placeholder="Confirmar contraseña" type="password" name="password_confirmation">
    <br>
    <input placeholder="Direccion" type="text" name="direccion">
    <br>
    <label>Rol: </label>
    <select class="btn-info" name="rol">
      <option  value="Administrador" >Administrador</option>
      <option  value="Comprador">Comprador</option>
    </select> 
    <br>
    <input class="btn btn-primary" type="submit" name="" value="Registrarme!">
    <a href="/seguridad/login.php">Login</a>
  </form>
</body>
<?php
include '../shared/footer.php';
?> 