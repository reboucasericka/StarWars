 Star Wars Movie Catalog
Projeto web desenvolvido em PHP 7.4, JavaScript, HTML e CSS, que consome a API pública do Star Wars (SWAPI) através de uma API local própria, seguindo uma arquitetura desacoplada entre frontend e backend.
Este projeto foi desenvolvido em contexto académico e prático, com foco em boas práticas, organização de código e comunicação via API, sem utilização de frameworks PHP.
________________________________________
🎯 Objetivo do Projeto
Criar uma aplicação web que:
•	Exiba um catálogo de filmes Star Wars, ordenados por data de lançamento;
•	Permita visualizar detalhes completos de cada filme;
•	Utilize um backend próprio em PHP para consumir a API externa;
•	Faça o frontend consumir apenas a API local;
•	Calcule a idade dos filmes no backend;
•	Estruture o projeto de forma clara e organizada.
________________________________________
🛠️ Tecnologias Utilizadas
•	PHP 7.4 (backend / API local)
•	JavaScript (Vanilla JS) (consumo da API e renderização dinâmica)
•	HTML5
•	CSS3
•	cURL (consumo da API externa)
•	SWAPI – Star Wars API
Nenhum framework PHP foi utilizado, conforme os requisitos do desafio.
________________________________________
🏗️ Arquitetura do Projeto
Frontend (PHP + HTML)
        ↓
JavaScript (fetch)
        ↓
API Local (PHP)
        ↓
SWAPI (API Externa)
•	O frontend nunca consome a SWAPI diretamente
•	Toda a comunicação externa passa pela API local
•	O backend retorna JSON padronizado
•	O JavaScript é responsável apenas pela renderização e interatividade
________________________________________
📁 Estrutura de Pastas
starwars/
├── api/               # Endpoints da API local
├── css/               # Estilos
├── js/                # JavaScript
├── img/               # Imagens
├── services/libs/     # Cliente da SWAPI
├── index.php          # Página inicial
├── movie.php          # Catálogo de filmes
├── details.php        # Detalhes do filme
├── peoples.php        # Personagens
└── about.php          # Sobre o projeto
________________________________________
🔗 Endpoints da API Local
🎬 Filmes
•	GET /api/films.php
Retorna todos os filmes ordenados por data de lançamento.
•	GET /api/films.php?id={id}
Retorna os detalhes de um filme específico, incluindo:
o	Nome
o	Episódio
o	Sinopse
o	Data de lançamento
o	Diretor
o	Produtores
o	Personagens
o	Idade do filme (anos, meses e dias)
👤 Personagens
•	GET /api/peoples.php
Retorna a lista de personagens.
________________________________________
✨ Funcionalidades Implementadas
•	Catálogo de filmes Star Wars
•	Página de detalhes dos filmes
•	Cálculo da idade dos filmes no backend
•	Consumo de API externa via API local
•	Renderização dinâmica com JavaScript
•	Layout personalizado
•	Organização clara de código
•	Tratamento de erros da API externa
________________________________________
▶️ Como Executar o Projeto
1.	Clone o repositório:
2.	git clone https://github.com/seu-usuario/StarWars.git
3.	Coloque o projeto na pasta do servidor local (ex: htdocs no XAMPP)
4.	Inicie o servidor Apache
5.	Acesse no navegador:
6.	http://localhost/StarWars/
________________________________________
📌 Observações
•	O projeto não utiliza banco de dados, pois todas as informações vêm da API externa.
•	O backend foi estruturado para funcionar mesmo se a API externa estiver temporariamente indisponível.
•	O foco do projeto é arquitetura, organização e consumo de APIs, não persistência de dados.
________________________________________
👩‍💻 Autora
Projeto desenvolvido por Ericka Rebouças
📍 Portugal
🔗 LinkedIn
🔗 GitHub
