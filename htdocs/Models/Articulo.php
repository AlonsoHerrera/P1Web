<?php

namespace Models {

  class Articulo
  {
    private $connection;
    function __construct($connection)
    {
      $this->connection = $connection;
    }

    public function index($search)
    {
      $sql = "select * from articulo ";
      if ($search) {
        $search_criteria = [];
        array_push($search_criteria, "id = " . intval($search));
        array_push($search_criteria, "descripcion ilike '%" . $search ."%'");
        array_push($search_criteria, "id_categoria ilike '%" . $search ."%'");
        array_push($search_criteria, "imagen ilike '%" . $search ."%'");

        $sql .= " where " . join($search_criteria, ' or ');
      }
      $sql .= "order by id";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }

    public function insert($descripcion,$id_categoria,$imagen)
    {
      echo $id_categoria;
      $sql = "INSERT INTO articulo(descripcion,id_categoria,imagen) VALUES ('$descripcion','$id_categoria','$imagen')";
      $this->connection->executeSql($sql);
    }

       public function findArticulo($id)
    {
      $result = $this->connection->executeSql("select * from articulo where id = '$id'");
      return $this->connection->getResults($result)[0];
    }

     public function update($id,$descripcion,$id_categoria,$imagen)
    {
      $sql = "UPDATE articulo SET descripcion='$descripcion',id_categoria='$id_categoria',imagen='$imagen' WHERE id = $id";
      $this->connection->executeSql($sql);
    }
  }
}
 