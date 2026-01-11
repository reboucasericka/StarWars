document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("characters-container");

    // Fazendo a requisição para a API local
    fetch("api/peoples.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Erro ao buscar personagens.");
            }
            return response.json();
        })
        .then(data => {
            // Verifica se é array e se não está vazio
            if (!Array.isArray(data)) {
                throw new Error("Formato inválido de dados.");
            }

            if (data.length === 0) {
                container.innerHTML = "<p>Nenhum personagem encontrado.</p>";
                return;
            }

            // Limpa o container
            container.innerHTML = "";

            // Renderiza cada personagem como card
            data.forEach(character => {
                const card = document.createElement("a");
                card.href = character.wiki || "#";
                card.target = "_blank";
                card.className = "post-box";
                
                card.innerHTML = `
                    <div class="post-img">
                        <img src="${character.image}" alt="${character.name}" />
                    </div>
                    <div class="post-text">
                        <span class="category"></span>
                        <div class="bottom-text">
                            <div class="character-name">
                                <span>Personagem</span>
                                <strong>${character.name}</strong>
                            </div>
                        </div>
                    </div>
                `;
                
                container.appendChild(card);
            });
        })
        .catch(error => {
            console.error("Erro:", error);
            container.innerHTML = "<p>Erro ao carregar os personagens. Tente novamente mais tarde.</p>";
        });
});
