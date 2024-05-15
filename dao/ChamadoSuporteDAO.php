<?php
require_once 'config/Database.php';
require_once 'models/ChamadoSuporte.php';

class ChamadoSuporteDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($chamado) {
        $query = "INSERT INTO ChamadosSuporte (idClientes, DataAbertura, DataFechamento, Descricao, Status) VALUES (:idClientes, :dataAbertura, :dataFechamento, :descricao, :status)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':idClientes', $chamado->getIdClientes());
        $stmt->bindParam(':dataAbertura', $chamado->getDataAbertura());
        $stmt->bindParam(':dataFechamento', $chamado->getDataFechamento());
        $stmt->bindParam(':descricao', $chamado->getDescricao());
        $stmt->bindParam(':status', $chamado->getStatus());

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read($id) {
        $query = "SELECT * FROM ChamadosSuporte WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $chamado = new ChamadoSuporte($row['id'], $row['idClientes'], $row['DataAbertura'], $row['DataFechamento'], $row['Descricao'], $row['Status']);
            return $chamado;
        }

        return null;
    }

    public function update($chamado) {
        $query = "UPDATE ChamadosSuporte SET idClientes = :idClientes, DataAbertura = :dataAbertura, DataFechamento = :dataFechamento, Descricao = :descricao, Status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':idClientes', $chamado->getIdClientes());
        $stmt->bindParam(':dataAbertura', $chamado->getDataAbertura());
        $stmt->bindParam(':dataFechamento', $chamado->getDataFechamento());
        $stmt->bindParam(':descricao', $chamado->getDescricao());
        $stmt->bindParam(':status', $chamado->getStatus());
        $stmt->bindParam(':id', $chamado->getId());

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete($id) {
        $query = "DELETE FROM ChamadosSuporte WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
