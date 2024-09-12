@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Business List')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/forms/wizard/bs-stepper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/file-uploaders/dropzone.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/extensions/sweetalert2.min.css')) }}">

@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/forms/form-wizard.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/forms/form-file-uploader.css')) }}">

@endsection

@section('content')


    <!-- Vertical Wizard -->
    <section class="vertical-wizard">
        <div class="bs-stepper vertical vertical-wizard-example">
            <div class="bs-stepper-header">

                <div class="step" data-target="#business-details-vertical" role="tab"
                    id="business-details-vertical-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">1</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Business Details</span>
                            <span class="bs-stepper-subtitle">Setup Business Details</span>

                        </span>
                    </button>
                </div>
                <div class="step" data-target="#business-category-vertical" role="tab"
                    id="business-category-vertical-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">2</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Busienss Category Info</span>
                            <span class="bs-stepper-subtitle">Add Busienss Category Info</span>

                        </span>
                    </button>
                </div>
                <div class="step" data-target="#business-document-vertical" role="tab"
                    id="business-document-vertical-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">3</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Business Documents</span>
                            <span class="bs-stepper-subtitle">Add Business Documents</span>

                        </span>
                    </button>
                </div>
                <div class="step" data-target="#business-location-vertical" role="tab"
                    id="business-location-vertical-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">4</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Business Location</span>
                            <span class="bs-stepper-subtitle">Add Business Location</span>
                        </span>
                    </button>
                </div>
                <div class="step" data-target="#business-media-vertical" role="tab"
                    id="business-media-vertical-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">5</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Business Media</span>
                            <span class="bs-stepper-subtitle">Add Business Media</span>
                        </span>
                    </button>
                </div>

                <div class="step" data-target="#social-links-vertical" role="tab" id="social-links-vertical-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">6</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Social Links</span>
                            <span class="bs-stepper-subtitle">Add Social Links</span>
                        </span>
                    </button>
                </div>
            </div>

            <div class="bs-stepper-content">
                <div id="business-details-vertical" class="content" role="tabpanel"
                    aria-labelledby="business-details-vertical-trigger">
                    <div>

                    </div>
                    <form role="form" id="business-details" action="javascript:;" name="business-details">
                        @csrf

                        <input type="hidden" name="bs_id" id="id"
                            value="{{ isset($business) ? $business->id : '' }}">

                        <div class="content-header">
                            <h5 class="mb-0">Business Details</h5>
                            <small class="text-muted">Enter Your Business Details.</small>
                        </div>
                        <div id="form-errors" class="text-danger"></div>

                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="user-selection">Select User</label>
                                <select id="user-selection" name="user_selection" class="form-select">
                                    <option value="">Select an option</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_selection', isset($business) ? $business->user_id : '') == $user->id ? 'selected' : '' }}>
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </option>
                                    @endforeach
                                    
                                </select>
                                <span class="text-danger" id="user-selection-error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-businessname">Business Name</label>
                                <input type="text" id="vertical-businessname" name="name" class="form-control"
                                    placeholder="Mauli Cafe"
                                    value="{{ old('name', isset($business) ? $business->name : '') }}" />
                                <span class="text-danger" id="vertical-businessname-error"></span>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-description">Description</label>
                                <textarea id="vertical-description" name="description" class="form-control" placeholder="Description">{{ old('description', isset($business) ? $business->description : '') }}</textarea>
                                <span class="text-danger" id="vertical-description-error"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-1 form-password-toggle col-md-6">
                                <label class="form-label" for="vertical-email">Email</label>
                                <input type="email" id="vertical-email" name="email" class="form-control"
                                    placeholder="johndoe@gmail.com"
                                    value="{{ old('email', isset($business) ? $business->email : '') }}" />
                                <span class="text-danger" id="vertical-email-error"></span>
                            </div>
                            <div class="mb-1 form-password-toggle col-md-6">
                                <label class="form-label" for="vertical-status">Status</label>
                                <select id="vertical-status" name="status" class="form-select">
                                    <option value="pending"
                                        {{ old('status', isset($business) ? $business->status : '') == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="approved"
                                        {{ old('status', isset($business) ? $business->status : '') == 'approved' ? 'selected' : '' }}>
                                        Approved</option>
                                    <option value="rejected"
                                        {{ old('status', isset($business) ? $business->status : '') == 'rejected' ? 'selected' : '' }}>
                                        Rejected</option>
                                </select>
                                <span class="text-danger" id="vertical-status-error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-type">Business Type</label>
                                <select id="vertical-type" name="type" class="form-select">
                                    <option value="service"
                                        {{ old('type', isset($business) ? $business->type : '') == 'service' ? 'selected' : '' }}>
                                        Service
                                    </option>
                                    <option value="product"
                                        {{ old('type', isset($business) ? $business->type : '') == 'product' ? 'selected' : '' }}>
                                        Product
                                    </option>
                                </select>
                                <span class="text-danger" id="vertical-type-error"></span>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-mobile">Mobile</label>
                                <input type="tel" id="vertical-mobile" name="mobile" class="form-control"
                                    placeholder="12345 98745"
                                    value="{{ old('mobile', isset($business) ? $business->mobile : '') }}" />
                                <span class="text-danger" id="vertical-mobile-error"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-wp_number">WhatsApp Number</label>
                                <input type="tel" id="vertical-wp_number" name="wa_mobile" class="form-control"
                                    placeholder="12345 98745"
                                    value="{{ old('wa_mobile', isset($business) ? $business->wa_mobile : '') }}" />
                                <span class="text-danger" id="vertical-wp_number-error"></span>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-establish">Establish</label>
                                <input type="date" id="vertical-establish" name="established_at" class="form-control"
                                    value="{{ old('established_at', isset($business) && $business->established_at ? \Carbon\Carbon::parse($business->established_at)->format('Y-m-d') : '') }}" />
                                <span class="text-danger" id="vertical-establish-error"></span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-outline-secondary btn-prev" disabled>
                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button type="submit" id="submit-business" class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                            </button>
                        </div>
                    </form>

                </div>
                <div id="business-category-vertical" class="content" role="tabpanel"
                    aria-labelledby="business-category-vertical-trigger">

                 
                    <form role="form" id="category-details" action="javascript:;" name="category-details">
                        @csrf
                        <input type="hidden" name="bs_id" id="idd"
                            value="{{ isset($business) ? $business->id : '' }}">

                        <div class="content-header">
                            <h5 class="mb-0">Business Category Info</h5>
                            <small>Enter Your Business Category Info.</small>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="parentCategory">Category</label>

                                @php
                                    if (isset($business)) {
                                        $business_category = \App\Models\BusinessCategoryRelation::where(
                                            'business_id',
                                            $business->id,
                                        )->first();
                                        $parent_cat = $business_category
                                            ? \App\Models\Category::where(
                                                'id',
                                                $business_category->category_id,
                                            )->first()
                                            : null;
                                    }
                                @endphp
                                <select id="parentCategory" class="select2 w-100" name="parentCategory">
                                    <option value="">Select Parent Category</option>
                                    @foreach ($parentCategories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ isset($parent_cat) && $category->id == $parent_cat->parent ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger parentCategory-error"></span>
                            </div>

                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="subcategory">Sub Category</label>
                                <select id="subcategory" class="select2 w-100" name="subcategory[]" multiple>
                                    <!-- Subcategories will be dynamically loaded here -->
                                </select>
                                <span class="text-danger subCategory-error"></span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-prev">
                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button type="submit" id="submit-category" class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                            </button>
                        </div>
                    </form>

                </div>
                <div id="business-document-vertical" class="content" role="tabpanel"
                    aria-labelledby="business-document-vertical-trigger">
                    
                    <form role="form" id="document-details" action="javascript:;" name="document-details"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="content-header">
                            <h5 class="mb-0">Business Documents</h5>
                            <small>Enter Your Business Documents.</small>
                        </div>
                        {{-- <div class="row">
                            <div><input type="hidden" id="id" name="bs_id"
                                    value="{{ $businessDocuments->id ?? '' }}"></div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-award_certificate">Award Certificate</label>
                                <input type="file" id="vertical-award_certificate" name="awards_certificate"
                                    class="form-control" />
                                @if (!empty($businessDocuments->awards_certificate))
                                    <img id="award_certificate_preview"
                                        src="{{ asset('' . $businessDocuments->awards_certificate) }}"
                                        alt="Award Certificate Preview" style="width: 100px; height: auto;" />
                                @endif
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-id_certificate">Id Certificate</label>
                                <input type="file" id="vertical-id_certificate" name="id_proof"
                                    class="form-control" />
                                @if (!empty($businessDocuments->id_proof))
                                    <img id="id_proof_preview" src="{{ asset('' . $businessDocuments->id_proof) }}"
                                        alt="ID Proof Preview" style="width: 100px; height: auto;" />
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-business_certificate">Business Certificate</label>
                                <input type="file" id="vertical-business_certificate" name="business_proof"
                                    class="form-control" />
                                @if (!empty($businessDocuments->business_proof))
                                    <img id="business_proof_preview"
                                        src="{{ asset('' . $businessDocuments->business_proof) }}"
                                        alt="Business Proof Preview" style="width: 100px; height: auto;" />
                                @endif
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="gst_number">GST Number</label>
                                <input type="text" id="gst_number" name="gst_number" class="form-control"
                                    placeholder="22AAAAA0000A1Z5"
                                    value="{{ old('gst_number', $businessDocuments->gst_number ?? '') }}" />
                            </div>
                        </div> --}}
                        <div class="row">
                            <div><input type="hidden" id="id" name="bs_id"
                                    value="{{ $businessDocuments->id ?? '' }}"></div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-award_certificate">Award Certificate</label>
                                <input type="file" id="vertical-award_certificate" name="awards_certificate"
                                    class="form-control" />
                                @if (!empty($businessDocuments->awards_certificate))
                                    <img id="award_certificate_preview"
                                        src="{{ asset($businessDocuments->awards_certificate) }}"
                                        alt="Award Certificate Preview"
                                        style="width: 100px; height: auto; display: block;" />
                                @else
                                    <img id="award_certificate_preview" src="" alt="Award Certificate Preview"
                                        style="width: 100px; height: auto; display: none;" />
                                @endif
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-id_certificate">ID Certificate</label>
                                <input type="file" id="vertical-id_certificate" name="id_proof"
                                    class="form-control" />
                                @if (!empty($businessDocuments->id_proof))
                                    <img id="id_proof_preview" src="{{ asset($businessDocuments->id_proof) }}"
                                        alt="ID Proof Preview" style="width: 100px; height: auto; display: block;" />
                                @else
                                    <img id="id_proof_preview" src="" alt="ID Proof Preview"
                                        style="width: 100px; height: auto; display: none;" />
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-business_certificate">Business Certificate</label>
                                <input type="file" id="vertical-business_certificate" name="business_proof"
                                    class="form-control" />
                                @if (!empty($businessDocuments->business_proof))
                                    <img id="business_proof_preview"
                                        src="{{ asset($businessDocuments->business_proof) }}"
                                        alt="Business Proof Preview"
                                        style="width: 100px; height: auto; display: block;" />
                                @else
                                    <img id="business_proof_preview" src="" alt="Business Proof Preview"
                                        style="width: 100px; height: auto; display: none;" />
                                @endif
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="gst_number">GST Number</label>
                                <input type="text" id="gst_number" name="gst_number" class="form-control"
                                    placeholder="22AAAAA0000A1Z5"
                                    value="{{ old('gst_number', $businessDocuments->gst_number ?? '') }}" />
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="pan_card">PAN Card</label>
                                <input type="text" id="pan_card" name="pancard" class="form-control"
                                    placeholder="12345ERVC5"
                                    value="{{ old('pancard', $businessDocuments->pancard ?? '') }}" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-prev">
                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button type="submit" id="submit-document" class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div id="business-location-vertical" class="content" role="tabpanel"
                    aria-labelledby="business-location-vertical-trigger">
                   

                    <form role="form" id="business-location" action="javascript:;" name="document-details">
                        @csrf
                        <div class="content-header">
                            <h5 class="mb-0">Business Location</h5>
                            <small>Enter Your Business Location.</small>
                        </div>
                        <div class="listing-map mb-2">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3584.6461688381!2d-80.26548188573862!3d26.045130803169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9a862f9831459%3A0xafcb9384c02e8b75!2s8697%20Stirling%20Rd%2C%20Cooper%20City%2C%20FL%2033328%2C%20USA!5e0!3m2!1sen!2sin!4v1671519522101!5m2!1sen!2sin"
                                width="100%" height="430" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <div class="row">
                            <div><input type="hidden" id="id" name="business_id"
                                    value="{{ $businessLocation->id ?? '' }}"></div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-country">Country</label>
                                <select class="select2 w-100" id="vertical-country" name="country_id">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id', $businessLocation->country_id ?? '') == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-state">State</label>
                                <select class="select2 w-100" id="vertical-state" name="state_id">
                                    <option value="">Select State</option>
                                    @if (isset($states) && $states->count() > 0)
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ old('state_id', $businessLocation->state_id ?? '') == $state->id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="" disabled>No states available</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-city">City</label>
                                <select class="select2 w-100" id="vertical-city" name="city_id">
                                    <option value="">Select City</option>
                                    @if (isset($cities) && $cities->count() > 0)
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ old('city_id', $businessLocation->city_id ?? '') == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="" disabled>No cities available</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-area">Area</label>
                                <input type="text" id="vertical-area" class="form-control"
                                    placeholder="Khodiyar colony"
                                    value="{{ old('area', $businessLocation->area ?? '') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-address">Address</label>
                                <textarea class="form-control" id="vertical-address" name="address" placeholder="khodiyar colony, jamnagar">{{ old('address', $businessLocation->address ?? '') }}</textarea>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-pincode">Pincode</label>
                                <input type="text" id="vertical-pincode" class="form-control" placeholder="361006"
                                    value="{{ old('pincode', $businessLocation->pincode ?? '') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-latitude">Latitude</label>
                                <input type="text" id="vertical-latitude" class="form-control"
                                    placeholder="70.0652004"
                                    value="{{ old('latitude', $businessLocation->latitude ?? '') }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-longitude">Longitude</label>
                                <input type="text" id="vertical-longitude" class="form-control"
                                    placeholder="22.4307862"
                                    value="{{ old('longitude', $businessLocation->longitude ?? '') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-wtype">Select Work Type</label>
                                <select class="select2 w-100" id="vertical-wtype" name="type">
                                    <option value="">Select Work Type</option>
                                    <option value="Work"
                                        {{ old('type', $businessLocation->type ?? '') == 'work' ? 'selected' : '' }}>
                                        Work
                                    </option>
                                    <option value="Office"
                                        {{ old('type', $businessLocation->type ?? '') == 'office' ? 'selected' : '' }}>
                                        Office
                                    </option>
                                </select>

                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-prev">
                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button type="submit" id="submit-businesslocation" class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                            </button>
                        </div>
                    </form>
                </div>


                <div id="business-media-vertical" class="content" role="tabpanel"
                    aria-labelledby="business-media-vertical-trigger">

                   
                    <form id="business-media" action="javascript:;" name="business-media" method="POST"
                        enctype="multipart/form-data">
                        <div><input type="hidden" id="id" name="business_id"
                                value="{{ $businessMedia->id ?? '' }}"></div>

                        <div class="content-header">
                            <h5 class="mb-0">Business Media</h5>
                            <small>Select Your Business media.</small>
                        </div>
                        <div class="row">
                            <!-- Media Type Selection -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="media-type">Select Media Type</label>
                                <select class="select2 form-select w-100" id="media-type" name="type">
                                    <option value="" disabled>Select a media type</option>
                                    <option value="image"
                                        {{ old('type', $businessMedia->type ?? '') == 'image' ? 'selected' : '' }}>
                                        Image
                                    </option>
                                    <option value="video"
                                        {{ old('type', $businessMedia->type ?? '') == 'video' ? 'selected' : '' }}>
                                        Video
                                    </option>
                                    <option value="youtube"
                                        {{ old('type', $businessMedia->type ?? '') == 'youtube' ? 'selected' : '' }}>
                                        YouTube
                                    </option>
                                </select>
                            </div>
                            <div id="url-input-group" class="mb-3 col-md-6" style="display: none;">
                                <div id="url-input-container">
                                    <label class="form-label">URL/Link</label>
                                    <div class="d-flex align-items-center ">
                                        <div id="additional-links">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" id="addMoreLinks"
                                            class="btn btn-primary rounded-pill px-2">
                                            <i data-feather="plus"></i> Add More Links
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- File Upload Area (hidden by default) -->
                            <div id="dropzone-area" class="mb-3 col-md-12" style="display: none;">
                                <label class="form-label" for="media-upload">Upload Media</label>
                                <div id="media-upload" class="dropzone dropzone-area">
                                    <div class="dz-message">Drop files here or click to upload.</div>
                                </div>
                            </div>


                            <div id="gallery-container" style="display: flex; flex-wrap: wrap; gap: 10px; padding: 10px;">
                                @if (isset($businessMedia_photos))
                                    @foreach ($businessMedia_photos as $data)
                                        <div class="image-container"
                                            style="position: relative; width: 120px; height: 120px;"
                                            id="image-{{ $data->id }}">
                                            <img src="{{ asset('upload/business-media/' . $data->path) }}" alt=""
                                                style="width: 100%; height: 100%; object-fit: cover;box-shadow: 0 4px 8px rgba(0,0,0,0.2);">

                                            <button type="button" class="close-btn"
                                                onclick="removeImage(this, '{{ $data->id }}')"
                                                style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; cursor: pointer; z-index: 10; font-size: 16px; font-weight: bold;">&times;</button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Uploaded Images Display -->


                            <!-- Navigation Buttons -->
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="social-links-vertical" class="content" role="tabpanel"
                    aria-labelledby="social-links-vertical-trigger">
                    {{-- <form role="form" id="social-links" action="javascript:;" name="social-links" method="POST">
                        <div class="content-header">
                            <h5 class="mb-0">Social Links</h5>
                            <small>Enter Your Social Links.</small>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-twitter">Twitter</label>
                                <input type="text" id="vertical-twitter" class="form-control"
                                    placeholder="https://twitter.com/abc" value="{{ old('twitter') }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-facebook">Facebook</label>
                                <input type="text" id="vertical-facebook" class="form-control"
                                    placeholder="https://facebook.com/abc" value="{{ old('facebook') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-instagram">Instargram</label>
                                <input type="text" id="vertical-instagram" class="form-control"
                                    placeholder="https://www.instagram.com/abc" value="{{ old('instagram') }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-linkedin">Linkedin</label>
                                <input type="text" id="vertical-linkedin" class="form-control"
                                    placeholder="https://linkedin.com/abc" value="{{ old('linkedin') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-websiteurl">Website URL</label>
                                <input type="text" id="vertical-website_url" class="form-control"
                                    placeholder="https://mehtawebsolution.com/" value="{{ old('website_url') }}" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-prev">
                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button type="submit" id="submit-alldata" class="btn btn-success">Submit</button>
                        </div>
                    </form> --}}
                    <!-- Social Links Form -->
                    <form role="form" id="social-links" action="javascript:;" name="social-links" method="POST">
                        @csrf
                        <div class="content-header">
                            <div><input type="hidden" id="id" name="business_id"
                                    value="{{ $socialInfo->id ?? '' }}"></div>
                            <h5 class="mb-0">Social Links</h5>
                            <small>Enter Your Social Links.</small>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-twitter">Twitter</label>
                                <input type="text" id="vertical-twitter" class="form-control"
                                    placeholder="https://twitter.com/abc"
                                    value="{{ old('twitter', $socialInfo->twitter ?? '') }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-facebook">Facebook</label>
                                <input type="text" id="vertical-facebook" class="form-control"
                                    placeholder="https://facebook.com/abc"
                                    value="{{ old('facebook', $socialInfo->facebook ?? '') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-instagram">Instagram</label>
                                <input type="text" id="vertical-instagram" class="form-control"
                                    placeholder="https://www.instagram.com/abc"
                                    value="{{ old('instagram', $socialInfo->instagram ?? '') }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-linkedin">LinkedIn</label>
                                <input type="text" id="vertical-linkedin" class="form-control"
                                    placeholder="https://linkedin.com/abc"
                                    value="{{ old('linkedin', $socialInfo->linkedin ?? '') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-website-url">Website URL</label>
                                <input type="text" id="vertical-website-url" class="form-control"
                                    placeholder="https://mehtawebsolution.com/"
                                    value="{{ old('website_url', $socialInfo->website_url ?? '') }}" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-prev">
                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button type="submit" id="submit-alldata" class="btn btn-success">Submit</button>
                        </div>
                    </form>


                </div>
            </div>
    </section>
    <!-- /Vertical Wizard -->

@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('admin/vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/file-uploaders/dropzone.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>

@endsection
@section('page-script')

    <!-- Page js files -->
    {{-- <script src="{{ asset(mix('admin/js/scripts/forms/form-wizard.js')) }}"></script> --}}


    <script>
        var getCat = '{{ route('admin.get-subcategory', 'id') }}';
        var getState = '{{ route('admin.get-states-by-country', 'id') }}';
        var getCity = '{{ route('admin.get-cities-by-state', 'id') }}';
        var addBusinessRoute = '{{ route('admin.add-business.store') }}';
        var addDocumentRoute = '{{ route('admin.add-business.storeDocuments') }}';
        var addBusinessCategoryRelationRoute = '{{ route('admin.add-business.storeBusinessCategoryRelations') }}';
        var addBusinessLocationRoute = '{{ route('admin.add-busienss.storeBusinessLocation') }}';
        var addSocialLinks = '{{ route('admin.add-business.storeSocialLinks') }}';
        var addBusinessMediaRoute = '{{ route('admin.add-business.storeBusinessMedia') }}';
        var uploadMedia = '{{ route('admin.upload-image') }}';
        var deleteMediaUrl = '{{ route('delete.url', ['id' => 'bs_media_id']) }}';

        var fetchUserData='{{ route('fetch.business.by.user')}}';
       
       

        var businessCategories = @json($business_categories ?? []);
        var existingMediaLinks = @json($businessMedia_links ?? []);

        if (existingMediaLinks && existingMediaLinks.length > 0) {
            $('#additional-links').empty(); // Clear any default inputs

            existingMediaLinks.forEach(function(link) {
                var urlInputHtml = `<div class="mb-3 col-md-12 new-url-input">
    <input type="text" name="media_urls[]" class="form-control" value="` + link.path + `" />
    <input type="hidden" name="media_id[]" class="form-control" value="` + link.id + `" />
    <button type="button" class="btn btn-danger btn-sm remove-link mt-1"  data-id="${link.id}">Remove</button>
</div>`;
                $('#additional-links').append(urlInputHtml);
            });
            $(document).on('click', '.remove-link', function() {
                var id = $(this).data('id');   
                if (id) {
                    var deletemdUrl = deleteMediaUrl.replace('bs_media_id', id);
                    $.ajax({
                        url: deletemdUrl,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                $(this).closest('.new-url-input').remove();
                            } else {
                                alert('Failed to delete URL');
                            }
                        }.bind(this),
                        error: function() {
                            alert('Error occurred while deleting URL');
                        }
                    });
                } else {

                    $(this).closest('.new-url-input').remove();
                }
            });
        }

        var selectedParentCategory = $('#parentCategory').val();

        if (selectedParentCategory) {
            loadSubcategories(selectedParentCategory);
        }

        // Load subcategories on parent category change
        $('#parentCategory').on('change', function() {
            var id = $(this).val();
            if (id) {
                loadSubcategories(id);

            } else {
                $('#subcategory').empty().append('<option value="">No subcategories available.</option>');
            }
        });

        function loadSubcategories(categoryId) {
            $.ajax({
                url: getCat.replace('id', categoryId),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var $select = $('#subcategory');
                    $select.empty();

                    $select.append('<option value="">Select Subcategory</option>');
                    $.each(data, function(key, value) {

                        var isSelected = businessCategories.includes(value.id) ? 'selected' : '';

                        var option = '<option value="' + value.id + '" ' + isSelected + '>' + value
                            .name + '</option>';
                        $select.append(option);
                    });

                    $select.trigger('change');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        Dropzone.autoDiscover = false;
        // Initialize Dropzone
        var mediaUpload = new Dropzone("#media-upload", {
            url: uploadMedia, // URL to send files to
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 0.5, // MB
            maxFiles: 5,
            maxThumbnailFilesize: 1, // MB
            acceptedFiles: 'image/*', // Accept only images
            addRemoveLinks: true, // Show remove links
            dictRemoveFile: "Remove", // Text for remove link
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function(file, response) {
                // Handle successful response
                console.log('File uploaded successfully:', response);
            },
            error: function(file, response) {
                // Handle error response
                console.log('File upload error:', response);
            },
            sending: function(file, xhr, formData) {
                // Append additional data if needed
                formData.append('user_id', $('#user_id').val());
            },
            removedfile: function(file) {
                // Handle file removal
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            }
        });


        var dropzone = Dropzone.forElement("#media-upload");
    
        function removeImage(button, mediaId) {

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to delete this image?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send AJAX request to delete the image
                    $.ajax({
                        url: '{{ route('media.delete') }}', // Laravel route for deleting media
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token for security
                            id: mediaId
                        },
                        success: function(response) {
                            if (response.success) {
                                var imageContainer = button
                                    .parentElement; // Get the parent container of the button
                                imageContainer.remove(); // Remove the image container

                                // Show success alert
                                Swal.fire(
                                    'Deleted!',
                                    'Your image has been deleted.',
                                    'success'
                                );
                            } else {
                                // Show failure alert
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete the image. Please try again.',
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            // Show error alert
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the image.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>

    <script src="{{ asset(mix('admin/js/scripts/business/add-business.js')) }}"></script>
    

@endsection
