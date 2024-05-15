<?php
require_once 'config/Database.php';
require_once 'models/PlanoInternet.php';

class PlanoInternetDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($planoInternet) {
        $query = "INSERT INTO PlanoInternet (Nome, Velocidade, Preco, Descricao, Validade) VALUES (:nome, :velocidade, :preco, :descricao, :validade)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $planoInternet->getNome());
        $stmt->bindParam(':velocidade', $planoInternet->getVelocidade());
        $stmt->bindParam(':preco', $planoInternet->getPreco());
        $stmt->bindParam(':descricao', $planoInternet->getDescricao());
        $stmt->bindParam(':validade', $planoInternet->getValidade());

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read($id) {
        $query = "SELECT * FROM PlanoInternet WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $planoInternet = new PlanoInternet($row['id'], $row['Nome'], $row['Velocidade'], $row['Preco'], $row['Descricao'], $row['Validade']);
            return $planoInternet;
        }

        return null;
    }

    public function update($planoInternet) {
        $query = "UPDATE PlanoInternet SET Nome = :nome, Velocidade = :velocidade, Preco = :preco, Descricao = :descricao, Validade = :validade WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $planoInternet->getNome());
        $stmt->bindParam(':velocidade', $planoInternet->getVelocidade());
        $stmt->bindParam(':preco', $planoInternet->getPreco());
        $stmt->bindParam(':descricao', $planoInternet->getDescricao());
        $stmt->bindParam(':validade', $planoInternet->getValidade());
        $stmt->bindParam(':id', $planoInternet->getId());

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete($id) {
        $query = "DELETE FROM PlanoInternet WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
