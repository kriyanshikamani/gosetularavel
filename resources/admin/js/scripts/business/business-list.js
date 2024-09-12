$(function () {
    "use strict";

    if ($("body").attr("data-framework") === "laravel") {
        var assetPath = $("body").attr("data-asset-path");
        var userView = assetPath + "app/user/view/account";
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    function base64Encode(str) {
        return btoa(unescape(encodeURIComponent(str)));
    }


        var dtBusinessTable = $(".business-list-table");
    
//         if (dtBusinessTable.length) {
//             dtBusinessTable.DataTable({
//                 ajax: {
//                     url: showBusinessRoute,
//                     dataSrc: "data", // Ensure this matches the structure of your AJAX response
//                 },
//                 columns: [
//                     { data: "vendor_name" },
//                     { data: "name" },
//                     { data: "sub_category" },
//                     { data: "country" },
//                     { data: "status" },
//                     { data: "id" } // Ensure that this is mapped correctly
//                 ],
//                 columnDefs: [
//                     {
//                         targets: 0, // Adjust based on the position of your vendor name column
//                         render: function(data, type, full, meta) {
//                             var vendorEmail = full["vendor_email"] || '';
//                             var vendorMobile = full["vendor_mobile"] || '';
                    
//                             return (
//                                 '<div class="d-flex flex-column">' +
//                                 '<span class="fw-medium">' + data + '</span>' + // Vendor name
//                                 '<span class="fw-medium">' +
//                                 '<a href="mailto:' + vendorEmail + '">' + vendorEmail + '</a>' +
//                                 '</span>' +
//                                 '<span class="fw-medium">' + vendorMobile + '</span>' +
//                                 '</div>'
//                             );
//                         }
//                     },
//                     {
//                         targets: 1,
//                         render: function(data, type, full, meta) {
//                             var mobile = full["mobile"] || ''; 
//                             var whatsappMobile = full["whatsapp_mobile"] || ''; 
//                             var email = full["email"] || '';
                         
//                             var whatsappLink = String(whatsappMobile).replace(/\D/g, '');
                    
//                             return (
//                                 '<div class="d-flex justify-content-left align-items-center">' +
//                                 '<div class="d-flex flex-column">' +
//                                 '<span class="fw-semibold"><strong>Business Name:</strong>'+' ' + data + '</span>' +
//                                 '<span class="fw-medium"><strong>Business Type:</strong>'+' ' + full["business_type"] + '</span>' +
//                                 '<span class="fw-medium"><strong>Email:</strong>' +' '+
//                                 '<a href="mailto:' + email + '">' + email + '</a>' +
//                                 '</span>' +
//                                 '<span class="fw-medium"><strong>Mobile:</strong>' + mobile + '</span>' +
//                                 '<span class="fw-medium">' +
//                                 '<a href="https://wa.me/' + whatsappLink + '" target="_blank" class="d-flex align-items-center">' +
//                                 feather.icons["message-circle"].toSvg({ class: "font-small-4 me-1 text-success" }) + // WhatsApp icon
//                                 whatsappMobile +
//                                 '</a>' +
//                                 '</span>' +
//                                 '</div>' +
//                                 '</div>'
//                             );
//                         }
//                     }
                    
// ,                    
//                     {
//                         targets: 2,
//                         render: function(data, type, full, meta) {
//                             return (
//                                 '<div class="d-flex justify-content-left align-items-center">' +
//                                 '<div class="d-flex flex-column">' +
//                                 '<span class="fw-medium">' + data + '</span>' +
//                                 '</div>' +
//                                 '</div>'
//                             );
//                         },
//                     },
//                     {
//                         targets: 3,
//                         render: function(data, type, full, meta) {
//                             return (
//                                 '<div class="d-flex justify-content-left align-items-center">' +
//                                 '<div class="d-flex flex-column">' +
//                                 '<span class="fw-medium"><strong>State:</strong> ' + full["state"] + '</span>' +
//                                 '<span class="fw-medium"><strong>City:</strong> ' + full["city"] + '</span>' +
//                                 '<span class="fw-medium"><strong>Area:</strong> ' + full["address"] + '</span>' +
//                                 '</div>' +
//                                 '</div>'
//                             );
//                         },
//                     },
                
//                     {
//                         targets: 4,
//                         render: function(data, type, full, meta) {
//                             var statusObj = {
//                                 "pending": { title: 'Pending', class: 'badge-light-warning' },
//                                 "approved": { title: 'Approved', class: 'badge-light-success' },
//                                 "rejected": { title: 'Rejected', class: 'badge-light-secondary' }
//                             };
                    
//                             var status = full['status']; // Get the status value from the data
                    
                           
                    
//                             var statusData = statusObj[status] || { title: 'Unknown', class: 'badge-light-secondary' }; // Default to 'Unknown' if status is not found
                    
//                             return (
//                                 '<span class="badge rounded-pill ' +
//                                 statusData.class +
//                                 '" text-capitalized>' +
//                                 statusData.title +
//                                 '</span>'
//                             );
//                         }
//                     }
                    
//                     ,

//                     {
//                         targets: -1,
//                         title: "Actions",
//                         orderable: false,
//                         render: function(data, type, full, meta) {
//                             return (
//                                 '<div class="btn-group">' +
//                                 '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
//                                 feather.icons["more-vertical"].toSvg({ class: "font-small-4" }) +
//                                 '</a>' +
//                                 '<div class="dropdown-menu dropdown-menu-end">' +
//                                 '<a href="javascript:void(0);" class="dropdown-item edit-record" data-id="' + full['id'] + '">' +
//                                 feather.icons["file-text"].toSvg({ class: "font-small-4 me-50" }) +
//                                 'Edit</a>' +
//                                 '<a href="javascript:void(0);" class="dropdown-item delete-record" data-id="' + full['id'] + '">' +
//                                 feather.icons["trash-2"].toSvg({ class: "font-small-4 me-50" }) +
//                                 'Delete</a>' +
//                                 '</div>' +
//                                 '</div>'
//                             );
//                         },
//                     }
//                 ],
//                 order: [[1, "desc"]],
//                 dom: 
//                     '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
//                     '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
//                     '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
//                     ">t" +
//                     '<"d-flex justify-content-between mx-2 row mb-1"' +
//                     '<"col-sm-12 col-md-6"i>' +
//                     '<"col-sm-12 col-md-6"p>' +
//                     ">",
//                 language: {
//                     sLengthMenu: "Show _MENU_",
//                     search: "Search",
//                     searchPlaceholder: "Search..",
//                     paginate: {
//                         previous: "&nbsp;",
//                         next: "&nbsp;",
//                     },
//                 },
//                 buttons: [
//                     {
//                         text: "Add New Business",
//                         className: "add-new btn btn-primary",
//                         init: function(api, node, config) {
//                             $(node).removeClass("btn-secondary");
//                         },
//                         action: function(e, dt, node, config) {
//                             window.location.href = addBusiness;
//                         }
//                     }
//                 ],
//                 responsive: {
//                     details: {
//                         display: $.fn.dataTable.Responsive.display.modal({
//                             header: function(row) {
//                                 var data = row.data();
//                                 return "Details of " + data["name"];
//                             }
//                         }),
//                         renderer: $.fn.dataTable.Responsive.renderer.tableAll({
//                             tableClass: "table"
//                         })
//                     }
//                 }
//             });
//         }
if (dtBusinessTable.length) {
    dtBusinessTable.DataTable({
        ajax: {
            url: showBusinessRoute,
            dataSrc: "data", // Ensure this matches the structure of your AJAX response
        },
        columns: [
            { data: "vendor_name" },
            { data: "name" },
            { data: "country" }, // Removed sub_category
            { data: "status" },
            { data: "id" } // Ensure that this is mapped correctly
        ],
        columnDefs: [
            {
                targets: 0, // Vendor name column
                render: function(data, type, full, meta) {
                    var vendorEmail = full["vendor_email"] || '';
                    var vendorMobile = full["vendor_mobile"] || '';
                
                    return (
                        '<div class="d-flex flex-column">' +
                        '<span class="fw-medium">' + data + '</span>' + // Vendor name
                        '<span class="fw-medium">' +
                        '<a href="mailto:' + vendorEmail + '">' + vendorEmail + '</a>' +
                        '</span>' +
                        '<span class="fw-medium">' + vendorMobile + '</span>' +
                        '</div>'
                    );
                }
            },
            {
                targets: 1, // Business Details column
                render: function(data, type, full, meta) {
                    var mobile = full["mobile"] || ''; 
                    var whatsappMobile = full["whatsapp_mobile"] || ''; 
                    var email = full["email"] || '';
                
                    var whatsappLink = String(whatsappMobile).replace(/\D/g, '');
                
                    return (
                        '<div class="d-flex justify-content-left align-items-center">' +
                        '<div class="d-flex flex-column">' +
                        '<span class="fw-semibold"><strong>Business Name:</strong>'+' ' + data + '</span>' +
                        '<span class="fw-medium"><strong>Business Type:</strong>'+' ' + full["business_type"] + '</span>' +
                        '<span class="fw-medium"><strong>Email:</strong>' +' '+
                        '<a href="mailto:' + email + '">' + email + '</a>' +
                        '</span>' +
                        '<span class="fw-medium"><strong>Mobile:</strong>'+' ' + mobile + '</span>' +
                        '<span class="fw-medium">' +
                        '<a href="https://wa.me/' + whatsappLink + '" target="_blank" class="d-flex align-items-center">' +
                        feather.icons["message-circle"].toSvg({ class: "font-small-4 me-0 text-success" }) + // WhatsApp icon
                        whatsappMobile +
                        '</a>' +
                        '</span>' +
                        '</div>' +
                        '</div>'
                    );
                }
            },
            {
                targets: 2, // Location column
                render: function(data, type, full, meta) {
                    return (
                        '<div class="d-flex justify-content-left align-items-center">' +
                        '<div class="d-flex flex-column">' +
                        '<span class="fw-medium"><strong>State:</strong> ' + full["state"] + '</span>' +
                        '<span class="fw-medium"><strong>City:</strong> ' + full["city"] + '</span>' +
                        '<span class="fw-medium"><strong>Area:</strong> ' + full["address"] + '</span>' +
                        '</div>' +
                        '</div>'
                    );
                }
            },
            {
                targets: 3, // Status column
                render: function(data, type, full, meta) {
                    var statusObj = {
                        "pending": { title: 'Pending', class: 'badge-light-warning' },
                        "approved": { title: 'Approved', class: 'badge-light-success' },
                        "rejected": { title: 'Rejected', class: 'badge-light-danger' }
                    };
                
                    var status = full['status']; 
                
                    var statusData = statusObj[status] || { title: 'Unknown', class: 'badge-light-secondary' }; 
                
                    return (
                        '<span class="badge rounded-pill ' +
                        statusData.class +
                        '" text-capitalized>' +
                        statusData.title +
                        '</span>'
                    );
                }
            },
            {
                targets: -1, 
                title: "Actions",
                orderable: false,
                render: function(data, type, full, meta) {
                    var encodedId = base64Encode(full['id']);
                    var editUrl = editBusiness.replace('BUSINESS_ID', encodedId);
                  
                    return (
                        '<div class="btn-group">' +
                        '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                        feather.icons["more-vertical"].toSvg({ class: "font-small-4" }) +
                        '</a>' +
                        '<div class="dropdown-menu dropdown-menu-end">' +
                        '<a href="' + editUrl + '" class="dropdown-item edit-record" data-id="' + full['id'] + '">' +
                        feather.icons["file-text"].toSvg({ class: "font-small-4 me-50" }) +
                        'Edit</a>' +
                        '<a href="javascript:void(0);" class="dropdown-item delete-record" data-id="' + full['id'] + '">' +
                        feather.icons["trash-2"].toSvg({ class: "font-small-4 me-50" }) +
                        'Delete</a>' +
                        '</div>' +
                        '</div>'
                    );
                }
            }
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
                text: "Add New Business",
                className: "add-new btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass("btn-secondary");
                },
                action: function(e, dt, node, config) {
                    window.location.href = addBusiness;
                }
            }
        ],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function(row) {
                        var data = row.data();
                        return "Details of " + data["name"];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: "table"
                })
            }
        },  initComplete: function () {
            this.api()
                .columns(3)
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


// dtBusinessTable.on("click", ".delete-record", function () {
//     var id = $(this).data('id');
//     var deleteUrl = deleteBusinessRoute.replace('BUSINESS_ID', id);
//     Swal.fire({
//         title: "Are you sure?",
//         text: "You want to delete this record!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085D6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes, delete it!",
//         customClass: {
//             confirmButton: "btn btn-primary",
//             cancelButton: "btn btn-danger ms-1",
//         },
//         buttonsStyling: false,
//     }).then(function (result) {
//         if (result.isConfirmed) {
//             $.ajax({
              
//                 url: deleteUrl,
//                 type: "GET",
//                 success: function (result) {
//                     Swal.fire({
//                         icon: "success",
//                         title: "Deleted!",
//                         text: "Your file has been deleted.",
//                         customClass: {
//                             confirmButton: "btn btn-success",
//                         },
//                     });
//                     $(".user-list-table").DataTable().ajax.reload();
//                 },
//                 error: function (xhr, status, error) {
//                     Swal.fire({
//                         title: "Error",
//                         text: "There was an error deleting the record.",
//                         icon: "error",
//                         customClass: {
//                             confirmButton: "btn btn-danger",
//                         },
//                     });
//                 },
//             });
//         } else if (result.dismiss === Swal.DismissReason.cancel) {
//             Swal.fire({
//                 title: "Cancelled",
//                 text: "Your record is safe :)",
//                 icon: "error",
//                 customClass: {
//                     confirmButton: "btn btn-danger",
//                 },
//             });
//         }
//     });
// });
dtBusinessTable.on("click", ".delete-record", function () {
    var id = $(this).data('id');
    var deleteUrl = deleteBusinessRoute.replace('BUSINESS_ID', id);
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


    
       
