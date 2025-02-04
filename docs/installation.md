## Instruções de instalação

### 1. Pré-requisitos

## Pré-requisitos
- XAMPP ou WAMP instalado no computador.
- PHP versão 7.4 ou superior.
- Banco de Dados MySQL configurado.

## Passo a Passo

### 1. Configuração do Ambiente
1. Clone ou copie este projeto para o diretório `htdocs` do XAMPP.
2. Inicie o Apache e o MySQL pelo painel do XAMPP.

### 2. Configuração do Banco de Dados
1. Acesse `http://localhost/phpmyadmin`.
2. Crie um banco de dados chamado `starwars_db`.
3. Importe o arquivo `database/dump.sql`:
   - Navegue até a aba "Importar" no phpMyAdmin.
   - Selecione o arquivo `dump.sql` localizado na pasta `database/` do projeto.
   - Clique em "Executar".

### 3. Configuração do Projeto
1. Edite o arquivo `config/config.php` e insira as credenciais do banco de dados:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'starwars_db');
   
### 4. Acessando o Projeto
Abra o navegador e vá para: http://localhost/starwars