<?php
  $titulo = 'Home';
   // include '../seguridad/verificar_session.php';
  include '../shared/header.php';
  include '../shared/nav.php';
  include '../shared/footer.php';
  include '../DbSetup.php';
  $search = isset($_GET['search']) ? $_GET['search'] : '';

  $user = $usuario_model->findUser($_SESSION['usuario_id']);

  if ($user['rol'] == "Comprador"){  
      return header("Location: /home/fail.php");
  }

?>
<body>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Articulos</h1>
</div>
<div class="container">
          
<form method="GET">
<select name="search">
  <?php
    $result_array2 = $categoria_model->index($search);
    foreach ($result_array2 as $row) {
      echo "  <option  value='". $row['descripcion'] ."' >".$row['descripcion'] . "</option>";
    }
  ?>
</select>
<input type="submit" value="Search">
</form>

<form method="GET">
  <input type="submit" value="Limpiar filtro">
</form>

<div class="card-deck mb-3 text-center">
 <?php
      $result_array = $articulo_model->index2($search);
        foreach ($result_array as $row) {
        echo (" <div class='card mb-4 box-shadow'> ");   
        echo" <div class='card-header'>";
        echo " <h4 class='my-0 font-weight-normal'>".$row['nombre']."</h4>";
        echo "</div>";   
        echo "<div class='card-body'>";  
        echo " <h1 class='card-title pricing-card-title'>"."$".$row['precio']. "<small class='text-muted'></small></h1>";
        echo " <ul class='list-unstyled mt-3 mb-4'>";
        echo "<li>".$row['descripcion']."</li>"; 
        echo"</ul>" ;  
        echo "<button type='button' class='btn btn-lg btn-block btn-outline-primary'>Añadir al carrito</button>";  
        echo " </div>";
        echo " </div>"; 
      } 
    ?>
</div>
<footer class="pt-4 my-md-5 pt-md-5 border-top">
</footer>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    
  </body>