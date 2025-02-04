<?php
require_once 'controllers/peoplesController.php';
require_once 'views/peoplesView.php';

// Instancia o controlador de personagens
$controller = new PeoplesController();

try {
    // Obtém os dados dos personagens do controlador
    $peoplesData = $controller->index();

    // Verifica se os dados foram carregados
    if (!empty($peoplesData)) {
        // Instancia a view para renderizar os dados
        $view = new PeoplesView();
        $view->renderPeoplesList($peoplesData);
    } else {
        echo 'Nenhum personagem foi encontrado.';
    }
} catch (Exception $e) {
    echo 'Erro ao obter personagens: ' . $e->getMessage();
    exit;
}
?>
