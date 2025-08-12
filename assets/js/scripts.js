document.addEventListener('DOMContentLoaded', function() {
    // Atualização automática a cada 10 segundos
    const updateUploads = () => {
        fetch('load_uploads.php')
            .then(response => response.text())
            .then(html => {
                document.getElementById('previousUploads').innerHTML = html;
            })
            .catch(error => console.error('Erro:', error));
    };

    // Atualiza imediatamente após upload
    if (new URLSearchParams(window.location.search).has('success')) {
        updateUploads();
    }

    // Atualização periódica
    setInterval(updateUploads, 10000);

    // Tratamento de erros em imagens
    document.body.addEventListener('error', function(e) {
        if (e.target.tagName === 'IMG') {
            e.target.closest('.upload-item')?.remove();
        }
    }, true);
});