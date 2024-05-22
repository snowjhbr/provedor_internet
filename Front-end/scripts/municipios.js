const municipioSelect = document.getElementById("municipio");
// Evento inicial de carregamento dos estados (UFs)
fetch(
  "https://servicodados.ibge.gov.br/api/v1/localidades/estados/CE/municipios"
)
  .then((response) => response.json())
  .then((municipios) => {
    municipios.forEach((municipio) => {
      const option = document.createElement("option");
      option.value = municipio.id;
      option.text = municipio.nome;
      municipioSelect.appendChild(option);
    });
  })
  .catch((error) => {
    console.error(error);
  });
