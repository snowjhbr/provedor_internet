<?php
require_once 'config/Database.php';
require_once 'models/Pagamento.php';

class PagamentoDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($pagamento) {
        $query = "INSERT INTO Pagamentos (idVendaPlanoInternet, DataPagamento, Valor, MetodoPagamento) VALUES (:idVendaPlanoInternet, :dataPagamento, :valor, :metodoPagamento)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':idVendaPlanoInternet', $pagamento->getIdVendaPlanoInternet());
        $stmt->bindParam(':dataPagamento', $pagamento->getDataPagamento());
        $stmt->bindParam(':valor', $pagamento->getValor());
        $stmt->bindParam(':metodoPagamento', $pagamento->getMetodoPagamento());

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read($id) {
        $query = "SELECT * FROM Pagamentos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $pagamento = new Pagamento($row['id'], $row['idVendaPlanoInternet'], $row['DataPagamento'], $row['Valor'], $row['MetodoPagamento']);
            return $pagamento;
        }

        return null;
    }

    public function update($pagamento) {
        $query = "UPDATE Pagamentos SET idVendaPlanoInternet = :idVendaPlanoInternet, DataPagamento = :dataPagamento, Valor = :valor, MetodoPagamento = :metodoPagamento WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':idVendaPlanoInternet', $pagamento->getIdVendaPlanoInternet());
        $stmt->bindParam(':dataPagamento', $pagamento->getDataPagamento());
        $stmt->bindParam(':valor', $pagamento->getValor());
        $stmt->bindParam(':metodoPagamento', $pagamento->getMetodoPagamento());
        $stmt->bindParam(':id', $pagamento->getId());

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete($id) {
        $query = "DELETE FROM Pagamentos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
