<?php
require_once 'config/Database.php';
require_once 'models/Cliente.php';

class ClienteDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($cliente) {
        $query = "INSERT INTO Clientes (Nome, Email, Telefone, Endereco) VALUES (:nome, :email, :telefone, :endereco)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $cliente->getNome());
        $stmt->bindParam(':email', $cliente->getEmail());
        $stmt->bindParam(':telefone', $cliente->getTelefone());
        $stmt->bindParam(':endereco', $cliente->getEndereco());

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read($id) {
        $query = "SELECT * FROM Clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $cliente = new Cliente($row['id'], $row['Nome'], $row['Email'], $row['Telefone'], $row['Endereco']);
            return $cliente;
        }

        return null;
    }

    public function update($cliente) {
        $query = "UPDATE Clientes SET Nome = :nome, Email = :email, Telefone = :telefone, Endereco = :endereco WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $cliente->getNome());
        $stmt->bindParam(':email', $cliente->getEmail());
        $stmt->bindParam(':telefone', $cliente->getTelefone());
        $stmt->bindParam(':endereco', $cliente->getEndereco());
        $stmt->bindParam(':id', $cliente->getId());

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete($id) {
        $query = "DELETE FROM Clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
