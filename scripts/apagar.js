const LOCAL_API_DELETE = "http://localhost:9900/delete.php";

document
  .getElementById("formDelete")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch(LOCAL_API_DELETE, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => console.log(data))
      .catch((error) => console.error("Erro:", error));
  });
