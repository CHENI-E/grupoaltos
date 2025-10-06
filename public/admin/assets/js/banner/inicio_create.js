console.log('esto es el js de inicio banners');



function initSingleImageUpload(inputSelector, previewSelector) {
  const input = $(inputSelector);
  const previewContainer = $(previewSelector);

  input.off('change').on('change', function (event) {
    const file = this.files[0];

    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        const imageCard = `
          <div class="card image-preview-card">
            <img src="${e.target.result}" class="card-img-top" alt="Imagen seleccionada">
            <div class="card-body">
              <small class="text-muted d-block mb-2">${file.name}</small>
              <button type="button" class="btn btn-outline-danger btn-sm remove-btn">Quitar imagen</button>
            </div>
          </div>
        `;
        previewContainer.html(imageCard).hide().fadeIn();

        // Botón quitar imagen
        previewContainer.find('.remove-btn').on('click', function () {
          input.val('');
          previewContainer.fadeOut(function () {
            $(this).empty();
          });
        });
      };
      reader.readAsDataURL(file);
    } else {
      alert('Por favor selecciona un archivo de imagen válido.');
      input.val('');
      previewContainer.empty();
    }
  });
}

$(document).ready(function () {
    initSingleImageUpload('#primer_banner', '#preview-primer_banner');
    initSingleImageUpload('#primer_banner_movil', '#preview-primer_banner_movil');
    initSingleImageUpload('#segundo_banner', '#preview-segundo_banner');
    initSingleImageUpload('#segundo_banner_movil', '#preview-segundo_banner_movil');
    initSingleImageUpload('#tercer_banner', '#preview-tercer_banner');
    initSingleImageUpload('#tercer_banner_movil', '#preview-tercer_banner_movil');
    initSingleImageUpload('#cuarto_banner', '#preview-cuarto_banner');
    initSingleImageUpload('#cuarto_banner_movil', '#preview-cuarto_banner_movil');
});
