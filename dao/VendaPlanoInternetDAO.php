<?php
require_once 'config/Database.php';
require_once 'models/VendaPlanoInternet.php';

class VendaPlanoInternetDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($venda) {
        $query = "INSERT INTO VendaPlanoInternet (idClientes, idPlanoInternet, DataVenda, Velocidade, Preco, Estado) VALUES (:idClientes, :idPlanoInternet, :dataVenda, :velocidade, :preco, :estado)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':idClientes', $venda->getIdClientes());
        $stmt->bindParam(':idPlanoInternet', $venda->getIdPlanoInternet());
        $stmt->bindParam(':dataVenda', $venda->getDataVenda());
        $stmt->bindParam(':velocidade', $venda->getVelocidade());
        $stmt->bindParam(':preco', $venda->getPreco());
        $stmt->bindParam(':estado', $venda->getEstado());

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read($id) {
        $query = "SELECT * FROM VendaPlanoInternet WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $venda = new VendaPlanoInternet($row['id'], $row['idClientes'], $row['idPlanoInternet'], $row['DataVenda'], $row['Velocidade'], $row['Preco'], $row['Estado']);
            return $venda;
        }

        return null;
    }

    public function update($venda) {
        $query = "UPDATE VendaPlanoInternet SET idClientes = :idClientes, idPlanoInternet = :idPlanoInternet, DataVenda = :dataVenda, Velocidade = :velocidade, Preco = :preco, Estado = :estado WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':idClientes', $venda->getIdClientes());
        $stmt->bindParam(':idPlanoInternet', $venda->getIdPlanoInternet());
        $stmt->bindParam(':dataVenda', $venda->getDataVenda());
        $stmt->bindParam(':velocidade', $venda->getVelocidade());
        $stmt->bindParam(':preco', $venda->getPreco());
        $stmt->bindParam(':estado', $venda->getEstado());
        $stmt->bindParam(':id', $venda->getId());

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete($id) {
        $query = "DELETE FROM VendaPlanoInternet WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
