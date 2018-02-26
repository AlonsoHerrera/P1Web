<?php
  $titulo = 'Editar Cuenta';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    include '../DbSetup.php';
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
  include '../shared/header.php';
  include '../shared/nav.php';

?>
  <form method="POST">

    <label>Nombre:</label>
    <input type="text" name="nombre" >
    <br>
    <label>Apellidos:</label>
    <input type="text" name="apellidos">
    <br>
    <label>Email: </label>
    <input type="email" name="correo">
    <br>
    <label>Contraseña:</label>
    <input type="password" name="contrasenna">
    <br>
    <label>Confirmar Contraseña:</label>
    <input type="password" name="password_confirmation">
    <br>
    <label>Dirección: </label>
    <input type="text" name="direccion">
    <br>
    <label>Rol: </label>
    <select name="rol">
      <option  value="Administrador" >Administrador</option>
      <option  value="Comprador">Comprador</option>
    </select> 
    <br>
    <input type="submit" name="" value="Guardar">
  </form>
<?php
include '../shared/footer.php';
?>

