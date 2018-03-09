<?php

namespace Models {

  class CarritoCompras
  {
    private $connection;
    function __construct($connection)
    {
      $this->connection = $connection;
    }

    public function insert($idUsuario)
    {
      $sql = "INSERT INTO carritocompras(idUsuario) VALUES ('$idUsuario')";
      $this->connection->executeSql($sql);
    }

    public function getIdCarrito($idUsuario)
    {
      $result = $this->connection->executeSql("select * from carritocompras where idUsuario =  '$idUsuario' ");
      return $this->connection->getResults($result)[0];
    }


    public function index2($search,$idCarrito)
    {
      $sql = "select * from articuloscarrito where idCarrito ='".$idCarrito."'";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }

    public function insertArticulo($idArticulo, $cantidad,$idCarrito)
    {
      $sql = "INSERT INTO articuloscarrito(idArticulo,cantidad,idCarrito) VALUES ('$idArticulo','$cantidad','$idCarrito')";
      var_dump($sql);
      $this->connection->executeSql($sql);
    }

    public function findArticulo($id)
    {
      $result = $this->connection->executeSql("select * from articuloscarrito where id = '$id'");
      return $this->connection->getResults($result)[0];
    }

    public function delete($id)
    {
      $sql = "DELETE FROM articuloscarrito WHERE id = $id" ;
      $this->connection->executeSql($sql);
    }

    public function deleteAll($idCarrito)
    {
      $sql = "DELETE FROM articuloscarrito WHERE idCarrito ='".$idCarrito."'";
      $this->connection->executeSql($sql);
    }

    public function pay($idCarrito)
    {
      $sql = "SELECT SUM(precio) AS precio FROM articulo INNER JOIN articuloscarrito ON articulo.id = articuloscarrito.idArticulo where idCarrito ='".$idCarrito."'" ;
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }

    public function insertOrden($idArticulo, $cantidad,$idCarrito)
    {
      $sql = "INSERT INTO orden_compra(idArticulo,cantidad,idCarrito) VALUES ('$idArticulo','$cantidad','$idCarrito')";
      var_dump($sql);
      $this->connection->executeSql($sql);
    }
  } 
}
