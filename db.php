<?php
$host = 'sql112.infinityfree.com'; 
$dbname = 'if0_39685764_if0_39685764_uploads_teste_pt1'; 
$username = 'if0_39685764';
$password = 'IXbhBlymJdOR2m'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
?>
