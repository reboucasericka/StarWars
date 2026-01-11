<?php
namespace services\libs;
class SWAPIClient {        
    private $baseUrl = 'https://swapi.dev/api/';
    public function fetchData($endpoint) {
        $url = $this->baseUrl . $endpoint;
        
        // Ignora verificação SSL em ambiente local (XAMPP/Windows)
        $context = stream_context_create([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ]
        ]);
        
        $response = file_get_contents($url, false, $context);
        if ($response === false) {
            throw new \Exception("Erro ao buscar dados da API.");
        }
        return json_decode($response, true);
    }
}
?>