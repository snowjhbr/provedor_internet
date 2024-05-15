<?php
class PlanoInternet {
    private $id;
    private $nome;
    private $velocidade;
    private $preco;
    private $descricao;
    private $validade;

    public function __construct($id, $nome, $velocidade, $preco, $descricao, $validade) {
        $this->id = $id;
        $this->nome = $nome;
        $this->velocidade = $velocidade;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->validade = $validade;
    }

    // Getters and Setters
    public function getId() { return $this->id; }
    public function getNome() { return $this->nome; }
    public function getVelocidade() { return $this->velocidade; }
    public function getPreco() { return $this->preco; }
    public function getDescricao() { return $this->descricao; }
    public function getValidade() { return $this->validade; }

    public function setId($id) { $this->id = $id; }
    public function setNome($nome) { $this->nome = $nome; }
    public function setVelocidade($velocidade) { $this->velocidade = $velocidade; }
    public function setPreco($preco) { $this->preco = $preco; }
    public function setDescricao($descricao) { $this->descricao = $descricao; }
    public function setValidade($validade) { $this->validade = $validade; }
}
?>
