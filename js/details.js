document.addEventListener("DOMContentLoaded", async () => {
    const params = new URLSearchParams(window.location.search);
    const movieId = params.get("id");
  
    if (!movieId) {
      console.error("ID do filme não encontrado.");
      document.getElementById('movie-details-table').innerHTML = "<tr><td colspan='2'>Erro: Nenhum filme selecionado.</td></tr>"; // Mensagem de erro no HTML também
      return;
    }
  
    try {
      const response = await fetch(`https://swapi.dev/api/films/${movieId}/`);
      if (!response.ok) {
        throw new Error(`Erro ao buscar dados: ${response.status}`); // Inclui o status do erro
      }
      const movieDetails = await response.json();
  
      // Busca os personagens em paralelo (como no segundo código)
      const characterPromises = movieDetails.characters.map(async (url) => {
        const characterResponse = await fetch(url);
        if (!characterResponse.ok) { //Tratamento de erro individual para cada personagem
          console.error(`Erro ao buscar personagem em ${url}: ${characterResponse.status}`);
          return "Nome não disponível"; //Retorna uma mensagem caso o personagem não carregue.
        }
        const characterData = await characterResponse.json();
        return characterData.name;
      });
      const characterNames = await Promise.all(characterPromises);
      movieDetails.characters = characterNames;
  
      // Calcula a idade do filme (com cálculo mais preciso dos meses, como no primeiro código)
      const releaseDate = new Date(movieDetails.release_date);
      const today = new Date();
      const diffTime = Math.abs(today - releaseDate);
      const diffYears = today.getFullYear() - releaseDate.getFullYear();
      const diffMonths = today.getMonth() - releaseDate.getMonth() + diffYears * 12;
      const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
      movieDetails.age = `${diffYears} anos, ${Math.abs(diffMonths % 12)} meses, ${diffDays} dias`;
  
      const detailsTable = document.getElementById("movie-details-table").querySelector("tbody");
  
      detailsTable.innerHTML = `
        <tr><td>Título</td><td>${movieDetails.title}</td></tr>
        <tr><td>Nº Episódio</td><td>${movieDetails.episode_id}</td></tr>
        <tr><td>Sinopse</td><td>${movieDetails.opening_crawl.replace(/\n/g, "<br>")}</td></tr>
        <tr><td>Data de Lançamento</td><td>${new Date(movieDetails.release_date).toLocaleDateString("pt-BR")}</td></tr>
        <tr><td>Diretor</td><td>${movieDetails.director}</td></tr>
        <tr><td>Produtores</td><td>${movieDetails.producer}</td></tr>
        <tr><td>Personagens</td><td>${movieDetails.characters.map((name) => `<span class="character-tag">${name}</span>`).join(", ")}</td></tr>
        <tr><td>Idade do Filme</td><td>${movieDetails.age}</td></tr>
      `;
    } catch (error) {
      console.error("Erro ao carregar os detalhes do filme:", error);
      document.getElementById('movie-details-table').innerHTML = "<tr><td colspan='2'>Erro ao carregar os detalhes do filme.</td></tr>"; // Mensagem de erro no HTML
    }
  });