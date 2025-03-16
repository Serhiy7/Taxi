<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Подключаем Composer

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../'); // Загружаем .env
$dotenv->load();

// Подключение к БД
try {
    $pdo = new PDO(
        "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4",
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>
