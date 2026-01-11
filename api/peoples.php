<?php
header('Content-Type: application/json');

// Mapeamento de imagens e links para personagens
function getCharacterMapping() {
    return [
        'links' => [
            'Luke Skywalker' => 'https://en.wikipedia.org/wiki/Luke_Skywalker',
            'Darth Vader' => 'https://pt.wikipedia.org/wiki/Darth_Vader',
            'Leia Organa' => 'https://pt.wikipedia.org/wiki/Leia_Organa',
            'Obi-Wan Kenobi' => 'https://pt.wikipedia.org/wiki/Obi-Wan_Kenobi',
            'Han Solo' => 'https://pt.wikipedia.org/wiki/Han_Solo',
            'Chewbacca' => 'https://pt.wikipedia.org/wiki/Chewbacca',
            'C-3PO' => 'https://pt.wikipedia.org/wiki/C-3PO',
            'R2-D2' => 'https://pt.wikipedia.org/wiki/R2-D2',
            'Yoda' => 'https://pt.wikipedia.org/wiki/Yoda',
            'Palpatine' => 'https://pt.wikipedia.org/wiki/Palpatine',
            'Imperador Palpatine' => 'https://pt.wikipedia.org/wiki/Palpatine'
        ],
        'images' => [
            'Luke Skywalker' => 'img/lukeskywalker.jpg',
            'Darth Vader' => 'img/darth-vader.jpg',
            'Leia Organa' => 'img/leia_organa.webp',
            'Obi-Wan Kenobi' => 'img/obi_wan.jpg',
            'Han Solo' => 'img/hansolo.webp',
            'Chewbacca' => 'img/chewbacca.jpg',
            'C-3PO' => 'img/c3po.jpeg',
            'R2-D2' => 'img/r2d2.jpg',
            'Yoda' => 'img/yoda.jpeg',
            'Palpatine' => 'img/emperor_palpatine.webp',
            'Imperador Palpatine' => 'img/emperor_palpatine.webp'
        ]
    ];
}

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
            echo json_encode($result['response']);
        } else {
            http_response_code($result['status']);
            echo json_encode(['error' => 'Erro ao buscar personagem.']);
        }
    } else {
        $result = fetchFromStarWarsAPI('people');

        if ($result['status'] === 200 && isset($result['response']['results'])) {
            $mapping = getCharacterMapping();
            $characters = [];
            
            foreach ($result['response']['results'] as $character) {
                $name = $character['name'];
                $characters[] = [
                    'name' => $name,
                    'image' => $mapping['images'][$name] ?? 'img/default-character.jpeg',
                    'wiki' => $mapping['links'][$name] ?? '#'
                ];
            }
            
            echo json_encode($characters);
        } else {
            http_response_code($result['status'] ?? 500);
            echo json_encode(['error' => 'Erro ao listar personagens.']);
        }
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido.']);
}
?>