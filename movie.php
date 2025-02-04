<?php

require_once 'controllers/movieController.php';
require_once 'models/movieModels.php';
require_once 'views/movieView.php';

use controllers\MovieController;

$controller = new MovieController();

if (isset($_GET['id'])) {
    $controller->showMovieDetails($_GET['id']); // Mostra detalhes de um filme
} else {
    $controller->index(); // Mostra a lista de filmes
}
?>
