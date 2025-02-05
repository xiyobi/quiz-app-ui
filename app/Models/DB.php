<?php

namespace App\Models;

use PDO;

class DB {
    private string $db_name;
    private string $db_user;
    private string $db_pass;
    private string $db_host;
    protected PDO $conn;
    public function __construct () {
        $this->db_host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->db_user = $_ENV['DB_USER'];
        $this->db_pass = $_ENV['DB_PASS'];
        $this->conn = new PDO(
            "mysql:host=$this->db_host;dbname=$this->db_name",
            $this->db_user, $this->db_pass,
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]
        );
    }
    public function getConnection () {
        return $this->conn;
    }
}