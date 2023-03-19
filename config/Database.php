<?php

class Database {
    // DB Params
    private $host = 'dpg-cgb4uihmbg55nql1c3p0-a';
    private $db_name = 'quotesdb_zu7u';
    private $username = 'fduffoo';
    private $password = 'NP8hVT92m4BGGF1CZPTaRHHOFV3BT5DR';
    private $conn;

    // DB Connect
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
            $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}