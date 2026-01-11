// scripts/catalog.js
document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.getElementById('movies-table').querySelector('tbody');

    // Fetch e renderização dos filmes
    fetch('api/films.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro na API: Status ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data)) {
                throw new Error('Formato de dados inválido');
            }

            tableBody.innerHTML = ''; 
            
            if (data.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="3">Nenhum filme encontrado.</td></tr>';
                return;
            }

            data.forEach(movie => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${movie.title || 'Título não disponível'}</td>
                    <td>${movie.release_date ? new Date(movie.release_date).toLocaleDateString('pt-BR') : 'Data não disponível'}</td>
                    <td><a href="details.php?id=${movie.episode_id}" class="details-link">[Ver Detalhes]</a></td>`;
                tableBody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Erro ao carregar filmes:', error);
            tableBody.innerHTML = '<tr><td colspan="3">Erro ao carregar os filmes. Tente novamente mais tarde.</td></tr>';
        });

    // Lógica para "Carregar Mais Filmes" (se necessário)
    const loadMoviesButton = document.querySelector(".load-movies");
    if (loadMoviesButton) {
        loadMoviesButton.addEventListener("click", function () {
            alert("Funcionalidade 'Carregar Mais Filmes' ainda não implementada.");
        });
    }
});
