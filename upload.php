<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $_POST['description'] ?? '';
    $uploadDir = 'uploads/';

    // Verifica se o arquivo foi enviado
    if (isset($_FILES['mediaFile'])) {  // Corrigido: adicionado o parêntese faltante
        $file = $_FILES['mediaFile'];
        $fileName = uniqid() . '_' . basename($file['name']);
        $targetPath = $uploadDir . $fileName;
    

        // Move o arquivo para a pasta 'uploads'
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // Insere no banco de dados
            $stmt = $pdo->prepare("
                INSERT INTO uploads (file_name, file_path, description)
                VALUES (?, ?, ?)
            ");
            $stmt->execute([$fileName, $targetPath, $description]);}

            header('Location: index.php?success=1'); // Redireciona após sucesso
            exit;
        }
    
    }

header('Location: index.php?error=1'); // Se falhar
?>