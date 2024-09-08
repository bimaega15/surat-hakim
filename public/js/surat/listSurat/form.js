var form_surat_id = $('.form_surat_id').data('value');
var url_root = $('.url_root').data('value');
var contentSurat;
var ckeditor = CKEDITOR.replace('contentSurat');
var placeholderText = 'Isi Content Surat...';
function addPlaceholder(editor) {
    if (editor.getData().trim().length === 0) {
        editor.setData('<p style="color:#c7cdd4;">' + placeholderText + '</p>');
    }
}
function removePlaceholder(editor) {
    if (editor.getData().includes(placeholderText)) {
        editor.setData('');
    }
}
ckeditor.on('instanceReady', function () {
    addPlaceholder(ckeditor);

    ckeditor.on('focus', function () {
        removePlaceholder(ckeditor);
    });

    ckeditor.on('blur', function () {
        if (ckeditor.getData().trim().length === 0) {
            addPlaceholder(ckeditor);
        }
    });
});

function loadContentSurat() {
    if (form_surat_id) {
        $.ajax({
            url: `${url_root}/surat/listSurat/${form_surat_id}`,
            type: 'get',
            dataType: 'json',
            success: function (respone) {
                const { data: { result } } = respone;
                ckeditor.on('instanceReady', function () {
                    ckeditor.setData(result.content_fsurat);
                });
            }
        })
    }
}
loadContentSurat();

function submitData() {
    const formData = new FormData(formSubmit);
    formData.delete('iswatermark_fsurat');
    formData.delete('content_fsurat');

    let iswatermark_fsurat = 0;
    if ($('input[name="iswatermark_fsurat"]').is(':checked')) {
        iswatermark_fsurat = 1;
    }
    formData.append('iswatermark_fsurat', iswatermark_fsurat);
    formData.append('content_fsurat', ckeditor.getData());

    $.ajax({
        type: "post",
        url: $("#form-submit").attr("action"),
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        beforeSend: function () {
            clearError422();
            $("#btn-submit").attr("disabled", true);
            $("#btn-submit").html(disableButton);
        },
        success: function (data) {
            runToast({
                title: "Successfully",
                description: data,
                type: "bg-success",
            });
            window.location.href = `${url_root}/surat/listSurat`;
        },
        error: function (jqXHR, exception) {
            $("#btn-submit").attr("disabled", false);
            $("#btn-submit").html(enableButton);
            if (jqXHR.status === 422) {
                showErrors422(jqXHR);
            }
        },
        complete: function () {
            $("#btn-submit").attr("disabled", false);
            $("#btn-submit").html(enableButton);
        },
    });
}
var formSubmit = document.getElementById("form-submit");

$(document).ready(function () {
    formSubmit.addEventListener("submit", function (event) {
        event.preventDefault();
        submitData();
    });
})
