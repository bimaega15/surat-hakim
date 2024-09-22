var urlRoot = $('.url_root').data('value');
$(document).ready(function () {
    $(document).on('click', '.button_search', function (e) {
        e.preventDefault();
        const slug = $('input[name="slug"]').val().toLowerCase().split(' ').join('-');
        window.location.href = `${urlRoot}/hasilPermohonan?slug=${slug}`;
    })
})