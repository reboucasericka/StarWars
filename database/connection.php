<?php

class Database {
    private static $host = 'localhost';         // Endereço do servidor
    private static $db_name = 'starwars_db';    // Nome do banco de dados
    private static $username = 'root';          // Usuário do banco
    private static $password = '';              // Senha do banco
    private static $pdo = null;                 // Objeto PDO estático para singleton

    public static function connect() {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$db_name,
                    self::$username,
                    self::$password,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // Configura erro como exceção
                );
            } catch (PDOException $e) {
                die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
