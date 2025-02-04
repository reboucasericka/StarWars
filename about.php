
 <?php

// Importa o controlador e view correspondente
require_once 'controllers/aboutController.php';
require_once 'views/aboutView.php'; // Envia as informações obtidas para a view


// Importa o cliente da API Star Wars
require_once 'services/libs/SWAPIClient.php'; 
// Usa o cliente para buscar dados da API
use Services\Libs\SWAPIClient;
$client = new SWAPIClient();
// Busca informações da API Star Wars (como lista de filmes)
$films = $client->fetchData('films');


?> 

