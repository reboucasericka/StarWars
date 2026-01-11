# ⭐ Star Wars Movie Catalog

Projeto web desenvolvido em **PHP 7.4**, **JavaScript**, **HTML** e **CSS**, que consome a API pública do Star Wars (**SWAPI**) através de uma **API local própria**, seguindo uma arquitetura **desacoplada entre frontend e backend**.

Este projeto foi desenvolvido em **contexto académico e prático**, com foco em **boas práticas**, **organização de código** e **comunicação via API**, **sem utilização de frameworks PHP**, conforme os requisitos do desafio.

---

## 🎯 Objetivo do Projeto

Criar uma aplicação web que:

- Exiba um **catálogo de filmes Star Wars**, ordenados por data de lançamento  
- Permita visualizar **detalhes completos de cada filme**  
- Utilize um **backend próprio em PHP** para consumir a API externa  
- Faça o **frontend consumir apenas a API local**  
- Calcule a **idade dos filmes no backend** (anos, meses e dias)  
- Estruture o projeto de forma **clara, organizada e escalável**

---

## 🛠️ Tecnologias Utilizadas

- **PHP 7.4** — Backend / API local  
- **JavaScript (Vanilla JS)** — Consumo da API e renderização dinâmica  
- **HTML5**  
- **CSS3**  
- **cURL** — Consumo da API externa  
- **SWAPI** — Star Wars API  

> ⚠️ Nenhum framework PHP foi utilizado, conforme os requisitos do desafio.

---

## 🏗️ Arquitetura do Projeto

```

Frontend (PHP + HTML)
↓
JavaScript (fetch)
↓
API Local (PHP)
↓
SWAPI (API Externa)

```

- O frontend **nunca consome a SWAPI diretamente**
- Toda a comunicação externa passa pela **API local**
- O backend retorna **JSON padronizado**
- O JavaScript é responsável apenas pela **renderização e interatividade**

---

## 📁 Estrutura de Pastas

```

starwars/
├── api/              # Endpoints da API local
├── css/              # Estilos
├── js/               # JavaScript
├── img/              # Imagens
├── services/libs/    # Cliente da SWAPI
├── index.php         # Página inicial
├── movie.php         # Catálogo de filmes
├── details.php       # Detalhes do filme
├── peoples.php       # Personagens
└── about.php         # Sobre o projeto

````

---

## 🔗 Endpoints da API Local

### 🎬 Filmes

- **GET `/api/films.php`**  
  Retorna todos os filmes ordenados por data de lançamento.

- **GET `/api/films.php?id={id}`**  
  Retorna os detalhes de um filme específico, incluindo:
  - Nome  
  - Episódio  
  - Sinopse  
  - Data de lançamento  
  - Diretor  
  - Produtores  
  - Personagens  
  - Idade do filme (anos, meses e dias)

### 👤 Personagens

- **GET `/api/peoples.php`**  
  Retorna a lista de personagens.

---

## ✨ Funcionalidades Implementadas

- Catálogo de filmes Star Wars  
- Página de detalhes dos filmes  
- Cálculo da idade dos filmes no backend  
- Consumo de API externa via API local  
- Renderização dinâmica com JavaScript  
- Layout personalizado  
- Organização clara de código  
- Tratamento de erros da API externa  

---

## ▶️ Como Executar o Projeto

1. Clone o repositório:
   ```bash
   git clone https://github.com/reboucasericka/StarWars.git
````

2. Coloque o projeto na pasta do servidor local
   *(ex: `htdocs` no XAMPP)*

3. Inicie o servidor Apache

4. Acesse no navegador:

   ```
   http://localhost/StarWars/
   ```

---

## 📌 Observações

* O projeto **não utiliza banco de dados**, pois todas as informações vêm da API externa
* O backend foi estruturado para funcionar mesmo se a API externa estiver temporariamente indisponível
* O foco do projeto é **arquitetura**, **organização** e **consumo de APIs**, não persistência de dados

---

## 👩‍💻 Autora

**Ericka Rebouças**
📍 Portugal
🔗 [LinkedIn]
https://www.linkedin.com/in/erickareboucas/

🔗 [GitHub]
https://github.com/reboucasericka

````

