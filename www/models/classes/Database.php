<?php
class Database {
    private PDO $pdo;  // Храним подключение в свойстве (в свойстве $pdo может лежать только объект PDO)

    public function __construct() { //нужен, чтобы PDO создавался автоматически при создании объекта Database
        try {
            //Создаёт PDO объект с настройками и после сохраняет в приватном свойстве
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            error_log($e->getMessage());
            die('Ошибка подключения к базе данных. Пожалуйста, попробуйте позже.');
        }
    }

    public function getConnection(): PDO {
        return $this->pdo;
    }
}
