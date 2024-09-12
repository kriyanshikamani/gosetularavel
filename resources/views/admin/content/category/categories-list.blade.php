@extends('admin/layouts/contentLayoutMaster')
@section('title', 'Category List')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/forms/form-validation.css')) }}">
@endsection
@section('content')
    <section class="app-user-list">
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">Search & Filter</h4>
                <div class="row">
                    <div class="col-md-4 user_status"></div>
                    <div class="col-md-4 user_role"></div>
                </div>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="list-table table" id="list-table">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Parent Category</th>
                            <th>Icon</th>
                            <th>Banner Image</th>
                            <th>Square Image</th> 
                            <th>Status</th>  
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Modal to add new category starts-->
            <div class="modal modal-slide-in new-modal fade" id="modals-slide-in">
                <div class="modal-dialog">
                    <form class="modal-content pt-0" id="add-form" name="category-form" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        </div>
                        <input type="hidden" id="category_id" name="category_id">
                        <div class="modal-body flex-grow-1">
                            <div class="mb-1">
                                <label class="form-label" for="parent_category">Parent Category</label>
                                    <select class="form-control dt-full-name" name="parent_category" id="parent_category">
                                        <option value="">Select Parent Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                    </select>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="name">Category Name</label>
                                <input  class="form-control dt-full-name" id="name" placeholder="Enter Category Name"
                                    name="name" value="{{ old('name') }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="description">Descripiton</label>
                                <textarea class=" form-control dt-uname" placeholder="Enter Description" name="description" id="description" cols="30" rows="5">{{ old('description') }}</textarea>
                            
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="icon">Icon :</label><br>
                                <input onchange="loadFile(event)" type="file"  id="icon" class="form-control  dt-uname" name="icon" 
                                    accept="image/*">
                                <img id="icon_preview" src="" alt="icon Image Preview" style="max-width: 100px; display: none;">
                                @error('icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="banner_image">Banner Image :</label> <br>
                                <input type="file"  onchange="loadFile_1(event)" id="banner_image" class="form-control  dt-uname" name="banner_image"
                                    accept="image/*">
                                <img id="banner_image_preview" src="" alt="Banner Image Preview" style="max-width: 100px; display: none;">

                                @error('banner_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="square_image">Square Image :</label> <br>
                                <input type="file" onchange="loadFile_2(event)" id="square_image" class="form-control  dt-uname" name="square_image"
                                    accept="image/*">
                                <img id="square_image_preview" src="" alt="Square Image Preview" style="max-width: 100px; display: none;">
                                @error('square_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="status">Status</label>
                                <select id="status" class="@error('status') is-valid @enderror select2 form-select" id="status" name="status">
                                    <option value="">Select Status</option>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" value="submit" class="btn btn-primary me-1 ">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal to add new category Ends-->
        </div>
    </section>
@endsection
@section('vendor-script')
    {{-- Vendor js files --}}
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
 
    <script>
        var addCategoryRoute = '{{ route('admin.category.store') }}';
        var deleteCategoryRoute = '{{ route('admin.category.delete-category', ['id' => 'CAT_ID']) }}';
        var editCategoryRoute = '{{ route('admin.category.edit-category', ['id' => 'CAT_ID']) }}';
        var updateCategoryRoute = '{{ route('admin.category.update-category', ['id' => 'CAT_ID']) }}';
        var displayCategoryRoute = '{{ route('admin.category.get-categories') }}';
   
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
            var output = document.getElementById('icon_preview');
            output.src = reader.result;
            output.style.display = 'block'; 
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        var loadFile_1 = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
            var output = document.getElementById('banner_image_preview');
            output.src = reader.result;
            output.style.display = 'block'; 
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        var loadFile_2 = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
            var output = document.getElementById('square_image_preview');
            output.src = reader.result;
            output.style.display = 'block'; 
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script src="{{ asset(mix('admin/js/scripts/pages/admin-categories.js')) }}"></script>
@endsection

