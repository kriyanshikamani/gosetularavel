$(function () {
    ("use strict");

    var dtReviewTable = $(".user-review-table"),
        select = $(".select2"),
        dtContact = $(".dt-contact"),
      
        statusObj = {
            "pending": { title: 'Pending', class: 'badge-light-warning' },
            "approved": { title: 'Approved', class: 'badge-light-success' },
            "rejected": { title: 'Rejected', class: 'badge-light-danger' }
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

   
    if (dtReviewTable.length) {
        dtReviewTable.DataTable({
            ajax: {
              
                url:showReviewRoute,
                dataSrc: "",
            },
            columns: [
                { data: "rating" },
                { data: "comment" },
                { data: "status" },
                {
                    data: null,
                    defaultContent: "",
                    render: function (data, type, full, meta) {
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
                            '<a href="javascript:" class="dropdown-item delete-record" data-id="' +
                            full["id"] +
                            '">' +
                            feather.icons["trash-2"].toSvg({
                                class: "font-small-4 me-50",
                            }) +
                            "Delete</a>" +
                            "</div>" +
                            "</div>"
                        );
                    },
                },
            ],
            columnDefs: [
               
                // {
                   

                //     targets: 0,
                //     responsivePriority: 4,
                //     render: function (data, type, full, meta) {
                //         var rating = full["rating"]; 
                //         var businessName = full["business_name"]; 
                //         var userName = full["user_first_name"] + ' ' + full["user_last_name"]; 
                
                //         var stars = '';
                //         var maxRating = 5;
                
                      
                //         for (var i = 0; i < rating; i++) {
                //             stars += feather.icons['star'].toSvg({ class: 'text-warning' });
                //         }
                //         for (var i = rating; i < maxRating; i++) {
                //             stars += feather.icons['star'].toSvg({ class: 'text-muted' });
                //         }
                
                     
                //         return '<div class="d-flex align-items-center">' +
                //                '<div class="me-2">' + stars + '</div>' +
                //                '<div>' +
                //                '<div class="fw-bold">' + businessName + '</div>' +
                //                '<div class="text-muted">' + userName + '</div>' +
                //                '</div>' +
                //                '</div>';
                //     }
                // },
                {
                    targets: 0,
                    responsivePriority: 4,
                    render: function (data, type, full, meta) {
                        var rating = full["rating"]; 
                        var businessName = full["business_name"]; 
                        var userName = full["user_first_name"] + ' ' + full["user_last_name"]; 
                        
                        var stars = '';
                        var maxRating = 5;
                
                        // Generate star icons based on the rating
                        for (var i = 0; i < rating; i++) {
                            stars += feather.icons['star'].toSvg({ class: 'text-warning' });
                        }
                        for (var i = rating; i < maxRating; i++) {
                            stars += feather.icons['star'].toSvg({ class: 'text-muted' });
                        }
                
                        // Return the formatted HTML with improved UI
                        return `
                            <div class="d-flex align-items-center">
                                <div class="me-3 d-flex align-items-center">
                                    <div class="star-rating" style="font-size: 1.25rem;">
                                        ${stars}
                                    </div>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark"><strong>Business Name:</strong>${businessName}</div>
                                    <div class="text-muted"><strong>User:</strong>${userName}</div>
                                </div>
                            </div>
                        `;
                    }
                }
,                
                {
                    targets: 2,
                    render: function (data, type, full, meta) {
                    var status = full['status']; 
                    var statusData = statusObj[status] || { title: 'Unknown', class: 'badge-light-secondary' };  
                    return (
                        '<span class="badge rounded-pill ' +
                        statusData.class +
                        '" text-capitalized>' +
                        statusData.title +
                        '</span>'
                    );
                },
                }
            ],
            order: [[0, "desc"]],
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
                // Add buttons if necessary
            ],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return "Details of Review ID: " + data["id"];
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
  
    dtReviewTable.on("click", ".delete-record", function () {
        var id = $(this).data('id');
        var deleteUrl = deleteReviewRoute.replace('REVIEW_ID', id);
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
    var editUrl = editReviewRoute.replace('REVIEW_ID', id);
    $.ajax({
        url: editUrl,
        type: "GET",
        success: function (response) {
            if (response.success) {
              
                $("#exampleModalLabel").text("Edit Review");
                $("#submit").text("Edit");
                $("#id").val(response.data.id);
                $("#rating").val(response.data.rating);
                $("#comment").val(response.data.comment);
                $("#business_id").val(response.data.business_id);
                $("#user_id").val(response.data.user_id);
                $("#status").val(response.data.status).trigger("change");
               
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
$(document).on("submit", "#edit-user-review", function (e) {
    e.preventDefault();
 
    var id = $("#id").val();
    var updateUrl = updateReviewRoute.replace('REVIEW_ID', id);
    var formData = new FormData(this);
    if ($("#edit-user-review").length) {
        $("#edit-user-review").validate({
            errorClass: "error",
            rules: {
                rating: {
                    required: false,
                },
                comment: {
                    required: false,
                },
              
                status: {
                    required: false,
                },
            },
        });
    }
    var isValid = $("#edit-user-review").valid();
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
                    $(".user-review-table").DataTable().ajax.reload();
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

// $('#modals-slide-in').on('hidden.bs.modal', function () {
//     $("#edit-user-form").attr("id", "add-new-user");
//     $("#add-new-user").attr("name", "add-new-user");
//     $("#exampleModalLabel").text("Add New User");
//     $("#submit").text("Submit");
//     $("#id").val('');
//     $("#first_name").val('');
//     $("#last_name").val('');
//     $("#mobile").val('');
//     $("#email").val('');
//     $("#role").val('').trigger("change");
//     $("#status").val('').trigger("change");
//     $(".password").show();
//     $("#image_preview").hide();
//     // $("#add-new-user")[0].reset();
// });
