<?php

namespace Models {

  class Categoria
  {
    private $connection;
    function __construct($connection)
    {
      $this->connection = $connection;
    }

    public function index($search)
    {
      $sql = "select * from categoria ";
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

    public function insert($descripcion)
    {
      echo $id_categoria;
      $sql = "INSERT INTO categoria(descripcion) VALUES ('$descripcion')";
      $this->connection->executeSql($sql);
    }

       public function findCategoria($id)
    {
      $result = $this->connection->executeSql("select * from categoria where id = '$id'");
      return $this->connection->getResults($result)[0];
    }

     public function update($id,$descripcion)
    {
      $sql = "UPDATE categoria SET descripcion='$descripcion' WHERE id = $id";
      $this->connection->executeSql($sql);
    }

    public function delete($id)
    {
      $sql = "DELETE FROM categoria WHERE id = $id";
      $this->connection->executeSql($sql);
    }
  }
}
 