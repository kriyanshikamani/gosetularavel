
$(function () {
    ("use strict");
    var dtTable = $("#list-table"),
       
        assetPath = "",
        statusObj = {
            pending:  { class: "bg-success", title: "pending"  },
            approved: { class: "bg-warning", title: "approved" },
            rejected: { class: "bg-danger", title: "rejected"  },
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
                url: displayBusinessRoute,
                type: 'GET'
            },
            columns: [
                { data: "name"     },
                { data: 'category' },
                { data: 'type'     },
                { data: "status"   },
                { name: "action"   }
            ],
            columnDefs: [
                {
                    targets: 3,
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
                            `<a href="${loginAsVendor.replace('id', full["id"])}" class="dropdown-item edit-record" data-id="${full['id']}" ">` +
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
                    text: "Add New Business",
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
                    .columns(2)
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
       
    }
 
});


