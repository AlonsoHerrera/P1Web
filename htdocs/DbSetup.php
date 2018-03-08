<?php

require_once '../Db/BaseConnection.php';
require_once '../Db/PostgresConnection.php';
require_once '../Db/MySqlConnection.php';
require_once '../Models/Cliente.php';
require_once '../Models/Usuario.php';
require_once '../Models/Articulo.php';
require_once '../Models/Categoria.php';
require_once '../Models/CarritoCompras.php';
require_once '../Models/OrdenCompras.php';


/*
    Polimorfismo:
    un objeto puede tomar varias formas y funcionar diferente en cada una de sus formas.

    Ejemplo:
    el objeto $connection puede conectarse a mysql y a postgres simplemente cambiando la variable $db_class
*/

$db_class = getenv('DB_CLASS');
$connection = new $db_class(
              getenv('SERVER'),
              getenv('PORT'),
              getenv('USER'),
              '',
              getenv('DATABASE'));
$connection->connect();
$client_model = new Models\Cliente($connection);
$usuario_model = new Models\Usuario($connection);
$articulo_model = new Models\Articulo($connection);
$categoria_model = new Models\Categoria($connection);
$carrito_model = new Models\CarritoCompras($connection);
$orden_model = new Models\OrdenCompras($connection);


/*
$result = $connection->executeSql('select table_name from information_schema.tables limit 5');
$result_array =  $connection->getResults($result);

foreach ($result_array as $row) {
  echo "nombre: " . $row['table_name'] . "\n";
}

$connection->disconnect();*/
