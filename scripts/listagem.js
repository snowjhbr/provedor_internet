const LOCAL_API = "http://localhost:9900/list.php";

// Função para criar um elemento de lista para um cliente
function criarItemLista(cliente) {
  const itemLista = document.createElement("li");
  itemLista.textContent = `Nome: ${cliente.nome}, CPF: ${cliente.cpf}, Celular: ${cliente.celular}, Município: ${cliente.municipio}, Email: ${cliente.email}`;
  return itemLista;
}

// Função para limpar e exibir os clientes na página
function mostrarClientes(clientes) {
  const listaClientes = document.getElementById("list");
  listaClientes.innerHTML = ""; // Limpa o conteúdo atual da lista
  clientes.forEach((cliente) => {
    const itemLista = criarItemLista(cliente);
    listaClientes.appendChild(itemLista); // Adiciona o elemento de lista à lista de clientes
  });
}

// Função para carregar os clientes da API
function carregarClientes() {
  fetch(LOCAL_API)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Erro ao carregar os clientes");
      }
      return response.json(); // Retorna a resposta como JSON
    })
    .then((data) => {
      mostrarClientes(data); // Exibe os clientes na página
    })
    .catch((error) => {
      console.error("Erro:", error); // Manipula erros
    });
}

// Chama a função para carregar os clientes quando a página for carregada
document.addEventListener("DOMContentLoaded", carregarClientes);
