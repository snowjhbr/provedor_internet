const LOCAL_API = "http://localhost:9900/list.php";
function carregarClientes() {
  // Faz uma requisição GET para a API PHP
  fetch(LOCAL_API)
    .then((response) => {
      // Verifica se a resposta da requisição foi bem-sucedida
      if (!response.ok) {
        throw new Error("Erro ao carregar os clientes");
      }
      // Retorna a resposta como JSON
      return response.json();
    })
    .then((data) => {
      // Processa os dados recebidos
      mostrarClientes(data);
    })
    .catch((error) => {
      // Manipula erros
      console.error("Erro:", error);
    });
}

// Função para exibir os clientes na página
function mostrarClientes(clientes) {
  // Seleciona o elemento HTML onde os clientes serão exibidos
  const listaClientes = document.getElementById("list");

  // Limpa o conteúdo atual da lista
  listaClientes.innerHTML = "";

  // Itera sobre os clientes recebidos
  clientes.forEach((cliente) => {
    // Cria um elemento de lista para cada cliente
    const itemLista = document.createElement("li");
    console.log(cliente);

    // Adiciona os dados do cliente ao elemento de lista
    itemLista.textContent = `Nome: ${cliente.nome}, CPF: ${cliente.cpf}, Celular: ${cliente.celular}, Município: ${cliente.municipio}, Email: ${cliente.email}`;

    // Adiciona o elemento de lista à lista de clientes
    listaClientes.appendChild(itemLista);
  });
}

// Chama a função para carregar os clientes quando a página carregar
document.addEventListener("DOMContentLoaded", carregarClientes);
