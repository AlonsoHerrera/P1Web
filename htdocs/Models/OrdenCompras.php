<?php

namespace Models {

  class OrdenCompras
  {
    private $connection;
    function __construct($connection)
    {
      $this->connection = $connection;
    }

    public function deleteOrden($id)
    {
      $sql = "DELETE FROM orden_compra WHERE id = $id" ;
      $this->connection->executeSql($sql);
    }

    public function findOrden($id)
    {
      $result = $this->connection->executeSql("select * from orden_compra where id = '$id'");
      return $this->connection->getResults($result)[0];
    }

    public function getIdOrden($idUsuario)
    {
      $result = $this->connection->executeSql("select * from orden_compra where idUsuario =  '$idUsuario' ");
      return $this->connection->getResults($result)[0];
    }

     public function index($search, $idCarrito)
    {
      $sql = "select * from orden_compra ";
      if ($search) {
        $search_criteria = [];
        array_push($search_criteria, "id = " . intval($search));
        array_push($search_criteria, "idArticulo ilike '%" . $search ."%'");
        array_push($search_criteria, "cantidad ilike '%" . $search ."%'");
        array_push($search_criteria, "idCarrito ilike '%" . $search ."%'");

        $sql .= " where idCarrito ='".$idCarrito."'";
      }
      $sql .= "order by id";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }

    public function index2($search,$idCarrito)
    {
      $sql = "select * from orden_compra where idCarrito ='".$idCarrito."'";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }

    public function getIdCarrito($idUsuario)
    {
      $result = $this->connection->executeSql("select * from carritocompras where idUsuario =  '$idUsuario' ");
      return $this->connection->getResults($result)[0];
    }
  } 
}
