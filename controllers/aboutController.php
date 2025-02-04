<?php
namespace controllers;

require_once '../SWAPIClient.php'; // Biblioteca para chamadas à API// Biblioteca para chamadas à API

use services\libs\SWAPIClient;
class aboutController {
    public function index() {
        $client = new SWAPIClient();
        $about = $client->fetchData('about/'); // Endpoint 
        require_once 'views/aboutView.php'; // Renderiza a view 
    }
}
?>
