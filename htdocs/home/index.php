<?php
  $titulo = 'Home';
  include '../shared/header.php';
  include '../shared/nav.php';
  include '../shared/footer.php';
  include '../DbSetup.php';
?>
	
	<body>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Articulos</h1>
      
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">

       <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal"> articulo </h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$0 <small class="text-muted"></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Descripcion aqui</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Añadir al carrito</button>
          </div>
        </div>

        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">articulo</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$15 <small class="text-muted"></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Descripcion aqui</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Añadir al carrito</button>
          </div>
        </div>

        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">articulo</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$29 <small class="text-muted"></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
             <li>Descripcion aqui</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Añadir al carrito</button>
          </div>
        </div>

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