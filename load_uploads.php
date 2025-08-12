<?php
require 'db.php';

header('Content-Type: text/html; charset=utf-8');

try {
    $stmt = $pdo->query("SELECT * FROM uploads ORDER BY created_at DESC");
    $uploads = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($uploads)) {
        echo '<div class="alert alert-info">Nenhum upload encontrado.</div>';
        exit;
    }

    foreach ($uploads as $upload) {
        $filePath = $upload['file_path'];
        $fileExists = file_exists($filePath);
        
        if (!$fileExists) {
            // Remove do banco se o arquivo não existe
            $pdo->prepare("DELETE FROM uploads WHERE id = ?")->execute([$upload['id']]);
            continue;
        }

        $isVideo = preg_match('/\.(mp4|webm|ogg|mov|avi)$/i', $upload['file_name']);
        ?>
        <div class="upload-item card mb-3">
            <?php if ($isVideo): ?>
                <video controls class="card-img-top">
                    <source src="<?= htmlspecialchars($filePath) ?>" type="video/<?= pathinfo($filePath, PATHINFO_EXTENSION) ?>">
                </video>
            <?php else: ?>
                <img src="<?= htmlspecialchars($filePath) ?>" 
                     class="card-img-top" 
                     onerror="this.closest('.upload-item').remove()">
            <?php endif; ?>
            
            <div class="card-body">
                <?php if (!empty($upload['description'])): ?>
                    <p class="card-text"><?= nl2br(htmlspecialchars($upload['description'])) ?></p>
                <?php endif; ?>
                <small class="text-muted">
                    Enviado em: <?= date('d/m/Y H:i', strtotime($upload['created_at'])) ?>
                </small>
            </div>
        </div>
        <?php
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao carregar uploads: ' . htmlspecialchars($e->getMessage()) . '</div>';
}
?>