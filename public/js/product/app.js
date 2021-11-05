var attributeIndex = 0;
$("#add_attribute").on('click', function () {
    var html = '';
    html += '<div class="row mb-2 input-form">';
    html += '<div class="col-4">';
    html += '<input type="text" name="product_attributes['+attributeIndex+'][name]" class="form-control mb-2 mb-md-0" placeholder="Attribute" autocomplete="off" required>';
    html += '</div>';
    html += '<div class="col-8">';
    html += '<div class="input-group">';
    html += '<input type="text" name="product_attributes['+attributeIndex+'][value]" class="form-control" placeholder="Value" autocomplete="off" required>';
    html += '<div class="input-group-append">';
    html += '<button type="button" class="btn btn-danger btn-sm float-right remove-input-form"><span class="material-icons align-middle" style="font-size: 20px">delete</span></button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    attributeIndex++;

    $('#new_attribute').append(html);
});

var rejectedIndex = 0;
$("#add_rejected").on('click', function () {
    var html = '';
    html += '<div class="row mb-2 input-form">';
    html += '<div class="col-md-3">';
    html += '<input type="number" name="product_rejected['+rejectedIndex+'][quantity]" class="form-control mb-2 mb-md-0" placeholder="Quantity" autocomplete="off" oninput="this.value=this.value.replace(/[^\\d]/,\'\')" required>';
    html += '</div>';
    html += '<div class="col-md-9">';
    html += '<div class="input-group">';
    html += '<input type="text" name="product_rejected['+rejectedIndex+'][note]" class="form-control" placeholder="Note" autocomplete="off" required>';
    html += '<div class="input-group-append">';
    html += '<button type="button" class="btn btn-danger btn-sm float-right remove-input-form"><span class="material-icons align-middle" style="font-size: 20px">delete</span></button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    rejectedIndex++;

    $('#new_rejected').append(html);
});

// remove row
$(document).on('click', '.remove-input-form', function () {
    $(this).closest('.input-form').remove();
});

$('#product_photo_input').on('change', function() {
    var input = $(this).get(0);
    if (input.files) {
        $.each(input.files, function(index, value) {
            var image = $('<img/>').addClass('img-thumbnail w-100 h-100').attr('style', 'max-height: 250px; object-fit: contain;');
            var column = $('<div></div>').addClass('col-md-6 mb-3');
            var button = $('<button type="button"></button>').addClass('btn btn-danger position-absolute ml--4 mt--2 py-1 px-2 delete-photo').html('<i class="material-icons mt-1" style="font-size: 14px">close</i>');
            var inputPhoto = $('<input type="file" name="product_photos[]"/>').addClass('d-none');
            inputPhoto.get(0).files = input.files;

            column.append(image);
            column.append(button);
            column.append(inputPhoto);

            var reader = new FileReader();
            reader.onload = function(e) {
                image.attr('src', e.target.result);
            }
            $('#product_photo_thumbnails').append(column);
            reader.readAsDataURL(value);
        })
        var reader = new FileReader();
    }
});
$(document).on('click', '.delete-photo', function() {
    $(this).closest('.col-md-6').remove();
});

$('.image-upload-wrap').on('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').on('dragleave drop', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});

