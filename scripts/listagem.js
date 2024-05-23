const LOCAL_API = "http://localhost:9900/list.php";

// Função para criar um elemento de lista para um cliente
function criarItemLista(cliente) {
  const itemLista = document.createElement("li");
  itemLista.textContent = `ID: ${cliente.id} , Nome: ${cliente.nome}, CPF: ${cliente.cpf}, Celular: ${cliente.celular}, Município: ${cliente.municipio}, Email: ${cliente.email}`;

  // Cria um botão para apagar o cliente
  const botaoApagar = document.createElement("button");
  botaoApagar.textContent = "Apagar";
  botaoApagar.addEventListener("click", function () {
    apagarCliente(cliente.id); // Chama a função para apagar o cliente quando o botão for clicado
  });

  // Cria um botão para editar dados do cliente
  const botaoEditar = document.createElement("button");
  botaoEditar.textContent = "Editar";
  botaoEditar.addEventListener("click", function () {
    window.location.href = `cadastro.html`;
  });

  // Adiciona o botão à lista de clientes
  itemLista.appendChild(botaoApagar);
  itemLista.appendChild(botaoEditar);

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

// Função para apagar um cliente
function apagarCliente(id) {
  const LOCAL_API_DELETE = `http://localhost:9900/delete.php`;

  fetch(LOCAL_API_DELETE, {
    method: "POST",
    body: new URLSearchParams({ id: id }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Erro ao apagar o cliente");
      }
      return response.text();
    })
    .then((data) => {
      console.log(data); // Exibe a resposta do servidor
      carregarClientes(); // Recarrega a lista de clientes após apagar um cliente
    })
    .catch((error) => {
      console.error("Erro:", error); // Manipula erros
    });
}

// Chama a função para carregar os clientes quando a página for carregada
document.addEventListener("DOMContentLoaded", carregarClientes);

// Função para apagar um cliente
function atualizarCliente(id) {
  const LOCAL_API_DELETE = `http://localhost:9900/update.php`;

  fetch(LOCAL_API_DELETE, {
    method: "POST",
    body: new URLSearchParams({ id: id }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Erro ao atualizar dados  do cliente");
      }
      return response.text();
    })
    .then((data) => {
      console.log(data); // Exibe a resposta do servidor
      carregarClientes(); // Recarrega a lista de clientes após apagar um cliente
    })
    .catch((error) => {
      console.error("Erro:", error); // Manipula erros
    });
}

// Chama a função para carregar os clientes quando a página for carregada
document.addEventListener("DOMContentLoaded", carregarClientes);
