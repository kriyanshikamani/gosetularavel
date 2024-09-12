@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Business List')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/forms/select/select2.min.css')) }}">

    @endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/forms/form-wizard.css')) }}">

    @endsection

@section('content')
    <!-- users list start -->
    <section class="app-user-list">

        <!-- list and filter start -->
        <div class="card">  
            <div class="card-body border-bottom">
                <h4 class="card-title">Search & Filter</h4>
                <div class="row">
                        <div class="col-md-4 user_status"></div>
                        <div class="col-md-4 user_role"></div>
                </div>
            </div>
            <div class="card-datatable table-responsive pt-0">
            
                <table class="business-list-table table">
                    <thead class="table-light">
                        <tr>
                            <th>Vendor</th>
                            <th>Business Details</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
 
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('admin/vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('admin/vendors/js/forms/select/select2.full.min.js')) }}"></script>
  
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script>
        var showBusinessRoute = '{{ route('admin.view-business') }}';
        var addBusiness = '{{ route('admin.add-business') }}';
     
        var editBusiness = '{{ route('admin.business.edit', ['id' => 'BUSINESS_ID']) }}';

        var deleteBusinessRoute = '{{ route('admin.business.delete', ['id' => 'BUSINESS_ID']) }}';

    </script>
    <script src="{{ asset(mix('admin/js/scripts/business/business-list.js')) }}"></script>
@endsection
