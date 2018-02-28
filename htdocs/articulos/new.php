<?php
  $titulo = 'Articulos';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    include '../DbSetup.php';

    $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $id_categoria=isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';
    $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : '';


    if(($descripcion=='')||($id_categoria=='')||($imagen=='')){
      echo "Todos los datos son requeridos";
    }else {
     $articulo_model->insert( $descripcion, $id_categoria, $imagen);
      echo "<h3>Articulo registrado con éxito</h3>";
      return header("Location: /home/index.php");
    }
  }
  include '../shared/header.php';
  include '../shared/nav.php';

?>
<?php 
  include '../DbSetup.php';
  $user = $usuario_model->findUser($_SESSION['usuario_id']);
  if ($user['rol'] == "Comprador"){ 
      return header("Location: /home/fail.php");
  }?>

<body class="text-center">
  <h2>Agregar Articulos</h2>
  <form method="POST">
    <label>Descripcion:</label>
    <input type="text" placeholder="Descripción" name="descripcion" >
    <br>
    <label>ID Categoria:</label>
    <input type="text" placeholder="ID Categoria" name="id_categoria">
    <br>
    
    
    <style>
      .thumb {
      height: 2 00px;
      border: 1px solid #000;
      margin: 10px 5px 0 0;
      }
    </style>
    
    <input type="file" id="files" name="imagen" >
    <br />
    <output id="list"></output>
       
    <script>
      function archivo(evt) {
        var files = evt.target.files; // FileList object
   
        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
          //Solo admitimos imágenes.
          if (!f.type.match('image.*')) {
              continue;
          }
   
          var reader = new FileReader();
   
          reader.onload = (function(theFile) {
            return function(e) {
            // Insertamos la imagen
            document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.Location), '"/>'].join('');
            };
          })(f);
   
          reader.readAsDataURL(f);
        }
      }
      document.getElementById('files').addEventListener('change', archivo, false);
      </script>
    
    <br>
    <input type="submit" name="" value="Guardar">
  </form>
</body>
<?php
include '../shared/footer.php';
?>

