<?php
class Pagamento {
    private $id;
    private $idVendaPlanoInternet;
    private $dataPagamento;
    private $valor;
    private $metodoPagamento;

    public function __construct($id, $idVendaPlanoInternet, $dataPagamento, $valor, $metodoPagamento) {
        $this->id = $id;
        $this->idVendaPlanoInternet = $idVendaPlanoInternet;
        $this->dataPagamento = $dataPagamento;
        $this->valor = $valor;
        $this->metodoPagamento = $metodoPagamento;
    }

    // Getters and Setters
    public function getId() { return $this->id; }
    public function getIdVendaPlanoInternet() { return $this->idVendaPlanoInternet; }
    public function getDataPagamento() { return $this->dataPagamento; }
    public function getValor() { return $this->valor; }
    public function getMetodoPagamento() { return $this->metodoPagamento; }

    public function setId($id) { $this->id = $id; }
    public function setIdVendaPlanoInternet($idVendaPlanoInternet) { $this->idVendaPlanoInternet = $idVendaPlanoInternet; }
    public function setDataPagamento($dataPagamento) { $this->dataPagamento = $dataPagamento; }
    public function setValor($valor) { $this->valor = $valor; }
    public function setMetodoPagamento($metodoPagamento) { $this->metodoPagamento = $metodoPagamento; }
}
?>
