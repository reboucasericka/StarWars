<?php
namespace services\libs;
class SWAPIClient {        
    private $baseUrl = 'https://swapi.dev/api/';
    public function fetchData($endpoint) {
        $url = $this->baseUrl . $endpoint;
        $response = file_get_contents($url);
        if ($response === false) {
            throw new \Exception("Erro ao buscar dados da API.");
        }
        return json_decode($response, true);
    }
}
?>