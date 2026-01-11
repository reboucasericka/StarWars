document.addEventListener("DOMContentLoaded", async () => {
    const params = new URLSearchParams(window.location.search);
    const movieId = params.get("id");
  
    if (!movieId) {
      console.error("ID do filme não encontrado.");
      const table = document.getElementById("movie-details-table");
      if (table) {
        const tbody = table.querySelector("tbody");
        if (tbody) {
          tbody.innerHTML = "<tr><td colspan='2'>Erro: Nenhum filme selecionado.</td></tr>";
        }
      }
      return;
    }
  
    try {
      // Busca detalhes do filme da API local
      const response = await fetch(`api/films.php?id=${movieId}`);
      if (!response.ok) {
        throw new Error(`Erro ao buscar dados: ${response.status}`);
      }
      const movieDetails = await response.json();

      // Se a API retornou erro, exibe mensagem
      if (movieDetails.error) {
        throw new Error(movieDetails.error);
      }

      // Se characters for array de URLs, busca os nomes via API local
      // Se já for array de nomes, usa diretamente
      if (movieDetails.characters && movieDetails.characters.length > 0) {
        if (typeof movieDetails.characters[0] === 'string' && movieDetails.characters[0].startsWith('http')) {
          // Extrai IDs das URLs e busca via API local
          const characterPromises = movieDetails.characters.map(async (url) => {
            try {
              // Extrai ID da URL: https://swapi.dev/api/people/1/ -> 1
              const match = url.match(/\/people\/(\d+)\//);
              if (match && match[1]) {
                const characterId = match[1];
                const characterResponse = await fetch(`api/peoples.php?id=${characterId}`);
                if (!characterResponse.ok) {
                  return "Nome não disponível";
                }
                const characterData = await characterResponse.json();
                return characterData.name || "Nome não disponível";
              }
              return "Nome não disponível";
            } catch (error) {
              console.error("Erro ao buscar personagem:", error);
              return "Nome não disponível";
            }
          });
          movieDetails.characters = await Promise.all(characterPromises);
        }
      }

      // Formata idade do filme
      let ageText = 'Não disponível';
      if (movieDetails.age) {
        if (typeof movieDetails.age === 'object') {
          ageText = `${movieDetails.age.years} anos, ${movieDetails.age.months} meses, ${movieDetails.age.days} dias`;
        } else {
          ageText = movieDetails.age;
        }
      } else if (movieDetails.release_date) {
        // Calcula manualmente se não tiver
        const releaseDate = new Date(movieDetails.release_date);
        const today = new Date();
        const diffTime = Math.abs(today - releaseDate);
        const diffYears = today.getFullYear() - releaseDate.getFullYear();
        const diffMonths = today.getMonth() - releaseDate.getMonth() + diffYears * 12;
        const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
        ageText = `${diffYears} anos, ${Math.abs(diffMonths % 12)} meses, ${diffDays} dias`;
      }

      const detailsTable = document.getElementById("movie-details-table");
      if (!detailsTable) {
        console.error("Tabela não encontrada");
        return;
      }

      const tbody = detailsTable.querySelector("tbody");
      if (!tbody) {
        console.error("Tbody não encontrado");
        return;
      }

      tbody.innerHTML = `
        <tr><td>Título</td><td>${movieDetails.title || 'Não disponível'}</td></tr>
        <tr><td>Nº Episódio</td><td>${movieDetails.episode_id || 'Não disponível'}</td></tr>
        <tr><td>Sinopse</td><td>${movieDetails.opening_crawl ? movieDetails.opening_crawl.replace(/\n/g, "<br>") : 'Não disponível'}</td></tr>
        <tr><td>Data de Lançamento</td><td>${movieDetails.release_date ? new Date(movieDetails.release_date).toLocaleDateString("pt-BR") : 'Não disponível'}</td></tr>
        <tr><td>Diretor</td><td>${movieDetails.director || 'Não disponível'}</td></tr>
        <tr><td>Produtores</td><td>${movieDetails.producer || 'Não disponível'}</td></tr>
        <tr><td>Personagens</td><td>${movieDetails.characters && movieDetails.characters.length > 0 ? movieDetails.characters.map((name) => `<span class="character-tag">${name}</span>`).join(", ") : 'Nenhum personagem disponível'}</td></tr>
        <tr><td>Idade do Filme</td><td>${ageText}</td></tr>
      `;
    } catch (error) {
      console.error("Erro ao carregar os detalhes do filme:", error);
      const detailsTable = document.getElementById("movie-details-table");
      if (detailsTable) {
        const tbody = detailsTable.querySelector("tbody");
        if (tbody) {
          tbody.innerHTML = "<tr><td colspan='2'>Erro ao carregar os detalhes do filme. Tente novamente mais tarde.</td></tr>";
        }
      }
    }
  });
