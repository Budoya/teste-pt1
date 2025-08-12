<?php
require 'db.php';

header('Content-Type: text/plain');
echo "Iniciando limpeza...\n\n";

$stmt = $pdo->query("SELECT id, file_path FROM uploads");
$deletedCount = 0;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (!file_exists($row['file_path'])) {
        $pdo->prepare("DELETE FROM uploads WHERE id = ?")->execute([$row['id']]);
        echo "Removido ID {$row['id']}: {$row['file_path']}\n";
        $deletedCount++;
    }
}

echo "\nLimpeza concluída! Registros removidos: $deletedCount\n";
?>