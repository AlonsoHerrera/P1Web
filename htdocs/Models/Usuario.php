<?php

namespace Models {

  class Usuario
  {
    private $connection;
    function __construct($connection)
    {
      $this->connection = $connection;
    }

    public function find($correo, $contrasenna)
    {
      $result = $this->connection->executeSql("select * from usuario where correo = '$correo' and contrasenna = md5('$contrasenna')");
      return $this->connection->getResults($result)[0];
    }

    public function insert($nombre, $apellidos,$correo,$contrasenna,$direccion,$rol)
    {
      echo $contrasenna;
      $sql = "INSERT INTO usuario(nombre,apellidos,correo,contrasenna,direccion,rol) VALUES ('$nombre','$apellidos','$correo',md5('$contrasenna'),'$direccion', '$rol')";
      $this->connection->executeSql($sql);
    }
       public function findUser($id)
    {
      $result = $this->connection->executeSql("select * from usuario where id = '$id'");
      return $this->connection->getResults($result)[0];
    }
     public function update($id, $nombre,$apellidos,$correo,$contrasenna,$direccion,$rol)
    {
      $sql = "UPDATE usuario SET nombre = '$nombre', apellidos='$apellidos',correo='$correo',contrasenna=md5('$contrasenna'),direccion='$direccion',rol='$rol' WHERE id = $id";
      $this->connection->executeSql($sql);
    }
    public function getIdUsuario()
    {
      $result = $this->connection->executeSql("select * from usuario where id =  (SELECT MAX(id) FROM usuario)");
      return $this->connection->getResults($result)[0];
  }
}
 }