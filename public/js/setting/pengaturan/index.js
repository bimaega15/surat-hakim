// "use strict";
var baseurl = $('.baseurl').data('value');
var formsubmit = $('#form-submit');
$(document).ready(function () {
    const loadData = () => {
        $.ajax({
            url: `${baseurl}/setting/pengaturan`,
            type: 'get',
            dataType: 'text',
            beforeSend: function () {
                $('.loading').removeClass('d-none');
            },
            success: function (data) {
                $('#output').html(data);
            },
            complete: function () {
                $('.loading').addClass('d-none');
            }
        })
    }
    loadData();

    $(document).on('submit', '#form-submit', function (e) {
        e.preventDefault();
        var formData = new FormData($("#form-submit")[0]);
        $.ajax({
            type: "post",
            url: $("#form-submit").attr("action"),
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
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
                loadData();
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
    })
});
