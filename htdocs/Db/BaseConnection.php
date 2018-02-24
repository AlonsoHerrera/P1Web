<?php

namespace Db {

  /*
    Abstracción:
    se define un "contrato" abstracto en donde todas las clases "hijas" deben implementar los metodos descritos
    en el contrato.

    Esto se puede lograr mediante clases abstractas o bien Interfaces.

    Ejemplo:
    la clase abstracta BaseConnection es implementada por las clases MySqlConnection y PostgresConnection
  */
  abstract class BaseConnection
  {
    /*
      Herencia:
      las clases pueden heredar metodos y propiedades de los padres siempre y cuando estas sean public o protected

      Ejemplo:
      Todos los atributos tipo protected son accesibles desde las clases hijas, esto les permite acceder a ellas facilmente
    */
    protected $server;
    protected $port;
    protected $user;
    protected $password;
    protected $database;

    function __construct($server, $port, $user, $password, $database)
    {
      $this->server = $server;
      $this->port = $port;
      $this->user = $user;
      $this->password = $password;
      $this->database = $database;
    }

    abstract public function connect();
    abstract public function disconnect();
    abstract public function executeSql($sql);
    abstract public function getResults($result);
  }
}
