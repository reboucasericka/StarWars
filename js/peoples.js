document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("itens-caracteres");

    // Fazendo a requisição para o backend (peoples.php)
    fetch("peoples.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Erro ao buscar personagens.");
            }
            return response.text();
        })
        .then(html => {
            container.innerHTML = html; // Insere o HTML gerado pela view no container
        })
        .catch(error => {
            console.error("Erro:", error);
            container.innerHTML = "<p>Erro ao carregar os personagens. Tente novamente mais tarde.</p>";
        });
});
