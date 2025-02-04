<!--Este arquivo é responsável por buscar os dados da API de filmes: -->
<?php

echo "Arquivo carregado";
require_once 'services/libs/SWAPIClient.php'; // Inclui o cliente da API


use services\libs\SWAPIClient;

class movieModels 
{
    public function getAllMovies()
    {
         // URL da API
         $url = 'https://swapi.dev/api/films/';
         $response = @file_get_contents($url);
 
         // Decodificar os dados JSON
         $movies = json_decode($response, true);
 
         // Retornar apenas os resultados dos filmes
         return $movies['results'];
    }

    public function getMovieDetails($id)
    {
        $url = "https://swapi.dev/api/films/{$id}/";

        $response = @file_get_contents($url); // Usa "@" para evitar warnings em caso de falha

        if ($response === false) {
            return null; // Retorna null se não encontrar o filme
        }

        return json_decode($response, true);
    }

    public function getCharacters($urls)
    {
        $characters = [];
        foreach ($urls as $url) {
            $response = @file_get_contents($url);
            if ($response !== false) {
                $characters[] = json_decode($response, true);
            }
        }
        return $characters;
    }
}
?>