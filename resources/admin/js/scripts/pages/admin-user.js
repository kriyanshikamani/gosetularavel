$(function () {
    ("use strict");

    var dtUserTable = $(".user-list-table"),
        newUserSidebar = $(".new-user-modal"),
        newUserForm = $("#add-new-user"),
        select = $(".select2"),
        dtContact = $(".dt-contact"),
        statusObj = {
            active: {  class: 'badge-light-success', title: "Active" },
            inactive: { class: 'badge-light-warning', title: "Inactive" },
            suspended: {class: 'badge-light-danger', title: "Suspended" },
        };
    var roleBadgeObj = {
        user: feather.icons["user"].toSvg({
            class: "font-medium-3 text-primary me-50",
            
        }),
        vendor: feather.icons["settings"].toSvg({
            class: "font-medium-3 text-warning me-50",
        }),
        admin: feather.icons["slack"].toSvg({
            class: "font-medium-3 text-danger me-50",
        }),
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

    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            width: "100%",
            dropdownParent: $this.parent(),
        });
    });

   
    if (dtUserTable.length) {
        dtUserTable.DataTable({
            ajax: {
              
                url:shoeUserRoute,
                dataSrc: "",
            },
            columns: [
                { data: "first_name" },
                { data: "role" },
                { data: "status" },
                {
                    
                    data: null,
                    defaultContent: "",
                    render: function (data, type, full, meta) {
                        var role = full["role"];
                        var isVendor = role === "vendor";
                        return (
                            '<div class="btn-group">' +
                            '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                            feather.icons["more-vertical"].toSvg({
                                class: "font-small-4",
                            }) +
                            "</a>" +
                            '<div class="dropdown-menu dropdown-menu-end">' +
                            '<a href="javascript:" class="dropdown-item  edit-record" data-id="' +
                            full["id"] +
                            '">' +
                            feather.icons["file-text"].toSvg({
                                class: "font-small-4 me-50",
                            }) +
                            "Edit</a>" +
                            `<a href="javascript:" class="dropdown-item delete-record" data-id="${full["id"]}">` +
                            feather.icons["trash-2"].toSvg({
                                class: "font-small-4 me-50",
                            }) +
                            "Delete</a>" +
                           
                            (isVendor
                                ? `<a href="${loginAsVendor.replace('id', full["id"])}" class="dropdown-item manage-business" data-id="${full["id"]}">` +
                                  feather.icons["briefcase"].toSvg({
                                      class: "font-small-4 me-50",
                                  }) +
                                  "Manage Business</a>"
                                : "") +
                            "</div>" +
                            "</div>"
                        );
                    },
                },
            ],
            columnDefs: [
                {
                    targets: 0,
                    responsivePriority: 4,
                    render: function (data, type, full, meta) {
                        var $image = full["profile_image"];
                        var $name =
                            full["first_name"] + " " + full["last_name"];
                        var $email = full["email"] || '';
                        var $mobile = full["mobile"];
                        var isEmailVerified = full["is_email_verified"];
                        var isMobileVerified = full["is_mobile_verified"];
                        var $output;
                        if ($image) {
                            $output =
                                '<img src="' +
                                $image +
                                '" alt="Avatar" height="32" width="32">';
                        } else {
                            var stateNum = Math.floor(Math.random() * 6) + 1;
                            var states = [
                                "success",
                                "danger",
                                "warning",
                                "info",
                                "dark",
                                "primary",
                                "secondary",
                            ];
                            var $state = states[stateNum];
                            var $initials = ($name.match(/\b\w/g) || [])
                                .slice(0, 2)
                                .join("")
                                .toUpperCase();
                            $output =
                                '<span class="avatar-content">' +
                                $initials +
                                "</span>";
                        }
                        var colorClass = !$image ? " bg-light-" + $state : "";

                        var emailVerificationIcon = isEmailVerified
                            ? feather.icons["check-circle"].toSvg({
                                  class: "font-medium-3 text-success me-50",
                                  "stroke-width": 2,
                              })
                            : feather.icons["x-circle"].toSvg({
                                  class: "font-medium-3 text-danger me-50",
                                  "stroke-width": 2,
                              });

                        var mobileVerificationIcon = isMobileVerified
                            ? feather.icons["check-circle"].toSvg({
                                  class: "font-medium-3 text-success me-50",
                                  "stroke-width": 2,
                              })
                            : feather.icons["x-circle"].toSvg({
                                  class: "font-medium-3 text-danger me-50",
                                  "stroke-width": 2,
                              });

                      
                        return (
                            '<div class="d-flex justify-content-left align-items-center">' +
                            '<div class="avatar-wrapper">' +
                            '<div class="avatar ' + colorClass + ' me-1">' +
                            $output +
                            '</div>' +
                            '</div>' +
                            '<div class="d-flex flex-column">' +
                            '<a href="' + userView + '" class="user_name text-truncate text-body">' +
                            '<span class="fw-bolder">' + $name + '</span>' +
                            '</a>' +
                            '<small class="emp_post text-muted">' +
                            '<a href="mailto:' + $email + '">' + $email + '</a> ' +
                            emailVerificationIcon +
                            '</small>' +
                            '<small class="emp_post text-muted">' +
                            '<a href="tel:' + $mobile + '">' + $mobile + '</a> ' +
                            mobileVerificationIcon +
                            '</small>' +
                            '</div>' +
                            '</div>'
                        );
                        
                    },
                },
                {
                    targets: 1,
                    render: function (data, type, full, meta) {
                        var $role = full["role"];
                        var roleBadgeObj = {
                            user: feather.icons["user"].toSvg({
                                class: "font-medium-3 text-primary me-50",
                            }),
                            vendor: feather.icons["settings"].toSvg({
                                class: "font-medium-3 text-warning me-50",
                            }),
                            admin: feather.icons["slack"].toSvg({
                                class: "font-medium-3 text-danger me-50",
                            }),
                        };
                        return (
                            "<span class='text-truncate align-middle'>" +
                            roleBadgeObj[$role] +
                            $role +
                            "</span>"
                        );
                    },
                },
                {
                    targets: 2,
                    render: function (data, type, full, meta) {
                        var $status = full["status"];
                        return (
                            '<span class="badge rounded-pill ' +
                            statusObj[$status].class +
                            '" text-capitalized>' +
                            statusObj[$status].title +
                            "</span>"
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
                paginate: {
                    previous: "&nbsp;",
                    next: "&nbsp;",
                },
            },
            buttons: [
                {
                    text: "Add New User",
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
                            return (
                                "Details of " +
                                data["first_name"] +
                                " " +
                                data["last_name"]
                            );
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
                    .columns(1)
                    .every(function () {
                        var column = this;
                        var label = $(
                            '<label class="form-label" for="UserRole">Role</label>'
                        ).appendTo(".user_role");
                        var select = $(
                            '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Role </option></select>'
                        )
                            .appendTo(".user_role")
                            .on("change", function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(
                                        val ? "^" + val + "$" : "",
                                        true,
                                        false
                                    )
                                    .draw();
                            });

                        $.each(roleBadgeObj, function (role, icon) {
                            select.append(
                                '<option value="' +
                                    role +
                                    '">' +
                                    icon +
                                    " " +
                                    role.charAt(0).toUpperCase() +
                                    role.slice(1) +
                                    "</option>"
                            );
                        });
                    });
                this.api()
                    .columns(2)
                    .every(function () {
                        var column = this;
                        var label = $(
                            '<label class="form-label" for="FilterTransaction">Status</label>'
                        ).appendTo(".user_status");
                        var select = $(
                            '<select id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Status </option></select>'
                        )
                            .appendTo(".user_status")
                            .on("change", function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(
                                        val ? "^" + val + "$" : "",
                                        true,
                                        false
                                    )
                                    .draw();
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
    }
    $(document).on("submit", "#add-new-user", function (e) {
        e.preventDefault();
        if (newUserForm.length) {
            newUserForm.validate({
                errorClass: "error",
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    mobile: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    role: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                },
            });
        }
        var isValid = newUserForm.valid();
        var formData = new FormData(this);
        if (isValid) {
            $.ajax({
                url: addUserRoute,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        newUserSidebar.modal("hide");

                        toastr.success(
                            response.message,
                            "User has added successfully"
                        );
                        $(".user-list-table").DataTable().ajax.reload();
                        $("#responseMessage").html(
                            '<div class="alert alert-success">' +
                                response.success +
                                "</div>"
                        );
                        $("#add-new-user")[0].reset();
                    } else {
                        toastr.error("An error occurred: " + error, "Error");
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
    if (dtContact.length) {
        dtContact.each(function () {
            new Cleave($(this), {
                phone: true,
                phoneRegionCode: "US",
            });
        });
    }
    dtUserTable.on("click", ".delete-record", function () {
        var id = $(this).data('id');
        var deleteUrl = deleteUserRoute.replace('USER_ID', id);
        Swal.fire({
            title: "Are you sure?",
            text: "You want to delete this record!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085D6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger ms-1",
            },
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
                            customClass: {
                                confirmButton: "btn btn-success",
                            },
                        });
                        $(".user-list-table").DataTable().ajax.reload();
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: "Error",
                            text: "There was an error deleting the record.",
                            icon: "error",
                            customClass: {
                                confirmButton: "btn btn-danger",
                            },
                        });
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "Cancelled",
                    text: "Your record is safe :)",
                    icon: "error",
                    customClass: {
                        confirmButton: "btn btn-danger",
                    },
                });
            }
        });
    });
});
$(document).on("click", ".edit-record", function () {
    var id = $(this).data('id');
    var editUrl = editUserRoute.replace('USER_ID', id);
    $.ajax({
        url: editUrl,
        type: "GET",
        success: function (response) {
            if (response.success) {
                $("#add-new-user").attr("id", "edit-user-form");
                $("#edit-user-form").attr("name", "edit-user-form");
                $(".password").hide();
                $("#exampleModalLabel").text("Edit User");
                $("#submit").text("Edit");
                $("#id").val(response.data.id);
                $("#first_name").val(response.data.first_name);
                $("#last_name").val(response.data.last_name);
                $("#mobile").val(response.data.mobile);
                $("#email").val(response.data.email);
                $("#role").val(response.data.role).trigger("change");
                $("#status").val(response.data.status).trigger("change");
                if (response.data.profile_image) {
                    $("#image_preview")
                        .attr( "src", assetPath +  "upload/user/" + response.data.profile_image ).show();
                } else {
                    $("#image_preview").hide();
                }
                $("#modals-slide-in").modal("show");
            } else {
                toastr.error(response.message, "Error");
            }
        },
        error: function (xhr, status, error) {
            toastr.error(
                "An error occurred while fetching user data.",
                "Error"
            );
        },
    });
});
$(document).on("submit", "#edit-user-form", function (e) {
    e.preventDefault();
    var id = $("#id").val();
    var updateUrl = updateUserRoute.replace('USER_ID', id);
    var formData = new FormData(this);
    if ($("#edit-user-form").length) {
        $("#edit-user-form").validate({
            errorClass: "error",
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                mobile: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
            },
        });
    }
    var isValid = $("#edit-user-form").valid();
    if (isValid) {
        $.ajax({
            url: updateUrl,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message, "Success");
                    $("#modals-slide-in").modal("hide");
                    $(".user-list-table").DataTable().ajax.reload();
                } else {
                    toastr.error(response.message, "Error");
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

$('#modals-slide-in').on('hidden.bs.modal', function () {
    $("#edit-user-form").attr("id", "add-new-user");
    $("#add-new-user").attr("name", "add-new-user");
    $("#exampleModalLabel").text("Add New User");
    $("#submit").text("Submit");
    $("#id").val('');
    $("#first_name").val('');
    $("#last_name").val('');
    $("#mobile").val('');
    $("#email").val('');
    $("#role").val('').trigger("change");
    $("#status").val('').trigger("change");
    $(".password").show();
    $("#image_preview").hide();
    $("#add-new-user")[0].reset();
});
