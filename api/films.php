<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Função para buscar dados da SWAPI
function fetchFromStarWarsAPI($endpoint)
{
    $url = "https://swapi.dev/api/$endpoint";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Ignora SSL em localhost
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Obter código HTTP de resposta
    curl_close($ch);

    return [
        'response' => json_decode($response, true),
        'status' => $httpCode
    ];
}

// Função para calcular a idade de um filme
function calculateMovieAge($releaseDate)
{
    $releaseDate = new DateTime($releaseDate);
    $currentDate = new DateTime();
    $interval = $releaseDate->diff($currentDate);

    return [
        'years' => $interval->y,
        'months' => $interval->m,
        'days' => $interval->d,
    ];
}

// Receber a requisição
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'GET') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        // Detalhes de um filme específico
        $result = fetchFromStarWarsAPI("films/$id");

        if ($result['status'] === 200) {
            $data = $result['response'];
            if (isset($data['release_date'])) {
                $data['age'] = calculateMovieAge($data['release_date']);
            }
            echo json_encode($data); // Retorna os detalhes do filme
        } else {
            http_response_code($result['status']);
            echo json_encode(['error' => 'Erro ao buscar filme.']);
        }
    } else {
        // Listar todos os filmes
        $result = fetchFromStarWarsAPI('films');

        if ($result['status'] === 200 && isset($result['response']['results'])) {
            $data = $result['response']['results'];
            echo json_encode($data); // Retorna a lista de filmes
        } else {
            http_response_code($result['status']);
            echo json_encode(['error' => 'Não foi possível obter a lista de filmes.']);
        }
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido.']);
}
?>