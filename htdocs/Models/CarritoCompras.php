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
    public function delete($idArticulo,$idCarrito)
    {
      $sql = "DELETE FROM articuloscarrito WHERE idArticulo = $id and idCarrito = $idCarrito" ;
      $this->connection->executeSql($sql);
    }
     public function insertArticulo($idArticulo, $cantidad,$idCarrito)
    {
      $sql = "INSERT INTO articuloscarrito(idArticulo,cantidad,idCarrito) VALUES ('$idArticulo','$cantidad','$idCarrito')";
      var_dump($sql);
      $this->connection->executeSql($sql);
    }
  } 
}
