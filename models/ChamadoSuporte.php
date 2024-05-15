<?php
class ChamadoSuporte {
    private $id;
    private $idClientes;
    private $dataAbertura;
    private $dataFechamento;
    private $descricao;
    private $status;

    public function __construct($id, $idClientes, $dataAbertura, $dataFechamento, $descricao, $status) {
        $this->id = $id;
        $this->idClientes = $idClientes;
        $this->dataAbertura = $dataAbertura;
        $this->dataFechamento = $dataFechamento;
        $this->descricao = $descricao;
        $this->status = $status;
    }

    // Getters and Setters
    public function getId() { return $this->id; }
    public function getIdClientes() { return $this->idClientes; }
    public function getDataAbertura() { return $this->dataAbertura; }
    public function getDataFechamento() { return $this->dataFechamento; }
    public function getDescricao() { return $this->descricao; }
    public function getStatus() { return $this->status; }

    public function setId($id) { $this->id = $id; }
    public function setIdClientes($idClientes) { $this->idClientes = $idClientes; }
    public function setDataAbertura($dataAbertura) { $this->dataAbertura = $dataAbertura; }
    public function setDataFechamento($dataFechamento) { $this->dataFechamento = $dataFechamento; }
    public function setDescricao($descricao) { $this->descricao = $descricao; }
    public function setStatus($status) { $this->status = $status; }
}
?>
