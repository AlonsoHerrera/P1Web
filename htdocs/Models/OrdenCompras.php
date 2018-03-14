<?php

namespace Models {

  class OrdenCompras
  {
    private $connection;
    function __construct($connection)
    {
      $this->connection = $connection;
    }

    public function index($search)
    {
      $sql = "select * from orden_compra ";
      if ($search) {
        $search_criteria = [];
        array_push($search_criteria, "id = " . intval($search));
        array_push($search_criteria, "descripcion ilike '%" . $search ."%'");

        $sql .= " where " . join($search_criteria, ' or ');
      }
      $sql .= "order by id";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }
         public function index3($search)
    {
      $sql = "select * from articulosorden ";
      if ($search) {
    
        $sql .= " where idOrdenCompra='".$search."'";
      }
  
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }


    public function insert($idCarrito)
    {
      $sql = "INSERT INTO orden_compra(idCarrito) VALUES ('$idCarrito')";
      $this->connection->executeSql($sql);
    }

    public function getIdOrden()
    {
      $result = $this->connection->executeSql("select * from orden_compra ORDER BY id DESC LIMIT 1 ");
      return $this->connection->getResults($result)[0];
    }


    public function insertArticulosOrden($idArticulo,$cantidad,$idOrdenCompra,$idCarrito)
    {
      $sql = "INSERT INTO articulosorden(idArticulo,cantidad,idOrdenCompra,idCarrito) VALUES 
                                  ('$idArticulo','$cantidad','$idOrdenCompra','$idCarrito')";
      var_dump($sql);
      $this->connection->executeSql($sql);
    }

    public function getIdCarrito($idUsuario)
    {
      $result = $this->connection->executeSql("select * from carritocompras where idUsuario =  '$idUsuario' ");
      return $this->connection->getResults($result)[0];
    }
    
    public function index2($search,$idCarrito)
    {
      $sql = "select * from articulosorden where idCarrito ='".$idCarrito."'";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }

    public function getIdOrden2($idUsuario)
    {
      $result = $this->connection->executeSql("select * from orden_compra where idUsuario =  '$idUsuario'");
      return $this->connection->getResults($result)[0];
    }

    public function deleteArticulosOrden($id)
    {
      $sql = "DELETE FROM articulosorden WHERE id = $id" ;
      $this->connection->executeSql($sql);
    }


    public function findOrden($id)
    {
      $result = $this->connection->executeSql("select * from orden_compra where id = '$id'");
      return $this->connection->getResults($result)[0];
    }
    /* 
    public function getIdOrden($idUsuario)
    {
      $result = $this->connection->executeSql("select * from orden_compra where idUsuario =  '$idUsuario' ");
      return $this->connection->getResults($result)[0];
    }

    public function findOrden($id)
    {
      $result = $this->connection->executeSql("select * from orden_compra where id = '$id'");
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
*/


  } 
}
