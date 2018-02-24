<?php
namespace Db {
  use Mysqli;

  class MySqlConnection extends BaseConnection
  {
    private $connection;
    function __construct($server, $port, $user, $password, $database)
    {
      parent::__construct($server, $port, $user, $password, $database);
    }

    public function connect() {
      $this->connection = new mysqli($this->server, $this->user, $this->password, $this->database);
      if ($this->connection->connect_errno) {
          printf("Failed to connect to MySQL: (%s) %s", $this->connection->connect_errno, $this->connection->connect_error);
          exit;
      }
    }

    public function disconnect() {
      $this->connection->close();
    }

    public function getResults($result) {
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function executeSql($sql) {
      return $this->connection->query($sql);
    }
  }
}
