const LOCAL_API = "http://localhost:9900/create.php";

document.getElementById("form").addEventListener("submit", function (event) {
  event.preventDefault();

  var formData = new FormData(this);

  fetch(LOCAL_API, {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Erro ao cadastrar o cliente");
      }
      return response.text();
    })
    .then((data) => {
      console.log(data);
      alert("Cliente cadastrado com sucesso!"); // Exibe mensagem de sucesso
      window.location.href = "lista.html"; // Redireciona para a página de listagem
    })
    .catch((error) => {
      console.error("Erro:", error);
      // Não exibe a mensagem de erro aqui, pois estamos capturando apenas erros reais da requisição
    });
});
