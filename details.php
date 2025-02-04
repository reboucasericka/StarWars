<?php
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID do filme não especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título da Página -->
    <title>Detalhes dos Filmes</title>
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
    <!-- Seção de Detalhes do Filme -->
    <section id="items-movies" class="movies">
        <div class="items-heading">
            <h1>Detalhes do Filme</h1>
        </div>

        <!-- Tabela com detalhes do filme -->
        <div class="post-container">
            <table class="company-stats" id="movie-details-table">
                <thead>
                    <tr>
                        <th>Propriedade</th>
                        <th>Detalhe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($movieDetails)) : ?>
                        <tr>
                            <td>Título</td>
                            <td><?= htmlspecialchars($movieDetails['title']) ?></td>
                        </tr>
                        <tr>
                            <td>Nº Episódio</td>
                            <td><?= htmlspecialchars($movieDetails['episode_id']) ?></td>
                        </tr>
                        <tr>
                            <td>Sinopse</td>
                            <td><?= nl2br(htmlspecialchars($movieDetails['opening_crawl'])) ?></td>
                        </tr>
                        <tr>
                            <td>Data de Lançamento</td>
                            <td><?= htmlspecialchars(date('d/m/Y', strtotime($movieDetails['release_date']))) ?></td>
                        </tr>
                        <tr>
                            <td>Diretor</td>
                            <td><?= htmlspecialchars($movieDetails['director']) ?></td>
                        </tr>
                        <tr>
                            <td>Produtores</td>
                            <td><?= htmlspecialchars($movieDetails['producer']) ?></td>
                        </tr>
                        <tr>
                            <td>Personagens</td>
                            <td>
                                <?php if (!empty($movieDetails['characters'])) : ?>
                                    <?php foreach ($movieDetails['characters'] as $character) : ?>
                                        <span class="character-tag">
                                            <?= htmlspecialchars($character) ?>
                                        </span>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    Nenhum personagem disponível.
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Idade do Filme</td>
                            <td>
                                <?php
                                $releaseDate = new DateTime($movieDetails['release_date']);
                                $today = new DateTime();
                                $interval = $releaseDate->diff($today);

                                echo "{$interval->y} anos, {$interval->m} meses, {$interval->d} dias";
                                ?>
                            </td>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <td colspan="2">Detalhes do filme não encontrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="movie.html" class="btn-voltar">Voltar</a>
        </div>
    </section>
    <script src="js/details.js"></script>
</body>

</html>