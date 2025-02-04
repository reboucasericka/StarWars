# Star Wars API Project

Bem-vindo ao projeto **Star Wars API**! Este projeto consome dados da API oficial [SWAPI](https://swapi.dev/) e exibe informações sobre o universo Star Wars, incluindo filmes, personagens, e muito mais.

---

## 📌 Objetivo
- Criar uma aplicação modular utilizando a arquitetura MVC.
- Prover uma interface amigável para explorar dados da API SWAPI.
- Armazenar e registrar logs de requisições em um banco de dados.

---

## 🚀 Tecnologias Utilizadas
- **PHP**: Para o desenvolvimento do back-end.
- **JavaScript**: Para funcionalidades dinâmicas no front-end.
- **MySQL**: Banco de dados para armazenar logs.
- **CSS**: Para estilização do projeto.
- **XAMPP**: Ambiente local para desenvolvimento.

---

## 📂 Estrutura do Projeto
- **`api/`**: Endpoints da API.
- **`config/`**: Configurações principais.
- **`controllers/`**: Gerencia a lógica de cada rota.
- **`models/`**: Representa a manipulação dos dados.
- **`views/`**: Renderiza as páginas HTML.
- **`css/`**: Arquivos de estilo.
- **`js/`**: Scripts JavaScript.
- **`database/`**: Arquivos relacionados ao banco de dados.
- **`docs/`**: Documentação detalhada do projeto.

---

## 🛠️ Configuração Rápida

### 1. Requisitos
- PHP 7.4+.
- MySQL.
- Ambiente local como XAMPP.

### 2. Configuração do Projeto
1. Clone o repositório no diretório `htdocs` do XAMPP.
2. Importe o arquivo `dump.sql` em um banco de dados chamado `starwars` no phpMyAdmin.
3. Atualize as credenciais no arquivo `config/config.php`.

### 3. Executando o Projeto
- Acesse no navegador: `http://localhost/starwars`.

---

## 📄 Documentação
Para detalhes sobre a instalação, uso da API e melhorias aplicadas, consulte a pasta [docs/](./docs/).

- **[Instruções de Instalação](./docs/installation.md)**.
- **[Documentação da API](./docs/api-documentation.md)**.
- **[Lista de Melhorias](./docs/improvements.md)**.

---

## 💡 Funcionalidades Principais
1. Consumo da API SWAPI para obter dados de filmes e personagens.
2. Barra de pesquisa dinâmica.
3. Registro de logs de requisições no banco de dados.
4. Sistema de login e registro de usuários (design implementado, mas lógica pendente).
5. Estrutura modular com padrão MVC.

---

## 📋 Possíveis Melhorias Futuras
- Integração completa das categorias faltantes da SWAPI, como Planets, Species, Starships, etc.
- Sistema completo de autenticação e autorização.
- Testes automatizados e validação do projeto.

---

## 📬 Contato
Caso tenha dúvidas ou sugestões, entre em contato!
