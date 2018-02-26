 <?php 
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  ?>

 <ul>
  <li> <h1> <?php echo $user['nombre'] . " "  ;  echo $user['apellidos'];?> </h1></li>
  <li> <a href="/home/index.php">Home</a></li>
  <li><a href="/usuarios/index.php">Editar cuenta</a></li>  
  <li><a href="/seguridad/logout.php">Logout</a></li>
</ul> 