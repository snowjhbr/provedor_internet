const LOCAL_API = "http://localhost:9900/main.php";

document.getElementById("form").addEventListener("submit", function (event) {
  event.preventDefault();

  var formData = new FormData(this);

  fetch("http://localhost:9900/main.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => console.log(data))
    .catch((error) => console.error("Erro:", error));
});
