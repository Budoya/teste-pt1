<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM uploads ORDER BY created_at DESC");
$uploads = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($uploads)) {
    echo '<p class="text-center">Nenhum upload encontrado.</p>';
} else {
    foreach ($uploads as $upload) {
        $media = strpos($upload['file_name'], '.mp4') !== false
            ? '<video controls src="' . $upload['file_path'] . '"></video>'
            : '<img src="' . $upload['file_path'] . '">';
        
        echo '<div class="upload-item">'
            . $media
            . '<p>' . htmlspecialchars($upload['description']) . '</p>'
            . '</div>';
    }
}
?>