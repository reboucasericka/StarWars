<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

require_once __DIR__ . '../logHelper.php'; // Para gravar logs

// Função para buscar dados da SWAPI
function fetchFromStarWarsAPI($endpoint)
{
    $url = "https://swapi.dev/api/$endpoint";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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
            LogHelper::saveLog('GET', "films/$id", 'Sucesso', null); // Log no banco
            echo json_encode($data); // Retorna os detalhes do filme
        } else {
            LogHelper::saveLog('GET', "films/$id", 'Erro', json_encode($result['response'])); // Log de erro
            http_response_code($result['status']);
            echo json_encode(['error' => 'Erro ao buscar filme.']);
        }
    } else {
        // Listar todos os filmes
        $result = fetchFromStarWarsAPI('films');

        if ($result['status'] === 200 && isset($result['response']['results'])) {
            $data = $result['response']['results'];
            LogHelper::saveLog('GET', 'films', 'Sucesso', null); // Log no banco
            echo json_encode($data); // Retorna a lista de filmes
        } else {
            LogHelper::saveLog('GET', 'films', 'Erro', json_encode($result['response'])); // Log de erro
            http_response_code($result['status']);
            echo json_encode(['error' => 'Não foi possível obter a lista de filmes.']);
        }
    }
} else {
    http_response_code(405);
    LogHelper::saveLog($requestMethod, 'films', 'Erro', 'Método não permitido'); // Log de erro
    echo json_encode(['error' => 'Método não permitido.']);
}
?>