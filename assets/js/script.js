$(document).ready(function() {
    $('#mediaFile').change(function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const previewContainer = $('#previewContainer');
        const mediaPreview = $('#mediaPreview');

        mediaPreview.empty();

        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                mediaPreview.html(`
                    <img src="${e.target.result}" class="media-preview" alt="Pré-visualização">
                `);
            };
            reader.readAsDataURL(file);
        } else if (file.type.startsWith('video/')) {
            mediaPreview.html(`
                <video controls class="media-preview">
                    <source src="${URL.createObjectURL(file)}" type="${file.type}">
                </video>
            `);
        }

        previewContainer.fadeIn();
    });
});