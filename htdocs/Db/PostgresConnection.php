<?php

namespace Db {
  class PostgresConnection extends BaseConnection
  {
    private $connection;
    function __construct($server, $port, $user, $password, $database)
    {
      parent::__construct($server, $port, $user, $password, $database);
    }

    public function connect() {
      $connectionString = "user=$this->user password=$this->password host=$this->server port=$this->port dbname=$this->database";
      $this->connection = pg_connect($connectionString) or die('connection failed');
    }

    public function disconnect() {
      pg_close($this->connection);
    }

    public function getResults($result) {
      return pg_fetch_all($result);
    }

    public function executeSql($sql) {
      return pg_query($this->connection, $sql);
    }
  }
}
