<?php
require_once './config.php';

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST .
                ";dbname=" . MYSQL_DB . ";charset=utf8",
            MYSQL_USER,
            MYSQL_PASS
        );

        $this->_deploy();
    }
    private function _deploy()
    {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<SQL
                CREATE TABLE IF NOT EXISTS users (
                    id_user INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL,
                    password VARCHAR(255) NOT NULL
                );
                
                CREATE TABLE IF NOT EXISTS clients (
                    id_client INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL
                );
                
                CREATE TABLE IF NOT EXISTS orders (
                    id_order INT AUTO_INCREMENT PRIMARY KEY,
                    date DATE NOT NULL,
                    status VARCHAR(50) NOT NULL,
                    id_client INT,
                    FOREIGN KEY (id_client) REFERENCES clients(id_client)
                );
SQL;;
            $this->db->query($sql);
        }
    }
}
