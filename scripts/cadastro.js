const LOCAL_API = "http://localhost:9900/create.php";

document.getElementById("form").addEventListener("submit", function (event) {
  window.location.href = "listagem.html";
  event.preventDefault();

  var formData = new FormData(this);

  fetch(LOCAL_API, {
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
