<?php

function handleRoutes($request)
{
    $routes = [
        '/starwars/index.php' => 'index.html',
        '/starwars/index' => 'index.html',

        '/starwars/about' => 'about.html',
        '/starwars/movies' => 'movie.html',
        '/starwars/peoples' => ['controller' => 'PeoplesController', 'method' => 'index'],
    ];

    // Obtém apenas o caminho da URL
    $path = parse_url($request, PHP_URL_PATH);

    if (isset($routes[$path])) {
        $route = $routes[$path];

        if (is_array($route) && isset($route['controller']) && isset($route['method'])) {
            $controllerName = $route['controller'];
            $methodName = $route['method'];

            $controllerPath = 'controllers/' . $controllerName . '.php';

            if (file_exists($controllerPath)) {
                require_once $controllerPath;

                if (class_exists($controllerName)) {
                    $controller = new $controllerName();

                    if (method_exists($controller, $methodName)) {
                        $controller->$methodName();
                        return;
                    } else {
                        showErrorPage(500, "Erro: Método {$methodName} não encontrado no controlador {$controllerName}.");
                        return;
                    }
                } else {
                    showErrorPage(500, "Erro: Classe do controlador {$controllerName} não encontrada.");
                    return;
                }
            } else {
                showErrorPage(500, "Erro: Arquivo do controlador {$controllerName}.php não encontrado.");
                return;
            }
        } elseif (is_string($route) && file_exists($route)) {
            require_once $route; // Inclui o arquivo estático na raiz
            return;
        } else {
            showErrorPage(404, "Erro: Arquivo ou recurso não encontrado.");
            return;
        }
    }

    showErrorPage(404, "Erro: Página {$path} não encontrada.");
}

function showErrorPage($code, $message)
{
    http_response_code($code);
    if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
        // Mostrar mensagem de erro detalhada apenas em localhost (desenvolvimento)
        echo $message;
    } else {
        // Redirecionar para página de erro personalizada em produção
        header("Location: /starwars/404.php");
        exit;
    }
}
?>
