<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'tde03_back';
    private $username = 'postgres';
    private $password = 'isaac020492.';
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO('pgsql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo 'Connection error: ' . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
