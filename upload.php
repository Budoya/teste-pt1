<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $_POST['description'] ?? '';
    $uploadDir = 'uploads/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (isset($_FILES['mediaFile'])) {
        $file = $_FILES['mediaFile'];
        $fileName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\.\-_]/', '', $file['name']);
        $targetPath = $uploadDir . $fileName;

        $allowedTypes = [
            'image/jpeg', 'image/png', 'image/gif', 
            'video/mp4', 'video/webm', 'video/ogg'
        ];

        $fileType = mime_content_type($file['tmp_name']);

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                $stmt = $pdo->prepare("
                    INSERT INTO uploads (file_name, file_path, description)
                    VALUES (?, ?, ?)
                ");
                $stmt->execute([$fileName, $targetPath, $description]);
                header('Location: index.php?success=1');
                exit;
            }
        }
    }
}

header('Location: index.php?error=1');
?>