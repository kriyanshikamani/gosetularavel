@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Review')

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
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/forms/form-validation.css')) }}">
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
                        {{-- <div class="col-md-4 user_role"></div> --}}
                </div>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="user-review-table table">
                    <thead class="table-light">
                        <tr>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Modal to add new user starts-->
            <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                <div class="modal-dialog">
                    
                    <form class="add-new-review modal-content pt-0" id="edit-user-review" name="review-form" method="POST">
                        @csrf
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div> <input type="hidden" id="id"></div>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <div class="mb-1">
                                <label class="form-label" for="rating">Rating</label>
                                <select id="rating" class="form-select" name="rating">
                                    <option value="" disabled selected>Select Rating</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                @error('rating')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-1">
                                <label class="form-label" for="comment">Comment</label>
                                <textarea class="form-control" id="comment" placeholder="Write your review" name="comment">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 ">
                                <label class="form-label" for="vertical-status">Status</label>
                                <select id="status" name="status" class="form-select">
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
                           
                            <button type="submit" value="submit" id="submit" class="btn btn-primary me-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            <!-- Modal to add new user Ends-->
        </div>
        <!-- list and filter end -->
    </section>
    <!-- users list ends -->
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
    
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script>

        var showReviewRoute = '{{ route('admin.feedback.show') }}';
        var deleteReviewRoute = '{{ route('admin.feedback.delete',['id'=>'REVIEW_ID']) }}';
        var updateReviewRoute = '{{ route('admin.feedback.update', ['id' => 'REVIEW_ID']) }}';
        var editReviewRoute = '{{ route('admin.feedback.edit', ['id' => 'REVIEW_ID']) }}';
       
       
    </script>
    <script src="{{ asset(mix('admin/js/scripts/feedback/user-review.js')) }}"></script>
@endsection
