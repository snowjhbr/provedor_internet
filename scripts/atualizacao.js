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
