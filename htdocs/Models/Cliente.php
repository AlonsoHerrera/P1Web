<?php

namespace Models {

  class Cliente
  {
    private $connection;
    function __construct($connection)
    {
      $this->connection = $connection;
    }

    public function find($id)
    {
      $result = $this->connection->executeSql("select * from clientes where id = $id");
      return $this->connection->getResults($result)[0];
    }

    public function index($search)
    {
      $sql = "select * from clientes ";
      if ($search) {
        $search_criteria = [];
        array_push($search_criteria, "id = " . intval($search));
        array_push($search_criteria, "nombre ilike '%" . $search ."%'");
        $sql .= " where " . join($search_criteria, ' or ');
      }
      $sql .= "order by id";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }

    public function insert($name)
    {
      $sql = "INSERT INTO clientes(nombre) VALUES ('$name')";
      $this->connection->executeSql($sql);
    }

    public function update($id, $nombre)
    {
      $sql = "UPDATE clientes SET nombre = '$nombre' WHERE id = $id";
      $this->connection->executeSql($sql);
    }

    public function delete($id)
    {
      $sql = "DELETE FROM clientes WHERE id = $id";
      $this->connection->executeSql($sql);
    }
  } 
}
