<?php
// Configuração do autoload para carregar automaticamente as classes (apenas para services/libs)
spl_autoload_register(function ($class) {
    $class = ltrim($class, '\\');
    $file = '';
    $namespace = '';

    if ($lastNsPos = strrpos($class, '\\')) {
        $namespace = substr($class, 0, $lastNsPos);
        $class = substr($class, $lastNsPos + 1);
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $file .= str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';

    // Lista de diretórios relevantes para carregar as classes
    $directories = [
        'services/libs/',
    ];

    foreach ($directories as $dir) {
        $fullPath = $dir . $file;
        if (file_exists($fullPath)) {
            require_once $fullPath;
            return;
        }
    }
});
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título da Página -->
    <title> Star Wars Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" />
    <!--import font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
    <!--main-->
    <section id="main">
        <!--header-->
        <header>
            <nav class="navigation">
                <!-- Ícone de menu para dispositivos móveis -->
                <input type="checkbox" id="menu-btn" class="menu-btn" />
                <label for="menu-btn" class="menu-icon">
                    <span class="nav-icon"></span>
                </label>
                <!-- Logotipo -->
                <a href="index.php" class="logo"><img src="img/logo.webp" alt="Logo" /></a>
                <!-- Menu de navegação -->
                <ul class="menu">
                    <li><a href="index.php">Início</a></li>
                    <li><a href="about.php">Sobre</a></li>
                    <li><a href="peoples.php">Personagens</a></li>
                    <li><a href="movie.php">Filmes</a></li>                   
                </ul>
            </nav>
        </header>
        <!-- Imagem Principal (Destaque) floating img-->
        <div class="main-img"><img src="img/123.jpg" alt="StarWars Main Image" />
        </div>
        <!-- Texto Principal -->
        <div class="main-text">
            <img src="img/icon.png" alt="StarWars Icon" />
            <!-- Botões de Ação -->
            <a href="about.php">Saiba mais</a>
            <a href="https://www.youtube.com/watch?v=WbwuzMIwItE" target="_blank"> Assistir ao trailer</a>
        </div>
    </section>
    <!-- Rodapé--footer-->
    <footer class="footer">
        <span> © StarWars</span>
        <span> Copyright 2025 - Ericka Rebouças </span>
        <!-- Links de Mídias Sociais -->
        <div class="mídia-social">
            <a href="https://www.linkedin.com/in/erickareboucas/" target="_blank">
                <i class="fa-brands fa-linkedin"></i>
            </a>
            <a href="https://www.instagram.com/oficialerickareboucas/" target="_blank">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://github.com/reboucasericka" target="_blank">
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
    </footer>


    <script src="js/script.js"></script>
</body>

</html>