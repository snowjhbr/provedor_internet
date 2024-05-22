<?php
include_once 'config/Database.php';
include_once 'models/Usuario.php';

class UsuarioDAO {
    private $conn;
    private $table_name = "usuarios";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function login($usuario) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email AND senha = :senha";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha', $usuario->getSenha());
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
