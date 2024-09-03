// Define
var dataTableListMenu = $("#tableListMenu").DataTable();
var form = $("#form-submit");
var formSubmit = document.getElementById("form-submit");

select2Standard({
    parent: "#largeModal",
    selector: ".select2",
});

function getListTableMenu() {
    var url_datatable = $(".url_datatable").data("url");
    var dataTableValue = $(".data_datatable").data("table");
    if (dataTableValue != "" && dataTableValue != null) {
        var data_datatable = JSON.parse(dataTableValue);
        if (data_datatable != null) {
            if (data_datatable.length > 0) {
                for (let i = 0; i < data_datatable.length; i++) {
                    var element = parseInt(data_datatable[i]);
                    check_input.push(element);
                }
            }
        }
    }

    $.ajax({
        url: url_datatable,
        dataType: "json",
        type: "get",
        success: function (data) {
            let output = `
            <tr>
              <td colspan="4">
                <div class="text-center">
                  <strong>Tidak ada data</strong>
                </div>
              </td>
            </tr>
          `;
            if (data.length > 0) {
                output = ``;

                var setDataTable = [];
                setDataTable = data.map((item, index) => [
                    index + 1,
                    item.nama_mpermissions,
                    item.link_mpermissions,
                    `
                    <div class="form-check">
                        <input class="form-check-input check-input-datatable" type="checkbox" value="${item.id
                    }" id="id_${item.id}" data-id="${item.id
                    }" data-url="{{ url('setting/permissions/chooseMenu') }}"
                        ${check_input.includes(item.id) ? "checked" : ""}
                        >
                        <label class="form-check-label" for="id_${item.id}">
                        </label>
                    </div>
                    `,
                ]);
                dataTableListMenu.clear().draw();
                dataTableListMenu.rows.add(setDataTable).draw();
            }
        },
    });
}
getListTableMenu();

$(document).off("click", ".check-input-datatable");
$(document).on("click", ".check-input-datatable", function () {
    let id = $(this).data("id");

    if ($(this).is(":checked")) {
        if (!check_input.includes(id)) {
            check_input.push(id);
        }
    } else {
        if (check_input.includes(id)) {
            check_input = check_input.filter((v, i) => v != id);
        }
    }
});

// Submit button handler
formSubmit.addEventListener("submit", function (event) {
    event.preventDefault();
    submitData();
});

$(document).off("click", 'input[name="isnode_mpermissions"]');
$(document).on("click", 'input[name="isnode_mpermissions"]', function () {
    if ($(this).is(":checked")) {
        value = 1;
    } else {
        value = 0;
    }

    if (value == 1) {
        $('input[name="ischildren_mpermissions"]').prop("checked", false);

        $("#form-menu_children_id").removeClass("d-none");
        $("#form-menu_root_id").addClass("d-none");
    }
});

$(document).off("click", 'input[name="ischildren_mpermissions"]');
$(document).on("click", 'input[name="ischildren_mpermissions"]', function () {
    if ($(this).is(":checked")) {
        value = 1;
    } else {
        value = 0;
    }

    if (value == 1) {
        $('input[name="isnode_mpermissions"]').prop("checked", false);

        $("#form-menu_children_id").addClass("d-none");
        $("#form-menu_root_id").removeClass("d-none");
    }
});

function submitData() {
    var formData = $(form)[0];
    var data = new FormData(formData);
    data.delete("isnode_mpermissions");
    data.delete("ischildren_mpermissions");
    data.delete("tableListMenu_length");
    data.delete("menu_root");

    var isnode_mpermissions = $('input[name="isnode_mpermissions"]:checked').val();
    var ischildren_mpermissions = $('input[name="ischildren_mpermissions"]:checked').val();
    var menu_root = $('select[name="menu_root"] option:selected').val();
    var link_menu = $('input[name="link_menu"]').val();

    var input_check = check_input.filter(
        (value, index, self) => self.indexOf(value) === index
    );

    if (isnode_mpermissions == null) {
        isnode_mpermissions = 0;
    }

    if (ischildren_mpermissions == null) {
        ischildren_mpermissions = 0;
    }

    if (input_check.length > 0) {
        isnode_mpermissions = 1;
        ischildren_mpermissions = 0;
    }

    if (menu_root != null && menu_root != "") {
        isnode_mpermissions = 0;
        ischildren_mpermissions = 1;
    }

    if (link_menu == "#") {
        isnode_mpermissions = 1;
        ischildren_mpermissions = 0;
    }

    if (isnode_mpermissions == 1) {
        isnode_mpermissions = 1;
        ischildren_mpermissions = 0;
    }

    input_check = JSON.stringify(input_check);

    data.append("isnode_mpermissions", isnode_mpermissions);
    data.append("ischildren_mpermissions", ischildren_mpermissions);
    data.append("childrenmenu_mpermissions", input_check);
    data.append("root_mpermissions", menu_root);

    $.ajax({
        type: "post",
        url: $(form).attr("action"),
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            clearError422();
            $("#btn-submit").attr("disabled", true);
            $("#btn-submit").html(disableButton);
        },
        success: function (data) {
            myModal.hide();
            runToast({
                title: "Successfully",
                description: data,
                type: "bg-success",
            });
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
            loadNested();
        },
    });
}
