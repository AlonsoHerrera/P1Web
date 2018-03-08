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
  } 
}
