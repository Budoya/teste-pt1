<?php
require 'db.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Upload</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h1 class="text-center mb-4">Upload de Mídias</h1>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show">
                Arquivo enviado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="upload-card shadow-sm mb-5">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Selecione um arquivo:</label>
                    <input type="file" class="form-control" name="mediaFile" accept="image/*,video/*" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição (opcional):</label>
                    <textarea class="form-control" name="description" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Enviar</button>
            </form>
        </div>

        <h2 class="h4 mb-3">Uploads Anteriores</h2>
        <div id="previousUploads" class="uploads-grid">
            <?php include 'load_uploads.php'; ?>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>