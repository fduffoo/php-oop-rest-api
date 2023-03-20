<?php

class Database {

   // DB Params

   // Server Conn
   private $hostname;
   private $dbname;
   private $username;
   private $password;
   private $port;
   private $conn;

   // Local Conn
   //private $host = 'localhost';
   //private $db_name = 'quotesdb';
   //private $username = 'root';
   //private $password = '';
   //private $conn;

    public function __construct () {
    $this->username = getenv('USERNAME');
    $this->password = getenv('PASSWORD');
    $this->dbname = getenv('DBNAME');
    $this->host = getenv('HOST');
    $this->port = getenv('PORT');
    }

    // DB Connect
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->hostname . ';dbname=' . $this->dbname,
            $this->username, $this->password, $this->port);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}