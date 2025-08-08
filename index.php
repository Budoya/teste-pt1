<!-- Adicione no <head> -->
<link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;500;600&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Seu CSS -->
<link href="./assets/css/style.css" rel="stylesheet">
<!-- Substitua o container principal por: -->
<div class="container">
    <h1>Envie Suas Mídias</h1>
    <p class="text-center text-muted mb-4">Faça upload de imagens ou vídeos e adicione uma descrição.</p>

    <!-- Card de Upload -->
    <div class="upload-card">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="mediaFile" class="form-label">Selecione um arquivo:</label>
                <input class="form-control" type="file" id="mediaFile" name="mediaFile" accept="image/*, video/*" required>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Descrição (opcional):</label>
                <textarea class="form-control" id="description" name="description" rows="2" placeholder="Ex: Foto da praia em 2023..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Enviar Mídia</button>
        </form>

        <!-- Pré-visualização (será mostrada via JS) -->
        <div class="media-preview-container" id="previewContainer" style="display: none;">
            <h5 class="mb-3">Pré-visualização</h5>
            <div id="mediaPreview"></div>
        </div>
    </div>

    <!-- Uploads Anteriores -->
    <h2 class="mt-5 mb-3">Seus Uploads</h2>
    <div class="uploads-grid" id="previousUploads">
        <?php // include 'load_uploads.php'; ?>
    </div>
    <!-- jQuery + Bootstrap JS -->
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<!-- Seu JS -->
<script src="./assets/js/scripts.js"></script>
</div>