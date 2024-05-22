<?php
include 'config.php';

class UsuarioDAO {
    private $conexao;

    public function __construct() {
        $this->conexao = getConnection();
    }

    public function login($usuario) {
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha', $usuario->getSenha());
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
