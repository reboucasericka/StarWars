// scripts/catalog.js
document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.getElementById('movies-table').querySelector('tbody');

    // Fetch e renderização dos filmes
    fetch('http://localhost/starwars/api/films.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro na API: Status ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            tableBody.innerHTML = ''; 
            data.forEach(movie => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${movie.title}</td>
                    <td>${new Date(movie.release_date).toLocaleDateString()}</td>
                    <td><a href="details.php?id=${movie.episode_id}" class="details-link">[Ver Detalhes]</a></td>`;
                tableBody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Erro ao carregar filmes:', error);
        });

    // Lógica para "Carregar Mais Filmes" (se necessário)
    const loadMoviesButton = document.querySelector(".load-movies");
    if (loadMoviesButton) {
        loadMoviesButton.addEventListener("click", function () {
            alert("Funcionalidade 'Carregar Mais Filmes' ainda não implementada.");
        });
    }
});
