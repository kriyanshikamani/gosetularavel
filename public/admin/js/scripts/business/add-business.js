$(function () {
    ("use strict");
    if ($("body").attr("data-framework") === "laravel") {
        var assetPath = $("body").attr("data-asset-path");
        var userView = assetPath + "app/user/view/account";
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // ==============add business==========
    // $(document).on("submit", "#business-details", function (e) {
    //     e.preventDefault();
    //         var formData = new FormData(this);
    //         $.ajax({
    //             url: addBusinessRoute,
    //             type: "POST",
    //             data: formData,
    //             contentType: false,
    //             processData: false,
    //             success: function (response) {
    //                 if (response.success) {
    //                     var message = response.operation === 'update'
    //                     ? "Business data updated successfully"
    //                     : "Business data saved successfully";

    //                 toastr.success(
    //                     message,

    //                 );
    //                     storeDocuments(response.business_id);
    //                     storeCategory(response.business_id);
    //                     storeBusinessLocation(response.business_id);
    //                     storeSocialLinks(response.business_id, response.user_id);
    //                     storeBusinessMedia(response.business_id);

    //                     $("#subCategory")
    //                         .empty()
    //                         .append('<option value="">Select Subcategory</option>');
    //                 }
    //             },
    //             error: function (xhr) {
    //                 var errors = xhr.responseJSON.errors;
    //                 $.each(errors, function (key, value) {
    //                     $("#" + key)
    //                         .closest(".mb-1")
    //                         .find(".text-danger")
    //                         .remove();
    //                     $("#" + key).after(
    //                         '<span class="text-danger">' + value[0] + "</span>"
    //                     );
    //                 });
    //             },
    //         });
    // });
    let messageShown = false;

    $(document).on("submit", "#business-details", function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        $("#submit-category").prop("disabled", true);

        $.ajax({
            url: addBusinessRoute,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#submit-category").prop("disabled", false);

                if (response.success && !messageShown) {
                    messageShown = true;
                    var message =
                        response.operation === "update"
                            ? "Business data updated successfully"
                            : "Business data saved successfully";
                    toastr.success(message);

                    storeDocuments(response.business_id);
                    storeCategory(response.business_id);
                    storeBusinessLocation(response.business_id);
                    storeSocialLinks(response.business_id, response.user_id);
                    storeBusinessMedia(response.business_id);

                    $("#subCategory")
                        .empty()
                        .append('<option value="">Select Subcategory</option>');
                }
            },
            error: function (xhr) {
                $("#submit-category").prop("disabled", false);
                var errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                    $("#" + key)
                        .closest(".mb-1")
                        .find(".text-danger")
                        .remove();
                    $("#" + key).after(
                        '<span class="text-danger">' + value[0] + "</span>"
                    );
                });
            },
        });
    });

    // document.getElementById('vertical-award_certificate').addEventListener('change', function(event) {
    //     previewImage(event, 'award_certificate_preview');
    // });
    // document.getElementById('vertical-id_certificate').addEventListener('change', function(event) {
    //     previewImage(event, 'id_proof_preview');
    // });
    // document.getElementById('vertical-business_certificate').addEventListener('change', function(event) {
    //     previewImage(event, 'business_proof_preview');
    // });
    // function previewImage(event, previewId) {
    //     var reader = new FileReader();
    //     reader.onload = function(){
    //         var output = document.getElementById(previewId);
    //         output.src = reader.result;
    //         output.style.display = 'block';
    //     };
    //     reader.readAsDataURL(event.target.files[0]);
    // }
    document
        .getElementById("vertical-award_certificate")
        .addEventListener("change", function (event) {
            previewImage(event, "award_certificate_preview");
        });
    document
        .getElementById("vertical-id_certificate")
        .addEventListener("change", function (event) {
            previewImage(event, "id_proof_preview");
        });
    document
        .getElementById("vertical-business_certificate")
        .addEventListener("change", function (event) {
            previewImage(event, "business_proof_preview");
        });

    function previewImage(event, previewId) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById(previewId);
            if (output) {
                // Ensure element exists
                output.src = reader.result;
                output.style.display = "block"; // Show the image
            } else {
                console.error("No element found with ID:", previewId);
            }
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }

    // function storeDocuments(businessId) {
    //     $(document).on("submit", "#document-details", function (e) {
    //         e.preventDefault();

    //             var formData = new FormData(this);
    //             formData.append("business_id", businessId);

    //             $.ajax({
    //                 url: addDocumentRoute,
    //                 type: "POST",
    //                 data: formData,
    //                 contentType: false,
    //                 processData: false,
    //                 success: function (response) {
    //                     if (response.success) {

    //                             var message = response.operation === 'update'
    //                             ? "Business Document  updated successfully"
    //                             : "Business Document saved successfully";

    //                         toastr.success(
    //                             message,
    //                         );
    //                     }
    //                 },
    //                 error: function (xhr) {
    //                     console.log("AJAX Error:", xhr);
    //                     var errors = xhr.responseJSON.errors;
    //                     $.each(errors, function (key, value) {
    //                         $("#" + key)
    //                             .closest(".mb-1")
    //                             .find(".text-danger")
    //                             .remove();
    //                         $("#" + key).after(
    //                             '<span class="text-danger">' +
    //                                 value[0] +
    //                                 "</span>"
    //                         );
    //                     });
    //                 },
    //             });
    //     });
    // }

    function storeDocuments(businessId) {
        let messageDisplayed = false;

        $(document).on("submit", "#document-details", function (e) {
            e.preventDefault();

            if (!messageDisplayed) {
                var formData = new FormData(this);
                formData.append("business_id", businessId);

                $.ajax({
                    url: addDocumentRoute,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.success) {
                            var message =
                                response.operation === "update"
                                    ? "Business Document updated successfully"
                                    : "Business Document saved successfully";
                            toastr.success(message);
                            messageDisplayed = true;
                        }
                    },
                    error: function (xhr) {
                        console.log("AJAX Error:", xhr);
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            $("#" + key)
                                .closest(".mb-1")
                                .find(".text-danger")
                                .remove();
                            $("#" + key).after(
                                '<span class="text-danger">' +
                                    value[0] +
                                    "</span>"
                            );
                        });
                    },
                });
            }
        });
    }

    // function storeCategory(businessId) {
    //     $(document).on("click", "#submit-category", function (event) {
    //         event.preventDefault();

    //         var parentCategoryId = $("#parentCategory").val();
    //         var subCategoryIds = $("#subcategory").val();

    //         var formData = new FormData();
    //         formData.append("business_id", businessId);

    //         if (subCategoryIds && subCategoryIds.length > 0) {
    //             subCategoryIds.forEach(function (value) {
    //                 formData.append("subcategory[]", value);
    //             });

    //         } else if (parentCategoryId) {
    //             formData.append("subcategory[]", parentCategoryId);
    //         }

    //         $.ajax({
    //             url: addBusinessCategoryRelationRoute,
    //             type: "POST",
    //             data: formData,
    //             contentType: false,
    //             processData: false,
    //             success: function (response) {
    //                 if (response.success) {

    //                     var message = response.operation === 'update'
    //                     ? "Business categories  updated successfully"
    //                     : "Business categories saved successfully";

    //                 toastr.success(
    //                     message,

    //                 );
    //                 }
    //             },
    //             error: function (xhr) {
    //                 console.log("AJAX Error:", xhr);
    //                 var errors = xhr.responseJSON.errors;
    //                 $(".text-danger").html("");
    //                 $.each(errors, function (key, value) {
    //                     $("#" + key + "-error").html(value[0]);
    //                 });
    //             },
    //         });
    //     });
    // }
    function storeCategory(businessId) {
        let isProcessing = false;

        $(document)
            .off("click", "#submit-category")
            .on("click", "#submit-category", function (event) {
                event.preventDefault();

                if (isProcessing) return;

                isProcessing = true;

                var parentCategoryId = $("#parentCategory").val();
                var subCategoryIds = $("#subcategory").val();

                var formData = new FormData();
                formData.append("business_id", businessId);

                if (subCategoryIds && subCategoryIds.length > 0) {
                    subCategoryIds.forEach(function (value) {
                        formData.append("subcategory[]", value);
                    });
                } else if (parentCategoryId) {
                    formData.append("subcategory[]", parentCategoryId);
                }

                $.ajax({
                    url: addBusinessCategoryRelationRoute,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        isProcessing = false;
                        if (response.success) {
                            if (response.operation === "update") {
                                toastr.success(
                                    "Business Category Updated Successfully"
                                );
                            } else {
                                toastr.success(
                                    "Business Category Added Successfully"
                                );
                            }
                        }
                    },
                    error: function (xhr) {
                        isProcessing = false;
                        console.log("AJAX Error:", xhr);
                        var errors = xhr.responseJSON.errors;
                        $(".text-danger").html("");
                        $.each(errors, function (key, value) {
                            $("#" + key + "-error").html(value[0]);
                        });
                    },
                });
            });
    }

    function storeBusinessLocation(businessId) {
        $(document).on("click", "#submit-businesslocation", function (event) {
            event.preventDefault();

            var formData = new FormData();
            formData.append("business_id", businessId);
            formData.append("country_id", $("#vertical-country").val());
            formData.append("state_id", $("#vertical-state").val());
            formData.append("city_id", $("#vertical-city").val());
            formData.append("area", $("#vertical-area").val());
            formData.append("address", $("#vertical-address").val());
            formData.append("pincode", $("#vertical-pincode").val());
            formData.append("latitude", $("#vertical-latitude").val());
            formData.append("longitude", $("#vertical-longitude").val());
            formData.append("type", $("#vertical-wtype").val());

            $.ajax({
                url: addBusinessLocationRoute,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        var message =
                            response.operation === "update"
                                ? "Business Location  updated successfully"
                                : "Business Location saved successfully";

                        toastr.success(message);
                    }
                },
                error: function (xhr) {
                    console.log("AJAX Error:", xhr);
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $("#" + key)
                            .closest(".mb-1")
                            .find(".text-danger")
                            .remove();
                        $("#" + key).after(
                            '<span class="text-danger">' + value[0] + "</span>"
                        );
                    });
                },
            });
        });
    }
    // function storeSocialLinks(businessId, userId) {
    //     $(document).on("submit", "#social-links", function (e) {
    //         e.preventDefault();

    //             var formData = new FormData();
    //             formData.append("business_id", businessId);
    //             formData.append("user_id", userId);
    //             formData.append("facebook", $("#vertical-facebook").val());
    //             formData.append("instagram", $("#vertical-instagram").val());
    //             formData.append("twitter", $("#vertical-twitter").val());
    //             formData.append("linkedin", $("#vertical-linkedin").val());
    //             formData.append("youtube", $("#youtube").val());
    //             formData.append("website_url", $("#vertical-website_url").val());

    //             $.ajax({
    //                 url: addSocialLinks,
    //                 type: "POST",
    //                 data: formData,
    //                 contentType: false,
    //                 processData: false,
    //                 success: function (response) {
    //                     if (response.success) {
    //                         var message = response.operation === 'update'
    //                         ? "Business Social Links  updated successfully"
    //                         : "Business Social Links saved successfully";
    //                     toastr.success(
    //                         message,
    //                     );
    //                     }
    //                 },
    //                 error: function (xhr) {
    //                     console.log("AJAX Error:", xhr);
    //                     var errors = xhr.responseJSON.errors;
    //                     $.each(errors, function (key, value) {
    //                         $("#" + key)
    //                             .closest(".mb-1")
    //                             .find(".text-danger")
    //                             .remove();
    //                         $("#" + key).after(
    //                             '<span class="text-danger">' +
    //                                 value[0] +
    //                                 "</span>"
    //                         );
    //                     });
    //                 },
    //             });
    //     });
    // }
    function storeSocialLinks(businessId, userId) {
        let messageDisplayed = false; // Flag to track if the message has been shown

        $(document).on("submit", "#social-links", function (e) {
            e.preventDefault();

            if (!messageDisplayed) {
                // Check if the message has been displayed already
                var formData = new FormData();
                formData.append("business_id", businessId);
                formData.append("user_id", userId);
                formData.append("facebook", $("#vertical-facebook").val());
                formData.append("instagram", $("#vertical-instagram").val());
                formData.append("twitter", $("#vertical-twitter").val());
                formData.append("linkedin", $("#vertical-linkedin").val());
                formData.append("youtube", $("#youtube").val());
                formData.append(
                    "website_url",
                    $("#vertical-website_url").val()
                );

                $.ajax({
                    url: addSocialLinks,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.success) {
                            var message =
                                response.operation === "update"
                                    ? "Business Social Links updated successfully"
                                    : "Business Social Links saved successfully";

                            toastr.success(message);

                            messageDisplayed = true; // Set flag to true after displaying the message
                        }
                    },
                    error: function (xhr) {
                        console.log("AJAX Error:", xhr);
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            $("#" + key)
                                .closest(".mb-1")
                                .find(".text-danger")
                                .remove();
                            $("#" + key).after(
                                '<span class="text-danger">' +
                                    value[0] +
                                    "</span>"
                            );
                        });
                    },
                });
            }
        });
    }

    // $('#media-type').on('change', function() {
    //     var mediaType = $(this).val();

    //     $('#url-input-group').hide();
    //     $('#dropzone-area').hide();

    //     if (mediaType === 'image') {
    //         $('#dropzone-area').show();

    //     } else if (mediaType === 'video' || mediaType === 'youtube') {
    //         $('#url-input-group').show();
    //     }

    // });
    //===business media===========
    // function updateVisibility() {
    //     var mediaType = $('#media-type').val();
    //     var businessId = $('#id').val(); // Assuming the business_id is in a hidden input with ID 'id'

    //     $('#url-input-group').hide();
    //     $('#dropzone-area').hide();

    //     if (businessId) {
    //         // Always show the relevant area if business_id exists
    //         if (mediaType === 'image') {
    //             $('#dropzone-area').show();
    //         } else if (mediaType === 'video' || mediaType === 'youtube') {
    //             $('#url-input-group').show();
    //         }
    //     } else {
    //         // Hide both areas if business_id does not exist
    //         if (mediaType === 'image') {
    //             $('#dropzone-area').show();
    //         } else if (mediaType === 'video' || mediaType === 'youtube') {
    //             $('#url-input-group').show();
    //         }
    //     }
    // }

    function updateVisibility() {
        var mediaType = $("#media-type").val();
        var businessId = $("#id").val(); // Assuming the business_id is in a hidden input with ID 'id'

        $("#url-input-group").hide();
        $("#dropzone-area").hide();

        if (businessId) {
            if (mediaType === "image") {
                $("#dropzone-area").show();
                $("#url-input-group").hide();
                $("#gallery-container").show();
            } else if (mediaType === "video" || mediaType === "youtube") {
                $("#dropzone-area").hide();
                $("#url-input-group").show();
                $("#gallery-container").hide();
            }
        } else {
            if (mediaType === "image") {
                $("#dropzone-area").show();
                $("#url-input-group").hide();
            } else if (mediaType === "video" || mediaType === "youtube") {
                $("#dropzone-area").hide();
                $("#url-input-group").show();
                $("#gallery-container").hide();
            }
        }
    }

    updateVisibility();
    $("#media-type").on("change", function () {
        updateVisibility();
    });
    function storeBusinessMedia(businessId) {
        $(document).on("submit", "#business-media", function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("business_id", businessId);
            $.ajax({
                url: addBusinessMediaRoute,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.success);
                    }
                },
                error: function (xhr) {
                    console.log("AJAX Error:", xhr);
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $("#" + key)
                            .closest(".mb-1")
                            .find(".text-danger")
                            .remove();
                        $("#" + key).after(
                            '<span class="text-danger">' + value[0] + "</span>"
                        );
                    });
                },
            });
        });
        $(document).on("click", "#addMoreLinks", function () {
            var urlInputHtml = `
                    <div class="mb-3 col-md-12 new-url-input">
                        <label class="form-label" for="media-url">URL/Link</label>
                        <input type="text" name="media_urls[]" class="form-control" placeholder="https://example.com/media" />
                        <button type="button" class="btn btn-danger btn-sm remove-link mt-1" data-id="${id}" >Remove</button>
                    </div> `;
            $("#additional-links").append(urlInputHtml);
        });

        $(document).on("click", ".remove-link", function () {
            $(this).closest(".new-url-input").remove();
        });

        // Handle removing the link and sending the AJAX request
    }

    // ==============business media==========

    // for dropZone
    Dropzone.autoDiscover = false;
    var limitFiles = $("#dpz-file-limits");
    // Limit File Size and No. Of Files
    limitFiles.dropzone({
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 0.5, // MB
        maxFiles: 5,
        maxThumbnailFilesize: 1, // MB
    });
    var bsStepper = document.querySelectorAll(".bs-stepper"),
        select = $(".select2"),
        verticalWizard = document.querySelector(".vertical-wizard-example");

    // Initialize the Stepper
    if (typeof verticalWizard !== "undefined" && verticalWizard !== null) {
        var verticalStepper = new Stepper(verticalWizard, {
            linear: true, // Enforce linear progression through steps
            animation: true,
        });

        // Handle the "Next" button click
        $(verticalWizard)
            .find(".btn-next")
            .on("click", function () {
                var currentForm = $(this).closest(".content").find("form");

                // Validate the form
                currentForm.validate({
                    errorClass: "error",
                    rules: {
                        name: {
                            required: true,
                        },
                        description: {
                            required: false,
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
                        wa_mobile: {
                            required: true,
                            number: true,
                            minlength: 10,
                            maxlength: 10,
                        },
                        established_at: {
                            required: false,
                        },
                        type: {
                            required: true,
                        },
                        parentCategory: {
                            required: true,
                        },
                        subCategory: {
                            required: true,
                            minlength: 1,
                        },
                        gst_number: {
                            required: true,
                            minlength: 15,
                            maxlength: 15,
                        },
                        pancard: {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                        },
                        country_id: {
                            required: true,
                        },
                        state_id: {
                            required: true,
                        },
                        city_id: {
                            required: true,
                        },
                        address: {
                            required: true,
                        },
                        type: {
                            required: true,
                        },
                        images: {
                            required: true,
                        },
                        videos: {
                            required: true,
                        },
                        facebook: {
                            url: true,
                        },
                        instagram: {
                            url: true,
                        },
                        twitter: {
                            url: true,
                        },
                        linkedin: {
                            url: true,
                        },
                        youtube: {
                            url: true,
                        },
                    },
                });

                if (currentForm.valid()) {
                    // Move to the next step if the form is valid
                    verticalStepper.next();
                } else {
                    // Display an error message if the form is invalid
                    toastr.error(
                        "Please fill in the required fields before proceeding."
                    );
                }
            });

        // Handle the "Previous" button click
        $(verticalWizard)
            .find(".btn-prev")
            .on("click", function () {
                verticalStepper.previous();
            });

        // Handle the "Submit" button click (if any)
        $(verticalWizard)
            .find(".btn-submit")
            .on("click", function () {
                // Additional submit logic can go here
                alert("Submitted..!!");
            });
    }

    // Stepper step transition handling
    if (typeof bsStepper !== "undefined" && bsStepper !== null) {
        for (var el = 0; el < bsStepper.length; ++el) {
            bsStepper[el].addEventListener("show.bs-stepper", function (event) {
                var index = event.detail.indexStep;
                var numberOfSteps = $(event.target).find(".step").length - 1;
                var line = $(event.target).find(".step");

                for (var i = 0; i < index; i++) {
                    line[i].classList.add("crossed");

                    for (var j = index; j < numberOfSteps; j++) {
                        line[j].classList.remove("crossed");
                    }
                }
                if (event.detail.to == 0) {
                    for (var k = index; k < numberOfSteps; k++) {
                        line[k].classList.remove("crossed");
                    }
                    line[0].classList.remove("crossed");
                }
            });
        }
    }

    // select2 initialization
    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            placeholder: "Select value",
            dropdownParent: $this.parent(),
        });
    });

    //depenent dropdown for the category
    $("#parentCategory").on("change", function () {
        var id = $(this).val();
        if (id) {
            $.ajax({
                url: getCat.replace("id", id),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    var $subCategory = $("#subCategory");
                    $subCategory.empty();
                    $subCategory.append(
                        '<option value="">Select Subcategory</option>'
                    );
                    $.each(data, function (key, value) {
                        $subCategory.append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                    $subCategory.trigger("change");
                },
            });
        } else {
            $("#subCategory")
                .empty()
                .append('<option value="">Select Subcategory</option>');
        }
    });

    // for the country,state,city dropdown
    $("#vertical-country").on("change", function () {
        var countryId = this.value;

        $("#vertical-state").html('<option value="">Select State</option>');
        $("#vertical-city").html('<option value="">Select City</option>');

        if (countryId) {
            $.ajax({
                url: getState.replace(":id", countryId),
                type: "GET",
                data: {
                    country_id: countryId,
                    // _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    $("#vertical-state").html(
                        '<option value="">Select State</option>'
                    );
                    $.each(result, function (key, value) {
                        $("#vertical-state").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                },
            });
        }
    });

    $("#vertical-state").on("change", function () {
        var stateId = this.value;

        $("#vertical-city").html('<option value="">Select City</option>');

        if (stateId) {
            $.ajax({
                url: getCity.replace(":id", stateId),
                type: "GET",
                data: {
                    state_id: stateId,
                    // _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    $("#vertical-city").html(
                        '<option value="">Select City</option>'
                    );
                    $.each(result, function (key, value) {
                        $("#vertical-city").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                },
            });
        }
    });

    // $('#user-selection').on('change', function() {
    //     let userId = $(this).val();

    //     if (userId) {
    //         $.ajax({
    //             url: fetchUserData, // This route should be defined in your routes file
    //             type: "GET",
    //             data: {
    //                 user_id: userId
    //             },
    //             success: function(response) {

    //                 if (response.success) {
    //                     // Populate the form with the fetched business data
    //                     $('#vertical-businessname').val(response.business.name);
    //                     $('#vertical-description').val(response.business.description);
    //                     $('#vertical-email').val(response.business.email);
    //                     $('#vertical-status').val(response.business.status);
    //                     $('#vertical-type').val(response.business.type);
    //                     $('#vertical-mobile').val(response.business.mobile);
    //                     $('#vertical-wp_number').val(response.business.wa_mobile);
    //                     $('#vertical-establish').val(response.business.established_at);

    //                     // Populate the parent category dropdown
    //                     let parentCategoryOptions = '<option value="">Select Parent Category</option>';
    //                     response.parentCategories.forEach(function(category) {
    //                         parentCategoryOptions += `<option value="${category.id}" ${response.categories.includes(category.id) ? 'selected' : ''}>${category.name}</option>`;
    //                     });
    //                     $('#parentCategory').html(parentCategoryOptions);
    //                     alert(parentCategoryOptions);

    //                     // Populate the subcategory dropdown
    //                     let subCategoryOptions = '';
    //                     response.subCategories.forEach(function(category) {
    //                         if (response.categories.includes(category.id)) {
    //                             subCategoryOptions += `<option value="${category.id}" selected>${category.name}</option>`;
    //                         } else {
    //                             subCategoryOptions += `<option value="${category.id}">${category.name}</option>`;
    //                         }
    //                     });
    //                     $('#subcategory').html(subCategoryOptions);
    //                     alert(subCategoryOptions);
    //                 } else {
    //                     // Clear the form and dropdowns if no business is found
    //                     clearBusinessForm();
    //                     alert(response.message); // Notify user about no business found
    //                 }
    //             },
    //             error: function(xhr) {
    //                 console.error(xhr.responseText);
    //                 clearBusinessForm();
    //             }
    //         });
    //     } else {
    //         clearBusinessForm();
    //     }

    // });
    // $('#user-selection').on('change', function() {
    //     let userId = $(this).val();

    //     if (userId) {
    //         $.ajax({
    //             url: fetchUserData,
    //             type: "GET",
    //             data: {
    //                 user_id: userId
    //             },
    //             success: function(response) {
    //                 if (response.success) {
    //                     // Populate the form with the fetched business data
    //                     $('#vertical-businessname').val(response.business.name);
    //                     $('#vertical-description').val(response.business.description);
    //                     $('#vertical-email').val(response.business.email);
    //                     $('#vertical-status').val(response.business.status);
    //                     $('#vertical-type').val(response.business.type);
    //                     $('#vertical-mobile').val(response.business.mobile);
    //                     $('#vertical-wp_number').val(response.business.wa_mobile);
    //                     $('#vertical-establish').val(response.business.established_at);

    //                     // Populate the parent category dropdown
    //                     let parentCategoryOptions = '<option value="">Select Parent Category</option>';
    //                     response.parentCategories.forEach(function(category) {
    //                         parentCategoryOptions += `<option value="${category.id}" ${response.categories.includes(category.id) ? 'selected' : ''}>${category.name}</option>`;
    //                     });
    //                     $('#parentCategory').html(parentCategoryOptions);

    //                     // Populate the subcategory dropdown
    //                     let subCategoryOptions = '';
    //                     response.subCategories.forEach(function(category) {
    //                         subCategoryOptions += `<option value="${category.id}" ${response.categories.includes(category.id) ? 'selected' : ''}>${category.name}</option>`;
    //                     });
    //                     $('#subcategory').html(subCategoryOptions);

    //                 } else {
    //                     clearBusinessForm();
    //                     alert(response.message); // Notify user about no business found
    //                 }
    //             },
    //             error: function(xhr) {
    //                 console.error(xhr.responseText);
    //                 clearBusinessForm();
    //             }
    //         });
    //     } else {
    //         clearBusinessForm();
    //     }
    // });

    // function clearBusinessForm() {
    //     $('#vertical-businessname').val('');
    //     $('#vertical-description').val('');
    //     $('#vertical-email').val('');
    //     $('#vertical-status').val('');
    //     $('#vertical-type').val('');
    //     $('#vertical-mobile').val('');
    //     $('#vertical-wp_number').val('');
    //     $('#vertical-establish').val('');
    //     $('#parentCategory').html('<option value="">Select Parent Category</option>');
    //     $('#subcategory').html(''); // Clear subcategory dropdown
    // }

    //7/9/2024 last modfied--------------
    // $("#user-selection").on("change", function () {
    //     let userId = $(this).val();

    //     if (userId) {
    //         $.ajax({
    //             url: fetchUserData, 
    //             type: "GET",
    //             data: {
    //                 user_id: userId,
    //             },
    //             success: function (response) {
    //                 if (response.success) {
                     
    //                     $("#vertical-businessname").val(response.business.name);
    //                     $("#vertical-description").val(
    //                         response.business.description
    //                     );
    //                     $("#vertical-email").val(response.business.email);
    //                     $("#vertical-status").val(response.business.status);
    //                     $("#vertical-type").val(response.business.type);
    //                     $("#vertical-mobile").val(response.business.mobile);
    //                     $("#vertical-wp_number").val(
    //                         response.business.wa_mobile
    //                     );
    //                     $("#vertical-establish").val(
    //                         response.business.established_at
    //                     );

                       
    //                     let parentCategoryOptions = '<option value="">Select Parent Category</option>';
        
    //                     response.parentCategories.forEach(function (category) {
    //                         parentCategoryOptions += `<option value="${category.id}" ${
    //                             response.categories.includes(category.id) ? "selected" : ""
    //                         }>${category.name}</option>`;
    //                     });
                       
    //                     $("#parentCategory").html(parentCategoryOptions);
    //                   alert(response.parent.p_id);

    //                     let subCategoryOptions =
    //                         '<option value="">Select Subcategory</option>';
    //                     response.subCategories.forEach(function (category) {
    //                         subCategoryOptions += `<option value="${
    //                             category.id
    //                         }" 
    //                         ${
    //                             response.categories.includes(category.id)
    //                                 ? "selected"
    //                                 : ""
    //                            }
    //                         >${category.name}</option>`;
    //                     });
    //                     $("#subcategory").html(subCategoryOptions);
                     
    //                     $("#award_certificate_preview")
    //                         .attr(
    //                             "src",
    //                             response.documents.awards_certificate || ""
    //                         )
    //                         .css(
    //                             "display",
    //                             response.documents.awards_certificate
    //                                 ? "block"
    //                                 : "none"
    //                         );

    //                     $("#id_proof_preview")
    //                         .attr("src", response.documents.id_proof || "")
    //                         .css(
    //                             "display",
    //                             response.documents.id_proof ? "block" : "none"
    //                         );

    //                     $("#business_proof_preview")
    //                         .attr(
    //                             "src",
    //                             response.documents.business_proof || ""
    //                         )
    //                         .css(
    //                             "display",
    //                             response.documents.business_proof
    //                                 ? "block"
    //                                 : "none"
    //                         );

                      
    //                     $("#gst_number").val(response.documents.gst_number);
    //                     $("#pan_card").val(response.documents.pancard);

    //                     if (response.locations.length > 0) {
    //                         let location = response.locations[0]; 
    //                         $("#vertical-country")
    //                             .val(location.country_id || "")
    //                             .trigger("change");

    //                         $("#vertical-state")
    //                             .val(location.state_id || "")
    //                             .trigger("change");
    //                         $("#vertical-city")
    //                             .val(location.city_id || "")
    //                             .trigger("change");

                           

    //                         $("#vertical-area").val(location.area || "");
    //                         $("#vertical-address").val(location.address || "");
    //                         $("#vertical-pincode").val(location.pincode || "");
    //                         $("#vertical-latitude").val(
    //                             location.latitude || ""
    //                         );
    //                         $("#vertical-longitude").val(
    //                             location.longitude || ""
    //                         );
    //                         $("#vertical-wtype")
    //                             .val(location.type || "")
    //                             .trigger("change");
    //                     } else {
    //                         $("#vertical-country").val("").trigger("change");
    //                         $("#vertical-state").val("").trigger("change");
    //                         $("#vertical-city").val("").trigger("change");
    //                         $("#vertical-area").val("");
    //                         $("#vertical-address").val("");
    //                         $("#vertical-pincode").val("");
    //                         $("#vertical-latitude").val("");
    //                         $("#vertical-longitude").val("");
    //                         $("#vertical-wtype").val("").trigger("change");
    //                     }
    //                 } else {
    //                     clearBusinessForm();
    //                     alert(response.message);
    //                 }
    //             },
    //             error: function (xhr) {
    //                 console.error(xhr.responseText);
    //                 clearBusinessForm();
    //             },
    //         });
    //     } else {
    //         clearBusinessForm();
    //     }
    // });
    

    // function clearBusinessForm() {
    //     $("#vertical-businessname").val("");
    //     $("#vertical-description").val("");
    //     $("#vertical-email").val("");
    //     $("#vertical-status").val("");
    //     $("#vertical-type").val("");
    //     $("#vertical-mobile").val("");
    //     $("#vertical-wp_number").val("");
    //     $("#vertical-establish").val("");
    //     $("#parentCategory").html(
    //         '<option value="">Select Parent Category</option>'
    //     );
    //     $("#subcategory").html('<option value="">Select Subcategory</option>');

    //     $("#award_certificate_preview").attr("src", "").css("display", "none");
    //     $("#id_proof_preview").attr("src", "").css("display", "none");
    //     $("#business_proof_preview").attr("src", "").css("display", "none");

    //     $("#gst_number").val("");
    //     $("#pan_card").val("");

     
    //     $("#vertical-country").val("");
    //     $("#vertical-state").val("");
    //     $("#vertical-city").val("");
    //     $("#vertical-area").val("");
    //     $("#vertical-address").val("");
    //     $("#vertical-pincode").val("");
    //     $("#vertical-latitude").val("");
    //     $("#vertical-longitude").val("");
    //     $("#vertical-wtype").val("");
    // }

    //7/9/2024 last modified september
});
