<?php
$host = 'localhost';
$dbname = 'meu_banco_uploads';
$username = 'root';  // Padrão do XAMPP
$password = '';      // Padrão do XAMPP (vazio)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
?>