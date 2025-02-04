<?php

require_once '../database/connection.php';
$conn = Database::connect();



class LogHelper {
    public static function saveLog($requestType, $requestDetails, $responseStatus, $responseError = null) {
        try {
            $database = new Database();
            $pdo = $database->connect();
            if (!$pdo) {
                throw new Exception("Erro ao conectar ao banco de dados.");
            }

            $sql = "INSERT INTO logs (date_time, request_type, request_details, response_status, response_error)
                    VALUES (NOW(), :request_type, :request_details, :response_status, :response_error)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':request_type' => $requestType,
                ':request_details' => $requestDetails,
                ':response_status' => $responseStatus,
                ':response_error' => $responseError
            ]);
        } catch (PDOException $e) {
            // Registra o erro em um log do PHP
            error_log('Erro ao salvar log: ' . $e->getMessage());
        } catch (Exception $e) {
            // Lida com outros erros que não sejam do PDO
            error_log('Erro inesperado: ' . $e->getMessage());
        }
    }
    // Método adicional para registrar erros de forma simplificada
    public static function error($message) {
        self::saveLog(
            'ERROR',             // Tipo de requisição
            $message,            // Detalhes do erro
            'FAILED',            // Status da resposta
            $message             // Detalhes do erro também como responseError
        );
    }
}
?>
