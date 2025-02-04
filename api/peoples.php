<?php
header('Content-Type: application/json');
require_once __DIR__ . './logHelper.php'; // Para gravar logs

// Função para buscar dados da SWAPI
function fetchFromStarWarsAPI($endpoint)
{
    $url = "https://swapi.dev/api/$endpoint";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
    curl_close($ch);
    return [
        'response' => json_decode($response, true),
        'status' => $httpCode
    ];
}
$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod === 'GET') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $result = fetchFromStarWarsAPI("people/$id");

        if ($result['status'] === 200) {
            LogHelper::saveLog('GET', "people/$id", 'Sucesso', null);
            echo json_encode($result['response']);
        } else {
            LogHelper::saveLog('GET', "people/$id", 'Erro', $result['response']);
            http_response_code($result['status']);
            echo json_encode(['error' => 'Erro ao buscar personagem.']);
        }
    } else {
        $result = fetchFromStarWarsAPI('people');

        if ($result['status'] === 200) {
            LogHelper::saveLog('GET', 'people', 'Sucesso', null);
            echo json_encode($result['response']['results']);
        } else {
            LogHelper::saveLog('GET', 'people', 'Erro', $result['response']);
            http_response_code($result['status']);
            echo json_encode(['error' => 'Erro ao listar personagens.']);
        }
    }
} else {
    http_response_code(405);
    LogHelper::saveLog($requestMethod, 'people', 'Erro', 'Método não permitido');
    echo json_encode(['error' => 'Método não permitido.']);
}
?>