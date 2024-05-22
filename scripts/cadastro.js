const LOCAL_API = "http://localhost:9900/create.php";

document.getElementById("form").addEventListener("submit", function (event) {
  event.preventDefault();

  var formData = new FormData(this);

  fetch(LOCAL_API, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => console.log(data))
    .catch((error) => console.error("Erro:", error));
});
