let inputIndex = 0;

function createFileInput() {
    return `
    <div class="col-md-3 mb-3 file-input-wrapper" data-index="${inputIndex}">
        <div class="card">
            <img class="card-img-top preview-img" id="preview-${inputIndex}" src="../../../../ecommerce/assets/default_image.jpg" alt="Preview">
            <div class="card-body text-center">
                <input type="file" name="images[]" class="form-control mb-2 image-input" data-index="${inputIndex}" accept="image/*">
                <button type="button" class="btn btn-danger btn-sm removeInput">Eliminar</button>
            </div>
        </div>
    </div>`;
}

$(document).ready(function () {
    $('#addInput').click(function () {
        $('#fileInputs').append(createFileInput());
        inputIndex++;
    });

    $(document).on('click', '.removeInput', function () {
        $(this).closest('.file-input-wrapper').remove();
    });

    // Preview de imagen
    $(document).on('change', '.image-input', function (e) {
        let index = $(this).data('index');
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $(`#preview-${index}`).attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});