// "use strict";
var datatable;
let url_datastatis = $(".url_datastatis").data("url");
var url_parent_id;
var url_parent_name;
var check_input = [];
var myModal;

function loadNested() {
    var url_menu = $(".url_rendermenu").data("url");
    $.ajax({
        url: url_menu,
        type: "get",
        dataType: "text",
        success: function (data) {
            $("#output_tree").html(data);
        },
    });
}

$(document).ready(function () {
    var body = $("body");
    loadNested();

    // handle btn add data
    body.on("click", ".btn-add", function () {
        const url = $(this).data('urlcreate');
        $.ajax({
            url,
            type: 'post',
            dataType: 'json',
            beforeSend: function () {
                clearError422();
                $(".btn-add").attr("disabled", true);
                $(".btn-add").html(disableButton);
            },
            success: function (data) {
                Swal.fire({
                    title: 'Successfully',
                    text: data,
                    icon: "success",
                    confirmButtonText: "OK",
                });
            },
            error: function (jqXHR, exception) {
                $(".btn-add").attr("disabled", false);
                $(".btn-add").html(enableButton);
                if (jqXHR.status === 422) {
                    showErrors422(jqXHR);
                }
            },
            complete: function () {
                $(".btn-add").attr("disabled", false);
                $(".btn-add").html(enableButton);
                loadNested();
            },
        })
    });

    // handle btn edit
    body.on("click", ".btn-edit", function (e) {
        e.preventDefault();

        showModal({
            url: $(this).attr("href"),
            data: { id: $(this).data("id") },
            title: "Form Menu",
            type: "get",
            modalId: $(this).data("typemodal"),
        });
    });

    function loadNestedForm() {
        var url_menu = $(".url_rendermenu_form").data("url");
        $.ajax({
            url: url_menu,
            type: "get",
            dataType: "text",
            success: function (data) {
                $("#output_menu").html(data);
            },
            complete: function () {
                $(".dd").nestable();
                $(".dd").on("change", function () {
                    var $this = $(this);
                    var serializedData = window.JSON.stringify(
                        $($this).nestable("serialize")
                    );
                    sortingAndNested(serializedData);
                });
            },
        });
    }

    // handle btn delete
    function handleDelete(element, data = null) {
        basicDeleteConfirmDatatable({
            data: {
                nestedTree: data,
            },
            text: "Apakah anda yakin ingin menghapus item ini?",
            dataFunction: loadNestedForm,
            isRenderView: true,
            urlDelete: $(element).data("url"),
        });
    }

    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        var $this = $(".dd");
        var serializedData = window.JSON.stringify(
            $($this).nestable("serialize")
        );

        handleDelete(this, serializedData);
    });
});
