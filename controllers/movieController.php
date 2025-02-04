<?php
require_once __DIR__ . '/../api/logHelper.php';
require_once 'config/database.php';
require_once 'models/movieModels.php';
require_once 'views/movieView.php';
require_once 'services/libs/SWAPIClient.php';

use views\MovieView; // Importa corretamente a classe MovieView


class MovieController
{
    public function getMovies() { 
        try {
            $url = "https://swapi.dev/api/films/"; // URL da API de filmes do Star Wars
            $response = file_get_contents($url); // Obtém os dados da API
            $data = json_decode($response, true); // Decodifica o JSON para array associativo

            if (isset($data['results'])) {
                return $data['results']; // Retorna apenas a lista de filmes
            } else {
                LogHelper::error("Erro: Nenhuma lista de filmes encontrada na API.");
                return [];
            }
        } catch (Exception $e) {
            LogHelper::error("Erro ao buscar filmes da API: " . $e->getMessage());
            return [];
        }
    }

    public function index() { // Método para renderizar a lista de filmes
        $movies = $this->getMovies(); // Busca os filmes da API
        $movieView = new MovieView(); // Instancia a view
        $movieView->renderMoviesList($movies); // Renderiza a lista
    }

    public function showMovieDetails($id) { // Método para exibir detalhes de um filme
        try {
            $movies = $this->getMovies(); // Obtém todos os filmes
            $movie = null;

            // Busca o filme pelo ID
            foreach ($movies as $m) {
                if ($m['episode_id'] == $id) {
                    $movie = $m;
                    break;
                }
            }

            if (!$movie) {
                LogHelper::error("Erro: Filme com ID $id não encontrado.");
                return [];
            }

            // Carrega detalhes dos personagens
            $characters = [];
            foreach ($movie['characters'] as $charUrl) {
                $charData = file_get_contents($charUrl);
                $characters[] = json_decode($charData, true);
            }

            $movieView = new MovieView();
            $movieView->renderMovieDetails($movie, $characters); // Exibe os detalhes do filme e personagens

        } catch (Exception $e) {
            LogHelper::error("Erro ao buscar detalhes do filme: " . $e->getMessage());
            return [];
        }
    }
}
?>
