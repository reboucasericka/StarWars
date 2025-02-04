<?php
header('Content-Type: application/json');
require_once 'database/connection.php';
$conn = Database::connect();


$endpoint = $_GET['endpoint'] ?? '';
$id = $_GET['id'] ?? '';

function logRequest($action) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO logs (action, date_time) VALUES (:action, NOW())");
    $stmt->execute(['action' => $action]);
}

if ($endpoint === 'filmes') {
    $url = 'https://swapi.dev/api/films/';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    logRequest('GET /filmes');

    $data = json_decode($response, true);
    usort($data['results'], function ($a, $b) {
        return strtotime($a['release_date']) - strtotime($b['release_date']);
    });

    echo json_encode($data['results']);
} elseif ($endpoint === 'filmes' && $id) {
    $url = 'https://swapi.dev/api/films/' . $id . '/';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    logRequest("GET /filmes/$id");

    $data = json_decode($response, true);
    $release_date = new DateTime($data['release_date']);
    $now = new DateTime();
    $interval = $release_date->diff($now);
    $data['age'] = [
        'years' => $interval->y,
        'months' => $interval->m,
        'days' => $interval->d,
    ];

    echo json_encode($data);
} else {
    echo json_encode(['error' => 'Invalid endpoint']);
}
?>
