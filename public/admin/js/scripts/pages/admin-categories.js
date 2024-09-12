
$(function () {
    ("use strict");
    var dtTable = $("#list-table"),
        newCategorySidebar = $(".new-modal"),
        newFrom = $("#add-form"),
        editForm = $("#edit-form"),
        assetPath = "",
        statusObj = {
            active: { class: "bg-success", title: "Active" },
            inactive: { class: "bg-warning", title: "Inactive" },
        };
    if ($("body").attr("data-framework") === "laravel") {
        assetPath = $("body").attr("data-asset-path");
        userView = assetPath + "app/user/view/account";
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    if (dtTable.length) {
        dtTable.DataTable({
            ajax: {
                url: displayCategoryRoute,
                type: 'GET'
            },
            columns: [
                { data: "name" },
                { data: 'parent' },
                { data: "icon" },
                { data: "banner_image" },
                { data: "square_image" },
                { data: "status" },
                { name: "action" }
            ],
            columnDefs: [
                {
                    targets: 2,
                    render: function (data, type, full, meta) {
                        return `<img src="${data}" class="img-fluid" style="width: 100px; height: auto;" />`;
                    }
                },
                {
                    targets: 3,
                    render: function (data, type, full, meta) {
                        return `<img src="${data}" class="img-fluid" style="width: 100px; height: auto;" />`;
                    }
                },
                {
                    targets: 4,
                    render: function (data, type, full, meta) {
                        return `<img src="${data}" class="img-fluid" style="width: 100px; height: auto;" />`;
                    }
                },
                {
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var $status = full['status'];

                        return (
                            '<span class="badge rounded-pill ' +
                            statusObj[$status].class +
                            '" text-capitalized>' +
                            statusObj[$status].title +
                            '</span>'
                        );
                    }
                },
                {
                    targets: -1,
                    title: "Actions",
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="btn-group">' +
                            '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                            feather.icons["more-vertical"].toSvg({
                                class: "font-small-4",
                            }) +
                            "</a>" +
                            '<div class="dropdown-menu dropdown-menu-end">' +
                            `<a href="javascript:void(0);" class="dropdown-item edit-record" data-id="${full['id']}" ">` +
                            feather.icons["file-text"].toSvg({
                                class: "font-small-4 me-50",
                            }) +
                            "Edit</a>" +
                            `<a href="javascript:void(0);"  class="dropdown-item delete-record" data-id="${full['id']}"  >` +
                            feather.icons["trash-2"].toSvg({
                                class: "font-small-4 me-50",
                            }) +
                            "Delete</a></div>" +
                            "</div>" +
                            "</div>"
                        );
                    },
                },
            ],
            order: [[1, "desc"]],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
                '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
                '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
                ">t" +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                ">",
            language: {
                sLengthMenu: "Show _MENU_",
                search: "Search",
                searchPlaceholder: "Search..",
            },
            buttons: [
                {
                    text: "Add New Category",
                    className: "add-new btn btn-primary",
                    attr: {
                        "data-bs-toggle": "modal",
                        "data-bs-target": "#modals-slide-in",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass("btn-secondary");
                    },
                },
            ],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return "Details of " + data["full_name"];
                        },
                    }),
                    type: "column",
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.columnIndex !== 6
                                ? '<tr data-dt-row="' +
                                col.rowIdx +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                "<td>" +
                                col.title +
                                ":" +
                                "</td> " +
                                "<td>" +
                                col.data +
                                "</td>" +
                                "</tr>"
                                : "";
                        }).join("");
                        return data
                            ? $('<table class="table"/>').append(
                                "<tbody>" + data + "</tbody>"
                            )
                            : false;
                    },
                },
            },

            initComplete: function () {
                this.api()
                    .columns(5)
                    .every(function () {
                        var column = this;
                        var label = $(
                            '<label class="form-label" for="FilterTransaction">Status</label>'
                        ).appendTo(".user_status");
                        var select = $(
                            '<select id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Status </option></select>'
                        ).appendTo(".user_status")
                            .on("change", function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(
                                        val ? "^" + val + "$" : "",
                                        true,
                                        false
                                    ).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append(
                                    '<option value="' +
                                    d +
                                    '" class="text-capitalize">' +
                                    d +
                                    "</option>"
                                );
                            });
                    });
            },

        });
        dtTable.on("click", ".delete-record", function () {
            var id = $(this).data("id");
            var deleteUrl = deleteCategoryRoute.replace('CAT_ID', id);
            Swal.fire({
                title: "Are you sure?",
                text: "You want to delete this record!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085D6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                confirmButtonClass: "btn btn-primary",
                cancelButtonClass: "btn btn-danger ms-1",
                buttonsStyling: false,
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        type: "GET",
                        success: function (result) {
                            Swal.fire({
                                icon: "success",
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                confirmButtonClass: "btn btn-success",
                            });
                            $(".list-table").DataTable().ajax.reload();
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                title: "Error",
                                text: "There was an error deleting the record.",
                                icon: "error",
                                confirmButtonClass: "btn btn-danger",
                            });
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "Cancelled",
                        text: "Your record is safe :)",
                        icon: "error",
                        confirmButtonClass: "btn btn-danger",
                    });
                }
            });
        });
    }

    $(document).on('submit', '#add-form', function (e) {
        e.preventDefault();

        if (newFrom.length) {
            newFrom.validate({
                errorClass: "error",
                rules: {
                    name: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
            });
        }
        var isValid = newFrom.valid();
        var formData = new FormData(this);
        if (isValid) {
            $.ajax({
                url: addCategoryRoute,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        newCategorySidebar.modal("hide");
                        toastr.success(response.message, 'category added successfully');
                        $("#responseMessage").html(
                            '<div class="alert alert-success">' +
                            response.success +
                            "</div>"
                        );
                        $(".list-table").DataTable().ajax.reload();
                        $('#add-form')[0].reset();
                    } else {
                        alert('response.error');
                    }
                },
              
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = "";
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + "\n";
                        $('#' + key).closest('.mb-1').find('.text-danger').remove(); 
                        $('#' + key).after('<span class="text-danger">' + value[0] + '</span>');
                    });
                }
                
            });
        }
    });

    $(document).on('click', '.edit-record', function () {
        var categoryId = $(this).data('id');
        var editUrl = editCategoryRoute.replace('CAT_ID', categoryId);
        $.ajax({
            url: editUrl,
            type: 'GET',
            success: function (response) {
                if (response.success) {
                    $('#add-form').attr('id', 'edit-form');
                    $('#edit-form').attr('name', 'edit-form');
                    $('#exampleModalLabel').text('Edit Category');
                    $('#cat_sub').text("Edit");
                    $('#category_id').val(response.data.id);
                    $('#parent_category').val(response.data.parent_category_id);
                    $('#name').val(response.data.name);
                    $('#status').val(response.data.status);
                    $('#description').val(response.data.description);
                    if (response.data.icon) {
                        $('#icon_preview').attr('src', assetPath + 'upload/category/' + response.data.icon).show();
                    } else {
                        $('#icon_preview').hide();
                    }
                    if (response.data.banner_image) {
                        $('#banner_image_preview').attr('src', assetPath + 'upload/category/' + response.data.banner_image).show();
                    } else {
                        $('#banner_image_preview').hide();
                    }
                    if (response.data.square_image) {
                        $('#square_image_preview').attr('src', assetPath + 'upload/category/' + response.data.square_image).show();
                    } else {
                        $('#square_image_preview').hide();
                    }
                    $('#modals-slide-in').modal('show');
                } else {
                    toastr.error(response.message, 'Error');
                }
            },
            error: function (xhr, status, error) {
                toastr.error('An error occurred while fetching category data.', 'Error');
            }
        });
    });

    $(document).on('submit', '#edit-form', function (e) {
        e.preventDefault();
        var id = $('#category_id').val();
        var updateUrl = updateCategoryRoute.replace('CAT_ID', id);
        var catFormData = new FormData(this);
  
        if ($('#edit-form').length) {
            $('#edit-form').validate({
                errorClass: "error",
                rules: {
                    name: {
                        required: true,
                    },

                    description: {
                        required: true,
                    },
                },
            });
        }
        var isValid = $('#edit-form').valid();
        if (isValid) {
            $.ajax({
                url: updateUrl,
                type: 'POST',
                data: catFormData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message, 'Success');
                        $('#modals-slide-in').modal('hide');
                        $('.user-list-table').DataTable().ajax.reload();
                    } else {
                        toastr.error(response.message, 'Error');
                    }
                    $(".list-table").DataTable().ajax.reload();
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = "";
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + "\n";
                        $('#' + key).closest('.mb-1').find('.text-danger').remove(); 
                        $('#' + key).after('<span class="text-danger">' + value[0] + '</span>');
                    });
                }
            });
        }
    });

    $('#modals-slide-in').on('hidden.bs.modal', function () {
        $('#edit-form').attr('id', 'add-form');
        $('#add-form').attr('name', 'category-form');
        $("#exampleModalLabel").text("Add New Category");
        $("#submit").text("Submit");
        $("#id").val('');
        $("#parent_category").val('');
        $("#name").val('');
        $("#description").val('');
        $("#icon").val('');
        $("#banner_image").val('');
        $("#square_image").val('');
        $("#status").val('').trigger("change");
        $("#icon_preview").hide();
        $("#banner_image_preview").hide();
        $("#square_image_preview").hide();
        $("#add-form")[0].reset();
    });
});


