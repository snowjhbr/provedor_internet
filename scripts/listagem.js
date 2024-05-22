const LOCAL_API = "http://localhost:9900/list.php";
// Função para fazer uma requisição AJAX
function carregarClientes() {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Se a requisição foi bem-sucedida, parse JSON e exiba os clientes
        var clientes = JSON.parse(xhr.responseText);
        exibirClientes(clientes);
        console.log(clientes);
      } else {
        // Se ocorrer um erro na requisição, exiba uma mensagem de erro
        console.error("Erro ao carregar clientes:", xhr.status, xhr.statusText);
      }
    }
  };

  // Abre uma requisição GET para o arquivo PHP que lista os clientes
  xhr.open("GET", LOCAL_API, true);
  xhr.send();
}

// Função para exibir os clientes na página
function exibirClientes(clientes) {
  var listaClientes = document.getElementById("listaClientes");

  // Limpa a lista de clientes antes de adicionar os novos
  listaClientes.innerHTML = "";

  // Adiciona cada cliente à lista como um item de lista
  clientes.forEach(function (cliente) {
    var li = document.createElement("li");
    li.textContent = cliente.nome + " - " + cliente.email;
    listaClientes.appendChild(li);
  });
}

// Chama a função para carregar os clientes quando a página é carregada
carregarClientes();
