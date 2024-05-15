<?php
class VendaPlanoInternet {
    private $id;
    private $idClientes;
    private $idPlanoInternet;
    private $dataVenda;
    private $velocidade;
    private $preco;
    private $estado;

    public function __construct($id, $idClientes, $idPlanoInternet, $dataVenda, $velocidade, $preco, $estado) {
        $this->id = $id;
        $this->idClientes = $idClientes;
        $this->idPlanoInternet = $idPlanoInternet;
        $this->dataVenda = $dataVenda;
        $this->velocidade = $velocidade;
        $this->preco = $preco;
        $this->estado = $estado;
    }

    // Getters and Setters
    public function getId() { return $this->id; }
    public function getIdClientes() { return $this->idClientes; }
    public function getIdPlanoInternet() { return $this->idPlanoInternet; }
    public function getDataVenda() { return $this->dataVenda; }
    public function getVelocidade() { return $this->velocidade; }
    public function getPreco() { return $this->preco; }
    public function getEstado() { return $this->estado; }

    public function setId($id) { $this->id = $id; }
    public function setIdClientes($idClientes) { $this->idClientes = $idClientes; }
    public function setIdPlanoInternet($idPlanoInternet) { $this->idPlanoInternet = $idPlanoInternet; }
    public function setDataVenda($dataVenda) { $this->dataVenda = $dataVenda; }
    public function setVelocidade($velocidade) { $this->velocidade = $velocidade; }
    public function setPreco($preco) { $this->preco = $preco; }
    public function setEstado($estado) { $this->estado = $estado; }
}
?>
