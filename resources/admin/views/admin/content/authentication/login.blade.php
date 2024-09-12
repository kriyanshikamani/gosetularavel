@extends('admin/layouts/fullLayoutMaster')
@section('title', 'Login')
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <div class="card mb-0">
                <div class="card-body">
                    <a href="#" class="brand-logo">
                        {{-- @todo Add Logo image here --}}
                        <h2 class="brand-text text-primary ms-1">{{ config('app.title') }}</h2>
                    </a>

                    <h4 class="card-title mb-1">Welcome ! 👋</h4>

                    <form class="auth-login-form mt-2" action='{{ route('admin.authenticate') }}' method="post">
                        @csrf
                        <div class="mb-1">
                            <label for="login-email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="login-email" name="email"
                                placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus />
                        </div>

                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="login-password">Password</label>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge" id="login-password"
                                    name="password" tabindex="2"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="login-password" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" name="remember-me"
                                    tabindex="3" />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('admin/vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('admin/js/scripts/pages/auth-login.js')) }}"></script>
@endsection
