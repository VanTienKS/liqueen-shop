<?php
require_once('config.php');

class Database
{
     private static $instance;
     private $connection;

     public static function getInstance()
     {
          if (!self::$instance) {
               self::$instance = new Database();
          }
          return self::$instance;
     }

     public function getConnection()
     {
          if (!$this->connection) {
               $this->connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

               if ($this->connection->connect_errno) {
                    echo "Failed to connect to MySQL: " . $this->connection->connect_error;
                    exit();
               }
          }
          return $this->connection;
     }

     public function execute($query)
     {
          return mysqli_query($this->getConnection(), $query);
     }
}
