const LOCAL_API_UPDATE = "http://localhost:9900/update.php"; // URL do endpoint de atualização

document.getElementById("form").addEventListener("submit", function (event) {
  event.preventDefault();

  var formData = new FormData(this);

  fetch(LOCAL_API_UPDATE, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => console.log(data)) // Aqui você pode decidir o que fazer com a resposta do servidor
    .catch((error) => console.error("Erro:", error));
});

// Função para obter o parâmetro da URL
function obterParametroURL(nome) {
  const parametros = new URLSearchParams(window.location.search);
  return parametros.get(nome);
}

function carregarDadosCliente(id) {
  const LOCAL_API_GET_CLIENTE = `http://localhost:9900/list.php?id=${id}`;

  fetch(LOCAL_API_GET_CLIENTE)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Erro ao obter os dados do cliente");
      }
      return response.json();
    })
    .then((clientes) => {
      const clienteFiltrado = clientes.filter((cliente) => cliente.id === id);

      if (clienteFiltrado.length > 0) {
        const primeiroCliente = clienteFiltrado[0];
        document.getElementById("nome").value = primeiroCliente.nome;
        document.getElementById("cpf").value = primeiroCliente.cpf;
        document.getElementById("celular").value = primeiroCliente.celular;
        document.getElementById("municipio").value = primeiroCliente.municipio;
        document.getElementById("email").value = primeiroCliente.email;
      } else {
        console.error("Cliente não encontrado, ATUALIZAÇÃO");
      }
    })
    .catch((error) => {
      console.error("Erro:", error);
    });
}

document.addEventListener("DOMContentLoaded", function () {
  // Obter o ID do cliente da URL
  const idCliente = obterParametroURL("id");
  // Verificar se o ID do cliente foi passado na URL
  if (idCliente) {
    // Carregar os dados do cliente correspondente
    carregarDadosCliente(idCliente);
  } else {
    console.error("ID do cliente não fornecido na URL");
  }
});
