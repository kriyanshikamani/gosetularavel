@extends('admin/layouts/contentLayoutMaster')

@section('title', 'User List')

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
                        <div class="col-md-4 user_role"></div>
                </div>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="user-list-table table">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Modal to add new user starts-->
            <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                <div class="modal-dialog">
                    <form class="add-new-user modal-content pt-0" id="add-new-user" name="user-form" method="POST">
                        @csrf
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div> <input type="hidden" id="id"></div>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <div class="mb-1">
                                <label class="form-label" for="first_name">First Name</label>
                                <input type="text" class="form-control dt-full-name" id="first_name" placeholder="John"
                                    name="first_name" value="{{ old('first_name') }}" />
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="last_name">Last Name</label>
                                <input type="text" id="last_name"
                                    class="@error('last_name') is-valid @enderror form-control dt-uname" placeholder="Doe"
                                    name="last_name" value="{{ old('last_name') }}" />
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="mobile">Mobile</label>
                                <input type="tel" id="mobile"
                                    class="@error('mobile') is-valid @enderror form-control dt-email"
                                    placeholder="1234567890" name="mobile" value="{{ old('mobile') }}" />
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="email">Email </label>
                                <input type="email" id="email"
                                    class="@error('email') is-valid @enderror form-control dt-email"
                                    placeholder="john.doe@example.com" name="email" value="{{ old('email') }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 password">
                                <label class="form-label " for="password" >Password</label>
                                <input type="password" id="password"
                                    class="@error('password') is-valid @enderror form-control dt-contact"
                                    placeholder="password" name="password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="role">User Role</label>
                                <select id="role" class="@error('role') is-valid @enderror select2 form-select"
                                    name="role">
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="vendor" {{ old('role') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-1">
                                <label class="form-label" for="status">Status</label>
                                <select id="status" class="@error('status') is-valid @enderror select2 form-select" name="status">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                </select>
                                
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="profile_image">Profile Picture</label>
                                <input type="file" id="profile_image" onchange="loadFile(event)"

                                class="form-control-file" name="profile_image"
                                    accept="image/*">

                                    <img id="image_preview" src="" alt="user Image Preview" style="max-width: 100px; display: none;">

                            </div>
                            <button type="submit" value="submit" id="submit" class="btn btn-primary me-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancel</button>
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
        var addUserRoute = '{{ route('admin.user.store') }}';
        var deleteUserRoute = '{{ route('admin.user.delete', ['id' => 'USER_ID']) }}';
        var editUserRoute = '{{ route('admin.user.edit', ['id' => 'USER_ID']) }}';
        var updateUserRoute = '{{ route('admin.user.update', ['id' => 'USER_ID']) }}';
        var shoeUserRoute = '{{ route('admin.user.show') }}';
        var addListingUrl = '{{ route('add-listing') }}';
       
        var loginAsVendor = '{{route("admin.login-as-vendor",'id')}}';
        
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
            var output = document.getElementById('image_preview');
            output.src = reader.result;
            output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script src="{{ asset(mix('admin/js/scripts/pages/admin-user.js')) }}"></script>
@endsection
