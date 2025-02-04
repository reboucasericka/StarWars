<?php

namespace views;


class MovieView
{
    public function renderMoviesList($movies, $films = []) { // Método para exibir a lista de filmes
        echo "<section id='items.movies' class='movies'>";
        echo "    <div class='items-heading'>";
        echo "        <h1>Filmes</h1>";
        echo "    </div>";
        echo "    <div class='post-container'>";

        if (empty($movies)) {
            echo "<p>Nenhum filme encontrado.</p>";
        } else {
            echo "<table>";
            echo "<thead><tr><th>Título</th><th>Data de Lançamento</th></tr></thead>";
            echo "<tbody>";
            foreach ($movies as $movie) {
                echo "<tr>";
                echo "<td><a href='?id=" . (isset($movie['episode_id']) ? $movie['episode_id'] : '#') . "'>" . (isset($movie['title']) ? htmlspecialchars($movie['title'], ENT_QUOTES) : 'Título Desconhecido') . "</a></td>";
                echo "<td>" . (isset($movie['release_date']) ? $movie['release_date'] : 'Data não disponível') . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }

        echo "<section id='f-details'>";
        echo "    <p><b>Filmes da franquia</b><br><br>";
        echo "    <ul class='film-list'>";
        if (isset($films['results']) && is_array($films['results'])):
            foreach ($films['results'] as $film):
                echo "<li><strong>" . htmlspecialchars($film['title'], ENT_QUOTES) . "</strong> - Lançado em " . htmlspecialchars($film['release_date'], ENT_QUOTES) . "</li>";
            endforeach;
        else:
            echo "<li>Não foi possível carregar os filmes.</li>";
        endif;
        echo "    </ul>";
        echo "</section>";
        echo "  </div>";
        echo "</section>";
    }       

    public function renderMovieDetails($movie, $characters) { // Método para exibir detalhes de um filme e seus personagens
        if (empty($movie)) {
            echo "<p>Detalhes do filme não encontrados.</p>";
            return;
        }

        $title = isset($movie['title']) ? htmlspecialchars($movie['title'], ENT_QUOTES) : "Título Desconhecido";
        $episodeId = isset($movie['episode_id']) ? $movie['episode_id'] : "Não informado";
        $openingCrawl = isset($movie['opening_crawl']) ? nl2br(htmlspecialchars($movie['opening_crawl'], ENT_QUOTES)) : "Sinopse não disponível";
        $releaseDate = isset($movie['release_date']) ? $movie['release_date'] : "Data não disponível";
        $director = isset($movie['director']) ? htmlspecialchars($movie['director'], ENT_QUOTES) : "Não informado";
        $producer = isset($movie['producer']) ? htmlspecialchars($movie['producer'], ENT_QUOTES) : "Não informado";

        echo "<h1>{$title}</h1>";
        echo "<p><strong>Nº Episódio:</strong> {$episodeId}</p>";
        echo "<p><strong>Sinopse:</strong> {$openingCrawl}</p>";
        echo "<p><strong>Data de Lançamento:</strong> {$releaseDate}</p>";
        echo "<p><strong>Diretor(a):</strong> {$director}</p>";
        echo "<p><strong>Produtor(es):</strong> {$producer}</p>";
        echo "<h3>Personagens:</h3>";
        echo "<ul>";

        // Melhoria 1: Buscar os detalhes dos personagens
        foreach ($characters as $character) {
            // Exibe o nome do personagem ao invés da URL
            echo "<li>" . htmlspecialchars($character['name'], ENT_QUOTES) . "</li>";
        }

        echo "</ul>";
    }
}
?>
