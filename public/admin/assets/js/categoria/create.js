$(document).ready(function () {
    $('#imagenInput').change(function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#previewImage').attr('src', e.target.result).fadeIn();
                $('#resetImage').fadeIn();
            };
            reader.readAsDataURL(file);
        } else {
            $('#previewImage').fadeOut().attr('src', '#');
            $('#resetImage').fadeOut();
        }
    });

    $('#resetImage').click(function () {
        $('#imagenInput').val('');
        $('#previewImage').fadeOut().attr('src', '#');
        $(this).fadeOut();
    });
});