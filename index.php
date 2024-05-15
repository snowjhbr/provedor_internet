<?php
require_once 'dao/ClienteDAO.php';
require_once 'dao/PlanoInternetDAO.php';
require_once 'dao/VendaPlanoInternetDAO.php';
require_once 'dao/PagamentoDAO.php';
require_once 'dao/ChamadoSuporteDAO.php';

// Exemplo de uso das classes DAO

// Criar um novo cliente
$clienteDAO = new ClienteDAO();
$cliente = new Cliente(null, 'João da Silva', 'joao@example.com', '123456789', 'Rua Exemplo, 123');
$clienteDAO->create($cliente);

// Ler um cliente pelo ID
$cliente = $clienteDAO->read(1);
if ($cliente != null) {
    echo 'Nome: ' . $cliente->getNome();
} else {
    echo 'Cliente não encontrado.';
}

// Atualizar um cliente
$cliente->setNome('João Atualizado');
$clienteDAO->update($cliente);

// Deletar um cliente
$clienteDAO->delete(1);


?>
