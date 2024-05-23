const LOCAL_CREATE_API = "http://localhost:9900/create.php";

// lida com o label do botão submit do formulário
function handleLabelBtnSubmit() {
  document.addEventListener("DOMContentLoaded", function () {
    const idCliente = obterParametroURL("id");
    if (idCliente) {
      document.getElementById("button-submit").textContent = "Editar";
    } else {
      document.getElementById("button-submit").textContent = "Cadastrar";
    }
  });
}

// lida com a ação de "reset" e volta para a tela inicial
document.getElementById("form").addEventListener("reset", function () {
  window.location.href = "index.html";
});

// lida com a açãp de "submit" enviando os dados do formulário para a API
document.getElementById("form").addEventListener("submit", function (event) {
  window.location.href = "listagem.html";
  event.preventDefault();

  var formData = new FormData(this);

  fetch(LOCAL_CREATE_API, {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error(
          "Erro ao cadastrar o cliente, tente novamente mais tarde."
        );
      }
      return response.text();
    })
    .catch((error) => {
      console.error("Erro:", error);
    });
});

handleLabelBtnSubmit();
