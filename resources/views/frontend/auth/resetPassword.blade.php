@extends('frontend.master')

@section('title')
    {{ $siteSettings->title }} | Reset Password
@endsection

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Reset Password
            </div>
        </div>
    </div>
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    @include('frontend.auth.frontMessage')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="alert-ul">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Reset Password</h3>
                                    </div>
                                    <form method="post" action="{{ route('ResetPasswordForm') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}" style="display: none">
                                        <div class="form-group col-md-12">
                                            <label>New Password</label>
                                            <input class="form-control square" id="password" name="password" type="password">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Confirm Password <span class="required">*</span></label>
                                            <input class="form-control square" id="confirm-pass" name="confirm_password" type="password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Update Password</button>
                                        </div>
                                        <div class="login_footer form-group">
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('userAuth') }}">Login !!</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('customJs')
    <script>
        document.getElementById('confirm-pass').addEventListener('input', function () {
            var password = document.getElementById('password').value;
            var confirmPassword = this.value;

            if (password !== confirmPassword) {
                this.setCustomValidity("Passwords do not match");
            } else {
                this.setCustomValidity("");
            }
        });
    </script>
@endsection
